<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body style="background-image:url(img/background.jpg)">
  	
  	<div class="container" id="textalign">
		<div class="row">
		<div class="col-md-12 mypadding" >
			<img src="img/BRAI-logosm.png" style="width:90px;height:auto;">
			<h3 id="h3weight">Cerificate Generator Admin Login</h3>
		</div>
  	
  	<form action="process.php" method="post" >
  		<input type="text" name="UName" placeholder="User" style="margin-bottom: 10px;" required>
  		<br>
  		<input type="password" name="Password" placeholder="Password" required>
  		<br>
  		<button class="btn btn-sucess mt-3" name="Login" id="loginbutton">Login</button>
  	</form>
	<?php 
  		if(@$_GET['Empty']==true)
  		{
  	?>
	
	<div class="alert-light text-danger"><?php echo $_GET['Empty']?></div>
	
	<?php
	 } 
	?>
	<?php 
  		if(@$_GET['Invalid']==true)
  		{

  	?>
	
	<div class="alert-light text-danger"><?php echo $_GET['Invalid']?></div>
	
	<?php
	  } 
	?>

 	</div>
 
  </div>
 </body>
  <?php include('footer.php'); ?>
</html>