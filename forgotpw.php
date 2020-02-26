<?php
include 'connection.php';

session_start();

?>

<!DOCTYPE html>
<html lang="en-us">
<head>
<meta charset="UTF-8">
<title>Forget Password</title>
<link type="text/css"  rel="stylesheet" href="style.css">
</head>
<body>
	<div class="login">
<div class="sublogin">
        <h1>Login</h1>
    <form  method="post">

        
      
            <input type="text"  placeholder="New Password" name="pwd" />
               
                
                    <input type="text"  placeholder="Confirm Password" name="conpwd" />
              
                <span class="forgotpw"><a href="forget.php?">Forgot Password</span>
        
                <input type="submit" name="save" value="Reset" />  

    
    </form>
</div>
</div>

</body>
</html>
