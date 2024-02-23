<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, inital-scale=1.0">
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/homepg.css?v=<?php echo time();?>"> 


</head>
<body>


    <!------------------------ Header Section ----------------------->

    <div class="header">
        <a href="newlogo.png">
        </a>
        <div class="container">
            <nav>
                <ul class="nav">
                    <a href="index.php">
                    <img src="images/logo.png" class="logo">
                    </a><img  src="https://media.geeksforgeeks.org/wp-content/uploads/20221210182541/Untitled-design-(30).png"
				class="icn menuicn"
				id="menuicn"
				alt="menu-icon">
                <div class="navigation">
                    <li><a href="Register.php">Register/Login</a></li>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="product_page.php">Products</a></li>
                    <li><a href="worker.php">Workers</a></li>
                    <li><a href="join_us.php">Join Us</a></li>
                    <li><a href="about_us.php">About Us</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <i class="fa-solid fa-xmark"></i>
                </div>
                </ul>
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
               include 'connect.php';
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
                        <button  class="wlearn">Learnmore</button></a>
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
            <!-- <button name="calc"class="btncal">Calculate</button> -->
            <a href="calculator.php">
            <input type="submit" name="submit" value="calculator" class="btncal">
</a>
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
    <a href="https://www.instagram.com/paulwalker/"><i class="fa fa-instagram"></i></a>
    <a href="#"><i class="fa fa-linkedin"></i></a>
   <a href="#"><i class="fa fa-youtube"></i></a>
</div>

</footer>
    
    
    
    
    
    
    
    
    	<!-- Bootstrap JavaScript -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	
    
    
    
    
    
    
    
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
    
    