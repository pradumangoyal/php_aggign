<?php
function alert($obj){
echo "<script>alert('".$obj."')</script>";
}
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
              }
$target_dir = "photos/";
$target_file = $target_dir . $uname.".png";
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
          if($check !== false) {
                            $uploadOk = 1;
                                } else {
                                          alert("File is not an image.");
                                                  $uploadOk = 0;
                                                      }

// Check if file already exists
/*if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
          $uploadOk = 0;
}*/
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
      alert("Sorry, your file is too large.");
          $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
          $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
      alert("Sorry, your file was not uploaded.");
      // if everything is ok, try to upload file
} else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                alert("The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.");
                    } else {
                              alert("Sorry, there was an error uploading your file.");
                                  }
}}

//COVER PIC UPLOAD
$ctarget_dir = "cphotos/";
$ctarget_file = $ctarget_dir . $uname.".png";
$cuploadOk = 1;
$cimageFileType = strtolower(pathinfo($ctarget_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submitc"])) {
      $ccheck = getimagesize($_FILES["fileToUploa"]["tmp_name"]);
          if($ccheck !== false) {
                            $cuploadOk = 1;
                                } else {
                                          alert("File is not an image.");
                                                  $cuploadOk = 0;
                                                      }

// Check if file already exists
/*if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
          $uploadOk = 0;
}*/
// Check file size
if ($_FILES["fileToUploa"]["size"] > 500000) {
      alert("Sorry, your file is too large.");
          $cuploadOk = 0;
}
// Allow certain file formats
if($cimageFileType != "jpg" && $cimageFileType != "png" && $cimageFileType != "jpeg"
    && $cimageFileType != "gif" ) {
      alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
          $cuploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($cuploadOk == 0) {
      alert("Sorry, your file was not uploaded.");
      // if everything is ok, try to upload file
} else {
      if (move_uploaded_file($_FILES["fileToUploa"]["tmp_name"], $ctarget_file)) {
               alert("The file ". basename( $_FILES["fileToUploa"]["name"]). " has been uploaded.");
                    } else {
                              alert("Sorry, there was an error uploading your file.");
                                  }
}}
?>


<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> 
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
box-sizing: border-box;
width:99vw;
background-color:#fff;
}
.profile{
position:relative;
border: 2px solid rgba(255,255,255,0.78);  
top: -50px;
     background-color: #42f49e;
left: 50px;
}
.uname, .desc{
  box-sizing: border-box;
  font-family: 'Open Sans', sans-serif;
  font-size: 40px;
  font-weight: 700;

}
.desc{
border: 1px solid black;
font-size: 20px;
text-align: center;
margin-top: 50px;
padding: 10px;
}
a{
color: black;
}
</style>
</head>
<body>
<div class="box">
<img src="<?php echo "./cphotos/".$uname.".png";?>" width="100%" height="300px" alt="Cover Pic not Updated">
<img src="<?php echo "./photos/". $uname.".png"; ?>" width="130px" height="150px" class="profile">
<div align="center" class="uname"><?php echo $_SESSION["admin_name"]; ?></div>

<div class="data" align="center"><div class="desc">Hello, Myself <?php echo $row["name"]; ?>. I am a <?php echo $row["age"]; ?> years old <?php echo $row["gender"]; ?>. I am a major in <?php echo $row["branch"]; ?> & interested in <?php echo $row["interest"]; ?>. You can contact me on my email-id <a href="mailto:<?php echo $row["email"]; ?>"><?php echo $row["email"]; ?></a> or on my phone <a href="tel:<?php echo $row["mobile"]; ?>" target="_blank"><?php echo $row["mobile"]; ?></a> .</div>
</div>

<br />
<form action="http://192.168.121.187:8001/php_assign/pg/home.php" method="post" enctype="multipart/form-data">
Select Profile Photo to upload:
<input type="file" name="fileToUpload" id="fileToUpload" value="Choose Profile Pic">
<input type="submit" value="Upload Profile Pic" name="submit">
</form>
<form action="http://192.168.121.187:8001/php_assign/pg/home.php" method="post" enctype="multipart/form-data">
<br>
Select Cover Photo to upload:
<input type="file" name="fileToUploa" id="fileToUploa">
<input type="submit" value="Upload Cover Photo" name="submitc">
</form>
<p><a href="updatepass.php"><button>Update Password</button></a>   <a href="updateprofile.php"><button>Update Profile</button></a>    <a href="commonfeed.php"><button>Common Feed</button></a> <a href="logout.php"><button>Logout</button></a></p>
</div>
</body>
</html>
