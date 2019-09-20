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
                    <a style="text-decoration:none;" href="new.php"><button class="mybtn" id="formButton" style="color:#000;background-color: #ffd200 !important;
    border: 2px solid #ffd200 !important;">New Certificate</button></a>
                    <a style="text-decoration:none;" href="view.php"><button class="mybtn" id="formButton">Edit Certificate</button></a>
                </div>
                
                <div class="col-md-8" id="form_location">
                    <!--form opens here for new certificate-->
                        <div class="myform">
                            <h5 class="form_hd">Please Enter Below Details To Generate Certificate: </h5>
                            <form action="new.php" method="POST" id="form1">
                                <span class="myspan">ASSOCIATION NAME</span><input class="myfield" type="text" name="mem_association" placeholder="Association Name" required> *<br>
                                <span class="myspan">COMPANY NAME&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><input class="myfield" type="text" name="mem_company" placeholder="Company Name" required> *<br>
                                <span class="myspan">MEMBER NAME&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><input class="myfield" type="text" name="mem_name" placeholder="Member Name" required> *<br>
                                <span class="myspan">MEMBERSHIP DATE</span><input class="myfield_date" type="date" name="mem_date" placeholder="Date" required> *<br>
                                <span class="myspan">MEMBERSHIP NUM&nbsp;</span><input class="myfield" type="text" name="mem_number" placeholder="Membership Number" required> *<br>
                                <span class="myspan">MEMBER EMAIL-ID&nbsp;&nbsp;</span><input class="myfield" type="email" name="mem_mail" placeholder="Email-ID" required> *<br><br>
                                <input class="myfieldbtn1" type="submit" value="submit"></button>
                            </form>
                        </div>          
                    <!--form closes here-->
				
<?php 
require_once('connection.php');
	$date1 = date('Y-m-d');
	
	//whether ip is from share internet
if (!empty($_SERVER['HTTP_CLIENT_IP']))   
  {
    $ip_address = $_SERVER['HTTP_CLIENT_IP'];
  }
//whether ip is from proxy
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
  {
    $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }
//whether ip is from remote address
else
  {
    $ip_address = $_SERVER['REMOTE_ADDR'];
  }
       
	if(isset($_POST['mem_association']) && isset($_POST['mem_company']) && isset($_POST['mem_name']) && isset($_POST['mem_date']) && isset($_POST['mem_number']) && isset($_POST['mem_mail']))
	{	
	    $association=$_POST['mem_association'];
		$company=$_POST['mem_company'];
		$name=$_POST['mem_name'];
		$date=$_POST['mem_date'];
		$number=$_POST['mem_number'];
		$email=$_POST['mem_mail'];
	//	$filename=$_POST['mem_company'] . "-" . $_POST['mem_date'];
	
	  //created file in db
		$filename=$_POST['mem_number'] . "-" . $_POST['mem_name'] . "-" . $_POST['mem_date'];
	
        if(mysqli_query($con,"INSERT INTO newcertificate1 (mem_association,mem_company,mem_name,mem_date,mem_number,mem_mail,mem_certdate,mem_ipaddress,mem_filename) VALUES ('$association','$company','$name','$date','$number','$email','$date1','$ip_address','$filename')"))
		{
		//send certificate in email

    //send certificate in email

         require("PHPMailer/src/PHPMailer.php");
          require("PHPMailer/src/SMTP.php");
            $to = $_POST['mem_mail'];
            $name=$_POST['mem_company'];
            $date=$_POST['mem_date'];
            $name1=$_POST['mem_name'];
             $filename1=$_POST['filename'];
            
          // $mail = new PHPMailer();
            $mail = new PHPMailer\PHPMailer\PHPMailer();
            $mail->IsSMTP(); // enable SMTP
             $mail->CharSet = 'utf-8';
            
          // $mail->SMTPDebug = 2; // debugging: 1 = errors and messages, 2 = messages only
            $mail->SMTPAuth = true; // authentication enabled
            $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 587; // or 587
            $mail->IsHTML(true);
            $mail->Username = "braioffice@gmail.com";
            $mail->Password = "Zakbrai1234";
            $mail->SetFrom("braioffice@gmail.com",'BRAI');
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
            @$mail->AddAddress(@$_POST['mem_mail']);
        
            if(@!$mail->Send()) {
                echo "@Mailer Error1: " .@$mail->ErrorInfo;
             }  else  {
                echo '<p id="thankyou">Message has been sent</p>';
             }
             //sending emails ends here
		}
	}   
			else{
			//echo"please try again";
	}
?>
<!--/newcertificate connection-->
    
                </div>
            </div>
        </div>
        <!--newcertificate connection-->


<!--dynamic pdf starts here-->
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
$pdf->Image("img/nar.jpg", 0, -6,835, 600); 
 
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
<!--dynamic pdf ends here-->



</body>

<?php include('footer.php'); ?>
        
</html>