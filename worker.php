<!DOCTYPE html>
<html lang="en">
<head>
<?php
include 'connect.php';
 session_start();
 ?>
<link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Worker</title>
    <link rel="stylesheet" href="css/worker.css?v=<?php echo time();?>"> 
    <style>
      
       
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
<h2>Workers</h2>
<?php


                    include 'connect.php';
                    $sel = "SELECT * FROM `user`";
                    $res = mysqli_query($conn,$sel);
                    while($row=mysqli_fetch_assoc($res))
                    {
                      $user_id = $row['user_id'];
                    }
          $sel = "SELECT * FROM `worker` order by rand()";
					$res = mysqli_query($conn,$sel);
					while($row=mysqli_fetch_assoc($res))
					{
                        $workerid = $row['worker_id'];
                        $workername = $row['worker_name'];             
                        $emailid = $row['email'];
                        $adress = $row['worker_address'];
                        $mobileno = $row['mobile_number'];
                        $typesofworker = $row['type_of_work'];
                        $workexperience = $row['Work_Experience'];
                        $workerimg = $row['worker_img'];

						echo "<div class='prd'>
						<div class='card'>
							<div class='card-body text-center'>
                            <img src='./worker_img/$workerimg' class='product-image'>
								<h5 class='card-title'><b> $workername</b></h5>
								<p class='card-text small'>$typesofworker</p>	
                               &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <a class='a' href='worker_details.php?w_id=$workerid'>Request</a>	
							</div>
						</div>
					</div>";
            
					}
                    ?>
				

          
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