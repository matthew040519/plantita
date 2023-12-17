<header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                    <!-- <a class="navbar-brand" href="index.html"><img src="images/logo.png" class="logo" alt=""></a> -->
                    <h1><a href="customerdashboard.php">Murcia Ornamental Plants</a></h1>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item active"><a class="nav-link" href="customerdashboard.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="requestlist.php">Request List</a></li>
                        <!-- <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li> -->
                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">SHOP</a>
                            <ul class="dropdown-menu">
								<li><a href="customershop.php">Shop</a></li>
                                <li><a href="cart.php">Cart</a></li>
                                <li><a href="customerpending.php">Pending ()</a></li>
                                        <li><a href="customerapprove.php">Approve ()</a></li>
                                        <li><a href="customercancel.php">Cancelled ()</a></li>
                                
								<!-- <li><a href="shop-detail.php">Shop Detail</a></li> -->
                               <!--  <li><a href="cart.php">Cart</a></li>
                                <li><a href="checkout.php">Checkout</a></li>
                                <li><a href="my-account.php">My Account</a></li>
                                <li><a href="wishlist.php">Wishlist</a></li> -->
                            </ul>
                        </li>
                        <!-- <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li> -->
                        <!-- <li class="nav-item"><a class="nav-link" href="contact-us.php">Contact Us</a></li> -->
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        <!-- <li class="search"><a href="#"><i class="fa fa-search"></i></a></li> -->
                        <li class="side-menu">
							<a href="#">
								<i class="fa fa-shopping-bag"></i>
								<span class="badge"><?php 
                                    $customer_id = $_SESSION['customer_id'];
                                    $query = mysqli_query($con, "SELECT COUNT(*) as count FROM `tblmaintransaction` WHERE tblmaintransaction.customer_id = '$customer_id' AND status_id = 0");
                                    $row = mysqli_fetch_array($query);
                                    echo $row['count'];
                                 ?></span>
								<p>My Cart</p>
							</a>
						</li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->
            </div>
            <!-- Start Side Menu -->
            <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <li class="cart-box">
                    <ul class="cart-list">

                    <?php 
                        $sum = 0;
                        $queryProductList = mysqli_query($con, "SELECT * FROM `tblmaintransaction` INNER JOIN tblproducts ON tblproducts.product_id=tblmaintransaction.product_id WHERE tblmaintransaction.customer_id = '$customer_id' AND status_id = 0");
                        while($rowCart= mysqli_fetch_array($queryProductList)){
                        $sum += $rowCart['amount'];
                     ?>
                        <li>
                            <a href="#" class="photo"><img src="supplier/uploaded_image/<?php echo $rowCart['image']; ?>" class="cart-thumb" alt="" /></a>
                            <h6><a href="#"><?php echo $rowCart['product_desc']; ?> </a></h6>
                            <p><?php echo $rowCart['qty']; ?>x - <span class="price">&#8369; <?php echo number_format($rowCart['amount'], 2); ?></span></p>
                        </li>
                        <?php } ?>
                         <li class="total">
                            <a href="#" class="btn btn-default hvr-hover btn-cart">Checkout</a>
                            <span class="float-right"><strong>Total</strong>: &#8369; <?php echo number_format($sum, 2); ?></span>
                        </li>
                    </ul>
                </li>
            </div>
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>