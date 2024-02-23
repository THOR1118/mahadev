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
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<link rel="stylesheet" href="css/view_product.css?v=<?php echo time();?>">   
    <title>View User Order</title>
   
<body>
<h2>All User Orders</h2>
<button class="button">
<a style="text-decoration:none; color:white;" href="add_product.php">Add Products</a></button>
 <button class="button" name="view_products" style="background-color:#5783db; color:white;">
<a style="color:white; text-decoration:none; background-color:#5783db;" href="shopowner_profile.php">Go Back</a></button>
<table>
    <?php
include 'connect.php';
$user_details = "SELECT * FROM `user_info`";
$res_user = mysqli_query($conn,$user_details);
$row_count_user=mysqli_num_rows($res_user);







$order = "SELECT * FROM user_info";
$res_order = mysqli_query($conn,$order);
$row_count_order = mysqli_num_rows($res_order);
echo "<tr>
    <th>Sr No</th>
    <th>Product ID</th>
    <th>Image</th>
    <th>Total Amount</th>
    <th>Total Products</th>
    <th>Order Date</th>
    <th>Customer Name</th>
    <th>Customer Email</th>
    <th>Customer Address</th>
    <th>Payment Mode</th>
    <th>Delivery Status</th>
</tr>";
?>
<?php 
if($row_count_order==0 or $row_count_user==0)
{
    echo "<h2 style='font-size:30px; text-align:center; color:red;'>No Orders Yet!</h2>";
}
else
{
    $number=0;
    while($row_count_order=mysqli_fetch_assoc($res_order))
    while($row_count_user=mysqli_fetch_assoc($res_user))
    {




        // for user details //
        $order_id=$row_count_user['id'];
        $user_id=$row_count_user['user_id'];
        $amount=$row_count_user['amount'];
        $pr_id=$row_count_user['product_id'];
        $order_status=$row_count_user['status'];
        $order_date=$row_count_user['payment_date'];
        $total_products=$row_count_user['quantity'];
        $user_name=$row_count_user['customer_name'];
        $user_email=$row_count_user['customer_email'];
        $user_address=$row_count_user['customer_address'];
        $user_city=$row_count_user['customer_city'];
        $user_state=$row_count_user['customer_state'];
        $user_zip=$row_count_user['customer_zip'];
        $user_payment_mode=$row_count_user['payment_mode'];


        $image = "SELECT * FROM `product` WHERE Product_ID='$pr_id'";
        $res_image = mysqli_query($conn,$image);
        $row_count_image = mysqli_num_rows($res_image);

        while($row_count_image=mysqli_fetch_assoc($res_image))
        {
        $image = $row_count_image['Product_img'];
        }

        $number++;
?>
        <tr>
        <td><?php echo $number ?></td>
        <td><?php echo $pr_id?></td>
        <td><img src='./product_img/<?php echo $image?>' class='pr_img'></td>
        <td><?php echo$amount?>/-</td>
        <!-- <td><?php echo $invoice_number ?></td> -->
        <td><?php echo $total_products?></td>
        <td><?php echo $order_date?></td>
        <td><?php echo $user_name?></td>
        <td><?php echo $user_email?></td>
        <td><?php echo $user_address,','.$user_city,','.$user_state,','.$user_zip;?></td>
        <td><?php echo $user_payment_mode?></td>
        <?php 
            include 'connect.php';
$sel = "SELECT * FROM `user_info` WHERE id = '$order_id'";
$qry = mysqli_query($conn,$sel);
$result= mysqli_fetch_array($qry);

if ($result['status'] == 1) {
    echo "<td>Delivered</td>";
 }
 else
 {
?>
        
        <td><form action="product_pending.php?id=<?php echo $result['id']; ?>" method="POST">
                <input type="hidden" name="appid" value="<?php echo $result['id']; ?>">
                <input type="submit"  name="approve" value="Send Delivery">
            </form></td>
        
    </tr>
    <?php
   }  }
}

?>
           
            
            
                
         
            
</table>
</body>
</html>