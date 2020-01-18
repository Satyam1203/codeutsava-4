<?php
 
 $id = $_REQUEST['wId'];

$con = mysqli_connect("localhost","root","") or die("connection error");

mysqli_select_db($con,"codeutsava") or die("seletion error");


 $query = "update warehouse_detail set deleted=1 where wId = $id";

 mysqli_query($con,$query) or die("query error");
 header("location:show_contact.php?deleted=1")
?>