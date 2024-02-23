<?php
include 'connect.php';
session_start();
if(!isset($_SESSION['adminloggedin']) || $_SESSION['adminloggedin']!=true)
{
    header("location: admin_login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/all_user.css?v=<?php echo time();?>">  
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Display Product</title>
</head>
<body>
    
    <!-- SIDEBAR START -->
    <section id="sidebar">
        <a href="#" class="brand">Admin Dashboard</a>
        <a href="admin_logout.php" class="brand" style="font-size:15px; margin-top:-20px; margin-left:-150px; color:red;">Log Out</a>
        <ul class="side-menu">
            <li><a href="admin.php"><i class='bx bxs-dashboard icon'></i> Dashboard</a></li>
            <li class="divider">User Tables</li>
            <li>
                <a href="#"> <i class='fa fa-user icon'></i> User <i class='bx bx-chevron-right icon-right'></i></a>
                <ul class="side-dropdown">
                    <li><a href="admin_disp_user.php"><i class="fa fa-user" style='font-size:20px'></i> User</a></li>

                    <li><a href="admin_disp_userorder.php"><i class="fa fa-shopping-cart" style='font-size:20px'></i> User Order </a></li>
                    <li><a href="admin_disp_userfeedback.php"><i class="fa fa-comments" style='font-size:20px'></i>User Feedback</a></li>
                </ul>   
            </li>
            <li class="divider">Product Tables</li>
            <li>
                <a href="#" class="active"><i class="fa fa-product-hunt icon"></i> Products <i class='bx bx-chevron-right icon-right'></i></a>
                <ul class="side-dropdown">
                    <li><a href="admin_disp_product.php"><i class="fa fa-product-hunt" style='font-size:20px'></i> Products</a></li>
                    <li><a href="admin_disp_category.php"><i class='bx bxs-category' style='font-size:20px'></i>Categories</a></li>
                    <!-- <li><a href="admin_disp_cart.php"><i class="fa fa-shopping-cart" style='font-size:20px'></i>Cart</a></li> -->
                </ul>   
            </li>
            <li class="divider">Worker Tables</li>
            <li>
                <a href="#"><i class='bx bxs-hard-hat icon' style='font-size:20px'></i> Worker <i class='bx bx-chevron-right icon-right'></i></a>
                <ul class="side-dropdown">
                <a href="admin_disp_worker.php"><i class='bx bxs-hard-hat' style='font-size:20px'></i> Worker </a>
                    <li><a href="admin_disp_workorder.php"><img src="https://img.icons8.com/external-tanah-basah-glyph-tanah-basah/48/null/external-testing-digital-marketing-tanah-basah-glyph-tanah-basah.png" style='width:20px'/>Work Order</a></li>
                    
                </ul>   
            </li>
        </ul>
        
    </section>
    <!-- SIDEBAR END -->
    
    <!-- NAVBAR -->
    <section id="content">
        
        
    <!-- MAIN -->
        <main>
            <h1 class="title"><b>All Products</b></h1>
            <div class="main">
            <table>
<tr>
<th>Product ID</th>
    <th>Product Title</th>
    <th>Product Image</th>
    <th>Product Price</th>
    <!-- <th>Product Sold</th> -->
    <th>Edit</th>
    <th>Delete</th>
</tr>
<?php
         include 'connect.php';
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
                <td><?php echo $number?></td>
                <td><?php echo $product_name?></td>
                <td><img src='./product_img/<?php echo $product_img?>' class='pr_img' style="height:50px"></td>
                <td><?php echo$product_price?>/-</td>
                <td><a href='admin_editproduct.php?edit_pr=<?php echo $product_id ?>'><i class='fa fa-edit' style='color:black; font-size:20px;'></i></a></td>
                <td><a onclick="return confirm('Are you sure you want to Delete <?php echo $product_name?> product?')" href='admin_delproduct.php?delete_product=<?php echo $product_id ?>'><i class='fa fa-trash' style='font-size:20px; color:black;' aria-hidden='true'></i></a></td>
            </tr>
         <?php
         }?>
    </section>

</body>
</html>

<script>
    // SIDEBAR DROPDOWN
const allDropdown = document.querySelectorAll('#sidebar .side-dropdown');

allDropdown.forEach(item=>{
    const a = item.parentElement.querySelector('a:first-child');
    // console.log(a);
    a.addEventListener('click', function(e){
        e.preventDefault();
        
        if(!this.classList.contains('active')){
            allDropdown.forEach(i=>{
                const aLink = i.parentElement.querySelector('a:first-child');
                
                aLink.classList.remove('active');
                i.classList.remove('show');
            })
        }
        
        this.classList.toggle('active');
        item.classList.toggle('show');
    })
})

// PROFILE DROPDOWN
const profile = document.querySelector('nav .profile');
const imgProfile = profile.querySelector('img');
const dropdownProfile = profile.querySelector('.profile-link');

imgProfile.addEventListener('click', function(){
    dropdownProfile.classList.toggle('show');
})


window.addEventListener('click', function(e){
    if(e.target !== imgProfile){
        if(e.target !== dropdownProfile){
            if(dropdownProfile.classList.contains('show')){
                dropdownProfile.classList.remove('show');
            }
        }
    }
})


// PROGRESSBAR
const allProgress = document.querySelectorAll('main .card .progress');

allProgress.forEach(item=>{
    item.style.setProperty('--value', item.dataset.value)
})


</script>

