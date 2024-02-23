<?php
include 'connect.php';
session_start();
if(!isset($_SESSION['shopownerloggedin']) || $_SESSION['shopownerloggedin']!=true)
{
    header("location: shopowner_login.php");
    exit;
}


if(isset($_POST['add_category']))
{
    $category_Name = $_POST['cname'];
    // For Same Entry //
    $sel = "SELECT * FROM `category` WHERE Category_Name= '$category_Name'";
    $ressel = mysqli_query($conn,$sel);
    $number = mysqli_num_rows($ressel);
    if($number>0)
    {
        echo "
        <script>
        alert('Category already exist'); 
        </script>
        ";
    }
    else
    {
        $qry = "INSERT INTO `category`(`Category_Name`) VALUES ('$category_Name')";
        $res = mysqli_query($conn,$qry);
        if($res)
        {
            echo "
            <script>
            alert('Category Inserted Successfully'); 
            </script>
            "; 
        }
        else
        {
            echo "
            <script>
            alert('Server down please try again'); 
            </script>
            ";
        }
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/insert_product.css?v=<?php echo time();?>">   
    <title>Add Category</title>

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
    <link rel="stylesheet" href="css/add_product.css?v=<?php echo time();?>">    

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
                <a href="all_user_order.php">All Orders</a>
                <hr align="center">
            </div>
            <div class="url">
                <a href="add_product.php">Products</a>
                <hr align="center">
            </div>

            <div class="url">
                <a href="add_category.php" class="active">Categories</a>
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
            <form method="POST">
                <div class="form">
                    <div class="form-txt">
                    </div>
                    <div class="form-details">
                        <h2>Add Category</h2>
                        <input type="text" name="cname"  placeholder="Category Name" ><br>
                        <button name="add_category">Add Category</button>
                        <button name="view_products" style="background-color:#5783db; color:white;"><a style="color:white; text-decoration:none; background-color:#5783db;" href="view_category.php?view">View category</a></button>
                        </div>    
                    </div>
                </div>
            </form>     
</body>
</html>