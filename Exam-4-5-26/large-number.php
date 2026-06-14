<?php
$msg ="";

if(isset($_POST['submit'])){
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $num3 = $_POST['num3'];

    if($num1>$num2 && $num1>$num3){
        $msg = $num1." is the largest number";
    }elseif($num2>$num1 && $num2>$num3){
        $msg = $num2." is the largest number";
    }elseif($num3>$num1 && $num3>$num2){
        $msg = $num3." is the largest number";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Large number</title>
</head>
<body>
    <form action="" method="POST">
        <input type="number" name="num1">
        <input type="number" name="num2">
        <input type="number" name="num3">
        <input type="submit" name="submit" value="submit">
    </form>
    <h2><?= $msg; ?></h2>
</body>
</html>