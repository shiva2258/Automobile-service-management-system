<?php
require_once 'test.php';
require 'libs/fpdf.php';

class PDF extends FPDF {
    function Header(){

        $this->Image('logo.png',10,10,20);

        $this->SetFont('Times','BU',25);
        $this->Ln(15);
        //dummy cell to put logo
        //$this->Cell(12,0,'',0,0);
        //is equivalent to:
        // $this->Cell(63);
        
        $this->Cell(0,10,'Forged Automobiles',0,1,'C');

        $this->SetFont('Arial','BUI',14);
        $this->Cell(0,10,'Automobiles Report',0,1,'C');
        
        //dummy cell to give line spacing
        //$this->Cell(0,5,'',0,1);
        //is equivalent to:
        $this->Ln(15);
        
        $this->SetFont('Times','B',12);
        
        $this->SetFillColor(180,180,255);
        $this->SetDrawColor(0,0,0);
        $this->Cell(35,10,'Automobile ID',1,0,'C',true);
        $this->Cell(30,10,'Service ID',1,0,'C',true);
        $this->Cell(35,10,'Customer ID',1,0,'C',true);
        $this->Cell(40,10,'Automobile Type',1,0,'C',true);
        $this->Cell(50,10,'Automobile Description',1,1,'C',true);
        
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
$pdf->AddPage();

$pdf->SetFont('Arial','',10);
$pdf->SetDrawColor(0,0,0);

$query=mysqli_query($con,"select * from automobile");
while($data=mysqli_fetch_array($query)){
        $pdf->Cell(35,10,$data['0'],1,0,'R');
        $pdf->Cell(30,10,$data['1'],1,0,'R');
        $pdf->Cell(35,10,$data['2'],1,0,'R');
        $pdf->Cell(40,10,$data['3'],1,0);
        $pdf->Cell(50,10,$data['4'],1,1);
}

mysqli_close($con);
$pdf->Output();

?>