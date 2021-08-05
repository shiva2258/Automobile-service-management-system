<?php
require('libs/fpdf.php');
require_once 'test.php';
// $con=mysqli_connect('localhost','root','');
// mysqli_select_db($con,'phpfpdftutorial');


class PDF extends FPDF {
	function Header(){
		$this->SetFont('Arial','B',15);
		
		//dummy cell to put logo
		//$this->Cell(12,0,'',0,0);
		//is equivalent to:
		$this->Cell(12);
		
		$this->Cell(100,10,'Forged Automobiles',0,1);
		$this->Cell(80,10,'Invoice',0,1);
		
		//dummy cell to give line spacing
		//$this->Cell(0,5,'',0,1);
		//is equivalent to:
		$this->Ln(5);
		
		$this->SetFont('Arial','B',11);
		
		$this->SetFillColor(180,180,255);
		$this->SetDrawColor(180,180,255);
		$this->Cell(40,5,'Bill No.',1,0,'',true);
		$this->Cell(40,5,'Service ID',1,0,'',true);
		$this->Cell(40,5,'Customer ID',1,0,'',true);
		$this->Cell(25,5,'Bill Amount',1,0,'',true);
		$this->Cell(40,5,'Bill Type',1,0,'',true);
		// $this->Cell(40,5,'Customer ID',1,0,'',true);
		$this->Cell(40,5,'Payment Status',1,0,'',true);
		$this->Cell(40,5,'Payment Date',1,1,'',true);
		
	}
	function Footer(){
		//add table's bottom line
		$this->Cell(190,0,'','T',1,'',true);
		
		//Go to 1.5 cm from bottom
		$this->SetY(-15);
				
		$this->SetFont('Arial','',8);
		
		//width = 0 means the cell is extended up to the right margin
		$this->Cell(0,10,'Page '.$this->PageNo()." / {pages}",0,0,'C');
	}
}


//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

$pdf = new PDF('P','mm','A4'); //use new class

//define new alias for total page numbers
$pdf->AliasNbPages('{pages}');

$pdf->SetAutoPageBreak(true,15);
$pdf->AddPage();

$pdf->SetFont('Arial','',9);
$pdf->SetDrawColor(180,180,255);

$query=mysqli_query($con,"select * from bill where bill_no=(select bill_no from bill where cust_id='$id';");
while($data=mysqli_fetch_array($query)){
	$this->Cell(40,5,'Bill No.',1,0,'',true);
		$pdf->Cell(40,5,'Service ID',1,0,'',true);
		$pdf->Cell(40,5,'Customer ID',1,0,'',true);
		$pdf->Cell(25,5,'Bill Amount',1,0,'',true);
		$pdf->Cell(40,5,'Bill Type',1,0,'',true);
		/pdfhis->Cell(40,5,'Customer ID',1,0,'',true);
		$pdf->Cell(40,5,'Payment Status',1,0,'',true);
		$pdf->Cell(40,5,'Payment Date',1,1,'',true);
	
	if($pdf->GetStringWidth($data['email']) > 65){
		$pdf->SetFont('Arial','',7);
		$pdf->Cell(65,5,$data['email'],'LR',0);
		$pdf->SetFont('Arial','',9);
	}else{
		$pdf->Cell(65,5,$data['email'],'LR',0);
	}
	$pdf->Cell(60,5,$data['address'],'LR',1);
}














$pdf->Output();
?>
