<?php
$file =fopen("student.csv","a+");
fputcsv($file,[5,"Rita",18]);
fclose($file);

$file =fopen("student.csv","r");
// print_r(fgetcsv($file)); echo "<br>";
// print_r(fgetcsv($file)); echo "<br>";
// var_dump(fgetcsv($file));
while($row = fgetcsv($file)){
    echo "ID : {$row[0]}<br>";
    echo "Name: {$row[1]}<br>";
    echo "Age: {$row[2]}<br>";
    echo "<hr>";
}
fclose($file);

?>