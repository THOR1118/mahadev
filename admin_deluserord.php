<?php
include 'connect.php';
if(isset($_GET['delete_order']))
{
    $delete = $_GET['delete_order'];

    // Delete Query //

    $delete_pr = "DELETE FROM `user_info` WHERE user_id='$delete'";
    $res=mysqli_query($conn,$delete_pr);
    if($res)
    {
        echo "
        <script>
        alert('User Order Deleted Successfully!!');
        window.location.href='admin_disp_userorder.php';
        </script>
    ";    
    }
}


?>