<?php
//new mysqli(host, user, password, database);

//local
// define("DB_HOST", "localhost");
// define("DB_USER", "root");
// define("DB_PASS", "");
// define("DB_NAME", "round_70");


//Hosting
// define("DB_HOST", "abc.com");
// define("DB_USER", "round_70");
// define("DB_PASS", "4667798");
// define("DB_NAME", "round_70");

// $db = new mysqli("DB_HOST", "DB_USER", "DB_PASS", "DB_NAME");


//for exam 
$db = new mysqli("localhost", "root", "", "round_70");

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
// else{
//     echo "Connected successfully";
// }

?>