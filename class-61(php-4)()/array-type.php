<?php
    /*
    1.numaric/indexed Array
    2.associative Array
    3.multidimensional Array
    */
    $arr_num=["a","b",false,123];

    echo "<pre>";
    print_r($arr_num);
    var_dump($arr_num);
    echo "</pre>";


    $arr_ass=[
        "a"=>"apple",
        "b"=>"banana",
        "c"=>"cherry",
        "name"=>"jhon",
        "email" =>[
            "e1"=>"7EoJ5@example.com",
            "e2"=>"ruksananourin@example.com"
        ]
    ];
    $arr_ass["name"]="Ruksana";
    
    echo "<pre>";
    print_r($arr_ass);
    var_dump($arr_ass);
    echo "</pre>";
    echo $arr_ass["email"]["e2"];


    $arr_multi=[
        ["a","b","c"],
        ["d","e","f"],
        ["g","h","i"]
    ];
    echo "<pre>";
    print_r($arr_multi);
    var_dump($arr_multi);
    echo "</pre>";
    

?>