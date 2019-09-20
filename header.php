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
      <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    </head>
    <body>
         <div id="top-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <div class="logo">
                            <img src="img/BRAI-logosm.png">
                        </div>
                    </div>
                    <div class="col-md-6">
                       <h4 class="head_content">Bangalore Realtors Association India</h4>
                    </div>
                    <div class="col-md-4">
                        <ul class="nav navbar-nav navbar-right">
        
                        	<li>
                        	    <!--<a class="welcome_link" href="#"><span class="glyphicon glyphicon-user"></span> -->
                        	    <?php 
                        			@session_start();
                        			if(isset($_SESSION['User']))
                        			{	
                        // 			echo 'welcome &nbsp;'.$_SESSION['User'];
                        			echo'</a>'; echo '<a class="welcome_link" href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout</a>';
                            		}
                                    else
                                    {
                                    header("location:index.php");
                                    }
                                ?>
                                </a>
                        	</li>
    
                        </ul>
                    </div>
                    
                </div>
            </div>
        </div>
        
        <!--mobile_header-->
        <div id="top-section1">
             <div class="container">
                 <div class="row">
                     <div class="col-md-12">
                         <img class="mobile_logo" src="img/BRAI-logosm.png">
                         <ul class="mynav">
                            	<li class="log_out">
                            	  
                            	    <?php 
                            	        // echo 'welcome &nbsp;admin';
                            		//	echo '  <a class="welcome_link" href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout</a>';
                                    ?>
                                    </a>
                            	</li>
        
                            </ul>
                     </div>
                 </div>
             </div>
        </div>
        <!--/mobile_header-->
    </body>
</html>    

    
    