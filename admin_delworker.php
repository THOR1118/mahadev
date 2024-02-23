<?php
include 'connect.php';
if(isset($_GET['delete_worker']))
{
    $delete = $_GET['delete_worker'];

    // Delete Query //

    $delete_pr = "DELETE FROM `worker` WHERE worker_id='$delete'";
    $res=mysqli_query($conn,$delete_pr);
    if($res)
    {
        echo "
        <script>
        alert('User Deleted Successfully!!');
        window.location.href='admin_disp_worker.php';
        </script>
    ";    
    }
}


?>