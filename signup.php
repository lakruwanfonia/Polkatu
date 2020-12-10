<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
</head>

<body>
	<?php include 'navbar.php';?>
	<h3> Registration</h3>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
	  <label>Email Address:</label><br>
  <input type="email" name="remail"><br>
	  <label>Password:</label><br>
	<input type="password" name="rpass"> <br>
		<label>Full Name:</label><br>
	<input type="text" name="fname"> <br>
		
		
  <input type="submit" value="Register Now"><input type="reset" value="Reset">
</form>
	
		<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect value of input field
  $remail = $_REQUEST['remail']; 
	$rpass = $_REQUEST{'rpass'};
	$fname = $_REQUEST{'fname'};
  if (!empty($remail) && !empty($rpass) && !empty($fname)) {
	  // Directory
$directory = "Accounts";

// Returns array of files
$files = scandir($directory);

// Count number of files and store them to variable..
$num_files = count($files)-3;
	  
	  $low_email = strtolower($remail);
	  
	  file_put_contents("Accounts/".$low_email.".csv",$num_files.",".$low_email.",".$rpass.",".$fname);
	  
	  echo "Account Created Succesfully <br>";
	  echo "Your Account Number is : ".$num_files;
	  
	  
	  //sleep(5);
	  //header("Location: login.php");
	  //die();
  } else{
	  echo "Fill all the fields";
  }
}
?>
<br><a href="login.php">Login</a>
</body>
</html>