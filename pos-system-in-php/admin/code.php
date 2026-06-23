<?php
include('../config/function.php');

// echo "<pre>";
// var_dump($conn);
// echo "</pre>";
// exit;

if (isset($_POST['saveAdmin'])) {
    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $phone = validate($_POST['phone']);
    $is_ban = isset($_POST['is_ban']) == true ? 1 : 0;


    if ($name != '' && $email != '' && $password != '') {
        global $conn;
        $emailCheck = mysqli_query($conn, "SELECT * FROM admins WHERE email = '$email'");
        if ($emailCheck) {
            if (mysqli_num_rows($emailCheck) > 0) {
                redirect('admins-create.php', 'Email already exist.');
            }
        }
        $bcrypt_password = password_hash($password, PASSWORD_BCRYPT);

        $data = [
            'name' => $name,
            'email' => $email,
            'password' => $bcrypt_password,
            'phone' => $phone,
            'is_ban' => $is_ban
        ];
        $result = insert('admins', $data);
        if ($result) {
            redirect('admins.php', 'Admin created successfully.');
        } else {
            redirect('admins-create.php', 'Something went wrong.');
        }
    } else {
        redirect('admins-create.php', 'Please fields required feilds.');
    }
}
// echo "<pre>";
// var_dump($conn);
// echo "</pre>";
// echo "<pre>";
// var_dump(isset($conn));
// echo "</pre>";
// exit;

if (isset($_POST['updateAdmin'])) {
    $adminId = validate($_POST['adminId']);

    $adminData = getById('admins', $adminId);
    if ($adminData['status'] != 200) {
        redirect('admins-edit.php?id=' . $adminId, 'Please fields required feilds.');
    }

    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $phone = validate($_POST['phone']);
    $is_ban = isset($_POST['is_ban']) == true ? 1 : 0;

    $EmailCheckQuery = "SELECT * FROM admins WHERE email = '$email' AND id != '$adminId'";
    global $conn;
    $checkResult = mysqli_query($conn, $EmailCheckQuery);

    if ($checkResult) {
        if (mysqli_num_rows($checkResult) > 0) {
            redirect('admins-edit.php?id=' . $adminId, 'Email already used by another user.');
        }
    }


    if ($password != '') {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    } else {
        $hashedPassword = $adminData['data']['password'];
    }

    if ($name != '' && $email != '') {
        $data = [
            'name' => $name,
            'email' => $email,
            'password' => $hashedPassword,
            'phone' => $phone,
            'is_ban' => $is_ban
        ];
        $result = update('admins', $adminId, $data);
        if ($result) {
            redirect('admins-edit.php?id=' . $adminId, 'Admin updated successfully.');
        } else {
            redirect('admins-edit.php?id=' . $adminId, 'Something went wrong!');
        }
    } else {
        redirect('admins-create.php', 'Please fields required feilds.');
    }
}



if (isset($_POST['saveCategory'])) {
    $name = validate($_POST['name']);
    $description = validate($_POST['description']);
    $status = isset($_POST['status']) == true ? 1 : 0;

    $data = [
        'name' => $name,
        'description' => $description,
        'status' => $status
    ];
    $result = insert('categories', $data);

    if ($result) {
        redirect('categories.php', 'Category created successfully.');
    } else {
        redirect('categories-create.php', 'Something went wrong.');
    }
}



if (isset($_POST['updateCategory'])) {
    $categoryId = validate($_POST['categoryId']);
    $name = validate($_POST['name']);
    $description = validate($_POST['description']);
    $status = isset($_POST['status']) == true ? 1 : 0;

    $data = [
        'name' => $name,
        'description' => $description,
        'status' => $status
    ];
    $result = update('categories', $categoryId, $data);

    if ($result) {
        redirect('categories-edit.php?id=' . $categoryId, 'Category updated successfully.');
    } else {
        redirect('categories-edit.php?id=' . $categoryId, 'Something went wrong!');
    }
}


if (isset($_POST['saveProduct'])) {
    $category_id = validate($_POST['category_id']);
    $name = validate($_POST['name']);
    $description = validate($_POST['description']);

    $price = validate($_POST['price']);
    $quantity = validate($_POST['quantity']);
    $status = isset($_POST['status']) == true ? 1 : 0;


    if ($_FILES['image']['size'] > 0) {

        $path = "../assets/uploads/products";
        $image_ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

        $filename = time() . '.' . $image_ext;

        move_uploaded_file($_FILES['image']['tmp_name'], $path . "/" . $filename);
        $finalImage = "assets/uploads/products/" . $filename;
    } else {
        $finalImage = "";
    }

    $data = [
        'category_id' => $category_id,
        'name' => $name,
        'description' => $description,
        'price' => $price,
        'quantity' => $quantity,
        'image' => $finalImage,
        'status' => $status
    ];
    $result = insert('products', $data);

    if ($result) {
        redirect('products.php', 'Product created successfully.');
    } else {
        redirect('products-create.php', 'Something went wrong.');
    }
}


if (isset($_POST['updateProduct'])) {
    $productId = validate($_POST['product_id']);

    $productData = getById('products', $productId);
    if (!$productData) {
        redirect('products.php', 'Product not found');
    }

    $category_id = validate($_POST['category_id']);
    $name = validate($_POST['name']);
    $description = validate($_POST['description']);

    $price = validate($_POST['price']);
    $quantity = validate($_POST['quantity']);
    $status = isset($_POST['status']) == true ? 1 : 0;

    if ($_FILES['image']['size'] > 0) {

        $path = "../assets/uploads/products";
        $image_ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

        $filename = time() . '.' . $image_ext;

        move_uploaded_file($_FILES['image']['tmp_name'], $path . "/" . $filename);

        $finalImage = "assets/uploads/products/" . $filename;

        $deleteImage = "../" . $productData['data']['image'];
        if (file_exists($deleteImage)) {
            unlink($deleteImage);
        }
    } else {
        $finalImage = $productData['data']['image'];
    }

    $data = [
        'category_id' => $category_id,
        'name' => $name,
        'description' => $description,
        'price' => $price,
        'quantity' => $quantity,
        'image' => $finalImage,
        'status' => $status
    ];
    $result = update('products', $productId, $data);

    if ($result) {
        redirect('products-edit.php?id=' . $productId, 'Product updated successfully.');
    } else {
        redirect('products-create.php', 'Something went wrong.');
    }
}



if (isset($_POST['saveCustomer'])) {

    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $phone = validate($_POST['phone']);
    $status = isset($_POST['status']) == true ? 1 : 0;


    if ($name != '') {

        global $conn;
        $emailCheck = mysqli_query($conn, "SELECT * FROM customers WHERE email = '$email'");
        if ($emailCheck) {
            if (mysqli_num_rows($emailCheck) > 0) {
                redirect('customers.php', 'Email already exists.');
            }
        }

        $data = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'status' => $status
        ];
        $result = insert('customers', $data);
        if ($result) {
            redirect('customers.php', 'Customer created successfully.');
        } else {
            redirect('customers.php', 'Something went wrong.');
        }
    } else {
        redirect('customers.php', 'Please fill the required feilds.');
    }
}




if (isset($_POST['updateCustomer'])) {

    $customerId = validate($_POST['customer_id']);
    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $phone = validate($_POST['phone']);
    $status = isset($_POST['status']) == true ? 1 : 0;


    if ($name != '') {

        global $conn;
        $emailCheck = mysqli_query($conn, "SELECT * FROM customers WHERE email = '$email' And id != '$customerId'");
        if ($emailCheck) {
            if (mysqli_num_rows($emailCheck) > 0) {
                redirect('customers-edit.php?id=' . $customerId, 'Email already exists.');
            }
        }

        $data = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'status' => $status
        ];
        $result = update('customers', $customerId, $data);
        if ($result) {
            redirect('customers-edit.php?id=' . $customerId, 'Customer updated successfully.');
        } else {
            redirect('customers-edit.php?id=' . $customerId, 'Something went wrong.');}
    } else {

        redirect('customers-edit.php?id=' . $customerId, 'Please fill the required feilds.');}
}
