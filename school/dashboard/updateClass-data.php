<?php
require_once("config.php");
require_once("validation.php");

$class_data = $_REQUEST;

$id = $class_data['id'];
$class=$class_data['class'];
$status=$class_data['status'];
$section_name=$class_data['section_name'];


// echo('$candidate_name');
// die;
 $updSql = "UPDATE `classes` SET class='$class',status='$status',section_name='$section_name' where id=$id";
$con->query($updSql);
// die;
$_SESSION['success']="Record Update successfully...";
header("Location: manage-class.php");