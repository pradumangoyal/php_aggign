<!doctype html>
<html>
   <head>
      <title>SOCIO-BOOK</title>
      <meta charset="utf-8">
      <link href="./frontstyle.css" rel="stylesheet" type="text/css">
      <link type="icon" type="image/png" href="logo.png">
   </head>
   <body>
   <fieldset>
       <legend align="left">Login</legend>
       <div class="loginsec container">
       <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
         <input name="username" type="text" placeholder="Username/Email" id="username">
         <input name="password" type="password" placeholder="Password" id="password">
         <input type="submit" value="LogIn" class="block submit">
         </form>
       </div>
     </fieldset>
       <?php
          $servername = "192.168.121.187";
          $username = "first_year";
          $password = "first_year";

   // Create connection
          $conn = new mysqli($servername, $username, $password);

  // Check connection
          if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
          }
          echo "Connected successfully";
          $sql = "Use first_year_db";
          if ($conn->query($sql) === TRUE) {
               echo "Database created successfully";
          } else {
               echo "Error creating database: " . $conn->error;
          }
          $sql = "Select id from pg_author";
          if ($conn->query($sql) === TRUE) {
                echo "Database created successfully";
          } else {
                echo "Error creating database: " . $conn->error;
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
         echo "<br>Key: ".crypt($pass_input,'$5$rounds=5000$sociobook_2018$')."!Ends";
         $sql = "SELECT passkey FROM sociobook_passkeys where username='$name' or email='$name'";
         //SQL
         $result = $conn->query($sql);
         if ($result->num_rows > 0) {
               // output data of each row
               while($row = $result->fetch_assoc()) {
                         $pass_db=$row["passkey"];
                             }
         }
        echo "$pass_db";
        if($pass_db==crypt($pass_input,'$5$rounds=5000$sociobook_2018$'))
        echo '<script>alert("hello")</script>';
        else
       echo '<script>alert("bye")</script>';
        ?>
        <script>console.log("hello2")</script>;

    </body>
</html>
