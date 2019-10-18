<?php

$q = intval($_GET['q']);



$con = mysqli_connect('localhost','root','','ccf');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"member_points");

$sql="SELECT * FROM member_points WHERE member_id = '732'";
$result = mysqli_query($con,$sql);

$row = mysqli_fetch_array($result);
echo $row;

for($i=0; $i<10; $i++){
    echo $row[$i];
}


?>