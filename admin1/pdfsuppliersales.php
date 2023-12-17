<?php 
	
	include('../include/connection.php');
	include('../libs/fpdf.php');
	$id = $_GET['id'];

	echo $id;

	class PDF extends FPDF
	{
		function header()
		{
			// $this->Image('../images/back-img/logo2.jpg',65,5,10,'C');

    		$this->SetFont('Arial','B',13);
    		$this->Cell(80);
    		$this->Cell(8,1,'Murcia Ornamental Plants',0,0,'C');
    		// $this->Cell(80);
    		// $this->Cell(20,1,'Student Payment History',1,0,'L');
    		$this->Text(70,23,'Supplier Sales Report');
    		$this->Ln(20);
		}
		function footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I',8);
			$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
		}
	}

	$headerText = array('tdate'=>'Date', 'supplier_name'=>'Supplier', 'customer_name'=>'Customer', 'reference'=>'Reference', 'amount'=>'Amount', 'shippingrate'=>'Shipping Fee', 'totalAmt'=>'Net Sales');

	$query = mysqli_query($con, "SELECT tdate, supplier_name, customer_name, reference, amount,  shippingrate, totalAmt FROM `suppliersales`");

	$header = mysqli_query($con, "SHOW columns FROM suppliersales");

	$pdf = new PDF();
	$pdf->AddPage();

	$pdf->AliasNbPages();
	$pdf->SetFont('Arial','',9);
	foreach($header as $heading) {
	$pdf->Cell(27,9,$headerText[$heading['Field']],1);
	}
	foreach($query as $row) {
		$pdf->Ln();
		foreach($row as $column)
		$pdf->Cell(27,9,$column,1);
	}
	$pdf->Output();

 ?>