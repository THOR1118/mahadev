<?php
include 'connect.php';
session_start();
if(!isset($_SESSION['shopownerloggedin']) || $_SESSION['shopownerloggedin']!=true)
{
    header("location: shopowner_login.php");
    exit;
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
     
    </div>
            </nav>
        </div>




    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>

    <!-- Custom Css -->
    <link rel="stylesheet" href="css/shopowner_profile.css?v=<?php echo time();?>">    

    <!-- FontAwesome 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
</head>
<body>
    </div>
    <!-- End -->









    
    <!------------------------Sidenav---------------------------->
    <div class="sidenav">
        <div class="profile">
            <img src="images/mahadevlogo.jpg" alt="" width="200" height="200">

            <div class="name">
            <?php 
                echo "Welcome Keshvala Vijay";
                ?>
            </div>
        </div>

        <div class="sidenav-url">
            <div class="url">
                <a href="shopowner_profile.php" class="active">Profile</a>
                <hr align="center">
            </div>
            <div class="url">
                <a href="all_user_orders.php?view_all_order">All Orders</a>
                <hr align="center">
            </div>
            <div class="url">
                <a href="add_product.php">Products</a>
                <hr align="center">
            </div>

            <div class="url">
                <a href="add_category.php">Categories</a>
                <hr align="center">
            </div>

            <!-- <div class="url">
                <a href="all_user_payment.php">All Payments</a>
                <hr align="center">
            </div> -->
           
            <div class="url">
                <a href="shopowner_dispworker.php">All Workers</a>
                <hr align="center">
            </div>

            <div class="url">
            <a href="view_feedback.php">View Feedbacks</a>
                <div class="url">
                <a href="shopowner_logout.php">Logout</a>
            </div>

            

            </div>
        </div>
    </div>
    <!-- End -->






   <!----------------------------Main CARD--------------------------->
    <div class="main">
        <h2>Shop Owner  Profile</h2>
        <div class="card">
            <div class="card-body">
                <a href="update_profile.php">
                </a>
                <table>
                    <tbody>
                        <tr>
                            <td>Name</td>
                            <td>:</td>
                            <td>Mahadev Plywood and Hardware</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><?php echo $_SESSION['shopowner_name'];?></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>:</td>
                            <td>Near Yard Gate Porbandar Shop No:- 3/4</td>
                        </tr>
                        <tr>
                            <td>Mobile Number</td>
                            <td>:</td>
                            <td>9876543210</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <h4 style="color:red;">Please check All Orders section regurarly for newly placed order</h4>
</body>
</html>
