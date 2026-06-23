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

            redirect('order-create.php', 'Item Added '.$row['name']);
        } else {
            redirect('order-create.php', 'Product not found. Please try again.');
        }
    } else {
        redirect('order-create.php', 'Something went wrong. Please try again.');
    }
}


?>
