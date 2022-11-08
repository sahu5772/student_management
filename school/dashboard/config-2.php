<?php
session_start();

$host = '127.0.0.1';
$username = 'root';
$password = 'yes';
$dbName = 'school';

$con = mysqli_connect($host, $username, $password, $dbName);

if(!$con) {
    echo "Unable to connect to Database ". mysqli_connect_error();
    die();
}
function chack($var) {
    echo "<pre>";
    print_r($var);
    echo "</pre>";
    die;
}
?>