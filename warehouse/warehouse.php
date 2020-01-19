<?php 
?>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../assets/css/style.css">
	<title>Add new warehouse</title>
	<style>
		 .form_ware{
			margin:auto;
			width: 40%;
		} .form_ware > form {
			width: 100%;
		}
		h4{
			text-align: center;
		} .form-group > label {
			display: block
		}
		.form_ware input{
			border:1px solid grey;
			border-radius:6px;
			text-align: center;
		} 
		form{
			padding:50px;	
		}
		.btn{
			background-color:#009e60;
			color:white;
		}
		@media (max-width:900px){
			.form_ware{
				width:300px;
			}
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
				<a href="./show_contact.php" class="links">WareHouse Info</a>
				<a href="../farmer/show_prd_farm.php" class="links">Farmers</a>
			</div>
			<div class="menuBars" onclick="openMenu()"></div>
			<div class="mobileMenu">
				<a href="../index.php" class="mobileLinks">Home</a>
				<a href="customer/products.php" class="mobileLinks">Products </a>
				<a href="./show_contact.php" class="mobileLinks">WareHouse Info</a>
				<a href="farmer/show_prd_farm.php" class="mobileLinks">Farmers</a>
			</div>
	</header>

	<h4>Enter details of the warehouse Owner</h4>
	<div class="form_ware">
		<form name="f1" action="./add_warehouse.php">   
			<div class="form-group"><label>Name<br/><input type="text" name="wName"></label></div>
			<div class="form-group"><label>Address<br/><input type="text" name="wAddress"></label></div>
			<div class="form-group"> <label>Contact Number<br/><input type="number" name="wContact"></label></div>
			<div class="form-group"><label> Email<br/><input type="text" name="wEmail"></label></div>
			<div class="form-group"><label>Password<br/><input type="password" name="password"></label></div>
			<div> <button class="btn" type="submit">Submit</button></div>
			<a href="./visualize.php">Visualize existing items in Warehouse</a>
		</form>
	</div>
</body>
</html>
