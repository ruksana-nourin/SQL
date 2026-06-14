<?php
$msg = "";
$uploaded_file = "";
if (isset($_POST['submit'])) {
    $file = $_FILES['image'];
    $finalpath = "upload/" . $file['name'];
    // echo "<pre>";
    // print_r($file);
    // echo "</pre>";

    if ($file['size'] == 0) {
        $msg = "Please select a image";
    } elseif ($file["size"] > (400 * 1024)) {
        $msg = "<span style='color:red'>File size should be less than 400kb</span>";
    } elseif (
        (($file["type"] == "image/jpeg") ||
            ($file["type"] == "image/jpg") ||
            ($file["type"] == "image/png") ||
            ($file["type"] == "application/pdf") ||
            ($file["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")) === false
    ) {
        $msg = "<span style='color:red'>Invalid file type.Please use jpeg,jpg,png,pdf,docx format.</span>";
    } else {
        $msg = "<span style='color:green'>File upload successfully</span>";
        move_uploaded_file($file["tmp_name"], $finalpath);
        $uploaded_file = $finalpath;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image validation</title>
</head>

<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="image">
        <input type="submit" name="submit">
    </form>
    <h3 style="color: red;"><?php echo $msg; ?></h3>
    <?php
    if (isset($uploaded_file)) {
        echo '<div>
            <p> Uploaded Image: </p>
            <img src="'.$uploaded_file.'" width="100">
          </div>';
    }
    ?>
</body>

</html>