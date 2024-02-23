<?php
include 'connect.php';
if (isset($_POST['delete'])) 
{
    $id = $_POST['id'];
    $query = "DELETE FROM user WHERE Email='$id' ";
    $query_run=mysqli_query($conn,$query);
    if($query_run)
    {
                session_start();
                session_unset();
                session_destroy();
                echo "
                <script>
                alert('Account Deleted Successfully');
                window.location.href='index.php';
                </script>
                ";
                exit;
            }
            else
            {
                echo "
                <script>
                alert('Can't Delete try again later!');
                window.location.href='user_profile.php';
                </script>
                ";
            }         
}
?>