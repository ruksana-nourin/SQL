<?php

session_start();
$_SESSION['name'] = "Ruksana";
$_SESSION['age'] = 22;
$_SESSION['batch']= 70;
// unset($_SESSION['name']);
// session_unset();  //delate session data
session_destroy(); // remove all session data
?>