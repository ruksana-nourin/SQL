<?php
$msg = "";
$smsg = "";
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $matchpass = $_POST['confirmpassword'];
    $validemail = "/^[a-zA-z0-9_.]{3,20}[@]{1}[a-zA-z]{3,10}[.]{1}[a-zA-z]{2,3}$/";

    if (empty($email) && empty($password)) {
        $msg = "All fields are required";
    } elseif (!preg_match($validemail, $email)) {
        $emsg = "Email is not valid";
    }
    if ($password != $matchpass ) {
        $pmsg = "Password is not Match";
    }elseif(strlen($password) < 8){
        $pmsg = "Password must be at least 8 characters";
        
    }
     elseif ($password == $matchpass && (preg_match($validemail, $email))){
        $smsg = "Login successfully";
    }


    // echo $email;
    // echo "<br>";
    // echo $password;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password</title>
</head>

<body>
    <form action="" method="POST">
        <label for="">Email:</label>
        <input type="text" name="email" value="<?= $email ?? "" ?>">
        <p style="color: red;"><?= $emsg ?? "" ?></p>

        <label for="">Password:</label>
        <input type="password" name="password"><br><br>
        <label for="">Confirm Password:</label>
        <input type="password" name="confirmpassword">
        <p style="color: red;"><?= $pmsg ?? "" ?></p>

        <button type="submit" name="submit">Submit</button>
    </form>
    <h3 style="color: red;"><?php echo $msg; ?></h3>
    <h3 style="color: green;"><?php echo $smsg; ?></h3>
</body>

</html>