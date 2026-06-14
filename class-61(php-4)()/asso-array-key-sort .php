<?php
    
    $arr_assoc=[
        "India"=>"New Delhi",
        "Bangladesh"=>"Dhaka",
        "Nepal"=>"Kathmandu",
        "Pakistan"=>"Islamabad",
        "Srilanka"=>"Colombo",
        "Denmark"=>"Copenhagen",
        "Maldives"=>"Male",
        "Canada"=>"ottawa"
    ];
    
    echo "<b>Main Array</b>";
    echo "<pre>";
    print_r($arr_assoc);
    echo "</pre>";
    
    echo "<b>Sorted Array for key</b>";    
    ksort($arr_assoc);
    echo "<pre>";
    print_r($arr_assoc);
    echo "</pre>";
    
    echo "<b>Reversed Sorted Array for key</b>";    
    krsort($arr_assoc);
    echo "<pre>";
    print_r($arr_assoc);
    echo "</pre>";
    
    
    

    ?>