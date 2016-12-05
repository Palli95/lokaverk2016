<link rel="stylesheet" href="style.css">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="dist/css/bootstrap.min.js" rel="stylesheet">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <link rel="stylesheet" href="style.css">
      <script src="dist/css/bootstrap2.js"> </script>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
      <script src="dist/js/javascript.js"> </script>
   
 
       
        <script>
        autoloadpage2();
         setInterval(function () { autoloadpage2(); }, 750);  
        function autoloadpage2() {
            $.ajax({
                url: "getmessageschat.php",
                type: "POST",
                timeout: 5000,
                success: function(html) {
                    $(".getmessageschat").html(html); 
                },
    fail: function() {                                     
      $('.getmessageschat').html('<div class="getmessageschat">Reyndu aftur seinna.</div>');
    }

            });
        }
        </script>

         <script>
        autoloadpage5();
         setInterval(function () { autoloadpage5(); }, 750);  
        function autoloadpage5() {
            $.ajax({
                url: "getmessagesadmin.php",
                type: "POST",
                timeout: 5000,
                success: function(html) {
                    $(".getmessagesadmin").html(html); 
                },
    fail: function() {                                     
      $('.getmessagesadmin').html('<div class="getmessagesadmin">Reyndu aftur seinna.</div>');
    }

            });
        }
        </script>
     
<script>
         
        function sendmessage() {
            $.ajax({
                url: "sendmessage.php",
                type: "POST",
                timeout: 5000,
                success: function(html) {
                    $(".Div1").html(html); 
                },
    fail: function() {                                     
      $('.Div1').html('<div class="Div1">Reyndu aftur seinna.</div>');
    }

            });
        }
        </script>

        

<?php
  include "php/class.datamanager.php"; 
$db_man = new DatabaseManager('localhost','website','root','Tinnioglisa12');

 $title = basename($_SERVER['SCRIPT_FILENAME'], '.php'); $title = str_replace('_', ' ', $title);  $title = ucwords($title);
if (isset($_POST['logout'])) {
    // empty the $_SESSION array
    $_SESSION = [];
    // invalidate the session cookie
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time()-86400, '/');
    }
    // end session and redirect
    session_destroy();

    header('Location: http://tsuts.tskoli.is/2t/gus/vef2a3u/v5/authentication/login_pdo.php');
    exit;
}







        if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$name = $_SESSION["name"];
$user = $db_man->getuserInfo($name);

?>
<title>Myndir<?php if (isset($title)) {echo "&#8212;{$title}";} ?> </title>












<header>
          <nav class="navbar navbar-default navbar-fixed-top" >
              <div class="container">
                
                  <a class="navbar-brand " href="#" ><?php echo $user[1] ?></a>
            <a class="navbar-brand " href="index.php" >Herra Snjallri</a>

            
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>            
                    <span class="icon-bar"></span>
                  </button>
                   <li class="dropdown" style="float:right">
                      <a class="dropdown-toggle navbar-brand" data-toggle="dropdown" href="#">Um okkur <span class="caret"></span></a>
                      
                      <ul class="dropdown-menu">
                        

                        <li><a href="employee.php">Starfsmenn</a></li>

                       
                        <li><a href="#">Verð</a></li>
                        <li><a href="#">Hafa samband</a></li>
                        <?php  if (isset($_SESSION['name']) && $_SESSION['name'] == true) 
                      { ?>
                       <a href="logout.php" class="logbutton"  >Logout</a></li>
                       
              <?php   }
                       else 
                       {
                          ?> 
                          <li><button class="logbutton" onclick="document.getElementById('id01').style.display='block'"  >Login</button></li> 
                          <?php
                       }

                       
                       $ifadmin = $db_man->getAdmin($user[0]);

                    if($ifadmin[0] == 1)
                        {
                          ?><li><a href="adminsite.php">Admin</a></li><?php
                        }
                       ?>
                      </ul>
                    </li> 
                
               


                <?php
$prod = $db_man->getproducts(1);
?> 

<div class="collapse navbar-collapse">
<ul class="nav navbar-nav">
<?php
foreach ($prod as $key) {

 echo '<li><a href="#'.$key[1].'" data-toggle="collapse" data-target=".navbar-collapse">'.$key[1].'</a></li>';
}
?>
 </ul>
</div>

              </div>
          </nav>
      </header>

 
<div id="id01" class="modal5">
  
  <form method="post" class="modal-content5 animate" action="">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close5" title="Close Modal">&times;</span>
    </div>

    <div class="container5">
      <label><b>Notendanafn</b></label>
      <input type="text" placeholder="Enter Username" name="name" required>

      <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>
        
      <button class="logbutton" type="submit" name="send">skrá inn</button >
     
    </div>
  </form>
</div>


<style>
/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */

/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container5 {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal5 {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content5 {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close5 {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close5:hover,
.close5:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate5 {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)}
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)}
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>



<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}



</script>

<script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){
    $("#myform").validate({
      debug: false,
      rules: {
        name: "required",
        email: {
          required: true,
          email: true
        }
      },
      messages: {
        name: "Please let us know who you are.",
        email: "A valid email will help us get in touch with you.",
      },
      submitHandler: function(form) {
        // do other stuff for a valid form
        $.post('sendmessage.php', $("#myform").serialize(), function(data) {
          $('#results').html(data);
        });
      }
    });
  });
  </script>
  <style>
  label.error { width: 250px; display: inline; color: red;}
  </style>
<script>
function funClear() {

    document.getElementById("form1").reset();

} 

</script>
    <div class="skilabodabox">
   <div id="Div1"><input id="Button2" type="button" value="Loka glugga" />
<div><div class="scrollactivity">
    <div class="getmessageschat">
    </div> 
      </div></div>

                <form name="myform" id="myform" action="" method="POST"> 
  <input type="text" name="message" id="message" size="30" value=""/> 

  <?php
  if (isset($_SESSION['name']) && $_SESSION['name'] == true) 
                      {   }
                       else 
                       {
    $db_man->createmessageuser();
  $user = $db_man->getusermessage(1);
  $_SESSION["name"] = $user[0];
    session_start();
    $_SESSION["name"] = $user[0];

                       }
$name = $_SESSION["name"];

echo '<button name="btn2" class="btn" style="display: none;"  type="submit" hidden value="'.$name.'" onclick="setTimeout(myFunction, 100);">Senda skilaboð</button>'."<br>";

echo '<button name="btn" class="btn"   type="submit" value="abc" onclick="setTimeout(myFunction, 100);">Senda skilaboð</button>'."<br>";
?>
</form></div>
<div id="Div2">

<input id="Button1" type="button" onclick="submitinfo();" value="Hafa samband" />

</div>

    </div> 
    <script>
      var div1 = document.getElementById('Div1'),
    div2 = document.getElementById('Div2');
function switchVisible() {
  if(!div1) return;
  if (getComputedStyle(div1).display == 'block') {
    div1.style.display = 'none';
    div2.style.display = 'block';
  } else {
    div1.style.display = 'block';
    div2.style.display = 'none';
  }
}
document.getElementById('Button1').addEventListener('click', switchVisible);
document.getElementById('Button2').addEventListener('click', switchVisible);
    </script>

   

<script>



function myFunction() {
    document.getElementById("message").value = "";
}
</script>
  


  <?php
  if($ifadmin[0] == 1)
                        {
                          ?>
                           
  
    <div class="getmessagesadmin">
      <input type="text" name="message"  id="message" size="30" value=""/> 
    </div> 
      

    

                          <?php
                        }
  ?>