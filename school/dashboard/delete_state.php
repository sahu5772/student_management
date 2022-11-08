<?php
require_once('config.php');
require_once('validation.php');

$dataId = $_REQUEST['id'];

if($dataId){
    $delSql = "DELETE FROM `state` where id=$dataId";
    $con->query($delSql);
    $_SESSION['success']="Record deleted successfully...";
    header("Location:school-data.php");
}else{
    header("Location:school-data.php");
}