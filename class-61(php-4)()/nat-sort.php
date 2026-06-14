<?php
$arr=["picture1","picture2","picture3","picture10","picture9","Picture5"];
    echo "<pre>";
    print_r($arr);
    echo "</pre>";

echo "<b>Sorted Array</b>";
    natsort($arr); //case sensitive
    echo "<pre>";
    print_r($arr);
    echo "</pre>";

    natcasesort($arr); //case insensitive
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
?>