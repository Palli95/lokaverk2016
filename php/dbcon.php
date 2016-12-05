<?php
try{
$source = 'mysql:host=localhost;dbname=website';
$user = 'root';
$password = 'Tinnioglisa12';

	$pdo = new PDO($source, $user, $password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->exec('SET NAMES "utf8"');
}
catch (PDOexception $e){
	echo 'tenging mistókst: ' . $e->getMessage();
	exit();
}
?>