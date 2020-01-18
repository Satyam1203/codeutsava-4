<?php 
?>
<html>
<head>
	 <title></title>
</head>
<body>
		
		<form name="f1" action="./add_warehouse.php">
			<?php
			     if(isset($_REQUEST['deleted']) && $_REQUEST['deleted']==0)
            {
                  echo '<div class="msgBox">';
                  echo "<h4>Contact add sucessfully.</h4>";
                  echo '</div>';
            }

			?>
               <h4>Enter detail of the warehouse member</h4>   
			Name: <input type="text" name="wName"><br>

			Address:<input type="text" name="wAddress"><br>

			Contact Number: <input type="number" name="wContact"><br>

			Email: <input type="text" name="wEmail"><br>

			<input type="submit" value="submit">
			<a href='./show_contact.php'>show</a>
		</form>
</body>
</html>
