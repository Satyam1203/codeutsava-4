<?php

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<h3>Detail of the Garbage</h3>


<?php


if(isset($_REQUEST['deleted']) && $_REQUEST['deleted']==1)
            {
                  echo '<div class="msgBox">';
                  echo "<h4>Delete sucessfully.</h4>";
                  echo '</div>';
            }
$con = mysqli_connect("localhost","root","") or die("connection error");

mysqli_select_db($con,"waste_management") or die("seletion error");


$query = "select msgId,senderContact,type,ward,street,pincode from msg_detail where deleted=0";

$result = mysqli_query($con,$query);

echo "<table border='1'>";
echo "<tr>
      <th>ID</th>
      <th>contact number</th>
      <th>Garbage Type</th>
      <th>Ward Number</th>
      <th>Street Number</th>
      <th>Pincode</th>
      </tr>";
      while($row = mysqli_fetch_array($result))
      {
      	$gId=$row['msgId'];
        $Scontact = $row['senderContact'];
        $gType  = $row['type'];
        $wardNo  = $row['ward'];
        $streetNo = $row['street'];
        $pincodeNo = $row['pincode'];
        echo "<tr>
        <td>".$gId."</td>
        <td>".$Scontact."</td>
        <td>".$gType."</td>
        <td>".$wardNo."</td>  
        <td>".$streetNo."</td>
        <td>".$pincodeNo."</td> 
        <td><a href='del_msg.php?msgId=".$gId."'>Delete</a></td>
           
       
       </tr>";
      }
  </body>
</html>

