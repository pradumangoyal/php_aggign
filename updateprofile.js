console.log("opened");
a =0;


function phoneval() {

  var phone = document.getElementById("phone").value;
  var pregex=/^(0|91|\+91){0,1}[\-\s\.]{0,1}[7-9]{1}[0-9]{4}[-\s\.]{0,1}[0-9]{5}$/;
  if(!pregex.test(phone))
  {
    document.getElementById("phone-error").innerHTML = "<img src='./wrong.png' style='width: 20px; height: 20px;'>Please Enter a Valid Phone Number";
    return false;
  }
  else{
    document.getElementById("phone-error").innerHTML = "<img src='./correct.png' style='width: 20px; height: 20px;'>";
    return true;
  }

}

function ageval() {

  var age = document.getElementById("age").value;
  console.log(age)
    var ageregex=/^[0-9]{1,2}$/;
  if(!ageregex.test(age))
  {
    document.getElementById("age-error").innerHTML = "<img src='./wrong.png' style='width: 20px; height: 20px;'>Please Enter a Valid Age";
    return false;
  }
  else{
    document.getElementById("age-error").innerHTML = "<img src='./correct.png' style='width: 20px; height: 20px;'>";
    return true;
  }

}

function genval() {

  var gen = document.getElementById("gender").value;
  console.log(gen);
  var genregex=/^(male|female)$/;
  if(!genregex.test(gen))
  {
    document.getElementById("gender-error").innerHTML = "<img src='./wrong.png' style='width: 20px; height: 20px;'>Please Enter Your Gender";
    return false;
  }
  else{
    document.getElementById("gender-error").innerHTML = "<img src='./correct.png' style='width: 20px; height: 20px;'>";
    return true;
  }

}

function eval() {

  var email = document.getElementById("email").value;

  var eregex=/^([\w-]+(\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,})\.([a-z]{2,}(\.[a-z]{2})?)$/i;
  if(!eregex.test(email))
  {
    document.getElementById("email-error").innerHTML = "<img src='./wrong.png' style='width: 20px; height: 20px;'>Please Enter a Valid Email-ID";
    return false;
  }
  else{
    document.getElementById("email-error").innerHTML = "<img src='./correct.png' style='width: 20px; height: 20px;'>";
    return true;
  }

}

function bval() {

  var name = document.getElementById("branch").value;
  var nameregex=/^[A-Za-z\s]{1,}$/i;
  if(!nameregex.test(name))
  {
    document.getElementById("branch-error").innerHTML = "<img src='./wrong.png' style='width: 20px; height: 20px;'>Please Enter a Valid Entry";
    return false;
  }
   else if(name.length==0 || name=="Not Filled"){
     document.getElementById("branch-error").innerHTML =""; 
     return true;}
  else{
    document.getElementById("branch-error").innerHTML = "<img src='./correct.png' style='width: 20px; height: 20px;'>";
    return true;
  }}
function interestval() {

  var name = document.getElementById("interest").value;
  var nameregex=/^[A-Za-z\s]{1,}$/i;
  if(!nameregex.test(name))
  {
    document.getElementById("interest-error").innerHTML = "<img src='./wrong.png' style='width: 20px; height: 20px;'>Please Enter a Valid Entry";
    return false;
  }
  else if(name.length==0 || name=="Not Filled")
  { 
   document.getElementById("interest-error").innerHTML = "";
   return true;
  }
  else{
    document.getElementById("interest-error").innerHTML = "<img src='./correct.png' style='width: 20px; height: 20px;'>";
    return true;
  }
}

function nameval() {

  var name = document.getElementById("name").value;
  var nameregex=/^[A-Za-z\s]{1,}$/i;
  if(!nameregex.test(name))
  {
    document.getElementById("name-error").innerHTML = "<img src='./wrong.png' style='width: 20px; height: 20px;'>Please Enter a Valid Name";
    return false;
  }
  else{
    document.getElementById("name-error").innerHTML = "<img src='./correct.png' style='width: 20px; height: 20px;'>";
    return true;
  }
}
function checkform(){
 var d =(nameval() && eval() && genval() && ageval() &&  phoneval() && bval() && interestval());
 if(d==0) {d=false;
 alert("Dont Try to Mess With me!! Already this PHP Assignment Fu**s me!!PLEASE!!");
 }
 console.log(d);
 return d;
  }

