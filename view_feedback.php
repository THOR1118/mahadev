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
<link rel="stylesheet" href="insert_product.css?v=<?php echo time();?>">   
    <title>View Feedback</title>

    <div class="header">
        <a href="newlogo.png">
        </a>
        <div class="container">
            <nav>
            <div class="menu-bar">      
     
    </div>
            </nav>
        </div>
</head>
<body>





    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>

    <!-- Custom Css -->
    <link rel="stylesheet" href="css/view_feedback.css?v=<?php echo time();?>">    

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
                <a href="shopowner_profile.php">Profile</a>
                <hr align="center">
            </div>
            <div class="url">
                <a href="all_user_orders.php">All Orders</a>
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
            <a href="view_feedback.php" class="active">View Feedbacks</a>
                <div class="url">
                <a href="shopowner_logout.php">Logout</a>
            </div>
            </div>
        </div>
    </div>
    <!-- End -->
    <div class="main">
    <h3>Customer Feedback</h3>
        <div class="card">
            <table> 
            <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Feedback</th>
        </tr>
        <?php
         include 'connect.php';
         $sql = "SELECT * FROM feedback";
         $res = mysqli_query($conn,$sql);
         while($row=mysqli_fetch_array($res))
         {?>
            <tr>
                <td><?php echo $row['UserName']?></td>
                <td><?php echo $row['Email']?></td>
                <td><?php echo $row['Message']?></td>
            </tr>
            <?php
         }
        ?>
        </div>
        </div>
        </div>



</body>
</html>