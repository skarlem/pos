<?php
include('includes.php');
if($_SESSION['login']===true){
    include("template/pos.php");
}

?>