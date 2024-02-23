<?php
include 'connect.php';
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
{
    header("location: newlogin.php");
    exit;
}

if(isset($_GET['update_user_profile']))
{
    $user_session_name = $_SESSION['username'];
    $user_qry="SELECT * FROM `user` WHERE Email='$user_session_name'";
    $res_user=mysqli_query($conn,$user_qry);
    $row_fetch=mysqli_fetch_assoc($res_user);
    $get_user_id=$row_fetch['user_id'];
    $get_user_name=$row_fetch['UserName'];
    $get_user_email=$row_fetch['Email'];
    $get_user_address=$row_fetch['Address'];
    $get_user_mobile=$row_fetch['MobileNumber'];
}
?>




<html>  
    <head>
    <link rel="stylesheet" href="css/update_profile.css?v=<?php echo time();?>">  
    </head>
<body>

<!----------------------HEADER------------------>

<nav>
                <ul class="nav">
                <a href='index.php'>
                    <img src="images/logo.png" class="logo">
</a>
<li><a href="loggedinpg.php">Home</a></li>
<li><a href="product_page.php">Products</a></li>
<li><a href="join_us.php">Join Us</a></li>
<li><a href="about_us.php">About Us</a></li>
<li><a href="contact.php">Contact Us</a></li>
<i class="fa-solid fa-xmark"></i>
<li><a href="user_profilenew.php">Myprofile</a></li>
                </ul>
            </nav>





    
    <div class="wrapper login">
        <div class="container">
            <div class="col-left">
                <div class="login-text">





                   <!-------------FORM----------->
                    <h2>My Profile!</h2>
                    <p>Update Your Profile</p>
                </div>
            </div>

            <div class="col-right">
                <div class="login-form">
                    <h2>UPDATE PROFILE</h2>
                    <form action="" method="POST" onsubmit="return myfun()">
                    <p>
                            <label>Username<span>*</span></label>
                            <input type="text" placeholder="Username" value="<?php echo $get_user_name ?>" name="uname">
                        </p>
                        <p>
                            <label>Email<span>*</span></label>
                            <input type="email" placeholder="Email"  value="<?php echo $get_user_email ?>" required name="email">
                        </p>
                        <p>
                            <label>Address<span>*</span></label>
                            <input type="text" placeholder="Address"  value="<?php echo $get_user_address ?>" required name="address" maxlength=50>
                        </p>

                        <p>
                            <label>Mobile Number<span>*</span></label>
                            <input type="text"  maxlength=10 id="mobile"  value="<?php echo $get_user_mobile ?>" required name="mobileno">
                        </p>

                        <p>
                            <input type="submit" name="update" value="UPDATE PROFILE">
                        </p>

                        <p>
                            <a href="send_email.php" style="color:blue;">Forgot Password?</a>
                        </p>
                    </form>
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


<!---------------PHP--------->


<?php
include 'connect.php';

if(isset($_POST['update']))
{
    $mobileno = $_POST['mobileno'];
    $id = $_POST['email'];
    $name = $_POST['uname'];
    $address = $_POST['address'];
    $query="SELECT * FROM `user` WHERE 	`Email`='$_POST[email]'";
    $result=mysqli_query($conn,$query);
    if($result)
    {
       if(mysqli_num_rows($result)==1)
       {
       $update="UPDATE user SET UserName='$name',Address='$address' ,MobileNumber='$mobileno' WHERE Email='$id'";
        if(mysqli_query($conn,$update))
        {
            echo "
            <script>
            alert('Profile Updated Successfully');
            window.location.href='loggedinpg.php';
            </script>
            ";
        }
        else
        {
            echo "
            <script>
            alert('Server Down Try Again Later');
            window.location.href='loggedinpg.php';
            </script>
            ";
        }
       }
       else
       {
        echo "
        <script>
        alert('Invalid Email Address');
        window.location.href='update_profile.php';
        </script>
        ";
       }
    }
    else
    {
        echo "
        <script>
        alert('cannot run query');
        window.location.href='update_profile.php';
        </script>
        ";
    }
}
?>









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
