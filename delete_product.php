<?php
include 'connect.php';
if(isset($_GET['delete']))
{
    $delete = $_GET['delete'];

    // Delete Query //

    $delete_pr = "DELETE FROM `product` WHERE Product_ID='$delete'";
    $res=mysqli_query($conn,$delete_pr);
    if($res)
    {
        echo "
        <script>
        alert('Product Deleted Successfully!!');
        window.location.href='view_products.php';
        </script>
    ";    
    }
}


?>