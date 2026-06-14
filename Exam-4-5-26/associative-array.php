<?php
$assoiciativeArray = array(
    "Mina" => 80,
    "Tina" => 90,
    "Rani" => 70,
    "Shuvo" => 85,
    "Shai" => 75
);
//  echo "<pre>";
//  print_r($assoiciativeArray);
//  echo "</pre>";
//  foreach($assoiciativeArray as $key => $value){
//     echo "<tr>";
//     echo "<td style= ' border: 1px solid black;'>$key</td> : ";
//     echo "<td style= ' border: 1px solid black;'>$value</td><br>";
//     echo "</tr>";
//  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assoiciative Array</title>
</head>

<body>
    <table>
        <tr>
            <th style=" border: 1px solid black;">Student Name</th>
            <th style=" border: 1px solid black;">Score</th>
        </tr>
       
            <?php
            foreach ($assoiciativeArray as $key => $value) {
                echo "<tr>";
                echo "<td style= ' border: 1px solid black;'>$key</td> ";
                echo "<td style= ' border: 1px solid black;'>$value</td>";
                echo "</tr>";
            };
            
            
            ?>
       
    </table>
</body>

</html>