
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php include('include/connection.php'); ?>
<!DOCTYPE HTML>
<html>
<head>
<title>MFAOSYS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<meta name="keywords" content="Minimal Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="assets/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="assets/css/style.css" rel='stylesheet' type='text/css' />
<link href="assets/css/font-awesome.css" rel="stylesheet"> 
<script src="assets/js/jquery.min.js"> </script>
<script src="assets/js/bootstrap.min.js"> </script>
</head>
<body style="background-image: url('images/back-img/logo3.jpg');">
	<div class="login" >
		<h1 ><a href="index.php" style="color: white;">Murcia Ornamental Plants </a></h1>
		<div class="login-bottom">
			<h2>Login</h2>
			<form method="POST">
			<div class="col-md-6">
				<div class="login-mail">
					<input type="text" name="username" placeholder="Username" required="">
					<i class="fa fa-envelope"></i>
				</div>
				<div class="login-mail">
					<input type="password" name="password" placeholder="Password" required="">
					<i class="fa fa-lock"></i>
				</div>
				<!--    <a class="news-letter " href="#">
						 <label class="checkbox1"><input type="checkbox" name="checkbox" ><i> </i>Forget Password</label>
					   </a> -->

			
			</div>
			<div class="col-md-6 login-do">
				<label class="hvr-shutter-in-horizontal login-sub">
					<input type="submit" name="submit" value="login">
					</label>
					<p>Do not have an account?</p>
					<!-- <input type="submit" class="hvr-shutter-in-horizontal" value="login"> -->
				<a href="register.php" class="hvr-shutter-in-horizontal">Signup</a>
			</div>
			
			<div class="clearfix"> </div>
			</form>
		</div>
	</div>
	<?php 

		
        session_start();
        if (isset($_POST['submit']))
        {
          $username = $_POST['username'];
          $password = md5($_POST['password']);

          $query = mysqli_query($con, "SELECT * FROM tblcustomer WHERE customer_name = '$username' AND customer_password = '$password' and verify = 1 and active = 1");
          $result = mysqli_fetch_array($query);
          $rows = mysqli_num_rows($query);

          $queryadmin = mysqli_query($con, "SELECT * FROM tbluser WHERE username = '$username' AND password = '$password'");
          $row1 = mysqli_fetch_array($queryadmin);
          $admirow = mysqli_num_rows($queryadmin);

          $querysupplier = mysqli_query($con, "SELECT * FROM tblsupplier WHERE supplier_name = '$username' AND supplier_password = '$password' AND active = 1");
          $row2 = mysqli_fetch_array($querysupplier);
          $supplierRow = mysqli_num_rows($querysupplier);

          $querydelivery = mysqli_query($con, "SELECT * FROM tbldeliveryman WHERE deliveryman_name = '$username' AND password = '$password' AND active = 1");
          $row3 = mysqli_fetch_array($querydelivery);
          $deliveryRow = mysqli_num_rows($querydelivery);



          if ($rows > 0) {
          	$customer_id = $result['customer_id'];
          	$queryCountTransaction = mysqli_query($con, "SELECT tbldeliverytransaction.reference_id FROM tblmaintransaction INNER JOIN tbldeliverytransaction ON tbldeliverytransaction.reference_id=tblmaintransaction.reference_id WHERE customer_id = '$customer_id' AND tbldeliverytransaction.return_id = 2 GROUP BY tbldeliverytransaction.reference_id");
          	$countRows = mysqli_num_rows($queryCountTransaction);

          	if ($countRows < 3)
          	{
          			$_SESSION['customer_name'] = true;
                        $_SESSION['customer_name'] = $result['customer_name'];
                        $_SESSION['customer_id'] = $result['customer_id'];
            			header("location: customerdashboard.php");
          	}
          }
          else if ($admirow > 0)
          {
            $_SESSION['username'] = true;
            $_SESSION['username'] = $row1['username'];
            $_SESSION['id'] = $row1['user_id'];
            header("location: admin1/index.php");
          }
          else if ($supplierRow > 0)
          {
            $_SESSION['supplier_name'] = true;
            $_SESSION['supplier_name'] = $row2['supplier_name'];
            $_SESSION['id'] = $row2['supplier_id'];
            header("location: supplier1/index.php");
          }
          else if ($deliveryRow > 0)
          {
            $_SESSION['deliveryman_name'] = true;
            $_SESSION['deliveryman_name'] = $row3['deliveryman_name'];
            $_SESSION['id'] = $row3['deliveryman_id'];
            $_SESSION['supplier_id'] = $row3['supplier_id'];
            header("location: deliveryman/index.php");
          }
          else {
            echo "<script>alert('wrong username or password')</script>";
          }

        }

	 ?>
		<!---->
<div class="copy-right">
            <!-- <p> &copy; 2016 Minimal. All Rights Reserved | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>	     -->
        </div>  
<!---->
<!--scrolling js-->
	<script src="assets/js/jquery.nicescroll.js"></script>
	<script src="assets/js/scripts.js"></script>
	<!--//scrolling js-->
</body>
</html>

