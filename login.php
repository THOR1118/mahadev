<html>  
    <head>
    <link rel="stylesheet" href="css/login.css?v=<?php echo time();?>">  
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    </head>
<body>

<!----------------------HEADER------------------>
<nav>
                <ul class="nav">
                <a href='index.php'>
                    <img src="images/logo.png" class="logo">
</a>
                    <li><a href="Register.php">Register/Login</a></li>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="product_page.php">Products</a></li>
                    <li><a href="worker.php">Workers</a></li>
                    <li><a href="join_us.php">Join Us</a></li>
                    <li><a href="about_us.php">About Us</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <i class="fa-solid fa-xmark"></i>
                </ul>
            </nav>





<!--     
    <div class="wrapper login">
        <div class="container">
            <div class="col-left">
                <div class="login-text"> -->





                <!---------------PHP--------->
                <?php
                    if($_SERVER['REQUEST_METHOD'] == "POST")
                    {
                       include 'connect.php';
                       
                       $email = $_POST['email'];
                       $password = $_POST['password'];
                    
                    
                    
                    //    $sql = "Select * from user where Email='$email' AND Password='$password'"; 
                       $sql = "Select * from user where Email='$email'"; 
                       $result = mysqli_query($conn, $sql);
                       $num = mysqli_num_rows($result);
                       if($num == 1)
                       {
                        while($row=mysqli_fetch_assoc($result))
                        {
                            if(password_verify($password,$row['Password']))
                            {
                                session_start();
                                $_SESSION['loggedin'] = true;
                                $_SESSION['username'] = $email;
                                // echo "<script>window.location.href='loggedinpg.php'</script>";
                                header("location: loggedinpg.php");
                            }
                            echo "
                        <script>
                        alert('Email Id or Password Incorrect!!');
                        window.location.href='login.php';
                        </script>
                        ";
                        }
                       }
                       else
                       {
                        echo "
                        <script>
                        alert('Email Id or Password Incorrect!!');
                        window.location.href='login.php';
                        </script>
                        ";                     
                      }
                    }
                    ?>




                   

    <div class="container" id="container">
	<div class="form-container sign-in-container">
    <form action="" method="POST">
			<h1>Sign in</h1>
			<input type="text" placeholder="Email" required name="email">
			<input type="password" placeholder="Password" required name="password">
			<a href="send_email.php" style="color:blue; font-size:13px;">Forgot your password?</a>
            <input type="submit" value="Sign In"> 
			<b><a href="worker_login.php" style="color:#395268; font-size:13px; position:relative; top:85px; left:60px;">Worker Login </a></b>
			<b><a href="shopowner_login.php" style="color:#a86e47; font-size:13px; position:relative; top:70px; left:-120px;">Shop Owner Login</a></b>
            <img src="images/ceo.png" style="height:30px; width:30px; position:relative; top:48px; left:-35px;" alt="">
            <img src="images/worker.png" style="height:30px; width:30px; position:relative; top:18px; left:125px;" alt="">


		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-right">
				<h1>New to Mahadev Plywood ?</h1>
				<p>Create your free acount and join with our amazing journey</p>
				<a href="register.php" class="btn">Sign Up</a>
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