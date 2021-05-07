

<?php
//login
if(isset($_POST['login'])){
	$username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $userType = $_REQUEST['userType'];
	include "../data/loginModel.php";
   
}
//logout
if(isset($_GET['logout'])){
session_start();
session_destroy();  
 $message = "You are logout!";
  echo "<script type='text/javascript'>alert('$message');
           window.location = '../../ApplicationLayer/home/login.php'; 
           </script>";
}
?>


