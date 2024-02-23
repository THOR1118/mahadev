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
<h2>All User Payments</h2>
<button class="button">
<a style="text-decoration:none; color:white;" href="add_product.php">Add Products</a></button>
 <button class="button" name="view_products" style="background-color:#5783db; color:white;">
<a style="color:white; text-decoration:none; background-color:#5783db;" href="add_product.php">Go Back</a></button>
<table>
    <?php
include 'connect.php';
$order = "SELECT * FROM user_info";
$res_order = mysqli_query($conn,$order);
$row_count_order = mysqli_num_rows($res_order);


$user_details = "SELECT * FROM `user_info`";
$res_user = mysqli_query($conn,$user_details);
$row_count_user=mysqli_num_rows($res_user);
echo "<tr>
    <th>Sr No</th>
    <th>Amount</th>
    <th>Total Products</th>
    <th>Order Date</th>
    <th>Status</th>
    <th>Customer Name</th>
    <th>Customer Email</th>
    <th>Payment Mode</th>
    <th>Delete</th>
</tr>";
?>
<?php 
if($row_count_user==0 or $row_count_order==0)
{
    echo "<h2 style='font-size:30px; text-align:center; color:red;'>No Payments Yet!</h2>";
}
else
{
    $number=0;
    while($row_count_order=mysqli_fetch_assoc($res_order))
    while($row_count_user=mysqli_fetch_assoc($res_user))
    {



        $order_id=$row_count_user['id'];
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

        // $order_id=$row_count_order['order_id'];
        // $user_id=$row_count_order['user_id'];
        // $amount=$row_count_order['amount_due'];
        // $invoice_number=$row_count_order['invoice_number'];
        // $total_products=$row_count_order['total_product'];
        // $order_date=$row_count_order['order_date'];
        // $order_status=$row_count_order['order_status'];


        // // for user details //
        // $user_name=$row_count_user['customer_name'];
        // $user_email=$row_count_user['customer_email'];
        // $user_address=$row_count_user['customer_address'];
        // $user_city=$row_count_user['customer_city'];
        // $user_state=$row_count_user['customer_state'];
        // $user_zip=$row_count_user['customer_zip'];
        // $user_payment_mode=$row_count_user['payment_mode'];



        $number++;
?>
        <tr>
        <td><?php echo $number ?></td>
        <td><?php echo$amount?>/-</td>
        <td><?php echo $total_products?></td>
        <td><?php echo $order_date?></td>
        <td><?php echo $order_status?></td>
        <td><?php echo $user_name?></td>
        <td><?php echo $user_email?></td>
        <td><?php echo $user_payment_mode?></td>
        <td><a onclick="return confirm('Are you sure you want to Delete Payment of <?php echo $user_name?> placed on <?php echo $order_date?> ?')" href='delete_user_payment.php?delete_user_payments=<?php echo $order_id?>'><i class='fa fa-trash' style='font-size:20px; color:black;' aria-hidden='true'></i></a></td>
    </tr>
    <?php
    }
}

?>

         
            
</table>
</body>
</html>