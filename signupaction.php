 <!DOCTYPE html>
<html>
   <head>
     <script>error_reporting(E_ALL);
     ini_set('display_errors', 1);</script>
     <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
     <meta content="utf-8" http-equiv="encoding">

      <title>SOCIO-BOOK</title>
    <link href="./frontstyle.css" rel="stylesheet" type="text/css">
      <link type="icon" href="logo.png">
   </head>
   <body>
   <fieldset>
     <?php 
   include('connect.php');
  // Check connection
          if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
          }
          else echo "Connected";

          $sql = "Use first_year_db";
          if ($conn->query($sql) === TRUE) {
            echo "Connected again";
            $try = ($_POST["gender"]);
          }
              $uname =  test_input($_POST["uname"]);
              $name =  test_input($_POST["name"]);
              $phone =  test_input($_POST["phone"]);
              $age =  test_input($_POST["age"]);
              $gender =  test_input($_POST["gender"]);
              $email =  test_input($_POST["email"]);
              $pass = test_input($_POST["pwd"]);
              $rpass = test_input($_POST["r-pwd"]);

         function test_input($data) {
         $data = trim($data);
         $data = stripslashes($data);
         $data = htmlspecialchars($data);
         return $data;
         }
         $pass=crypt($pass,'$5$rounds=5000$sociobook_2018$');
          $rpass=crypt($rpass,'$5$rounds=5000$sociobook_2018$');
         
          if (preg_match('/^[A-Za-z\s0-9\_]{1,}$/i' ,$uname) && preg_match('/^([\w-]+(\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,})\.([a-z]{2,}(\.[a-z]{2})?)$/i',$email ) && preg_match('/^(0|91|\+91){0,1}[\-\s\.]{0,1}[7-9]{1}[0-9]{4}[-\s\.]{0,1}[0-9]{5}$/ ' ,$phone) && preg_match('/^[A-Za-z\s]{1,}$/i ' , $name) && preg_match('/^[0-9]{1,2}$/ ' , $age) && preg_match('/^(male|female)$/ ' ,$gender) && $pass!="" && $pass==$rpass )  {
         $sql = "insert into sociobook_gen(username,email,gender,mobile,name,age) values('$uname','$email','$gender','$phone','$name','$age')";
         $result = $conn->query($sql); 
         $sql = "insert into sociobook_passkeys(username,email,passkey) values('$uname','$email','$pass')";
         if($result === TRUE){echo "Data Uploaded";}
         $result = $conn->query($sql);
          if ($result === TRUE) {
            echo "Passkey Updated";
         header('Location: index.php');
          }}
          else
          echo "Data Not Uploaded, Check Validations";
        echo "<a href='index.php'>Jump back to MAin Page</a>"; 
         ?>
        <script>console.log("hello2")</script>;
      

    </body>
</html>
