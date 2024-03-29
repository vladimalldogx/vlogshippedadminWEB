
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
  <link rel="stylesheet" href="../../assets/css/dp.css">
  <link rel="stylesheet" href="../../assets/css/animate.css">
  <link rel="stylesheet" href="../../assets/css/custom.css">
</head>
<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col menu_fixed">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><i class="fa fa-lock"></i> <span>UC Locker System</span></a>
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
               <!--facilator  -->
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
                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addLocker">Add Locker</button>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lockers <small> BSBA </small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <small>Filter by</small>
                      <select id="filter" class="form-control">
                        <option value="BSBA">BSBA</option>
                        <option value="BSIT">BSIT</option>
                        <option value="BSOA">BSOA</option>
                      </select>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="row">
                      <!-- table start -->
                      <table class="table table-striped projects" id ="dataTable">
                          <thead>
                            <tr>
                              <th >Locker No.</th>
                              <th>Locker Status</th>
                              <th style="width: 20%">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <!-- END MODAL -->
                            <tr>
                              <td>11</td>
                                <td>
                                  Occupied                        </td>
                                
                                          <td>                            
                                            <!-- <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a> -->
                                            <a href="#" data-toggle="modal" data-target="#editApplicant"  class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                            <a href="#" data-toggle="modal" data-target="#viewApplicant" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> View </a>
                                            <a href="#" data-toggle="modal" data-target="#deleteApplicant" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                                          </td>
                                        </tr>
                                        <!-- END MODAL -->
                                        
                                      </tbody>
                                    </table>
                                    </div>
                                    
                      <!-- talble end -->
                      <!-- CHECK MODAL -->
                      <div class="modal fade" tabindex="-1" role="dialog" id="checkLocker1">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                              </button>
                              <h3 class="modal-title">Check Locker</h3>
                            </div>
                            
                            <div class="modal-body">
                              <form class="form-horizontal form-label-left"  method="post">
                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ID no.<span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" onkeypress="return event.charCode >= 48" min="1" name="add-location" required="required" class="form-control">
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name<span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text"  name="add-location" required="required" class="form-control">
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Last Name<span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text"  name="add-location" required="required" class="form-control">
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email<span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="email"  name="add-location" required="required" class="form-control">
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Course<span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="filter" class="form-control">
                                      <option disabled selected>-------</option>
                                      <option value="Vacant">Vacant</option>
                                      <option value="Reserve">Reserve</option>
                                      <option value="Occupied">Occupied</option>
                                      <option value="Maintenance">Maintenance</option>
                                    </select>
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Year Level<span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="filter" class="form-control">
                                      <option disabled selected>-------</option>
                                      <option value="Vacant">1</option>
                                      <option value="Reserve">2</option>
                                      <option value="Occupied">3</option>
                                      <option value="Maintenance">4</option>
                                    </select>
                                  </div>
                                </div>
                                
                                <div class="form-group text-center">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Type</label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="filter" class="form-control">
                                      <option disabled selected>-------</option>
                                      <option value="Vacant">Vacant</option>
                                      <option value="Reserve">Reserve</option>
                                      <option value="Occupied">Occupied</option>
                                      <option value="Maintenance">Maintenance</option>
                                    </select>
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Date<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <input type="date"  name="add-location" required="required" class="form-control">
                                    </div>
                                  </div>

                                <div class="modal-footer">
                                  <input type="hidden" name="ln" value="1">
                                  <button class="btn button-secondary" data-dismiss="modal" type="button">Cancel</button>
                                  <button class="btn btn-primary" name="addform" type="submit">Submit</button>
                                </div>
                                
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>             
                      <!-- END MODAL -->
                      <!-- ------------------------------------------------------------ -->
                      <!-- END MODAL -->
                      
                      
                      <!-- PHP -->
                      <!-- END -->
                    </div>
                  </div>
                  <script src="../../assets/js/jq.js"></script>
                  <script src="../../assets/js/bs.js"></script>   
                  <script src="../../assets/js/fc.js"></script>
                  <script src="../../assets/js/progress.js"></script>
                  <script src="../../assets/js/mm.js"></script>
                  <script src="../../assets/js/dp.js"></script>
                  <script src="../../assets/js/custom.js"></script>
                  <script src="../../assets/js/angular.min.js"></script>
                  <script src="../../assets/js/angular-route.js"></script>
                  <script>
                    $(function(){
                      $('#editslocker').click(function(){
                        $.ajax({
                          type: 'post',
                          url: 'adddata.php',
                          data: $('#myForm').serialize(),
                          success: function(response){
                            alert(response);
                            location.reload();
                          }
                        });
                      });
                    });
                    
                    $(function(){
                      $('.editLocker').on('click', function(){
                        $id = $(this).data('id');
                        $.ajax({
                          type: 'post',
                          url: 'getdata.php',
                          data: 'id='+$id,
                          dataType: 'json',
                          cache: false,
                          success: function(data){
                            console.log(data.fields);
                            $('#s_dept_id').val(data.fields['locker_num']);
                            $('#edit_dept_code').val(data.fields['dept_code']);
                            $('#edit_dept_status').val(data.fields['locker_status']);
                            $('#editModalLocker').removeClass('fade').addClass('show');
                            $('.editclose').on('click', function(){
                              $('#editModalLocker').removeClass('show').addClass('fade');
                            });
                          }
                        });
                      });
                    });
                  </script>
                </body>
                </html>