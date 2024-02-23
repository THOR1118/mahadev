<html>
<head>
    <style>
        *{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: poppins;
    text-decoration: none;
}
body{
    background-color: #f2f4f6;
    display: flex;
    align-items: center;
    justify-content: center;
}
div.login-form{
    width: 450px;
    background-color: white;
    box-shadow: 0px 5px 10px black;
}

div.login-form h2{
    text-align: center;
    background-color: #204969;
    padding: 12px 0px;
    color: white;
}
div.login-form form{
    padding: 30px 60px;
}
div.login-form form div.input-field{
    display: flex;
    flex-direction: row;
    margin: 10px 0px;
}
div.login-form form div.input-field i{
    color: darkslategray;
    padding: 10px 14px;
    background-color: #f2f4f6;
    margin-right: 4px;
}
div.login-form form div.input-field input{
    background-color: #f2f4f6;
    padding: 10px;
    border: none;
    width: 100%;
    padding-left: 15px;
}
div.login-form form button{
    width: 100%;
    background-color: #5bd1d7;
    padding: 8px;
    border: none;
    font-size: 16px;
    font-weight: 500;
    color: white;
    margin: 15px 0;
    transition: background-color 0.4s;
}
div.login-form form button:hover{
    background-color: #41b6e6;
}
div.login-form form div.extra{
    font-size: 14px;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
}
div.login-form form div.extra a:first-child{
    color: darkgrey;
}
div.login-form form div.extra a:last-child{
    color: grey;
}
    </style>
<title>admin login</title>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<link rel="stylesheet" type="text/css" href="alogin.css">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>
<body>

<div class="login-form">
    <h2>ADMIN LOGIN</h2>
    <form method="POST">
        <div class="input-field">
            <i class="bi bi-person-circle"></i>
            <input type="text" placeholder="Admin name" name="AdminName" required>
        </div>
        <div class="input-field">
            <i class="bi bi-lock"></i>
            <input type="password" placeholder="Password" name="AdminPassword" required>
        </div>
        
        <button type="submit"name="Signin">Sign In</button>


    </form>
</div>
<?php

if(isset($_POST['Signin']))
{
    $id = $_POST['AdminName'];
    $pass = $_POST['AdminPassword'];
    if($id=="admin" && $pass=="admin123")
    {
        echo "<script>
        alert('Logged In Successfully');
        </script>";
          session_start();
          $_SESSION['adminloggedin'] = true;
          $_SESSION['id']=$id;
          header("location:admin.php");
    }
    else
    {
        echo"<script>
        alert('Email Id or Password Incorrect!!');
        window.location.href='admin_login.php';
        </script>";

    }
}

?>

</body>
</html>