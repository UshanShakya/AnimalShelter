<?php
include 'connection.php';

session_start();
if(!isset($_SESSION['acc']))
{
header('location:login.php');
}
  

$name="";
$address="";
$dob="";
$gender="";
$phone="";
$poscode="";
$email="";
$account="";
$pwd="";

if (isset($_SESSION['name']))
{
$userid=$_SESSION['id'];
//Selecting the user detail from usertable who ever is active..
$qry_userselect= "SELECT * FROM user_table WHERE id='$userid'";
$result_user = $conn->query($qry_userselect);
$row_value= $result_user->fetch_assoc();
$name = $row_value['Name'];
$address = $row_value['Address'];
$dob=$row_value['DOB'];
$gender = $row_value['Gender'];
$phone =$row_value['Phone'];
$email = $row_value['Email'];
$poscode=$row_value['Postal_Code'];
$account = $row_value['Account'];
$pwd = $row_value['Password'];
}

//update user table
if(isset($_POST['updateuser']))
{
$userid=$_SESSION['id'];
$username=$_SESSION['name'];
$name = $_POST['name'];
$address = $_POST['address'];
$dob=$_POST['dob'];
$gender = $_POST['gender'];
$phone =$_POST['phone'];
$email = $_POST['email'];
$poscode=$_POST['postal'];                   
$account = $_POST['account'];
$password = $_POST['password'];

$qry_userupdate = "UPDATE user_table SET Name='$name', Address='$address', DOB='$dob', Phone='$phone', Gender='$gender',
       Email='$email', Postal_code='$poscode', Account='$account' ,Password='$password' WHERE id='$userid'";
if($conn->query($qry_userupdate) == FALSE)
{
die("Update user Error: ".$conn->error);
}
echo '<script>alert("Updated successfully")</script>';
}	
?>
<!DOCTYPE html>
<html lang="en-us">
<head>
<meta charset="UTF-8">
<title>Profile change</title>
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family= Open Sans;">
  <link href='http://fonts.googleapis.com/css?family=Oleo+Script' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>
  <link type="text/css"  rel="stylesheet" href="css/form.css">
<link type="text/css"  rel="stylesheet" href="css/all.css">

</head>
 <a name="above"></a>
<body class="bg">
  <div class="main">
	<div class="header">
		<div class="sub_headerone">
        <div class="logo">
             <img src="images/logo.jpg" alt="Spencer Animal Shelter logo" height="80" width="150" />
          </div>
          
        <div class="navbar">
           <ul type="none" >
                 <li ><a href="user.php" >ANIMALS</a></li>
                     <li ><a href="forum.php" >FORUM </a></li>
                       <li ><a href="myaccount.php" > Account
                  <?php $acc=$_SESSION['acc']; 
                  echo $acc; ?> </a></li>
                  <li ><a href="userdonation.php" >DONATION</a></li>
                     <li ><a href="logout.php" >LOG OUT</a></li>
      </ul>  
    </div>
  
		</div>	
    <div class="social">
        <div class="facebook">
        <a href="https://www.facebook.com" title="Facebookpage" target="_blank"><img src="images/Facebook.png" alt="fbIcon" height="50" width="50"/></a>
      </div>
      <div class="instagram">
          <a href="https://www.instagram.com"  title="Instagrampage" target="_blank"><img src="images/Instagram.png" alt="instagramIcon" height="50" width="50"/></a>
      </div>
      <div class="Twitter">
       <a href="https://www.twitter.com"  title="Twitterpage" target="_blank"><img src="images/Twitter.png" alt="twitterIcon" height="50" width="50"/></a>
      </div>
      <div class="youtube">
          <a href="https://www.youtube.com"  title="Youtubepage" target="_blank"><img src="images/Youtube.png" alt="InstagramIcon" height="50" width="50"/></a>
      </div>
    </div> 
	</div>


<div class="register">
	<div class="forms">		
  <h1>Change Profile</h1>	
		<form method="POST" >
				<label class="label">Full name: </label><input type="text" name="name" value="<?php echo $name?>" required /><br /><br />
<label class="label">Address: </label><input type="text" name="address" value="<?php echo $address?>" /><br /><br />
<label class="label">Date of Birth: </label><input type="date" name="dob" value="<?php echo $dob?>" /><br /><br />
<label class="label">Gender: </label>
<input type="radio" name="gender" value="Male" <?php echo ($gender=='Male')?'checked':'' ?> checked />
<span class="gen">Male</span>
<input type="radio" name="gender" value="Female" <?php echo ($gender=='Female')?'checked':'' ?>/>
<span class="gen">Female </span>
<input type="radio" name="gender" value="Others" <?php echo ($gender=='Others')?'checked':'' ?>/>
<span class="gen">Others</span><br /><br />
<label class="label">Phone: </label><input type="text" name="phone" value="<?php echo $phone?>" /><br /><br />
<label class="label">Email:</label> <input type="email" name="email"  value="<?php echo $email?>"/><br /><br />
<label class="label">Postal Code:</label> <input type="text" name="postal" value="<?php echo $poscode?>"/><br /><br />
<label class="label">Username:</label><input type="text" id="account" name="account" value="<?php echo $account?>" onkeyup="exist()" />
<span style='margin-left: 10px; margin-right:10px; color:white;'>Check Availability</span>
<span id="show"></span><br /><br /><br />
<label class="label">Password:</label> <input type="password" name="password" Placeholder="Password"  value="<?php echo $pwd?>"/><br /><br />

<input type="submit" name="updateuser" value="Change Profile" />
</form>
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

<div class="footer">
  <h2>Contact Us</h2>
  <div class="ephone">
          <div class="ephone1"><img src="images/phone.png" alt="GKClogo" height="60" width="60"/></div> 
          <div class="ephone2"><img src="images/Email.png" alt="GKClogo" height="60" width="60"/></div>
        </div>          
        <div class="info">
                 Dillibazar, Kathmandu Nepal<br><br> 
                +977-1-423 2455, 224 8511 <br><br> 
                 Email : SAS10@gmail.com
         </div>


          <div class="copyright">
          <p>©2018 COPYRIGHT SAS, All Rights Reserved & Privacy Terms</p>
        </div>


</div>
<div><a href="#above" id="top">Back to top of page ↑</a></div> 
</div>
</body>
</html>
