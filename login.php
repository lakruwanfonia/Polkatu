<?php include 'navbar.php';?>
<br><br><br>
	<h2>Login</h2>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Email Address: <input type="email" name="femail"><br>
	Password: <input type="password" name="pass"> <br>
  <input type="submit" name="login1">
</form>
	

<?php
$cookiename="user";
if(!isset($_COOKIE[$cookiename])) {
  echo "Cookie named '" . $cookiename . "' is not set!";
} else {
	$name=$_COOKIE[$cookiename];
  echo "You are logged in as:" .$name."<br>";
}



if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['login1'])) 
	{
        login1();
    }
  // collect value of input field
	function login1(){
		
  	$email = $_REQUEST['femail']; 
	$pass = $_REQUEST['pass'];
  if (!empty($email) && !empty($pass)) {
	  
	  $current_time = date("l jS \of F Y h:i:s A");
	  $IP = $_SERVER['REMOTE_ADDR'];
      $myfile = fopen("Accounts/".$email.".csv", "r") or die("This Account does not exist <br>");
	  $acc= fgetcsv($myfile);
	  $low_email = strtolower($email);

	  

	if ($low_email == $acc[1] && $pass == $acc[2]){
		$trackfile = fopen("Accounts/Tracking/".$email.".csv","a+") or die("This Account does not exist<br>");
		
		echo "Login Success <br> Welcome ".ucwords($acc[3]);
		$cookiename="user";
			  
	  fwrite($trackfile,","."Login : ".$current_time."----> IP = ".$IP);
		setcookie($cookiename,ucwords($acc[3]) , time() + (86400 * 30), "/");
	  	header("Location: index.php");
		fclose($myfile);
		fclose($trackfile);
		
		} else{
		  echo "Incorrect Password Or Username<br>";
		
			}
  } else {
	
	  echo "Please complete all the feilds<br>";

  	}
		}

?>
	<br>
	<a href="signup.php">Register</a>

