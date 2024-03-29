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
																tbl_admin
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
	<title>LockItUp</title>
	<link rel="icon" type="image/png" href="image/lock.png">
	<link rel="stylesheet" href="assets/css/bs.css">
	<link rel="stylesheet" href="assets/css/fa.css">
	<link rel="stylesheet" href="assets/css/progress.css">
	<link rel="stylesheet" href="assets/css/green.css">
	<link rel="stylesheet" href="assets/css/animate.css">
	<link rel="stylesheet" href="assets/css/custom.css">
	<link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="assets/css/buttons.dataTables.min.css"> </head>

<body class="nav-md" ng-app="myApp" ng-controller="myCtrl">
	<div class="container body" >
		<div class="main_container">
			<div class="col-md-3 left_col menu_fixed">
				<div class="left_col scroll-view">
					<div class="navbar nav_title" style="border: 0;">
						<a href="#" class="site_title"><img src="image/locker.png" width="25" height="25"> <span>UC Locker System</span></a>
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
					<div id="sidebar-menu" class=" main_menu_side hidden-print main_menu">
						<div class="menu_section">
							<h3>Menu</h3>
							<ul class="nav side-menu">
									<li> <a href="home.php"><i class="fa fa-home"></i> Home </a> </li>
									<li> <a href="locker.php"><i class="fa fa-lock"></i> Lockers </a> </li>
									<li> <a href="students.php"><i class="fa fa-check-square-o"></i> Students </a> </li>
									<li> <a href="departments.php"><i class="fa fa-book"></i> Departments </a> </li>
									<li> <a href="form.php"><i class="fa fa-list"></i> Forms </a> </li>
									<li> <a href="reports.php"><i class="fa fa-bar-chart"></i> Reports </a> </li>
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
				<div class="page-title">
					<div class="title_left">
						<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addLocker">Add Locker</button>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-12">
						<div class="x_panel">
							<div class="x_title">
								<h2>Lockers <small> In Mixed </small></h2>
								<ul class="nav navbar-right panel_toolbox"> <small>Filter by</small>
									<select name="filter" id="filter"  name="dept_id" required="required" class="form-control">
                                        <option ng-repeat="d in dept" value="{{d.dept_id}}">{{d.dept_code}}</option>
                                    </select>
								</ul>
								<div class="clearfix"></div>
							</div>
							<div class="x_content">
								<p>Simple table with project listing with progress and editing options</p>
								<!-- start project list -->
								<div class="col-md-3 col-sm-3 col-xs-6">
									<input type="text" placeholder="Search Locker" class="form-control col-md-7 col-xs-12" ng-model="search" /> </div>
								<table class="table table-striped projects">
									<thead>
										<tr>
											<th ng-repeat="d in locker_label ">{{ d }}</th>
										</tr>
									</thead>
									<tbody>
										<tr ng-repeat="l in locker | filter:search ">
											<td>{{ l.locker_num}} </td>
											<td>{{ l.locker_status}}</td>
											<td>{{ l.dept_id}}</td>
											<td>
												<!-- <button class="btn btn-info" data-toggle="modal" data-target="#checkLocker1">Check Locker</button> -->
												<a href="#" ng-click="editLocker(l.locker_num)" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Edit </a> 
												<a href="#" ng-click="viewLocker(l.locker_num)" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> View </a> 
												<a href="#" ng-click="deleteLocker(l.locker_num)" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a> </td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end page content -->
			<!-- Add modal -->
			<div class="modal fade" tabindex="-1" role="dialog" id="addLocker">
				<div class="modal-dialog" style="width:40%" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"> <span>&times;</span> </button>
							<h3 class="modal-title">Add Locker</h3> </div>
						<div class="modal-body">
							<form class="form-horizontal form-label-left" method="post" action="../controller/lockerController/addLocker.php">
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Department Id <span class="required">*</span> </label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<!-- <input type="text" name="dept_id" required="required" class="form-control"> -->
										<select name="dept_id" required="required" class="form-control">
											<option ng-repeat="d in dept" value="{{d.dept_id}}">{{d.dept_code}}</option>
										</select>
									 </div>
								</div>
								<div class="modal-footer">
									<button class="btn button-secondary" data-dismiss="modal" type="button">Cancel</button>
									<button class="btn btn-primary" name="addLocker" type="submit">Submit</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- end add modal -->
			<!-- Edit modal -->
			<div class="modal fade" tabindex="-1" role="dialog" id="editLocker">
				<div class="modal-dialog" style="width:40%" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"> <span>&times;</span> </button>
							<h3 class="modal-title">Edit Locker</h3> </div>
						<div class="modal-body">
							<form class="form-horizontal form-label-left" method="post" action="../controller/lockerController/updateLocker.php">
								<input type="hidden" name="id" value="" id="edit_locker_num">
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="locker_status">Locker Status<span class="required">*</span> </label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<select id="edit_locker_status" class="form-control" name="locker_status">
											<option disabled selected>-------</option>
											<option value="Vacant">Vacant</option>
											<option value="Reserve">Reserve</option>
											<option value="Occupied">Occupied</option>
											<option value="Maintenance">Maintenance</option>
										</select>
									</div>
								</div>
								<div class="modal-footer">
									<button class="btn button-secondary" data-dismiss="modal" type="button">Cancel</button>
									<button class="btn btn-primary" name="updateLocker" type="submit">Submit</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- end edit modal -->
			<!-- view modal -->
			<div class="modal fade" tabindex="-1" role="dialog" id="viewLocker">
				<div class="modal-dialog" style="width:40%" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"> <span>&times;</span> </button>
							<h3 class="modal-title">View Locker</h3> </div>
						<div class="modal-body">
							<div>
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="view_locker_num">LockerNumber</label>
								<p id="view_locker_num"></p>
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="locker_status">Locker Status</label>
								<p id="view_locker_status"></p>
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="view_dept_id">Dept. ID</label>
								<p id="view_dept_id"></p>
								<h4 class="w3-center" id="view_course_label"></h4>
							 </div>
						</div>
						<div class="modal-footer">
								<button class="btn button-secondary" data-dismiss="modal" type="button">OK</button>
						</div>
					</div>
				</div>
			</div>
			<!-- end viewmodal -->
			<!-- Delete Modal -->
			<div class="modal fade" tabindex="-1" role="dialog" id="deleteLocker">
				<div class="modal-dialog" style="width:40%" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"> <span>&times;</span> </button>
							<h3 class="modal-title">Delete Applicant</h3> </div>
						<div class="modal-body">
							<!-- <form method="POST" action="../controller/departmentController/deleteDept.php"> -->
							<blockquote>
								<p>Are you sure you want to delete this Locker?</p>
							</blockquote>
						</div>
						<div class="modal-footer">
							<button class="btn button-secondary" data-dismiss="modal" type="button">Cancel</button>
							<button class="btn btn-primary" id="delLock">Delete</button>
							<!-- </form> -->
						</div>
					</div>
				</div>
			</div>
			<!-- end delete -->
			<!-- footer content -->
			<footer>
				<div class="pull-right"> Software Engineering 2018 </div>
				<div class="clearfix"></div>
			</footer>
			<!-- /footer content -->
		</div>
	</div>
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
	<!-- <script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/ddtf.js"></script> -->
	<script src="assets/js/jszip.min.js"></script>
	<script src="assets/js/buttons.print.min.js"></script>
	<script src="assets/js/angular.min.js"></script>
	<script src="assets/js/angular-route.js"></script>

	<script type="text/javascript">
	</script>
	<script type="text/javascript">
	var app = angular.module("myApp", []);
	app.controller("myCtrl", function($http, $scope) {
		$http.get('../controller/lockerController/allLocker.php').then(function(response) {
			$scope.locker_label = ["Locker No.", "Locker Status", "Dept Id", "ACTION"];
			$scope.locker = response.data;
		});
		$http.get('../controller/departmentController/allDept.php').then(function(response) {
			$scope.dept = response.data;
		});
		$scope.openModal = function(modal_id) {
			$('#' + modal_id).show();
		};
		$scope.closeModal = function(modal_id) {
			$('#' + modal_id).hide();
		};
		$scope.editLocker = function(locker_num) {
			$http.post('../controller/lockerController/getLocker.php', {
				'locker_num': locker_num
			}).then(function(response) {
				console.log(locker_num);
				$('#edit_locker_num').val(response.data.locker_num);
				$('#edit_locker_status').val(response.data.locker_status);
				$('#editLocker').modal('show');
			});
		};
		$scope.viewLocker = function(locker_num) {
			$http.post('../controller/lockerController/getLocker.php', {
				'locker_num': locker_num
			}).then(function(response) {
				console.log(response);
				$('#view_locker_num').text(response.data.locker_num);
				$('#view_locker_status').text(response.data.locker_status);
				$('#view_dept_id').text(response.data.dept_id);
				$('#viewLocker').modal('show');
			});
		}
		$scope.deleteLocker = function(locker_num) {
			console.log(locker_num);
			$('#deleteLocker').modal('show');
			$('#delLock').on('click', function() {
				$http.post('../controller/lockerController/deleteLocker.php', {
					'locker_num': locker_num
				}).then(function(response) {
					location.reload();
					console.log(response);
				});
			});
		};
	}); //end app.controller
	</script>
</body>

</html>