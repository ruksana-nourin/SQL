<?php
require_once("db.php");

if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $qualification = $_POST['qualification'];
    $contact_no = $_POST['contact_no'];

    
    $db->query("call add_teacher('$name', '$qualification', '$contact_no')");
}
if(isset($_POST['delete_id'])) {
    $id = $_POST['delete_id'];
    $db->query("delete from teacher where id = $id");
}
$sql = "SELECT * FROM teacher";
$result = $db->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);
// print_r($rows);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="teacher.php">Teacher</a></li>
            <li><a href="course.php">Course</a></li>
        </ul>
    </nav>
    <h1>Teacher INFO</h1>
    <form action="teacher.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        <label for="qualification">Qualification:</label>
        <input type="text" id="qualification" name="qualification" required><br><br>

        <label for="contact_no">Contact No:</label>
        <input type="text" id="contact_no" name="contact_no" required><br><br>
        <input type="submit" value="Add Teacher" name="submit">
    </form>

    <h1>Teacher List</h1>
    <table border="1" cellpadding="10" cellspacing="0" style="margin-top: 20px;" width="700">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Qualification</th>
            <th>Contact No</th>
            <th>Action</th>
        </tr>

        <?php foreach ($rows as $item): ?>
        <tr>
            <td><?php echo $item['id']; ?></td>
            <td><?php echo $item['name']; ?></td>
            <td><?php echo $item['qualification']; ?></td>
            <td><?php echo $item['contact_no']; ?></td>
            <td>
                <form action="" method="POST">
                    <input type="hidden" name="delete_id" value="<?php echo $item['id']; ?>">
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
        
    </table>
</body>
</html>