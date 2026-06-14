<?php
session_start();
// $_SESSION['user_id'] =1;
// unset($_SESSION['user_id']);
if(isset ($_SESSION['user_id'])){
    header("Location: dashboard.php");
}

$pas = "1243";
$hash_pass = password_hash($pas , PASSWORD_DEFAULT);

if(isset($_POST['login'])){
    if(password_verify($_POST['password'],$hash_pass)){
        $_SESSION['user_id']=1;
        header("Location: dashboard.php");
    }else{
        $error = "Invalid Password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body style="text-align: center;">
    <h1>Login</h1>
    <form action="" method="POST">
        <label for="">Username:</label>
        <input type="text" name="username" placeholder="Username"><br><br>
        <label for="">Password:</label>
        <input type="password" name="password" placeholder="Password"><br><br>
        <button type="submit" name="login">Login</button>
        </form>
        <h3 style=" color: red;"><?= $error ?? "" ?></h3>
</body>
</html>