<?php
$msg = "";
if(isset($_POST['submit'])){
    $num = $_POST['number'];
    $count =0 ;
    for($i=1; $i<=$num; $i++){
        if($num%$i==0){
            $count++;
        }
    }
    if($count==2){
        $msg = $num . " is a prime number";
    }else{
        $msg = $num . " is not a prime number";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>prime</title>
</head>
<body>
    <form action="" method="POST">
        <input type="number" value="5" name="number">
        <input type="submit" value="submit" name="submit">
    </form>
    <h2><?php echo $msg; ?></h2>
</body>
</html>