
<?php
include 'connect.php';
session_start();
if(!isset($_SESSION['wloggedin']) || $_SESSION['wloggedin']!=true)
{
    header("location: worker_login.php");
    exit;
}
else
{
  $get_data = "SELECT * FROM `worker` WHERE email='$_SESSION[emailid]'";
    $res=mysqli_query($conn,$get_data);
    $row=mysqli_fetch_assoc($res); 
    $wr_img=$row['worker_img']; 
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<link
  rel="stylesheet"
  href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
  integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
  crossorigin="anonymous"
/>
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400"
  rel="stylesheet"
/>
<link rel="stylesheet" href="css/update_worker_profile.css?v=<?php echo time();?>">  
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Worker Login</title>
</head>
<body>
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

<!----------------------PHP ----------------------->



  <div id="form_wrapper">
      <div id="form_left">
         <form name="form" action="" method="POST" enctype="multipart/form-data" onsubmit="return myfun()">
      <img src="images/edit.jpg" alt="worker icon" style="height:150%; width:150%; margin-left:-300px; margin-top:-50px;"/>
    </div>
    <div id="form_right">

      <h1>Worker Edit Profile</h1>
      <div class="input_container">
      <i class="fa fa-user" aria-hidden="true"></i>
<?php
if(isset($_GET['update_worker_profile']))
{
    $user_session_name = $_SESSION['emailid'];
    $user_qry="SELECT * FROM `worker` WHERE email='$user_session_name'";
    $res_user=mysqli_query($conn,$user_qry);
    $row_fetch=mysqli_fetch_assoc($res_user);
    $get_user_id=$row_fetch['worker_id'];
    $get_user_name=$row_fetch['worker_name'];
    $get_user_email=$row_fetch['email'];
    $get_user_address=$row_fetch['worker_address'];
    $get_user_mobile=$row_fetch['mobile_number'];
    $get_user_work=$row_fetch['type_of_work'];
    $get_user_ex=$row_fetch['Work_Experience'];
    $get_user_img=$row_fetch['worker_img'];
}
?>
        <input type="text" id="field_email" class="input_field" placeholder="Username" value="<?php echo $get_user_name ?>" name="wname">
      </div>

      <div class="input_container">
      <i class="fa fa-envelope" aria-hidden="true"></i>
      <input type="email" placeholder="Email" id="field_email" class="input_field"  value="<?php echo $get_user_email ?>" required name="email">
      </div>

      <div class="input_container">
      <i class="fa fa-address-card" aria-hidden="true"></i>
      <input type="text" placeholder="Address" id="field_email" class="input_field" value="<?php echo $get_user_address ?>" required name="address" maxlength=50>
      </div>

      <div class="input_container">
        <i class="fas fa-lock"></i>
        <input type="text"  maxlength=10 id="mobile" id="field_email" class="input_field" value="<?php echo $get_user_mobile ?>" required name="mobileno">
      </div>

      <div class="input_container">
      <i class="fa fa-mobile" aria-hidden="true"></i>
      <input type="text"  maxlength=10 id="mobile" id="field_email" class="input_field" value="<?php echo $get_user_work ?>" required name="typeofwork">
      </div>

      <div class="input_container">
      <i class='bx bxs-hard-hat icon' style='font-size:20px'></i>
      <input type="text"  maxlength=10 id="mobile" id="field_email" class="input_field" value="<?php echo $get_user_ex ?>" required name="experience">
      </div>

      <div class="input_container">
      <i class="fa fa-picture-o" aria-hidden="true"></i>
        <input type="file" id="field_email" id="field_email" class="input_field" required  class="input_field"  name="worker_img" >
      </div>
      <img style=" border-radius:100px; height:140px; width:140px; position:relative; left:815px; top:-360px" src="./worker_img/<?php echo $wr_img?>" alt="product image">
      
      <input type="submit"  name="update" value="Update Profile" id="input_submit" class="input_field">

      
      <span id="create_account">
      <span>Cancel Updating ?</span>  <a href="worker_dashboard.php">Go Back  </a>
      </span>
    </div>
</form>
<?php
include 'connect.php';

if(isset($_POST['update']))
            {
                $name=$_POST['wname'];
                $email=$_POST['email'];
                $address=$_POST['address'];
                $mo_no=$_POST['mobileno'];
                $work=$_POST['typeofwork'];
                $ex=$_POST['experience'];
                $wr_edit_img=$_FILES['worker_img'];

                $wr_edit_img=$_FILES['worker_img']['name'];
                $temp_edit_img=$_FILES['worker_img']['tmp_name'];


                // Checking for empty fields //
                if($name=='' or $email=='' or $address=='' or $mo_no=='' or $work=='' or $ex=='' or $wr_edit_img=='')
                {
                    echo "<script>alert('Please fill all th fields')</script>";
                }
                else
                {
                    // Query for updating photod
                        move_uploaded_file($temp_edit_img,"./worker_img/$wr_edit_img");

                        // Query For updating product //
                        $update_pr = "UPDATE `worker` SET `worker_name`='$name',`email`='$email',`worker_address`='$address',`mobile_number`='$mo_no',`type_of_work`='$work',`Work_Experience`='$ex',`worker_img`='$wr_edit_img' WHERE email='$user_session_name' ";
                        $res=mysqli_query($conn,$update_pr);
                        if($res)
                        {
                            echo "
                            <script>
                            alert('Profile Updated Successfully!!');
                            window.location.href='worker_dashboard.php';
                            </script>
                        ";    
                        } 
                }

            }
?>
  </div>
</body>
</body>
</html>