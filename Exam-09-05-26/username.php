<?php
$msg="";
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    // echo "Username: $username";
    $valuser = "/^[@]{1}[a-zA-Z0-9_.]{3,7}$/";
    if(strlen(($username))<4 || strlen(($username))>8){
        $msg = "Username must be 4-8 characters";
        
    }elseif(!preg_match($valuser,$username)){
        $msg = "Username must start with @";

    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Name</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name = "username" value="@nourin">
        <input type="submit" name="submit">
    </form>
    <h3 style="color: red;"><?php echo $msg; ?></h3>
</body>
</html>