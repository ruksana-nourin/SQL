<?php
require_once("config.php");

if (isset($_POST["add_mfg"])) {
    $name = $_POST["name"];
    $address = $_POST["address"];
    $contact_no = $_POST["contact_no"];

    // echo $name . " " . $address . " " . $contact_no;

    $db->query("call add_manufacturer('$name', '$address', '$contact_no')");
}

if (isset($_POST["delete_btn"])) {
    $id = $_POST["del"];
    $db->query("delete from manufacturer where id = $id");

}

$result = $db->query("select * from manufacturer order by id desc");
$manufactures = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" width="100%" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name"><br><br>
        <label for="address">Address:</label>
        <input type="text" name="address" id="address"><br><br>
        <label for="contact_no">Contact No:</label>
        <input type="text" name="contact_no" id="contact_no"><br><br>
        <button type="submit" name="add_mfg">Add Manufacture</button>
    </form>
    <br>
    <table border="1" width="100%">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Contact No</th>
            <th>Action </th>
        </tr>
        <?php
        foreach ($manufactures as $item) :
        ?>
        <tr>
            <td><?= $item["id"] ?></td>
            <td><?= $item["name"] ?></td>
            <td><?= $item["address"] ?></td>
            <td><?= $item["contact_no"] ?></td>
            <td><form method="POST">
                <input type="hidden" name="del" value="<?= $item["id"] ?>">
                <button type="submit" name="delete_btn">Delete</button>
            </form></td>
         </tr>

         <?php endforeach ?>
    </table>


</body>
</html>