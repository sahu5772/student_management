<?php
session_start();
require_once("config.php");

$classData = $_REQUEST;
print_r("<pre>");
print_r($classData);
die;

if($_SERVER['REQUEST_METHOD']=='POST' && (isset($classData['submit']))) {

    if($formData['class'] && ($formData['status'] or (int)$formData['status']===0)) {
        $in_Class = "INSERT INTO `classes`(`class`, `status`) values ('".$formData['class']."', ".$formData['status'].")";
        $con->query($in_Class);
        $_SESSION['success']="Class created successfully...";
        header("Location:class.php");
    } else {
        $_SESSION['validation_error']="All * fields are required.";
        $_SESSION['class_name']=$formData['class_name'];
        $_SESSION['status']=$formData['status'];
        header("Location:add-class.php");
    }
} else {
    die("Un-Authorized Access....");
}