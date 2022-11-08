<?php
require_once("config.php");
$allData = $_REQUEST;
// echo "<pre>";
// print_r($allData);
// die();
if($_SERVER['REQUEST_METHOD']=='POST' && isset($allData['submit_country'])) {
  
    if($allData['country_name'] && ($allData['status'] == 0 OR $allData['status'])) {
        $in_country= "INSERT INTO `country` (`country_name`,`status`) values ('".$allData['country_name']."', ".$allData['status'].")";
        $con->query($in_country);
        // print_r($in_country);
        // die;
        $countryId = $con->insert_id;
        
        foreach($allData['state_name'] as $key => $stateName) {
            $stateName = $stateName;
            $status=$allData['state_status'][$key];
            // $nos = $formData['nos'][$key];
           
          $insstate = "INSERT INTO `state`(`country_id`, `state_name`,`state_status`) values($countryId, '$stateName',$status)";
            $con->query($insstate);

            // print_r($insstate);
        }
        // die;

        $_SESSION['success']="country added successfully...";
        header("Location:manage-country.php");
    } else {
        $_SESSION['error']="All * fields are required.";
        $_SESSION['country_name']=$allData['country_name'];
        $_SESSION['status']=$allData['status'];
        header("Location:add-country.php");
    }
}elseif($_SERVER['REQUEST_METHOD']=='POST' && isset($allData['submit_state'])) {
    
        if($allData['state_name'] && ($allData['state_status'] == 0 OR $allData['state_status'])) {
           
           $in_state= "INSERT INTO `state` (`country_id`,`state_name`,`state_status`) values (".$allData['country_id'].",'".$allData['state_name']."', ".$allData['state_status'].")";
         
            $con->query($in_state);
            // print_r($in_state);
            // die;

            $stateId = $con->insert_id;
            $countryId =$allData['country_id'];
            foreach($allData['city_name'] as $key => $cityName) {
                $cityName = $cityName;
                $status=$allData['city_status'][$key];
                // $nos = $formData['nos'][$key];
              
              
               
             $insstate = "INSERT INTO `city`(`country_id`,`state_id`, `city_name`,`city_status`) values($countryId, $stateId, '$cityName',$status)";
              
            $con->query($insstate);
            //      print_r($insstate);
            // die;
           
            
            }
            $_SESSION['success']="state added successfully...";
            header("Location:manage-state.php");
        } else {
            $_SESSION['error']="All * fields are required.";
            $_SESSION['state_name']=$allData['state_name'];
            $_SESSION['status']=$allData['state_status'];
            header("Location:add-state.php");
        }
    
}elseif($_SERVER['REQUEST_METHOD']=='POST' && isset($allData['submit_city'])) {
    if($allData['city_name'] && ($allData['city_status'] == 0 OR $allData['city_status'])) {
       $in_city= "INSERT INTO `city` (`country_id`,`state_id`,`city_name`,`city_status`) values ( ".$allData['country_id'].",".$allData['state_name'].",'".$allData['city_name']."', ".$allData['city_status'].")";
        $con->query($in_city);
        // print_r($in_city);
        // die;
        $_SESSION['success']="city added successfully...";
        header("Location:manage-city.php");
    } else {
        $_SESSION['error']="All * fields are required.";
        $_SESSION['city_name']=$allData['city_name'];
        $_SESSION['status']=$allData['city_status'];
        header("Location:add-city.php");
    } 
}else {
    die("Un-Authorized Access....");
}
?>