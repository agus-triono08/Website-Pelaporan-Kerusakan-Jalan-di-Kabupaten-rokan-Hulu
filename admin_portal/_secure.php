<?php
session_start();
if (!isset($_SESSION['Admin_Portal'])) {
	//include ("login.php");     
	//exit;
	header("location:logout.php");
}
