<?php
    require_once("connection.php");
    $id1 = $_GET['update'];
   	if(isset($_POST['mem_company1']) && isset($_POST['mem_name1']) && isset($_POST['mem_date1']) && isset($_POST['mem_number1']) && isset($_POST['mem_mail1']))
	{	
		$company=$_POST['mem_company1'];
		$name=$_POST['mem_name1'];
		$date=$_POST['mem_date1'];
		$number=$_POST['mem_number1'];
		$email=$_POST['mem_mail1'];
        
        
        $sql=mysqli_query($con,"UPDATE newcertificate1 SET mem_company='$company',mem_name='$name',mem_date='$date',mem_number='$number',mem_mail='$email' where mem_id='$id1'");
    }
    if ($sql)
    
        echo "sucess";
    
        else
        
        echo "failed to update";
    
?>