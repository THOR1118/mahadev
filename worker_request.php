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
  	<title>Worker Request</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,700" rel="stylesheet" type="text/css">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/worker_request.css?v=<?php echo time();?>">  

	</head>


        



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
            <li><a href='user_profilenew.php'>MyProfile</a></li>
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
if($_SERVER['REQUEST_METHOD'] == "POST")
{
   include 'connect.php';
   
          



     
   if (isset($_GET['w_id']) ) {
    $workerid = $_GET['w_id'];
    $sel = "SELECT * FROM `user` WHERE `Email`='$_SESSION[username]'";
            $res = mysqli_query($conn,$sel);
            while($row=mysqli_fetch_assoc($res))
            {
              $user_id = $row['user_id'];
            }
    $select_worker = "SELECT * FROM `worker` WHERE worker_id = $workerid";
          $result_worker=mysqli_query($conn,$select_worker);
          while($row_worker=mysqli_fetch_array($result_worker))
          {
            $worker_name = $row_worker['worker_name'];
            $worker_email = $row_worker['email'];
            $worker_number = $row_worker['mobile_number'];
          }
   if (isset($_POST['request'])) {
    
   
   $user_ip = getIPAddress();
   $custname = $_POST['cname'];
   $email = $_POST['email'];
   $requestinfo = $_POST['information'];
   $date =  date("y/m/d");
   $address = $_POST['address'];
   $mobile = $_POST['mobileno'];

   $sel = "SELECT * FROM `work_order` WHERE Email = '$email'";
   $res = mysqli_query($conn, $sel);
   if ($res) 
   {
    $sql = "INSERT INTO `work_order` (`worker_id`,`worker_name`,`worker_email`,`worker_number`,`user_id`,`user_ip`,`Customername`, `Email`, `Request_Info`, `Date_of_order`, `customer_address`,`Mb_no`) 
    VALUES ('$workerid','$worker_name','$worker_email','$worker_number','$user_id','$user_ip','$custname', '$email', '$requestinfo', '$date', '$address','$mobile')";
    $result = mysqli_query($conn, $sql);
    echo "
    <script>
    alert('Your order request is submitted');
    window.location.href='worker.php';
    </script>
    ";
   }
   else
   {
    echo "
    <script>
    alert('Server down!');
    window.location.href='worker_details.php';
    </script>
    ";
   }
   }
}
}
?>

<div class="container">
  <div class="info">
    <h1>Worker Request</h1>
  </div>
</div>
<div class="form">
  <div class="thumbnail"><img src="images/hand.jpg" style="height:100%; width:100%;" /></div>
  <form name="form" class="login-form" action="" method="POST" onsubmit="return myfun()"> <form >
  <input type="text" placeholder="Username" required name="cname">
  <input type="email" placeholder="Email" required name="email">
  <input type="text" placeholder="Request Info" required name="information" maxlength=50>
  <!-- <input type="date" placeholder="Date" required name="Date" > -->
  <input type="text" placeholder="Address" required name="address" maxlength=50>
  <input type="text" placeholder="Mobile Number" maxlength=10 id="mobile" required name="mobileno">
    <input type="submit"  name="request" value="Send Request">
    <!-- <p class="message">Not registered? <a href="#">Create an account</a></p> -->
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