 <!DOCTYPE html>
<html>
   <head>
      <title>SOCIO-BOOK</title>
      <meta charset="utf-8">
      <link href="./frontstyle.css" rel="stylesheet" type="text/css">
      <link type="icon" href="logo.png">
   </head>
   <body>
   <fieldset>
       <legend align="left">Login</legend>
       <div class="loginsec container">
       <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
         <input name="username" type="text" placeholder="Username/Email" id="username" value="<?php echo $_COOKIE["member_login"] ?>">
         <input name="password" type="password" placeholder="Password" id="password" value="<?php echo $_COOKIE["member_password"] ?>"><br>
         <input type="checkbox" name="remember" id="remember" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?> />
         <input type="submit" value="LogIn" class="block submit" name="login">
         </form>
       </div>
     </fieldset>
   <?php 
   include('connect.php');
  // Check connection
          if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
          }

          $sql = "Use first_year_db";
          if ($conn->query($sql) === TRUE) {
          }
         $uname = $pass_input = "1";
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
                         if(!empty($_POST["login"])) {
                         $_SESSION["id"]=$row["id"];
                         if(!empty($_POST["remember"])){
                           setcookie("member_login",$name,time()+(10 * 365 * 24 * 60 * 60));
                           setcookie ("member_password",$_POST["password"],time()+ (10 * 365 * 24 * 60 * 60));
                             } else{
                                 if(isset($_COOKIE["member_login"])) {
                                          setcookie ("member_login","");
                                                  }
                                  if(isset($_COOKIE["member_password"])) {
                                           setcookie ("member_password","");
                                                  }
                            }
         }
         $pass_db=$row["passkey"];
               }}

        if($pass_db==crypt($pass_input,'$5$rounds=5000$sociobook_2018$'))
{echo '<script>alert("hello")</script>';
        echo '<script>alert($_COOKIE)</script>';}
        else
       echo '<script>alert("bye")</script>';
       echo '<script>alert($_COOKIE)</script>';
         ?>
        <script>console.log("hello2")</script>;
      

    </body>
</html>
