<?php
include_once "class.datamanager.php"; 
$db_man = new DatabaseManager('localhost','website','root','Tinnioglisa12');
session_start();
$name = $_POST['name'];
$password = $_POST['password'];

$_SESSION["name"] = $name;

$db_man->connectUser($name,$password);
header('Location: ../innskra.php');
		
?>