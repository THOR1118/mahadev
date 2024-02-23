<?php
include 'connect.php';
if(isset($_GET['delete_category']))
{
    $delete = $_GET['delete_category'];

    // Delete Query //

    $delete_pr = "DELETE FROM `category` WHERE Category_ID='$delete'";
    $res=mysqli_query($conn,$delete_pr);
    if($res)
    {
        echo "
        <script>
        alert('User Deleted Successfully!!');
        window.location.href='admin_disp_category.php';
        </script>
    ";    
    }
}


?>