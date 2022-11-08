<?php

require_once("config.php");

$section_Data = $_REQUEST;
// print_r("<pre>");
// print_r($section_Data);
// die;

if($_SERVER['REQUEST_METHOD']=='POST' && isset($section_Data['section_submit'])) {

    if($section_Data['class_id'] && $section_Data['section_name'] ) {
        $in_section = "INSERT INTO `manage_section`(`class_id`, `section_name`) values (".$section_Data['class_id'].", '".$section_Data['section_name']."')";
        $con->query($in_section);
        // print_r("<pre>");
        // print_r($in_section);
        // die;

        $_SESSION['success']="Class created successfully...";
        header("Location: manage_section.php");
    } else {
        $_SESSION['validation_Error']="All * fields are required.";
        $_SESSION['class_id']=$section_Data['class_id'];
        $_SESSION['section_name']=$section_Data['section_name'];
        header("Location: manage_section.php");
    }

}