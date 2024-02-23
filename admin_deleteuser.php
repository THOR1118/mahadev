<?php
include 'connect.php';
if(isset($_GET['delete_user']))
{
    $delete = $_GET['delete_user'];

    // Delete Query //

    $delete_pr = "DELETE FROM `user` WHERE user_id='$delete'";
    $res=mysqli_query($conn,$delete_pr);
    if($res)
    {
        echo "
        <script>
        alert('User Deleted Successfully!!');
        window.location.href='admin_disp_user.php';
        </script>
    ";    
    }
}


?>