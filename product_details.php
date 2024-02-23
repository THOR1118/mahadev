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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/product_details.css?v=<?php echo time();?>">
</head>
<body>
<div class="header">
        <div class="container">
            <nav>
            <div class="menu-bar">
            <a href='index.php'>
             <img src="images/logo.png" alt="" class="logo">
</a> 
            <ul>
              </li>
              <li><a href="loggedinpg.php">Home</a></li>
              <li><a href="product_page.php">Product</a></li>
              <li><a href="worker.php">Worker</a></li>
              <li><a href="join_us.php">Join Us</a></li>
              <li><a href="about_us.php">About Us</a></li>
              <li><a href="contact.php">Contact us</a></li>
              <li><a href="user_profile.php">MyProfile</a>
            </ul>
        </div>
    </div>
            </nav>	
<main class="container">
 

<!-- //------------------------------ For displaying Single product details------------------------------ // -->



<?php
include 'connect.php';
if(isset($_GET['Product_ID']))
{
if(!isset($_GET['category']))
{
    $pr_id = $_GET['Product_ID']; 
$sel = "SELECT * FROM `product` WHERE Product_ID=$pr_id";
$res = mysqli_query($conn,$sel);
while($row=mysqli_fetch_assoc($res))
{
    $pr_id = $row['Product_ID'];
    $pr_name = $row['Product_Name'];
    $pr_price = $row['Product_Price'];
    $pr_des = $row['Product_Description'];
    // $pr_qun = $row['Product_Stock'];
    $pr_cat = $row['Category_ID'];
    $pr_img = $row['Product_img'];
    // <!-- Left Column / Headphones Image -->
    echo "<div class='left-column'>
      <img data-image='red' class='active' src='./product_img/$pr_img' alt=''>
    </div> 
    <div class='right-column'>


   <div class='product-description'>
     <h1>$pr_name</h1>
     <p>$pr_des</p>

   </div>
   <form action='add_to_cart.php'>
   <input type='hidden' name='add_to_cart' value='$pr_id'>
   <input type='number' name='quantity' max='5' required placeholder='Enter Quantity' style='position:relative; bottom:10px;'>

   <div class='product-configuration'>


   
   <div class='product-price'>
     <span>$pr_price</span>
     <button type='submit' class='cart-btn'>Add to cart</button>    
   </div>
 </div>
 </form>
 ";


    // $ip = getIPAddress();  
    // echo 'User Real IP Address - '.$ip;  

}
}
}


//------------------------------ Function for IP address ------------------------------ //

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


//------------------------------ For inserting data in cart table------------------------------ //

if(isset($_GET['add_to_cart']))
{
    include 'connect.php';
    $ip = getIPAddress(); 
    $get_pr_id = $_GET['add_to_cart'];
    $sel = "SELECT * FROM `cart` WHERE IP_address='$ip' and Product_ID='$get_pr_id'";
    $res = mysqli_query($conn,$sel);
    $row = mysqli_num_rows($res);
	if($row>0)
	{
		 echo "
        <script>
        alert('Item already present inside the cart');
        window.location.href='product_page.php';
        </script>
        ";
	}
    else
    {
        $insert="INSERT INTO `cart`(`Product_ID`, `IP_address`, `Quantity`) VALUES ('$get_pr_id','$ip','1')";
        $res = mysqli_query($conn,$insert);
        echo "
        <script>
        alert('Item added to Cart successfully!');
        window.location.href='product_page.php';
        </script>
        ";
    }
}


// //------------------------------ For displaying cart details------------------------------ //

// if(isset($_GET['add_to_cart']))
// {
//     include 'connect.php';
//     $ip = getIPAddress(); 
//     $sel = "SELECT * FROM `cart` WHERE IP_address='$ip'";
//     $res = mysqli_query($conn,$sel);
//     $count_cart_items = mysqli_num_rows($res);
// }
//     else
//     {
//         $ip = getIPAddress(); 
//         $sel = "SELECT * FROM `cart` WHERE IP_address='$ip'";
//         $res = mysqli_query($conn,$sel);
//         $count_cart_items = mysqli_num_rows($res);
//     }
//     echo $count_cart_items;
// ?>




 <!-- Left Column / Headphones Image -->
 <!-- <div class="left-column"> -->
   <!-- <img data-image="black" src="images/black.png" alt="">
   <img data-image="blue" src="images/blue.png" alt=""> -->
   <!-- <img data-image="red" class="active" src="worker1.jpg" alt=""> -->
 <!-- </div> -->


 <!-- Right Column -->
 <!-- <div class="right-column"> -->

   <!-- Product Description -->
   <!-- <div class="product-description"> -->
     <!-- <span>Headphones</span> -->
     <!-- <h1>Beats EP</h1> -->
     <!-- <p>The preferred choice of a vast range of acclaimed DJs. Punchy, bass-focused sound and high isolation. Sturdy headband and on-ear cushions suitable for live performance</p> -->
   <!-- </div> -->

   <!-- Product Configuration -->
   <!-- <div class="product-configuration"> -->



     
   <!-- Product Pricing -->
   <!-- <div class="product-price"> -->
     <!-- <span>148$</span> -->
     <!-- <a href="#" class="cart-btn">Add to cart</a> -->
   <!-- </div> -->
 <!-- </div> -->
</main>
</body>
</html>


