<?php
////WEB /////////////////
function getConnection()
{
/*
	$dbhost="sql209.byethost5.com";
	$dbuser="b5_13515150";
	$dbpassword="gaguli938";
	$dbname="b5_13515150_cadb";
	$dbh=new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpassword);
	$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	return $dbh;
*/
	$dbhost="localhost";
	$dbuser="root";
	$dbpassword="password";
	$dbname="cadb";
	$dbh=new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpassword);
	$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	return $dbh;
}

?>
