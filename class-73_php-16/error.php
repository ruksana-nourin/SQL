<?php
// try{
//     if(isset($_GET['name'])){
//         $name = $_GET['name'];
//         echo "Hello $name";
        
//     }else{
//         throw new Exception("Name is not set");
//     }

// }catch(Exception $e){
//     echo $e->getMessage();
// }

error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', 'error.log');

echo $dg ;
?>