  <?php 

$errors = [];
$missing = [];



if (isset($_POST['send'])) {

    // list expected fields
    $expected = ['name', 'password'];
    $required = ['name', 'password'];
    // sækjum skrá sem vinnur með input gögnin úr formi, $_POST[]
    require 'process.php';
    $name = $_POST['name'];
  $password = $_POST['password'];
 

$user = $db_man-> getUser3($name,$password);

  $message23 = $ifadmin[0];
echo "<script type='text/javascript'>alert('$message23');</script>";

if($user > 1)
{  
  $_SESSION["name"] = $name;
    session_start();
     $_SESSION["name"] = $name;
  $message2 = $user[0];
echo "<script type='text/javascript'>alert('$message2');</script>";
header('Location: index.php');
}

else {

  $message2 = "ekki innskradur";
echo "<script type='text/javascript'>alert('$message2');</script>";
header('Location: index.php');


 ?> 




<?php
}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    

</head>
<body>
<?php include "header.php";


?>
<!-- The Modal -->
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-body">
        <span class="close" style="color:black">×</span>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Skrifaðu inn upplýsingar</h3>
            </div>
            <div class="panel-body">
              <form role="form" >              
                  <div class="form-group">                  
                      <input type="text" name="first_name" id="first_name" class="form-control input-sm floatlabel" placeholder="Nafn">                   
                  </div>                 
                    <div class="form-group" >
                      <input type="text" name="last_name" id="last_name" class="form-control input-sm" placeholder="Símanumer">
                    </div>
                <div class="form-group">
                  <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Netfang">
                </div>
                <div class="form-group">
                    <textarea class="span9" placeholder="Athugasemdir"></textarea>
                </div>
                <input type="submit" value="Bóka Tíma"   class="btn btn-info btn-block">
              </form>

            </div>
          </div>
    </div>
  </div>
    <h3>PogK</h3>   
</div>





<div class="image">
  <img src="macbook4.jpg" alt"" class="image stretch hidden-xs"/>
  <img src="macbookxs.jpg" alt"" class="image stretch hidden-lg hidden-mg hidden-lg"/>
  <h2 class="img-responsive"> Ttext9iodsjtsoidjf </h2>
  <h1 class="img-responsive">PogK</h1>
  <div class="box">
  <a class="myButton "  href="#popup1">Smelltu hér til að bóka tíma</a>
</div>
</div>
</div>
<?php
include "includes\products.php";
?>


<script src="dist/js/javascript.js"> </script>

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


</body>
</html>

