<?php
session_start();
//echo $_SESSION['email'];exit;
if(!isset($_SESSION["email"]) || $_SESSION["utype"] != 'admin' )
{
	//echo $_SESSION['alogin'];exit;
	header("location:../index.php");


}
?>