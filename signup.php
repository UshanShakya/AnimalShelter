
<!DOCTYPE html>
<html lang="en-us">
<head>
<meta charset="UTF-8">
<title>Sign up</title>
<link type="text/css"  rel="stylesheet" href="css/form.css">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Oswald">
	<link href='http://fonts.googleapis.com/css?family=Oleo+Script' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>
<head>
<body>

<?php
include "connection.php";
if(isset($_POST['cancel']))
	{
	session_start();
	if(session_destroy())
	{
	header('location:login.php');
	}}
	
	//Registering user 
	if(isset($_POST['register']))
		{
	$name = $_POST['name'];
	$address = $_POST['address'];
	$dob=$_POST['dob'];
	$gender = $_POST['gender'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$poscode=$_POST['postal'];
	$account = $_POST['account'];
	$pwd = $_POST['password'];
	$type = "User";
	$date=date("Y-m-d");

	$qry_register="INSERT INTO user_table VALUES('','$name',
	'$address','$dob','$gender','$phone','$email','$poscode','$account','$pwd',
	'$type','$date')";
	if($conn->query($qry_register) == FALSE)
	{
	die("Error: ".$conn->error);
	}
	echo '<script>alert("Registered Completed")</script>';
	}
?>
<div class="register">
	<div class="forms">
		     <div class="cancel">
        <a href="logout.php" title="cancel" ><img src="images/backto.png" alt="fbIcon" height="50" width="50"/></a>
      </div>
<h1>SIGNUP</h1>
<form method="post" name="regfrm">
	<label class="label">Full name: </label>
<input type="text" class="text" name="name" Placeholder="Your Name" /><br />
<label class="label">Address: </label>
<input type="text" class="text" name="address" Placeholder="Your Address"  /><br />
<label class="label">Date of Birth: </label>
<input type="date" name="dob" Placeholder="Date of Birth" /><br />
<label class="label">Gender: </label>
<input type="radio" name="gender" value="Male" checked/>
<span class="gen">Male </span>
<input type="radio" name="gender" value="Female"/>
<span class="gen">Female </span>
<input type="radio" name="gender" value="Others"/>
<span class="gen">Others </span><br /><br/>
<label class="label">Phone: </label>
<input type="text" class="text" name="phone" Placeholder="Your Phone Number" /><br />
<label class="label">Email:</label> 
<input type="email" name="email" Placeholder="Your Email Address"  /><br />
<label class="label">Postal Code:</label> 
<input type="text" name="postal" class="text" Placeholder="Your Postal address" /><br /><br />
<label class="label">Username:</label>
<input type="text"  id="account" name="account" Placeholder="Your Username" onkeyup="exist()" />
<span style=' margin-left: -4em; color:white;'>Check Availability</span>
<span id="show"></span><br /><br/>
<label class="label">Password:</label>
 <input type="password" name="password" Placeholder="Password"  /><br />
<label class="label">Confirm Password:</label> 
<input type="password" name="conpassword" Placeholder="Confirm Password"  /><br /><br />
<input type="submit" name="register" value="Register" onclick="return val()"/>
<input type="submit" name="cancel" value="Login" />
</form>
<script>
function val()
{

if (confirm("R U SURE?") == true)
{
var n=document.forms['regfrm']['name'].value;
var a=document.forms['regfrm']['address'].value;
var d=document.forms['regfrm']['dob'].value;
var p=document.forms['regfrm']['phone'].value;
var e=document.forms['regfrm']['email'].value;
var acc=document.forms['regfrm']['account'].value;
var pw=document.forms['regfrm']['password'].value;
var pwd=document.forms['regfrm']['conpassword'].value;

// var regp=/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;

if(n=="" || a=="" || p=="" || d=="" || e=="" ||acc=="" ||pw=="" ||pwd=="")
{
alert ("Empty field");
return false;
}
// else if(!p.match("regp"))
// {
 // alert ('Phone is not validated...Please account the problem');
 // return false;
// }
}
else
{
	return false;
}
}	
</script> 

<script>
function exist()
{
var user = document.getElementById("account").value;
var req;
if(window.XMLHttpRequest)
{
req = new XMLHttpRequest()
}
else
{
req = new ActiveXObject("Microsoft.XMLHTTP");
}

req.onreadystatechange=function()
{
	if (req.readyState==4 && req.status==200) 
	{
	document.getElementById("show").innerHTML = req.responseText;	
	}
}
req.open("GET","Checking.php?value="+user,true);
req.send();
}
	
</script> 

</div>
</div>
</body>
</html>