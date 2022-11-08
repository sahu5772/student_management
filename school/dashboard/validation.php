<?php
if(!isset($_SESSION['isLoggedIn'])) {
    if(!($_SESSION['isLoggedIn']==true)) {
        $_SESSION['error']= "Need to login first...";
        header("Location: index.php");
    }
}
