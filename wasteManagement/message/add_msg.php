<?php
              if(isset($_REQUEST['deleted']) && $_REQUEST['deleted']==0)
            {
                  echo '<div class="msgBox">';
                  echo "<h4>Thank You.</h4>";
                  echo '</div>';
            }

			?>
<html>
<head>
	 <title></title>
</head>
<body>
		
		<form name="f1" action="mess.php" method="POST">
			
		
               <h4>Enter detail of the locality</h4>   
			Your Contact Number : <input type="number" name="senderContact"><br>

			Ward Number:<input type="text" name="ward"><br>

			Street: <input type="number" name="street"><br>

			City: <input type="text" name="city"><br>

			District:<input type="text" name="district"><br>

			Pincode: <input type="number" name="pincode"><br>

			Garbage Type: <select name="type">
							<option> </option>
							<option value="Medical/Clinical Waste">Medical/Clinical Waste</option>
							<option value="Green Waste">Green Waste</option>
							<option value="Electrical Waste">Electrical Waste  </option>
							<option value="Recyclable Waste">Recyclable Waste </option>
							<option value="Construction & Demolition Debris">Construction & Demolition Debris </option>
						  </select>
						  <br>


			<input type="submit" value="submit">
			

			<a href='show_gar.php'>show</a>
		</form>
</body>
</html>
