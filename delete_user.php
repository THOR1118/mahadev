<?php
include 'connect.php';
if(isset($_GET['delete_user']))
{
    $delete_user = $_GET['delete_user'];

    // Delete Query //

    $delete_pr = "DELETE FROM `user` WHERE user_id='$delete_user'";
    $res=mysqli_query($conn,$delete_pr);
    if($res)
    {
        echo "
        <script>
        alert('User Deleted Successfully!!');
        window.location.href='all_user_display.php';
        </script>
    ";    
    }
}


?>