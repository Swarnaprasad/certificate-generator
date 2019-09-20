<html lang="en">
    <head>
      <title>Welcome Admin</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <link rel="stylesheet" href="css/style.css">
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/script.js"></script>
    </head>
    <body>
          <?php include('header.php'); ?>
        
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                   <a style="text-decoration:none;" href="new.php"> <button class="mybtn" id="formButton" >New Certificate</button></a>
                    <a style="text-decoration:none;" href="view.php"><button class="mybtn" id="formButton">Edit Certificate</button></a>
                </div>
                
                <div class="col-md-8" id="form_location">
                   <h5 class="form_hd">Please Enter Below Details To Edit Certificate: </h5>

                    <?php
                    
                        require_once("connection.php");
                        
                        if (isset($_GET['edit']))
                        {
                            $id = $_GET['edit'];
                            
                            $result = mysqli_query($con,"SELECT mem_company,mem_name,mem_date,mem_number,mem_mail,mem_filename FROM newcertificate1 WHERE mem_id = '$id'");
                        }
                         while (@$row = mysqli_fetch_array($result))
                        {
                                echo "<tr>
                                        <form action=edit.php?update=$id method=POST>";
                               
                                echo "<td><span class=myspan>COMPANY NAME&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><input type=text class=myfield name=mem_company1 value='".$row['mem_company']."'></td><br>";
                                echo "<td><span class=myspan>MEMBER NAME&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><input class=myfield type=text name=mem_name1 value='".$row['mem_name']."'></td><br>";
                                echo "<td><span class=myspan>MEMBERSHIP DATE</span><input type=date class=myfield_date name=mem_date1 value='".$row['mem_date']."'></td><br>";
                                echo "<td><span class=myspan>MEMBERSHIP NUM&nbsp;</span><input type=text name=mem_number1 class=myfield value='".$row['mem_number']."'></td><br>";
                                echo "<td><span class=myspan>MEMBER EMAIL-ID&nbsp;&nbsp;</span><input type=email name=mem_mail1 class=myfield value='".$row['mem_mail']."'><input type=hidden name=mem_filename1 class=myfield value='".$row['mem_filename']."'></td><br><br>";
                                echo "<td><input class=myfieldbtn1 name=update type=submit>";
                                echo "</form>
                                
                                </tr>";
                        }
                   
                        $id1 = $_GET['update'];
                       	if(isset($_POST['mem_company1']) && isset($_POST['mem_name1']) && isset($_POST['mem_date1']) && isset($_POST['mem_number1']) && isset($_POST['mem_mail1'])&& isset($_POST['mem_name1']))
                    	{	
                    		$company=$_POST['mem_company1'];
                    		$name=$_POST['mem_name1'];
                    		$date=$_POST['mem_date1'];
                    		$number=$_POST['mem_number1'];
                    		$email=$_POST['mem_mail1'];
                            $filename=$_POST['mem_filename1'];
                          
                            
                            $sql=mysqli_query($con,"UPDATE newcertificate1 SET mem_company='$company',mem_name='$name',mem_date='$date',mem_number='$number',mem_mail='$email' where mem_id='$id1'");
                        }
                        
                        if ($sql)
                        {
                            echo "<span class=update>Updated sucessfully </span>";
                        
	//send certificate in email

         require("PHPMailer/src/PHPMailer.php");
          require("PHPMailer/src/SMTP.php");
            $to = $_POST['mem_mail1'];
            $name=$_POST['mem_company1'];
            $date=$_POST['mem_date1'];
            $name1=$_POST['mem_name1'];
           
           
          // $mail = new PHPMailer();
            $mail = new PHPMailer\PHPMailer\PHPMailer();
            $mail->IsSMTP(); // enable SMTP
            
           // $mail->SMTPDebug = 2; // debugging: 1 = errors and messages, 2 = messages only
            $mail->SMTPAuth = true; // authentication enabled
            $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 587; // or 587
            $mail->IsHTML(true);
            $mail->Username = "braioffice@gmail.com";
            $mail->Password = "Zakbrai1234";
            $mail->SetFrom("braioffice@gmail.com","BRAI");
            $mail->Subject = "BRAI Certificate";
            $mail->Body = "<b>Dear $name1 ($name)</b>,<br><br>
        Greetings from BRAI!<br><br>
        Please click on below link to download your BRAI Membership certificate.<br><br>
        <a href='https://brai.in/braicertificate/pdf/$filename.pdf'><h3>Click Here To Download Certificate</h3></a>
        <br><br>
        Thank you,<br>
        BRAI TEAM
        <br>
        <br>
        <a href='https://www.reliconstech.com/'><p style='text-align:left;color:#404040;font-size:8px;text-decoration:none;'>Powered By: Relicons&trade;</p></a>";
            @$mail->AddAddress(@$_POST['mem_mail1']);
        
            if(@!$mail->Send()) {
                echo "@Mailer Error1: " .@$mail->ErrorInfo;
             }  else  {
                echo '<p id="thankyou" style="margin-top: 45px;">Message has been sent</p>';
             }
             //sending emails ends here
        
        }
			else{
		//	echo"please try again";
	}
?>


<!--dynamic pdf starts here-->
<?php  
require('connection.php');
require('fpdf/fpdf.php'); 

$filename=$_POST['mem_filename1'];

         $name=$_POST['mem_company1'];
         $date=$_POST['mem_date1'];
         
       

$pdf = new FPDF('L','pt','A4'); 
//Loading data 

$pdf->AddPage(); 
//  Print the edge of
$pdf->Image("img/BRAI-Certificate.jpg", 130, 20, 600); 
 
// Print the title of the certificate  
$pdf->SetFont('times','B',15); 
$pdf->Cell(720+10,380,$name,0,0,'C'); 
$pdf->SetFont('times','B',15);  
$pdf->SetXY(150,220); 
$pdf->Cell(550,160,date("M d, Y", strtotime($date)),0,0,'C'); 

/*if (file_exists($filename.'.pdf'))
{
    unlink($filename.'.pdf');
}*/

$pdf->Output('pdf/'.$filename.'.pdf','F');
?> 

<!--dynamic pdf ends here-->

</div>
</div>
 <?php include('footer.php'); ?>
</body>
        
</html>






















