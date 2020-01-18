<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<h3>Detail of the warehouse member</h3>

</body>
</html>

<?php


if(isset($_REQUEST['deleted']) && $_REQUEST['deleted']==1)
            {
                  echo '<div class="msgBox">';
                  echo "<h4>Delete sucessfully.</h4>";
                  echo '</div>';
            }
$con = mysqli_connect("localhost","root","") or die("connection error");

mysqli_select_db($con,"codeutsava") or die("seletion error");


$query = "select wId,wName,wAddress,wContact,wEmail from warehouse_detail where deleted=0";

$result = mysqli_query($con,$query);

echo "<table border='1'>";
echo "<tr>
      
      <th>Id</th>
      <th>name</th>
      <th>address</th>
      <th>contact</th>
      <th>email</th>
      </tr>";
      while($row = mysqli_fetch_array($result))
      {
        $id = $row['wId'];
        $name  = $row['wName'];
        $address  = $row['wAddress'];
        $contact = $row['wContact'];
        $email = $row['wEmail'];
        echo "<tr>
    
        <td>".$id."</td>
        <td>".$name."</td>
        <td>".$address."</td>  
        <td>".$contact."</td>
        <td>".$email."</td>     
       <td><a href='del_warehouse.php?wId=".$id."'>Delete</a></td>
       
       </tr>";
      }

echo "</table>";
?>