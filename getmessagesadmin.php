<link rel="stylesheet" href="style.css">
<?php
  include "php/class.datamanager.php"; 
$db_man = new DatabaseManager('localhost','website','root','Tinnioglisa12');
$startchat = $db_man->messagesadmin(1);

$id3 = $_POST['btn3'];

?> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>

<?php

foreach ($startchat as $lykill ) {
?>
  <div id="Div11"><input id="Button2" type="button" value="Loka glugga" />
<div>
<div class="scrollactivity">
<?php
$message = $db_man->messagesadminchats($lykill[3]);
foreach ($message as $key) {
	?>
	
	<?php	
	echo $key[1]."<br>";
	?>
	
	<?php
}

?></div>


                <form name="myform" id="myform" action="" method="POST"> 
  <input type="text" name="message" EnableViewState="false" return false id="message" size="30" value=""/> 
   <textarea disabled name="comment" rows="5" cols="40" EnableViewState="true" ><?php echo $lykill[1];?></textarea>
  <?php 
  echo '<button name="btn" class="btn"   type="submit" value="abc" onclick="setTimeout(myFunction, 100);">Senda skilaboð</button>'."<br>";
  ?>
  </form>
  </div>
  </div>
        <?php


       }
?>