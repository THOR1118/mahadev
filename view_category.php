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
    <title>Add Product</title>
   
<body>
<h2>All Products</h2>
<button class="button">
<a style="text-decoration:none; color:white;" href="add_product.php">Add Products</a></button>
 <button class="button" name="view_products" style="background-color:#5783db; color:white;">
<a style="color:white; text-decoration:none; background-color:#5783db;" href="add_category.php">Go Back</a></button>
<table>
<tr>
    <th>Sr No</th>
    <th>Category Name</th>
    <th>Edit</th>
    <th>Delete</th>
</tr>
<?php
         include 'connect.php';
         $sql = "SELECT * FROM category";
         $res = mysqli_query($conn,$sql);
         $number=0;
         while($row=mysqli_fetch_assoc($res))
         {

            $category_id=$row['Category_ID'];
            $category_name=$row['Category_Name'];
            $number++;
            ?>
            <tr>
                <td><?php echo $number?></td>
                <td><?php echo $category_name?></td>
                <td><a href='edit_category.php?edit_category=<?php echo $category_id ?>'><i class='fas fa-edit' style='font-size:20px; color:black;'></i></a></td>
                <td><a onclick="return confirm('Are you sure you want to Delete <?php echo $category_name?> category?')" href='delete_category.php?delete_category=<?php echo $category_id ?>'><i class='fa fa-trash' style='font-size:20px; color:black;' aria-hidden='true'></i></a></td>
            </tr>
         <?php
         }?>
</table>
</body>
</html>