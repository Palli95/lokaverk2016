<?php

 include "header.php";
$employee = $db_man->getemployee(1);
?> <div class="adminbox">
<?php
foreach ($employee as $key) {
?> <div class="rammi">
<?php
 echo '<img src="'.$key[4].'" class="img-rounded myndinn "  title="'.$key[1].'"/>'."<br>";
	
	echo $key[1]."<br>";
	echo $key[2]."<br>";
	echo $key[3];
	?>
</div>
<?php

}
?>


</div>

   