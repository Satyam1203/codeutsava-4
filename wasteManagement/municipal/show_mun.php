
<?php

		include('connect.php');

		$query = "select * from municipal,city where municipal.deleted=0 and city.deleted=0 and city.pincode=municipal.mPincode";
		$rs_product = mysqli_query($con,$query);
		
		
		echo '<table border="1" cellspacing="0px" id="table">';
		$temp = 0;
		echo'<tr><th>Sno.</th><th>Municipal Name</th> <th/> City <th/> District <th/> Pincode <th/> Contact <th/> Delete
		</tr>';

		while($row_product = mysqli_fetch_array($rs_product))
		{
			$mId = $row_product['mId'];
		    
		
			$temp++;
			echo '<tr>';
				echo'<td style="text-align:center;">'.$temp.'</td>';	
				echo'<td>'.$row_product['mName'].'</td>';
				echo'<td>'.$row_product['cName'].'</td>';
				echo'<td style="text-align:center;">'.$row_product['district'].'</td>';
				echo'<td style="text-align:center;">'.$row_product['mPincode'].'</td>';
				echo'<td>'.$row_product['mContact'].'</td>';
				
				echo'<td><a href="delete_mun.php?mId='.$mId.'"> Delete </a></td>';
				
			echo '</tr>';
		}
		echo '</table>';
		
		echo '</div>';

		//include("footer.php");
	
?>
