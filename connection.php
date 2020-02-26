<?php
$conn = new mysqli("localhost","root","","dwdatabase");

if(!mysqli_select_db($conn,"dwdatabase"))
{
	header("location:setup.php");
	die();
}
if($conn->connect_error)
{
die("Connection Failed: ".$conn->connect_error);
}
?>