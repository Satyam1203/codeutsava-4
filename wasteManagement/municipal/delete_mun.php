<?php 
       
		include('connect.php');

		$mId = $_REQUEST['mId'];

		$query="update municipal set deleted=1 where mId='$mId'";
		mysqli_query($con,$query);


		//echo $_REQUEST['mId'];	
		header("location:show_mun.php?deleted=1");
		

?>