<?php
    /*echo "PHP TOP", "<br>", "PHP Top-2";
    echo ("<br>New line <br>");

    print ("Print Line-1<br>");
    print ("<br>");
    print ("Print Line-2");

    $arr =["Html", "css", "js", 1295572];
    const PI = 3.1416;
    print ("<br><br>");
    // echo $arr;
    print_r($arr);
    print ("<br>");
    var_dump($arr);*/
    $name = "Mina";
    $age = 25;

    printf("Her name is %s and age is %d" , $name, $age);
    print ("<br>");
    print("Her name is ". $name . " and age is " . $age  );
    print ("<br>");
    $str = sprintf("Her name is %s and age is %d" , $name, $age);

    echo $str;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>HTML Section</h2>
    <h3><?php #echo "PHP in HTML"; ?></h3>
    <h3><?= "This is another PHP in HTML"; ?></h3>
</body>

</html>
<?php
#echo "PHP Bottom";
?>

<?="PHP Bottom"?>
<br>
<? echo "PHP Bottom -2 short_open_tag";?>