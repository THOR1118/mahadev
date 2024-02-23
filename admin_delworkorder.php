<?php
include 'connect.php';
if(isset($_GET['delete_workorder']))
{
    $delete = $_GET['delete_workorder'];

    // Delete Query //

    $delete_pr = "DELETE FROM `work_order` WHERE order_id='$delete'";
    $res=mysqli_query($conn,$delete_pr);
    if($res)
    {
        echo "
        <script>
        alert('User Deleted Successfully!!');
        window.location.href='admin_disp_workorder.php';
        </script>
    ";    
    }
}


?>