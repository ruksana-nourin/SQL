<?php
$msg = "";
if(isset($_POST['submit'])){
    $num=$_POST['number'];
    $prime =true;
    if($num<=1){
            $prime = false;
        } else{
            for( $i = 2; $i<$num; $i++){
                if($num % $i == 0){
                    $prime = false;
                    break;
                }
            }
        }
        if($prime){
            $msg = $num ." is a prime number";
        } else{
            $msg = $num ." is not a prime number";
            
        }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>prime number</title>
</head>
<body>
    <form action="" method="POST">
        <input type="number" name="number">
        <input type="submit" name="submit" value="submit">
    </form>
    <h2><?=$msg?></h2>
</body>
</html>