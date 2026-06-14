<?php
$arr=["Rat","Ball","Banana","Cat","Orange","Pineapple"];
echo "<pre>";
print_r($arr);
echo "</pre>";


usort($arr,function($a,$b){
    return strlen($a)-strlen($b);
    // return strlen($b)-strlen($a);
}

);
echo "<pre>";
print_r($arr);
echo "</pre>";
?>