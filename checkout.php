<?php 
session_start();
  if (!isset($_SESSION['customer_name'])) {
    header("location: index.php");
  }
  $customer_id = $_SESSION['customer_id'];
  // echo $customer_id;
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
                    <h2>Checkout</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <!-- <div class="row new-account-login">
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="title-left">
                        <h3>Account Login</h3>
                    </div>
                    <h5><a data-toggle="collapse" href="#formLogin" role="button" aria-expanded="false">Click here to Login</a></h5>
                    <form class="mt-3 collapse review-form-box" id="formLogin">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="InputEmail" class="mb-0">Email Address</label>
                                <input type="email" class="form-control" id="InputEmail" placeholder="Enter Email"> </div>
                            <div class="form-group col-md-6">
                                <label for="InputPassword" class="mb-0">Password</label>
                                <input type="password" class="form-control" id="InputPassword" placeholder="Password"> </div>
                        </div>
                        <button type="submit" class="btn hvr-hover">Login</button>
                    </form>
                </div>
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="title-left">
                        <h3>Create New Account</h3>
                    </div>
                    <h5><a data-toggle="collapse" href="#formRegister" role="button" aria-expanded="false">Click here to Register</a></h5>
                    <form class="mt-3 collapse review-form-box" id="formRegister">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="InputName" class="mb-0">First Name</label>
                                <input type="text" class="form-control" id="InputName" placeholder="First Name"> </div>
                            <div class="form-group col-md-6">
                                <label for="InputLastname" class="mb-0">Last Name</label>
                                <input type="text" class="form-control" id="InputLastname" placeholder="Last Name"> </div>
                            <div class="form-group col-md-6">
                                <label for="InputEmail1" class="mb-0">Email Address</label>
                                <input type="email" class="form-control" id="InputEmail1" placeholder="Enter Email"> </div>
                            <div class="form-group col-md-6">
                                <label for="InputPassword1" class="mb-0">Password</label>
                                <input type="password" class="form-control" id="InputPassword1" placeholder="Password"> </div>
                        </div>
                        <button type="submit" class="btn hvr-hover">Register</button>
                    </form>
                </div>
            </div> -->
            <form method="POST">
                <div class="row">
                    <div class="col-sm-6 col-lg-6 mb-3">
                        <div class="checkout-address">
                            <div class="title-left">
                                <h3>Billing address</h3>
                            </div>
                            <?php 
                                    $query = mysqli_query($con, "SELECT * FROM `tblcustomer` WHERE customer_id = $customer_id");
                                    while($row = mysqli_fetch_array($query)){
                             ?>
                            <!-- <form class="needs-validation" novalidate method="POST"> -->
                                <!-- <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="firstName">First name *</label>
                                        <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                                        <div class="invalid-feedback"> Valid first name is required. </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="lastName">Last name *</label>
                                        <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                                        <div class="invalid-feedback"> Valid last name is required. </div>
                                    </div>
                                </div> -->
                                <div class="mb-3">
                                    <label for="username">Fullname *</label>
                                    <div class="input-group">
                                        <input type="text" readonly="" value="<?php echo $row['customer_name']; ?>" name="fullname" class="form-control" id="username" placeholder="" required>
                                        <div class="invalid-feedback" style="width: 100%;"> Your username is required. </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="email">Contact Number *</label>
                                    <input type="text" readonly="" name="contact_number" value="<?php echo $row['contact_no']; ?>" class="form-control" id="email" placeholder="">
                                    <div class="invalid-feedback"> Please enter a valid email address for shipping updates. </div>
                                </div>
                                <div class="mb-3">
                                    <label for="email">Email Address *</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="">
                                    <div class="invalid-feedback"> Please enter a valid email address for shipping updates. </div>
                                </div>
                                <div class="mb-3">
                                    <label for="address">Address *</label>
                                    <input type="text" class="form-control" readonly="" value="<?php echo $row['address']; ?>" name="address1" id="address" placeholder="" required>
                                    <div class="invalid-feedback"> Please enter your shipping address. </div>
                                </div>
                                <div class="mb-3">
                                    <label for="address2">Address 2 *</label>
                                    <input type="text" class="form-control" name="address2" id="address2" placeholder=""> </div>
                                <?php } ?>
                                <div class="mb-3">
                                    <label for="address2">Town *</label>
                                    <select class="form-control" id="town" name="town">
                          <option disabled="" selected="">Choose Town..</option>
                          <?php 
                              $query = mysqli_query($con, "SELECT * FROM tbltown");
                              while($row = mysqli_fetch_array($query)){
                           ?>
                           <option style="color: black;" value="<?php echo $row['town_id']; ?>"><?php echo $row['town_desc']; ?></option>
                          <?php } ?>
                        </select>
                                     </div>
                               <!--  <div class="row">
                                    <div class="col-md-5 mb-3">
                                        <label for="country">Country *</label>
                                        <select class="wide w-100" id="country">
    									<option value="Choose..." data-display="Select">Choose...</option>
    									<option value="United States">United States</option>
    								</select>
                                        <div class="invalid-feedback"> Please select a valid country. </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="state">State *</label>
                                        <select class="wide w-100" id="state">
    									<option data-display="Select">Choose...</option>
    									<option>California</option>
    								</select>
                                        <div class="invalid-feedback"> Please provide a valid state. </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="zip">Zip *</label>
                                        <input type="text" class="form-control" id="zip" placeholder="" required>
                                        <div class="invalid-feedback"> Zip code required. </div>
                                    </div>
                                </div> -->
                                <!-- <hr class="mb-4">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="same-address">
                                    <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="save-info">
                                    <label class="custom-control-label" for="save-info">Save this information for next time</label>
                                </div> -->
                                <!-- <hr class="mb-4"> -->
                                <!-- <div class="title"> <span>Payment</span> </div>
                                <div class="d-block my-3">
                                    <div class="custom-control custom-radio">
                                        <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                                        <label class="custom-control-label" for="credit">Credit card</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                                        <label class="custom-control-label" for="debit">Debit card</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
                                        <label class="custom-control-label" for="paypal">Paypal</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="cc-name">Name on card</label>
                                        <input type="text" class="form-control" id="cc-name" placeholder="" required> <small class="text-muted">Full name as displayed on card</small>
                                        <div class="invalid-feedback"> Name on card is required </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="cc-number">Credit card number</label>
                                        <input type="text" class="form-control" id="cc-number" placeholder="" required>
                                        <div class="invalid-feedback"> Credit card number is required </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for="cc-expiration">Expiration</label>
                                        <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                                        <div class="invalid-feedback"> Expiration date required </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="cc-expiration">CVV</label>
                                        <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                                        <div class="invalid-feedback"> Security code required </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="payment-icon">
                                            <ul>
                                                <li><img class="img-fluid" src="images/payment-icon/1.png" alt=""></li>
                                                <li><img class="img-fluid" src="images/payment-icon/2.png" alt=""></li>
                                                <li><img class="img-fluid" src="images/payment-icon/3.png" alt=""></li>
                                                <li><img class="img-fluid" src="images/payment-icon/5.png" alt=""></li>
                                                <li><img class="img-fluid" src="images/payment-icon/7.png" alt=""></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- <input type="submit" value="test" name=""> -->
                                <hr class="mb-1"> 
                            <!-- </form> -->
                        </div>
                       
                    </div>
                    <div class="col-sm-6 col-lg-6 mb-3">
                        <div class="row">
                             <div class="col-md-12">
                                <div class="odr-box">
                                    <div class="title-left">
                                        <h3>Shopping cart</h3>
                                    </div>
                                    <div class="rounded p-2 bg-light">
                                        <?php 
                                            $sum = 0;
                                            $query = mysqli_query($con, "SELECT * FROM `tblmaintransaction` INNER JOIN tblproducts ON tblproducts.product_id=tblmaintransaction.product_id WHERE tblmaintransaction.customer_id = '$customer_id' and tblmaintransaction.status_id = 0");
                                            while ($row = mysqli_fetch_array($query)){
                                            $sum += $row['amount'];
                                         ?>
                                        <div class="media mb-2 border-bottom">
                                            <div class="media-body"> <img style="height: 50px; width: 80px;" src="supplier/uploaded_image/<?php echo $row['image']; ?>"> <a href="#"> <?php echo $row['product_desc']; ?></a>
                                                <div class="small text-muted">Price: &#8369; <?php echo number_format($row['price'], 2); ?> <span class="mx-2">|</span> Qty: <?php echo $row['qty']; ?> <span class="mx-2">|</span> Subtotal: &#8369; <?php echo number_format($row['amount'], 2); ?></div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <div class="shipping-method-box">
                                    <div class="title-left">
                                        <h3>Shipping Method</h3>
                                    </div>
                                     <?php 
                                                    $query = mysqli_query($con, "SELECT * FROM `tblmaintransaction` INNER JOIN tblproducts ON tblproducts.product_id=tblmaintransaction.product_id INNER JOIN tblsupplier ON tblsupplier.supplier_id=tblproducts.supplier_id WHERE tblmaintransaction.customer_id = '$customer_id' GROUP BY tblproducts.supplier_id");
                                                    while($row = mysqli_fetch_array($query)){
                                                        $supplier_id = $row['supplier_id'];
                                             ?>
                                    <div class="mb-3">
                                        <!-- <div class="row">
                                            <div class="col-md-6">
                                                <label for="email">Town *</label>
                                                <select class="form-control" name="town" id="town<?php echo $supplier_id; ?>"> 
                                                    <option disabled="" selected="">Choose Town..</option>
                                                   <?php 
                                                        $query1 = mysqli_query($con, "SELECT * FROM `tblshippingrate` WHERE supplier_id = '$supplier_id'");
                                                        while($row1 = mysqli_fetch_array($query1)){
                                                    ?>
                                                     <option value="<?php echo $row1['shippingrate_id'] ?>"><?php echo $row1['town'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                               <label for="email">Rate *</label>
                                                <input type="text" class="form-control" readonly="" id="rate<?php echo $supplier_id; ?>" name="rate">
                                            </div>
                                        </div> -->
                                        
                                        
                                        <!-- <div class="custom-control custom-radio">
                                            <input id="shippingOption1" name="shipping-option" class="custom-control-input" checked="checked" type="radio">
                                            <label class="custom-control-label" for="shippingOption1">Standard Delivery</label> <span class="float-right font-weight-bold">FREE</span> </div>
                                        <div class="ml-4 mb-2 small">(3-7 business days)</div>
                                        <div class="custom-control custom-radio">
                                            <input id="shippingOption2" name="shipping-option" class="custom-control-input" type="radio">
                                            <label class="custom-control-label" for="shippingOption2">Express Delivery</label> <span class="float-right font-weight-bold">$10.00</span> </div>
                                        <div class="ml-4 mb-2 small">(2-4 business days)</div>
                                        <div class="custom-control custom-radio">
                                            <input id="shippingOption3" name="shipping-option" class="custom-control-input" type="radio">
                                            <label class="custom-control-label" for="shippingOption3">Next Business day</label> <span class="float-right font-weight-bold">$20.00</span> </div> -->
                                    </div>
                                <?php } ?>
                                </div>
                            </div>
                            
                            <div class="col-md-12 col-lg-12">
                                <div class="order-box">
                                    <div class="title-left">
                                        <h3>Your order</h3>
                                    </div>
                                    <div class="d-flex">
                                        <div class="font-weight-bold">Product</div>
                                        <div class="ml-auto font-weight-bold">Total</div>
                                    </div>
                                    <hr class="my-1">
                                    <div class="d-flex">
                                        <h4>Sub Total</h4>
                                        <div class="ml-auto font-weight-bold"> &#8369; <?php echo number_format($sum, 2); ?> </div>
                                    </div>
                                    <!-- <div class="d-flex">
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
                                    </div> -->
                                    <div class="d-flex">
                                        <h4>Shipping Cost</h4>
                                        <div class="ml-auto font-weight-bold" id="rate"></div>
                                        <input type="text" style="display: none;" id="rate1" name="">
                                        <input type="text" style="display: none;" id="total" value="<?php echo $sum; ?>" name="">
                                        <input type="text" style="display: none;" id="rate2" name="">
                                    </div>
                                    <hr>
                                    <div class="d-flex gr-total">
                                        <h5>Grand Total</h5>
                                        <div class="ml-auto h5" id="grandTotal">  </div>
                                    </div>
                                    <hr> </div>
                            </div>
                            <!-- <div class="col-12 d-flex shopping-box"> <a href="checkout.html" class="ml-auto btn hvr-hover">Place Order</a> </div> -->
                            <div class="col-12 d-flex shopping-box"> 
                                <input type="submit" class="ml-auto btn hvr-hover" value="Checkout" style="color: white;" name="checkout">
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <?php 

            if (isset($_POST['checkout']))
            {
                $fullname = $_POST['fullname'];
                $contact_number = $_POST['contact_number'];
                $email = $_POST['email'];
                $address1 = $_POST['address1'];
                $address2 = $_POST['address2'];
                $town = $_POST['town'];

                 $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                 $charactersLength = strlen($characters);
                 $randomString = '';
                 for ($i = 0; $i < 12; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                 }

                $query = mysqli_query($con, "INSERT INTO `tbltransactiondetails`(`transdetails_id`, `reference_id`, `email`, `address1`, `address2`, `town_id`) VALUES (NULL, '$randomString', '$email', '$address1', '$address2', '$town')");

                $query12 = mysqli_query($con, "SELECT * FROM `tblmaintransaction` INNER JOIN tblproducts ON tblproducts.product_id=tblmaintransaction.product_id INNER JOIN tblsupplier ON tblsupplier.supplier_id=tblproducts.supplier_id WHERE tblmaintransaction.customer_id = '$customer_id'");
                    while($row12 = mysqli_fetch_array($query12)){ 

                        $supplier_id = $row12['supplier_id'];
                        $transaction_id = $row12['transaction_id'];

                        $query1 = mysqli_query($con, "SELECT * FROM `tblshippingrate` WHERE town_id = '$town' AND supplier_id = '$supplier_id'");
                        while($row1 = mysqli_fetch_array($query1)){
                            $shippingID = $row1['shippingrate_id'];
                            echo $shippingID;
                            $updateRate = mysqli_query($con, "UPDATE `tblmaintransaction` SET shippingrate_id = '$shippingID' WHERE  customer_id = '$customer_id' and status_id = 0 and transaction_id = '$transaction_id'");
                        }

                    }

                $updateQuery = mysqli_query($con, "UPDATE `tblmaintransaction` SET `reference_id`='$randomString',`status_id`= 1 WHERE  customer_id = '$customer_id' and status_id = 0");

               echo "<script>window.location.replace('customerdashboard.php')</script>";
            }

     ?>
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
         <script type="text/javascript">
        $("#town").change(function() {
            // alert('dasdas');
            var town_id = $(this).val();
            // alert(package_id);
            $.ajax({  
                url:"getShippingFee.php",  
                method:"POST",  
                data:{town_id:town_id},  
                success:function(data){  
                            // alert(data);
                     $('#rate').empty();
                     $('#rate').append(data);
                     $('#rate1').val(data);
                     $('#grandTotal').empty();
                     parseFloat($('#rate2').val(parseFloat($('#rate1').val()) + parseFloat($('#total').val()))).toFixed(2);
                     $('#grandTotal').append('&#8369; ' + $('#rate2').val());
                     // alert($('#rate').val());
                }  
           });  
      
        });
    </script>
</body>

</html>