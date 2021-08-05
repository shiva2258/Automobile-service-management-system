<?php
require_once 'test.php';
require 'libs/fpdf.php';

//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

$cid = $_POST['cust_id'];
$sql = "UPDATE bill B SET bill_amt=1.1*(SELECT serv_charge FROM services S, customer C WHERE B.serv_id=S.serv_id AND B.cust_id=C.cust_id),
bill_stat='PAID', bill_date=curdate() WHERE bill_no = (select bill_no from bill where cust_id='$cid');";
if ($con->query($sql) == true){
    // echo "Successfully paid your bill";
}
else {
    echo "ERROR: $sql <br> $con->error";
}

// $pdf = new PDF('P','mm','A4'); //use new class
$pdf = new FPDF(); //use new class

//define new alias for total page numbers
$pdf->AliasNbPages('{pages}');

$pdf->SetAutoPageBreak(true,15);
$pdf->AddPage();

$pdf->Image('logo.png',10,10,20);

$pdf->SetFont('Times','BU',25);
 
$pdf->Ln(20);
$pdf->Cell(0,10,'Forged Automobiles',0,1,'C');

$pdf->SetFont('Arial','BUI',14);
$pdf->Cell(0,10,'Payment Invoice',0,1,'C');

$pdf->Ln(15);

$pdf->SetFont('Times','B',12);
$pdf->SetDrawColor(0,0,0);

$query=mysqli_query($con,"select * from bill where cust_id = '$cid'");
while($data=mysqli_fetch_array($query)){
    $pdf->Cell(50);
    $pdf->Cell(50,12,"Bill No.",1,0);
    $pdf->Cell(50,12,$data['1'],1,1);
    
    $pdf->Cell(50);
    $pdf->Cell(50,12,"Service ID",1,0);
    $pdf->Cell(50,12,$data['2'],1,1);
    
    $pdf->Cell(50);
    $pdf->Cell(50,12,"Customer ID",1,0);
    $pdf->Cell(50,12,$data['3'],1,1);
    
    $pdf->Cell(50);
    $pdf->Cell(50,12,"Amount",1,0);
    $pdf->Cell(50,12,$data['4'],1,1);
    
    $pdf->Cell(50);
    $pdf->Cell(50,12,"Bill Type",1,0);
    $pdf->Cell(50,12,$data['5'],1,1);
    
    $pdf->Cell(50);
    $pdf->Cell(50,12,"Payment Status",1,0);
    $pdf->Cell(50,12,$data['6'],1,1);
    
    $pdf->Cell(50);
    $pdf->Cell(50,12,"Payment Date",1,0);
    $pdf->Cell(50,12,$data['7'],1,1);

    $pdf->Ln(20);
}
$pdf->Output('bill'.$cid, 'I');
mysqli_close($con);

?>