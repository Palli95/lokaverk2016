<?php
 session_start();
include_once "class.datamanager.php"; 
$db_man = new DatabaseManager('localhost','website','root','Tinnioglisa12');
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$comment = $_POST['comment'];



$db_man->newBokun($name,$phone,$email,$comment);
header('Location: ../index.php');
		
	
/* delimiter //
CREATE PROCEDURE bokuntima(in nafn varchar(255), in phone varchar(255), in email varchar(255), in commentt varchar(255))
BEGIN

INSERT INTO `bokun`( `nafn`, `phone`, `email`, `commentt`) VALUES (nafn,phone,email,commentt);

end; 
delimiter; //*/


?>










