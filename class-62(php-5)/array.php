<?php
$str = "Hello World of PHP!";
$arr= explode(" ",$str);

echo "<pre>";
print_r($arr);
echo "</pre>";

$newstr = implode(":", $arr);
echo"<pre>";
echo $newstr;
echo "</pre>";

$arr2 = range(0,100,10);
echo"<pre>";
print_r($arr2);
echo "</pre>";

//array-key-exists

$arr_assoc = array(
    "a" => "apple", 
    "b" => "banana", 
    "c" => "cherry");
echo "<pre>";
print_r(array_key_exists("d", $arr_assoc));
echo "</pre>";

$keys = array_keys($arr_assoc);
echo "<pre>";
print_r($keys);
echo "</pre>";

$vals = array_values($arr_assoc);
echo "<pre>";
print_r($vals);
echo "</pre>";
?>