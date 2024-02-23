<?php
include 'connect.php';

?>











<html>  
    <head>
    <link rel="stylesheet" href="css/send_email.css?v=<?php echo time();?>">  
    </head>
<body>

<title>Worker Reset Password</title>
<!----------------------HEADER------------------>
<nav>
                <ul class="nav">
                <a href='loggedinpg.php'>
                    <img src="images/logo.png" class="logo">
</a>
                </ul>
            </nav>


    
    <div class="wrapper login">
        <div class="container">
            <div class="col-left">
                <div class="login-text">


                




                    <!-----------------------FORM------------------------->
                    <h2 style='margin-top:-20px;'>Forgot Password?</h2>
                    <p>Reset Password through<br>email</p>
                    <!-- <a href="Register.php" class="btn">Sign Up</a> -->
                </div>
            </div>
            
            <div class="col-right">
                <div class="login-form">
                    <h2>Reset Password</h2>
                    <form action="resetpassword_worker.php" method="POST">
                        <p>
                            <label>Email address<span>*</span></label>
                            <input type="text" placeholder="Email" required name="worker_email">
                        </p>
                        <p>
                            <input type="submit" value="Send Link" name="sendlink">
                        </p>
                        <p>
                        <a href="worker_dashboard.php" style="color:blue;">Go back</a>
                        </p>
                    </form>
                </div>
            </div>

        </div>
    </div>


     <!-- ----------------------Footer Section----------------------- -->
    
	

 <footer class="footer-distributed">

<div class="footer-left">
    <h3>MAHADEV<span>PLYWOOD</span></h3>

    <p class="footer-links">
    <!-- <p><a class="explore-link" href="index.php" style="color:black; text-decoration:none;"> <b>Home</b></a></p> -->
        <!-- <a href="#">Home</a> -->
        
        <!-- <a href="#">About</a> -->
        <p><a class="explore-link" href="product_page.php" style="color:black; text-decoration:none;"> <b>Products</b></a></p>
        
        <!-- <a href="#">Contact</a> -->
        <p><a class="explore-link" href="contact.php" style="color:black; text-decoration:none;">Contact Us <b></b></a></p>
        
        <!-- <a href="#">Blog</a>  -->
        <p><a class="explore-link" href="join_us.php" style="color:black; text-decoration:none;"> <b>Join Us</b></a></p> 
        <!-- <p><a class="explore-link" href="index.php"> <b>Home</b></a></p>
		
		<p><a class="explore-link" href="contact.php">Contact Us <b></b></a></p>
		<p><a class="explore-link" href="#"> <b>Join Us</b></a></p> -->
    </p>

    <p class="footer-company-name">Copyright © 2023 <strong>MAHADEV PLYWOOD</strong> All rights reserved</p>
</div>

<div class="footer-center">
    <div>
        <i class="fa fa-map-marker"></i>
        <p><span>Rokadiya hanuman</span>
            Porbandar</p>
    </div>

    <div>
        <i class="fa fa-phone"></i>
        <p>+91 9313560787</p>
    </div>
    <div>
        <i class="fa fa-envelope"></i>
        <p><a href="mailto:sagar00001.co@gmail.com">mahadevplywood@gmail.com</a></p>
    </div>
</div>
<div class="footer-right">
    <p class="footer-company-about">
        <span>About the Shop</span>If you're in need of plywood for your next project, look no further than our hardware shop. We offer a variety of grades, sizes, and thicknesses, along with all the hardware and tools you need to get the job done right.
       
    </p>
    <div class="footer-icons">

       
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     
    <a href="#"><i class="fa fa-facebook"></i></a>
    <a href="#" class="fa fa-twitter"></a>
    <a href="#"><i class="fa fa-instagram"></i></a>
    <a href="#"><i class="fa fa-linkedin"></i></a>
   <a href="#"><i class="fa fa-youtube"></i></a>
</div>

</footer>


</body>
</html>