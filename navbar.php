<link rel="stylesheet" type="text/css" href="CSS/styleagain.css">
<div id="navbar">
	  <div class=login> 
		  
		  <form action="navbar.php" method="post">
    <input type="submit" name="signup" value="Sign up" onclick="sign()" class="sign"/>
    <input type="submit" name="login" value="Log in" onclick="login()" class="sign"/>
</form> 
		</div>
		<div class="username">
    <p id="username"> Welcome 
		<?php 
		$cookiename="user";
		if(!isset($_COOKIE[$cookiename])) {
  	$name=rand(10000,999999);
		echo "Guest".$name;
		$cookiename="user";
		setcookie($cookiename, $name, time() + (86400 * 30), "/");
}
 	else {
	echo " " . $_COOKIE[$cookiename];
}
		
		
		?> 
		
			</p>
		</div>
</div>
<?php
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['login']))
    {
        login();
    }
    function login()
    {
        header("Location: login.php");
		die();   
    }
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['signup']))
    {
        sign();
    }
    function sign()
    {
        header("Location: signup.php");
		die();   
    }
?>
