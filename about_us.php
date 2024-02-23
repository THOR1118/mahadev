<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="css/about_us.css?v=<?php echo time();?>"> 
</head>
<body>

<?php
include 'connect.php';
session_start();
		if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
		{
			echo "<div class='container1'>
            <nav>
                <ul class='nav1'>
                <a href='index.php'>
                    <img src='images/logo.png' class='logo1'>
                    </a>
                    <li><a href='Register.php'>Register/Login</a></li>
                    <li><a href='index.php'>Home</a></li>
                    <li><a href='product_page.php'>Products</a></li>
        <li><a href='worker.php'>Workers</a></li>
                    <li><a href='join_us.php'>Join Us</a></li>
                    <li><a href='about_us.php'>About Us</a></li>
                    <li><a href='contact.php'>Contact Us</a></li>
                    <i class='fa-solid fa-xmark'></i>
                </ul>
            </nav>
        </div>";
		
		}
		else
		{
			echo "<div class='header'>
        <div class='container'>
            <nav>
            <div class='menu-bar'>
            <a href='loggedinpg.php'>
             <img src='images/logo.png' alt='' class='logo'> 
            </a>
             <ul>
            <li><a href='loggedinpg.php'>Home</a></li>
            <li><a href='product_page.php'>Product</a></li>
        <li><a href='worker.php'>Workers</a></li>
			<li><a style='	text-decoration: none; color:black;'href='join_us.php'>Join Us</a></li>
			<li><a style='	text-decoration: none; color:black;'href='about_us.php'>About Us</a></li>
            <li><a href='contact.php'>Contact us</a></li>
            <li><a href='user_profilenew.php'>MyProfile</a></li>

            </ul>
        </div>
    </div>
            </nav>";
		}
	?>
      

    <div id="about-main">
        <div class="jumbotron">
            <div class="jumbotron-inner">
                <div class="top-box">
                    <div class="content-box">
                        <h1>
                            About Mahadev Plywood and Hardware
                        </h1>
                        <p>
                         Our Mission is to provide world class features and innovative equipment to the society to ensure a perfect and an effective output. 
                    </div>
                </div>
            </div>
            <div class="img-layer-container">
                <div class="team-image" id="team-image">
                    <img style="width:100px; position:relative; left:-220px; top:130px;" src="images/gautam-modified.png" />
                    <img style="width:100px; position:relative; left:40px;" src="images/vijay1.png" />
                    <img style="width:100px; position:relative; left:250px; top:100px;" src="images/chirag1.png" />
                    <img style="width:100px; position:relative; left:-200px; top:240px" src="images/deep1.png" />
                </div>

                <div class="circles-container">
                    <div class="img-1">
                        <img src="https://apimatic.io/img/theme/aboutUs/Circles-1-1.svg" />                        
                    </div>
                    <div class="img-2">
                        <img src="https://apimatic.io/img/theme/aboutUs/Circles-2-1.svg" />                        
                    </div>                    
                </div>           
            </div>
        </div>
        <div class="story-container">
            <div class="need-for-dx-container">
                <h3 class="text-center">
                    About Us
                </h3>
                <p>
                Mahadev Plywood is the unprecedented choice of architects and interior designers – they strongly recommend our products for transforming ordinary steel and concrete structures to expressions of one's personality. From flexible plywoods that offer a unique blend of form and functionality to specially treated, Fire Retardant plywoods that find use in a myriad of construction purposes, we have the right products to target different building needs. Now in its 10th year of operations, Mahadev Plywood enjoys a unique brand identity as the market leader, with offerings that are considered industry benchmarks. We are guided by a simple philosophy of adding more value-for-money products and at the same time, improving upon our existing product portfolio through extensive research and customer feedback.
                </p>
               
            </div>
            <div class="need-for-dx-container">
                <h3 class="text-center">
                    Get in Touch
                </h3>
                <p>
                <button class="button" name="view_products" style="background-color:#074e8c; position:relative; left:-17px;">
                 <a style="color:white; text-decoration:none; background-color:#074e8c;" href="contact.php">Contact Us</a></button>
                </p>
               
            </div>
            <div class="container-divider"></div>
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