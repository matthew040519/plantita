<?php 
	
	include('include/connection.php');

	$id = $_GET['id'];

	$query = mysqli_query($con, "DELETE FROM `tblmaintransaction` WHERE transaction_id = '$id'");

	echo "<script>window.location.replace('cart.php')</script>";

 ?>