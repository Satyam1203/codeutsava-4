<!DOCTYPE html>
<html>
<head><title>COSTUMER FORM</title></head>
<body>
	<style type="text/css">
	
#form_login {
	border:none;
    left: 50%;
    top: 50%;
    margin-left: -13%;
    position: absolute;
    margin-top: -20%;

}

	</style>
	    <form id="form_login" method='POST' onsubmit='return checkPassword()'>
	<div>
       
		<h1>Costumer Registration </h1>
		<p>Please fill this form to create an account </p>
		<div>
     		First name:<input type="text" placeholder="  Enter first name  " name="cName" required><br><br>
     	</div>
	    <div>
	     Contact Number:<input type="tel" name="cContact" placeholder=" Enter Mobile no  " pattern="[0-9]{10}" required><br><br>
	    </div>
        <div>
	        Email id  :<input type="Email" placeholder=" Enter valid Email " required  name="cEmail"><br><br>
	    </div>
	    <div> 
	  		Password  :<input type ="password" placeholder=" Enter password " name="password1" required><br><br>
	    </div> 
	    <div>		
	    	Repeat Password:<input type ="password" placeholder="  repeat password " name="password2" required><br><br>
	    </div> 
	    <div>
	        Address   :<textarea rows="2" cols="20" placeholder="  Enter Address " name='cAddress' required></textarea><br><br>
	    </div> 
	    
        <div>
             <button type="submit">Register</button>
        </div>
    </div>
	</form>
	<script>

    function checkPassword(){
        let password1=document.getElementById('password1').value
        let password2=document.getElementById('password2').value
         if(password1 !== password2)
         {
			 alert("Your passwords Donot match");
           return false
         }
         else{
			alert("Your passwords matched Successfully");
             return true
         }

    }
</script>
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
