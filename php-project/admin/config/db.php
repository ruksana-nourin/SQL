<?php
//localhost
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'ecom');

//Hosting

// define('DB_HOST', 'htttp://ecom');
// define('DB_USER', 'abc');
// define('DB_PASS', '12345');
// define('DB_NAME', 'ecom');

$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if($db->connect_error){
    die("Connection failed:" . $db->connect_error);
}
// else{
//     echo "Connected Successfully";
// }

?>