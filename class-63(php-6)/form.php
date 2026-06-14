<?php
$email ="";
if(isset($_POST['sub'])){
    $email =$_POST["email"];
    echo $_POST['username'];
    echo"<br>";
    echo $_POST['email'];
    echo"<pre>";
    // echo print_r($_POST);
    echo "</pre>";
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
    <form method="POST">
        <label for="name" >User Name:</label>
        <input type="text" name="username" id="name"value="<?= isset($_POST["username"])? $_POST["username"]:"";?>"><br><br>
        <label for="email">Email:</label>
        <input type="text" name="email" id="email"value="<?=$email;?>"><br><br>
        <input type="submit" name="sub" id="">
        <!-- <button type="submit">Submit</button> -->
        
    </form>