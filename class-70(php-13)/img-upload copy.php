<?php
$msg = "";
$uploaded_file = "";
if (isset($_POST['submit'])) {
    
    $file = $_FILES["image"];
    echo "<pre>";
     print_r($file);
     echo "</pre>";


    $final_path = "upload/" . $file["name"];
    // $type = mime_content_type($file["tmp_name"]);
    // var_dump(empty($file["tmp_name"]));
    $type = !empty($file["tmp_name"]) ? mime_content_type($file["tmp_name"]) : "";
// 

    if($file["size"] == 0){
        $msg = "<span style='color:red'>Please select a file.</span>";
    }
    
    elseif ($file["size"] > (120 * 1024)) {
        $msg = "<span style='color:red'>File size should be less than 120kb</span>";
    } elseif 
        ($type == "image/jpeg" ||
            $type == "image/jpg" ||
            $type == "image/png" ||
            $type == "application/pdf" ||
            $type == "application/vnd.openxmlformats-officedocument.wordprocessingml.document"
    ) {
        $msg = "<span style='color:red'>Invalid file type.Please use jpeg,jpg,png,pdf,docx format.</span>";
    } else {
        $msg = "<span style='color:green'>File upload successfully</span>";
        move_uploaded_file($file["tmp_name"], $final_path);
        $uploaded_file = $final_path;
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
    <?= $msg ?? "" ?>

    <?php
    $img= $final_path??"";

    // if (file_exists($img)) {
    //     echo "<div>
    //     <img src='$img' width='100'>"
    //     . "</div>";
    // }
    ?>
    <?php phpinfo(); ?>
</body>

</html>