<?php
session_start();
if(isset($_SESSION['farmer']))
{    
   unset($_SESSION['farmer']);
   echo"<h4>Yoy are logged out successfully</h4>";
}

?>