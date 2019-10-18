<?php
include('includes.php');
if($_SESSION['login']===true){
    include("template/dashboard.php");
   
}else{
    var_dump($_SESSION['login']);
   
}

?>