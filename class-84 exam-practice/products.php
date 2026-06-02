<?php
require_once "db.php";
$sql ="
select p. *, m.name mfg 
from products p , manufacturers m 
where p.manufacturer_id = m.id
";
$result = $db -> query($sql);
$rows = $result -> fetch_all(MYSQLI_ASSOC);
// if($result){
    //     $rows = $result -> fetch_all(MYSQLI_ASSOC);
    //     // echo "<pre>";
    //     // print_r($rows);
    //     // echo "</pre>";
    // }else{
        //     echo "error";
        // }
        
$vw_result = $db -> query("select * from vw_products_list");
$view_rows = $vw_result -> fetch_all(MYSQLI_ASSOC);

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
    <h2>View Products more then 5000</h2>
    <table border="1" width="100%" cellspacing="0" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Manufactures Name</th>
            <th>Price</th>
        </tr>
        <?php foreach($view_rows as $item):?>
            <tr>
                <td><?= $item['id'];?></td>
                <td><?= $item['name'];?></td>
                <td><?= $item['mfg'];?></td>
                <td><?= $item['price'];?></td>
                
            </tr>
        <?php endforeach?>    
    </table>
    <h2>Products</h2>
    <table border="1" width="100%" cellspacing="0" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Manufactures Name</th>
            <th>Price</th>
        </tr>
        <?php foreach($rows as $item):?>
            <tr>
                <td><?= $item['id'];?></td>
                <td><?= $item['name'];?></td>
                <td><?= $item['mfg'];?></td>
                <td><?= $item['price'];?></td>
                
            </tr>
        <?php endforeach?>    
    </table>
</body>
</html>