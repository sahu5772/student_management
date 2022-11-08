<?php

require_once("config.php");

$student_Data = $_REQUEST;
// print_r("<pre>");
// print_r($classData);
// die;

if($_SERVER['REQUEST_METHOD']=='POST' && isset($student_Data['class_submit'])) {

    if($student_Data['class'] && ($student_Data['status'] or (int)$student_Data['status']===0)) {
        $in_Class = "INSERT INTO `classes`(`class`, `status`) values ('".$student_Data['class']."', ".$student_Data['status'].")";
        $con->query($in_Class);

        $classId = $con->insert_id;

        foreach($student_Data['section_name'] as $key => $sectionName) {
            $sectionName = $sectionName;
            // $nos = $formData['nos'][$key];
            
        $insSection = "INSERT INTO `manage_section`(`class_id`, `section_name`) values($classId, '$sectionName')";
            $con->query($insSection);

            // print_r($insSection);
        }
        // die;

        $_SESSION['success']="Class created successfully...";
        header("Location:manage-class.php");
    } else {
        $_SESSION['validation_Error']="All * fields are required.";
        $_SESSION['class']=$student_Data['class'];
        $_SESSION['status']=$student_Data['status'];
        header("Location:add-class-1.php");
    }
}elseif($_SERVER['REQUEST_METHOD']=='POST' && isset($student_Data['student_submit'])) {
        if($student_Data['Student_Name'] && $student_Data['Student_Class']  && $student_Data['Number'] && $student_Data['Email'] ){
          $in_student = "INSERT INTO `students`(`Student_Name`, `Student_Class`, `Number`, `Email`) values ('".$student_Data['Student_Name']."', '".$student_Data['Student_Class']."',".$student_Data['Number'].", '".$student_Data['Email']."')";
            $con->query($in_student);
            $_SESSION['success']="student add successfully...";
            header("Location:student.php");
        } else {
            $_SESSION['validation_Error']="All * fields are required.";
            $_SESSION['class']=$student_Data['Student_Name'];
            $_SESSION['status']=$student_Data['Student_Class'];
            $_SESSION['status']=$student_Data['Number'];
            $_SESSION['status']=$student_Data['Email'];
            header("Location:add-student.php");
    
   
}
}else {
    die("Un-Authorized Access....");
}