<?php
$assoc = array(
    "Russia" => "Moscow",
    "Nepal" => "Kathmandu",
    "Bangladesh"=> "Dhaka",
    "Germany" => "Berlin",
    "Japan" => "Tokyo",
)
;
echo "Main Array: <br><br>";
// echo "<pre>";
// print_r($assoc);
// echo "</pre>";
// echo "<br>";

foreach($assoc as $k => $val){
    echo "$k : $val <br>";
}

echo "<hr>";
echo "Sort Array: <br><br>";

ksort($assoc);
foreach($assoc as $k => $val){
    echo "$k : $val<br>";
}
// echo "<pre>";
// print_r($assoc);
// echo "</pre>";
?>