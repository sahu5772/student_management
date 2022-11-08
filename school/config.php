<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$host = '127.0.0.1';
$username = 'root';
$password = 'yes';
$dbName = 'school_data';

$con = mysqli_connect($host, $username, $password, $dbName);

if(!$con) {
    echo "Unable to connect to Database ". mysqli_connect_error();
    die();
}
// echo "Connection Success...";
?>