<?php
include 'connect.php';
if(isset($_GET['delete_feedback']))
{
    $delete = $_GET['delete_feedback'];

    // Delete Query //

    $delete_pr = "DELETE FROM `feedback` WHERE Email='$delete'";
    $res=mysqli_query($conn,$delete_pr);
    if($res)
    {
        echo "
        <script>
        alert('Feedback Deleted Successfully!!');
        window.location.href='admin_disp_userfeedback.php';
        </script>
    ";    
    }
}


?>