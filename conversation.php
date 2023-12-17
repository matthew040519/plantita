<?php 
session_start();
  if (!isset($_SESSION['customer_name'])) {
    header("location: index.php");
  }
  $customer_id = $_SESSION['customer_id'];
  include('include/connection.php');
  $supplier_id = $_GET['supplier_id'];
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
                    <h2>Request List</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Request List </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Shop Detail  -->
        <div class="shop-detail-box-main">
            <div class="container">
                <div class="row">
                   
                </div>

              
    			
    			<div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline-secondary my-12">
                        <div class="card-header">
                            <?php $querysupplier = mysqli_query($con, "SELECT * FROM tblsupplier WHERE supplier_id = '$supplier_id'");
                                while($row = mysqli_fetch_array($querysupplier)){ ?>
                                    <div class="media mb-3">
                                <div class="mr-2"> 
                                    <img class="rounded-circle border p-1" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2264%22%20height%3D%2264%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2064%2064%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_160c142c97c%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_160c142c97c%22%3E%3Crect%20width%3D%2264%22%20height%3D%2264%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2213.5546875%22%20y%3D%2236.5%22%3E64x64%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Generic placeholder image">
                                </div>
                                <div class="media-body">
                                    
                                    <h2 style="margin-top: 20px;"><?php  echo $row['supplier_name']; ?></h2>
                                </div>
                            </div>
                        <?php } ?>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                                <?php 
                                            $query = mysqli_query($con, "SELECT * FROM tblrequestcustomer INNER JOIN tblcustomer ON tblcustomer.customer_id=tblrequestcustomer.customer_id INNER JOIN tblsupplier ON tblsupplier.supplier_id=tblrequestcustomer.supplier_id WHERE tblrequestcustomer.customer_id = '$customer_id' AND tblrequestcustomer.supplier_id='$supplier_id'");
                                            while($row = mysqli_fetch_array($query)){
                                                $sender = $row['sendby'];
                                     ?>
                                        <?php if ($sender == 'Customer') { ?>
                                            <div class="col-lg-8">
                                            </div>
                                                  <div class="col-lg-4">
                                                    <div class="media mb-3">
                                                       
                                                            <div class="mr-2"> 
                                                                <img class="rounded-circle border p-1" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2264%22%20height%3D%2264%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2064%2064%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_160c142c97c%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_160c142c97c%22%3E%3Crect%20width%3D%2264%22%20height%3D%2264%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2213.5546875%22%20y%3D%2236.5%22%3E64x64%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Generic placeholder image">
                                                            </div>
                                                            <div class="media-body">
                                                                
                                                                <p><?php  echo $row['content']; ?></p>
                                                                <small class="text-muted">Posted by <?php echo $row['customer_name']; ?> on <?php echo $row['cdate']; ?></small>
                                                            </div>
                                                        </div>
                                                    </div>
                                    <?php } else { ?>
                                        <div class="col-md-6">
                                                     <div class="media mb-3">
                                                   
                                                        <div class="mr-2"> 
                                                            <img class="rounded-circle border p-1" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2264%22%20height%3D%2264%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2064%2064%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_160c142c97c%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_160c142c97c%22%3E%3Crect%20width%3D%2264%22%20height%3D%2264%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2213.5546875%22%20y%3D%2236.5%22%3E64x64%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Generic placeholder image">
                                                        </div>
                                                        <div class="media-body">
                                                            
                                                            <p><?php  echo $row['content']; ?></p>
                                                            <small class="text-muted">Posted by <?php echo $row['supplier_name']; ?> on <?php echo $row['cdate']; ?></small>
                                                        </div>
                                                    </div>
                                            </div>
                                      <div class="col-md-6">
                                       
                                        </div>
                                    <?php } ?>
                                        <!-- <hr> -->
                                    <?php } ?>
                            </div>
                        
                            <!-- <hr> -->
                             <form method="POST">
                                            <div class="row">
                                                <div class="col-sm-12 col-lg-12">
                                                       <div class="mb-3">
                                                        <label for="username">Reply *</label>
                                                        <div class="input-group">
                                                          <textarea class="form-control" rows="3" name="content"></textarea>
                                                          
                                                        </div>
                                                    </div>  
                                                </div>
                                            </div>
                                                <!-- </form> -->
                                        <div class="modal-footer">
                                          
                                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                            <input type="submit" class="btn btn-primary" value="Send" name="submitrequest">
                                        </div>
                                        </form>

                                         <?php 
                                                if(isset($_POST['submitrequest']))
                                                {
                                                        $customer_id = $_SESSION['customer_id'];
                                                        $content = $_POST['content'];
                                                        date_default_timezone_set('Asia/Manila');
                                                        $tdate = date("Y-m-d");

                                                        $query = mysqli_query($con, "INSERT INTO `tblrequestcustomer`(`customer_id`, `supplier_id`, `content`, `cdate`, `sendby`) VALUES ('$customer_id', '$supplier_id', '$content', '$tdate', 'Customer')");

                                                        echo "<script>window.location.replace('conversation.php?supplier_id=".$supplier_id."')</script>";
                                                }
                                         ?>
                        </div>
                      </div>
                    </div>
    				
    			</div>

                <div class="modal fade bs-example-modal-md" id="bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-md modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myLargeModalLabel">Reviews</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body">
                                        <form method="POST">
                                            <div class="row">
                                                <div class="col-sm-12 col-lg-12">
                                                       <div class="mb-3">
                                                        <label for="username">Reviews *</label>
                                                        <div class="input-group">
                                                          <textarea class="form-control" rows="6" name="review"></textarea>
                                                          
                                                        </div>
                                                    </div>  
                                                </div>
                                            </div>
                                                <!-- </form> -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                            <input type="submit" class="btn btn-primary" value="Save Changes" name="submitreview">
                                        </div>
                                        </form>
                                        <?php 
                                                if(isset($_POST['submitreview']))
                                                {
                                                        $customer_id = $_SESSION['customer_id'];
                                                        $review = $_POST['review'];
                                                        date_default_timezone_set('Asia/Manila');
                                                        $tdate = date("Y-m-d");

                                                        $query = mysqli_query($con, "INSERT INTO `tblcomments`(`comment_id`, `content`, `customer_id`, `product_id`, `tdate`) VALUES (NULL, '$review', '$customer_id', '$id', '$tdate')");

                                                        echo "<script>window.location.replace('shop-detail.php?id=".$id."&supplier_id=".$supplier_id."')</script>";
                                                }
                                         ?>
                                    </div>
                                </div>
                            </div>
            </div>

              <div class="modal fade bs-example-modal-md" id="bd-example-modal-sm1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-md modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myLargeModalLabel">Request</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body">
                                        <form method="POST">
                                            <div class="row">
                                                <div class="col-sm-12 col-lg-12">
                                                       <div class="mb-3">
                                                        <label for="username">Request *</label>
                                                        <div class="input-group">
                                                          <textarea class="form-control" rows="6" name="content"></textarea>
                                                          
                                                        </div>
                                                    </div>  
                                                </div>
                                            </div>
                                                <!-- </form> -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                            <input type="submit" class="btn btn-primary" value="Send" name="submitrequest">
                                        </div>
                                        </form>
                                       
                                    </div>
                                </div>
                            </div>
            </div>

                

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
   <!--  <footer>
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
    </footer> -->
    <!-- End Footer  -->

    <!-- Start copyright  -->
    <div class="footer-copyright">
        
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
    <script type="text/javascript">
        $(document).ready(function(){
            $('#qty').change(calculate);
            // $('#a2').keyup(calculate);
        });
        function calculate(e)
        {
            $('#totalamt').val($('#qty').val() * $('#price').val());
        }
    </script>
</body>

</html>