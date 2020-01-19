<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/css/style.css">
	<title>Registration</title>
</head>
<body>
    <?php 
        require_once('../assets/partials/header.php');
    ?>
    <div class="form form_login">
        <form>       
        <div class="formIcon"></div>

        <h1 class="formh1">Costumer Registration </h1>
        <p>Please fill this form to create an account </p>
        <div class="inputs">
            <div>First name </div><input type="text" placeholder="  Enter first name  " name="firstname" required> 
        </div>
        <div class="inputs">	
                <div>Last name  </div><input type="text" placeholder="  Enter last name " name="lastname" required> 
        </div>
        <div class="inputs">
            <div>Phone  </div><input type="tel" name="phone" placeholder=" Enter Mobile no  " pattern="[0-9]{10}" required> 
        </div>
        <div class="inputs">
            <div>Email id   </div><input type="email" placeholder=" Enter valid Email " name ="Email"> 
        </div>
        <div class="inputs"> 
            <div>Password   </div><input type ="password" placeholder=" Enter password " name="psw" required> 
        </div> 
        <div class="inputs">		
            <div>Confirm Password </div><input type ="password" placeholder="  repeat password " name="psw-repeat" required> 
        </div> 
        <div class="inputs">
            <div>Address </div><textarea rows="2" cols="20" placeholder="  Enter Address " required></textarea> 
        </div> 
        <div class="inputs">    
            <div>Pincode    </div><input type="tel" name="pin" placeholder="  Enter Pincode " pattern="[0-9]{6}" required> 
        </div>     
        <div class="inputs">
            <button class="formButton" type="submit">Register</button>
        </div>
        <div class="signUpBlock">
            <div>Don't want Customer Signup
                <a href="http://localhost/codeutsava-4/registration/farmerSignup.php">Farmer SignUp</a>
                Already have an account
                <a href="http://localhost/codeutsava-4/registration/login.php">Login</a>
            </div>
        </div>
    </form>
</div>	 
</body>
</html>


<?php
    if(isset($_REQUEST['password1']))
    {
        $cName=$_REQUEST['cName'];
        $cContact=$_REQUEST['cContact'];
        $cAddress=$_REQUEST['cAddress'];
        $cEmail=$_REQUEST['cEmail'];
        $password=md5($_REQUEST['password1']);
        $username='c-'.$cContact;
        

        $con=mysqli_connect('localhost','root','','codeutsava');
        $q="insert into customer_detail values (null,'$cName','$cAddress',$cContact,'$cEmail',0,'$username') ";
        $res=mysqli_query($con,$q);
        $q2="insert into login_detail values ('$username','$password',null)";
        $res2=mysqli_query($con,$q2);
        if($res and $res2)
           {
             echo"Your Account is Successfully created with username $username";
            }
           else{
             echo"database error";
           }
    }
?>     
