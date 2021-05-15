<?php
	session_start();
	error_reporting(E_ALL);
	require_once("../db_class.php");

	//check for login

	if(! isset($_SESSION["username"]) )
	{
		header("location: ../adminlog/adminlog.php");
		exit;
	}

	$id = $_SESSION["username"];
	$Hi = "";


	$exist_user = MYDB::query(
															"select
																*
															from
																admin
															where
																username = ? "
															,
															array($id)
															,
															"SELECT"
														);
	
	
	foreach ($exist_user as $key){
			$id = "{$key['username']}";
			$username = "{$key['username']}";
			$lname = "{$key['lastname']}";
			$fname = "{$key['firstname']}";
			
				
	}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Homepage/Dashboard-Vlogshipped</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<link rel="icon" type="image/png" href="image/lock.png">
	<link rel="stylesheet" href="assets/css/bs.css">
	<link rel="stylesheet" href="assets/css/fa.css">
	<link rel="stylesheet" href="assets/css/progress.css">
	<link rel="stylesheet" href="assets/css/animate.css">
	<link rel="stylesheet" href="assets/css/custom.css">
	<link rel="stylesheet" href="assets/css/main.css">
	<link rel="stylesheet" href="assets/css/sidebar-themes.css">
	<link rel="stylesheet" href="assets/css/sidebar-themes.css">
	<link rel="stylesheet" href="assets/css/card.css">
	
    <link rel="shortcut icon" type="image/png" href="assets/img/favicon.png" />
	 <!-- Vendor CSS Files -->
	 <link href="view/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

 </head>

<body class="nav-md" ng-app="myApp" ng-controller="myCtrl">
	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col menu_fixed">
				<div class="left_col scroll-view">
					<div class="navbar nav_title" style="border: 0;">
						<a href="#" class="site_title"><img src="image/locker.png" width="25" height="25"> <span>VlogShipped</span></a>
					</div>
					<div class="clearfix"></div>
					<!-- menu profile quick info -->
					<div class="profile clearfix">
						<div class="profile_pic"> <img src="image/blank.png" alt="Avatar" class="img-circle profile_img"> </div>
						
						<?php
						
						echo"<div class='profile_info'> <span>Welcome </span> <h2>{$fname} {$lname}</h2> </div>";
						
						?>
							
						<div class="clearfix"></div>
					</div>
					<!-- /menu profile quick info -->
					<br />
					<!-- sidebar menu -->
					<div id="sidebar-menu" class=" main_menu_side hidden-print main_menu" style="color:aliceblue;">
						<div class="menu_section">
							<h3>Menu</h3>
							<ul class="nav side-menu">
							<li> <a href="home.php"><i class="fa fa-home"></i> Home </a> </li>
							<li class="dropdown">
              				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-lock"></i>Management</a>
              				<ul class="dropdown-menu" style="color: #818181;">
							  <li> <a href="accountMgt.php"><i class="fa fa-user"></i> Accounts Management </a> </li>
                                    <li> <a href="content.php"><i class="fa fa-eye"></i> View Content </a> </li>
									<li> <a href="campaign.php"><i class="fa fa-eye"></i> View Campaign </a> </li>
									<li> <a href="subscription.php"><i class="fa fa-eye"></i> View Subscription </a> </li>
								    <li> <a href="ratings.php"><i class="fa fa-check-square-o"></i> Feedback and Ratings Management(content)</a> </li>
									<li> <a href="influencer.php"><i class="fa fa-check-square-o"></i> Feedback and Ratings Management(Influencer and Sponsor) </a> </li>
									<li> <a href="subscriptionrate.php"><i class="fa fa-star"></i> Manage Subscription </a> </li>
									<li> <a href="categoriesMgt.php"><i class="fa fa-star"></i> Manage Categories </a> </li>
									<li> <a href="categoriesMgt.php"><i class="fa fa-star"></i> Manage Subcat/Tags </a> </li>
              				</ul>
           					 </li>
								<li class="dropdown">
              				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-lock"></i>Reports Section</a>
              				<ul class="dropdown-menu" style="color: #818181;">
							  <li> <a href="reports/subReport.php"><i class="fa fa-credit-card"></i> Purchase/Subscription Report </a> </li>
                                    <li> <a href="reports/influencerReport.php"><i class="fa fa-user"></i> Account Report </a> </li>  
									<li> <a href="reports/contentReport.php"><i class="fa fa-user"></i> Content Report </a> </li>  
                                </ul>
							</ul>
						</div>
					</div>
					<!-- /sidebar menu -->
				</div>
			</div>
			<!-- top navigation -->
			<div class="top_nav">
				<div class="nav_menu">
					<nav>
						<div class="nav toggle"> <a id="menu_toggle"><i class="fa fa-bars"></i></a> </div>
						<ul class="nav navbar-nav navbar-right">
							<li class="">
							<?php
								echo "<a href='javascript:;' class='user-profile dropdown-toggle' data-toggle='dropdown'aria-expanded='false'> <img src='image/blank.png' alt='Avatar'> {$fname} <span class='fa fa-angle-down'></span> </a>";
							?>
								<ul class="dropdown-menu dropdown-usermenu pull-right">
								<li><a>	<?php echo" {$fname}, {$lname}";?></a></li>	
								<li><a href="javascript:;"> Profile</a></li>
									<li><a href="../controller/loginController/logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
								</ul>
							</li>
						</ul>
					</nav>
				</div>
			</div>
			<!-- /top navigation -->
			<!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3>Dashboard(Home)</h3> </div>
					</div>
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="x_panel">
								<div class="x_title">
									<h2>Summary Reports</h2>
									<div class="clearfix"></div>
								</div>
								<div class="x_content"> 
									<!--count section-->
								<section id="counts" class="counts">
     						    <div class="row" data-aos="fade-up">
							<!--row content-->
							<div class="row">		 
							<!--count influencer-->
          					<div class="col-lg-3 col-md-6">

           					 <div class="count-box influencer">
								<div class="col-xl-3 col-md-6 mb-4">
								<div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Influencer</div>
 
									<a class="btn btn-primary btn-lg pull-right" style="padding:6px 12px;" href="reports/influencerReport.php">See Account Reports(INFLUENCER)</a>
            						<?php 
										$influencer = 1;
										require_once("../connection.php");
										$query = "select * from users where user_type = $influencer";
                    
										$res = mysqli_query($con, $query);
										$count = 0;
										if($res){
											$rows = mysqli_num_rows($res);
											if($rows){
												
												echo"<div class='h5 mb-0 font-weight-bold text-gray-800'><spandata-toggle='counter-up'>$rows</span></div>";
										
											}
										}
					
									?>
										</div>
										<div class="col-auto">
                                            <i class="icofont-users-alt-5 fa-2x text-gray-300"></i>
                                        </div>
										
              				
								</div>
                                </div>
							  </div>
								</div>
								</div>
           					 </div>
							  <!--influencer count end-->
								<!--count sponsor-->
								<div class="col-lg-3 col-md-6">

								<div class="count-box influencer">
								<div class="col-xl-3 col-md-6 mb-4">
								<div class="card border-left-primary shadow h-100 py-2">
								<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
												Total Sponsor</div>
												<a class="btn btn-primary btn-lg  pull-right"style="padding:6px 12px;" href="reports/sponsorReport.php">See Account Reports(Sponsor)</a>
												<?php 
												$sponsor = 0;
												require_once("../connection.php");
												$query = "select * from users where user_type = $sponsor";
							
												$res = mysqli_query($con, $query);
												$count = 0;
												if($res){
													$rows = mysqli_num_rows($res);
													if($rows){
														echo"<div class='h5 mb-0 font-weight-bold text-gray-800'><spandata-toggle='counter-up'>$rows</span></div>";
													}
												}
												?>	
										</div>
										<div class="col-auto">
											<i class="icofont-users-alt-5 fa-2x text-gray-300"></i>
										</div>

								<!--<h4><p>Total influencer Registered</p></h4>-->
								</div>
								</div>
								</div>
								</div>
								</div>
								</div>

							  <!--SPONSOR count end-->
								<!--count amount-->
								<div class="col-lg-3 col-md-6">

								<div class="count-box influencer">
								<div class="col-xl-3 col-md-6 mb-4">
								<div class="card border-left-primary shadow h-100 py-2">
								<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
												Total Amount Earn</div>
												<a class="btn btn-primary btn-lg  pull-right"style="padding:6px 12px; "href="reports/subReport.php">Goto Purchase/Subscription Reports</a>
												<?php 
													require_once("../connection.php");
													$sql_count = "select amount from subscription";
								
													$res = mysqli_query($con, $sql_count);
													$count = 0;
													while($rows = mysqli_fetch_assoc($res)){
														$count += $rows['amount'];
													}
								
													echo "<div class='h5 mb-0 font-weight-bold text-gray-800'><spandata-toggle='counter-up'>$count Pesos</span></div>"; 
												?>
										</div>
										<div class="col-auto">
											<i class="icofont-users-alt-5 fa-2x text-gray-300"></i>
										</div>

								<!--<h4><p>Total influencer Registered</p></h4>-->
								</div>
								</div>
								</div>
								</div>
								</div>
								</div>

							<!--total content count end-->
								<!--count content-->
								<!--count amount-->
								<div class="col-lg-3 col-md-6">

								<div class="count-box influencer">
								<div class="col-xl-3 col-md-6 mb-4">
								<div class="card border-left-primary shadow h-100 py-2">
								<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
												Content Uploaded</div>
												<div class="btn-group-vertical pull-right">
												<a class="btn btn-info btn-lg  pull-right mr-1"style="padding:6px 12px; "href="reports/contentReport.php">Show Content Report</a>		
												</div>
												<?php 
													require_once("../connection.php");
													$query = "select * from content";
								
													$res = mysqli_query($con, $query);
													$count = 0;
													if($res){
														$rows = mysqli_num_rows($res);
														if($rows){
															echo"$rows";
														}
													}
								
													//echo "<div class='h5 mb-0 font-weight-bold text-gray-800'><spandata-toggle='counter-up'>$count Pesos</span></div>"; 
												?>
										</div>
										<div class="col-auto">
											<i class="icofont-users-alt-5 fa-2x text-gray-300"></i>
										</div>

								<!--<h4><p>Total influencer Registered</p></h4>-->
								</div>
								</div>
								</div>
								</div>
								</div>
								</div>

							<!--total content count end-->
							<!--influencer count end-->
							<!--total content count end-->
								<!--count content-->
								<!--count amount-->
								<div class="col-lg-3 col-md-6">

								<div class="count-box influencer">
								<div class="col-xl-3 col-md-6 mb-4">
								<div class="card border-left-primary shadow h-100 py-2">
								<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
												Total Campaign Applicant</div>
												<div class="btn-group-vertical pull-right">
												<a class="btn btn-info btn-lg  pull-right mr-1"style="padding:6px 12px; "href="reports/campaignReport.php"> See Campaign Report</a>		
												</div>
												<?php 
													$as = 1;
													require_once("../connection.php");
													$query = "select * from application where application_status = $as";
								
													$res = mysqli_query($con, $query);
													$count = 0;
													if($res){
														$rows = mysqli_num_rows($res);
														if($rows){
															echo"$rows";
														}
													}
													//echo "<div class='h5 mb-0 font-weight-bold text-gray-800'><spandata-toggle='counter-up'>$count Pesos</span></div>"; 
												?>
										</div>
										<div class="col-auto">
											<i class="icofont-users-alt-5 fa-2x text-gray-300"></i>
										</div>

								<!--<h4><p>Total influencer Registered</p></h4>-->
								</div>
								</div>
								</div>
								</div>
								</div>
								</div>

							<!--total campaign-applicatn count end-->

     						    </div>
							</section>
								</div>
							</div>
						</div>
					</div>x
					</div>
				</div>
			</div>
			
			<!-- /page content -->
			
			<!-- footer content -->
			<footer>
				<div class="pull-right"> Capstone 42 2020
				</div>
				<div class="clearfix"></div>
			</footer>
			<!-- /footer content -->
		</div>
	</div>
	<script src="assets/js/jq.js"></script>
	<script src="assets/js/bs.js"></script>
	<script src="assets/js/fc.js"></script>
	<script src="assets/js/progress.js"></script>
	<script src="assets/js/custom.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="assets/js/angular.js"></script>
	<!-- Plugin JavaScript -->
	<script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
	<!-- Custom JavaScript for this theme -->
	<script src="assets/js/scrolling-nav.js"></script>
	<!-- Vendor JS Files -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
 	 <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 	 <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
 	 <script src="assets/vendor/php-email-form/validate.js"></script>
		<script src="assets/vendor/venobox/venobox.min.js"></script>
	<script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
 	 <script src="assets/vendor/counterup/counterup.min.js"></script>
 	 <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  		<script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>
<script>
	var app = angular.module("myApp", []);
	app.controller("myCtrl", function($http, $scope) {
		$http.get('controller/studentController/countStud.php').then(function(response) {
			
			$scope.users = response.data;
		});
		
	});
	</script>-->
</html>