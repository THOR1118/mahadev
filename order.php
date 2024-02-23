<?php


include 'connect.php';
if(isset($_GET['user_id']))
{
    $user_id = $_GET['user_id'];
}


//----------Getting total items and total price of all time-------------------//

//Function for ip address//
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
$total_price=0;
$cart_query_price = "SELECT * FROM `cart` WHERE IP_address='$get_ip'";
$result_cart_price=mysqli_query($conn,$cart_query_price);
$invoice_number=mt_rand();
$status='pending';
$count_products=mysqli_num_rows($result_cart_price);
while($row_price=mysqli_fetch_array($result_cart_price))
{
    $pr_id = $row_price['Product_ID'];
    $sel_product = "SELECT * FROM `product` WHERE Product_ID='$pr_id'";
    $run_price = mysqli_query($conn,$sel_product);
    while($row_product_price=mysqli_fetch_array($run_price))
    {
        $pr_price = array($row_product_price['Product_Price']);
        $pr_value = array_sum($pr_price);
        $total_price+=$pr_value;
    }
} 



//---------Getting quantity from cart---------------//
$get_cart = "SELECT * FROM `cart`";
$run_cart=mysqli_query($conn,$get_cart);
$get_item_quantity=mysqli_fetch_array($run_cart);
$quantity = $get_item_quantity['Quantity'];
if($quantity==0)
{
    $quantity=1;
    $subtotal=$total_price;
}
else
{
    $quantity=$quantity;
    $subtotal=$total_price*$quantity;
}

$insert_order = "INSERT INTO `user_order`(`user_id`, `amount_due`, `invoice_number`, `total_product`, `order_date`, `order_status`) 
VALUES ('$user_id','$subtotal','$invoice_number','$count_products',NOW(),'$status')";
$result_query = mysqli_query($conn,$insert_order);
if($result_query)
{
    echo "
        <script>
        alert('Order are submitted successfully!');
        window.location.href='user_profile.php?order';
        </script>
        ";
}


//--------------Order Pending Status---------------//
$insert_pending_order = "INSERT INTO `pending_orders`(`user_id`, `invoice_number`, `product_id`, `quantity`, `order_status`) 
VALUES ('$user_id','$invoice_number','$pr_id','$quantity','$status')";
$result_pending = mysqli_query($conn,$insert_pending_order);


//----------Delete data from cart-------------------//

$empty_cart = "DELETE FROM `cart` WHERE IP_address='$get_ip'";
$result_delete = mysqli_query($conn,$empty_cart);


?>