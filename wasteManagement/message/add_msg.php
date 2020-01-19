<?php
	include("../header.php");
             /* if(isset($_REQUEST['deleted']) && $_REQUEST['deleted']==0)
            {
                  
                  echo "<script> alert('Thank You for your message')</script>";
            } */
 ?>

 <style>
 	.form-group{
 		padding:0px 150px;
 	}
 	.form-control{
 		border-radius: 0px;
 	}
 	.main{
 		margin:20px;
 		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
 		padding:30px; 
 	}
 	.btn-sub{
 		border-radius: 0px;
 		background-color: #000000;
 		margin-left:150px;
 	}
 	.title{
 		text-align: center;
 	}
 	@media (max-width:800px){
 		.form-group{
 			padding:5px 15px;
 		}
 	}
 </style>

<body>

	<div class="main">
		<form name="f1" action="msg.php" method="POST">
			<h3 class="title">Contact us</h3>   

  <div class="form-group">
    <label>Your Contact No. :</label>
    <input type="number"  name="senderContact" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your contact number">
  </div>
  <div class="form-group">
    <label>Ward :</label>
    <input  type="text" name="ward" class="form-control" id="exampleInputPassword1" placeholder=" Enter you ward number">
  </div>
  <div class="form-group">
    <label>Street :</label>
    <input type="text" name="street" class="form-control" id="exampleInputPassword1" placeholder=" Enter you street detail">
  </div>
  <div class="form-group">
    <label>City :</label>
    <input type="text" name="city" class="form-control" id="exampleInputPassword1" placeholder=" Enter you city name">
  </div>
  <div class="form-group">
    <label>District :</label>
    <input type="text" name="district" class="form-control" id="exampleInputPassword1" placeholder=" Enter you district name">
  </div>
  <div class="form-group">
    <label>Pincode :</label>
    <input type="number" name="pincode" class="form-control" id="exampleInputPassword1" placeholder=" Enter you area pincode">
  </div>
  <div class="form-group">
    <label>Garbage Type:</label>
    <select name="type" class="form-control">
							<option> </option>
							<option value="Medical/Clinical Waste">Medical/Clinical Waste</option>
							<option value="Green Waste">Green Waste</option>
							<option value="Electrical Waste">Electrical Waste  </option>
							<option value="Recyclable Waste">Recyclable Waste </option>
							<option value="Construction & Demolition Debris">Construction & Demolition Debris </option>
						  </select>
  </div>
  
  <button type="submit" value="submit" class="btn btn-primary btn-sub">Submit</button>
</form>
</div>
		
	<!--	<h4> <a href='show_msg.php'>show</a> </h4>---->
</body>
</html>
