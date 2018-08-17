<?php
	ob_start();
	session_start();
	require_once 'dbconnect.php';
	if ( isset($_SESSION['user'])!="" ) {
		header("Location: Project/Home.html");
		exit;
	}
	$error = false;
	if( isset($_POST['btn-login']) ) {	
		// prevent sql injections/ clear user invalid inputs
		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);
		$pass = trim($_POST['pass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);
		// prevent sql injections / clear user invalid inputs
		if(empty($email)){
			$error = true;
			$emailError = "Please enter your email address.";
		} else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$error = true;
			$emailError = "Please enter valid email address.";
		}
		if(empty($pass)){
			$error = true;
			$passError = "Please enter your password.";
		}
		//if there's no error, continue to login
		if (!$error) {
			$password = hash('sha256', $pass); //password hashing using SHA256
		    $res=mysql_query("SELECT userId, userName, userPass FROM users WHERE userEmail='$email'");
			$row=mysql_fetch_array($res);
			$count = mysql_num_rows($res); //if username/pass correct return
			if( $count == 1 && $row['userPass']==$password ) {
				$_SESSION['user'] = $row['userId'];
				header("Location: Project/Home.html");
			} else {
				$errMSG = "Invalid Username or Password";
			}
				
		}
		
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login | Taste Index</title>
<link rel="stylesheet" href="Project/Form.css" type="text/css"  />
</head>

<body background="Project/Home.jpg">

<div class="login-page">
  <div class="form">
    <form class="login-form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    
    	
            
            
            
            	<input type="email" name="email" class="form-control" placeholder="Your Email" value="<?php echo $email; ?>" maxlength="40" />
                <span> <font color="red"> <?php echo $emailError; ?> </font> </span>
            
            <div >
            	<input type="password" name="pass" class="form-control" placeholder="Your Password" maxlength="15" />
                
                <span><font color="red"><?php echo $passError; ?></font></span>
            </div>
            
			            
            
            	<button type="submit" class="btn btn-block btn-primary" name="btn-login">Login</button>
				<br><br>
            	<a class="message" href="register.php">Not Registered? Sign Up Here</a>
            
			
       
   
    </form>
    </div>	

</div>

</body>
</html>
<?php ob_end_flush(); ?>