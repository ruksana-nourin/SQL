<?php
require_once 'db.php';
$sql = "
SELECT p.*, m.name as mfg 
FROM product p, manufacturer m 
WHERE p.manufacturer_id = m.id";

$result = $db->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

$result_view = $db->query("SELECT * FROM vw_product");
$rows_view = $result_view->fetch_all(MYSQLI_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
</head>
<body>
    

    
    <h1>Product View (More then 5000 tk)</h1>
    <table border="1" width="500">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Manufacturer</th>
        </tr>
        <?php foreach ($rows_view as $item): ?>
        <tr>
            <td><?php echo $item['id']; ?></td>
            <td><?php echo $item['name']; ?></td>
            <td><?php echo $item['price']; ?></td>
            <td><?php echo $item['mfg']; ?></td>
            
        </tr>
        <?php endforeach; ?>
    </table>
    <h1>Product List</h1>
    <table border="1" width="500">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Manufacturer</th>
        </tr>
        <?php foreach ($rows as $item): ?>
        <tr>
            <td><?php echo $item['id']; ?></td>
            <td><?php echo $item['name']; ?></td>
            <td><?php echo $item['price']; ?></td>
            <td><?php echo $item['mfg']; ?></td>
            
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>