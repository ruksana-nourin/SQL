<?php
$msg ="";
if(isset($_POST['submit_checkbox'])){
    // echo "<pre>";
    // print_r($_POST['check']);
    // echo "</pre>";
    $skills = $_POST['check'] ?? [];
    if(count($skills)<1){
        $msg = '<span style="color:red"><br>Please select at least one skill.</span>';
    }else{
       echo "You have selected " .count($skills). "skill". (count($skills)>1 ? "s": "");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>checkbox</title>
</head>
<body>
    <form action="" method="POST">
        <input type="checkbox" name="check[]" value="1">1
        <input type="checkbox" name="check[]" value="2">2
        <input type="checkbox" name="check[]" value="3">3
        <input type="checkbox" name="check[]" value="4">4
        <input type="checkbox" name="check[]" value="5">5
        <input type="submit" name="submit_checkbox" value="submit">
    </form>
    <?= $msg;?>
</body>
</html>