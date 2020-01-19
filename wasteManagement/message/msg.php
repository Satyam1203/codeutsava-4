<?php
 $con = mysqli_connect("localhost","root","") or die("connection error");

mysqli_select_db($con,"waste_management") or die("seletion error");

#wId,wName,wAddress,wContact,wEmail


		

#$id = $_REQUEST['wId'];
$Scontact = $_REQUEST['senderContact'];
$wardNo = $_REQUEST['ward'];
$streetNo = $_REQUEST['street'];
$City=$_REQUEST['city'];
$District=$_REQUEST['district'];
$pincodeNo=$_REQUEST['pincode'];
$gType = $_REQUEST['type'];

#echo"$Scontact,$wardNo,$streetNo";
$query = "insert into msg_detail(senderContact,ward,street,city,district,pincode,type) values($Scontact,$wardNo,'$streetNo','$City','$District',$pincodeNo,'$gType')";

$res=mysqli_query($con,$query) or die("query error");
header("location:add_msg.php?deleted=0")

#echo "hello";
#if($res){
#	echo "Inserted";
#}else{
#	echo "Error";
#header("location:warehouse.php?deleted=0")


?>