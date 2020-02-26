<?php
session_start();
if(!isset($_SESSION['acc'] ))
{
header('location:login.php');
}

?>
<!DOCTYPE html>
<html lang="en-us">
<head>
<meta charset="UTF-8">
<title>User Home</title>
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family= Open Sans;">
  <link href='http://fonts.googleapis.com/css?family=Oleo+Script' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>
<link type="text/css"  rel="stylesheet" href="css/all.css">
</head>
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

  <div class="user">
 <?php
if (isset($_SESSION['name']))
{
$username=$_SESSION['name'];
echo 'Welcome '.$username;
}
else
{
echo '<script>alert("Please Login")</script>';
}
?> 
</div>
 <div class="animals_box">
	
<?php
include 'connection.php';
//selecting all data from a table
$qry_sel = "SELECT * FROM animals_table";
$result = $conn->query($qry_sel);
if($result->num_rows > 0)
{
while($animal = $result->fetch_assoc())
{
	
echo "<div class='boxinside'>
		<img src='Animalimage/".$animal['Picture']."'
		 height='180' width='250' style='margin:5px 30px' />
		 <p><b>Name: </b><span>".$animal['Animal_name']."</span></p>
		 <p ><b>Breed: </b> <span>".$animal['Breed']."</span></p>
		<p><b>Type: </b><span>".$animal['Type']."</span></p>";
		 

		$aid=$animal['aid'];
		$qry_checkbooking="SELECT * From booking_table WHERE animalid='$aid'";
		$resultbook= $conn->query($qry_checkbooking);
		if($resultbook->num_rows==0)
		{	
		echo	"<br><p id='adopt' style='font-size:20px;'><a href='Animalbooking.php?aid=
				".$animal['aid']."'>Adopt Me</a></p>";
		}
		else
		{
			echo "<br><p><b style='font-size:23px; color:#f7322e;'>Already Adopted</b></p>";
		}
	
		echo "<p style='margin-left:2.5em;'><a href='single.php?ids= ".$animal['aid']."'>View Detail</a></p>";
		echo "</div>";
	
}
}
else
{
echo "No data found";
}
?>

</div> 

<div style='color:white;background-color:rgba(0, 0, 0, 0.4);'>
 <h1 >BROWSING HISTORY OF YOUR</h1>
 <?php 
 if(isset($_COOKIE['save']))
 {
  $save =  $_COOKIE['save']; //2
  $qry = "select * from animals_table where aid = '$save'";
  $res = $conn->query($qry);
  while($data=$res->fetch_array())
  {
    echo "Visited:  ".$data['Type']." ".$data['Animal_name'];
  }
 
 }
 else
 {
 echo "no browsing history";
 }
 ?>
 
 <a href="historydelete.php" style='color:grey; text-decoration: none;'>delete history</a>
</div>
</div>
</body>
</html>