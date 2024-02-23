<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include 'connect.php';
    session_start();
    ?>
<link rel="stylesheet" href="css/contact.css?v=<?php echo time();?>">  
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css'>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
		if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
		{
			echo "<div class='container1'>
            <nav>
                <ul class='nav1'>
                    <img src='images/logo.png' class='logo1'>
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
        <a href='logo.png'>
        </a>
        <div class='container'>
            <nav>
            <div class='menu-bar'>
             <img src='images/logo.png' alt='' class='logo'> 
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





            <div class="contact container">
            <form method="POST" action="">
                <div class="form">
                    <div class="form-txt">
                        <h1>Contact Us</h1>
                        <span>As you might expect of a shop that began as a high-end Hardware & Plywood dealer, we pay strict
                        attention.</span>
                        <h3>India</h3>
                        <p>Near yard gate shop no:-3, 4, Porbandar, Gujarat<br>360577</p>
                        <ul class="wrapper">
  <li class="icon facebook">
    <span class="tooltip">Facebook</span>
    <span><i class="fab fa-facebook-f"></i></span>
  </li>
  <li class="icon instagram">
    <span class="tooltip">Instagram</span>
    <span><i class="fab fa-instagram"></i></span>
  </li>
  <li class="icon twitter">
    <span class="tooltip">Twitter</span>
    <span><i class="fab fa-twitter"></i></span>
  </li>
</ul>
                    </div>
                    <div class="form-details">
                        <input type="text" name="name"  placeholder="Name" required>
                        <input type="email" name="email"  placeholder="Email" required>
                        <textarea type="text" name="message"  cols="52" rows="7" placeholder="Message" required></textarea>
                        <button name="submit">SEND MESSAGE</button>
                        <div class="find"><b>Find Us on Google Map</b></div>
                        <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3708.349252235842!2d69.62522317607954!3d21.650267266140702!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395635f0876be12f%3A0xfd23a45a2c7d9551!2sMahadev%20Plywood%20and%20Hardware!5e0!3m2!1sen!2sin!4v1669355360648!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>    
                    </div>
                </div>
            </form>
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


<?php

include 'connect.php';

if(isset($_POST['submit']))
{
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];


  $query = "INSERT INTO `feedback`(`UserName`, `Email`, `Message`) VALUES ('$name ','$email','$message')";
  $result=mysqli_query($conn,$query);
  if($result)
  {
    echo "
            <script>
            alert('Feedback Submitted!');
            window.location.href='contact.php';
            </script>
            ";
  }
  else
  {
    echo "
            <script>
            alert('Please try again');
            window.location.href='contact.php';
            </script>
            ";
  }
}
 
?>