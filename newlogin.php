<html>  
    <head>
    <link rel="stylesheet" href="css/newlogin.css?v=<?php echo time();?>">  
    </head>
<body>


<!----------------------HEADER------------------>
<nav>
                <ul class="nav">
                    <img src="logo.png" class="logo">
                    <li><a href="Register.php">Register/Login</a></li>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="product_page.php">Products</a></li>
                    <li><a href="join_us.php">Join Us</a></li>
                    <li><a href="about_us.php">About Us</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <i class="fa-solid fa-xmark"></i>
                </ul>
            </nav>


    
    <div class="wrapper login">
        <div class="container">
            <div class="col-left">
                <div class="login-text">


                
                <!-----------PHP----------->
                    <?php
                    if($_SERVER['REQUEST_METHOD'] == "POST")
                    {
                       include 'connect.php';
                       
                       $email = $_POST['email'];
                       $password = $_POST['password'];
                    
                    
                    
                       $sql = "Select * from user where Email='$email' AND Password='$password'"; 
                       $result = mysqli_query($conn, $sql);
                       $num = mysqli_num_rows($result);
                       if($num == 1)
                       {
                        echo "Login Successfull";
                        session_start();
                        $_SESSION['loggedin'] = true;
                        $_SESSION['username'] = $email;
                        header("location: loggedinpg.php");
                       }
                       else
                       {
                        echo "
                        <script>
                        alert('Invalid Email Id or Password!!');
                        window.location.href='newlogin.php';
                        </script>
                        ";
                       }
                    }
                    ?>




                    <!-----------------------FORM------------------------->
                    <h2 style='margin-top:-20px;'>New to Mahadev Plywood!</h2>
                    <p>Create an free <br>acoount</p>
                    <a href="Register.php" class="btn">Sign Up</a>
                </div>
            </div>
            
            <div class="col-right">
                <div class="login-form">
                    <h2>Login</h2>
                    <form action="" method="POST">
                        <p>
                            <label>Email address<span>*</span></label>
                            <input type="text" placeholder="Email" required name="email">
                        </p>
                        <p>
                            <label>Password<span>*</span></label>
                            <input type="password" placeholder="Password" required name="password">
                        </p>
                        <p>
                            <input type="submit" value="Sign In">
                        </p>
                        <a href="send_email.php" style="color:blue; font-size:13px;">Forgot Password?</a>
                    </form>
                </div>
            </div>

        </div>
    </div>


     <!--------------Footer ------------------->

     <div class="footer">
        <h3 class="explore">Explore</h3>
        <p><a class="explore-link" href="index.php"> <b>Home</b></a></p>
		<p><a class="explore-link" href="product_page.php"> <b>Products</b></a></p>
		<p><a class="explore-link" href="contact.php">Contact Us <b></b></a></p>
		<p><a class="explore-link" href="#"> <b>Join Us</b></a></p>
        <!-- <p>© Copyright 2022 - Mahadev Plywood and Hardware All Rights Reserved | Privacy Policy</p> -->
        <h3 class="contact-heading">CONTACT US</h3>
		<p class="contact-info"><i class="fa fa-map-marker"></i>  Rokadiya Hanuman temple near yard gate, Shop no :- 3/4, Porbandar</p>
		<p class="contact-info"><i class="fa fa-phone"></i> +91(63)5588-9599</p>
		<p class="contact-info"><i class="fa fa-envelope"></i>  mahadevplywood@gmail.com</p>
		<p class="contact-info"><i class="fa fa-globe"></i> www.mahadevshop.com</p>
    </div>

	

    <footer>
        <div class="footer-info">
            <span class="footer-title">MAHADEV PLYWOOD AND HARDWARE SHOP</span> <span class="copyright">&copy; All Right Reserved 2023</span>
        </div>
    </footer>


</body>
</html>