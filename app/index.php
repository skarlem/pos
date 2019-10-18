<?php
include('includes.php');
// error_reporting(0);
// ini_set('display_errors', 0);
if($_SESSION['login']==true){
   
    echo "<script>location.href='dashboard.php';</script>";
}
else{
    include('./controller/login.php');
}

?>