  <?php
include 'connection.php';

session_start();
if(!isset($_SESSION['acc']) || $_SESSION['type'] !="User")
{
header('location:login.php');
}

$donar="";
$email="";
if(isset($_POST['donate']))
{
  $donar=$_SESSION['name'];
  $email=$_POST['email'];
  $amount=$_POST['amount'];


  $qry_donins="INSERT INTO donation_table VALUES('','$donar','$email','$amount')";
  if($result=$conn->query($qry_donins)==False)
  {
die("Error: ".$conn->error);
}
echo '<script>alert("Donated Successfully")</script>';
}

$userid=$_SESSION['id'];
//Selecting the user detail from usertable who ever is active..
$qry_userselect= "SELECT * FROM user_table WHERE id='$userid'";
$result_user = $conn->query($qry_userselect);
$row_value= $result_user->fetch_assoc();
$email = $row_value['Email'];

?>
<!DOCTYPE html>
<html lang="en-us">
<head>
<meta charset="UTF-8">
<title>Admin Page</title>
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family= Open Sans;">
  <link href='http://fonts.googleapis.com/css?family=Oleo+Script' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>
  <link type="text/css"  rel="stylesheet" href="css/form1.css">
  <link type="text/css"  rel="stylesheet" href="css/all.css">

</head
 <a name="above"></a>
<body class="bg">
  <div class="main">
	<div class="headuser">
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
<div class="donateform">
  <h1> DONATION </h1>
  <div class="subdonateform">
    <form method="POST">
        <label>Donar name:</label> <input type="text" name="donator"
		value="<?php echo $_SESSION['name']; ?>" placeholder="Name of donar"/> <br><br>
        <label>Email:</label> <input type="text" name="email" 
		value="<?php echo $email; ?>" placeholder="Email"/> <br><br>
		<label>Donated Amount:</label> <input type="text" name="amount" placeholder="Amount"/> <br><br>
		<input type="submit" name="donate" value="Donate"/>
    </form>
</div>
</div>
</div>
</body>
</html>
