<?php
include "php/class.datamanager.php"; 
$db_man = new DatabaseManager('localhost','website','root','Tinnioglisa12');

$name = $_SESSION[$user[0]];
$comment = $_POST['message'];
$id = $_POST['btn'];
$id2 = $_POST['btn2'];
$user = $db_man->getusermessage(1);
$name = $_SESSION[$user[0]];
if(empty($comment))
{
	echo "tómt";
}
else 
{
	foreach ($user as $key) {
		
	}
	$db_man->newmessagechat2($comment,$id2);
}



?>