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
                                            <h5 class="m-b-10">Monthly Sales Report</h5>
                                            <p class="m-b-0">Welcome Murcia Ornamental Plants</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="index.html"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Monthly Sales Report</a>
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
                                      
                                        <form method="GET" class="form-material">
                                            <div class="row">
                                                     <div class="col col-sm-6">
                                                      <div class="form-group form-default">
                                                               <input type="date" class="form-control" name="bdate">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Begin Date</label>
                                                            </div>
                                            </div>
                                             <div class="col col-sm-6">
                                                      <div class="form-group form-default">
                                                               <input type="date" class="form-control" name="edate">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">End Date</label>
                                                            </div>
                                            </div>
                                            <div class="col col-sm-6">
                                                <input type="submit" class="btn btn-success" value="Search" name="search">
                                            </div>
                                            </div>
                                            
                                        </form>        

                                        <?php if(isset($_GET['search'])){
                                                $bdate = $_GET['bdate'];
                                                $edate = $_GET['edate'];

                                                
                                         ?>

                                                    <div class="card table-card">
                                                    <div class="card-header">
                                                        
                                                        <div class="card-header-right">
                                                            
                                                             <!-- <button style="margin-right: 10px;" data-toggle="modal" data-target="#bd-example-modal-sm" class="btn waves-effect waves-light btn-primary btn-sm btn-outline-primary">Export PDF</button> -->
                                                             <a target="_blank" href="pdfmonthlysales.php?bdate=<?php echo $bdate; ?>&edate=<?php echo $edate; ?>" class="btn waves-effect waves-light btn-primary btn-sm btn-outline-primary">Export PDF</a>
                                                            <!-- <ul class="list-unstyled card-option">
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
                                                    <table id="example" class="table hover multiple-select-row data-table-export nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Date</th>
                <th>Date to Deliver</th>
                <th>Supplier</th>
                <th>Customer</th>
                <th>Reference</th>
                <th>Amount</th>
                <th>Shipping Fee</th>
                <th>Total Amount</th>
                <th style="text-align: center;">Settings</th>
            </tr>
        </thead>
        <tbody>
          <?php 
          date_default_timezone_set('Asia/Manila');
          $tdate = date("Y-m-d");
          // echo $tdate;
            $query = mysqli_query($con, "SELECT *, tblmaintransaction.reference_id as mainRef, SUM(amount) as amount FROM tblmaintransaction INNER JOIN tblshippingrate ON tblshippingrate.shippingrate_id=tblmaintransaction.shippingrate_id INNER JOIN tblsupplier ON tblsupplier.supplier_id=tblshippingrate.supplier_id INNER JOIN tblcustomer ON tblcustomer.customer_id=tblmaintransaction.customer_id INNER JOIN tbldeliverytransaction ON tbldeliverytransaction.reference_id=tblmaintransaction.reference_id INNER JOIN tbldeliveryman ON tbldeliveryman.deliveryman_id=tbldeliverytransaction.deliveryman_id WHERE tblmaintransaction.status_id = 2 AND tbldeliverytransaction.payed = 1 AND tbldeliverytransaction.date_deliver BETWEEN '$bdate' AND '$edate' GROUP BY tblmaintransaction.reference_id");
            while($row = mysqli_fetch_array($query)){
           ?>
            <tr>
                <td><?php echo $row['tdate']; ?></td>
                <td><?php echo $row['date_deliver']; ?></td>
                <td><?php echo $row['supplier_name']; ?></td>
                <td><?php echo $row['customer_name']; ?></td>
                <td><?php echo $row['mainRef']; ?></td>
                <td><?php echo number_format($row['amount'], 2); ?></td>
                <td><?php  echo number_format($row['shippingrate'], 2); ?></td>
                <td><?php  echo number_format($row['amount'] + $row['shippingrate'], 2); ?></td>
                <td align="center">
                    <a href="#" class="btn-sm btn-primary" data-toggle="modal" data-target="#bd-example-modal-sm<?php echo $row['transaction_id']; ?>" type="button">
                            <i class="fa fa-eye"></i>
                            </a> 
                           
                </td>
                <!-- <td>61</td>
                <td>2011/04/25</td>
                <td>$320,800</td> -->
            </tr>
            <?php include('../modals/modalViewTransaction.php'); ?>
          <?php } ?>
          </tbody>
        </table>
                                                    </div>
                                                </div>
                                            <?php } ?>
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
                                            <h4 class="modal-title" id="myLargeModalLabel">Add Supplier</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body">
                                          <form class="form-material" method="POST">
                                                            <div class="form-group form-default">
                                                                <input name="supplier" type="text" name="footer-email" class="form-control">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Supplier Name</label>
                                                            </div>
                                                            <div class="form-group form-default">
                                                                <input name="password" type="password" name="footer-email" class="form-control">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Password</label>
                                                            </div>
                                                            <div class="form-group form-default">
                                                                <input name="location" type="text" name="footer-email" class="form-control">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Location</label>
                                                            </div>
                                                            <div class="form-group form-default">
                                                                <input name="contactno" type="text" maxlength="11" name="footer-email" class="form-control">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Contact Number</label>
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
                                        $supplier = $_POST['supplier'];
                                        $password = md5($_POST['password']);
                                        $location = $_POST['location'];
                                        $contactno = $_POST['contactno'];

                                        $query = mysqli_query($con, "INSERT INTO `tblsupplier`(`supplier_id`, `supplier_name`, `supplier_password`, `supplier_location`, `contact_no`) VALUES (NULL,'$supplier', '$password', '$location', '$contactno')");

                                        echo "<script>window.location.replace('supplierlist.php')</script>";
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
