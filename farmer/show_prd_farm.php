<?php
	session_start();
	if(!(isset($_SESSION['farmer']))){
		header("location:../registration/login.php");
	}
?>


<a href="insert_prd.php">Add farm produce</a>

<?php
		// if($_REQUEST['deleted'] == 1 )
		// {
		// 	echo "<h1 style='color:red'> Successfully deleted </h1>";
		// }
	
		include('connect.php');
		$query = "select * from product_detail,category_detail where category_detail.deleted=0 and product_detail.deleted=0 and fId=1 and product_detail.catId= category_detail.catId";
		$rs_product = mysqli_query($con,$query);
		
		
		echo '<table border="1" cellspacing="0px" id="table">';
		$temp = 0;
		echo'<tr><th>Sno.</th><th>Product Name</th> <th/> Price<th/> Quantity <th/> Sold Quantity <th/> Remaining Quantity
		<th/> Time of Order<th/>Delete </tr>';

		while($row_product = mysqli_fetch_array($rs_product))
		{
			$prdId = $row_product['pId'];
		    
		
			$temp++;
			echo '<tr>';
				echo'<td style="text-align:center;">'.$temp.'</td>';	
				echo'<td>'.$row_product['catName'].'</td>';
				echo'<td>'.$row_product['pRate'].'</td>';
				echo'<td style="text-align:center;">'.$row_product['qty'].'</td>';
				echo'<td style="text-align:center;">'.$row_product['soldQty'].'</td>';
				echo'<td>'.$row_product['remQty'].'</td>';
				echo'<td>'.$row_product['time'].'</td>';
				echo'<td><a href="delete_prd.php?pId='.$prdId.'"> Delete </a></td>';
				
			echo '</tr>';
		}
		echo '</table>';
		
		echo '</div>';

		//include("footer.php");
	
?>
