<?php
	include("connect.php");
	$catId = $_REQUEST['catId'];
	$rate=$_REQUEST['rate'];
	$qty=$_REQUEST['qty'];
	
	$query = "insert into product_detail(catId,pRate,qty,wId,fId) values('$catId','$rate','$qty','1','1')";
	
	mysqli_query($con,$query);

	//echo $_REQUEST['rate'];

	header("location:insert_prd_form.php?ok=1");
?>