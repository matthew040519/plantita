<?php 
session_start();
  if (!isset($_SESSION['username'])) {
    header("location: ../index.php");
  }
  // echo $_SESSION['customer_name'];
  include('../include/connection.php');
  // echo $_SESSION['student_id'];
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>MFAOSYS</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
    <meta name="author" content="Codedthemes" />
    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <!-- waves.css -->
    <link rel="stylesheet" href="assets/pages/waves/css/waves.min.css" type="text/css" media="all">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap/css/bootstrap.min.css">
    <!-- waves.css -->
    <link rel="stylesheet" href="assets/pages/waves/css/waves.min.css" type="text/css" media="all">
    <!-- themify icon -->
    <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">
    <!-- font-awesome-n -->
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome-n.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <!-- scrollbar.css -->
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.mCustomScrollbar.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../DataTables/datatables.min.css"/>

    <style type="text/css">
        .fixed-button{
            display: none;
        }
    </style>
</head>

<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="preloader-wrapper">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <?php include('include/adminheader.php'); ?>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <?php include('include/adminsidebar.php'); ?>
                    <div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Town List</h5>
                                            <p class="m-b-0">Welcome Murcia Ornamental Plants</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="index.html"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Town List</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                      
                                                
                                                    <div class="card table-card">
                                                    <div class="card-header">
                                                        <h5>Town List</h5>
                                                        <div class="card-header-right">
                                                             <button style="margin-right: 10px;" data-toggle="modal" data-target="#bd-example-modal-sm" class="btn waves-effect waves-light btn-primary btn-sm btn-outline-primary"><i class="icofont icofont-plus"></i>Add Town</button>
                                                           <!--  <ul class="list-unstyled card-option">
                                                                <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                                                <li><i class="fa fa-window-maximize full-card"></i></li>
                                                                <li><i class="fa fa-minus minimize-card"></i></li>
                                                                <li><i class="fa fa-refresh reload-card"></i></li>
                                                                <li><i class="fa fa-trash close-card"></i></li>
                                                            </ul> -->
                                                        </div>
                                                    </div>
                                                    <div class="container-fluid mt-3  mb-3">   
                                               <!-- <div class="card-block table-border-style">
                                                <div> -->
                                                    <table id="example" class="table table-striped" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Town id</th>
                                                                 <th>Town Name</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php 
                                                                $query = mysqli_query($con, "SELECT * FROM `tbltown`");
                                                                while($row = mysqli_fetch_array($query)){
                                                             ?>
                                                            <tr>
                                                                <th><?php echo $row['town_id']; ?></th>
                                                                <td><?php echo $row['town_desc']; ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                            
                                                        </tbody>
                                                    </table>
                                                    </div>
                                                </div>
                                            </div>
                                               
                                    </div>
                                    <!-- Page-body end -->
                                </div>
                                <!-- <div id="styleSelector"> </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bs-example-modal-md" id="bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-md modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myLargeModalLabel">Add Town</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body">
                                          <form class="form-material" method="POST">
                                                            <div class="form-group form-default">
                                                                <input name="town" type="text" name="footer-email" class="form-control">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Town Name</label>
                                                            </div>
                                                            
                                          <!-- </form> -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                            <input type="submit" class="btn btn-primary" value="Save Changes" name="submit">
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php 
                                    if(isset($_POST['submit']))
                                    {
                                        $town = $_POST['town'];
                                        $query = mysqli_query($con, "INSERT INTO `tbltown`(`town_id`, `town_desc`) VALUES (NULL, '$town')");

                                        echo "<script>window.location.replace('townlist.php')</script>";
                                    }
                             ?>
            </div>
    
    <!-- Warning Section Ends -->

    <!-- Required Jquery -->
    <script type="text/javascript" src="assets/js/jquery/jquery.min.js "></script>
    <script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js "></script>
    <script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js "></script>
    <!-- waves js -->
    <script src="assets/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- slimscroll js -->
    <script src="assets/js/jquery.mCustomScrollbar.concat.min.js "></script>

    <!-- menu js -->
    <script src="assets/js/pcoded.min.js"></script>
    <script src="assets/js/vertical/vertical-layout.min.js "></script>

    <script type="text/javascript" src="assets/js/script.js "></script>
    <script type="text/javascript" src="../DataTables/datatables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
    $('#example').DataTable();
} );
    </script>
</body>

</html>
