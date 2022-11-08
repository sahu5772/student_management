<?php
require_once("config-2.php");
session_start();
$student_data=$_REQUEST;


if($_SERVER['REQUEST_METHOD']=='POST' && isset($student_data['submit'])){

    if($student_data['district'] && $student_data['tehsil'] && $student_data['block'] && $student_data['village_ward'] && $student_data['panchayat_municipal'] 
    && $student_data['candidate_name'] && $student_data['mother_name'] && $student_data['father_name'] && $student_data['occupation'] && $student_data['religion'] && $student_data['pin_code'] 
    && $student_data['mobile'] && $student_data['aadhaar_number'] && $student_data['attach_id_type'] && $student_data['date_of_birth'] && $student_data['cummunity'] && $student_data['general_obc'] && 
    $student_data['asha'] && $student_data['differently_abled'] && $student_data['candidate_type'] && $student_data['institute_name']  ){
        $in_data="INSERT INTO `school_data`(`district`,`tehsil`,`block`,`village_ward`,`panchayat_municipal`,`candidate_name`,`mother_name`,`father_name`,`occupation`,`religion`,
        `pin_code`,`mobile`,`aadhaar_number`,`attach_id_type`,`date_of_birth`,`cummunity`,`general_obc`,`asha`,`differently_abled`,`candidate_type`,`institute_name`) 
        values ('".$student_data['district']."','".$student_data['tehsil'] ."','".$student_data['block']."','".$student_data['village_ward']."','".$student_data['panchayat_municipal'] ."','".$student_data['candidate_name']."',
        '".$student_data['mother_name']."','".$student_data['father_name']."','".$student_data['occupation']."','".$student_data['religion']."',".$student_data['pin_code'] .",".$student_data['mobile'].",
        ".$student_data['aadhaar_number'] .",'".$student_data['attach_id_type']."',".$student_data['date_of_birth'].",'".$student_data['cummunity']."','".$student_data['general_obc']."','".$student_data['asha']."',
        '".$student_data['differently_abled']."','".$student_data['candidate_type']."','".$student_data['institute_name'] ."')";
        $con->query($in_data);
     
        $_SESSION['success']="Class created successfully...";
        header("Location: school-data.php");
    }else{
        $_SESSION['validation_Error']="All * fields are required.";
        $_SESSION['district']=$student_Data['district'];
     
        header("Location:student-form.php");
    }
}else {
    die("Un-Authorized Access....");
    header("Location:student-form.php");
}
