<?php
include 'connect.php';
if(isset($_GET['delete_user_order']))
{
    $pr_id = $_GET['delete_user_order'];

    // Delete Query //

    $delete_pr = "DELETE FROM `user_info` WHERE product_id='$pr_id'";
    $res=mysqli_query($conn,$delete_pr);
    if($res)
    {
        echo "
        <script>
        alert('Order Canceled Successfully!!');
        window.location.href='user_profilenew.php'; 
        </script>
    ";    
    }
}


?>