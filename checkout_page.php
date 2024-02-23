<?php
include 'connect.php';

session_start();
if(!isset($_SESSION['cart']))
{
  header("location: product_page.php");
}
						$cart = $_SESSION['cart'];
						$total=0;
						foreach($cart as $key => $value)
						{
						//   echo $key ." : ".$value['quantity']."<br>"; 
						  $sql = "SELECT * FROM `product` WHERE Product_ID = $key";
							$result=mysqli_query($conn,$sql);
						  $row_sql = mysqli_fetch_assoc($result);
						  $pr_id=$row_sql['Product_ID'];
						   $row_sql['Product_Price'] * $value['quantity']."/-";
						   $total = $total + $row_sql['Product_Price'] * $value['quantity'];	
						}
						
// echo "<pre>";
// print_r($cart);
// echo "</pre>";

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
{
    header("location: login.php");
    exit;
}
if(isset($_GET['user_id']))
{
  $user_id = $_GET['user_id'];
}

if(isset($_POST['checoutbtn']))
  {
    $amount=$_POST['amount'];
    $payment_mode=$_POST['payment-mode'];
    $name=$_POST['fullname'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $zip=$_POST['zip'];
    $date = date("Y/m/d"); 
    
    $sql_check = "SELECT * FROM `user_info` WHERE user_id = $user_id";
    $res_check = mysqli_query($conn,$sql_check);
    $already = mysqli_fetch_assoc($res_check);
    if(mysqli_num_rows($res_check) == 1)
    {
      // update query
      foreach($cart as $key => $value)
      {
      //   echo $key ." : ".$value['quantity']."<br>"; 
        $sql_new = "SELECT * FROM `product` WHERE Product_ID = $key";
        $result_new=mysqli_query($conn,$sql_new);
        $row_sql_new = mysqli_fetch_assoc($result_new);
        $pr_id=$row_sql_new['Product_ID'];
        $pname=$row_sql_new['Product_Name'];
        $quantity = $value["quantity"];	
        $pr_img = $row_sql_new['Product_img'];
        // move_uploaded_file($tmp_img,"./images/$pr_img");

      $insert_data_new = "INSERT INTO `user_info` (`user_id`,`product_id`,`product_name`,`product_img`,`quantity`, `amount`, `payment_mode`,`customer_name`, `customer_email`, `customer_address`, `customer_city`, `customer_state`, `customer_zip`, `payment_date`) 
      VALUES ('$user_id','$key','$pname','$pr_img','$quantity','$amount', '$payment_mode','$name', '$email', '$address', '$city', '$state', '$zip', '$date')";
       $result_qry_new=mysqli_query($conn,$insert_data_new);
      }
       if($result_qry_new)
       {
          echo " 
              <script>
              alert('Your Order has been successfully placed it will deliver to you within 10 days');
              window.location.href='user_order.php';
              </script>
              ";
              unset($_SESSION['cart']);
       }
    }
    else
    {
      // insert query
      foreach($cart as $key => $value)
      {
      //   echo $key ." : ".$value['quantity']."<br>"; 
        $sql = "SELECT * FROM `product` WHERE Product_ID = $key";
        $result=mysqli_query($conn,$sql);
        $row_sql = mysqli_fetch_assoc($result);
        $pr_id=$row_sql['Product_ID'];
        $quantity = $value["quantity"];	
        $pr_img_new = $row_sql['Product_img'];
        $pr_name = $row_sql['Product_Name'];
        // $tmp_img = $row_sql['product_img']['tmp_name'];
        // move_uploaded_file($tmp_img,"./images/$pr_img");
      
      $insert_data = "INSERT INTO `user_info` (`user_id`,`product_id`,`product_name`,`product_img`,`quantity`, `amount`, `payment_mode`,`customer_name`, `customer_email`, `customer_address`, `customer_city`, `customer_state`, `customer_zip`, `payment_date`) 
      VALUES ('$user_id','$key','$pr_name','$pr_img_new','$quantity','$amount', '$payment_mode','$name', '$email', '$address', '$city', '$state', '$zip', '$date')";
       $result_qry=mysqli_query($conn,$insert_data);
      }
       if($result_qry)
       {
          echo " 
              <script>
              alert('Your Order has been successfully placed it will deliver to you within 10 days');
              window.location.href='user_order.php';
              </script>
              ";
              unset($_SESSION['cart']);
       }

    }
    //  $update_order="UPDATE `user_order` SET order_status='Completed' WHERE order_id='$order_id' ";
    //  $result_update_qry=mysqli_query($conn,$update_order);
 
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/checkout_page.css?v=<?php echo time();?>"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Checkout page</title>
</head>
<body>

<?php



?>


<h2>Order Checkout</h2>
<p style="color:red;">Only COD(Cash On Delivery) is available at this time</p>
<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="" method="POST">
      
        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <img src="<?php ;?>" alt="">
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text"  name="fullname" required placeholder="Your Name" value="<?php if(isset($already['customer_name'])) {echo $already['customer_name'];}?>">
            <label for="email"><i class="fa fa-envelope" ></i> Email</label>
            <input type="email"  name="email" required placeholder="youremail@example.com" value="<?php if(isset($already['customer_email'])) {echo $already['customer_email'];}?>">
            <label for="adr"><i class="fa fa-address-card-o" ></i> Address</label>
            <input type="text"  name="address" required placeholder="your address" value="<?php if(isset($already['customer_address'])) {echo $already['customer_address'];}?>">
            <label for="city"><i class="fa fa-institution" ></i> City</label>
            <input type="text"  name="city" required placeholder="your city" value="<?php if(isset($already['customer_city'])) {echo $already['customer_city'];}?>">

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text"  name="state" required  placeholder="your state" value="<?php if(isset($already['customer_state'])) {echo $already['customer_state'];}?>">
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text"  name="zip" maxlength="6" required placeholder="your zipcode" value="<?php if(isset($already['customer_zip'])) {echo $already['customer_zip'];}?>">
              </div>
            </div>
          </div>

          <!-- <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="John">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="August">
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2021">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352">
              </div>
            </div>
          </div> -->
          
        </div>
        <label>
          <div clas="row">
          <!-- <input type="radio" required <?php if(isset($already['payment_mode'])) {echo $already['payment_mode'];}?>>Cash On Delivery -->
            <select required name="payment-mode" class="col-50" value="<?php if(isset($already['payment_mode'])) {echo $already['payment_mode'];}?>">
                <!-- <option>Select Method</option>  -->
                <option>COD</option>
            </select>
            </div>
          <!-- <h3><input type="checkbox" name="payment-mode" required > <b>COD (Cash On Delivery)</b></h3> -->
        </label>
        <input type="submit" value="Continue to checkout" class="btn" name="checoutbtn">
        <?php
        // if(isset($_POST['gobackbtn']))
        // {
        //     echo "
        //     <script>
        //     window.location.href='cart.php';
        //     </script>
        //     ";
        // }
        // ?>
    </div>
  </div>
 
<div class='col-25'>
 <div class='container'>
 <!-- Invoice Number<input type="text" name="invoice_number" class="add_to_cart" value=""> -->
 Total Amount <input type="text" readonly name="amount" class="add_to_cart" value="<?php echo $total; ?>">
 </div>
 </div> 
    </form>     
    </div>
  </div>
</div>
</body>
</html>





