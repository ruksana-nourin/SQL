<?php
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $emailRegex = "/^[a-zA-z0-9_.]{3,20}[@]{1}[a-zA-z]{3,10}[.]{1}[a-zA-z]{2,3}$/";
    // echo $email."<br>";
    // echo $password."<br>";
    // echo $confirmpassword."<br>";
     if(empty($email) ){
        $emailError = "Email is required";
     }elseif(!preg_match($emailRegex, $email)){
        $emailError = "Email is not valid";
     }else{
        $emailError = "";
     }


     if(empty($password) ){
        $passwordError = "Password is required";
     }elseif(strlen($password) < 8){
         $passwordError = "Password must be at least 8 characters";
     }else {
        $passwordError = "";
     }


     if(empty($confirmpassword) ){
        $confirmpasswordError = "Confirm Password is required";
     }elseif($confirmpassword != $password){
        $confirmpasswordError = "Password and Confirm Password does not match";
     }else{
        $confirmpasswordError = "";
     }

     if($emailError == "" && $passwordError == "" && $confirmpasswordError == ""){
        $msg= "Login successfully";
     }

    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
    <style>
        .error{
            color: red;
        }
    </style>
</head>
<body>
    <form action="" method="POST">
        <label for="">Email</label>
        <input type="text" name="email" value="<?= $email ?? ""?>"><br><br>
        <div class="error"><?= $emailError ?? "" ?></div>

        <label for="">Password</label>
        <input type="password" name="password" value="<?= $password ?? ""?>"><br><br>
        <div class="error"><?= $passwordError ?? "" ?></div>

        <label for="">Confirm Password</label>
        <input type="password" name="confirmpassword" value="<?= $confirmpassword ?? ""?>"><br><br>
        <div class="error"><?= $confirmpasswordError ?? "" ?></div>

        <button type="submit" name="submit">Submit</button>
    </form>
    <h5 style="color:green"><?= $msg ?? "" ?></h5>
</body>
</html>