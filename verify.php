
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php 
		include('include/connection.php');
		$reference = $_GET['reference'];
		if($reference == "")
		{
			echo "<script>window.location.replace('register.php')</script>";
		}
		else {

		}
 ?>
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
<body>
	<div class="login">
		<h1 ><a href="index.php">Murcia Flower and Ornamental Plants </a></h1>
		<div class="login-bottom">
			<h2>Verification</h2>
			<form method="POST">
			<div class="col-md-6">
				<div class="login-mail">
					<input type="text" name="reference_id"  placeholder="Reference Code" required="">
					<i class="fa fa-check"></i>
				</div>
				

			
			</div>
			<div class="col-md-6 login-do">
				<label class="hvr-shutter-in-horizontal login-sub">
					<input type="submit" name="verify" value="Verify">
					</label>
					<!-- <p>Do not have an account?</p>
				<a href="register.php" class="hvr-shutter-in-horizontal">Signup</a> -->
			</div>
			
			<div class="clearfix"> </div>
			</form>
		</div>
	</div>
	<?php 
			if(isset($_POST['verify']))
			{
					$reference_id = $_POST['reference_id'];

					if ($reference == $reference_id)
					{
						session_start();
						$selectQuery = mysqli_query($con, "SELECT * FROM tblcustomer WHERE reference_id = $reference");
						$rowCustomer = mysqli_fetch_array($selectQuery);
						$_SESSION['customer_name'] = true;
                        $_SESSION['customer_name'] = $rowCustomer['customer_name'];
                        $custname = $rowCustomer['customer_name'];
                        $contactno = $rowCustomer['contact_no'];



                          // $_SESSION['profile_pic'] = $row['profile_pic'];
                        $_SESSION['customer_id'] = $rowCustomer['customer_id'];

                        $updateQuery = mysqli_query($con, "UPDATE tblcustomer SET verify = 1 WHERE reference_id = $reference");

          //                $apikey = "TR-BACKT729024_UB5HD";
										//     // $apipass = "3&qa)]t({3";
										//     $apipass = "@dz{g)v4wq";
										//     $msg = "HI Mr/Ms ".$custname." Your Code is ". $reference;
										//     $number = $contactno;

										//     function itexmo($number,$message,$apicode,$passwd){
										//       $ch = curl_init();
										//       $itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
										//       curl_setopt($ch, CURLOPT_URL,"https://www.itexmo.com/php_api/api.php");
										//       curl_setopt($ch, CURLOPT_POST, 1);
										//        curl_setopt($ch, CURLOPT_POSTFIELDS, 
										//                 http_build_query($itexmo));
										//       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
										//       return curl_exec ($ch);
										//       curl_close ($ch);
										// }

										//     itexmo($number, $msg, $apikey, $apipass);


                        echo "<script>window.location.replace('index.php')</script>";

					}
					else {
						echo "<script>alert('Invalid Reference code.')</script>";
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

