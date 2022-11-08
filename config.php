<?php
$host = '127.0.0.1';
$username = 'root';
$password = 'yes';
$dbName = 'school management';

$con = mysqli_connect($host, $username, $password, $dbName);

if(!$con) {
    echo "Unable to connect to Database ". mysqli_connect_error();
    die();
}
// echo "Connection Success...";
?>