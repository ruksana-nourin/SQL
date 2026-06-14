<?php
$msg = "";
if (isset($_POST['submit'])) {
    $num = $_POST['num'];
    $factorial = 1;
    for ($i = 1; $i <= $num; $i++) {
        $factorial *= $i;
    }
    $msg = "Factorial of $num is $factorial";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Factorial Calculator</title>
</head>
<body>
    <form method="post">
        <label>Enter a number:</label>
        <input type="number" name="num" required>
        <input type="submit" name="submit">
    </form>
    <p><?= $msg; ?></p>
</body>
</html>