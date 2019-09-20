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
        
          <?php
          require_once('connection.php');  
          include('header.php'); ?>
        
        
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <button class="mybtn" id="formButton"><a href="new.php">New Certificate</a></button>
                    <button class="mybtn" id="formButton"><a href="view.php">Edit Certificate</a></button>
                </div>
                
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="dashboard_content">
                        <div class="mylogo">
                            <img src="img/BRAI-logosm.png">
                        </div>
                        <script type="text/javascript">
                            document.write("<center><font style='color: #008738; font-size: 28px; font-weight: 600; '>");
                            var day = new Date();
                            var hr = day.getHours();
                            if (hr >= 0 && hr < 12) {
                                document.write("Good Morning!");
                            } else if (hr == 12) {
                                document.write("Good Noon!");
                            } else if (hr >= 12 && hr <= 17) {
                                document.write("Good Afternoon!");
                            } else {
                                document.write("Good Evening!");
                            }
                            document.write("</font></center>");
                        </script>
                        <h3 style="text-align:center;font-weight: 700;">Welcome to BRAI Certificate Generator</h3>
                        <h4 class="bashboard_content">Click On the buttons  on left corner to proceed</h4>
                    </div>
                        </div>
                    </div>
                </div>
                    
<?php include('footer.php'); ?>
    </body>
        
</html>