<?php
include_once "class.datamanager.php"; 
$db_man = new DatabaseManager('localhost','website','root','Tinnioglisa12');
$name = $_POST['name'];
$password = $_POST['phone'];



$userinfo = $db_man->getUser3("pa","pa");
if ($userinfo > 1)
{
	echo "logged";


}
	
else {
	echo $userinfo[0];
echo $userinfo;
	echo "ekki logged";
foreach ($user as $key => $value) {
	echo $value[2];
}


}

/* delimiter //
CREATE PROCEDURE bokuntima(in nafn varchar(255), in phone varchar(255), in email varchar(255), in commentt varchar(255))
BEGIN

INSERT INTO `bokun`( `nafn`, `phone`, `email`, `commentt`) VALUES (nafn,phone,email,commentt);

end; 
delimiter; //*/


?>






