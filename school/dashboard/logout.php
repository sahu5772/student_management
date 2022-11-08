<?php
include_once("config.php");

unset($_SESSION['isLoggedIn']);
unset($_SESSION['name']);
$_SESSION['success'] = "You are logged out successfully...";
header("Location: index.php");
