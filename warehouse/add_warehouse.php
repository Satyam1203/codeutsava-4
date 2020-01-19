<?php
 $con = mysqli_connect("localhost","root","") or die("connection error");

mysqli_select_db($con,"codeutsava") or die("seletion error");

?>
<?php
$name = $_REQUEST['wName'];
$address = $_REQUEST['wAddress'];
$contact = $_REQUEST['wContact'];
$email = $_REQUEST['wEmail'];
$username='w-'.$contact;
$password=md5($_REQUEST['password']);
$query = "insert into warehouse_detail(wName,wAddress,wContact,wEmail,username) values('$name','$address',$contact,'$email','$username')";
$query1="insert into login_detail values ('$username','$password',null)";
$res=mysqli_query($con,$query) or die("query error");
$res=mysqli_query($con,$query1) or die("query Error");
 header("location:warehouse.php?deleted=0")
?>