<?php

  include("../header.php");

?>

<style>
  .main{
    padding: 30px;
  }
  .title{
    text-align: center;
    margin-top:30px;
  }
  .done{
    color: white;
  }
  .done:hover{
    color: white;
    text-decoration: none;
  }
</style>

<h3 class="title">All messages about garbage</h3>

<?php

$con = mysqli_connect("localhost","root","") or die("connection error");

mysqli_select_db($con,"waste_management") or die("seletion error");


$query = "select msgId,senderContact,type,ward,street,pincode from msg_detail where deleted=0";

$result = mysqli_query($con,$query);

echo "<div class='main'>";

echo "<table border='0' class='table table-striped'>";
echo "<tr>
      <th scope='col'>Sr No.</th>
      <th>Sender Contact </th>
      <th>Garbage Type</th>
      <th>Ward Number</th>
      <th>Street</th>
      <th>Pincode</th>
      <th>Status</th>
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
        <td><button class='btn btn-info'><a href='del_msg.php?msgId=".$gId."' class='done'><b>Completed?</b></a> </button> </td>
           
       
       </tr>";
      }

  echo "</div>";
    ?>
      ?>

  </body>
</html>

