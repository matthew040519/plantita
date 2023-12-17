<?php 
session_start();
  if (!isset($_SESSION['deliveryman_name'])) {
    header("location: ../index.php");
  }
  // echo $_SESSION['customer_name'];
  $id = $_SESSION['id'];
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
        div.dataTables_wrapper div.dataTables_filter input
        {
            width: 150px;
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
            <?php include('include/deliverymanheader.php'); ?>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <?php include('include/deliverymansidebar.php'); ?>
                    <div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Delivery Transaction</h5>
                                            <p class="m-b-0">Welcome Murcia Flower and Ornamental Plants</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="index.html"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Delivery Transaction</a>
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
                                      
                                       <div class="row">
                                         <?php 
                                         $reference_id = $_GET['reference'];
                                                            $deliveryman_id = $_GET['id'];
                                                            $supplier_id = $_GET['supplier_id'];
                                                     ?>
                                                        <div class="col-md-12">
                                                            <div class="card table-card">
                                                    <div class="card-header">
                                                        <h5>Delivery Transaction</h5>
                                                        <div class="card-header-right">
                                                             <!-- <button style="margin-right: 10px;" data-toggle="modal" data-target="#bd-example-modal-sm" class="btn waves-effect waves-light btn-primary btn-sm btn-outline-primary"><i class="icofont icofont-plus"></i>Add Product</button> -->
                                                           <!--  <ul class="list-unstyled card-option">
                                                                <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                                                <li><i class="fa fa-window-maximize full-card"></i></li>
                                                                <li><i class="fa fa-minus minimize-card"></i></li>
                                                                <li><i class="fa fa-refresh reload-card"></i></li>
                                                                <li><i class="fa fa-trash close-card"></i></li>
                                                            </ul> -->
                                                        </div>
                                                    </div>
                                                    <div class="container-fluid mt-3 mb-3">   
                                               <!-- <div class="card-block table-border-style">
                                                <div> -->
                                                   
                                                   <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Date Approve</th>
                <th>Date to Deliver</th>
                <th>Customer</th>
                <th>Reference</th>
                <th>Product</th>
                <th>Qty</th>
                <th>Amount</th>
                <th>Shipping Fee</th>
                <th>Total Amount</th>
            </tr>
        </thead>
        <tbody>
          <?php 
          date_default_timezone_set('Asia/Manila');
          $tdate = date("Y-m-d");
          // echo $tdate;
            $sum = 0;
            $querys = mysqli_query($con, "SELECT *, tblmaintransaction.reference_id as reference FROM `tblmaintransaction` INNER JOIN tblproducts ON tblproducts.product_id=tblmaintransaction.product_id INNER JOIN tblshippingrate ON tblshippingrate.shippingrate_id=tblmaintransaction.shippingrate_id INNER JOIN tblsupplier ON tblsupplier.supplier_id=tblshippingrate.supplier_id INNER JOIN tbldeliverytransaction ON tbldeliverytransaction.reference_id=tblmaintransaction.reference_id INNER JOIN tblcustomer ON tblcustomer.customer_id=tblmaintransaction.customer_id WHERE tblsupplier.supplier_id = '$supplier_id' and tblmaintransaction.reference_id = '$reference_id'");
                while ($row = mysqli_fetch_array($querys)){
                $total = $row['amount'] + $row['shippingrate'];
                $sum += $total;
                // echo $sum;
           ?>
            <tr>
                <td><?php echo $row['tdate']; ?></td>
                <td><?php echo $row['date_deliver']; ?></td>
                <td><?php echo $row['customer_name']; ?></td>
                <td><?php echo $row['reference']; ?></td>
                <td><?php echo $row['product_desc']; ?></td>
                <td><?php echo $row['qty']; ?></td>
                <td><?php echo number_format($row['amount'], 2); ?></td>
                <td><?php  echo number_format($row['shippingrate'], 2); ?></td>
                <td><?php  echo number_format($row['amount'] + $row['shippingrate'], 2); ?></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
                                                   
                                                    </div>
                                                </div>
                                                        </div>
                                                         <div class="col-md-6">
                                                            <div class="card table-card">
                                                    <div class="card-header">
                                                        <h5>Delivery Details</h5>
                                                        <div class="card-header-right">
                                                             <!-- <button style="margin-right: 10px;" data-toggle="modal" data-target="#bd-example-modal-sm" class="btn waves-effect waves-light btn-primary btn-sm btn-outline-primary"><i class="icofont icofont-plus"></i>Add Product</button> -->
                                                           <!--  <ul class="list-unstyled card-option">
                                                                <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                                                <li><i class="fa fa-window-maximize full-card"></i></li>
                                                                <li><i class="fa fa-minus minimize-card"></i></li>
                                                                <li><i class="fa fa-refresh reload-card"></i></li>
                                                                <li><i class="fa fa-trash close-card"></i></li>
                                                            </ul> -->
                                                        </div>
                                                    </div>
                                                    <div class="container-fluid mt-3 mb-3">   
                                               <!-- <div class="card-block table-border-style">
                                                <div> -->
                                                   <?php 

                                                        $query = mysqli_query($con, "SELECT * FROM tbltransactiondetails INNER JOIN tbltown ON tbltown.town_id=tbltransactiondetails.town_id WHERE reference_id = '$reference_id'");
                                                        while($rows = mysqli_fetch_array($query)){

                                                    ?>
                                                   
                                                    
                                                    <form class="form-material" method="POST" enctype="multipart/form-data">
                                                            <div class="form-group form-default form-static-label">
                                                                <input type="text" readonly="" value="<?php echo $reference_id; ?>" name="reference" class="form-control">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Reference</label>
                                                            </div>
                                                            <div class="form-group form-default form-static-label">
                                                                <input type="text" readonly="" value="<?php echo $rows['email']; ?>" name="reference" class="form-control">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Email</label>
                                                            </div>
                                                            <div class="form-group form-default form-static-label">
                                                                <input type="text" readonly="" value="<?php echo $rows['address1']; ?>" name="reference" class="form-control">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Address 1</label>
                                                            </div>
                                                            <div class="form-group form-default form-static-label">
                                                                <input type="text" readonly="" value="<?php echo $rows['address2']; ?>" name="reference" class="form-control">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Address 2</label>
                                                            </div>
                                                            <div class="form-group form-default form-static-label">
                                                                <input type="text" readonly="" value="<?php echo $rows['town_desc']; ?>" name="reference" class="form-control">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Town</label>
                                                            </div>
                                          <!-- </form> -->
                                        
                                        </form>
                                    <?php } ?>
                                                    </div>
                                                </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="card table-card">
                                                    <div class="card-header">
                                                        <h5>Delivery Payment</h5>
                                                        <div class="card-header-right">
                                                             <!-- <button style="margin-right: 10px;" data-toggle="modal" data-target="#bd-example-modal-sm" class="btn waves-effect waves-light btn-primary btn-sm btn-outline-primary"><i class="icofont icofont-plus"></i>Add Product</button> -->
                                                           <!--  <ul class="list-unstyled card-option">
                                                                <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                                                <li><i class="fa fa-window-maximize full-card"></i></li>
                                                                <li><i class="fa fa-minus minimize-card"></i></li>
                                                                <li><i class="fa fa-refresh reload-card"></i></li>
                                                                <li><i class="fa fa-trash close-card"></i></li>
                                                            </ul> -->
                                                        </div>
                                                    </div>
                                                    <div class="container-fluid mt-3 mb-3">   
                                               <!-- <div class="card-block table-border-style">
                                                <div> -->
                                                   <?php 

                                                        $query = mysqli_query($con, "SELECT * FROM tbltransactiondetails INNER JOIN tbltown ON tbltown.town_id=tbltransactiondetails.town_id WHERE reference_id = '$reference_id'");
                                                        while($rows = mysqli_fetch_array($query)){

                                                    ?>
                                                   
                                                    
                                                    <form class="form-material" method="POST" enctype="multipart/form-data">
                                                            <div class="form-group form-default">
                                                                <input id="file" type="file" name="file" class="form-control">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Proof of Order</label>
                                                            </div>
                                                            <div class="form-group form-default">
                                                                <input style="text-align: right;" id="payment" type="number" name="payment" class="form-control">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Payment</label>
                                                            </div>
                                                            <div class="form-group form-default form-static-label">
                                                                <input style="text-align: right;" type="text" readonly="" value="<?php echo number_format($sum, 2); ?>" name="reference" class="form-control">
                                                                <input style="text-align: right; display: none;" type="text" readonly="" value="<?php echo $sum; ?>" id="bills" name="bill" class="form-control">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Bills to Pay</label>
                                                            </div>
                                                            <div class="form-group form-default form-static-label">
                                                                <input style="text-align: right;" readonly="" id="change" type="text" name="reference" class="form-control">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Change</label>
                                                            </div>
                                        
                                    <?php } ?>
                                    <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                            <input type="submit" class="btn btn-primary" value="Pay" name="submitPay">
                                        </div>
                                        </form>
                                                    </div>
                                                </div>
                                                        </div>
                                                    </div>
                                                
                                                    
                                            </div>
                                               
                                    </div>
                                    <!-- Page-body end -->
                                </div>
                                <?php 
                                    if(isset($_POST['submitPay']))
                                    {
                                        date_default_timezone_set('Asia/Manila');
                                        $tdate = date("m/d/Y");
                                        $reference_id = $_GET['reference'];
                                        $deliveryman_id = $_GET['id'];
                                        $supplier_id = $_GET['supplier_id'];
                                        $bill = $_POST['bill'];
                                        $target = "proof_order/". basename($_FILES['file']['name']);
                                        $image = $_FILES['file']['name'];

                                        

                                        if (move_uploaded_file($_FILES['file']['tmp_name'], $target)){
                                                        $query = mysqli_query($con, "INSERT INTO `tblpayment`(`payment_id`, `reference_id`, `supplier_id`, `amount`, `date_payed`, `deliveryman_id`, `proof_image`) VALUES (NULL, '$reference_id', '$supplier_id', '$bill', '$tdate', '$deliveryman_id', '$image')");
                                                      echo "<script>alert('Successfully Upload')</script>";
                                                      echo "<script>window.location.replace('pendingtransaction.php')</script>";
                                                    } else {
                                                      echo "<script>alert('Error!')</script>";
                                                    }

                                        $updateQuery = mysqli_query($con, "UPDATE `tbldeliverytransaction` SET `payed`=1 WHERE deliveryman_id = '$deliveryman_id' AND reference_id = '$reference_id'");
                                        
                                        $querys1 = mysqli_query($con, "SELECT *, tblmaintransaction.reference_id as reference FROM `tblmaintransaction` INNER JOIN tblproducts ON tblproducts.product_id=tblmaintransaction.product_id INNER JOIN tblshippingrate ON tblshippingrate.shippingrate_id=tblmaintransaction.shippingrate_id INNER JOIN tblsupplier ON tblsupplier.supplier_id=tblshippingrate.supplier_id INNER JOIN tbldeliverytransaction ON tbldeliverytransaction.reference_id=tblmaintransaction.reference_id INNER JOIN tblcustomer ON tblcustomer.customer_id=tblmaintransaction.customer_id WHERE tblsupplier.supplier_id = '$supplier_id' and tblmaintransaction.reference_id = '$reference_id'");
                                        while ($row1 = mysqli_fetch_array($querys1)){

                                            $product_id = $row1['product_id'];
                                            $qty = $row1['qty'];

                                            $queryInsert = mysqli_query($con, "INSERT INTO `tblproductransact`(`prod_transact_id`, `distributor_id`, `product_id`, `tdate`, `Pout`, `supplier_id`, `reference_id`) VALUES (NULL, 0, '$product_id', '$tdate', '$qty', '$supplier_id', '$reference_id')");
                                        }

                                        echo "<script>window.location.replace('pendingtransaction.php')</script>";
                                        

                                        // if ($query && $updateQuery)
                                        // {
                                            
                                        // }


                                        

                                    }

                                 ?>
                                <!-- <div id="styleSelector"> </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    $('#example').DataTable({
        "scrollX": true
    });
} );
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#payment').keyup(calculate);
            $('#payment').leave(function() {
                // $('#payment').val().toFixed(2);
        });
            // $('#a2').keyup(calculate);
        });
        function calculate(e)
        {
            // $('#change').val($('#payment').val() - $('#bills').val());

            var total = parseFloat($('#payment').val()) - parseFloat($('#bills').val());
            // $('#payment').val().toFixed(2);
            $('#change').val(total.toFixed(2));
        }
    </script>
</body>

</html>
