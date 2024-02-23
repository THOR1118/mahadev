<?php
include 'connect.php';
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
{
    header("location: newlogin.php");
    exit;
}
else
{

$sel = "SELECT * FROM `user` WHERE `Email`='$_SESSION[username]'";
$query = mysqli_query($conn,$sel);
$result = mysqli_fetch_assoc($query);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<link rel="stylesheet" href="css/view_product.css?v=<?php echo time();?>">   
    <title>User Orders</title>
   
<body>
<button class="button">
<a style="text-decoration:none; color:white;" href="user_profilenew.php">Go Back</a></button>
<table>
<tr>
    <th>Sr no</th>
    <th>Product Name</th>
    <th>Product Img</th>
    <th>Quantity</th>
    <th>Product Price</th>
    <th>Payment Mode</th>
    <th>Status</th>
    <th>Date</th>
    <th>Cancel Order</th>
</tr>




   <!----------------------------Main CARD--------------------------->
    <div class="main">
        <h2 style="text-align:center; font-size:30px; color:green;">All Orders</h2>
        <?php
         include 'connect.php';
         $username=$_SESSION['username'];
         $sql = "SELECT * FROM `user` WHERE Email='$username'";
         $res = mysqli_query($conn,$sql);
         $row_fetch=mysqli_fetch_assoc($res);
         $user_id=$row_fetch['user_id'];
        ?>
        <?php

          $get_order_details="SELECT * FROM `user_info` WHERE user_id='$user_id'";
          $res=mysqli_query($conn,$get_order_details);
          $number=1;
          while($row_order=mysqli_fetch_assoc($res))
          {
           $amount = $row_order['amount'];
           $pr_id=$row_order['product_id'];
           $qun = $row_order['quantity'];
           $status = $row_order['status'];
           $mode = $row_order['payment_mode'];
           $name = $row_order['customer_name'];
           $date = $row_order['payment_date'];
           $img = $row_order['product_img'];
           $name = $row_order['product_name'];
            echo "<tr>
            <td>$number</td>
            <td>$name</td>
            <td><img src='./product_img/$img' style='height=100px; width:100px;'></td>
            <td>$qun</td>
            <td>$amount/-</td>
            <td>$mode</td>";
            ?>
                <?php
                if ($row_order['status'] == 1) {
                    echo "<td>Order Placed</td>"; 
                  }
                  else
                  {
                    echo "<td>Pending</td>"; 
                  }
                ?>
            <?php  echo "<td>$date</td>";?>
            <?php
              if ($row_order['status'] == 1)
              {
                echo "<td>You can not cancel order now</td>";
              }
              else
              {?>
                  
              <td><a onclick="return confirm('Are you sure you want to Delete <?php echo $name;?> product, placed on <?php echo $date; ?> ?')" href='delete_user_order.php?delete_user_order=<?php echo $pr_id;?>'><i class='fa fa-trash' style='font-size:20px; color:black;' aria-hidden='true'></i></a></td></td>
             <?php }
            ?>
        <?php $number++;
            }?>


            



</body>
</html>



