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
      <style>
          table {
            width: 100%;
            }
            th {
            background: #008738;
            height: 40px;
            padding-left: 10px;
            color: #fff;
            font-size: 18px;
            }
            td{
            height: 30px;
            padding-left: 10px;
            color: #000;
            font-size: 15px;
            }
      </style>
    </head>
    <body>
          <?php include('header.php'); ?>
        
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <a style="text-decoration:none;" href="new.php"><button class="mybtn" id="formButton" >New Certificate</button></a>
                    <a style="color:#000;text-decoration:none;" href="#"><button class="mybtn" id="formButton" style="color:#000;background-color: #ffd200 !important;
                     border: 2px solid #ffd200 !important;">Edit Certificate</button></a>
                </div>
                
                <div class="col-md-8">
                    <form action="view.php" method="POST">
                    	<span>From Date </span><input class="myfield1" type="date" name="date" ><br>
                    	<span>To Date &nbsp;&nbsp;&nbsp;&nbsp;</span><input class="myfield1" type="date" name="todate" > 
                    	<br><br>
                    	<input class="myfieldbtn" style="margin-left: 65px;" type="submit"  name="search" value="enter">
                    </form>
                 </div>
            </div>
            <div class="row">
                <table border=1>
                        <tr>
                        <th style='text-align: center;'>ID</th>
                        <th style='text-align: center;'>Company Name</th>
                        <th style='text-align: center;'>Date</th>
                        <th style='text-align: center;'>Email</th>
                        <th style='text-align: center;'></th>
                       
                        </tr>
                        <tr></tr>
                </div>
            </div>
       

<?php 
require_once('connection.php');
	if(isset($_POST['search']))
	{	
		
		$date = $_POST['date'];
		$todate = $_POST['todate'];
		
		$res = mysqli_query($con,"SELECT mem_id,mem_company,mem_certdate,mem_mail from newcertificate1 where mem_certdate between '$date' and '$todate' order by  mem_id desc");
		$count = mysqli_num_rows($res);
		
	}

	if(@$count == 0)
	{
	//	echo 'no data found';
	}

	else
	{
		while ($row = @mysqli_fetch_array($res))
		
		echo "<tr><td style='text-align: center;'>$row[mem_id]</td> <td>$row[mem_company]</td><td style='text-align: center;'>$row[mem_certdate]</td><td style='text-align: center;'>$row[mem_mail]</td><td style='text-align: center;'><a href='edit.php?edit=$row[mem_id]'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a></td></tr>";
	}

?>
</table>
            </div>
 
 
  
    </body>
      <?php include('footer.php'); ?>  
</html>