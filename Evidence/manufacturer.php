<?php
require_once "db.php";

if(isset($_POST['add_mfg'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $contact_no = $_POST['contact_no'];
    // echo $name.''.$address.''.$contact_no.'';

    $db->query("call add_manufacturer('$name', '$address', '$contact_no')");
}
if(isset($_POST['delete_id'])) {
    $id = $_POST['delete_id'];
    $db->query("delete from manufacturer where id = $id");
}

$sql = "SELECT * FROM manufacturer";
$result = $db->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);
// print_r($rows);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manufacturer</title>
</head>
<body>
    <nav>
        <a href="manufacturer.php">Manufacturer</a>
        <a href="product.php">Product</a>
    </nav>
        <h1>Information For Add Manufacturer</h1>
    <form action="" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required><br><br>

        <label for="contact_no">Contact No:</label>
        <input type="text" id="contact_no" name="contact_no" required><br><br>

        <button type="submit" name="add_mfg">Add Manufacturer</button>
    </form>

    <h1>Manufacturer List</h1>
    <table border="1" width="500">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Contact No</th>
            <th>Action</th>
        </tr>
        <?php foreach ($rows as $item): ?>
        <tr>
            <td><?php echo $item['id']; ?></td>
            <td><?php echo $item['name']; ?></td>
            <td><?php echo $item['address']; ?></td>
            <td><?php echo $item['contact_no']; ?></td>
            <td>
                <form action="" method="POST">
                    <input type="hidden" name="delete_id" value="<?php echo $item['id']; ?>">
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>