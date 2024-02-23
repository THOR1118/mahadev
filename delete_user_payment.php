<?php
include 'connect.php';
if(isset($_GET['delete_user_payments']))
{
    $delete_user_payments = $_GET['delete_user_payments'];

    // Delete Query //

    $delete_pr = "DELETE FROM `user_payment` WHERE order_id='$delete_user_payments'";
    $res=mysqli_query($conn,$delete_pr);
    if($res)
    {
        echo "
        <script>
        alert('Payment Deleted Successfully!!');
        window.location.href='all_user_payment.php';
        </script>
    ";    
    }
}


?>