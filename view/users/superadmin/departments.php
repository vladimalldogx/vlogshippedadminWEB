
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>LockItUp</title>
  <link rel="icon" type="image/png" href="../../image/lock.png">
  <link rel="stylesheet" href="../../assets/css/bs.css">
  <link rel="stylesheet" href="../../assets/css/fa.css">
  <link rel="stylesheet" href="../../assets/css/progress.css">
  <link rel="stylesheet" href="../../assets/css/green.css">
  <link rel="stylesheet" href="../../assets/css/animate.css">
  <link rel="stylesheet" href="../../assets/css/custom.css">
  <link rel="stylesheet" href="../../assets/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="../../assets/css/buttons.dataTables.min.css">
</head>
<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col menu_fixed">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.php" class="site_title"><i class="fa fa-lock"></i> <span>UC Locker System</span></a>
          </div>
          <div class="clearfix"></div>
          
          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="../../image/blank.png" alt="Avatar" class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2>EJ POTOT</h2>
            </div>
            <div class="clearfix"></div>
          </div>
          <!-- /menu profile quick info -->            <br />
          <!-- sidebar menu -->
          <div id="sidebar-menu" class=" main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>Menu</h3>
              <ul class="nav side-menu">
                <li>
                  <a href="home.php"><i class="fa fa-home"></i> Home </a>
                </li>
                <li>
                  <a href="locker.php"><i class="fa fa-lock"></i> Lockers </a>
                </li>
                <li>
                  <a href="applicants.php"><i class="fa fa-check-square-o"></i> Applicants </a>
                </li>
                <li>
                  <a href="departments.php"><i class="fa fa-book"></i> Departments </a>
                </li>
              </ul>
            </div>
          </div>
          <!-- /sidebar menu -->          </div>
        </div>
        <!-- top navigation -->
        
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="../../image/blank.png" alt="Avatar">
                    EJ POTOT                    <span class="fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
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
                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addDepartment">Add Department</button>
              </div>
            </div>
          </div>
          
          <div class="clearfix"></div>
          
          <div class="row">
            <div class="col-md-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Projects</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                      </ul>
                    </li>
                    <li><!-- <a class="close-link"><i class="fa fa-close"></i></a> -->
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  
                  <p>Simple table with project listing with progress and editing options</p>
                  
                  <!-- start project list -->
                  <table  class="table table-striped projects" id ="dataTable">
                    <thead>
                      <tr>
                        <th style="width: 1%">No.</th>
                        <th >Department Code</th>
                        <th >Department Description</th>
                        <th>Office Location</th>
                        <th style="width: 20%">Action</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <!-- END MODAL -->
                      <tr  >
                        <td>1</td>
                        <td>BSIT</td>
                        <td>asdasd</td>
                        <td>asdasd</td>
                        <td>
                          <a href="#" data-toggle="modal" data-target="#editDepartment"  class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                          <a href="#" data-toggle="modal" data-target="#viewDepartment" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> View </a>
                          <a href="#" data-toggle="modal" data-target="#deleteDepartment" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                        </td>
                      </tr>

                      <!-- END MODAL -->
                       <tr  >
                        <td>1</td>
                        <td>BSIT</td>
                        <td>asdasd</td>
                        <td>asdasd</td>
                        <td>
                          <a href="#" data-toggle="modal" data-target="#editDepartment"  class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                          <a href="#" data-toggle="modal" data-target="#viewDepartment" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> View </a>
                          <a href="#" data-toggle="modal" data-target="#deleteDepartment" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                        </td>
                      </tr>
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
        <div class="pull-right">
          Software Engineering 2018</a>
        </div>
        <div class="clearfix"></div>
      </footer>
      <!-- /footer content -->      
      <!-- ADD MODAL -->
      <div class="modal fade" tabindex="-1" role="dialog" id="addDepartment">
        <div class="modal-dialog" style="width:40%" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">
                <span>&times;</span>
              </button>
              <h3 class="modal-title">Add Department</h3>
            </div>
            <div class="modal-body">
              <form class="form-horizontal form-label-left" method="post" action="../../../controller/departmentController/addDept.php">
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Department Code <span class="required">*</span>
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="text"  name="dept_code" required="required" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Department Description<span class="required">*</span>
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="text"  name="dept_description" required="required" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Office Location<span class="required">*</span>
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="text"  name="office_location" required="required" class="form-control">
                  </div>
                </div>
                
              </div>
              <div class="modal-footer">
                <button class="btn button-secondary" data-dismiss="modal" type="button">Cancel</button>
                <button class="btn btn-primary" name="addDept" type="submit">Submit</button>
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
              <button type="button" class="close" data-dismiss="modal">
                <span>&times;</span>
              </button>
              <h3 class="modal-title">View Department</h3>
            </div>
            <div class="modal-body">
              <form class="form-horizontal form-label-left" method="post">
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Department Code <span class="required">*</span>
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="text"  name="add-department" required="required" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Department Description<span class="required">*</span>
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="text"  name="add-location" required="required" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Office Location<span class="required">*</span>
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="text"  name="add-location" required="required" class="form-control">
                  </div>
                </div>
                
              </div>
              
              <div class="modal-footer">
                <button class="btn button-secondary" data-dismiss="modal" type="button">Cancel</button>
                <button class="btn btn-primary" name="deletedepartment" type="submit">Submit</button>
              </form>
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
              <button type="button" class="close"  data-dismiss="modal">
                <span>&times;</span>
              </button>
              <h3 class="modal-title">Edit Department</h3>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-label-left" method="post" action="../../../controller/departmentController/updateDept.php">
                  <input type="hidden" name="id" id="edit_dept_id" value="">
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="edit_dept_code" >Department Code <span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text"  name="dept_code" required="required" class="form-control" id="edit_dept_code">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="edit_dept_code">Department Description<span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text"  name="dept_description" required="required" class="form-control" id="edit_dept_code">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="edit_office_location" >Office Location<span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text"  name="office_location" required="required" class="form-control" id="edit_office_location">
                    </div>
                  </div>
                  
                </div>
                <div class="modal-footer">
                  <button class="btn button-secondary" data-dismiss="modal" type="button">Cancel</button>
                  <button class="btn btn-primary" name="updatedept" type="submit">Submit</button>
                </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Delete Modal -->
      <div class="modal fade" tabindex="-1" role="dialog" id="deleteDepartment">
        <div class="modal-dialog" style="width:40%" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">
                <span>&times;</span>
              </button>
              <h3 class="modal-title">Delete Department</h3>
            </div>
            <div class="modal-body">
              <form  method="post">
                <blockquote>
                  <p>Are you sure you want to delete this department?</p>
                  <input type="hidden" name="hidden_id" value="2">
                  
                </blockquote>
              </div>
              
              <div class="modal-footer">
                <button class="btn button-secondary" data-dismiss="modal" type="button">Cancel</button>
                
                <button class="btn btn-primary" name="deletedepartment" type="submit">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      
      <!-- END MODAL -->
      
      
    </div>
  </div>
  
  <!-- PHP -->
  <!-- END -->
            <!-- Script start -->
            <script src="../../assets/js/jq.js"></script>
            <script src="../../assets/js/bs.js"></script>   
            <script src="../../assets/js/fc.js"></script>
            <script src="../../assets/js/progress.js"></script>
            <script src="../../assets/js/bsprogress.js"></script>
            <script src="../../assets/js/custom.js"></script>
            <script src="../../assets/js/jquery.dataTables.min.js"></script>
            <script src="../../assets/js/dataTables.buttons.min.js"></script>
            <script src="../../assets/js/buttons.flash.min.js"></script>
            <script src="../../assets/js/buttons.html5.min.js"></script>
            <script src="../../assets/js/vfs_fonts.js"></script>
            <script src="../../assets/js/pdfmake.min.js"></script>
            <script src="../../assets/js/jszip.min.js"></script>
            <script src="../../assets/js/buttons.print.min.js"></script>
            <script src="../../assets/js/angular.min.js"></script>
            <script src="../../assets/js/angular-route.js"></script>
            
            <script type="text/javascript">
              
              $(document).ready(function() {
                $('#dataTable').DataTable( {
                  dom: 'Bfrtip',
                  buttons: [
                  'copyHtml5',
                  'excelHtml5',
                  'csvHtml5',
                  'pdfHtml5',
                  'print'
                  ]
                } );
              } );
            </script>
  <!-- <script  type="text/javascript">
   var app = angular.module("myApp", []);
   app.controller("myCtrl", function($http,$scope){
        $http.get('../../../controller/departmentController/allDept.php')
            .then(function(response){
                $scope.dept_label = ["Dept id","Dept code","Dept Description","Office Location","ACTION"];
                $scope.department = response.data;
            });
        $scope.openModal = function(modal_id){
            $('#'+modal_id).show();
        };
        $scope.closeModal = function(modal_id){
            $('#'+modal_id).hide();
        };
        $scope.editDepartment = function(dept_id){
            $http.post('../../../controller/departmentController/getDept.php',{
                'dept_id': dept_id
            }).then(function(response){
                $('#edit_dept_code').val(response.data.dept_code);
                $('#edit_dept_description').val(response.data.dept_description);
                $('#edit_office_location').val(response.data.office_location);
                $('#editDepartment').show();
            });
        };
        $scope.viewCourse = function(dept_id,course_name){
            $http.post('viewCourse.php',{
                'dept_id': dept_id
            }).then(function(response){
               console.log(response);
               if(response.data[0] == null){
                $('#view_course_label').text('No Student');
                $('#view_course_table').hide();
               }else{
                $scope.student_course_label  = ["STUDENT ID","FAMILYNAME","GIVENNAME","LEVEL"];
                $scope.student_course = response.data;
                $('#view_course_label').text(`Student's List`);
                $('#view_course_table').show();
               }
            });
            $('#view_course_name').text(course_name);
            $('#viewCourse').show();
        }
        $scope.deleteCourse = function(dept_id){
            console.log(dept_id);
            $('#deleteCourse').show();
            $('#delCourse').on('click', function(){
                $http.post('deleteCourse.php',{
                    'dept_id': dept_id
                }).then(function(response){
                    location.reload();
                });
            });
        };
   });
  </script> -->
</body>
</html>