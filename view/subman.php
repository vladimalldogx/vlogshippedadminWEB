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
    <title>Subcription Mgt - Vlogshipped</title>
    <link rel="icon" type="image/png" href="image/lock.png">
    <link rel="stylesheet" href="assets/css/bs.css">
    <link rel="stylesheet" href="assets/css/fa.css">
    <link rel="stylesheet" href="assets/css/progress.css">
    <link rel="stylesheet" href="assets/css/green.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="assets/css/buttons.dataTables.min.css"> </head>

<body class="nav-md" ng-app="myApp">
    <div class="container body" ng-controller="myCtrl">
        <div class="main_container">
            <div class="col-md-3 left_col menu_fixed">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="#" class="site_title"><img src="image/locker.png" width="25" height="25"><span>VlogShipped</span></a>
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
									<li> <a href="subman.php"><i class="fa fa-star"></i> Manage Subscription </a> </li>
              				</ul>
           					 </li>
								<li class="dropdown">
              				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-lock"></i>Reports Section</a>
              				<ul class="dropdown-menu" style="color: #818181;">
							  <li> <a href="grace.php"><i class="fa fa-credit-card"></i> Purchase Report </a> </li>
                                    <li> <a href="willa.php"><i class="fa fa-user"></i> Account Report </a> </li>  
									
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
							<button class="btn btn-primary fa fa-plus" type="button" data-toggle="modal" data-target="#addDepartment">Add Subscription</button>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-12">
						<div class="x_panel">
							<div class="x_title">
								<h2>Subscription Management</h2>
								<ul class="nav navbar-right panel_toolbox">
									<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
									<li>
										<!-- <a class="close-link"><i class="fa fa-close"></i></a> --></li>
								</ul>
								<div class="clearfix"></div>
							</div>
							<div class="x_content">
								<p>Simple table with project listing with progress and editing options</p>
								<div class="col-md-3 col-sm-3 col-xs-6">
									<input type="text" placeholder="Search Subscription" class="form-control col-md-7 col-xs-12" ng-model="search" /> </div>
								<!-- start project list -->
								<table class="table table-striped projects">
									<thead>
										<tr>
											<th ng-repeat="d in dept_label  ">{{ d }}</th>
										</tr>
									</thead>
									<tbody>
										<tr ng-repeat="d in department  | filter:search">
											<td>{{ d.spid}} </td>
											<td>{{ d.planName}}</td>
											<td>{{ d.duration}}</td>
											<td>{{ d.amount}}</td>
											<td>
											<a href="#" ng-click="editDepartment(d.spid)" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Edit </a>
											<a href="#" ng-click="deleteSubscription(d.spid)" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a> 
											
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end of page content -->
			<!-- footer content -->
			<footer>
				<div class="pull-right"> Software Engineering 2018 </div>
				<div class="clearfix"></div>
			</footer>
			<!-- /footer content -->
			<!-- ADD MODAL -->
			<div class="modal fade" tabindex="-1" role="dialog" id="addDepartment">
				<div class="modal-dialog" style="width:40%" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"> <span>&times;</span> </button>
							<h3 class="modal-title">Add Plan</h3> </div>
						<div class="modal-body">
							<form class="form-horizontal form-label-left" method="post" action="../controller/departmentController/addSub.php">
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">PlanName <span class="required">*</span> </label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<input type="text" name="planName" required="required" class="form-control"> </div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Duration<span class="required">*</span> </label>
									<div class="col-md-9 col-sm-9 col-xs-12">
									<select name="duration" required="required" class="form-control">
                                        <option value="7-days">Weekly</option>
                                        <option value="15-Days">HalfMonth</option>
                                        <option value="30-Days">Monthly</option>
										<option value="180-Days">Quarterly</option>
										<option value="365-Days">Anual</option>
                                    </select> </div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ammount<span class="required">*</span> </label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<input type="text" name="amount" required="required" class="form-control"> </div>
								</div>
								<div class="modal-footer">
									<button class="btn button-secondary" data-dismiss="modal" type="button">Cancel</button>
									<button class="btn btn-primary" name="addDept" type="submit">Submit</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- END MODAL -->
			<!-- view modal -->
			<div class="modal fade" tabindex="-1" role="dialog" id="viewDepartment">
				<div class="modal-dialog" style="width:40%" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"> <span>&times;</span> </button>
							<h3 class="modal-title">View Subscription</h3> </div>
						<div class="modal-body">
							<div>
								<h3 id="view_course_name"></h3>
								<h4 class="w3-center" id="view_course_label"></h4>
								<!--<table id="view_course_table" class="table table-striped projects">
									<tr>
										<th ng-repeat="l in student_course_label">{{ l }}</th>
									</tr>
									<tr ng-repeat="s in student  | filter:search">
										<td>{{ s.stud_id }} </td>
										<td>{{ s.stud_fname }} </td>
										<td>{{ s.stud_lname }} </td>
										<td>{{ s.stud_yearLevel }} </td>
										<td>{{ s.email }} </td>
										<td>{{ s.date_applied }} </td>
									</tr>
								</table>
							</div>
						</div>-->
						<div class="modal-footer">
								<button class="btn button-secondary" data-dismiss="modal" type="button">OK</button>
						</div>
					</div>
				</div>
			</div>
			<!-- end view modal -->
			<!-- EDIT MODAL -->
			<div class="modal fade" tabindex="-1" role="dialog" id="editDepartment">
				<div class="modal-dialog" style="width:40%" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"> <span>&times;</span> </button>
							<h3 class="modal-title">Edit Department</h3> </div>
						<div class="modal-body">
							<form class="form-horizontal form-label-left" method="post" action="../controller/departmentController/updateSub.php">
								<input type="hidden" name="id" value="" id="edit_dept_id">
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">PlanName <span class="required">*</span> </label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<input type="text" id="edit_planName" name="planName" required="required" class="form-control"> </div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Duration<span class="required">*</span> </label>
									<div class="col-md-9 col-sm-9 col-xs-12">
									<select name="edit_duration" required="required" class="form-control">
                                        <option value="7-days">Weekly</option>
                                        <option value="15-Days">HalfMonth</option>
                                        <option value="30-Days">Monthly</option>
										<option value="180-Days">Quarterly</option>
										<option value="365-Days">Anual</option>
                                    </select> </div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">amount<span class="required">*</span> </label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<input type="text" id="edit_amount" name="amount" required="required" class="form-control"> </div>
								</div>
								<div class="modal-footer">
									<button class="btn button-secondary" data-dismiss="modal" type="button">Cancel</button>
									<button class="btn btn-primary" name="updateDept" type="submit">Submit</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- end edit -->
			<!-- Delete Subscription Plan Modal -->
			<div class="modal fade" tabindex="-1" role="dialog" id="deleteSubscription">
				<div class="modal-dialog" style="width:40%" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"> <span>&times;</span> </button>
							<h3 class="modal-title">Delete Subscription Plan</h3>
							<div class="modal-body">
								<!-- <form method="POST" action="../controller/departmentController/deleteDept.php"> -->
								<blockquote>
									<p>Are you sure you want to delete this Subscription Plan?</p>
								</blockquote>
							</div>
							<div class="modal-footer">
								<button class="btn button-secondary" data-dismiss="modal" type="button">Cancel</button>
								<button class="btn btn-primary" id="delSubs">Delete</button>
								<!-- </form> -->
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- end delete -->
			<!-- END MODAL -->
	<!-- PHP -->
	<!-- END -->
	<!-- Script start -->
	<script src="assets/js/jq.js"></script>
	<script src="assets/js/bs.js"></script>
	<script src="assets/js/fc.js"></script>
	<script src="assets/js/progress.js"></script>
	<script src="assets/js/bsprogress.js"></script>
	<script src="assets/js/custom.js"></script>
	<script src="assets/js/jquery.dataTables.min.js"></script>
	<script src="assets/js/dataTables.buttons.min.js"></script>
	<script src="assets/js/buttons.flash.min.js"></script>
	<script src="assets/js/buttons.html5.min.js"></script>
	<script src="assets/js/vfs_fonts.js"></script>
	<script src="assets/js/pdfmake.min.js"></script>
	<script src="assets/js/jszip.min.js"></script>
	<script src="assets/js/buttons.print.min.js"></script>
	<script src="assets/js/angular.min.js"></script>
	<script src="assets/js/angular-route.js"></script>
	<script type="text/javascript">
        $(document).ready(function() {
            $('#dataTable').DataTable({
                dom: 'Bfrtip',
                buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5', 'print']
            });
        });
	</script>
	<script type="text/javascript">
	var app = angular.module("myApp", []);
	app.controller("myCtrl", function($http, $scope) {
		$http.get('../controller/departmentController/allSub.php').then(function(response) {
			$scope.dept_label = ["ID", "Plan Name", "Duration", "Amount", "ACTION"];
			$scope.department = response.data;
		});
		$scope.openModal = function(modal_id) {
			$('#' + modal_id).show();
		};
		$scope.closeModal = function(modal_id) {
			$('#' + modal_id).hide();
		};
		$scope.editSubs = function(spid) {
			$http.post('../controller/departmentController/getSub.php', {
				'spid': spid
			}).then(function(response) {
				console.log(response);
				$('#edit_spid').val(response.data.spid);
				$('#edit_planName').val(response.data.planName);
				$('#edit_duration').val(response.data.duration);
				$('#edit_amount').val(response.data.amount);
				$('#editSubs').modal('show');
			});
		};
		//$scope.viewDepartment = function(dept_id, dept_code) {
			//$http.post('../controller/departmentController/studentsDept.php', {
			//	'dept_id': dept_id
			//}).then(function(response) {
			//	console.log(response);
			//if(response.data[0] == null) {
					//$('#view_course_label').text('No Student');
				//	$('#view_course_table').hide();
				//} else {
			//		$scope.student_course_label = ["STUDENT ID", "FAMILYNAME", "GIVENNAME", "LEVEL", "EMAIL", "Date Applied"];
				//	$scope.student = response.data;
				//	$('#view_course_label').text(`Student's List`);
			//		$('#view_course_table').show();
				//}
		//});
		//	$scope.student_course_labels = ["STUDENT ID", "FAMILYNAME", "GIVENNAME", "LEVEL", "EMAIL", "Date Applied"];
			//$('#view_course_name').text(dept_code);
			//$('#viewDepartment').modal('show');
		//}
		$scope.deleteSubscription = function(spid) {
            console.log(spid);
            $('#deleteSubscription').modal('show');
            $('#delSubs').on('click', function() {
                $http.post('../controller/departmentController/deleteSubsManagement.php', {
                    'spid': spid
                }).then(function(response) {
                    location.reload();
                    console.log(response);
                });
            });
        };
	});
	</script>
    <!-- script end -->
</body>

</html>