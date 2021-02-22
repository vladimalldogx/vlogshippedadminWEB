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
    <title>Subscription# - Vlogshipped</title>
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
									<li> <a href="subscriptionrate.php"><i class="fa fa-star"></i> Manage Subscription </a> </li>
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
                            
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h1>View Subscription</h1>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <p>Simple table with project listing with progress and editing options</p>
                                <!-- start project list -->
                                <div class="col-md-3 col-sm-3 col-xs-6">
                                    <input type="text" placeholder="#" class="form-control col-md-7 col-xs-12" ng-model="search" /> </div>
                                    <ul class="nav navbar-right panel_toolbox">
                                </ul>
                                <div class="clearfix"></div>
                                <table class="table table-striped projects">
                                    <thead>
                                        <tr>
                                            <th ng-repeat="l in student_label ">{{l}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- END MODAL -->
                                        <tr ng-repeat="s in students |  filter:search">
                                            <td>{{ s.subs_id}}</td>
                                            <td>{{ s.payment_id}}</td>
                                            <td>{{ s.amount}}</td>
                                            <td>{{ s.payment_status}}</td>
                                            <td>{{ s.first_name}}</td>
                                            <td>{{ s.last_name}}</td>
                                            <td>{{ s.user_id}}</td>
                                            <td>
                                                <!-- <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a> -->
                                                
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
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="addStudent">
            <div class="modal-dialog modal-lg" style="width:40%" role="document">
                <div class="modal-content ">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"> <span>&times;</span> </button>
                        <h3 class="modal-title">Add Student</h3> </div>
                    <div class="modal-body">
                        <form class="form-horizontal form-label-left" method="post" action="../controller/studentController/addStud.php">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="stud_id">gpass_no<span class="required">*</span> </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" name="stud_id" required="required" class="form-control"> </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="stud_fname">idno <span class="required">*</span> </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" name="stud_lname" required="required" class="form-control"> </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Given Name">lname<span class="required">*</span> </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" name="stud_fname" required="required" class="form-control"> </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Given Name">Given Name<span class="required">*</span> </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" name="stud_fname" required="required" class="form-control"> </div>
                             </div>       
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Course">Course/Department<span class="required">*</span> </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <!-- <input type="number" min="0" name="dept_id" required="required" class="form-control"> -->
                                    <select name="dept_id" required="required" class="form-control">
                                        <option ng-repeat="d in dept" value="{{d.dept_id}}">{{d.dept_code}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="stud_yearLevel">Year Level <span class="required">*</span> </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <select name="stud_yearLevel" required="required" class="form-control">
                                        <option value="1">1st year</option>
                                        <option value="2">2nd year</option>
                                        <option value="3">3rd year</option>
                                        <option value="4">4th year</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email<span class="required">*</span> </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="email" name="email" required="required" class="form-control"> </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Date Applied<span class="required">*</span> </label>
                                <div class="col-md-9 col-sm-9 col-xs-12 ">
                                    <input type="date" name="date_apply" required="required" class="form-control"> </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn button-secondary" data-dismiss="modal" type="button">Cancel</button>
                                <button class="btn btn-primary" name="addStud" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL -->
    <!--edit Student -->
    <!--end view modal -->
    <!-- view MODAL -->
    <!-- end view -->
    <!-- delete modal -->
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
            $http.get('../controller/studentController/allSubs.php').then(function(response) {
                $scope.student_label = ["id", "payment_id", "amount", "payment_status", "Firstname", "Lastname", "User_ID"];
                $scope.students = response.data;
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
            $scope.editStudent = function(stud_id) {
                $http.post('../controller/studentController/getStud.php', {
                    'stud_id': stud_id
                }).then(function(response) {
                    console.log(stud_id);
                    $('#edit_stud_id').val(response.data.stud_id);
                    $('#edit_stud_lname').val(response.data.stud_lname);
                    $('#edit_stud_fname').val(response.data.stud_fname);
                    $('#edit_dept_id').val(response.data.dept_id);
                    $('#edit_stud_yearLevel').val(response.data.stud_yearLevel);
                    $('#edit_email').val(response.data.email);
                    $('#edit_date_applied').val(response.data.date_applied);
                    // console.log(response.data.date_applied);
                    $('#editStudent').modal('show');
                });

            };

            $scope.changedValue = function(item){
                if(item == 1){
                    $http.get('../controller/studentController/allStud.php').then(function(response) {
                    $scope.student_label = ["id", "first_name", "last_name", "gender", "birthday", "user_type", "user_status", "email_address", "mobile_number", "website", "description", "ACTION"];
                    $scope.students = response.data;
                });
                }else{
                    $http.get('../controller/studentController/allSponsor.php').then(function(response) {
                    $scope.student_label = ["id", "first_name", "last_name", "gender", "birthday", "user_type", "user_status", "email_address", "mobile_number", "website","description", "ACTION"];
                    $scope.students = response.data;
                });
                }
            };
            $scope.viewStudent = function(stud_id) {
                $http.post('../controller/studentController/getStud.php', {
                    'stud_id': stud_id
                }).then(function(response) {
                    console.log(stud_id);
                    $('#view_stud_id').text(response.data.stud_id);
                    $('#view_stud_lname').text(response.data.stud_lname);
                    $('#view_stud_fname').text(response.data.stud_fname);
                    $('#view_dept_id').text(response.data.dept_id);
                    $('#view_stud_yearLevel').text(response.data.stud_yearLevel);
                    $('#view_email').text(response.data.email);
                    $('#view_date_applied').text(response.data.date_applied);
                    $('#viewStudent').modal('show');
                });
            };
            $scope.deleteStudent = function(stud_id) {
                console.log(stud_id);
                $('#deleteStudent').modal('show');
                $('#delStud').on('click', function() {
                    $http.post('../controller/studentController/deleteStud.php', {
                        'stud_id': stud_id
                    }).then(function(response) {
                        location.reload();
                        console.log(response);
                    });
                });
            };

            $scope.activateStudent = function(stud_id) {
                console.log(stud_id);
                $('#activateStudent').modal('show');
                $('#activateStud').on('click', function() {
                    $http.post('../controller/studentController/updateStud.php', {
                        'stud_id': stud_id
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