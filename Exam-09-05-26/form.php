<?php

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $score = $_POST['score'];
    $grade = $_POST['grade'];
    echo "ID: $id <br>";
    echo "Name: $name <br>";
    echo "Score: $score <br>";
    echo "Garde: $grade <br>";
    class Student {
        $id = $this -> id;
        $name = $this -> name;
        $score = $this -> score;
        $grade = $this -> grade;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form</title>
</head>
<body>
    <form action="" method="POST">
        <label for="">ID:</label><br>
        <input type="number" name="id">
        <br>
        <label for="">Name:</label><br>
        <input type="text" name="name">
        <br>
        <label for="">Score:</label><br>
        <input type="text" name="score">
        <br>
        <label for="">Garde:</label><br>
        <input type="text" name="grade">
        <br>
        <input type="submit" name="submit">

    </form>
</body>
</html>