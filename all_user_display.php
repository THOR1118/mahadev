<?php
include 'connect.php';
session_start();
if(!isset($_SESSION['email']) || $_SESSION['email']!=true)
{
    header("location: admin_login.php");
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
<h2>All Users</h2>
<button class="button">
<a style="text-decoration:none; color:white;" href="add_product.php">Add Products</a></button>
 <button class="button" name="view_products" style="background-color:#5783db; color:white;">
<a style="color:white; text-decoration:none; background-color:#5783db;" href="admin.php">Go Back</a></button>
<table>
    <?php
include 'connect.php';
$order = "SELECT * FROM user";
$res_user = mysqli_query($conn,$order);
$row_user = mysqli_num_rows($res_user);


echo "<tr>
    <th>Sr No</th>
    <th>User Name</th>
    <th>User Email</th>
    <th>User Address</th>
    <th>User Mobile Number</th>
    <th>Delete</th>
    </tr>";
?>
<?php 
if($row_user==0)
{
    echo "<h2 style='font-size:30px; text-align:center; color:red;'>No Users Yet!</h2>";
}
else
{
    $number=0;
    while($row_user=mysqli_fetch_assoc($res_user))
    {
        $user_id=$row_user['user_id'];
        $user_name=$row_user['UserName'];
        $user_email=$row_user['Email'];
        $user_mobile=$row_user['MobileNumber'];
        $user_address=$row_user['Address'];



        $number++;
?>
        <tr>
        <td><?php echo $number ?></td>
        <td><?php echo $user_name?>/-</td>
        <td><?php echo $user_email ?></td>
        <td><?php echo $user_address?></td>
        <td><?php echo $user_mobile?></td>
        <td><a onclick="return confirm('Are you sure you want to Delete USER <?php echo $user_name?> from System?')" href='delete_user.php?delete_user=<?php echo $user_id?>'><i class='fa fa-trash' style='font-size:20px; color:black;' aria-hidden='true'></i></a></td>
    </tr>
    <?php
    }
}

?>

         
            
</table>
</body>
</html>