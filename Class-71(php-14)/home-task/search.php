<?php
require_once "files/student.class.php";

if(isset($_POST["id"])){
//    $id=$_POST["id"];
//    echo $id;
    $s = new Student();
    $res = $s->result($_POST["id"]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Student</title>
</head>
<body>
    <nav>
        <a href="create.php">New Student</a>
        | 
        <a href="list.php">Students List</a>
        | 
        <a href="search.php">Find Student</a>
    </nav>
    <h3>Find student by ID</h3>
    <form action="" method="POST">
        <input type="search" name="id" id="id">
        <button type="submit">Search</button>
    </form>
    <h3 style="color: blue; text-align: center font-family: sans-serif"><?= $res ?? ""?></h3>
</body>
</html>