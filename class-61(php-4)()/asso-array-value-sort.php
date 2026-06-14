<?php
    
    $arr_assoc=[
        "India"=>"New Delhi",
        "Bangladesh"=>"Dhaka",
        "Nepal"=>"Kathmandu",
        "Pakistan"=>"Islamabad",
        "Srilanka"=>"Colombo",
        "Bhutan"=>"Thimphu",
        "Maldives"=>"Male"
    ];
    
    echo "<b>Main Array</b>";
    echo "<pre>";
    print_r($arr_assoc);
    echo "</pre>";
    
    echo "<b>Sorted Array for value</b>";    
    asort($arr_assoc);
    echo "<pre>";
    print_r($arr_assoc);
    echo "</pre>";
    
    echo "<b>Reversed Sorted Array for value</b>";    
    arsort($arr_assoc);
    echo "<pre>";
    print_r($arr_assoc);
    echo "</pre>";
    
    
    

    ?>