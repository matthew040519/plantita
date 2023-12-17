
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
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Minimal Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="assets/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="assets/css/style.css" rel='stylesheet' type='text/css' />
<link href="assets/css/font-awesome.css" rel="stylesheet"> 
<script src="assets/js/jquery.min.js"> </script>
<script src="assets/js/bootstrap.min.js"> </script>
 <script type="text/javascript">
   function update(str)
   {
      var xmlhttp;
        // alert(str);
      if (window.XMLHttpRequest)
      {// code for IE7+, Firefox, Chrome, Opera, Safari
        // alert("HTTP request");
        xmlhttp=new XMLHttpRequest();
      }
      else
      {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      } 
      // document.getElementById("data").innerHTML = xmlhttp.responseText;
      xmlhttp.onreadystatechange = function() {
        // alert(xmlhttp.readyState);
        // alert(xmlhttp.status);
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
           // alert("ready"); 
          document.getElementById("data").innerHTML = xmlhttp.responseText;
        }
        else {
            // alert("not ready");
        }
      }

      xmlhttp.open("GET","getFile.php?id="+str);
      xmlhttp.send();

      xmlhttp.onload = () => {
        console.log(xmlhttp.response)
      }
  }
</script>
</head>
<body style="background-image: url('images/back-img/logo3.jpg');">
	<div class="login">
		<?php 

				if(isset($_GET['exist']))
				{
					echo "<script>alert('Number Already Exist!')</script>";
				}

		 ?>
		<h1><a href="index.php" style="color: white;">Murcia Ornamental Plants </a></h1>
		<div class="login-bottom">
			<h2>Register</h2>
			<form method="POST" enctype="multipart/form-data">
			<div class="col-md-6 login-do">
				<div class="login-mail">
					<input type="text" placeholder="Fullname" name="fullname" required="">
					<i class="fa fa-envelope"></i>
				</div>
			</div>
			<div class="col-md-6 login-do">
				<div class="login-mail">
					<input type="text" placeholder="Contact Number" name="contactno" required="">
					<i class="fa fa-mobile"></i>
				</div>
				
			</div>
			
				<div class="col-md-12 login-do">
				<div class="login-mail">
					<input type="text" placeholder="Address" name="address" required="">
					<i class="fa fa-clipboard"></i>
				</div>
			</div>
			<div class="col-md-6 login-do">
				<div class="login-mail">
					<input type="password" placeholder="Password" name="password" required="">
					<i class="fa fa-lock"></i>
				</div>
			</div>
			<div class="col-md-6 login-do">
				<div class="login-mail">
					<input type="password" placeholder="Confirm Password" name="cfpassword" required="">
					<i class="fa fa-lock"></i>
				</div>
			</div>
			
			<div class="col-md-12 login-do">
				<div class="login-mail">
					<!-- <input type="text" placeholder="Address" name="address" required="">
					<i class="fa fa-clipboard"></i> -->
					<p>User Type</p>
					<select onchange="update(this.value)" class="form-control" name="user_type">
						<option value="1">Customer</option>
						<option value="2">Seller</option>
					</select>
				</div>
				<div id="data" class="login-mail">
					<!-- <input type="text" placeholder="Address" name="address" required="">
					<i class="fa fa-clipboard"></i> -->
					
				</div>
			</div>
			<div class="col-md-6 login-do">
				<div class="login-mail">
				<p>New User?</p>

				<label class="hvr-shutter-in-horizontal login-sub">
					<input type="submit" name="submit" value="Sign Up">
					</label>
				</div>
			</div>
			<div class="col-md-6 login-do">
				<div class="login-mail">
					<p>Already register</p>
				<a href="login.php" class="hvr-shutter-in-horizontal">Login</a> 
				</div>
			</div>
			</form>
			<div class="clearfix"> </div>
		</div>
	</div>
	<?php 	

			if(isset($_POST['submit']))
			{
				$fullname = $_POST['fullname'];
				$address = $_POST['address'];
				$contactno = $_POST['contactno'];
				$password = md5($_POST['password']);
				$cfpassword = md5($_POST['cfpassword']);
				$user_type = $_POST['user_type'];
				$filename = $_FILES["file"]["name"];

				// echo $filename;

				if ($cfpassword != $password)
				{
						echo "<script>alert('Password does not match!')</script>";
				}
				else
				{
						$querySelect = mysqli_query($con, "SELECT COUNT(*) as count FROM tblcustomer WHERE contact_no = '$contactno'");
							$rows = mysqli_fetch_array($querySelect);
							$countRow = $rows['count'];
							$checkRow = mysqli_num_rows($querySelect);

							$querySelect1 = mysqli_query($con, "SELECT COUNT(*) as count FROM tblsupplier WHERE contact_no = '$contactno'");
							$rows1 = mysqli_fetch_array($querySelect1);
							$countRow1 = $rows1['count'];
							$checkRow1 = mysqli_num_rows($querySelect1);

							if ($countRow == 0 && $countRow1 == 0)
							{
								// echo "Dadssada";

								if ($user_type == '1')
								{
									$target = "uploaded_files/". basename($_FILES['file']['name']);
			                                                $namefile = $_FILES["file"]["name"];
									
									if (move_uploaded_file($_FILES["file"]["tmp_name"], $target)){
			                                                $query = mysqli_query($con, "INSERT INTO `tblcustomer`(`customer_id`, `customer_name`, `customer_password`, `address`, `contact_no`, `uploaded_file`) VALUES (NULL, '$fullname', '$password', '$address', '$contactno',  '$namefile')");
			                                                } 
			                                                else {
			                                                  echo "<script>alert('Error!')</script>";
			                                                }
								}
								else
								{
									$target = "uploaded_files/". basename($_FILES['file']['name']);
			                                                $namefile = $_FILES["file"]["name"];

			                                                // echo $namefile;
			                                                if (move_uploaded_file($_FILES["file"]["tmp_name"], $target)){
			                                                  $query = mysqli_query($con, "INSERT INTO `tblsupplier`(`supplier_id`, `supplier_name`, `supplier_password`, `supplier_location`, `contact_no`, `uploaded_file`) VALUES (NULL,'$fullname', '$password', '$address', '$contactno', '$namefile')");
			                                                } 
			                                                else {
			                                                  echo "<script>alert('Error!')</script>";
			                                                }
									
								}

								

								$characters = '0123456789';
								    $charactersLength = strlen($characters);
								    $randomString = '';
								    for ($i = 0; $i < 6; $i++) {
								        $randomString .= $characters[rand(0, $charactersLength - 1)];
								    }

												  $apikey = "TR-PLANT179011_TQ4AC";
                $apipass = "n".'$'."b4k}3px6";
								    $msg = $randomString." is your Reference Code.";
								    $number = $contactno;

								    function itexmo($number,$message,$apicode,$passwd){
								      $ch = curl_init();
								      $itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
								      curl_setopt($ch, CURLOPT_URL,"https://www.itexmo.com/php_api/api.php");
								      curl_setopt($ch, CURLOPT_POST, 1);
								       curl_setopt($ch, CURLOPT_POSTFIELDS, 
								                http_build_query($itexmo));
								      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
								      return curl_exec ($ch);
								      curl_close ($ch);
								}

								    itexmo($number, $msg, $apikey, $apipass);

								    if ($user_type == '1')
									 {
									 		 $updatequery = mysqli_query($con, "UPDATE `tblcustomer` SET `reference_id`=$randomString WHERE `contact_no`=$contactno");
									 }
									 else
									 {
									 	 $updatequery = mysqli_query($con, "UPDATE `tblsupplier` SET `reference_id`=$randomString WHERE `contact_no`=$contactno");
									 }
								   

								    echo "<script>window.location.replace('verify.php?reference=$randomString')</script>";
							}
							else
							{
								echo "<script>window.location.replace('register.php?exist')</script>";
							}
				}

				
				
			}

	 ?>
		<!---->
<div class="copy-right">
            <!-- <p> &copy; 2016 Minimal. All Rights Reserved | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>	  -->
               </div>
	  
<!---->
<!--scrolling js-->
	<script src="assets/js/jquery.nicescroll.js"></script>
	<script src="assets/js/scripts.js"></script>
	<!--//scrolling js-->
</body>
</html>

