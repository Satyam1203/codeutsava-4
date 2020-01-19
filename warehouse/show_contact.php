<!DOCTYPE html>
<html>
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="../assets/css/style.css">
      <title>Warehouse</title>
      <style>
            .show_ware{
                  text-align: center;
            }
            .show_ware table{
                  margin:auto;
                  border:2px solid grey;
                  border-radius:15px;
            }
            .show_ware table td,tr,th{
                  padding:10px 15px;
                  border:none;
            }
            .show_ware table th{
                  color:#eee;
                  background-color:#009e60;
                  text-align: center;
            }
      </style>
</head>
<body>
      <header class="header">
            <div class="icon"></div>
            <div class="titleContainer">
                  <div class="scrollContainer">
                        <div class="companyName">Local Farm</div>
                        <div class="companyName">Farm to your Home</div>
                  </div>
            </div>
            <div class="menu">
                  <a href="../index.php" class="links">Home</a>
                  <a href="../customer/products.php" class="links">Products </a>
                  <a href="./warehouse.php" class="links">Add WareHouse</a>
                  <a href="../farmer/show_prd_farm.php" class="links">Farmers</a>
            </div>
            <div class="menuBars" onclick="openMenu()"></div>
            <div class="mobileMenu">
                  <a href="../index.php" class="mobileLinks">Home</a>
                  <a href="customer/products.php" class="mobileLinks">Products </a>
                  <a href="./warehouse.php" class="mobileLinks">Add WareHouse</a>
                  <a href="farmer/show_prd_farm.php" class="mobileLinks">Farmers</a>
            </div>
      </header>
      <div class="show_ware">
            <h3>Details of the warehouses</h3>
            <?php
            if(isset($_REQUEST['deleted']) && $_REQUEST['deleted']==1)
            {
                  echo "<script>alert('Deleted record Successfully')</script>";
            }
            $con = mysqli_connect("localhost","root","") or die("connection error");

            mysqli_select_db($con,"codeutsava") or die("seletion error");


            $query = "select wId,wName,wAddress,wContact,wEmail from warehouse_detail where deleted=0";

            $result = mysqli_query($con,$query);

            echo "<table border='1'>";
            echo "<tr>
                  
                  <th>Id</th>
                  <th>Name</th>
                  <th>Address</th>
                  <th>Contact</th>
                  <th>E-mail</th>
                  <th>Remove</th>
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
            
			<a href="./visualize.php">Visualize existing items in Warehouse</a>
      </div>
</body>
</html>

