<?php
	session_start();
	error_reporting(E_ALL);
	require_once("../db_class.php");

	if(isset($_SESSION[""]))
	{
		header('location: view/home.php');
		exit;
	}
	
	$username = "";
	$error = "";
	$err="";
	$success = "";

	if(isset($_GET["username"]))
	{
		$username = trim($_GET["username"]);
		
		$exist_user = MYDB::query(
															"select
																*
															from
																admin
															where
																username= ? "
															,
															array($username)
															,
															"SELECT"
														);	

		if(count($exist_user) > 0)
		{
			//retrieve single array
			$exist_user = $exist_user[0];
			$_SESSION["username"] = $username;
			$_SESSION["username"] = $exist_user["username"];
			
			header("location: adminlog2.php");
			exit;
		}
		if(trim($username) == ""){
			$error = "<p class = 'Warning'>Please fill out this field.</p>";
		}		
		else 
		{
			alert($exist_user);
			$error = "Invalid username. Please try again.";
		}
	}	
														

?>	

<?php
include_once 'db_class.php';
error_reporting(E_ALL);

$username = "";
$fname = "";
$lname = "";

if(isset($_POST['register']))
{	 
	$username = $_POST['username'];
	$password = $_POST['password'];
	$cnfrm_password = $_POST["cnfrm_password"];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	
	$exist_user = PDO_DB::query(
														"select
															*
														from
															admin
														where	
															username = ? "
														,
														array($username)
														,
														"SELECT"
													);	
	
	if(count($exist_user) > 0)
	{
		$error = "<i style='color:red;'>Sorry, {$username} is already taken. Please try again.</i>";
	}	
	else if(strlen($password) < 8)
	{
		//echo "<script>alert('Customer is already exist, Please try another one!')</script>";
		$err = "<i style='color:red;'>Password must have 8 character.</i>";
	}
	else if($password != $cnfrm_password)
	{
		$err = "Password does't match.";
	}
	else if($password == $cnfrm_password)
	{
	
			$sql = "INSERT INTO admin (username,password,firstname,lastname)
			VALUES ('$username',md5('$password'),'$fname','$lname')";
			if (mysqli_query($conn, $sql)) {
				
					header("Location: message.php");
					exit();
			} else {
				echo "Error: " . $sql . "" . mysqli_error($conn);
			}
			mysqli_close($conn);
	}
}
?>  

<!-- html file here-->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    
     <!-- Compiled and minified CSS -->
     <link rel="stylesheet" href="../view/assets/css/materialize.min.css">

     <!-- Compiled and minified JavaScript -->
	 <script src="../view/assets/js/materialize.min.js"></script>
	 <script type="text/javascript" src="../view/assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="../view/assets/js/routie.min.js"></script>
	<script type="text/javascript" src="../view/assets/js/loginScript.js"></script>
  </head>
  <style>
	  
	body {
	width: 100vw;
	height: 100vh;
	margin: 0;
	padding: 0;
	display: flex;
	align-items: center;
	justify-content: center;
	}
	.login-div {
	max-width: 430px;
	padding: 35px;
	border: 1px solid #ddd;
	border-radius: 8px;
	}
	.logo {
	background-image: url("locker.png");
	width:100px;
	height:100px;
	border-radius: 50%;
	margin:0 auto;
	}
  </style>
  <body>
</body>
<div class="login-div">
      <div class="row">
        <div class="logo"></div>
      </div>
      <div class="row center-align">
        <h5>Sign In</h5>
        <h6>One of the becomming one of the Employee</h6>
	  </div>
	  <form method = "POST" action = "register.php">
      <div class="input-fields-div autoMargin">
		<div class="row input-inline-field"> 
		<div class="input-field col s6">
		<input id="first_name" name="fname" type="text" class="validate">
		  <label for="first_name">First Name</label>
		  </div>
			<div class="input-field col s6">
			  <input id="last_name" name="lname" type="text" class="validate">
				<label for="last_name">Last Name</label>
				</div>
						</div>
						<div class="input-field">
					    <input id="reg_user_name" type="text" name="username" class="validate">
					          <label for="reg_user_name">Username</label>
							<span class="helper-text w3-red" data-error="wrong" data-success="right" > <strong><?php echo $error;?></strong></span>
								
						</div>
								<div class="row input-inline-field">
								<div id="reg_passwordDiv" class="input-field col s6">
						          <input id="reg_pass_word" type="password" name="password" class="validate">
						          <label for="reg_pass_word">Password</label>
								<a href="javascript:void(0)" class="showPassword" onclick="showPassword()"><i class="material-icons md-18">visibility</i></a>
						        </div>
										<div id="rePasswordDiv" class="input-field col s6">
						          <input id="re_pass_word" name="cnfrm_password" type="password" class="validate">
						          <label for="re_pass_word">Confirm</label>
							</div>
						<div class="input-field col s12 mar-no">
						<span class="helper-text w3-red" data-error="wrong" data-success="right" > <strong><?php echo $err;?></strong></span>
					</div>
				</div>
			<p>I have an account <a href="../adminlog/adminlog.php" class="backToLogin">Login Now</a></p>
			</div>
			<div class="input-fields-div autoMargin right-align">
			<button type="submit" onclick="register()" name="register" class="registerBtn waves-effect waves-light btn">Register</button>
		</div>
	</div>
</form>
</html>


	
<!--html ends->	
 







    
	 <script>
	$(document).ready(function () {
		$("#flash-msg").delay(3000).fadeOut("slow");
	});
	</script>
	<s>