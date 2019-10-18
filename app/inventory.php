<?php
include('includes.php');
if($_SESSION['login']===true){
    include("template/inventory.php");
    
}else{
    var_dump($_SESSION['login']);
   
}

?>