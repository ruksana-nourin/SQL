<?php
$msg = "";
if(isset($_POST['submit'])){
    $num1 = $_POST['number1'];
    $num2 = $_POST['number2'];
    $num3 = $_POST['number3'];
    // echo $num1;
    if($num1>$num2 && $num1>$num3){
        $msg = $num1 . " is the largest number";
    }elseif($num2>$num1 && $num2>$num3){
        $msg = $num2 . " is the largest number";
    }elseif($num3>$num1 && $num3>$num2){
        $msg = $num3 . " is the largest number";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>largest number</title>
</head>
<body>
    <form action="" method="POST">
        <input type="number" value="10" name="number1">
        <input type="number" value="20" name="number2">
        <input type="number" value="30" name="number3">
        <input type="submit" value="submit" name="submit">
    </form>
    <h2><?=$msg?></h2>
</body>
</html>