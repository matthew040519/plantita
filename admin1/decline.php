<?php 

include('../include/connection.php');
	
$id = $_GET['id'];
$supplier = $_GET['supplier'];
$contactno = $_GET['number'];


	$query = mysqli_query($con, "UPDATE `tblsupplier` SET `active`= 3 WHERE supplier_id = '$id'");

	 $apikey = "TR-MFAOP999791_4E2F7";
                $apipass = "[!h4stk{y1";
								    $msg = $supplier." your registration approval is Decline";
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

	echo "<script>window.location.replace('pendingsupplierlist.php')</script>";
 ?>