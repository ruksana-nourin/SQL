<?php
$assoc = array(
    "Russia" => "Moscow",
    "Nepal" => "Kathmandu",
    "Bangladesh"=> "Dhaka",
    "Germany" => "Berlin",
    "Japan" => "Tokyo",
)
;
echo "Main Array <br>";
echo "<pre>";
print_r($assoc);
echo "</pre>";
echo "<br>";



echo "sort Array";
ksort($assoc);
echo "<pre>";
print_r($assoc);
echo "</pre>";
?>