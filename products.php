<?php
  include "../php/class.datamanager.php"; 
$db_man = new DatabaseManager('localhost','website','root','Tinnioglisa12');
$prod = $db_man->getproducts(1);
?> 


<?php

foreach ($prod as $key) {
	?>
	
	<?php
  echo '<div class="insided1">  '.$key[1].' <br> <h4>'.$key[2].'</h4> </div>';

?> 
<div class="d1">
<?php
 
 echo '<div id="'.$key[1].'"</div>';

 echo  '<img src="'.$key[3].'" class="imageprod" id="'.$key[2].'"  title="'.$key[1].'"/>'."<br> " ;


  ?>
</div>

<?php

}
?>