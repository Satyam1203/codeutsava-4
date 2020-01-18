<?php
 $con = mysqli_connect("localhost","root","") or die("connection error");

mysqli_select_db($con,"codeutsava") or die("seletion error");

?>
<?php
#wId,wName,wAddress,wContact,wEmail

#$id = $_REQUEST['wId'];
$name = $_REQUEST['wName'];
$address = $_REQUEST['wAddress'];
$contact = $_REQUEST['wContact'];
$email = $_REQUEST['wEmail'];

$query = "insert into warehouse_detail(wName,wAddress,wContact,wEmail) values('$name','$address',$contact,'$email')";

$res=mysqli_query($con,$query) or die("query error");

#if($res){
#	echo "Inserted";
#}else{
#	echo "Error";
 header("location:warehouse.php?deleted=0")


?>