<?php
require_once 'test.php';
require 'libs/fpdf.php';

class PDF extends FPDF {
    function Header(){
        $this->Image('logo.png',10,10,20);

        $this->SetFont('Times','BU',25);
        
        //dummy cell to put logo
        //$this->Cell(12,0,'',0,0);
        //is equivalent to:
        $this->Ln(15);
        
        $this->Cell(0,10,'Forged Automobiles',0,1,'C');

        $this->SetFont('Arial','BUI',15);
        $this->Cell(0,10,'Employee List',0,1,'C');
        
        //dummy cell to give line spacing
        //$this->Cell(0,5,'',0,1);
        //is equivalent to:
        $this->Ln(15);
        
        $this->SetFont('Times','B',12);
        
        $this->SetFillColor(180,180,255);
        $this->SetDrawColor(0,0,0);
        $this->Cell(25,10,'ID',1,0,'C',true);
        $this->Cell(30,10,'Name',1,0,'C',true);
        $this->Cell(25,10,'DOB',1,0,'C',true);
        $this->Cell(15,10,'Age',1,0,'C',true);
        $this->Cell(20,10,'Gender',1,0,'C',true);
        $this->Cell(35,10,'Address',1,0,'C',true);
        $this->Cell(25,10,'Phone',1,0,'C',true);
        $this->Cell(40,10,'Email',1,0,'C',true);
        $this->Cell(25,10,'Salary',1,0,'C',true);
        $this->Cell(35,10,'Description',1,1,'C',true);
        
    }
    function Footer(){
        //add table's bottom line
        $this->Cell(190,0,'','T',1,'',true);
        
        //Go to 1.5 cm from bottom
        $this->SetY(-15);
                
        $this->SetFont('Arial','',15);
        
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

$query=mysqli_query($con,"select * from employee");
while($data=mysqli_fetch_array($query)){
        $pdf->Cell(25,10,$data['0'],1,0,'R');
        $pdf->Cell(30,10,$data['1'],1,0);
        $pdf->Cell(25,10,$data['2'],1,0);
        $pdf->Cell(15,10,$data['3'],1,0,'R');
        $pdf->Cell(20,10,$data['4'],1,0);
        $pdf->Cell(35,10,$data['5'],1,0);
        $pdf->Cell(25,10,$data['6'],1,0);
        $pdf->Cell(40,10,$data['7'],1,0);
        $pdf->Cell(25,10,$data['8'],1,0);
        $pdf->Cell(35,10,$data['9'],1,1);
}

mysqli_close($con);
$pdf->Output();

?>