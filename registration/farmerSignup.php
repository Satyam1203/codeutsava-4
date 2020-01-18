<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Document</title>
</head>
<body>
    <div class="form form_login">
        
    <form  action='' method='POST' onsubmit="return checkPassword()" >
        <div class="formIcon"></div>
        <h1 class="formh1">Farmer Signup</h1>
         <div class="inputs">
             <div>Name</div>
             <input required  type='text' name='fName'  id=''>
        </div>
        <div class="inputs">
            <div>Email</div>
            <input  required type='email' name='fEmail'  id=''>
       </div>
       <div class="inputs">
            <div>Address</div>
            <input required     type='text' name='fAddress'  id=''>
        </div>
       <div class="inputs">
            <div>Contact Number</div>
            <input  required type='text' name='fContact' id=''>
        </div>
            <div class="inputs">
            <div>UPI ID</div>
        <input  required  type='text' name='fUpi' id=''>
        </div>
        <div class="inputs">
            <div>Name OF the Bank</div>
            <input required type='text' name='fBank'  id=''>
        </div>
        <div class="inputs">
            <div>Account Number</div>
            <input   required  type='text' name='fAccount'   id=''>
        </div>
        <div class="inputs">
            <div>Password</div>
            <input required  type='password' name='password1'   id='password1'>
        </div>
        <div class="inputs">
            <div>Confirm Password</div>
            <input required  type='password' name='password2'  id='password2'>
        </div>
        
        <input class="formButton" type="submit" value="Signup" />
        <div class="signUpBlock">
            <div>Don't want farmer Signup
                <a href="http://localhost/codeutsava-4/registration/customerSignup.php">Customer SignUp</a>
                Already have an account
                <a href="http://localhost/codeutsava-4/registration/login.php">Login</a>
            </div>
        </div>
        </form>
    </div> 
<script>
    function checkPassword(){
        let password1=document.getElementById('password1').value
        let password2=document.getElementById('password2').value
         if(password1 !== password2)
         {
            return false
         }
         else{
            return true
         }

    }
</script>
</body>
</html>
<?php
    if(isset($_REQUEST['password1']))
    {
        $fName=$_REQUEST['fName'];
        $fContact=$_REQUEST['fContact'];
        $fBank=$_REQUEST['fBank'];
        $fAccount=$_REQUEST['fAccount'];
        $fUpi=$_REQUEST['fUpi'];
        $fAddress=$_REQUEST['fAddress'];
        $fEmail=$_REQUEST['fEmail'];
        $password=md5($_REQUEST['password1']);
        $username='f-'.$fContact;
        

        $con=mysqli_connect('localhost','root','','codeutsava');
        $q="insert into farmer_detail values (null,'$fName',$fContact,'$fBank','$fUpi','$fAddress',$fAccount,'$fEmail',0,'$username') ";
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