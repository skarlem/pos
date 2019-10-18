<?php


function isLocalhost($whitelist = ['127.0.0.1', '::1']) {
    return in_array($_SERVER['REMOTE_ADDR'], $whitelist);
}

function getConn(){
	
		if(isLocalhost()){
			$host = "localhost";
			$user = "root";
			$password = "";
			$database = "oh_inventory";
		}else{

			$host = "pogsnet07023.ipagemysql.com";
			$user = "1hpos123";
			$password = "1h1h@123";
			$database = "1hpos";
		}
	

$mysqli = new mysqli($host, $user, $password, $database);
$conn = mysqli_connect($host, $user, $password, $database);
return $conn;
}


function getConn2(){
	
	if (isLocalhost()) {
		$host = "localhost";
		$user = "root";
		$password = "";
		$database = "ccf";
	} else {
		
		$host = "pogsnet07023.ipagemysql.com";
		$user = "dim_1heart";
		$password = "dimskie@123";
		$database = "oneheart";
	}
	
	



$mysqli = new mysqli($host, $user, $password, $database);
$conn = mysqli_connect($host, $user, $password, $database);
return $conn;
}


function getConn3(){
	
	if (isLocalhost()) {
		$host = "localhost";
		$user = "root";
		$password = "";
		$database = "oneheartwd";
	} else {
		
		$host = "pogsnet07023.ipagemysql.com"; 
		$user = "czarina";
		$password = "94S8gh^d3LKuM0NSlQ";
		$database = "oneheartbizf2";
	}
	
$mysqli = new mysqli($host, $user, $password, $database);
$conn = mysqli_connect($host, $user, $password, $database);
return $conn;
}


if(isLocalhost()){
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "oh_inventory";
}else{
	$servername = "pogsnet07023.ipagemysql.com";
	$username = "1hpos123";
	$password = "1h1h@123";
	$dbname = "1hpos";
}



$link = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);


	
?>


