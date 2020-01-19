<?php
	include("connect.php");
	$name = $_REQUEST['txtName'];
	$contact=$_REQUEST['contact'];
	$pin=$_REQUEST['pincode'];
	
	$query = "insert into municipal(mName,mContact,mPincode) values('$name','$contact','$pin')";
	
	if( mysqli_query($con,$query)){
		echo "<script>alert('Records Updated');</script>";
		header("location:insert_municipal.php?ok=1");
	}
?>