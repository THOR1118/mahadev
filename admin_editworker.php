<?php
include 'connect.php';
session_start();
if(!isset($_SESSION['adminloggedin']) || $_SESSION['adminloggedin']!=true)
{
    header("location: admin_login.php");
    exit;
}

if(isset($_GET['edit_worker']))
{
    $edit_id=$_GET['edit_worker'];
    $get_data = "SELECT * FROM `worker` WHERE worker_id='$edit_id'";
    $res=mysqli_query($conn,$get_data);
    $row=mysqli_fetch_assoc($res);
    $ip=$row['worker_ip']; 
    $id=$row['worker_id']; 
    $name=$row['worker_name']; 
    $email=$row['email']; 
    $address=$row['worker_address']; 
    $number=$row['mobile_number']; 
    $work=$row['type_of_work'];
    $ex=$row['Work_Experience'];
    $img=$row['worker_img'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/insert_product.css?v=<?php echo time();?>">   
    <title>Edit Worker</title>

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
                        <h2>Edit Worker</h2>
                        <!-- <input type="text" name="pid"  placeholder="Product ID" required> -->
                        <input type="text" name="id"  value="<?php echo $id?>" placeholder="Worker id" >
                        <input type="text" name="ip"  value="<?php echo $ip?>"placeholder="Worker IP" >
                        <input type="text" name="name"  value="<?php echo $name?>"placeholder="Name" >
                        <input type="text" name="number"  id="mobile" maxlength="10" value="<?php echo $number?>"placeholder="number" >
                        <input type="text" name="email"  value="<?php echo $email?>"placeholder="email" >
                        <input type="text" name="address"  value="<?php echo $address?>"placeholder="Address" >
                        <input type="text" name="work"  value="<?php echo $work?>"placeholder="Type of work" >
                        <input type="text" name="img"  value="<?php echo $img?>"placeholder="worker image" >
                        <input type="text" name="ex"  value="<?php echo $ex?>"placeholder="Experience" >
                        <!-- <div class="img"> -->
                        <input type="file" name="worker_img"  placeholder="change Image"  class="select_img">
                        <img class="img" src="./worker_img/<?php echo $img?>" alt="product image">
                        <!-- </div> -->
                        <button name="submit">Update Product</button>
                        <button name="view_products" style="background-color:#5783db; color:white;">
                        <a style="color:white; text-decoration:none; background-color:#5783db;" href="admin_disp_worker.php">Go Back</a></button>
                        </div>    
                    </div>  
                </div>
            </form>
            


            <!----------------------Edit product code PHP-------------------->
            <?php

            if(isset($_POST['submit']))
            {
                $wid=$_POST['id'];
                $wip=$_POST['ip'];
                $wname=$_POST['name'];
                $wnum=$_POST['number'];
                $wemail=$_POST['email'];
                $waddress=$_POST['address'];
                $wwork=$_POST['work'];
                $wex=$_POST['ex'];

                $wimg=$_FILES['worker_img']['name'];
                $wtemp=$_FILES['worker_img']['tmp_name'];


                // Checking for empty fields //
                if($wid=='' or $wip=='' or $wname=='' or $wnum=='' or $wemail=='' or $waddress==''or $wwork==''or $wimg=='')
                {
                    echo "<script>alert('Please fill all th fields')</script>";
                }
                else
                {
                    // Query for updating photod
                        move_uploaded_file($wtemp,"./worker_img/$wimg");

                        // Query For updating product //
                        $update_pr = "UPDATE `worker` SET `worker_id`='$wid',`worker_ip`='$wip',`worker_name`='$wname',
                        `email`='$wemail',`worker_address`='$waddress',`mobile_number`='$wnum',`type_of_work`='$wwork',
                        `Work_Experience`='$wex',`worker_img`='$wimg'  WHERE worker_id='$edit_id' ";
                        $res=mysqli_query($conn,$update_pr);
                        if($res)
                        {
                            echo "
                            <script>
                            alert('Worker Profile Updated Successfully!!');
                            window.location.href='admin_disp_worker.php';
                            </script>
                            ";    
                        } 
                    }
                    
                }
                
                
                
                ?>



</body>
</html>