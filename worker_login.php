
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
<link rel="stylesheet" href="css/worker_login.css?v=<?php echo time();?>">  
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Worker Login</title>
</head>
<body>
<body>
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
                  <li><a href='user_profilenew.php'>My Profile</a></li>
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
          <li><a href='user_profilenew.php'>MyProfile</a></li>
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
                    if($_SERVER['REQUEST_METHOD'] == "POST")
                    {
                       include 'connect.php';
                       
                       $email = $_POST['email'];
                       $password = $_POST['password'];
                    
                    
                    
                       $sql = "SELECT * FROM `worker` WHERE email='$email'"; 
                       $result = mysqli_query($conn, $sql);
                       $num = mysqli_num_rows($result);
                       if($num == 1)
                       {
                        while($row=mysqli_fetch_assoc($result))
                        {
                          if(password_verify($password,$row['worker_password']))
                          {
                            session_start();
                            $_SESSION['wloggedin'] = true;
                            $_SESSION['emailid'] = $email;
                            echo "Login Successfull";
                            header("location: worker_dashboard.php");
                          }
                          else
                          {
                            echo "
                        <script>
                        alert('Email Id or Password Incorrect!!');
                        window.location.href='worker_login.php';
                        </script>   
                        ";
                          }
                        }
                       }
                       else
                       {
                        echo "
                        <script>
                        alert('Email Id or Password Incorrect!!');
                        window.location.href='worker_login.php';
                        </script>   
                        ";
                      }
                    }
                    ?>
  <div id="form_wrapper">
      <div id="form_left">
        <form action="" method="POST">
      <img src="images/workerimg3.jpg" alt="computer icon" style="height:150%; width:150%; margin-left:-300px; margin-top:-100px;"/>
    </div>
    <div id="form_right">

      <h1>Worker Login</h1>
      <div class="input_container">
        <i class="fas fa-envelope"></i>

        <input placeholder="Email" type="email" name="email" id="field_email" class="input_field" required/>
      </div>

      <div class="input_container">
        <i class="fas fa-lock"></i>
        <input placeholder="Password" type="password" name="password" id="field_password" class="input_field" required/>
      </div>

      <input  type="submit" value="Login" id="input_submit" class="input_field"/>

      <span>Forgot <a href="sendemail_worker.php">Password ?</a></span>
      <span id="create_account">
      <span>New to Mahadev Plywood?</a></span> <a href="worker_registration">Create your account ➡ </a> <br>
      </span>
    </div>
</form>
  </div>
</body>
</body>
</html>