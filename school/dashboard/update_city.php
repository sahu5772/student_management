<?php
require_once("config.php");
require_once("validation.php");

$city_data = $_REQUEST;
// echo "<pre>";
// print_r($city_data);
// die;
$id = $city_data['id'];
$city_name=$city_data['city_name'];
$status=$city_data['status'];

if($_SERVER['REQUEST_METHOD']=='POST' && isset($city_data['submit_city'])) {
    if($city_data['city_name'] && ($city_data['status'] == 0 OR $city_data['status'])) {
    $updSql = "UPDATE `city` SET city_name='$city_name',status='$status' where id=$id";
    $con->query($updSql);

    $stateIds = array_filter($city_data['state_id']);
    $stateIds = implode(",", $stateIds);
 
    $deleteStateQuery = "DELETE FROM `state` WHERE id NOT IN ($stateIds) and city_id=$id";
    $con->query($deleteStateQuery);

    $stateId=$con->insert_id;
    foreach($city_data['state_name'] as $key => $stateName){
        if($city_data['city_name'] && ($city_data['status'] == 0 OR $city_data['status'])) {
            
                $stateName = $stateName;
                $status=$city_data['state_status'][$key];
                $state_id = $city_data['state_id'][$key];
                if($state_id){
                    $updSql = "UPDATE `state` SET city_id='$id',state_name='$stateName', state_status='$status' where id=$state_id";
                    // echo "<pre>";
                    // print_r($updSql);
                    
                    $con->query($updSql);
                   }else{
                   $insstate = "INSERT INTO `state`(`city_id`, `state_name`,`state_status`) values($id, '$stateName',$status)";
               
                    $con->query($insstate);
                    // die;
                }
            }
        }
            $_SESSION['success'] = "Edit successfully...";
            header('Location:manage-city.php');
    }
}    

