<?php
   include 'connect.php';

   if ($_SERVER['REQUEST_METHOD']=="POST") 
   {



    if(isset('btn-send'))
    {

   $username = $_POST['name'];
   $email = $_POST['email'];
   $message = $_POST['message'];



   $sql = "INSERT INTO `feedback` (`UserName`, `Email`, `Message`) 
   VALUES ('$username', '$email', '$message')";
   $result = mysqli_query($conn, $sql);
   if($result)
   {
    echo "
    <script>
    alert('Feedback Submitted!');
    </script>
    ";
   }
   else
   {
    echo "
    <script>
    alert('Please try again later');
    window.location.href='contact.php';
    </script>
    ";
   }
}
else
{
    echo "
    <script>
    alert('Please try again later');
    window.location.href='contact.php';
    </script>
    ";
}
}
?>
