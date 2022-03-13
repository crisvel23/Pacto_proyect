<?php 
error_reporting(0);
session_start();

require_once 'db_connect.php';

//echo $_SESSION['userId'];

if(!$_SESSION['userId']) {
	
	header('location: index.php');	
} 

?>