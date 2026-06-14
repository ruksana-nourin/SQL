
 <?php
class Student {
    public $id;
    public $name;
    public $batch;
    function __construct($id, $name, $batch) {
        $this->id = $id;
        $this->name = $name;
        $this->batch = $batch;
    }
    function result($id) {
        if ($this->id == $id) {
            echo "Student Found:<br><br>";
            echo "ID: " . $this->id . "<br>";
            echo "Name: " . $this->name . "<br>";
            echo "Batch: " . $this->batch . "<br>";
            echo "Result: Passed";
        } else {
            echo "Student not found";
        }
    }
}


$student = new Student(1295572, "Nourin", "Round-70");


$student->result(1295572);
echo "<br>";
echo "<br>";
// $student->result(12972);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student info</title>
</head>
<body>
    <form action="" method="POST">
        <input type="search" name = "search" value="">
        
    </form>
</body>
</html>