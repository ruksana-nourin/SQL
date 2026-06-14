
 
 
 <?php

 $arr = [
           ["id" => 101, "name" => "Nourin", "batch" => "Round-70"],
           ["id" => 102, "name" => "Mina", "batch" => "Round-71"],
           ["id" => 103, "name" => "Rina", "batch" => "Round-72"],
           ["id" => 104, "name" => "Tina", "batch" => "Round-73"],
           ["id" => 105, "name" => "Dina", "batch" => "Round-74"]

           
 ];

 if(isset($_POST["id"])){
     $id = $_POST["id"];
     $student = new Student($id);
     $msg = $student->result($id);
     
 }
class Student {
    public $id;
    public $name;
    public $batch;
    function __construct($id, $name="", $batch="") {
        $this->id = $id;
        $this->name = $name;
        $this->batch = $batch;
    }
    function result($id) {
     global $arr;
     foreach ($arr as $item) {
         if ($item["id"] == $id) {
             $res = "ID: {$item["id"]}<br>Name: {$item["name"]}<br>Batch: {$item["batch"]}<br>";
             return $res;
         }
     }
        // if ($this->id == $id) {
        //     echo "Student Found:<br><br>";
        //     echo "ID: " . $this->id . "<br>";
        //     echo "Name: " . $this->name . "<br>";
        //     echo "Batch: " . $this->batch . "<br>";
        //     echo "Result: Passed";
        // } else {
        //     echo "Student not found";
        // }
    }
}
// if (isset($_POST["search"])) {
//     $id = $_POST["id"];
//     $student = new Student($id);
//     $student->result($id);
// }

// $student = new Student(1295572, "Nourin", "Round-70");


// $student->result(1295572);
// echo "<br>";
// echo "<br>";
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
        <label>student ID</label>
        <input type="search" name = "id" value="">
        <button type="submit" name="search">Search</button>
        
    </form>
    <h4><?= $msg ?? "" ?></h4>
</body>
</html>
