<?php
include 'connect.php';
session_start();
if(!isset($_SESSION['adminloggedin']) || $_SESSION['adminloggedin']!=true)
{
    header("location: admin_login.php");
    exit;
}

if(isset($_GET['edit_userorder']))
{
    $edit_id=$_GET['edit_userorder'];
    $get_data = "SELECT * FROM `user_info` WHERE product_id='$edit_id'";
    $res=mysqli_query($conn,$get_data);
    $row=mysqli_fetch_assoc($res);
    $id=$row['id']; 
    $user_id=$row['user_id'];  
    $pr_id=$row['product_id'];  
    $pr_name=$row['product_name']; 
    $pr_img=$row['product_img']; 
    $qun=$row['quantity']; 
    $amt=$row['amount']; 
    $mode=$row['payment_mode']; 
    $status=$row['status']; 
    $name=$row['customer_name']; 
    $email=$row['customer_email']; 
    $address=$row['customer_address']; 
    $city=$row['customer_city']; 
    $state=$row['customer_state']; 
    $zip=$row['customer_zip']; 
    $date=$row['payment_date']; 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/insert_product.css?v=<?php echo time();?>">   
    <title>Edit User Order</title>

    <div class="header">
        <a href="newlogo.png">
        </a>
        <div class="container">
            <nav>
            <div class="menu-bar">      
     
    </div>
            </nav>
        </div>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');  

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    overflow-x: hidden;
    justify-content: center;
    align-items: center;
    font-family: "Poppins", sans-serif;
}

.container {
    max-width: 1200px;
    width: 90%;
    margin: 0 auto;
}

:root {
    /* //....... Color ........// */
    --primary-color: #ff3c78;
    --light-black: rgba(0, 0, 0, 0.89);
    --black: #000;
    --white: #fff;
    --grey: #aaa;
}

.contact {
    margin-top: 45px;
}

.form {
    margin-top: 70px;
    margin-right: 500px;
    /* position: absolute; */
    display: flex;
    justify-content: space-between;
}

.form .form-txt {
    flex-basis: 48%;
}

.form .form-txt h1 {
    font-weight: 600;
    color: var(--black);
    font-size: 40px;
    letter-spacing: 1.5px;
    margin-bottom: 10px;
    color: var(--light-black);
}

.form .form-txt span {
    color: var(--light-black);
    font-size: 14px;
}

.form .form-txt h3 {
    font-size: 22px;
    font-weight: 600;
    margin: 15px 0;
    color: var(--light-black);
}

.form .form-txt p {
    color: var(--light-black);
    font-size: 14px;
}

.form .form-details {
    flex-basis: 48%;
}

.form .form-details input[type="text"],
.form .form-details input[type="email"] {
    padding: 15px 20px;
    color: var(--black);
    outline: none;
    border: 1px solid var(--grey);
    margin: 35px 15px;
    font-size: 14px;
}

.select_cat
{
    padding: 15px 40px;
    color: var(--black);
    outline: none;
    border: 1px solid var(--grey);
    margin: 35px 15px;
    font-size: 14px; 
}
.select_img
{
    padding: 15px 0px;
    color: var(--black);
    outline: none;
    border: 1px solid var(--grey);
    margin: 35px 15px;
    font-size: 14px; 
}



.form .form-details button {
    padding: 15px 25px;
    color: var(--white);
    font-weight: 500;
    background: #589f85;
    outline: none;
    border: none;
    margin: 15px;
    font-size: 14px;
    letter-spacing: 2px;
    cursor: pointer;
}
.img
{
    width: 100px;
}
        </style>
</head>
<body>





    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>

    <!-- Custom Css -->
    <link rel="stylesheet" href="add_product.css?v=<?php echo time();?>">    

    <!-- FontAwesome 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
</head>
<body>
    </div>

            <form method="POST" enctype="multipart/form-data">
                <div class="form">
                    <div class="form-txt">
                    </div>
                    <div class="form-details">
                        <h2>Edit User Order</h2>
                        <!-- <input type="text" name="pid"  placeholder="Product ID" required> -->
                        <input type="text" name="id"  value="<?php echo $id?>" placeholder="Product Name" >
                        <input type="text" name="userid"  value="<?php echo $user_id?>"placeholder="Product Price" >
                        <input type="text" name="prid"  value="<?php echo $pr_id?>"placeholder="Product Description" >
                        <input type="text" name="prname"  value="<?php echo $pr_name?>"placeholder="Product Quantity" >
                        <input type="file" name="primg"  placeholder="change Image"  class="select_img">
                        <img class="img" src="./product_img/<?php echo $pr_img?>" alt="product image">
                        <!-- <input type="text" name="primg"  value="<?php echo $pr_img?>"placeholder="Product Quantity" > -->
                        <input type="text" name="qun"  value="<?php echo $qun?>"placeholder="Product Quantity" >
                        <input type="text" name="amt"  value="<?php echo $amt?>"placeholder="Product Quantity" >
                        <input type="text" name="mode"  value="<?php echo $mode?>"placeholder="Product Quantity" >
                        <input type="text" name="status"  value="<?php echo $status?>"placeholder="Product Quantity" >
                        <input type="text" name="name"  value="<?php echo $name?>"placeholder="Product Quantity" >
                        <input type="text" name="email"  value="<?php echo $email?>"placeholder="Product Quantity" >
                        <input type="text" name="address"  value="<?php echo $address?>"placeholder="Product Quantity" >
                        <input type="text" name="city"  value="<?php echo $city?>"placeholder="Product Quantity" >
                        <input type="text" name="state"  value="<?php echo $state?>"placeholder="Product Quantity" >
                        <input type="text" name="zip"  value="<?php echo $zip?>"placeholder="Product Quantity" >
                        <input type="text" name="date"  value="<?php echo $date?>"placeholder="Product Quantity" >
                        <button name="submit">Update Profile</button>
                        <button name="view_products" style="background-color:#5783db; color:white;">
                        <a style="color:white; text-decoration:none; background-color:#5783db;" href="admin_disp_userorder.php">Go Back</a></button>
                        </div>    
                    </div>  
                </div>
            </form>
            


            <!----------------------Edit product code PHP-------------------->
            <?php

            if(isset($_POST['submit']))
            {
                $pr_edit_id=$_POST['id'];
                $pr_edit_userid=$_POST['userid'];
                $pr_edit_prid=$_POST['prid'];
                $pr_edit_prname=$_POST['prname'];
                // $pr_edit_primg=$_POST['primg'];
                $pr_edit_primg=$_FILES['primg']['name'];
                $temp_edit_primg=$_FILES['primg']['tmp_name'];
                $pr_edit_qun=$_POST['qun'];
                $pr_edit_amt=$_POST['amt'];
                $pr_edit_mode=$_POST['mode'];
                $pr_edit_status=$_POST['status'];
                $pr_edit_name=$_POST['name'];
                $pr_edit_email=$_POST['email'];
                $pr_edit_address=$_POST['address'];
                $pr_edit_city=$_POST['city'];
                $pr_edit_state=$_POST['state'];
                $pr_edit_zip=$_POST['zip'];
                $pr_edit_date=$_POST['date'];
          


                // Checking for empty fields //
                if($pr_edit_id=='' or $pr_edit_userid=='' or $pr_edit_prid==''or $pr_edit_prname==''or $pr_edit_primg==''or $pr_edit_qun==''or $pr_edit_amt==''or $pr_edit_mode==''or $pr_edit_status==''or $pr_edit_name==''or $pr_edit_email==''or $pr_edit_address==''or $pr_edit_city==''or $pr_edit_state==''or $pr_edit_zip==''or $pr_edit_date=='')
                {
                    echo "<script>alert('Please fill all th fields')</script>";
                }
                else
                {
                 
                        move_uploaded_file($temp_edit_primg,"./product_img/$pr_edit_primg");
                        $update_pr = "UPDATE `user_info` SET `id`='$pr_edit_id',`user_id`='$pr_edit_userid',`product_id`='$pr_edit_prid',
                        `product_name`='$pr_edit_prname',`product_img`='$pr_edit_primg',`quantity`='$pr_edit_qun',`amount`='$pr_edit_amt',
                        `payment_mode`='$pr_edit_mode',`status`='$pr_edit_status',`customer_name`='$pr_edit_name',`customer_email`='$pr_edit_email',
                        `customer_address`='$pr_edit_address',`customer_city`='$pr_edit_city',`customer_state`='$pr_edit_state',`customer_zip`='$pr_edit_zip',
                        `payment_date`='$pr_edit_date' WHERE product_id='$edit_id' ";
                        $res=mysqli_query($conn,$update_pr);
                        if($res)
                        {
                            echo "
                            <script>
                            alert('Data Updated Successfully!!');
                            window.location.href='admin_disp_userorder.php';
                            </script>
                        ";    
                        } 
                }

            }



            ?>



</body>
</html>