<?php
session_start();
include('../functions.php'); 

if(isset($_COOKIE['username']))
{
	$_SESSION['username'] = $_COOKIE['username'];
	$_SESSION['name'] = getName($_COOKIE['username']);
	header('Location: ../index.php');
	exit(0);
}
else
{
	header('Location: login.php');
	exit(0);
}

?>
