<?php
if(!isset($_SESSION)) {
     session_start();
}
if(!isset($_SESSION['ca_loginuserid']))
	header("Location:./login/userlogin.php");
?>