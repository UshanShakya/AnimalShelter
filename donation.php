  <?php
include 'connection.php';

session_start();
if(!isset($_SESSION['acc']) || $_SESSION['type'] !="Admin")
{
header('location:login.php');
}

/*Total donated amount calculated */
$query_sel = "SELECT * FROM donation_table";
$res = $conn->query($query_sel);

$total= 0;
while ($sum =$res->fetch_assoc()) {
    $total += $sum['Amount'];

}

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
                 <li ><a href="admin.php" >ANIMALS</a></li>
                     <li ><a href="donation.php" >DONATION </a></li>
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
<div class="amount">
<h1 style="color:white;">Total donation: <?php echo $total;?></h1>
</div>

 <!--  Fetching data from database to table -->
    <div class="donation_table">
      <?php


      $qry_select = "SELECT * FROM donation_table";
$result = $conn->query($qry_select);

if($result->num_rows > 0)
{
echo "<table border='1'>
      <tr><th>Donationid</th><th>Donar Name</th><th>Email Address</th><th>Amount</th></tr>";
while($donation = $result->fetch_assoc())
{
echo "<tr>
    <td style='width:5px;'>".$donation['did']."</td>
    <td>".$donation['Donar_name']."</td>
    <td>".$donation['Email']."</td>
    <td>".$donation['Amount']."</td>
     </tr>";
}


echo "<tr> <th colspan='3' style='font-size:25px; margin-left:10em; '><b>Total</b></th>
     <th>$total</th>
     </tr><table>";
}
else
{
echo "<span style='color:white';>Data not found</span>";
}
?>
    </div>


</div>
</body>
</html>
