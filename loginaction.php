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
{echo '<script>alert("BHAI TERI ID")</script>';}
else{
  echo '<script>alert("GALAT PASSWORD DALEGA BHAI?")</script><head><meta http-equiv="refresh" content="0; url=./index.php" /></head>';}
  ?>
  <script>console.log("hello2")</script>;


  </body>
  </html>
