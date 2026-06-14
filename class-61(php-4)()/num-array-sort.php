<?php
    $arr=["mango","apple","banana","cherry","orange","pineapple"];
    $arr_num=[103,20,345,42,5,0];

echo "<b>Main Array</b>";
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
    
echo "<b>Sorted Array</b>";
    sort($arr);
    sort($arr_num);
    
    echo "<pre>";
    print_r($arr);
    print_r($arr_num);
    echo "</pre>";
    
echo "<b>Reverse Sorted Array</b>";
    rsort($arr);
    rsort($arr_num);
    
    echo "<pre>";
    print_r($arr);
    print_r($arr_num);
    echo "</pre>";
    
    

    ?>