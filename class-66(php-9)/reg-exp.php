<?php
// if($_SERVER['REQUEST_METHOD'] == 'POST'){
//     echo $_POST['Email'];
// }elseif($_SERVER['REQUEST_METHOD'] == 'GET'){
//     echo $_GET['Email'];
// }

// $_GET['Email'];
// $msg="";

if(isset($_POST['form_email'])){
    // echo $_POST['email'];
    // echo "<br>";
    // echo $_POST['username'];
    $email = $_POST['email'];
    $reg_email = '/^[a-zA-z0-9_.]{3,60}[@]{1}[a-zA-z0-9-]{2,20}[.]{1}[a-zA-z]{2,6}$/';
    if(empty($email)){
        $email_error= "Email is required.";
    }elseif(preg_match($reg_email,$email)){
        $email_error= "";
        
    }else{
        $email_error= "Email is not valid.";
    }


    if($email_error==""){
        $msg = "Form submitted successfully";
    }


    $username = $_POST['username'];
    $reg_name = '/^[@]{1}[a-zA-z0-9_.]{3,7}$/';
    if(empty($username)){
        $name_error= "Username is required.";
    }
    elseif(strlen($username)>8 || strlen($username)<4){
        $name_error= "Username is not support under 4 or more than 8 characters.";
        
    }elseif(preg_match($reg_name,$username)){
        $name_error= "";
        
    }else{
        $name_error= "Username is must have @ sign.";
    }
    if($name_error==""){
        $msg = "Form submitted successfully";
    }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error-text{
            color: red;
        }
        .success{
            color: green;
        }
    </style>
</head>
<body>
    <form action="" method="POST">
        <label for="">UserName:</label>
        <input type="text" name="username" value="<?= $_POST['username']??""?>">
        <div class="error-text"><?=$name_error??""?></div><br>

        <label for="">Email:</label>
        <input type="text" name="email" value="abc@gmail.com">
        <div class="error-text"><?=$email_error??""?></div><br>

        <input type="submit" name="form_email" value="submit" class="success">
    </form>
    <h3 class="success"><?=$msg??""?></h3>
</body>
</html>