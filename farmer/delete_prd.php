<?php 
       
		include('connect.php');

		$pId = $_REQUEST['pId'];

		$query="update product_detail set deleted=1 where pId='$pId'";
		mysqli_query($con,$query);


		//echo $_REQUEST['pId'];	
		header("location:show_prd_farm.php?deleted=1");
		

?>