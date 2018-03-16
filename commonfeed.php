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

session_start();
if(isset($_SESSION["admin_name"]))
{
$uname=$_SESSION["admin_name"];
include("connect.php");
$sql="use first_year_db";
if($conn->query($sql) === TRUE){}
$sql = "SELECT *  FROM sociobook_gen where username='".$uname."'";
$result = $conn->query($sql);
if($row = $result->fetch_assoc()) { }
if($row['username']=='NULL' || $row['email']=='NULL' || $row['gender']=='NULL' || $row['mobile']=='NULL' || $row['name']=='NULL' || $row['age']=='NULL' || $row['branch'] == 'Not Filled' || $row['interest']=='Not Filled')
{
alert("Please Update Your Data To see Common Feed");
header('Location: updateprofile.php');
}

if(isset($_POST['submit'])){
$name=$uname="";
              $uname =  $_SESSION["admin_name"];
              $content =  test_input($_POST["content"]);
              $date = date("H:i:s, d-M-Y");
  $sql = "insert into sociobook_post(username, content, date) values('".$uname."','".$content."','".$date."');";
          if ($conn->query($sql) === TRUE) {

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
textarea{
 width: 60vh;
height: 300px;
}
.post{
  text-align="center";
  width: 50vh;
  min-height: 100px;
  margin-left: 25vh;
  background-color: white;
  border: 1px solid grey;
  white-space: pre-line;
  word-wrap: break-word; 
}
.username{
font-size: 12px;
}
.timestamp{
color: grey;
font-size: 12px;       
}
.data{
margin-top: 10px;
}
</style>
</head>
<body>
<a href="index.php"><button>Go Back</button></a>
<fieldset>
<legend>UPDATE</legend>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" id="frm">
<h3 align="center">Update Post</h3><br />
<input name="uname" type=text value="<?php echo $row['username']; ?>" id="uname" disabled>
<BR>
<textarea name="content" placeholder="Write Something Here..." form="frm" required></textarea>
<BR>
<input type="submit" value="UPDATE" name="submit">
</form>
</fieldset>
<br />
</div>
<?php
$sql = "SELECT *  FROM sociobook_post order by id DESC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
                echo "<div class='post'><div class='username'>" . $row["username"]. "</div><div class='timestamp'>" . $row["date"]. "</div><div class='data'> " . $row["content"]. "</div></div><br>";
                    }
} else {
      echo "No Post Available";
}

?>
</body>
</html>
