<?php
include 'connect.php';

session_start();
if(!isset($_SESSION['cart']))
{
  header("location: product_page.php");
}
$cart = $_SESSION['cart'];
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
{
    header("location: login.php");
    exit;
}


// print_r($cart);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Shopping Cart UI</title>
	<link rel="stylesheet" href="css/cart.css?v=<?php echo time();?>"> 
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,900" rel="stylesheet">
</head>
<body>
  <?php


if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
		{
			echo "<div class='container'>
            <nav>
                <ul class='nav'>
                <a href='index.php'>
                    <img src='images/logo.png' class='logo'>
                    </a>
                    <li><a style='	text-decoration: none; color:black;' href='Register.php'>Register/Login</a></li>
                    <li><a style='	text-decoration: none; color:black;'href='index.php'>Home</a></li>
                    <li><a style='	text-decoration: none; color:black;'href='product_page.php'>Products</a></li>
                    <li><a style='	text-decoration: none; color:black;'href='join_us.php'>Join Us</a></li>
                    <li><a style='	text-decoration: none; color:black;'href='about_us.php'>About Us</a></li>
                    <li><a style='	text-decoration: none; color:black;'href='contact.php'>Contact Us</a></li>
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
        <div class='container'>
            <nav>
            <div class='menu-bar'>
            <a href='index.php'>
             <img src='images/logo.png' alt='' class='logo1'>
             </a> 
            <ul>
            <li><a href='user_profile.php'>MyProfile</a></li>
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






 

  <div class='shopping-cart'>
  
  <div class='column-labels'>
    <label class='product-image'>Image</label>
    <label class='product-details'>Product</label>
    <label class='product-price'>Price</label>
    <label class='product-quantity'>Quantity</label>
    <label class='product-removal'>Remove</label>
    <label class='product-line-price'>Total</label>
  </div>
</div>


<?php
$total=0;
foreach($cart as $key => $value)
{
  // echo $key ." : ".$value['quantity']."<br>"; 

  $sql = "SELECT * FROM `product` WHERE Product_ID = $key";
	$result=mysqli_query($conn,$sql);
  $row_sql = mysqli_fetch_assoc($result);
  $pr_id=$row_sql['Product_ID'];
?>

  <div class="product">
    <div class="product-image">
      <img src="product_img/<?php echo $row_sql['Product_img']; ?>">
    </div>
    <div class="product-details">
      <!-- <?php echo $ip; ?> -->
      <div class="product-title"><b><?php echo $row_sql['Product_Name'];?></b></div>
      <p class="product-description"><?php echo $row_sql['Product_Description']?></p>
    </div>
    <div class="product-price"><p> <?php echo "Rs ".$row_sql['Product_Price']."/-";?></p></div>
    <div class="product-quantity">
    <p class="product-description"><?php echo $value['quantity']; $qun = $value['quantity'];?></p>
      <!-- <input type="number" min="1" max="5" value="1" name="qty"> -->
      <?php
      ?>
    </div>
    <div class="product-removal">
      <a href="delete_cart_item.php?id=<?php echo $key;?>" class="remove-product" style="text-decoration:none;">Delete</a>
      <!-- <input type="submit" value="Update" name="update_cart" class="update-product"> -->
    </div>
    <p class="totalpr"><?php echo "Rs ".$row_sql['Product_Price'] * $value['quantity']."/-";
    $total = $total + $row_sql['Product_Price'] * $value['quantity'];
    ?></p>
    <!-- <div class="product-line-price"><?php echo $price_table ?></div> -->
  </div>
  <?php
}  
if(!isset($value))
{
  echo "<h2 style='font-size:30px; text-align:center; color:red; margin-top:-100px;'>Your Cart is Empty!</h2>";
}


?>

<?php
$user = "SELECT * FROM `user` WHERE `Email`='$_SESSION[username]'";
$res_user=mysqli_query($conn,$user);
$row_user = mysqli_fetch_assoc($res_user);
?>


<p class="subtotal"><b>Total Amount:</b> <?php echo "Rs ".$total. "/-";?></p>

<a href="product_page.php"  class='continueshopping'>Continue Shopping</a>
<a href="checkout_page.php?user_id=<?php echo $row_user['user_id'];?>">
<input type="submit" value="Checkout" class='checkout' name="checkout_order"></a>

<!-- <input type='submit' name='checkout_order' value='Checkout' class='checkout'> -->
    </form>

    <?php


if(isset($_GET['checkout_order']))
{
  $ins = "INSERT INTO `cart`(`Product_ID`, `IP_address`, `Quantity`) VALUES ('$pr_id','$get_ip','$qun')";
  $res_ins = mysqli_query($conn,$ins);
  if($res_ins)
  {
    echo "
        <script>
        alert('Order are submitted successfully!');
        
        </script>
        ";
  }
}

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
$get_ip =  getIPAddress();

?>







      <!-------------------Function for remove item from cart------------------>

      <?php

         if(isset($_POST['remove_cart']))
         {
          foreach($_POST['removeitem'] as $remove_id)
          {
            echo $remove_id;
            $del = "DELETE FROM `cart` WHERE Product_ID=$remove_id";
            $res_del = mysqli_query($conn,$del);
            if($res_del)
            {
              echo "
            <script>
            window.location.href='cart.php';
            </script>
            ";
            }
          }
         }


      ?>



<!---------------------Code for getting user ID--------------------->





</div>
</body>
</html>