<?php
$arr = array(
    "Nepal" => "Khatmundu",
    "Bangladesh" => "Dhaka",
    "Japan" => "Tokeyo",
    "Germany" => "Berlin",
    "Bhutan" => "Thimpu",
    "Srilanka" => "Colombo",
    "Maldives" => "Male",
    "Switzerland" => "Zurich"

);

echo " Array Before Sorting<br><br>";
// echo "<pre>";
// echo print_r($arr);
// echo "</pre>";
foreach($arr as $country => $capital){
    echo $country . " = " . $capital . "<br>";
};

echo "<br>";

echo " Array After Sorting<br><br>";
ksort($arr);
// echo "<pre>";
// echo print_r($arr);
// echo "</pre>";

foreach($arr as $country => $capital){
    echo $country . " = " . $capital . "<br>";
};

?>