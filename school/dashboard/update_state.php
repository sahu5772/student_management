<?php
require_once("config.php");
require_once("validation.php");

$state_data = $_REQUEST;
// echo "<pre>";
// print_r($state_data);
// die;
$id = $state_data['id'];
$state_name=$state_data['state_name'];
$status=$state_data['state_status'];
$countryId=$state_data['country_id'];

if($_SERVER['REQUEST_METHOD']=='POST' && isset($state_data['submit_state'])) {
    if($state_data['state_name'] && ($state_data['state_status'] == 0 OR $state_data['state_status'])) {
    $updSql = "UPDATE `state` SET country_id='$countryId',state_name='$state_name',state_status='$status' where id=$id ";

   $con->query($updSql);
    
   if(isset($state_data['city_id'])) {
    $cityIds = array_filter($state_data['city_id']);
    $cityIds = implode(",", $cityIds);
    
     $deletecityQuery = "DELETE FROM `city` WHERE id NOT IN ($cityIds) and state_id=$id";
   } else {
    $deletecityQuery = "DELETE FROM `city` WHERE state_id=$id";
   }
    
//   die;
    $con->query($deletecityQuery);

        $cityId=$con->insert_id;
        foreach($state_data['city_name'] as $key => $cityName){
        if($state_data['state_name'] && ($state_data['city_status'] == 0 OR $state_data['city_status'])) {
            
                $cityName = $cityName;
                $status=$state_data['city_status'][$key];
                $city_id = $state_data['city_id'][$key];
                if($city_id){
                 $updSql = "UPDATE `city` SET country_id='$countryId',state_id='$id',city_name='$cityName', city_status='$status' where id=$city_id";
                    // echo "<pre>";
                    // print_r($updSql);
                    // die;
                    
                    $con->query($updSql);
                   }else{
                   $insstate = "INSERT INTO `city`(`country_id`,`state_id`, `city_name`,`city_status`) values($countryId, $id, '$cityName',$status)";
               
                    $con->query($insstate);
                    // die;
                }
            }
        }
            $_SESSION['success'] = "Edit successfully...";
            header('Location:manage-state.php');
    }
 }


