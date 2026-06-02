<?php
require_once "db.php";

if(isset($_POST['add_mfg'])){
    $name = $_POST['name'];
    $address = $_POST['address'];
    // echo $name . "<br>" . $address;
    $db -> query("call createManufacturer('$name', '$address')");
}

if(isset($_POST['delete_id'])){
    $id = $_POST['delete_id'];
    $db -> query("delete from manufacturers where id = $id");
    
}
$result = $db -> query("SELECT * FROM manufacturers");
$rows = $result -> fetch_all(MYSQLI_ASSOC);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <nav>
        <a href="manufactures.php">Manufactures</a>
        <a href="Products.php">Products</a>
    </nav>
    <h2>Add new Manufacture</h2>
    <form action="" method="POST">
        Name: <br>
        <input type="text" name="name" placeholder="Name"><br><br>
        Address: <br>
        <input type="text" name="address" placeholder="Address"><br><br>
        <button type="submit" name="add_mfg" value="Add manufacture">Add Manufacture</button>
    </form>
    <h2>Manufactures</h2>
    <table border="1" width="100%" cellspacing="0" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Actions</th>
        </tr>
        <?php foreach($rows as $item):?>
            <tr>
                <td><?= $item['id'];?></td>
                <td><?= $item['name'];?></td>
                <td><?= $item['address'];?></td>
                <td>
                    <form action="" method="POST">
                        <input type="hidden" name="delete_id" value="<?= $item['id'];?>">
                        <button type="submit">delete</button>
                        
                    </form>
                </td>
            </tr>
        <?php endforeach?>    
    </table>
</body>
</html>