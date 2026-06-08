<?php
require_once("db.php");


$sql = "SELECT c.*, t.name as teacher_name 
FROM teacher t , course c 
WHERE c.teacher_id = t.id";
$result = $db->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);
// print_r($rows);

$result_view = $db->query("SELECT * FROM vw_course");
$rows_view = $result_view->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>course</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="teacher.php">Teacher</a></li>
            <li><a href="course.php">Course</a></li>
        </ul>
    </nav>
   <h1>course View (More then 15000 tk)</h1>
    <table border="1" width="500">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>fee</th>
            <th>Teacher</th>
        </tr>
        <?php foreach ($rows_view as $item): ?>
        <tr>
            <td><?php echo $item['id']; ?></td>
            <td><?php echo $item['course_name']; ?></td>
            <td><?php echo $item['fee']; ?></td>
            <td><?php echo $item['teacher_name']; ?></td>
            
        </tr>
        <?php endforeach; ?>
    </table>
    <h1>Course List</h1>
    <table border="1" width="500">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>fee</th>
            <th>Teacher</th>
        </tr>
        <?php foreach ($rows as $item): ?>
        <tr>
            <td><?php echo $item['id']; ?></td>
            <td><?php echo $item['course_name']; ?></td>
            <td><?php echo $item['fee']; ?></td>
            <td><?php echo $item['teacher_name']; ?></td>
            
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>