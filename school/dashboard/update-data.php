<?php
require_once("config-2.php");
require_once("validation.php");

$student_data = $_REQUEST;

$id = $student_data['id'];
$district=$student_data['district'];
$tehsil=$student_data['tehsil'];
$block=$student_data['block'];
$village_ward=$student_data['village_ward'];
$panchayat_municipal=$student_data['panchayat_municipal'];
$candidate_name=$student_data['candidate_name'];
$mother_name=$student_data['mother_name'];
$father_name=$student_data['father_name'];
$occupation=$student_data['occupation'];
$religion=$student_data['religion']; 
$pin_code=$student_data['pin_code'];
$mobile=$student_data['mobile'];
$aadhaar_number=$student_data['aadhaar_number'];
$attach_id_type=$student_data['attach_id_type'];
$date_of_birth=$student_data['date_of_birth'];
$cummunity=$student_data['cummunity'];
$general_obc=$student_data['general_obc'];
$asha=$student_data['asha'];
$differently_abled=$student_data['differently_abled'];
$candidate_type=$student_data['candidate_type'];
$institute_name=$student_data['institute_name'];
// echo('$candidate_name');
// die;
 $updSql = "UPDATE `school_data` SET district='$district',tehsil='$tehsil',block='$block',village_ward='$village_ward',panchayat_municipal='$panchayat_municipal',candidate_name='$candidate_name',mother_name='$mother_name',father_name='$father_name',occupation='$occupation',religion='$religion',pin_code=$pin_code,mobile=$mobile,aadhaar_number=$aadhaar_number,attach_id_type='$attach_id_type',date_of_birth=$date_of_birth,cummunity='$cummunity',general_obc='$general_obc',asha='$asha',differently_abled='$differently_abled',candidate_type='$candidate_type',institute_name='$institute_name' where id=$id";
$con->query($updSql);
// die;
$_SESSION['success']="Record Update successfully...";
header("Location: school-data.php");