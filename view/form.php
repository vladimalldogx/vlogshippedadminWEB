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

<body class="nav-md" ng-app="myApp"  ng-controller="myCtrl">
	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col menu_fixed">
				<div class="left_col scroll-view">
					<div class="navbar nav_title" style="border: 0;">
						<a href="#" class="site_title"><img src="image/locker.png" width="25" height="25"><span>UC Locker System</span></a>
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
									<li> <a href="accountMgt.php"><i class="fa fa-check-square-o"></i> Students </a> </li>
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
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addForm">Add Form</button>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-12">
						<div class="x_panel">
							<div class="x_title">
								<h1>Forms</h1>
								<ul class="nav navbar-right panel_toolbox">
									<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
								</ul>
								<div class="clearfix"></div>
							</div>
							<div class="x_content">
								<p>Simple table with project listing with progress and editing options</p>
                                <!-- start project list -->
                                <div class="col-md-3 col-sm-3 col-xs-6">
                                        <input type="text" placeholder="Search form" class="form-control col-md-7 col-xs-12" ng-model="search" /> </div>								<table class="table table-striped projects">
									<thead>
										<tr>
											<th ng-repeat="l in form_label ">{{l}}</th>
										</tr>
									</thead>
									<tbody>
										<!-- END MODAL -->
										<tr ng-repeat="f in forms |  filter:search">
											<td>{{ f.form_id}}</td>
											<td>{{ f.stud_id}}</td>
											<td>{{ f.locker_num}}</td>
											<td>{{ f.form_type}}</td>
											<td>{{ f.date_submitted}}</td>
											<td>{{ f.form_status}}</td>
											<td>
                                                <!-- <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a> -->
                                                <a href="#" ng-click="editForm(f.form_id)"  class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Edit </a> 
                                                <a href="#" ng-click="viewForm(f.form_id)"  class="btn btn-info btn-xs"><i class="fa fa-eye"></i> View </a> 
                                                <a href="#" ng-click="deleteForm(f.form_id)" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a> </td>
										</tr>
										<!-- END MODAL -->
									</tbody>
								</table>
								<!-- end project list -->
								<!-- END MODAL -->
							</div>
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
		<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="addForm">
			<div class="modal-dialog modal-lg" style="width:40%" role="document">
				<div class="modal-content ">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"> <span>&times;</span> </button>
						<h3 class="modal-title">Add Form</h3> </div>
					<div class="modal-body">
						<form class="form-horizontal form-label-left" method="post" action="../controller/formController/addForm.php">
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="stud_id">Student ID<span class="required">*</span> </label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<!-- <input type="number" name="stud_id" required="required" class="form-control">  -->
									<select name="stud_id" required="required" class="form-control">
                                        <option ng-repeat="s in stud" value="{{s.stud_id}}">{{s.stud_id}}</option>
                                    </select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="stud_fname">Locker num. <span class="required">*</span> </label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<!-- <input type="number" name="locker_num" required="required" class="form-control">  -->
									<select name="locker_num" required="required" class="form-control">
                                        <option ng-repeat="l in locker" value="{{l.locker_num}}">{{l.locker_num}}</option>
                                    </select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="Given Name">Form type<span class="required">*</span> </label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<select  name="form_type" required="required" class="form-control">
										<option value="Reservation">Reservation</option>
										<option value="Occupancy">Occupancy</option>
									</select>
								 </div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Date Submitted<span class="required">*</span> </label>
								<div class="col-md-9 col-sm-9 col-xs-12 ">
									<input type="date" name="date_submitted" required="required" class="form-control"> </div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="Course">Form Status<span class="required">*</span> </label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<select  name="form_status" required="required" class="form-control">
										<option value="Pending">Pending</option>
										<option value="Approved">Approved</option>
									</select>
								</div>
							</div>
							<div class="modal-footer">
								<button class="btn button-secondary" data-dismiss="modal" type="button">Cancel</button>
								<button class="btn btn-primary" name="addform" type="submit">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END MODAL -->
	<!--edit Student -->
	<div class="modal fade" tabindex="-1" role="dialog" id="editForm">
		<div class="modal-dialog" style="width:40%" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"> <span>&times;</span> </button>
					<h3 class="modal-title">Edit Form</h3> </div>
				<div class="modal-body">
						<form class="form-horizontal form-label-left" method="post" action="../controller/formController/updateForm.php">
							<div class="form-group">
								<input type="number" min="0" id="edit_form_id" name="form_id"hidden>
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="stud_id">Student ID<span class="required">*</span> </label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<!-- <input type="number" name="stud_id" required="required" class="form-control">  -->
									<select name="stud_id" id="edit_stud_id" required="required" class="form-control">
                                        <option ng-repeat="s in stud" value="{{s.stud_id}}">{{s.stud_id}}</option>
                                    </select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="stud_fname">Locker num. <span class="required">*</span> </label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<!-- <input type="number" name="locker_num" required="required" class="form-control">  -->
									<select name="locker_num" id="edit_locker_num" required="required" class="form-control">
                                        <option ng-repeat="l in locker" value="{{l.locker_num}}">{{l.locker_num}}</option>
                                    </select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="Given Name">Form type<span class="required">*</span> </label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<select  name="form_type" id="edit_form_type" required="required" class="form-control">
										<option value="Reservation">Reservation</option>
										<option value="Occupancy">Occupancy</option>
									</select>
								 </div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Date Submitted<span class="required">*</span> </label>
								<div class="col-md-9 col-sm-9 col-xs-12 ">
									<input type="date " id="edit_date_submitted" name="date_submitted" required="required" class="form-control"> </div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="Course">Form Status<span class="required">*</span> </label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<select  name="form_status" id="edit_form_status" required="required" class="form-control">
										<option value="Pending">Pending</option>
										<option value="Approved">Approved</option>
									</select>
								</div>
							</div>
							<div class="modal-footer">
								<button class="btn button-secondary" data-dismiss="modal" type="button">Cancel</button>
								<button class="btn btn-primary" name="updateForm" type="submit">Submit</button>
							</div>
						</form>
				</div>
			</div>
		</div>
	</div>
	<!--end view modal -->
	<!-- view MODAL -->
	<div class="modal fade" tabindex="-1" role="dialog" id="viewForm">
		<div class="modal-dialog" style="width:40%" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"> <span>&times;</span> </button>
					<h3 class="modal-title">Edit Department</h3> </div>
				<div class="modal-body">
                        <div>
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="view_form_id">Form  No. : </label>
								<p id="view_form_id"></p>
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="view_stud_id">Student Id : </label>
								<p id="view_stud_id"></p>
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="view_locker_num">Locker No.: </label>
                                <p id="view_locker_num"></p>
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="view_form_type">Form Type: </label>
								<p id="view_form_type"></p>
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="view_date_submitted">Date Submitted</label>
                                <p id="view_date_submitted"></p>
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="view_form_status">Form Status : </label>
                                <p id="view_form_status"></p>
						 </div>
						<div class="modal-footer">
							<button class="btn button-secondary" data-dismiss="modal" type="button">OK</button>
						</div>
					
				</div>
			</div>
		</div>
	</div>
	<!-- end view -->
	<!-- delete modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="deleteForm">
		<div class="modal-dialog" style="width:40%" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"> <span>&times;</span> </button>
					<h3 class="modal-title">Delete Form</h3> </div>
				<div class="modal-body">
					<!-- <form method="post"> -->
						<blockquote>
							<p>Are you sure you want to delete this Form?</p>
							</blockquote>
						<div class="modal-footer">
							<button class="btn button-secondary" data-dismiss="modal" type="button">Cancel</button>
							<button class="btn btn-primary" id="delForm" >Delete</button>
						</div>
					<!-- </form> -->
				</div>
			</div>
		</div>
	</div>
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
	<script>
	var app = angular.module("myApp", []);
	app.controller("myCtrl", function($http, $scope) {
		$http.get('../controller/formController/allForm.php').then(function(response) {
			$scope.form_label = ["Form no.","Stud id", "Locker num","Type", "Date Submitted", "Status", "ACTION"];
			$scope.forms = response.data;
		});
		$http.get('../controller/studentController/allStud.php').then(function(response) {
			$scope.stud = response.data;
	});
	$http.get('../controller/lockerController/allLocker.php').then(function(response) {
                $scope.locker = response.data;
        });
		$scope.openModal = function(modal_id) {
			$('#' + modal_id).show();
		};
		$scope.closeModal = function(modal_id) {
			$('#' + modal_id).hide();
		};
		$scope.editForm = function(form_id) {
			$http.post('../controller/formController/getForm.php', {
				'form_id': form_id
			}).then(function(response) {
				console.log(form_id);
				$('#edit_form_id').val(response.data.form_id);
				$('#edit_stud_id').val(response.data.stud_id);
				$('#edit_locker_num').val(response.data.locker_num);
				// console.log(response.data.locker_num);
				$('#edit_form_type').val(response.data.form_type);
				$('#edit_date_submitted').val(response.data.date_submitted);
				$('#edit_form_status').val(response.data.form_status);
				$('#editForm').modal('show');
			});
		};
		$scope.viewForm = function(form_id) {
			$http.post('../controller/formController/getForm.php', {
				'form_id': form_id
			}).then(function(response) {
				console.log(response);
				$('#view_form_id').text(response.data.form_id);
				$('#view_stud_id').text(response.data.stud_id);
				$('#view_locker_num').text(response.data.locker_num);
				$('#view_form_type').text(response.data.form_type);
				$('#view_date_submitted').text(response.data.date_submitted);
				$('#view_form_status').text(response.data.form_status);
				$('#viewForm').modal('show');
			});
		}
		$scope.deleteForm = function(form_id) {
			console.log(form_id);
			$('#deleteForm').modal('show');
			$('#delForm').on('click', function() {
				$http.post('../controller/formController/deleteForm.php', {
					'form_id': form_id
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