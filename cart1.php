<?php
include 'connect.php';

session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Shopping Cart UI</title>
	<link rel="stylesheet" href="cart.css?v=<?php echo time();?>"> 
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
                    <img src='logo.png' class='logo'>
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
             <img src='logo.png' alt='' class='logo1'>
             </a> 
            <ul>
            <li><a href='user_profile.php'>MyProfile</a></li>
            <li><a href='loggedinpg.php'>Home</a></li>
            <li><a href='product_page.php'>Product</a></li>
			<li><a style='	text-decoration: none; color:black;'href='join_us.php'>Join Us</a></li>
			<li><a style='	text-decoration: none; color:black;'href='about_us.php'>About Us</a></li>
            <li><a href='contact.php'>Contact us</a></li>
            </ul>
        </div>
    </div>
            </nav>";
		}
	?>













<?php
include 'connect.php';
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

$ip = getIPAddress(); 
$total = 0;
$cart_qry = "SELECT * FROM `cart` WHERE IP_address='$ip' ";
$res=mysqli_query($conn,$cart_qry);
$result_count = mysqli_num_rows($res);
if($result_count>0)
{
  echo "<h1>Shopping Cart</h1>
  <form action='' method='POST'>
  <div class='shopping-cart'>
  
    <div class='column-labels'>
      <label class='product-image'>Image</label>
      <label class='product-details'>Product</label>
      <label class='product-price'>Remove</label>
      <label class='product-quantity'>Quantity</label>
      <label class='product-removal'>Remove</label>
      <label class='product-line-price'>Total</label>
    </div>
  </div>";
while($row=mysqli_fetch_array($res))
{
	$pr_id = $row['Product_ID'];
	$sel_pr = "SELECT * FROM `product` WHERE Product_ID='$pr_id'";
	$res_pr=mysqli_query($conn,$sel_pr);
	while($row_pr_price=mysqli_fetch_array($res_pr))
	{
		$pr_price = array($row_pr_price['Product_Price']);
    $price_table = $row_pr_price['Product_Price'];
    $pr_title = $row_pr_price['Product_Name'];
    $pr_img = $row_pr_price['Product_img']; 
    $pr_des = $row_pr_price['Product_Description'];
?>
 <div class="product">
    <div class="product-image">
      <img src="<?php echo $pr_img ?>">
    </div>
    <div class="product-details">
      <div class="product-title"><b><?php echo $pr_title?></b></div>
      <p class="product-description"><?php echo $pr_des?></p>
    </div>
    <div class="product-price"><input type="checkbox"  name="removeitem[]" value="<?php echo $pr_id?>"></div>
    <?php echo $price_table?> <input type="hidden" class="iprice" value="<?php echo $price_table?>">
    <div class="product-quantity">
      <input type="number" min="1" max="5" value="1" name="qty" class="iquantity" onchange="subtotal()">
    </div>
    <div class="product-removal">
      <input type="submit" value="Remove" name="remove_cart" class="remove-product">
    </div>
    <td class="itotal"> <?php  echo '<script>var iprice=document.getElementsByClassName("iprice");
    var iquantity=document.getElementsByClassName("iquantity");
    var itotal=document.getElementsByClassName("itotal");

    function subtotal()
    {
        int i;
        for(i=0;i<iprice.length;i++)
        {
            itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
        }
    }
    subtotal();</script>';?></td>
       
  </div>
  <?php
  }
} 
}
else
{
  echo "<h2 style='font-size:30px; text-align:center; color:red; margin-top:-100px;'>Your Cart is Empty!</h2>";
  echo "<a href='product_page.php'>
  <input type='submit' name='continue_shopping' value='Continue Shopping' class='continueshopping'>
  </a>";
}
?>



<script>
    var iprice=document.getElementsByClassName('iprice');
    var iquantity=document.getElementsByClassName('iquantity');
    var itotal=document.getElementsByClassName('itotal');

    function subtotal()
    {
        int i;
        for(i=0;i<iprice.length;i++)
        {
            itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
        }
    }

    subtotal();
</script> 



    
</body>
</html>