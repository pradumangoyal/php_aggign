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

         function test_input($data) {
         $data = trim($data);
         $data = stripslashes($data);
         $data = htmlspecialchars($data);
         return $data;
         }
         $pass=crypt($pass,'$5$rounds=5000$sociobook_2018$');
          $sql = "insert into sociobook_gen(username,email,gender,mobile,name,age) values('$uname','$email','$gender','$phone','$name','$age')";
          $result = $conn->query($sql);
          if ($result === TRUE) {
            echo "DATA UPLOADED";
          }
         $sql = "insert into sociobook_passkeys(username,email,passkey) values('$uname','$email','$pass')";
          $result = $conn->query($sql);
          if ($result === TRUE) {
            echo "Passkey Updated";
          }
         
         ?>
        <script>console.log("hello2")</script>;
      

    </body>
</html>
