<?php
require_once("db-config.php");

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
            <form action="">
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
                        <th>Is_Active</th>
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