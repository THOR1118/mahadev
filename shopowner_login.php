<html>  
    <head>
    <link rel="stylesheet" href="css/shopowner_login.css?v=<?php echo time();?>">  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </head>
<body>

<!----------------------HEADER------------------>
<nav>
                <!-- <ul class="nav">
                    <img src="logo.png" class="logo">
                    <li><a href="Register.php">Register/Login</a></li>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="product_page.php">Products</a></li>
                    <li><a href="#">Join Us</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <i class="fa-solid fa-xmark"></i>
                </ul>
            </nav> -->





    
    <div class="wrapper login">
        <div class="container">
            <div class="col-left">
                <div class="login-text">





                <!---------------PHP--------->
                <?php
                    if($_SERVER['REQUEST_METHOD'] == "POST")
                    {
                       include 'connect.php';
                       
                       $email = $_POST['email'];
                       $password = $_POST['password'];
                    
                    
                    
                       if($email=="keshvalavijay99@gmail.com" && $password=="mahadevshopowner")
                       {
                        echo "Login Successfull";
                        session_start();
                        $_SESSION['shopownerloggedin'] = true;
                        $_SESSION['shopowner_name'] = $email;
                        header("location: shopowner_profile.php");
                       }
                       else
                       {
                        echo "
                        <script>
                        alert('Email Id or Password Incorrect!!');
                        window.location.href='shopowner_login.php';
                        </script>
                        ";                       
                       }
                    }
                    ?>




                   <!-------------FORM----------->
                   <div class="register-photo">
        <div class="form-container">
            <div class="image-holder"></div>
            <form method="POST">
                <h2 class="text-center"><strong>Shop Owner Login.</strong></h2>
                <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div>
                <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
               
                <div class="form-group">
                    <!-- <div class="form-check"><label class="form-check-label" style="color:red;"><input class="form-check-input" type="hidden">Contact Admin for Password Reset</label></div> -->
                </div>
                <div class="form-group"><button class="btn btn-success btn-block" type="submit">Sign Up</button></div>
                <label class="already"  style="color:red;">Contact admin for password reset
                <br><a href="index.php">Go back to website</a>
            </form>
        </div>
    </div>

        </div>
    </div>



    <!--------------Footer ------------------->

    <!-- <div class="footer">
        <h1>Mahadev Plywood And Hardware</h1>
        <p>© Copyright 2022 - Mahadev Plywood and Hardware All Rights Reserved | Privacy Policy</p>
    </div> -->



</body>
</html>