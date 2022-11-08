<?php
require_once("config.php");
require_once("validation.php");

$country_data = $_REQUEST;
// echo "<pre>";
// print_r($country_data);
// die;
$id = $country_data['id'];
$country_name=$country_data['country_name'];
$status=$country_data['status'];

if($_SERVER['REQUEST_METHOD']=='POST' && isset($country_data['submit_country'])) {
    if($country_data['country_name'] && ($country_data['status'] == 0 OR $country_data['status'])) {
    $updSql = "UPDATE `country` SET country_name='$country_name',status='$status' where id=$id";
    $con->query($updSql);
    if(isset($country_data['state_id'])){
    $stateIds = array_filter($country_data['state_id']);
    $stateIds = implode(",", $stateIds);
 
    $deleteStateQuery = "DELETE FROM `state` WHERE id NOT IN ($stateIds) and country_id=$id";
    }else{
        $deleteStateQuery = "DELETE FROM `state` WHERE country_id=$id";

    }
    $con->query($deleteStateQuery);

    $stateId=$con->insert_id;
    foreach($country_data['state_name'] as $key => $stateName){
        if($country_data['country_name'] && ($country_data['status'] == 0 OR $country_data['status'])) {
            
                $stateName = $stateName;
                $status=$country_data['state_status'][$key];
                $state_id = $country_data['state_id'][$key];
                if($state_id){
                    $updSql = "UPDATE `state` SET country_id='$id',state_name='$stateName', state_status='$status' where id=$state_id";
                    // echo "<pre>";
                    // print_r($updSql);
                    
                    $con->query($updSql);
                   }else{
                   $insstate = "INSERT INTO `state`(`country_id`, `state_name`,`state_status`) values($id, '$stateName',$status)";
               
                    $con->query($insstate);
                    // die;
                }
            }
        }
            $_SESSION['success'] = "Edit successfully...";
            header('Location:manage-country.php');
    }
}    

