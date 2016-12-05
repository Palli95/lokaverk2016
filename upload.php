<?php

// list expected fields
    $expected = ['name'];
    $required = ['name'];
    // sækjum skrá sem vinnur með input gögnin úr formi, $_POST[]
    require 'process.php';
    $name = $_POST['name'];
    $dis = $_POST['dis'];
    
 
$getprod = $db_man-> checkproducts($name);

if($getprod > 1)
{  
  $message2 = " ".$getuser[1]."  er nú þegar til";
  echo "<script type='text/javascript'>alert('$message2');</script>";
}
else {
   
$path = basename( $_FILES["fileToUpload"]["name"]);
$target_dir = "productsimage/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);


// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
 $message2 = " ".$name." var buinn til :)";
  echo "<script type='text/javascript'>alert('$message2');</script>";
  $db_man->newproduct($name,$dis);
$db_man->updateproductimg($name,$path);

echo $name;
}
header('Location: adminsite.php');
?>