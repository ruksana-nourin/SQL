<?php
require_once "config.php";

// Show all Product

$result = $db->query("SELECT * FROM product");
$products = $result->fetch_all(MYSQLI_ASSOC);

// Show View Product

$result_view = $db->query("SELECT * FROM vw_product");
$products_view = $result_view->fetch_all(MYSQLI_ASSOC);

echo "<pre>";
print_r($products_view);
echo "</pre>";



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


   <h2>View Products</h2>
    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
        </tr>
        <?php 
         foreach($products_view as $item) :
         ?>
         <tr>
            <td><?= $item["id"] ?></td>
            <td><?= $item["name"] ?></td>
            <td><?= $item["price"] ?></td>
         </tr>

         <?php endforeach ?>
    </table>

   <h2>Products</h2>
    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Manufacturer ID</th>
        </tr>
        <?php 
         foreach($products as $item) :
         ?>
         <tr>
            <td><?= $item["id"] ?></td>
            <td><?= $item["name"] ?></td>
            <td><?= $item["price"] ?></td>
            <td><?= $item["manufacturer_id"] ?></td>
         </tr>

         <?php endforeach ?>
    </table>
</body>
</html>