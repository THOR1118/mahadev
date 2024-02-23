<?php
include 'connect.php';

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
{
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    
<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, inital-scale=1.0">
    <link rel="stylesheet" href="loggedin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/loggedinpg.css?v=<?php echo time();?>"> 
</head>
<body>


    <!------------------------ Header Section ----------------------->

    <div class="header">
        <div class="container">
            <nav>
            <div class="menu-bar">
            <a href='loggedinpg.php'>
      <img src="images/newlogo.jpg" alt="" class="logo">
</a> 
</a><img  src="https://media.geeksforgeeks.org/wp-content/uploads/20221210182541/Untitled-design-(30).png"
				class="icn menuicn"
				id="menuicn"
				alt="menu-icon">
      <div class="navigation">
                <ul>
        <li><a href="loggedinpg.php" >Home</a></li>
        <li><a href="product_page.php" >Product</a></li>
        <li><a href='worker.php' >Workers</a></li>
        <li><a href="join_us.php" >Join Us</a></li>
        <li><a href="about_us.php" >About Us</a></li>
        <li><a href="contact.php" >Contact us</a></li>
        <li><a href="user_profilenew.php" >MyProfile<i class="fas fa-caret-down"></i></a>
            <div class="dropdown-menu">
                <ul>
                    <a href="user_profilenew.php">
                        <?php echo $_SESSION['username'] ?>
                    <!-- echo $result['UserName'] -->
                    </a>
                    <li><a href="user_profilenew.php">My Profile</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
              </div>
              </div>
        </li>
      </ul>
      </div>
    </div>
    
            </nav>
        </div>
        <!-- -----------Text Over Photo------------------- -->
        <div class="text"><b>WE BUILD THE PERFECTION</b></div>
        <div class="quote"><b>
                <p>“We provide the best quality products”.</p>
                <a href="product_page.php">
                <button class="btn">Buynow</button>
                </a>
        </div>
    </div>








      <!-- --------------------------Products Sections---------------------- -->
      <div class="products">
        <div class="conatainer">
            <h1 class="ptitle">Top Products & Categories</h1>
            <div class="products-list">
                <?php 
                $sel = "SELECT * FROM `product` order by rand() LIMIT 0,3";
                $res = mysqli_query($conn,$sel);
                while($row=mysqli_fetch_assoc($res))
                {
                    $pr_id = $row['Product_ID'];
                    $pr_name = $row['Product_Name'];
                    $pr_price = $row['Product_Price'];
                    $pr_des = $row['Product_Description'];
                    // $pr_qun = $row['Product_Stock'];
                    $pr_cat = $row['Category_ID'];
                    $pr_img = $row['Product_img'];
                echo "<div>
                    <a href='product_details.php?Product_ID=$pr_id' style='text-decoration: none; color: black;'>
                        <img src='product_img/$pr_img' class='ply1'>
                        <p class='sixmm'>$pr_name</p>
                        <p class='sixmm'>Price: $pr_price</p>
                    </a>
                </div>";
                }
                ?>
            </div>
        </div>
      </div>







       <!-------------------------- Worker Section ----------------------------- -->
       <div class="worker">
        <div class="workerconatiner">
            <div class="row">
                <div class="wcol1">
                    <?php
                    $sel = "SELECT * FROM `worker` ORDER BY rand()";
                    $res = mysqli_query($conn,$sel);
							while($row=mysqli_fetch_assoc($res))
							{
								$workerimg = $row['worker_img'];
							}
                    ?>
                    <img src="./worker_img/<?php echo $workerimg;?>" class="wimg1">
                </div>
                <div>
                    <h1 class="wh2">Workers</h1>
                    <p class="aboutworker">Woker is the mandatory person to build your dream home and now you can Assign 
                        woker online.You can see their Portfolio and also contact them.</p>
                        <a href="worker.php">
                    <button class="wlearn">Learnmore</button>
                       </a>
                </div>
            </div>
        </div>
    </div>



    <!-- ------------------------Calculator Section--------------------------------- -->
    <div class="calc">
        <h1 class="calcu">Calculator</h1>
        <div class="calcimg">
            <img src="images/calci.jpg" height="750px" width="750px">
            <p class="estimate">Get an Estimate of plywood Required for your Furniture</p>
            <a href="calculator.php"><button class="btncal">Calculate</button></a>
        </div>
    </div>





<!-- <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br> -->

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
<script src="./index.js"></script>


<script>
let menuicn = document.querySelector(".menuicn");
let nav = document.querySelector(".navigation");

menuicn.addEventListener("click",()=>
{
nav.classList.toggle("navclose");
})
</script>
</body>
</html>


            
                