<?php
	session_start();
	error_reporting(E_ALL);
	require_once("db_class.php");

	if(isset($_SESSION[""]))
	{
		header('location: view/home.php');
		exit;
	}
	
	$username = "";
	$error = "";

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
			if($exist_user);
			$error = "<p class = 'Warning'>Invalid username. Please try again.</p>";
		}
	}	
														

?>	



<!-- html file here-->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Login (Admin)-Vlogshipped</title>
	<link rel="icon" type="image/png" href="image/lock.png">
	<!-- Favicons -->
	<link href="../assets/img/favicon.png" rel="icon">
  	<link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../view/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../view/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="../view/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../view/assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="../view/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../view/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../view/assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../view/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Bootslander - v2.2.0
  * Template URL: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
	</head>
    <style>
    {

margin: 0px;
padding: 0px;
}

body{

margin-bottom:60px;
font-size: 120%;
width: 120%;
max-width: 100%;
background-image: url("");
background-size: 106%;

}


p{
font-family: arial;
font-size: .82353em;
margin-top: 0px;	

}
h4 {
font-family: arial;
color: #232323;
margin-top: 5px;
margin-bottom: 5px;
text-align: center;
padding: 5px;
text-transform: none;
font-size: 18px;
word-wrap: break-word; 
}

h2 {

font-family: arial;
color: #232323;
margin-top: 5px;
margin-bottom: 5px;
text-align: center;
padding: 5px;
text-transform: none;
font-size: 18px;
word-wrap: break-word;
}
h1{
font-family: arial;
color: #232323;
margin-top: 100px;
margin-bottom: 20px;
font-size: 1.05882em;
text-align: center;
}

button{
    margin-top: 10px;

}
input{
    margin-top: 10px;
}

form{

box-shadow: 0 4px 6px 0 rgba(181,181,181,.7);
box-sizing: fixed;
margin: 0px auto;
padding: 30px;
background: white;
 min-height: 370px;

position: absolute;
width: 360px;
right: 30px;


}	

h3{
color: #538eed;
text-align: right;
letter-spacing: .1em;
padding: 0;
margin: 2px 0 0;
font: normal normal normal 14px/1 FontAwesome;
font-size: 15px;
-webkit-font-smoothing: antialiased;
padding-bottom: 5px;

}


.header {
width: 100%;
color: white;
background: white;
text-align: right;
padding: 30px;
box-sizing: border-box;
box-shadow: 0 3px 5px 0 rgba(181,181,181,.7);
margin-bottom: 27px;
padding-right: 25px;

}

.header2 {

width: 100%;
color: block;
background: white;
text-align: right;
padding: 2px;
box-sizing: border-box;
box-shadow: 3px 0 3px 2.5px rgba(181,181,181,.6);
position: fixed;
bottom: 0;
text-align: center;
display: inline;
padding: 6px 0;
font-size: .58824em;
position: fixed;
bottom: 0;
background: #fff;
z-index: 1;
width: 100%;

}

.btn{
    padding: 10px;
font-size: 18px;
color: white;
background: #538eed;
border: none;
border-radius: 3px;
font-weight: bold;
font-size: .94118em;
width: 100%;


}

.input-group input {
height: 40px;
width: 93%;
padding: 5px 10px;
font-size: 15px;
border: 1px solid gray;
letter-spacing: normal;
font-size: .94118em;
border-radius: 0;
border-bottom: 1px solid #cfd2d5;
border-top: none;
border-left: none;
border-right: none;
z-index: 1;
position: relative;
}
.input-group2 input{
height: 40px;
width: 93%;
padding: 5px 10px;
font-size: 15px;
border: 1px solid gray;
letter-spacing: normal;
font-size: .94118em;
border-radius: 0;
border-bottom: 1px solid #cfd2d5;
border-top: none;
border-left: none;
border-right: none;
z-index: 1;
position: relative;  
margin-top: 0px;  
  
}


a:hover {
opacity: 0.6;
}

.btn:hover {
opacity: 0.6;
}
button:active {
background: #1100db;
}
h3:hover{
opacity: 0.6;
}

img{

 border: 0px solid #ddd;
  border-radius: 10px;
   padding: 5px;
   width: 148px;
}
a{
font-family: arial;
color: #188fff;
text-decoration: none;
}
span{
color: black;
}
.input-group{
margin: 0px 0px 10px 0px;

}

.input-group label{
display: block;
text-align: left;
margin: 4x;
border-top: none;

}
.input-group2{
margin: 10px 0px 10px 0px;

}

.input-group2 label{
display: block;
text-align: left;
margin: 4x;
border-top: none;

}

.Warning{
width: 92%;
margin: 0px auto;
padding: 10px;
border: 1px solid #a94442;
color: #a94442;
background: #f2dede;
border-radius: 5px;
text-align: center;
}
p{
text-align: center;
}
    
    </style>
  
    

<body id="page-top" ng-app="myApp" ng-controller="myCtrl">
	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
		<div class="container">
			<a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="../view/image/locker.png" width="50" height="50" alt=""> Vlogshipped</a>	
			</div>
		</div>
    </nav>
	<br> 
	<br>
	<br><br><br/>
    <form method = "GET" action = "adminlog.php">
		 <center><img height="150" src="staff-default.jpg"></center>
		<h2>Sign in</h2>  
		<?php 

				echo $error;

		?>
		<div class = "input-group">
			<input type = "text" required = "required" vaue = "<?php  echo $username; ?>" autofocus="true" tabindex="1" placeholder = "username" name = "username">

		</div>
			<button type = "submit" name = "login-username" class = "btn">Next</button><br>
			<br>
			
            <p>forgot password? <a href="#"> Click here</a></p>
			<p>not yet registered? <a href="../registration/register.php"> Click here</a></p>
            
		</br>
	</br>
	</br>
	</br>
	</br>
	</br>


		
		

	</form>

	<div class = "header2">
	     
	     
   
		</div>
    </body>
    <html>