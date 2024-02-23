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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- <script src='https://kit.fontawesome.com/   .js' crossorigin='anonymous'></script> -->
<link rel="stylesheet" href="css/view_product.css?v=<?php echo time();?>">   
    <title>Add Product</title>
   
<body>
<h2>All Products</h2>
<button class="button">
<a style="text-decoration:none; color:white;" href="add_product.php">Add Products</a></button>
 <button class="button" name="view_products" style="background-color:#5783db; color:white;">
<a style="color:white; text-decoration:none; background-color:#5783db;" href="add_product.php">Go Back</a></button>

                <form action="search_product_admin.php" method="get">
						<input type="search" class="form-control" placeholder="Search" aria-label="Receipient's username" name="search_data" aria-describely="basic-addon2">
                        <a href="view_product.php" style="color:white; text-decoration:none; background-color:#5783db;"><button style="background-color:#5783db; color:white;">Search</button></a>
					</div>
<table>
<tr>
    <th>Product ID</th>
    <th>Product Title</th>
    <th>Product Image</th>
    <th>Product Price</th>
    <!-- <th>Product Sold</th> -->
    <!-- <th>Product Stock</th> -->
    <th>Edit</th>
    <th>Delete</th>
    <!-- <th>Delivery status</th> -->
</tr>
<?php
         include 'connect.php';
         $delivery = "Send Delivery";
         $sql = "SELECT * FROM product";
         $res = mysqli_query($conn,$sql);
         $number=0;
         while($row=mysqli_fetch_assoc($res))
         {

            $product_id=$row['Product_ID'];
            $product_name=$row['Product_Name'];
            $product_price=$row['Product_Price'];
            $product_img=$row['Product_img'];
            // $pr_stock=$row['Product_Stock'];
            $number++;
            ?>
            <tr>
                <td><?php echo $product_id?></td>
                <td><?php echo $product_name?></td>
                <td><img src='./product_img/<?php echo $product_img?>' class='pr_img'></td>
                <td><?php echo$product_price?>/-</td>
                <!-- <td></td> -->
                <!-- <td><?php echo $pr_stock?></td> -->
                <td><a href='edit_product.php?edit=<?php echo $product_id ?>'><i class='fa fa-edit' style='color:black; font-size:25px;'></i></a></td>
                <td><a onclick="return confirm('Are you sure you want to Delete <?php echo $product_name?> product?')" href='delete_product.php?delete=<?php echo $product_id ?>'><i class='fa fa-trash' style='font-size:25px; color:black;' aria-hidden='true'></i></a></td>
            </tr>
         <?php
         }?>
</table>
</body>
</html>



