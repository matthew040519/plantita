<?php 
session_start();
  if (!isset($_SESSION['customer_name'])) {
    header("location: index.php");
  }
  $customer_id = $_SESSION['customer_id'];
  include('include/connection.php');
  // echo $_SESSION['student_id'];
  // $id = $_GET['id'];
 ?>
<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>MFAOSYS</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!-- Start Main Top -->
    <?php include('include/customerheader.php'); ?>
    <!-- End Main Top -->

    <!-- Start Main Top -->
    <?php include('include/customersubheader.php'); ?>
    <!-- End Main Top -->

    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Pending Transaction</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Pending Transaction</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Reference</th>
                                    <th>Supplier</th>
                                    <th>Amount</th>
                                    <th>Shipping Fee</th>
                                    <th>Total Amount to pay</th>
                                    <th>View Items</th>
                                    <!-- <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Remove</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                // SELECT * FROM `tblmaintransaction` INNER JOIN tblproducts ON tblproducts.product_id=tblmaintransaction.product_id WHERE tblmaintransaction.customer_id = '$customer_id' and tblmaintransaction.status_id = 1
                                $customer_id = $_SESSION['customer_id'];
                                        $query = mysqli_query($con, "SELECT *, SUM(amount) as amount, tblsupplier.supplier_id as id_supplier, tblmaintransaction.reference_id as mainRef FROM `tblmaintransaction` INNER JOIN tblshippingrate ON tblshippingrate.shippingrate_id=tblmaintransaction.shippingrate_id INNER JOIN tblsupplier ON tblsupplier.supplier_id=tblshippingrate.supplier_id WHERE tblmaintransaction.customer_id = '$customer_id' and tblmaintransaction.status_id = 1 GROUP BY reference_id, tblsupplier.supplier_id");
                                        while ($row = mysqli_fetch_array($query)){
                                             $count = mysqli_num_rows($query);
                                        // echo $count;
                                 ?>
                                <tr>
                                   <td class="thumbnail-img">
                                        <?php echo $row['tdate']; ?>
                                        
                                    </td>
                                    <td class="thumbnail-img">
                                        <?php echo $row['mainRef']; ?>
                                        <!-- <a href="#">
                                    <img class="img-fluid" src="supplier/uploaded_image/<?php echo $row['image']; ?>" alt="" />
                                </a> -->
                                    </td>
                                    <td class="thumbnail-img">
                                        <?php echo $row['supplier_name']; ?>
                                        <!-- <a href="#">
                                    <img class="img-fluid" src="supplier/uploaded_image/<?php echo $row['image']; ?>" alt="" />
                                </a> -->
                                    </td>
                                    <td class="name-pr">
                                        <!-- <a href="#"> -->
                                            &#8369;
									<?php  echo number_format($row['amount'], 2); ?>
								<!-- </a> -->
                                    </td>
                                    
                                    <td class="name-pr">
                                        <!-- <a href="#"> -->
                                            &#8369;
                                    <?php  echo number_format($row['shippingrate'], 2); ?>
                                <!-- </a> -->
                                    </td>
                                    <td class="name-pr">
                                        <!-- <a href="#"> -->
                                            &#8369;
                                    <?php  echo number_format($row['amount'] + $row['shippingrate'], 2); ?>
                                <!-- </a> -->
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#bd-example-modal-sm<?php echo $row['transaction_id']; ?>" type="button">
                            <i class="fa fa-eye"></i> View Items
                            </a>
                                    </td>
                                    <!-- <td class="price-pr">
                                        <p>&#8369; <?php echo number_format($row['price'], 2); ?></p>
                                    </td>
                                    <td class="quantity-box"><?php echo $row['qty']; ?></td>
                                    <td class="total-pr">
                                        <p>&#8369; <?php echo number_format($row['amount'], 2); ?></p>
                                    </td>
                                    <td class="remove-pr">
                                        <a href="deleteCat.php?id=<?php echo $row['transaction_id']; ?>">
									<i class="fas fa-times"></i>
								</a>
                                    </td> -->
                                </tr>
                                <?php include('modals/modalViewItems.php'); ?>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="row my-5">
                <div class="col-lg-6 col-sm-6">
                    <!-- <div class="coupon-box">
                        <div class="input-group input-group-sm">
                            <input class="form-control" placeholder="Enter your coupon code" aria-label="Coupon code" type="text">
                            <div class="input-group-append">
                                <button class="btn btn-theme" type="button">Apply Coupon</button>
                            </div>
                        </div>
                    </div> -->
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="update-box" style="float: right;">
                        <!-- <input value="Update Cart" type="submit"> -->
                        <!-- <a href="checkout.php" class="btn btn-primary">Next</a> -->
                    </div>
                </div>
            </div>

            <!-- <div class="row my-5">
                <div class="col-lg-8 col-sm-12"></div>
                <div class="col-lg-4 col-sm-12">
                    <div class="order-box">
                        <h3>Order summary</h3>
                        <div class="d-flex">
                            <h4>Sub Total</h4>
                            <div class="ml-auto font-weight-bold"> $ 130 </div>
                        </div>
                        <div class="d-flex">
                            <h4>Discount</h4>
                            <div class="ml-auto font-weight-bold"> $ 40 </div>
                        </div>
                        <hr class="my-1">
                        <div class="d-flex">
                            <h4>Coupon Discount</h4>
                            <div class="ml-auto font-weight-bold"> $ 10 </div>
                        </div>
                        <div class="d-flex">
                            <h4>Tax</h4>
                            <div class="ml-auto font-weight-bold"> $ 2 </div>
                        </div>
                        <div class="d-flex">
                            <h4>Shipping Cost</h4>
                            <div class="ml-auto font-weight-bold"> Free </div>
                        </div>
                        <hr>
                        <div class="d-flex gr-total">
                            <h5>Grand Total</h5>
                            <div class="ml-auto h5"> $ 388 </div>
                        </div>
                        <hr> </div>
                </div>
                <div class="col-12 d-flex shopping-box"><a href="checkout.html" class="ml-auto btn hvr-hover">Checkout</a> </div>
            </div> -->

        </div>
    </div>
    <!-- End Cart -->

    <!-- Start Instagram Feed  -->
    <div class="instagram-box">
        <div class="main-instagram owl-carousel owl-theme">
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-01.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-02.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-03.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-04.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-05.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-06.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-07.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-08.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-09.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-05.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Instagram Feed  -->


    <!-- Start Footer  -->
    <footer>
        <div class="footer-main">
            <div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-12 col-sm-12">
						<div class="footer-top-box">
							<h3>Business Time</h3>
							<ul class="list-time">
								<li>Monday - Friday: 08.00am to 05.00pm</li> <li>Saturday: 10.00am to 08.00pm</li> <li>Sunday: <span>Closed</span></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-4 col-md-12 col-sm-12">
						<div class="footer-top-box">
							<h3>Newsletter</h3>
							<form class="newsletter-box">
								<div class="form-group">
									<input class="" type="email" name="Email" placeholder="Email Address*" />
									<i class="fa fa-envelope"></i>
								</div>
								<button class="btn hvr-hover" type="submit">Submit</button>
							</form>
						</div>
					</div>
					<div class="col-lg-4 col-md-12 col-sm-12">
						<div class="footer-top-box">
							<h3>Social Media</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							<ul>
                                <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a></li>
                            </ul>
						</div>
					</div>
				</div>
				<hr>
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-widget">
                            <h4>About Freshshop</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p> 
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p> 							
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link">
                            <h4>Information</h4>
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Customer Service</a></li>
                                <li><a href="#">Our Sitemap</a></li>
                                <li><a href="#">Terms &amp; Conditions</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Delivery Information</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link-contact">
                            <h4>Contact Us</h4>
                            <ul>
                                <li>
                                    <p><i class="fas fa-map-marker-alt"></i>Address: Michael I. Days 3756 <br>Preston Street Wichita,<br> KS 67213 </p>
                                </li>
                                <li>
                                    <p><i class="fas fa-phone-square"></i>Phone: <a href="tel:+1-888705770">+1-888 705 770</a></p>
                                </li>
                                <li>
                                    <p><i class="fas fa-envelope"></i>Email: <a href="mailto:contactinfo@gmail.com">contactinfo@gmail.com</a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer  -->

    <!-- Start copyright  -->
    <div class="footer-copyright">
        <p class="footer-company">All Rights Reserved. &copy; 2018 <a href="#">ThewayShop</a> Design By :
            <a href="https://html.design/">html design</a></p>
    </div>
    <!-- End copyright  -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

    <!-- ALL JS FILES -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/jquery.superslides.min.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/inewsticker.js"></script>
    <script src="js/bootsnav.js."></script>
    <script src="js/images-loded.min.js"></script>
    <script src="js/isotope.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/baguetteBox.min.js"></script>
    <script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
    $('#example').DataTable();
} );
    </script>
</body>

</html>