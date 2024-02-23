<?php
include 'connect.php';
session_start();
if(!isset($_SESSION['adminloggedin']) || $_SESSION['adminloggedin']!=true)
{
    header("location: admin_login.php");
    exit;
}

if(isset($_GET['edit_order']))
{
    $edit_id=$_GET['edit_order'];
    $get_data = "SELECT * FROM `work_order` WHERE order_id='$edit_id'";
    $res=mysqli_query($conn,$get_data);
    $row=mysqli_fetch_assoc($res);
    $id=$row['order_id']; 
    $wid=$row['worker_id']; 
    $name=$row['worker_name']; 
    $email=$row['worker_email']; 
    $workernumber=$row['worker_number'];
    $uid=$row['user_id'];
    $uip=$row['user_ip'];
    $uname=$row['Customername'];
    $uemail=$row['Email'];
    $req=$row['Request_Info'];
    $date=$row['Date_of_order'];
    $address=$row['customer_address'];
    $unum=$row['Mb_no'];
    $status=$row['order_status'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/insert_product.css?v=<?php echo time();?>">   
    <title>Add Product</title>

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

<!--------------------------Number Validation------------------------>
<script>
    function myfun()
    {
        var a = document.getElementById("mobile").value;

        if(isNaN(a))
        {
            alert('Only Number allowed');
            return false;
        }

        if(a.length<10)
        {
            alert('Must be of 10 digits');
            return false;
        }


        if((a.charAt(0)!=9) && (a.charAt(0)!=8) && (a.charAt(0)!=7) && (a.charAt(0)!=6))
        {
            alert('Must Start with 9,8,7 or 6');
            return false;
        }
    }
</script>

<script>
    function myfun()
    {
        var a = document.getElementById("umobile").value;

        if(isNaN(a))
        {
            alert('Only Number allowed');
            return false;
        }

        if(a.length<10)
        {
            alert('Must be of 10 digits');
            return false;
        }


        if((a.charAt(0)!=9) && (a.charAt(0)!=8) && (a.charAt(0)!=7) && (a.charAt(0)!=6))
        {
            alert('Must Start with 9,8,7 or 6');
            return false;
        }
    }
</script>


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

            <form method="POST" enctype="multipart/form-data" onsubmit="return myfun()">
                <div class="form">
                    <div class="form-txt">
                    </div>
                    <div class="form-details">
                        <h2>Edit Work Orders</h2>
                        <!-- <input type="text" name="pid"  placeholder="Product ID" required> -->
                        <input type="text" name="id"  value="<?php echo $id?>" placeholder="IP" >
                        <input type="text" name="wid"  value="<?php echo $wid?>"placeholder="ID" >
                        <input type="text" name="name"  value="<?php echo $name?>"placeholder="Name" >
                        <input type="text" name="email"  value="<?php echo $email?>"placeholder="Email" >
                        <input type="text" name="number"  id="mobile" value="<?php echo $workernumber?>" maxlength="10" placeholder="Number" >
                        <input type="text" name="uid"  value="<?php echo $uid?>"placeholder="user id" >
                        <input type="text" name="uip"  value="<?php echo $uip?>"placeholder="user ip" >
                        <input type="text" name="uname"  value="<?php echo $uname?>"placeholder="user name" >
                        <input type="text" name="uemail"  value="<?php echo $uemail?>"placeholder="user email" >
                        <input type="text" name="req"  value="<?php echo $req?>"placeholder="Request" >
                        <input type="text" name="date"  value="<?php echo $date?>"placeholder="Date" >
                        <input type="text" name="add"  value="<?php echo $address?>"placeholder="Address" >
                        <input type="text" name="num"  maxlength="10" id="umobile" value="<?php echo $unum?>"placeholder="user number" >
                        <input type="text" name="status"  value="<?php echo $status?>"placeholder="work status" >
                        <button name="submit">Update Product</button>
                        <button name="view_products" style="background-color:#5783db; color:white;">
                        <a style="color:white; text-decoration:none; background-color:#5783db;" href="admin_disp_workorder.php">Go Back</a></button>
                        </div>    
                    </div>  
                </div>
            </form>
            


            <!----------------------Edit product code PHP-------------------->
            <?php

            if(isset($_POST['submit']))
            {
                $id=$_POST['id'];
                $wid=$_POST['wid'];
                $name=$_POST['name'];
                $email=$_POST['email'];
                $wnum=$_POST['number'];
                $uid=$_POST['uid'];
                $uip=$_POST['uip'];
                $uname=$_POST['uname'];
                $uemail=$_POST['uemail'];
                $request=$_POST['req'];
                $orderdate=$_POST['date'];
                $add=$_POST['add'];
                $num=$_POST['num'];
                $status=$_POST['status'];


                // Checking for empty fields //
                if($id=='' or $wid=='' or $name=='' or $email=='' or $num=='' or $uid==''or $uip==''or $uname==''or $uemail==''or $request==''or $orderdate==''or $add==''or $num==''or $status=='')
                {
                    echo "<script>alert('Please fill all th fields')</script>";
                }
                else
                {

                        // Query For updating product //
                        $update_pr = "UPDATE `work_order` SET `order_id`='$id',`worker_id`='$wid',`worker_name`='$name',`worker_email`='$email',
                        `worker_number`='$wnum',`user_id`='$uid',`user_ip`='$uip',`Customername`='$uname',`Email`='$uemail',`Request_Info`='$request',
                        `Date_of_order`='$orderdate',`customer_address`='$add',`Mb_no`='$num',`order_status`='$status' WHERE order_id='$edit_id' ";
                        $res=mysqli_query($conn,$update_pr);
                        if($res)
                        {
                            echo "
                            <script>
                            alert('Product Updated Successfully!!');
                            window.location.href='admin_disp_workorder.php';
                            </script>
                        ";    
                        } 
                }

            }



            ?>



</body>
</html>