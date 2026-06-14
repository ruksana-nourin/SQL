<?php
$msg = "";
if(isset($_POST["submit-btn"])){
    $result = $_POST["grade"];

    if($result=="A" || $result=="a"){
        $msg= "Excellent";
    }else if($result=="B" || $result=="b"){
        $msg= "Good";
    }else if($result=="C" || $result=="c"){
        $msg= "Fair";
    } else if($result=="D" || $result=="d"){
        $msg= "Poor";
    } else if( $result=="F" || $result=="f"){
        $msg = "Failure";
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GRADE</title>
</head>

<body>
    <form action="" method="POST">
        <h6>Enter Your Grade</h6>
        <input type="text" name="grade">
        <input type="submit" name="submit-btn">
    </form>
    <h2><?= $msg; ?></h2>
</body>

</html>