<?php

include '../config/function.php';

if (!isset($_SESSION['productsItems'])) {
    $_SESSION['productsItems'] = [];
}
if (!isset($_SESSION['productsItemsId'])) {
    $_SESSION['productsItemsId'] = [];
}

if (isset($_POST['addItem'])) {

    $productId = validate($_POST['product_id']);
    $quantity = validate($_POST['quantity']);

    global $conn;
    $checkProduct = mysqli_query($conn, "SELECT * FROM products WHERE id = '$productId' LIMIT 1");
    if ($checkProduct) {
        if (mysqli_num_rows($checkProduct) > 0) {
            $row = mysqli_fetch_assoc($checkProduct);
            if ($row['quantity'] < $quantity) {
                redirect('order-create.php', 'Only ' . $row['quantity'] . ' quantity available.');
            }
            $productData = [
                'product_id' => $row['id'],
                'name' => $row['name'],
                'image' => $row['image'],
                'price' => $row['price'],
                'quantity' => $quantity
            ];

            if (!in_array($row['id'], $_SESSION['productsItemsId'])) {
                array_push($_SESSION['productsItemsId'], $row['id']);
                array_push($_SESSION['productsItems'], $productData);
            } else {

                foreach ($_SESSION['productsItems'] as $key => $prodSessionItem) {

                    if ($prodSessionItem['product_id'] == $row['id']) {
                        $newQuantity = $prodSessionItem['quantity'] + $quantity;

                        $productData = [
                            'product_id' => $row['id'],
                            'name' => $row['name'],
                            'image' => $row['image'],
                            'price' => $row['price'],
                            'quantity' => $newQuantity
                        ];

                        $_SESSION['productsItems'][$key] = $productData;
                        break;
                    }
                }
            }

            redirect('order-create.php', 'Item Added ' . $row['name']);
        } else {
            redirect('order-create.php', 'Product not found. Please try again.');
        }
    } else {
        redirect('order-create.php', 'Something went wrong. Please try again.');
    }
}


// AJAX version of addItem used by the product cards on pos.php
// Same logic as addItem above, but responds with JSON instead of redirecting,
// so the page stays on pos.php after adding an item.
if (isset($_POST['addItemAjax'])) {

    $productId = validate($_POST['product_id']);
    $quantity = validate($_POST['quantity']);

    global $conn;
    $checkProduct = mysqli_query($conn, "SELECT * FROM products WHERE id = '$productId' LIMIT 1");
    if ($checkProduct) {
        if (mysqli_num_rows($checkProduct) > 0) {
            $row = mysqli_fetch_assoc($checkProduct);
            if ($row['quantity'] < $quantity) {
                jsonResponse(422, 'warning', 'Only ' . $row['quantity'] . ' quantity available.');
            } else {

                $productData = [
                    'product_id' => $row['id'],
                    'name' => $row['name'],
                    'image' => $row['image'],
                    'price' => $row['price'],
                    'quantity' => $quantity
                ];

                if (!in_array($row['id'], $_SESSION['productsItemsId'])) {
                    array_push($_SESSION['productsItemsId'], $row['id']);
                    array_push($_SESSION['productsItems'], $productData);
                } else {

                    foreach ($_SESSION['productsItems'] as $key => $prodSessionItem) {

                        if ($prodSessionItem['product_id'] == $row['id']) {
                            $newQuantity = $prodSessionItem['quantity'] + $quantity;

                            $productData = [
                                'product_id' => $row['id'],
                                'name' => $row['name'],
                                'image' => $row['image'],
                                'price' => $row['price'],
                                'quantity' => $newQuantity
                            ];

                            $_SESSION['productsItems'][$key] = $productData;
                            break;
                        }
                    }
                }

                jsonResponse(200, 'success', 'Item Added ' . $row['name']);
            }
        } else {
            jsonResponse(404, 'error', 'Product not found. Please try again.');
        }
    } else {
        jsonResponse(500, 'error', 'Something went wrong. Please try again.');
    }
}


// AJAX version of order-item-delete.php used by the Remove button on pos.php
// Same logic as order-item-delete.php, but responds with JSON instead of redirecting,
// so the page stays on pos.php after removing an item.
if (isset($_POST['removeItemAjax'])) {

    $indexValue = validate($_POST['index']);

    if (is_numeric($indexValue)) {

        if (isset($_SESSION['productsItems']) && isset($_SESSION['productsItemsId'])) {

            unset($_SESSION['productsItems'][$indexValue]);
            unset($_SESSION['productsItemsId'][$indexValue]);

            jsonResponse(200, 'success', 'Item Removed');
        } else {
            jsonResponse(404, 'error', 'There is no item to remove');
        }
    } else {
        jsonResponse(422, 'error', 'param not numeric');
    }
}




if (isset($_POST['productIncDec'])) {
    $productId = validate($_POST['product_id']);
    $quantity = validate($_POST['quantity']);

    $flag = false;
    foreach ($_SESSION['productsItems'] as $key => $item) {
        if ($item['product_id'] == $productId) {
            $flag = true;
            $_SESSION['productsItems'][$key]['quantity'] = $quantity;
        }
    }
    if ($flag) {
        jsonResponse(200, 'success', 'Quantity updated');
    } else {
        jsonResponse(500, 'error', 'Something went wrong. Please try again.');
    }
}

if (isset($_POST['proceedToPlaceBtn'])) {

    $phone = validate($_POST['cphone']);
    $payment_mode = validate($_POST['payment_mode']);

    // Checking for Customer
    global $conn;
    $checkCustomer = mysqli_query($conn, "SELECT * FROM customers WHERE phone='$phone' LIMIT 1");
    if ($checkCustomer) {
        if (mysqli_num_rows($checkCustomer) > 0) {
            $customerRow = mysqli_fetch_assoc($checkCustomer);

            $invoiceNo = 'INV-' . rand(111111, 999999);

            // Calculate grand total from the current cart in session
            $totalAmount = 0;
            if (isset($_SESSION['productsItems'])) {
                foreach ($_SESSION['productsItems'] as $cartItem) {
                    $totalAmount += $cartItem['price'] * $cartItem['quantity'];
                }
            }

            // Save the order itself
            $orderData = [
                'invoice_no' => $invoiceNo,
                'customer_id' => $customerRow['id'],
                'customer_name' => $customerRow['name'],
                'customer_phone' => $customerRow['phone'],
                'payment_mode' => $payment_mode,
                'total_amount' => $totalAmount
            ];

            $orderInserted = insert('orders', $orderData);

            if ($orderInserted) {
                $orderId = mysqli_insert_id($conn);

                // Save each cart line item against this order
                if (isset($_SESSION['productsItems'])) {
                    foreach ($_SESSION['productsItems'] as $cartItem) {
                        $itemData = [
                            'order_id' => $orderId,
                            'product_id' => $cartItem['product_id'],
                            'product_name' => $cartItem['name'],
                            'price' => $cartItem['price'],
                            'quantity' => $cartItem['quantity']
                        ];
                        insert('order_items', $itemData);
                    }
                }

                $_SESSION['invoice_no'] = $invoiceNo;
                $_SESSION['cphone'] = $phone;
                $_SESSION['payment_mode'] = $payment_mode;
                $_SESSION['last_order_id'] = $orderId;

                jsonResponse(200, 'success', 'Customer found.');
            } else {
                jsonResponse(500, 'error', 'Could not save the order. Please try again.');
            }
        } else {
            $_SESSION['cphone'] = $phone;
            jsonResponse(404, 'warning', 'Customer not found. Please try again.');
        }
    } else {
        jsonResponse(500, 'error', 'Something went wrong. Please try again.');
    }
}


if(isset($_POST['saveCustomerBtn'])){

    $name = validate($_POST['name']);
    $phone = validate($_POST['phone']);
    $email = validate($_POST['email']);


    if($name != '' && $phone != '' && $email != ''){
        $data = [
            'name' => $name,
            'phone' => $phone,
            'email' => $email
            
        ];
        $result = insert('customers', $data);

        if($result){
            jsonResponse(200, 'success', 'Customer added successfully.');
        }else{
            jsonResponse(500, 'error', 'Something went wrong. Please try again.');
        }

    }else{
        jsonResponse(422, 'warning', 'Please fill all the fields.');
    }
}


?>