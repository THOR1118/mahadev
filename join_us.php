<!DOCTYPE html>
<html lang="en">
<head>
    <?php

include 'connect.php';
 session_start();
 ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Us</title>
    <style>
@font-face {
    font-family: 'poppins';
    src: url(Fonts/Poppins-Regular.ttf);
}

@font-face {
    font-family: 'bison';
    src: url(Fonts/Bison-Bold.ttf);
}


    body
    {
        overflow-x:hidden;
        /* overflow-y:hidden; */
    }

        img
        {
            position: relative;
            top:100px;
            height:500px;
            width:500px;    
        }

        h2
        {
            Font-family:'bison';
            position: relative;
            left:800px;
            top:-200px;
            letter-spacing:5px;
        }
        .join
        {
            Font-family:'poppins';
            position: relative;
            margin-left:800px;
            margin-top:-190px;
            /* left:800px;
            top:-200px; */
            text-align:justify;
        }
        button
{
  padding: 15px 25px;
  color: var(--white);
  font-weight: 500;
  background: #589f85;
  outline: none;
  border: none;
  /* margin: 15px; */
  font-size: 14px;
  letter-spacing: 2px;
  cursor: pointer;
  margin-left: 800px;
  position: relative;
}

.container1 {
    margin-top: 0px;
    margin-bottom: -180px;
    padding-top: 10px; 
    /* padding-bottom: 10px; */
	/* padding-left: -50px;  */
}


.nav1 {
    margin-bottom: 0px;
    font-family: 'poppins';
    display: flex;
    position: relative;
    left:-60px;
    margin-top: 200px;
    padding: 0%;
}

.logo1 {
    
    position: relative;
    top: -40px;
    height: 200px;
    left: -950px;
    width: 200px;
	}

.nav1 ul li {
    display: inline-block;
    list-style: none;
    margin: 10px 15px;
}

.nav1 ul li a {
    margin-top: 0px;
    margin-bottom: 0px;
    color: #2E2F4D;
    text-decoration: none;
    font-size: 15px;
    position: relative;
}

.nav1 ul li a::after {
    content: '';
    width: 0%;
    height: 3px;
    background: #589f85;
    position: absolute;
    left: 0;
    bottom: -6px;
    transition: 0.5s;
}

.nav1 ul li a:hover::after {
    width: 100%;
}




.container {
    margin-top: 0px;
    margin-bottom: 0px;
    padding-top: 10px; 
    /* padding-bottom: 10px; */
	/* padding-left: -50px;  */
}

nav {
    font-family:'poppins';
    display: flex;
    position: relative;
    left:1000px;
    padding: 0%;
    top:-320px;
    margin-top:100px;
    /* top:-220px; */
}

.logo {
    
    position: relative;
    top: 160px;
    height: 200px;
    left: -1100px;
    width: 200px;
	}

nav ul li {
    font-family:'poppins';

    display: inline-block;
    list-style: none;
    margin: 10px 15px;
}

nav ul li a {
    font-family:'poppins';
    margin-top: 0px;
    margin-bottom: 0px;
    color: #2E2F4D;
    text-decoration: none;
    font-size: 15px;
    position: relative;
}

nav ul li a::after {
    content: '';
    width: 0%;
    height: 3px;
    background: #589f85;
    position: absolute;
    left: 0;
    bottom: -6px;
    transition: 0.5s;
}

nav ul li a:hover::after {
    width: 100%;
}

.circle
{
    height: 500px;
    width: 500px;
    z-index: -1;
    position: relative;
    margin-left: -230px;
    top:200px;
}
.c1
{
    position: relative;
    Right:560px;
    top:400px;
    z-index: -10;
}
.c2
{
    position: relative;
    Right:960px;
    top: -50px;
    z-index: -10;
}
@media (max-width: 800px)
{
    html,body
    {
        overflow-x:hidden;
    }

    .container1 {
    margin-top: 0px;
    margin-bottom: -180px;
    padding-top: 10px; 
    /* padding-bottom: 10px; */
	/* padding-left: -50px;  */
}


nav {
    margin-bottom: 0px;
    font-family: 'poppins';
    position: relative;
    left: 230px;
    top:100px;
    margin-top: -300px;
    padding: 0%;
}
nav ul li {
    display: flex;
    list-style: none;
    margin: 10px 15px;
}

nav ul li a {
    margin-top: 0px;
    margin-bottom: 0px;
    color: #2E2F4D;
    text-decoration: none;
    font-size: 10px;
    position: relative;
}

nav ul li a::after {
    content: '';
    width: 0%;
    height: 3px;
    background: #589f85;
    position: absolute;
    left: 0;
    bottom: -6px;
    transition: 0.5s;
}

nav ul li a:hover::after {
    width: 100%;
}
    .logo1
    {
        width:100px;
        height: 100px;
        position:relative;
        top:-50px;
        left: 20px;
    }
    img
    {
        height:350px;
        width:350px;
        margin-top:200px;
        margin-left:0px;
    }
    .circle
    {
        height:350px;
        width:350px;
        margin-top:-650px;
        margin-left:10px;
    }
    h2
    {
        position: relative;
        left:   0px;
        text-align:center;
        top:-250px;
    }
    .join
    {
        margin-left:10px;
        /* position: relative; */
        text-align:justify;
        /* margin-top:-250px; */
    }
    button
    {
        margin-left:0px;
        position: relative;
        top:50px;
    }
    .login
    {
        position: relative;
        left:50px;
    }
    .c1
    {
        margin-left: 570px;
        position: relative;
        top: -450px;
        /* left:100px; */
    }
    .c2
    {
        margin-left: 870px;
        position: relative;
        top: -390px;
    }
}
.container {
    margin-top: 0px;
    margin-bottom: 0px;
    padding: 10px 10%;
}

.main
{
    margin-top:-350px
}
/* ----------------------Footer Section---------------------- */
/* Footer design */


@import url('http://fonts.googleapis.com/css?family=Open+Sans:400,700');
* {
    padding: 0;
    margin: 0;
}




footer {
    position: relative;
    top: 400px;
    bottom: 0px;
}

@media (max-height:800px) {
    footer {
        position: static;
    }
    header {
        padding-top: 40px;
    }
}

.footer-distributed {
    background-color: #9dc79f;
    box-sizing: border-box;
    width: 100%;
    text-align: left;
    font: bold 16px sans-serif;
    padding: 50px 50px 60px 50px;
    margin-top: 80px;
}

.footer-distributed .footer-left, .footer-distributed .footer-center, .footer-distributed .footer-right {
    display: inline-block;
    vertical-align: top;
}

                                     /* Footer left */

.footer-distributed .footer-left {
    width: 30%;
}

.footer-distributed h3 {
    color: black;
    font: normal 36px 'Cookie', cursive;
    margin: 0;
}


.footer-distributed h3 span {
    color: brown;
}

                                   /* Footer links */

.footer-distributed .footer-links {
    color: black;
    margin: 20px 0 12px;
}

.footer-distributed .footer-links a {
    display: inline-block;
    line-height: 1.8;
    text-decoration: none;
    color: black;
}

.footer-distributed .footer-company-name {
    color: #291912;
    font-size: 14px;
    font-weight: normal;
    margin: 0;
}

                                    /* Footer Center */

.footer-distributed .footer-center {
    width: 35%;
}

.footer-distributed .footer-center i {
    background-color: #33383b;
    color: #ffffff;
    font-size: 25px;
    width: 38px;
    height: 38px;
    border-radius: 50%;
    text-align: center;
    line-height: 42px;
    margin: 10px 15px;
    vertical-align: middle;
}

.footer-distributed .footer-center i.fa-envelope {
    font-size: 17px;
    line-height: 38px;
}

.footer-distributed .footer-center p {
    display: inline-block;
    color: black;
    vertical-align: middle;
    margin: 0;
}

.footer-distributed .footer-center p span {
    display: block;
    font-weight: normal;
    font-size: 14px;
    line-height: 2;
}

.footer-distributed .footer-center p a {
    color: black;
    text-decoration: none;
    ;
}

                                  /* Footer Right */

.footer-distributed .footer-right {
    width: 30%;
}

.footer-distributed .footer-company-about {
    line-height: 20px;
    color: black;
    font-size: 17px;
    font-weight: normal;
    margin: 0;
}

.footer-distributed .footer-company-about span {
    display: block;
    color: black;
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 20px;
}

.footer-distributed .footer-icons {
    margin-top: 25px;
}

.footer-distributed .footer-icons a {
    display: inline-block;
    width: 35px;
    height: 35px;
    cursor: pointer;
    background-color: #33383b;
    border-radius: 2px;
    font-size: 20px;
    color: #ffffff;
    text-align: center;
    line-height: 35px;
    margin-right: 3px;
    margin-bottom: 5px;
}

.footer-distributed .footer-icons a:hover {
    background-color: #3F71EA;
}

.footer-links a:hover {
    color: #3F71EA;
}

@media (max-width: 880px) {
    .footer-distributed .footer-left, .footer-distributed .footer-center, .footer-distributed .footer-right {
        display: block;
        width: 100%;
        margin-bottom: 40px;
        text-align: center;
    }
    .footer-distributed .footer-center i {
        margin-left: 0;
    }
}    


    </style>
</head>
<body>
<?php

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
                    <li><a href='about_us.php'>About Us</a></li>
                    <li><a href='join_us.php'>Join Us</a></li>
                    <li><a href='contact.php'>Contact Us</a></li>
                    <i class='fa-solid fa-xmark'></i>
                </ul>
            </nav>
        </div>";
		
		}
		else
		{
			echo "<div class='header'>
        <a href='logo.png'>
        </a>
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
    <div class="main">
    <img src="images/wall.png" alt="wall image">
    <img src="images/circle.png" alt="circle image" class="circle">
    <img src="https://apimatic.io/img/theme/aboutUs/Circles-1-1.svg" class="c1" alt="circle Design"/>
    <img src="https://apimatic.io/img/theme/aboutUs/Circles-2-1.svg" class="c2" alt="circle Design"/>                        

    <h2>Join Mahadev Plywood and Hardware</h2>
    <p class="join">"Join our team and be a part of something great. Where your hard work and dedication will be rewarded, and where you can grow both professionally and personally."</p>
    <a style="text-decoration:none; color:black;" href="worker_registration.php">
    <button>Register</button></a>
    <a class="login" style="text-decoration:none; color:black; position:relative; right:770px;" href="worker_login.php">
    <button>Login</button>
    </a>
    </div>

    <div class=""></div>
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
    
    
     <!-- ----------------------Footer Section----------------------- -->
     


</body>
</html>