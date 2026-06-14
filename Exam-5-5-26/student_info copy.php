<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student info</title>
</head>

<body>
    <form method="post">
        <label>student info</label><br>
        <input type="number" name="id" id=""><br><br>
        <button type="submit" name="submit">Submit</button>
        <h4><?= $msg ?? "" ?></h4>
    </form>
</body>

</html>

<?php
$students = [
    "1" => [
        "name" => "Nourin",
        "batch" => "70"
    ],
    "2" => [
        "name" => "Mina",
        "batch" => "64"
    ],
    "3" => [
        "name" => "Rani",
        "batch" => "66"
    ]
];
class Student
{
    public $id;
    public $name;
    public $batch;

    function __construct($_id)
    {
        global $students;

        $this->id = $_id;
        $this->name = $students[$_id]["name"];
        $this->batch = $students[$_id]["batch"];

        $this->info($this->id);
    }

    function info($x)
    {
        echo "
        <b>Student id:</b> {$this->id}<br>
        <b>Student Name:</b> {$this->name}<br>
        <b>Student Batch:</b> {$this->batch}<br>
        ";
    }
}

if (isset($_POST["submit"])) {
    if(!empty($_POST["id"])) {
    $student = new Student($_POST["id"]);
    }
}



?>