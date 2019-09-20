<?php  
require('connection.php');
require('fpdf/fpdf.php'); 

         $association=$_POST['mem_association'];
         $Cname=$_POST['mem_company'];
         $name=$_POST['mem_name'];
         $number=$_POST['mem_number'];
       

$pdf = new FPDF('L','pt','A4'); 
//Loading data 

$pdf->AddPage(); 
//  Print the edge of
$pdf->Image("img/main_brai1.jpg", 0, -6,835, 600); 
 
// Print the title of the certificate  
$pdf->SetFont('times','B',15); 
$pdf->Cell(500+400,400,$association,0,0,'C');
$pdf->SetFont('times','B',15);  
$pdf->SetXY(150,200); 
$pdf->Cell(500,318,$Cname,0,0,'C'); 
$pdf->SetFont('times','B',15); 
$pdf->SetXY(150,220); 
$pdf->Cell(500+300,210,$name,0,0,'C'); 
$pdf->SetXY(400,345); 
$pdf->SetFont('times','B',15); 
$pdf->Cell(50,100,$number,0,0,'C'); 
$pdf->Output('pdf/'.$filename.'.pdf','F');
?> 