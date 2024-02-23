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
<h2>All Workers</h2>
<!-- <button class="button">
<a style="text-decoration:none; color:white;" href="add_product.php">Add Products</a></button> -->
 <button class="button" name="view_products" style="background-color:#5783db; color:white;">
<a style="color:white; text-decoration:none; background-color:#5783db;" href="shopowner_profile.php">Go Back</a></button>
<table>
    <?php
include 'connect.php';
$user_details = "SELECT * FROM `worker`";
$res_user = mysqli_query($conn,$user_details);
$row_count_user=mysqli_num_rows($res_user);







$order = "SELECT * FROM worker";
$res_order = mysqli_query($conn,$order);
$row_count_order = mysqli_num_rows($res_order);
echo "<tr>
    <th>Sr No</th>
    <th>Worker Name</th>
    <th>Worker Img</th>
    <th>Identity</th>
    <th>Worker Email</th>
    <th>Worker Address</th>
    <th>Mobile Number</th>
    <th>Type Of Work</th>
    <th>Work Experience</th>
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
        $wname=$row_count_user['worker_name'];
        $wemail=$row_count_user['email'];
        $address=$row_count_user['worker_address'];
        $wnumber=$row_count_user['mobile_number'];
        $work=$row_count_user['type_of_work'];
        $ex=$row_count_user['Work_Experience'];
        $img=$row_count_user['worker_img'];
        $img_identity=$row_count_user['worker_identity_img'];

        $number++;

?>
        <tr>
        <td><?php echo $number ?></td>
        <td><?php echo $wname?></td>
        <td><img src='./worker_img/<?php echo $img?>' class='pr_img'></td>
        <td><img src='./worker_img/<?php echo $img_identity?>' class='pr_img'></td>
        <td><?php echo $wemail?></td>
        <td><?php echo $address?></td>
        <td><?php echo $wnumber?></td>
        <td><?php echo $work?></td>
        <td><?php echo $ex?></td> 
    </tr>
    <?php
        

   }  }
?>
           
            
            
                
         
            
</table>
</body>
</html>