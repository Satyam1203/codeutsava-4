<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../assets/css/style.css">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Dashboard</title>
</head>
<body>
	<?php 
        require_once('../assets/partials/header.php');
    ?>
	<div class="dashBoard">
		<div class="products leftDesign">
			<div class="image"></div>
			<div class="description">No of products sold</div>
		</div>
		<div class="newUpload rightDesign">
			<div class="image"></div>
			<div class="description">New uploads</div>
		</div>
		<div class="wareHouses leftDesign">
			<div class="image"></div>
			<div class="description">No of wareHouses</div>
		</div>
	</div>
<?php
	session_start();
	if(!(isset($_SESSION['farmer']))){
		header("location:../registration/login.php");
	}
?>


<a href="insert_prd.php" class="addProducts">
	<div class="icon addIcon"></div>
	<div class="addText">Add farm produce</div>
</a>

<?php
	// if($_REQUEST['deleted'] == 1 )
	// {
	// 	echo "<h1 style='color:red'> Successfully deleted </h1>";
	// }

	$farmer=$_SESSION['farmer'];

	include('connect.php');
	$query = "select * from product_detail,category_detail where category_detail.deleted=0 and product_detail.deleted=0 and fId='$farmer' and product_detail.catId= category_detail.catId";
	$rs_product = mysqli_query($con,$query);
	

	
	echo '<div class="table"></div>';
	$temp = 0;
	echo'<div class="columns"><div>Sno.</div><div>Product Name</div> <div> Price</div><div> Quantity </div><div> Sold Quantity </div><div> Remaining Quantity
	</div><div> Time of Order</div><div>Delete </div></div>';

		include('connect.php');
		$farmer=$_SESSION['farmer'];

		$query = "select * from product_detail,category_detail where category_detail.deleted=0 and product_detail.deleted=0 and fId='$farmer' and product_detail.catId= category_detail.catId";
		$rs_product = mysqli_query($con,$query);

	while($row_product = mysqli_fetch_array($rs_product))
	{
		$prdId = $row_product['pId'];
		
	
		$temp++;
		echo '<div class="columns">';
			echo'<div style="text-align:center;">'.$temp.'</div>';	
			echo'<div>'.$row_product['catName'].'</div>';
			echo'<div>'.$row_product['pRate'].'</div>';
			echo'<div>'.$row_product['qty'].'</div>';
			echo'<div>'.$row_product['soldQty'].'</div>';
			echo'<div>'.$row_product['remQty'].'</div>';
			echo'<div>'.$row_product['time'].'</div>';
			echo'<div><a href="delete_prd.php?pId='.$prdId.'"> Delete </a></div>';
		echo '</div>';
	}
?>
    <?php 
        require_once('../assets/partials/footer.php');
    ?>
</body>
</html>
