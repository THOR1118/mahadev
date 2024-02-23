











<?php

include 'connect.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


function sendMail($email,$resettoken)
{
    require('PHPMailer\PHPMailer.php');
    require('PHPMailer\SMTP.php');
    require('PHPMailer\Exception.php');

    $mail = new PHPMailer(true);


    try {
        //Server settings                                           //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'keshvalavijay99@gmail.com';            //SMTP username
        $mail->Password   = 'ryqlnsjjzpcmkcti';                     //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('keshvalavijay11@gmail.com', 'Mahadev Plywood');
        $mail->addAddress($email);     //Add a recipient
      
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Password Reset Link From Mahadev Plywood';
        $mail->Body    = "We got <b>Password Reset</b> request From you <br> 
        Click The Link Below <br>
        <a href='http://localhost/final/updatepassword_worker.php?email=$email&resettoken=$resettoken'>
        Reset Password
        </a>";
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }

    
}




if(isset($_POST['sendlink']))
{
    $query="SELECT * FROM `worker` WHERE `email`='$_POST[worker_email]'";
    $result=mysqli_query($conn,$query);
    if($result)
    {
       if(mysqli_num_rows($result)==1)
       {
        // email Found //
        $resettoken=bin2hex(random_bytes(16));
        date_default_timezone_set('Asia/Kolkata');
        $date=date("Y-m-d");
        $query= "UPDATE `worker` SET `resettoken` = '$resettoken', `resetexpiretoken` = '$date' WHERE `worker`.`email` = '$_POST[worker_email]'";
        if(mysqli_query($conn,$query) && sendMail($_POST['worker_email'],$resettoken))
        {
            echo "
            <script>
            alert('Password Reset Link Send To Your Mail');
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
       else
       {
        echo "
        <script>
        alert('Invalid Email Address');
        window.location.href='sendemail_worker.php';
        </script>
        ";
       }
    }
    else
    {
        echo "
        <script>
        alert('cannot run query');
        window.location.href='index.php';
        </script>
        ";
    }
}


?>