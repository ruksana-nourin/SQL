<?php
$msg="";
$uploaded_file = "";
if(isset($_POST['submit'])){
    // $image = $_FILES['image'];
    echo "<pre>";
    // print_r($_FILES['image']);
    echo "</pre>";
    $file = $_FILES["image"];
    // echo $file["tmp_name"];

    $final_path = "upload/".$file["name"];

    if($file["size"]>(120*1024)){
        $msg= "<span style='color:red'>File size should be less than 120kb</span>";
    }elseif((($file["type"]=="image/jpeg") || 
    ($file["type"]=="image/jpg") ||
    ($file["type"]=="image/png") || 
    ($file["type"]== "application/pdf") ||
    ($file["type"]== "application/vnd.openxmlformats-officedocument.wordprocessingml.document"))===false){
        $msg= "<span style='color:red'>Invalid file type.Please use jpeg,jpg,png,pdf,docx format.</span>";
    }
    
    else{
        $msg= "<span style='color:green'>File upload successfully</span>";
        move_uploaded_file( $file["tmp_name"], $final_path);
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
    <?=$msg??""?>

<?php if(!empty($uploaded_file)) : ?>
    <div>
        <p>Uploaded Image:</p>
        <img src="<?=$uploaded_file?>" width="200">
    </div>
<?php endif; ?>
</body>
</html>