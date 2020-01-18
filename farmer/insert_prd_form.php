<?php

<<<<<<< HEAD
=======
    session_start();
    if(!(isset($_SESSION['farmer']))){
        header("location:../registration/login.php");
    }
>>>>>>> 1dce51f04604a073814a21af44996bc182bb17ba
	// if($_REQUEST['ok'] == 1)
	// {
	// 	echo "<h1 style='color:green'> Successfully added </h1>";
	// }
?>
	<h1> Farmer adds product to the warehouse </h1>
    
    <a href="show_prd_farm.php"> Show Products available in warehouse </a>
    <br/><br/>
    <form method="post" action="insert_prd.php" name="f1">
    
    <table>
    <tr/> 
    <td id="row"/>
    			Product : <select name="catId">
        			<option> </option>
					<?php
                        
                        include('connect.php');
                        $query = "select * from category_detail where deleted=0"; 
                        $rs_category = mysqli_query($con,$query);
                        while($row_category = mysqli_fetch_array($rs_category))
                        {
                            echo'<option value="'.$row_category['catId'].'">'.$row_category['catName'].'</option>';
                        }
                    ?>
                   
            	</select>
    <tr/> 
    <td id="row"/> Rate
     : <td id="text"/> <input type="number" name="rate">
    <tr/> 
    <td id="row"/> Quantity
     : <td id="text"/> <input type="number" name="qty">
    <tr/>
    <td colspan="3" align="center"/> <input type="submit" value="submit">
     </table>

    </form>