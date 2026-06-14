<?php
$arr=["Apple", "Banana","jackfruits", "Cherry", "Durian", "Eggplant", "Fig"];

echo "<pre>";
print_r(array_reverse($arr));
echo "</pre>";

$arr2 =[
    "A" => "Apple", 
    "B" => "Banana", 
    "C" => "Cherry",
    "D" => "Durian",
    "E" => "Eggplant",
    "F" => "Fig"
];
echo "<pre>";
print_r(array_flip($arr2));
echo "</pre>";

echo "<pre>";
print_r(array_flip($arr));
echo "</pre>";

$arr3= array_flip($arr);

echo "<pre>";
print_r(array_flip($arr3));
echo "</pre>";
?>