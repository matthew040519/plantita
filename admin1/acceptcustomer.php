<?php 

include('../include/connection.php');
	
$id = $_GET['id'];
$customer = $_GET['customer'];
$contactno = $_GET['number'];

	$query = mysqli_query($con, "UPDATE `tblcustomer` SET `active`= 1 WHERE customer_id = '$id'");

	 $apikey = "TR-PLANT179011_TQ4AC";
                $apipass = "n".'$'."b4k}3px6";
								    $msg = $customer." your registration approval is Approve";
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

	echo "<script>window.location.replace('pendingcustomerlist.php')</script>";
 ?>