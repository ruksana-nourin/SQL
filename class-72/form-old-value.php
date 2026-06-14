<?php

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form-old-value</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="name" value="<?= $_POST['name'] ?? ''?>">
        <input type="submit" value="Submit">
    
</body>
</html>