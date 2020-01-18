<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Farmer Signup</h1>
    <div id='form'>
        <form  action='' method='POST' onsubmit="return checkPassword()" >
         <div>
             <label>Name</label>
             <input required  type='text' name='fName'  id=''>
        </div>
        <div>
            <label>Email</label>
            <input  required type='email' name='fEmail'  id=''>
       </div>
       <div>
        <label>Address</label>
        <input required     type='text' name='fAddress'  id=''>
        </div>
       <div>
        <label>Contact Number</label>
        <input  required type='text' name='fContact' id=''>
        </div>
        <div>
        <label>UPI ID</label>
        <input  required  type='text' name='fUpi' id=''>
        </div>
        <div>
        <label>Name OF the Bank</label>
        <input required type='text' name='fBank'  id=''>
        </div>
        <div>
        <label>Account Number</label>
        <input   required  type='text' name='fAccount'   id=''>
        </div>
        <div>
            <label>Password</label>
            <input required  type='password' name='password1'   id='password1'>
        </div>
        <div>
            <label>Confirm Password</label>
            <input required  type='password' name='password2'  id='password2'>
        </div>
        
        <input type="submit" value="Signup" />

        </form>
    </div> 
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