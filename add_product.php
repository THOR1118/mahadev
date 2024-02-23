<?php
include 'connect.php';
session_start();
if(!isset($_SESSION['shopownerloggedin']) || $_SESSION['shopownerloggedin']!=true)
{
    header("location: shopowner_login.php");
    exit;
}
if(isset($_POST['submit']))
{
    
    $pr_name = $_POST['pname'];
    $pr_price = $_POST['pprice'];
    $pr_des = $_POST['pdes'];
    // $pr_qun = $_POST['pquantity'];
    $pr_cat = $_POST['category'];

    // Image //
    $pr_img = $_FILES['product_img']['name'];

    // Temporary Name for image //
    $tmp_img = $_FILES['product_img']['tmp_name'];

  
    
        if($pr_name=='' or $pr_price=='' or  $pr_des=='' or $pr_cat=='' or $pr_img=='')
        {
            echo "
            <script>
            alert('Please Enter All Fields');
            </script>
            ";  
        }
        else
        {
            $extension = pathinfo($_FILES["product_img"]["name"], PATHINFO_EXTENSION);
            if($extension=='jpg' || $extension=='jpeg' || $extension=='png')
            {
                // Image //
                $pr_img = $_FILES['product_img']['name'];

                 // Temporary Name for image //
                 $tmp_img = $_FILES['product_img']['tmp_name'];
                move_uploaded_file($tmp_img,"./product_img/$pr_img");
            // Insert qry //
            $qry = "INSERT INTO `product`(`Product_Name`, `Product_Price`, `Product_Description`, `Category_ID`,
             `Product_img`) VALUES ('$pr_name ','$pr_price','$pr_des','$pr_cat','$pr_img')";
             $res = mysqli_query($conn,$qry);
             if($res)
             {
                echo "
                <script>
                alert('Product Inserted Successfully');
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
            else
            {
                echo "
                <script>
                alert('File type not valid!');
                </script>
                ";
            }    
        }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/add_product.css?v=<?php echo time();?>">   
    <title>Add Product</title>

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
    <link rel="stylesheet" href="add_product.css?v=<?php echo time();?>">    

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
                <a href="add_product.php" class="active">Products</a>
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
           
            <!-- <div class="url">
                <a href="all_user_display.php.php">All Users</a>
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
            <form method="POST" enctype="multipart/form-data">
                <div class="form">
                    <div class="form-txt">
                    </div>
                    <div class="form-details">
                        <h2>Add Products</h2>
                        <!-- <input type="text" name="pid"  placeholder="Product ID" required> -->
                        <input type="text" name="pname"  placeholder="Product Name" >
                        <input type="text" name="pprice"  placeholder="Product Price" >
                        <input type="text" name="pdes"  placeholder="Product Description" >
                        <!-- <input type="text" name="pquantity"  placeholder="Product Quantity" > -->
                        <select name="category" class="select_cat">
                            <option value="">Select Categories</option>
                            <?php
                            $qry = "SELECT * FROM `category`";
                            $res = mysqli_query($conn,$qry);
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $category_name = $row['Category_Name'];
						        $category_ID = $row['Category_ID'];
                                // echo "<option value='$category_ID'>$category_name</option>";
                                echo "<option value='$category_ID'>$category_name</option>";
                            }
                            ?>
                        </select>
                        
                        <input type="file" name="product_img"  placeholder="Product Image"  class="select_img">
                        <br>
                        <button name="submit">Add Product</button>
                        <a class="view" href="view_products.php">View Products</a>
                        
                        </div>    
                    </div>  
                </div>
            </form>
            
</body>
</html>