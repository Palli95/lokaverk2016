<link rel="stylesheet" href="style.css">
<body onload="myFunction()">
<?php 
 
include "header.php";

if (isset($_POST['newuser'])) {
    // list expected fields
    $expected = ['name'];
    $required = ['name'];
    // sækjum skrá sem vinnur með input gögnin úr formi, $_POST[]
    require 'process.php';
    $name = $_POST['name'];
 
$getuser = $db_man-> getuserinfo($name);
$user = $db_man-> getUser3($name,$password);

if($getuser > 1)
{  
  $message2 = " ".$getuser[1]."  er i noktun veldu annnad username";
  echo "<script type='text/javascript'>alert('$message2');</script>";
}
else {
    $message2 = " ".$name." var buinn til :)";
	echo "<script type='text/javascript'>alert('$message2');</script>";
	$db_man->newuser($name);
	}
}
if (isset($_POST['deleteuser'])) {
    // list expected fields
    $expected = ['name'];
    $required = ['name'];
    // sækjum skrá sem vinnur með input gögnin úr formi, $_POST[]
    require 'process.php';
    $name = $_POST['name'];
 
$getuser = $db_man-> getuserinfo($name);
$user = $db_man-> getUser3($name,$password);

if($getuser > 1)
{  
 $message2 = " ".$name." var eyddur";
	echo "<script type='text/javascript'>alert('$message2');</script>";
	$db_man->deleteUser($name);

}
else {
    $message2 = " ".$name." er ekki til";
	echo "<script type='text/javascript'>alert('$message2');</script>";
	
	}
}
 ?>
 
<?php  if (isset($_SESSION['name']) && $_SESSION['name'] == true) 
                      { ?>
 <div class="adminbox">
 <div class="adminboxtext">
 <button class="logbutton" onclick="document.getElementById('id02').style.display='block'"  >Búa til notenda</button>
 <button class="logbutton" onclick="document.getElementById('id03').style.display='block'"  >Skoða bókaða tíma</button>
  <button class="logbutton" onclick="document.getElementById('id04').style.display='block'"  >Eyða notenda</button>
   <button class="logbutton" onclick="document.getElementById('id05').style.display='block'"  >Skoða notendur</button>

  <a class="logbutton" href="#popup10" >búa til dálk</a>

 </div>
 </div>
 
<div id="popup1" class="overlay">
  <div class="popup">
    <!--<h2>Here i am</h2>-->
    <a class="close2" href="#">&times;</a>
    <div class="content">
       <form role="form" action='php/bokatima.php' method='post' accept-charset='UTF-8'>              
                  <div class="form-group">                  
                      <input type="text" name="name" id="name" class="form-control input-sm floatlabel" placeholder="Nafn">                   
                  </div>                 
                    <div class="form-group" >
                      <input type="text" name="phone"  class="form-control input-sm" placeholder="Símanumer">
                    </div>
                <div class="form-group">
                  <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Netfang">
                </div>
                <div class="form-group">
                    <textarea class="span9" name="comment" id="comment" placeholder="Athugasemdir"></textarea>
                </div>
                <input type="submit" value="Bóka Tíma"   class="btn btn-info btn-block">
              </form>
    </div>
  </div>
</div>
  
</div>
</div>


  

     <div id="popup10" class="overlay">
  <div class="popup">
    <!--<h2>Here i am</h2>-->
    <a class="close2" href="#">&times;</a>
    <div class="content">
   



              <form action="upload.php" method="post" enctype="multipart/form-data">
              Nafn á dálk
              <input type="text" name="name" id="name" class="form-control input-sm floatlabel" placeholder="Nafn">
              Upplýsingar um dálk 
              <input type="text" name="dis" id="name" class="form-control input-sm floatlabel" placeholder="Upplýsingar">
    Mynd á dálk
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Bæta við dálk" name="submit">
</form>
    </div>
  </div>
</div>





<div id="id02" class="modal5">
  
  <form method="post" class="modal-content5 animate" action="">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close5" title="Close Modal">&times;</span>
    </div>

    <div class="container5">
    <div class="form-group">       
                  Default password er password         
                      <input type="text" name="name" id="name" class="form-control input-sm floatlabel" placeholder="Nafn">                   
                  </div>                 
                    
                
              <button class="logbutton" type="submit" name="newuser">Bua til user</button >
    </div>
  </form>
</div>

<div id="id03" class="modal5">
  
  <form method="post" class="modal-content5 animate" action="">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id03').style.display='none'" class="close5" title="Close Modal">&times;</span>
    </div>

    <div class="container5">
    <table border="1" style="width:100%">
  <tr>
    <th>bokunarnumer</th>
    <th>nafn</th>
    <th>Simi</th>
    <th>Email</th>
    <th>Comment</th>
    <th>dagsetning</th>
  </tr>
  <?php
    foreach ($bokanir as $entry) {
      echo '<tr><td>'.$entry[0].'</td><td>'.$entry[1].'</td><td>'.$entry[2].'</td><td>'.$entry[3].'</td><td>'.$entry[4].'</td><td>'.$entry[5].'</td></tr>';
    }
    ?>
    </table>
    </div>
  </form>
</div>


<div id="id04" class="modal5">
  
  <form method="post" class="modal-content5 animate" action="">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id04').style.display='none'" class="close5" title="Close Modal">&times;</span>
    </div>

    <div class="container5">
               
                  <div class="form-group">       
                  Skrifaðu inn nafn á user til að eyða           
                      <input type="text" name="name" id="name" class="form-control input-sm floatlabel" placeholder="Nafn">                   
                  </div>                 
                    
                
              <button class="logbutton" type="submit" name="deleteuser">Eyda user</button >
              

    </div>
  </form>
</div>

<div id="id05" class="modal5">
  
  <form method="post" class="modal-content5 animate" action="">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id05').style.display='none'" class="close5" title="Close Modal">&times;</span>
    </div>

    <div class="container5">
               
                <table border="1" style="width:100%">
  <tr>
    <th>stafsID</th>
    <th>nafn</th>
    <th>dagstning</th>
  </tr>
  <?php
    foreach ($userrow as $entry) {
      echo '<tr><td>'.$entry[0].'</td><td>'.$entry[1].'</td><td>'.$entry[2].'</td></tr>';
    }
    ?>
    </table>
    </div>
  </form>
</div>

<div id="id06" class="modal5">
  
  <form method="post" class="modal-content5 animate" action="upload.php">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id06').style.display='none'" class="close5" title="Close Modal">&times;</span>
    </div>

    <div class="container5">
               
                
              Nafn á dálk
              <input type="text" name="name" id="name" class="form-control input-sm floatlabel" placeholder="Nafn">
              Upplýsingar um dálk 
              <input type="text" name="dis" id="name" class="form-control input-sm floatlabel" placeholder="Upplýsingar">
    Mynd á dálk
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Bæta við dálk" name="submit">
              

    </div>
  </form>
</div>
<?php }
else { header("index.php");
  ?>

<script>
function myFunction() {
    window.location = "index.php";
    window.location.href = 'index.php';
}
</script>
<?php
}
?>

</body>



