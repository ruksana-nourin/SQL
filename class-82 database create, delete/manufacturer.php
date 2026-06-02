<?php
require_once("db-config.php");

// CREATE data
if (isset($_POST['add_mfg'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $active = isset($_POST['active']) ? 1 : 0;

    // echo $name . "<br>";
    // echo $address . "<br>";
    // echo $active . "<br>";

    $db->query("INSERT INTO manufactures(name, address, is_active) VALUES('$name', '$address', $active)");

}

// DELETE data
if (isset($_POST['delete'])) {
    $id = $_POST['delete_id'];
    // echo $id;
    $db->query("delete from manufactures where id = $id");
}

// READ data
$result = $db->query("SELECT * FROM manufactures");
if ($result) {
    // echo "Connected";
    $mfg = $result->fetch_all(MYSQLI_ASSOC);
    // echo "<pre>";
    // print_r($mfg);
    // echo "</pre>";
} else {
    echo $db->error;
}
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
        <a href="product.php">Products</a>
    </nav>

    <div style="display: flex; gap: 10px ; justify-content: space-evenly;">
        <div>
            <h2>Add New Manufacturer</h2>
            <form action="" method="POST" name="add_mfg">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name">
                <br><br>
                <label for="address">Address:</label>
                <textarea name="address" id=""></textarea>
                <br><br>
                <input type="checkbox" name="active" id="active">
                <label for="active">is Active:</label>
                <br><br>
                <button type="submit" name="add_mfg">Save</button>
            </form>
        </div>
        <div>
            <h2>Manufacturers List</h2>
            <table border="1" width="400px" cellspacing="0" cellpadding="10">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //  if(isset($mfg)){
                    //     foreach($mfg as $item){
                    //         echo "<tr>";
                    //         echo "<td>{$item['id']}</td>";
                    //         echo "<td>{$item['name']}</td>";
                    //         echo "<td>{$item['address']}</td>";
                    //         echo "<td>{$item['is_active']}</td>";
                    //         echo "</tr>";
                    //  }
                    //  }
                    ?>
                    <?php
                     if(isset($mfg)):
                        foreach($mfg as $item):
                            ?>
                            <tr>
                            <td><?=$item['id'];?></td>
                            <td><?=$item['name'];?></td>
                            <td><?=$item['address'];?></td>
                            <td><?=$item['is_active']? "Active" : "Inactive";?></td>
                            <td>
                                <form action="" method="POST">
                                    <input type="text" name="delete_id" value="<?=$item['id']; ?>" hidden>
                                    <button type="submit" name="delete">Delete</button>
                                </form>
                                
                            </td>
                            </tr>
                     <?php
                     endforeach;
                     endif;
                     ?>
                </tbody>
            </table>
        </div>
    </div>





</body>

</html>