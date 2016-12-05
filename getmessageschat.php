<?php
include "php/class.datamanager.php"; 
$db_man = new DatabaseManager('localhost','website','root','Tinnioglisa12');
session_start();
$userid = $_SESSION['name'];
$test = $userid;
$activity =  $db_man->getmessages3($test);
//$db_man->newproduct($userid,$userid);

foreach ($activity as $lykill ) {


         echo $lykill[0];
         echo " - ";
         echo $lykill[2]."<br>";
       }

?>
