<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Update</title>


    <style>
        *
        {
            margin:0;
            padding:0;
            box-sizing:border-box;
            text-decoration:none;
        }
        form
        {
            position: absolute;
            top:50%;
            left:50%;
            transform:translate(-50%,-50%);
            background-color:#f0f0f0;
            width:350px;
            border-radius:5px;
            padding:20px 25px 30px 25px;
        }

        form h3
        {
            margin-bottom:15px;
            color:#30475e;      
        }

        form input
        {
            width:100%;
            margin-bottom:20px;
            background-color:transparent;
            border:none;
            border-bottom:2px solid #30475e;
            border-radius:0;
            padding:5px 0;
            font-weight:550;
            font-size:14px;
            outline:none;
        }

        form button
        {
            font-weight: 550px;
            font-style:15px;
            color:white;
            background-color:#30475e;
            padding:4px 10px;
            border:none;
            outline:none;
        }
    </style>


</head>
<body>
    
<?php

include 'connect.php';


if (isset($_GET['email']) && isset($_GET['resettoken']))
{
    date_default_timezone_set('Asia/kolkata');
    $date=date("Y-m-d");
    $query = "SELECT * FROM `worker` WHERE `worker`.`email`='$_GET[email]' AND `resettoken` ='$_GET[resettoken]' AND `resetexpiretoken`='$date'";
    $result=mysqli_query($conn,$query);
    if($result)
    {
        if(mysqli_num_rows($result)==1)
        {
            echo "
            <form method='POST'>
            <h3>Create New Password</h3>
            <input type='password' required minlength=8 placeholder='Enter new Password' name='password'>
            <button type='submit' name='updatepassword'>UPDATE</button>
            <input type='hidden' name='email' value='$_GET[email]'>
            </form> 
            ";
        }
        else
        {
            echo "
            <script>
            alert('Invalid or Expired Link');
            window.location.href='sendemail_worker.php';
            </script>
            ";
        }
    }
    else
    {
        echo "
            <script>
            alert('Password Reset Link Send To Your Mail');
            window.location.href='sendemail_worker.php';
            </script>
            ";
    }
}




if(isset($_POST['updatepassword']))
{
    $pass=($_POST['password']);
   $hash = password_hash($pass,PASSWORD_DEFAULT);
    $update="UPDATE worker SET  worker_password = '$hash',resettoken = NULL, resetexpiretoken = NULL WHERE email = '$_GET[email]'";
    if(mysqli_query($conn,$update))
    {
        echo "
            <script>
            alert('Password Updated Successfully');
            window.location.href='worker_dashboard.php';
            </script>
            ";
    }
    else
    {
        echo "
            <script>
            alert('Server Down Try Again Later');
            window.location.href='sendemail_worker.php';
            </script>
            ";
    }
}

?>

</body>
</html>