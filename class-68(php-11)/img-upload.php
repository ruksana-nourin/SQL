<?php
if(isset($_POST['submit'])){
    // $image = $_FILES['image'];
    echo "<pre>";
    // print_r($_FILES['image']);
    echo "</pre>";
    $file = $_FILES["image"];
    // echo $file["tmp_name"];

    $final_path = "upload/".$file["name"];

    if($file["size"]>120*1024){
        echo "<span style='color:red'>File size should be less than 120kb</span>";
    }else{
        echo "<span style='color:green'>File upload successfully</span>";
        move_uploaded_file( $file["tmp_name"], $final_path);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>image</title>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="image">
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>