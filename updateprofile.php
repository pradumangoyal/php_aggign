<?php 
function alert($obj){
echo "<script>alert('".$obj."')</script>";
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
         }
         echo "Hello";
session_start();
if(isset($_SESSION["admin_name"]))
{
$uname=$_SESSION["admin_name"];
echo $uname;
include("connect.php");
$sql="use first_year_db";
if($conn->query($sql) === TRUE){}
$sql = "SELECT *  FROM sociobook_gen where username='".$uname."'";
$result = $conn->query($sql);
if($row = $result->fetch_assoc()) { }
if(isset($_POST['submit'])){
$name=$phone=$age=$gender=$email=$branch=$interest="";
              $uname =  $_SESSION["admin_name"];
              $name =  test_input($_POST["name"]);
              $phone =  test_input($_POST["phone"]);
              $age =  test_input($_POST["age"]);
              $gender =  test_input($_POST["gender"]);
              $email =  test_input($_POST["email"]);
              $branch = test_input($_POST["branch"]);
              $interest = test_input($_POST["interest"]);
/* echo "update sociobook_gen SET email='".$email."' , gender='".$gender."' , mobile='".$phone."' , name='".$name."' , age='".$age."' , branch='".$branch."' , interest='".$interest."' where username='".$uname."'";
*/  $sql = "update sociobook_gen SET email='".$email."' , gender='".$gender."' , mobile='".$phone."' , name='".$name."' , age='".$age."' , branch='".$branch."' , interest='".$interest."' where username='".$uname."';";
          if ($conn->query($sql) === TRUE) {
            alert("DATA UPLOADED");
            header('Location: index.php');
          }
          else{
          }

}
}
else{
header('Location: index.php');
}
?>
<html>
<head>
<title>SOCIOBOOK</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="./updateprofile.js"></script>
<style>
body{
margin:0;
padding:0;
        background-color:#f1f1f1;
}
.box
{
width:700px;
padding:20px;
        background-color:#fff;
}
</style>
</head>
<body>
<fieldset>
<legend>UPDATE</legend>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" id="frmLogin" onsubmit="return checkform()">
<h3 align="center">Update Profile</h3><br />
<span id="key">Username: </span>
<input name="uname" type=text value="<?php echo $row['username']; ?>" id="uname" disabled>
<BR>
<span id="key">Name: </span>
<input name="name" type=text placeholder="Enter Your Name" onchange="nameval()" id="name" value="<?php echo $row['name'] ?>" required>
<span id="name-error" class="error"></span>
<BR>
<span id="key">Phone Number:</span>
<input type="text" name="phone" placeholder="Enter Your Mobile Number" onchange="phoneval()" required="yes" id="phone" value="<?php echo $row['mobile'] ?>" >
<span id="phone-error" class="error"></span>
<BR>
<span id="key">Age:</span>
<input name="age" type=text placeholder="Enter Your Age" onchange="ageval()" id="age" required  value="<?php echo $row['age'] ?>" >
<span id="age-error" class="error"></span>
<BR>
<span id="key">Gender:</span>
<input name="gender" onchange="genval()" type="radio" value="male" id="gender" value="male" <?php if($row['gender']=='male') echo 'checked'; ?>><span>MALE</span><input name="gender" type="radio" value="female" onchange="genval()" id="gender" value="female" <?php if($row['gender']=='female') echo 'checked'; ?>><span>FEMALE</span>
<span id="gender-error" class="error"></span>
<BR>
<span id="key">E-mail: </span>
<input name="email" type=text placeholder="Enter Your E-mail" onchange="eval()" id="email" required value="<?php echo $row['email'] ?>" >
<span id="email-error" class="error"></span>
<BR>
<span id="key">Branch: </span>
<input name="branch" type=text placeholder="Enter Your Branch" onchange="bval()" id="branch" value="<?php echo $row['branch'] ?>"  >
<span id="branch-error" class="error"></span>
<BR>
<span id="key">Interests: </span>
<input name="interest" type=text placeholder="Enter Your Interests" onchange="interestval()" id="interest" value="<?php echo $row['interest'] ?>"> 
<span id="interest-error" class="error"></span>
<BR>
<input type="submit" value="UPDATE" name="submit">
</form>
</fieldset>
<br />
</div>
</body>
</html>
