<?php 
	
	session_start();
	include('include/connection.php');


	if(isset($_POST["town_id"]))  
 	{
 		$town_id = $_POST['town_id'];
 		$customer_id = $_SESSION['customer_id'];

 		$sum = 0;
 		$query = mysqli_query($con, "SELECT * FROM `tblmaintransaction` INNER JOIN tblproducts ON tblproducts.product_id=tblmaintransaction.product_id INNER JOIN tblsupplier ON tblsupplier.supplier_id=tblproducts.supplier_id WHERE tblmaintransaction.customer_id = '$customer_id' AND shippingrate_id = 0 and status_id = 0 GROUP BY tblproducts.supplier_id");
        while($row = mysqli_fetch_array($query)){ 

        	$supplier_id = $row['supplier_id'];

			$query1 = mysqli_query($con, "SELECT * FROM `tblshippingrate` WHERE town_id = '$town_id' AND supplier_id = '$supplier_id'");
			while($row1 = mysqli_fetch_array($query1)){
				$sum += $row1['shippingrate'];
			}

		}

		echo number_format($sum, 2);
	}

 ?>