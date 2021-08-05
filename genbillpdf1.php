<?php
require_once 'test.php';
require 'libs/fpdf.php';

$sdt = $_POST['start_date'];
$edt = $_POST['end_date'];

class PDF extends FPDF {
    function Header(){
        $this->Image('logo.png',10,10,20);

        $this->SetFont('Times','BU',25);
        
        $this->Ln(15);
        //dummy cell to put logo
        //$this->Cell(12,0,'',0,0);
        //is equivalent to:
        // $this->Cell(105);
        
        $this->Cell(0,10,'Forged Automobiles',0,1,'C');

        $this->SetFont('Arial','BUI',14);
        $this->Cell(0,10,'Invoice Report',0,1,'C');
        
        //dummy cell to give line spacing
        //$this->Cell(0,5,'',0,1);
        //is equivalent to:
        $this->Ln(15);
        
        $this->SetFont('Times','B',12);
        
        $this->SetFillColor(180,180,255);
        $this->SetDrawColor(0,0,0);
        $this->Cell(40,10,'Bill No.',1,0,'C',true);
        $this->Cell(40,10,'Service ID',1,0,'C',true);
        $this->Cell(40,10,'Customer ID',1,0,'C',true);
        $this->Cell(40,10,'Bill Amount',1,0,'C',true);
        $this->Cell(40,10,'Bill Type',1,0,'C',true);
        $this->Cell(40,10,'Payment Status',1,0,'C',true);
        $this->Cell(40,10,'Payment Date',1,1,'C',true);
        
    }
    function Footer(){
        //add table's bottom line
        $this->Cell(190,0,'','T',1,'',true);
        
        //Go to 1.5 cm from bottom
        $this->SetY(-15);
                
        $this->SetFont('Arial','',12);
        
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
$pdf->AddPage('L');

$pdf->SetFont('Arial','',10);
$pdf->SetDrawColor(0,0,0);
// $sum=0;
$query=mysqli_query($con,"select * from bill where bill_date between '$sdt' and '$edt'");
while($data=mysqli_fetch_array($query)){
        $pdf->Cell(40,10,$data['1'],1,0,'R');
        $pdf->Cell(40,10,$data['2'],1,0,'R');
        $pdf->Cell(40,10,$data['3'],1,0,'R');
        $pdf->Cell(40,10,$data['4'],1,0);
        $pdf->Cell(40,10,$data['5'],1,0);
        $pdf->Cell(40,10,$data['6'],1,0);
        $pdf->Cell(40,10,$data['7'],1,1);
        // (int)$sum = (int)$sum + (int)$data[3];
}

// $pdf->Ln(15);
// $sumf = strval($sum);
// $pdf->Cell(40,10,"Revenue: {$sumf}",1,1,'C');

mysqli_close($con);
$pdf->Output();

?>