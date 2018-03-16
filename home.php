<?php
session_start();
if(!isset($_SESSION["admin_name"]))
{
  header("location:index.php");
}
$uname=$_SESSION["admin_name"];
include("connect.php");
$sql="use first_year_db";
if($conn->query($sql) === TRUE){}
$sql = "SELECT *  FROM sociobook_gen where username='".$uname."'";
$result = $conn->query($sql);
if($row = $result->fetch_assoc()) {
          echo "username " . $row["username"]. " - email: " . $row["email"]. " " . $row["mobile"]. "<br>";
              }
$target_dir = "photos/";
$target_file = $target_dir . $uname.".png";
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
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

// Check if file already exists
/*if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
          $uploadOk = 0;
}*/
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
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
}}
?>


<html>
<head>
<title>SOCIO-BOOK</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<style>
body
{
margin:0;
padding:0;
        background-color:#f1f1f1;
}
.box
{
width:500px;
padding:20px;
        background-color:#fff;
}
</style>
</head>
<body>
<div class="box">
<img src="<?php echo "./photos/". $uname.".png"; ?>" width="100px" height="150px"><h3 align="center">Welcome - <?php echo $_SESSION["admin_name"]; ?></h3>
<br />
<form action="http://192.168.121.187:8001/php_assign/pg/home.php" method="post" enctype="multipart/form-data">
Select image to upload:
<input type="file" name="fileToUpload" id="fileToUpload">
<input type="submit" value="Upload Image" name="submit">

<p><a href="logout.php">Logout</a></p>
</div>
</body>
</html>
