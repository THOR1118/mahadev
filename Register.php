
<html>  
    <head>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="css/register.css?v=<?php echo time();?>">         
    </head>
<body>



<!-----------------------HEADER--------------------->


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



    
    <div class="wrapper login">
        <div class="container">
            <div class="col-left">
                <div class="login-text">




<!--------------------------Number Validation------------------------>
<script>
    function myfun()
    {
        var a = document.getElementById("mobile").value;

        if(isNaN(a))
        {
            alert('Only Number allowed');
            return false;
        }

        if(a.length<10)
        {
            alert('Must be of 10 digits');
            return false;
        }


        if((a.charAt(0)!=9) && (a.charAt(0)!=8) && (a.charAt(0)!=7) && (a.charAt(0)!=6))
        {
            alert('Must Start with 9,8,7 or 6');
            return false;
        }
    }
</script>















<!----------------------PHP ----------------------->

                <?php
if($_SERVER['REQUEST_METHOD'] == "POST")
{
   include 'connect.php';
  
   $username = $_POST['uname'];
   $email = $_POST['email'];
   $address = $_POST['address'];
   $password = $_POST['password'];
   $mobile = $_POST['mobileno'];
   $user_ip = getIPAddress();


   $hash = password_hash($password,PASSWORD_DEFAULT);
   $sql = "INSERT INTO `user` (`user_ip`,`UserName`, `Email`, `Address`, `Password`, `MobileNumber`) 
   VALUES ('$user_ip','$username', '$email', '$address', '$hash', '$mobile')";
   $result = mysqli_query($conn, $sql);
   if($result)
   {
    session_start();
    $_SESSION['registered_user'] = $email;
    echo "
        <script>
        alert('Registered Successfully');
        window.location.href='login.php';
        </script>
        ";
   }
   else
   {
    echo "
        <script>
        alert('User Already Registered');
        window.location.href='Register.php';
        </script>
        ";
   }
}



function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
  //whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
  }  


?>


<!------------------FORM DESIGN---------------->

            </div>
        </div>
        <div class="container" id="container">
<div class="form-container sign-in-container">
    <h1>Already Registered?</h1>
    <p>To keep connected with us please login with your personal info</p>
    <a href="login.php">
	<a href="login.php" class="btn">Sign In</a>
    </a>		
	</div>
	
	<div class="overlay-container">
		<div class="overlay">
            <div class="overlay-panel overlay-right">
            <form name="form" action="" method="POST" onsubmit="return myfun()">
			<h1>Create Account</h1>
			<input type="text" placeholder="Username" required name="uname">
			<input type="email" placeholder="Email" required name="email">
			<input type="text" placeholder="Address" required name="address" maxlength=50>
			<input type="password" placeholder="Password" required name="password" minlength=8 maxlength=20>
			<input type="text"  maxlength=10 id="mobile" required name="mobileno" placeholder="Mobile Number">
			<input type="submit" value="Sign Up"> 
		    </form>
			</div>
		</div>
	</div>
</div>

<!--------------Footer ------------------->
<!-- 
    <div class="footer">
        <h3 class="explore">Explore</h3>
        <p><a class="explore-link" href="index.php"> <b>Home</b></a></p>
		<p><a class="explore-link" href="product_page.php"> <b>Products</b></a></p>
		<p><a class="explore-link" href="contact.php">Contact Us <b></b></a></p>
		<p><a class="explore-link" href="#"> <b>Join Us</b></a></p>
        <p>© Copyright 2022 - Mahadev Plywood and Hardware All Rights Reserved | Privacy Policy</p>
        <h3 class="contact-heading">CONTACT US</h3>
		<p class="contact-info"><i class="fa fa-map-marker"></i>  Rokadiya Hanuman temple near yard gate, Shop no :- 3/4, Porbandar</p>
		<p class="contact-info"><i class="fa fa-phone"></i> +91(63)5588-9599</p>
		<p class="contact-info"><i class="fa fa-envelope"></i>  mahadevplywood@gmail.com</p>
		<p class="contact-info"><i class="fa fa-globe"></i> www.mahadevshop.com</p>
    </div>

	

    <footer>
        <div class="footer-info">
            <span class="footer-title">Mahadev Plywood and Hardware Shop</span> <span class="copyright">&copy; All Right Reserved 2023</span>
        </div>
    </footer> -->
			



</body>
</html>

