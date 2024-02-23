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

    <title>Display User Order</title>
    <style>
        
table {
    position: relative;
    right:330px;    
	width: 100%;
	border-collapse: collapse;
	font-size: 18px;
	margin-top: 20px;
    align-items: center;
}
th, td {
	border: 1px solid #333;
	padding: 5px;
	text-align: center;
}
th {
	background-color: #1775f1;
	color: #fff;
}
tr:nth-child(even) {
	background-color: #eee;
}
tr:hover {
	background-color: #ddd;
	animation: highlight 1s ease-in-out;
}


    </style>
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
                <a href="#" class="active"> <i class='fa fa-user icon'></i> User <i class='bx bx-chevron-right icon-right'></i></a>
                <ul class="side-dropdown">
                    <li><a href="admin_disp_user.php" class="active"><i class="fa fa-user" style='font-size:20px'></i> User</a></li>

                    <li><a href="admin_disp_userorder.php"><i class="fa fa-shopping-cart" style='font-size:20px'></i> User Order </a></li>
                    <li><a href="admin_disp_userfeedback.php"><i class="fa fa-comments" style='font-size:20px'></i>User Feedback</a></li>
                </ul>   
            </li>
            <li class="divider">Product Tables</li>
            <li>
                <a href="#"><i class="fa fa-product-hunt icon"></i> Products <i class='bx bx-chevron-right icon-right'></i></a>
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
            <h1 class="title"><b>All User Orders</b></h1>
            <div class="main">
            <table>
<tr>
    <th>ID</th>
    <th>User ID</th>
    <th>Product ID</th>
    <th>Product Name</th>
    <th>Product Img</th>
    <th>Quantity</th>
    <th>Amount</th>
    <th>Payment Mode</th>
    <th>Status</th>
    <th>Customer Name</th>
    <th>Customer Email</th>
    <th>Customer Address</th>
    <th>Customer City</th>
    <th>Customer State</th>
    <th>Customer ZIP</th>
    <th>Payment Date</th>
    <th>Edit</th>
    <th>Delete</th>
</tr>
<?php
         include 'connect.php';
         $sql = "SELECT * FROM user_info";
         $res = mysqli_query($conn,$sql);
         $number=0;
         while($row=mysqli_fetch_assoc($res))
         {
            $id=$row['id'];
            $user_id=$row['user_id'];
            $pr_id=$row['product_id'];
            $pr_name=$row['product_name'];
            $pr_img=$row['product_img'];
            $qun=$row['quantity'];
            $amt=$row['amount'];
            $date=$row['payment_date'];
            $status=$row['status'];
            $name=$row['customer_name'];
            $email=$row['customer_email'];
            $address=$row['customer_address'];
            $city=$row['customer_city'];
            $state=$row['customer_state'];
            $zip=$row['customer_zip'];
            $payment_mode=$row['payment_mode'];
            $number++;
            ?>
            <tr>
                <td><?php echo $id?></td>
                <td><?php echo $user_id?></td>
                <td><?php echo $pr_id?></td>
                <td><?php echo $pr_name?></td>
                <td><img src="./images/<?php echo $pr_img; ?>" alt="product img" style="height:80px; width:80px;"></td>
                <td><?php echo $qun?></td>
                <td><?php echo $amt?></td>
                <td><?php echo $payment_mode?></td>
                <td><?php echo $state?></td>
                <td><?php echo $name?></td>
                <td><?php echo $email?></td>
                <td><?php echo $address?></td>
                <td><?php echo $city?></td>
                <td><?php echo $state?></td>
                <td><?php echo $zip?></td>
                <td><?php echo $date?></td>
                <td><a href='admin_edit_userorder.php?edit_userorder=<?php echo $pr_id ?>'><i class='fa fa-edit' style='color:black; font-size:20px;'></i></a></td>
                <td><a onclick="return confirm('Are you sure you want to Delete order of <?php echo $name?>?')" href='admin_deluserord.php?delete_order=<?php echo $pr_id ?>'><i class='fa fa-trash' style='font-size:20px; color:black;' aria-hidden='true'></i></a></td>
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

