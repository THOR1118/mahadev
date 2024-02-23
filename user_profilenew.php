<?php
include 'connect.php';
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
{
    header("location: login.php");
    exit;
}
else
{

$sel = "SELECT * FROM `user` WHERE `Email`='$_SESSION[username]'";
$query = mysqli_query($conn,$sel);
$result = mysqli_fetch_assoc($query);
}
?>



<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
  <link rel="stylesheet" href="css/user_profilenew.css?=<?php echo time();?>"> 
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <!-- <i class='bx bxl-c-plus-plus'></i> -->
      <img src="images/newlogo.jpg" alt="" style="height:150px; width:150px;">
      <!-- <spasn class="logo_name">CodingLab</span> -->
    </div>
      <ul class="nav-links">
        <li>
          <a href="user_profilenew.php?order" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Profile</span>
          </a>
        </li>
        
        <li>
          <a href="user_order.php">
          <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            <!-- <i class='bx bx-list-ul' ></i> -->
            <span class="links_name">My Orders</span>
          </a>
        </li>
        <li>
        <?php
            $select_user = "SELECT * FROM `user` WHERE `Email`='$_SESSION[username]'";
            $result_user = mysqli_query($conn,$select_user);
            while($row=mysqli_fetch_assoc($result_user))
            {
              $user_id = $row['user_id'];
            }
            ?>
          <a href="request.php?user_id=<?php echo $user_id;?>">
          <i class="fa fa-envelope" aria-hidden="true"></i>  
          <!-- <i class='bx bx-message' ></i> -->
            <span class="links_name">Worker Request</span>
          </a>
        </li>
        <li>
          <a href="send_email.php">
          <i class="fa fa-lock" aria-hidden="true"></i>
            <!-- <i class='bx bx-box' ></i> -->
            <span class="links_name">Reset Password</span>
          </a>
        </li>
        <li>
          <a href="update_profile.php?update_user_profile">
            <i class="fa fa-pencil" aria-hidden="true"></i>
            <span class="links_name">Update Profile</span>
          </a>
        </li>
        <li>
          <a href="">
          <i class="fa fa-trash" aria-hidden="true"></i>
            <form action="delete.php" method="POST" onclick="return confirm('Are you sure you want to Delete your Account <?php echo $_SESSION['username']; ?>?')">
                    <input type="hidden" name="id" value="<?php echo $result['Email']?>">
                    <input type="submit" name="delete" value="Delete Account" class="del"><br>
                </form>
            <!-- <span class="links_name">Delete Account</span> -->
          </a>
        </li>
     
      
        <li class="log_out">
          <a href="logout.php">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">User Profile</span>
      
      </div>
      <div class="search-box">
      <div class="header">
        <div class="container">
            <nav>
            <div class="menu-bar">
      <ul>
        
        <li><a href="loggedinpg.php" >Home</a></li>
        <li><a href="product_page.php" >Product</a></li>
        <li><a href='worker.php' >Workers</a></li>
        <li><a href="join_us.php" >Join Us</a></li>
        <li><a href="about_us.php" >About Us</a></li>
        <li><a href="contact.php" >Contact us</a></li>
        <li><a href="user_profilenew.php" >MyProfile</a>
        </li>
      </ul>
    </div>
      <!-- <h2><?php echo "Welcome ".$result['UserName'];?></h2> -->
      </div>
      
     
    </nav>

    <div class="home-content">
    <h2>&nbsp &nbsp My Profile</h2>
      <div class="overview-boxes">
        <div class="box">
     
			
                
         
                <table>
                    <tbody>
                        <tr>
                            <td>Name</td>
                            <td>&nbsp &nbsp &nbsp &nbsp &nbsp:&nbsp&nbsp </td>
                            <td><?php echo $result['UserName'];?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>&nbsp &nbsp &nbsp &nbsp &nbsp:&nbsp&nbsp </td>
                            <td><?php echo $result['Email'];?></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>&nbsp &nbsp &nbsp &nbsp &nbsp:&nbsp&nbsp </td>
                            <td><?php echo $result['Address'];?></td>
                        </tr>
                        <tr>
                            <td>Mobile Number</td>
                            <td>&nbsp &nbsp &nbsp &nbsp &nbsp:&nbsp&nbsp </td>
                            <td><?php echo $result['MobileNumber'];?></td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
        <?php


 

$username=$_SESSION['username'];
$get_details = "SELECT * FROM `user` WHERE Email='$username'";
$res = mysqli_query($conn,$get_details);
while($row_query=mysqli_fetch_array($res))
{
    // $user_id = $row_query['user_id'];
    if(isset($_GET['order']))
    {
        $get_order = "SELECT * FROM `user_order` WHERE  user_id='$user_id' AND order_status='pending'";
        $res_order = mysqli_query($conn,$get_order);
        $row_count = mysqli_num_rows($res_order);
        if($row_count>0)
        {
            echo "<h3 style='color:red;'>You have $row_count pending orders</h3>";
            echo "<p style='font-size:20px;'>Go to My orders Section for more details</p>";
        }

    }
}





   ?>

	<script src="./index.js"></script>
           
       
              
            </div>
          </div>
         
        </div>
        


  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>

</body>
</html>

