<?php
include 'connect.php';
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
{
    header("location: newlogin.php");
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
<html lang="en">
<head>




 <!------------------------ Header Section ----------------------->

    <div class="header">
        <a href="newlogo.png">
        </a>
        <div class="container">
            <nav>
            <div class="menu-bar">      
                <ul>
        <li><a href="loggedinpg.php">Home</a></li>
        <li><a href="product_page.php">Product</a></li>
        <li><a href="worker.php">Workers</a></li>
        <li><a href="join_us.php">Join Us</a></li>
        <li><a href="about_us.php">About Us</a></li>
        <li><a href="contact.php">Contact us</a></li>
        <li><a href="user_profile.php">MyProfile</a></li>

    </ul>
    </div>
            </nav>
        </div>




    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>

    <!-- Custom Css -->
    <link rel="stylesheet" href="css/user_profile.css?v=<?php echo time();?>">    

    <!-- FontAwesome 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
</head>
<body>
    </div>
    <!-- End -->









    
    <!------------------------Sidenav---------------------------->
    <div class="sidenav">
        <div class="profile">
            <img src="images/logo.png" alt="" width="200" height="200">

            <div class="name">
            <?php 
                echo $result['UserName'];?>
            </div>
        </div>

        <div class="sidenav-url">
            <div class="url">
                <a href="user_profile.php?order" class="active">Profile</a>
                <hr align="center">
            </div>
            <div class="url">
                <a href="send_email.php">Reset Password</a>
                <hr align="center">
            </div>
            <div class="url">
                <a href="user_order.php">My Orders</a>
                <hr align="center">
            </div>
            <?php
            $select_user = "SELECT * FROM `user` WHERE `Email`='$_SESSION[username]'";
            $result_user = mysqli_query($conn,$select_user);
            while($row=mysqli_fetch_assoc($result_user))
            {
              $user_id = $row['user_id'];
            }
            ?>
            <div class="url">
                <a href="request.php?user_id=<?php echo $user_id;?>">Worker Requst</a>
                <hr align="center">
            </div>
           
            <div class="url">
                <form action="delete.php" method="POST" onclick="return confirm('Are you sure you want to Delete your Account?')">
                    <input type="hidden" name="id" value="<?php echo $result['Email']?>">
                    <input type="submit" name="delete" value="Delete Account" class="btn"><br>
                     <hr align="center">
                </form>
                <div class="url">
                <a href="logout.php">Logout</a>
                
            </div>
            </div>
        </div>
    </div>
    <!-- End -->




   <!----------------------------Main CARD--------------------------->
    <div class="main">
        <h2>My Profile</h2>
        <div class="card">
            <div class="card-body">
                <a href="update_profile.php?update_user_profile">
                <i class="fa fa-pen fa-xs edit" style="color:black;"></i>
                </a>
                <table>
                    <tbody>
                        <tr>
                            <td>Name</td>
                            <td>:</td>
                            <td><?php echo $result['UserName'];?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><?php echo $result['Email'];?></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>:</td>
                            <td><?php echo $result['Address'];?></td>
                        </tr>
                        <tr>
                            <td>Mobile Number</td>
                            <td>:</td>
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
    $user_id = $row_query['user_id'];
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
</body>
</html>



