<?php
 include_once('config.php');


 $student_Data = $_POST;

if($_SERVER['REQUEST_METHOD']=='POST' && isset($student_Data['login'])){
        $username =$student_Data['username'];    
        $password =md5($student_Data['password']);
        $userkey="SELECT id,name FROM `users` where username='$username' and password='$password'";
        $userResult = $con->query($userkey);
    
        if($userResult->num_rows > 0) {
        $userData = $userResult->fetch_assoc();
     
            $_SESSION['isLoggedIn']= true;
            $_SESSION['name'] = $userData['name'];
            header("Location: dashboard.php");
     } else {
            $_SESSION['error'] = "Login credentials are invalid. Please try again!";
            header("Location: index.php");
        }

} else {
    $_SESSION['error'] = "Un-Authorised Access...";
    header("Location: index.php");
}
