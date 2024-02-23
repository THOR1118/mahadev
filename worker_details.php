<html>
<head>
    <link rel="stylesheet" href="css/worker_details.css?v=<?php echo time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
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
                <li><a  href='Register.php'>Register/Login</a></li>
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
    <div class='container2'>
        <nav>
        <div class='menu-bar'>
  <a href='loggedinpg.php'>
         <img src='images/logo.png' alt='' class='logo'>
   </a> 
        <ul>
        <li><a href='user_profile.php'>MyProfile</a></li>
        <li><a href='loggedinpg.php'>Home</a></li>
        <li><a href='product_page.php'>Product</a></li>
    <li><a href='worker.php'>Workers</a></li>
  <li><a style='	text-decoration: none; color:black;'href='join_us.php'>Join Us</a></li>
  <li><a style='	text-decoration: none; color:black;'href='about_us.php'>About Us</a></li>
        <li><a href='contact.php'>Contact us</a></li>
        </ul>
    </div>
</div>
        </nav>";
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
    <div class="container">
        <div class="image-container">
        <?php
            include 'connect.php';
            if (isset($_GET['w_id'])) {
                $workerid = $_GET['w_id'];
                $sel = "SELECT * FROM `worker` WHERE worker_id = $workerid";
                $res = mysqli_query($conn, $sel);
                while ($row = mysqli_fetch_assoc($res)) {
                    $workerid = $row['worker_id'];
                    $workername = $row['worker_name'];
                    $emailid = $row['email'];
                    $adress = $row['worker_address'];
                    $mobileno = $row['mobile_number'];
                    $typesofworker = $row['type_of_work'];
                    $workexperience = $row['Work_Experience'];
                    $workerimg = $row['worker_img'];
                    // Left Column / Headphones Image
                    echo "<img data-image='red' class='active' src='./worker_img/$workerimg' alt=''>";
                }
            }
            ?>
        </div>
        <div class="details-container">
            <h1 class="name"><?php echo $workername; ?></h1>
            <p class="email">Email: <?php echo $emailid; ?></p>
            <p class="address">Address: <?php echo $adress; ?></p>
            <p class="contact-number">Contact Number: <?php echo $mobileno; ?></p>
            <p class="type-of-worker">Type Of Worker: <?php echo $typesofworker; ?></p>
            <p class="work-experience">Work Experience: <?php echo $workexperience; ?></p>
            <a class="btn btn-primary" href='worker_request.php?w_id=<?php echo $workerid; ?>'>Request</a>
        </div>
    </div>

    <div class="container mt-3">
  <table class="table">
    <tbody>
      <?php
        $worker_id = $_GET['w_id'];
        $sel = "SELECT * FROM `media` WHERE w_id = $worker_id";
        $result=mysqli_query($conn,$sel);
      while($data=mysqli_fetch_array($result))
      {?>
      <tr>
      <div class="all">
      <div class="image"><tr><img id="myImg"src="uploads/<?php echo $data['doc'];?>"
      style="height:100px;"></tr></div>
    </div>
      </tr>
<?php } ?>
    </tbody>
      </table>
      
</body>

</html>
