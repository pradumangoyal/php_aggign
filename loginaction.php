   <?php 
   include('connect.php');
  // Check connection
          if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
          }

          $sql = "Use first_year_db";
          if ($conn->query($sql) === TRUE) {
          }
         $name = $pass_input = "";
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
              $name = test_input($_POST["username"]);
              $pass_input = test_input($_POST["password"]);
         }

         function test_input($data) {
         $data = trim($data);
         $data = stripslashes($data);
         $data = htmlspecialchars($data);
         return $data;
         }

         $sql = "SELECT * FROM sociobook_passkeys where username='$name' or email='$name'";
         //SQL
         $result = $conn->query($sql);
         if ($result->num_rows > 0) {
               // output data of each row
               if($row = mysqli_fetch_array($result)) {
         $pass_db=$row["passkey"];
         if(!empty($_POST["login"])) {
           $_SESSION["id"]=$row["id"];
           if(!empty($_POST["remember"])){
             setcookie("member_login",$name,time()+(10 * 365 * 24 * 60 * 60));
             setcookie ("member_password",$pass_input,time()+ (10 * 365 * 24 * 60 * 60));
           } else{
             if(isset($_COOKIE["member_login"])) {
               setcookie ("member_login","");
             }
             if(isset($_COOKIE["member_password"])) {
               setcookie ("member_password","");
             }
           }
         }
        }
      }

if($pass_db==crypt($pass_input,'$5$rounds=5000$sociobook_2018$'))
{echo '<script>alert("BHAI TERI ID")</script>';
  $target_dir = "uploads/";
  $target_file = $target_dir . $name.".png";
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



}
else{
  echo '<script>alert("GALAT PASSWORD DALEGA BHAI?")</script><head><meta http-equiv="refresh" content="0; url=./index.php" /></head>';}
  ?>
  <script>console.log("hello2")</script>;
  <form action="http://192.168.121.187:8001/php_assign/pg/upload.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">


  </body>
  </html>
