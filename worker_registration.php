
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
<link rel="stylesheet" href="css/worker_register.css?v=<?php echo time();?>">  
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Worker Registration</title>
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

<?php
  
  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
  {
    echo "<div class='container1'>
          <nav>
              <ul class='nav1'>
      <a href='index.php'>
                  <img src='images/newlogo.jpg' class='logo1'>
        </a>
                  <li><a href='index.php'>Home</a></li>
                  <li><a href='product_page.php'>Products</a></li>
      <li><a href='worker.php'>Workers</a></li>
                  <li><a href='about_us.php'>About Us</a></li>
                  <li><a href='join_us.php'>Join Us</a></li>
                  <li><a href='contact.php'>Contact Us</a></li>
                  <i class='fa-solid fa-xmark'></i>
              </ul>
          </nav>
      </div>";
  }
  else
  {
    echo "<div class='header'>
      <a href='logo.png'>
      </a>
      <div class='container2'>
          <nav>
          <div class='menu-bar'>
    <a href='loggedinpg.php'>
           <img src='images/newlogo.jpg' alt='' class='logo'>
     </a> 
          <ul>
          <li><a href='user_profile.php'>MyProfile</a></li>
          <li><a href='loggedinpg.php'>Home</a></li>
          <li><a href='product_page.php'>Product</a></li>
      <li><a href='worker.php'>Workers</a></li>
    <li><a style='	text-decoration: none; color:black;'href='join_us.php'>Join Us</a></li>
    <li><a style='	text-decoration: none; color:black;'href='about_us.php'>About Us</a></li>
          <li><a href='contact.php'>Contact us</a></li>
          </ul>
      </div>
  </div>
          </nav>";
  }
?>
<?php

function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
  //whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
  }  
if($_SERVER['REQUEST_METHOD'] == "POST")
{
   include 'connect.php';
   if(isset($_POST['submit']))
   {

    $extension = pathinfo($_FILES["worker_img"]["name"], PATHINFO_EXTENSION);
    $extension_identity = pathinfo($_FILES["worker_identity_img"]["name"], PATHINFO_EXTENSION);
    if($extension=='jpg' || $extension=='jpeg' || $extension=='png')
    if($extension_identity=='jpg' || $extension_identity=='jpeg' || $extension_identity=='png')
{
  $workername = $_POST['wname'];
   $emailid = $_POST['email'];
   $adress = $_POST['address'];
   $password = $_POST['password'];
   $mobileno = $_POST['mobileno'];
   $typesofworker = $_POST['typesofworker'];
   $workexperience = $_POST['Experience'];
   $worker_ip = getIPAddress();

   $workerimage = $_FILES['worker_img']['name'];
   $tmp_img = $_FILES['worker_img']['tmp_name'];

   $worker_identity_img = $_FILES['worker_identity_img']['name'];
   $tmp_identity_img = $_FILES['worker_identity_img']['tmp_name'];
   move_uploaded_file($tmp_img,"./worker_img/$workerimage");
   move_uploaded_file($tmp_identity_img,"./worker_img/$worker_identity_img");

   $hash = password_hash($password,PASSWORD_DEFAULT);
   $sql = "INSERT INTO `worker` ( `worker_name`,`worker_ip`, `email`, `worker_address`, `worker_password`,`mobile_number`,`type_of_work`,`Work_Experience`,`worker_img`,`worker_identity_img`) 
   VALUES ( '$workername','$worker_ip', '$emailid', '$adress', '$hash','$mobileno','$typesofworker','$workexperience','$workerimage','$worker_identity_img')";
   $result = mysqli_query($conn, $sql);
   if($result)
   {
    session_start();
            $_SESSION['registered_worker'] = $emailid;
            echo "<script>
            alert('Registered  Successfully');
            window.location.href='worker_login.php';
            </script>
            "; 
   }
   else
   {
    echo "
            <script>
            alert('Worker already Registered!');
            window.location.href='worker_registration.php';
            </script>
            "; 
   }
}
else
{
  echo "
            <script>
            alert('File not valid!');
            window.location.href='worker_registration.php';
            </script>
            "; 
}
}   
}
?>

  <div id="form_wrapper">
      <div id="form_left">
         <form name="form" action="" method="POST" enctype="multipart/form-data" onsubmit="return myfun()">
      <img src="images/workerimg5.jpg" alt="worker icon" style="height:150%; width:150%; margin-left:-200px; margin-top:-100px;"/>
    </div>
    <div id="form_right">

      <h1>Worker Registration</h1>
      <div class="input_container">
      <i class="fa fa-user" aria-hidden="true"></i>

        <input type="text" placeholder="Name" id="field_email" class="input_field" required name="wname">
      </div>

      <div class="input_container">
      <i class="fa fa-envelope" aria-hidden="true"></i>
        <input type="email" placeholder="Email" id="field_email" class="input_field" required name="email">
      </div>

      <div class="input_container">
      <i class="fa fa-address-card" aria-hidden="true"></i>
        <input type="text" placeholder="Address" id="field_email" class="input_field" required name="address" maxlength=50>
      </div>

      <div class="input_container">
        <i class="fas fa-lock"></i>
        <input type="password" placeholder="Password" id="field_email" class="input_field" required name="password" minlength=8 maxlength=20>
      </div>

      <div class="input_container">
      <i class="fa fa-mobile" aria-hidden="true"></i>
        <input type="text"  maxlength=10 id="mobile" placeholder="Mobile Number" name="mobileno"  id="field_email" class="input_field" required >
      </div>

      <div class="input_container">
      <i class='bx bxs-hard-hat icon' style='font-size:20px'></i>
        <input type="text"  placeholder="Type Of Work" id="field_email" class="input_field" required name="typesofworker" >
      </div>

      <div class="input_container">
      <i class="fa fa-briefcase" aria-hidden="true"></i>
        <input type="text"  placeholder="Work Experience" name="Experience" id="field_email" class="input_field" required max=50 min=0>
      </div>

      <h4 style="color:blue;">Insert Profile Photo below</h4>
      <div class="input_container">
      <i class="fa fa-picture-o" aria-hidden="true"></i>  
      <input type="file" id="field_email" class="input_field" placeholder="img"  required name="worker_img" >
      </div>

      <h4 style="color:red;">Insert Aadhar card, Pan card or any ID card below</h4>
      <div class="input_container">
      <i class="fa fa-picture-o" aria-hidden="true"></i>
        <input type="file" id="field_email" class="input_field"  required name="worker_identity_img" >
      </div>
      
      <input type="submit"  name="submit" value="Sign Up" id="input_submit" class="input_field">

      
      <span id="create_account">
      <span>Already Registered ?</span>  <a href="worker_login.php">Login Here  </a> <br><a href="join_us.php">Go Back  </a>
      </span>
    </div>
</form>
  </div>
</body>
</body>
</html>