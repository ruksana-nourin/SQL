<?php
    $arr=["mina","raju","mithu"];

    echo "<b>Main Array</b>";
    echo "<pre>";
    print_r($arr);
    echo "</pre>";

    array_push($arr,"roxy");

    echo "<b>Array Push</b>";
    echo "<pre>";
    print_r($arr);
    echo "</pre>";

    array_pop($arr);

    echo "<b>Array Pop</b>";
    echo "<pre>";
    print_r($arr);
    echo "</pre>";

    array_shift($arr);

    echo "<b>Array Shift</b>";
    echo "<pre>";
    print_r($arr);
    echo "</pre>";

    array_unshift($arr,"roxy");

    echo "<b>Array Unshift</b>";
    echo "<pre>";
    print_r($arr);
    echo "</pre>";

?>