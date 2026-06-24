<?php
foreach (glob("models/*.class.php")as $filename){
    require_once($filename);
}
foreach (glob("api/*-api.php")as $filename){
    require_once($filename);
}
 require_once("product-api.php");
 
    // echo "API";
    if (isset($_GET['method'])){
        $api_route = $_GET['method'];

        if($api_route == 'get-products'){
            getProducts();
            // echo "api data";

        }elseif($api_route == 'test'){
            echo 'test api';
        }

    }

?>