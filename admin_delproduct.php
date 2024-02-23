<?php
include 'connect.php';
if(isset($_GET['delete_product']))
{
    $delete = $_GET['delete_product'];

    // Delete Query //

    $delete_pr = "DELETE FROM `product` WHERE Product_ID='$delete'";
    $res=mysqli_query($conn,$delete_pr);
    if($res)
    {
        echo "
        <script>
        alert('User Deleted Successfully!!');
        window.location.href='admin_disp_product.php';
        </script>
    ";    
    }
}


?>