<?php
 
 $gId = $_REQUEST['msgId'];

$con = mysqli_connect("localhost","root","") or die("connection error");

mysqli_select_db($con,"waste_management") or die("seletion error");


 $query = "update msg_detail set deleted=1 where msgId = $gId";

 mysqli_query($con,$query) or die("query error");

echo "<script> alert('Successfully Compeleted');
	window.location='show_msg.php';</script>";

 //header("location:show_msg.php?deleted=1")
?>