<?php 
session_start();

require_once('connection.php');
if(isset($_POST['Login']))
{
	if(empty($_POST['UName'])||empty($_POST['Password']))
	{
		header("location:index.php?Empty= *Please fill empty fields");
	}
	else
	{
		$query="select * from user where UName='".$_POST['UName']."' and Password='".$_POST['Password']."'";
		$result=mysqli_query($con,$query);
		if(mysqli_fetch_assoc($result))
		{
			$_SESSION['User']=$_POST['UName'];
			header('location:welcome.php');

		}
		else
		{
			header("location:index.php?Invalid= *Please enter correct User name and Passcode");
		}

	}
}
else
{
	echo "Please share valid Username and Password";
}

?>