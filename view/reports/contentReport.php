<?php
	session_start();
	error_reporting(E_ALL);
	require_once("../../db_class.php");

	//check for login

	if(! isset($_SESSION["username"]) )
	{
		header("location: ../../adminlog/adminlog.php");
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
	<title>Campaign/Content Reports (Influencer) | Vlogshipped</title>
	<link rel="icon" type="../image/png" href="../image/lock.png">
	<link rel="stylesheet" href="../assets/css/bs.css">
	<link rel="stylesheet" href="../assets/css/fa.css">
	<link rel="stylesheet" href="../assets/css/progress.css">
	<link rel="stylesheet" href="../assets/css/green.css">
	<link rel="stylesheet" href="../assets/css/animate.css">
	<link rel="stylesheet" href="../assets/css/custom.css">
	<link rel="stylesheet" href="../assets/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="../assets/css/buttons.dataTables.min.css"> </head>
<style>
    div.dataTables_wrapper {
        margin-bottom: 3em;
    }
</style>
<body class="nav-md" ng-app="myApp">
	<div class="container body" ng-controller="myCtrl">
		<div class="main_container">
			<div class="col-md-3 left_col menu_fixed">
				<div class="left_col scroll-view">
					<div class="navbar nav_title" style="border: 0;">
						<a href="#" class="site_title"><img src="../image/locker.png" width="25" height="25"> <span>Vlogshipped</span></a>
					</div>
					<div class="clearfix"></div>
					<!-- menu profile quick info -->
					<div class="profile clearfix">
						<div class="profile_pic"> <img src="../image/blank.png" alt="Avatar" class="img-circle profile_img"> </div>
						
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
							<li> <a href="../home.php"><i class="fa fa-home"></i> Home </a> </li>
							<li class="dropdown">
              				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-lock"></i>Management</a>
              				<ul class="dropdown-menu" style="color: #818181;">
							  <li> <a href="accountMgt.php"><i class="fa fa-user"></i> Accounts Management </a> </li>
                                    <li> <a href="../content.php"><i class="fa fa-eye"></i> View Content </a> </li>
									<li> <a href="../campaign.php"><i class="fa fa-eye"></i> View Campaign </a> </li>
									<li> <a href="../subscription.php"><i class="fa fa-eye"></i> View Subscription </a> </li>
								    <li> <a href="../ratings.php"><i class="fa fa-check-square-o"></i> Feedback and Ratings Management(content)</a> </li>
									<li> <a href="../influencer.php"><i class="fa fa-check-square-o"></i> Feedback and Ratings Management(Influencer and Sponsor) </a> </li>
									<li> <a href="../subscriptionrate.php"><i class="fa fa-star"></i> Manage Subscription </a> </li>
              				</ul>
           					 </li>
								<li class="dropdown">
              				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-lock"></i>Reports Section</a>
              				<ul class="dropdown-menu" style="color: #818181;">
							  <li> <a href="subReport.php"><i class="fa fa-credit-card"></i> Purchase/Subscription Report </a> </li>
                                    <li> <a href="influencerReport.php"><i class="fa fa-user"></i> Account Report </a> </li>  
									<li> <a href="contentReport.php"><i class="fa fa-user"></i> Content Report </a> </li>  
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
								echo "<a href='javascript:;' class='user-profile dropdown-toggle' data-toggle='dropdown'aria-expanded='false'> <img src='../image/blank.png' alt='Avatar'> {$fname} <span class='fa fa-angle-down'></span> </a>";
							?>
								<ul class="dropdown-menu dropdown-usermenu pull-right">
									<li><a>	<?php echo" {$fname}, {$lname}";?></a></li>
									<li><a href="javascript:;"> Profile</a></li>
									<li><a href="../../controller/loginController/logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
								</ul>
							</li>
						</ul>
					</nav>
				</div>
			</div>
			<!-- /top navigation -->
			<!-- page content -->
			<?php
			require '../../model/contentModel.php';
			$content = new Content();
			$cont=$content->getAllCont();
			?>
			<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
                            
						</div>
					</div>
				</div>
				<div class="clearfix">         
                </div>
				<div class="row">
					<div class="col-md-12">

						<div class="x_panel">
							<div class="x_title">
								<h2> Content Reports(Influencer)</h2>
								<ul class="nav navbar-right panel_toolbox">
									<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
								</ul>
								<div class="clearfix">
                                    
                                </div>
							</div>
							<div class="x_content">
								
								<div class="col-md-3 col-sm-3 col-xs-6">
                                </div>
								<!-- start project list -->
								<table class="table table-striped projects" id="datatable-buttons" >
									<thead>
										<tr>
                                            <th> ID </th>
                                            <th> Title/Desc </th>
                                            <th> Last Name</th>
                                            <th> first Name</th>
                                            <th> Contentfile/url</th>
                                            <th> Thumbnail</th>
                                            <th> Date Added</th>
											<th> Date Updated</th>
										</tr>
									</thead>
									<tbody>
									    <?php foreach($cont as $c): ?>
										<tr>
                                            <td><?php echo $c['id'];?></td>
                                            <td><?php echo $c['descrip'];?></td>
                                            <td><?php echo $c['last_name'];?></td>
                                            <td><?php echo $c['first_name'];?></td>
											<td><?php echo $c['url'];?></td>
                                            <td><?php echo $c['thumbnail'];?></td>
											<td><?php echo $c['created_at'];?></td>
                                            <td><?php echo $c['updated_at'];?></td>
								
										</tr>
										<?php endforeach?>
									</tbody>
								</table>
								<table  class="table table-striped projects" id="datatable-buttons"><?php  echo"<div class=' dataTables_wrapper'>printed by{$fname},{$lname}  </div>'; "?> </table>
							
                            </div>
                            <!--  -->
                            <!--  -->
                            
						</div>
						<button class="btn-btn-primary"><a href="campaignReport.php">Go to Campaign Report</a></button>
                    </div>
				</div>
            </div>
            
            <!-- end of page content -->
            <!-- new page context -->
            
            <!--  end new-->
			<!-- footer content -->
			<footer>
				<div class="pull-right"> Capstone 2020 </div>
				<div class="clearfix"></div>
			</footer>
			<!-- /footer content -->
		</div>
	</div>
	<!-- PHP -->
	<!-- END -->
	<!-- Script start -->
	<script src="../assets/js/jq.js"></script>
	<script src="../assets/js/bs.js"></script>
	<script src="../assets/js/fc.js"></script>
	<script src="../assets/js/progress.js"></script>
	<script src="../assets/js/bsprogress.js"></script>
	<script src="../assets/js/custom.js"></script>
	<script src="../assets/js/jquery.dataTables.min.js"></script>
	<script src="../assets/js/dataTables.buttons.min.js"></script>
	<script src="../assets/js/buttons.flash.min.js"></script>
	<script src="../assets/js/buttons.html5.min.js"></script>
	<script src="../assets/js/vfs_fonts.js"></script>
	<script src="../assets/js/pdfmake.min.js"></script>
	<script src="../assets/js/jszip.min.js"></script>
	<script src="../assets/js/buttons.print.min.js"></script>
	<script src="../assets/js/angular.min.js"></script>
	<script src="../assets/js/angular-route.js"></script>

</body>

</html>