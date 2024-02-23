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
<a style="color:white; text-decoration:none; background-color:#5783db;" href="add_product.php">Go Back</a></button>

        <form action="search_product_admin.php" method="get">
        <input type="search" class="form-control" placeholder="Search" aria-label="Receipient's username" name="search_data" aria-describely="basic-addon2">
        <a href="search_product_admin.php" style="color:white; text-decoration:none; background-color:#5783db;"><button style="background-color:#5783db; color:white;">Search</button></a>
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
                <?php 
                if(isset($_GET['search_data']))
                {
                    $search_data_value = $_GET['search_data'];
                $search_product = "SELECT * FROM `product` WHERE Product_Description like '%$search_data_value%' ";
                $res = mysqli_query($conn,$search_product);
                    $row = mysqli_num_rows($res);
					if($row==0)
					{
						echo "<h2 class='text-center text-danger'> No Result Match. No product found on this category </h2>";
					}
					while($row=mysqli_fetch_assoc($res))
					{
						$pr_id = $row['Product_ID'];
						$pr_name = $row['Product_Name'];
                        $pr_price = $row['Product_Price'];
                        $pr_des = $row['Product_Description'];
                        // $pr_qun = $row['Product_Stock'];
                        $pr_cat = $row['Category_ID'];
						$pr_img = $row['Product_img'];
                ?>
                <td><?php echo $pr_id?></td>
                <td><?php echo $pr_name?></td>
                <td><img src='./product_img/<?php echo $pr_img?>' class='pr_img'></td>
                <td><?php echo $pr_price?>/-</td>
                <!-- <td></td> -->
                <!-- <td><?php echo $pr_qun?></td> -->
                <td><a href='edit_product.php?edit=<?php echo $pr_id ?>'><i class='fas fa-edit' style='font-size:20px; color:black;'></i></a></td>
                <td><a onclick="return confirm('Are you sure you want to Delete <?php echo $pr_name?> product?')" href='delete_product.php?delete=<?php echo $product_id ?>'><i class='fa fa-trash' style='font-size:20px; color:black;' aria-hidden='true'></i></a></td>
            </tr>
         <?php
         }
        }}?>
</table>
</body>
</html>



