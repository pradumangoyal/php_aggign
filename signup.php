<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<head>
<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta content="utf-8" http-equiv="encoding">
<title>FORM-VALIDATION</title>
<link href="./style.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>
<body>
<fieldset>
<legend>SIGN-UP</legend>
<form name="my_form" id="my_form" action="signupaction.php" onsubmit="return checkform()" method="post">
<tr><td><span id="key">Username: </span></td><td>
<input name="uname" type=text placeholder="Enter a Username" onkeyup="check()" id="uname" onChange="unameval()" required></td><td>
<span id="user-availability-status"></span></td><td>
<span id="uname-error" class="error"></span></td></tr>
<BR>
<tr><td><span id="key">Name: </span></td><td>
<input name="name" type=text placeholder="Enter Your Name" onchange="nameval()" id="name" required></td><td>
<span id="name-error" class="error"></span></td></tr>
<BR>
<span id="key">Phone Number:</span>
<input type="text" name="phone" placeholder="Enter Your Mobile Number" onchange="phoneval()" required="yes" id="phone">
<span id="phone-error" class="error"></span>
<BR>
<span id="key">Age:</span>
<input name="age" type=text placeholder="Enter Your Age" onchange="ageval()" id="age" required>
<span id="age-error" class="error"></span>
<BR>
<span id="key">Gender:</span>
<input name="gender" onchange="genval()" type="radio" value="male" id="gender"><span>MALE</span><input name="gender" type="radio" value="female" onchange="genval()" id="gender"><span>FEMALE</span>
<span id="gender-error" class="error"></span>
<BR>
<span id="key">E-mail: </span>
<input name="email" type=text placeholder="Enter Your E-mail" onchange="eval()" id="email" required>
<span id="email-error" class="error"></span>
<BR>
<span id="key">Password: </span>
<input name="pwd" type=password placeholder="Enter Your Password" required="yes" id="pwd" onchange="pval()" value="" required>
<span id="pwd-error" class="error"></span>
<BR>
<span id="key">Re-type Password: </span>
<input name="r-pwd" type=password placeholder="Confirm Password" onchange="repval()" id="r-pwd" required>
<span id="rpwd-error" class="error"></span>
<BR>
<input type="submit" value="SUBMIT">
</form>
</fieldset>
<script type="text/javascript" src=./scripts.js></script>
</body>
</html>

