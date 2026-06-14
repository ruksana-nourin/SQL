<?php
$msg ="";
$msg2 ="";
if(isset($_POST['submit'])){
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $num3 = $_POST["num3"];
    /*echo $num1. "<br>";
    echo $num2. "<br>";
    echo $num3. "<br>";*/
    if($num1>$num2 && $num1>$num3){
        $msg = $num1. " is The Largest Number";
    }else if($num2>$num1 && $num2>$num3){
        $msg = $num2. " is The Largest Number";
    }else if($num3>$num1 && $num3>$num2){
        $msg = $num3. " is The Largest Number";
}
    if($num1<$num2 && $num1<$num3){
        $msg2 = $num1. " is The Smallest Number";
    }else if($num2<$num1 && $num2<$num3){
        $msg2 = $num2. " is The Smallest Number";
    }else if($num3<$num1 && $num3<$num2){
        $msg2 = $num3. " is The Smallest Number";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <input type="number" name="num1">
        <input type="number" name="num2">
        <input type="number" name="num3">
        <input type="submit" name="submit">
       
        
    </form>
    <h2><?=$msg?></h2>
    <h2><?=$msg2?></h2>