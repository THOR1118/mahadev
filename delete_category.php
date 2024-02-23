<?php
include 'connect.php';
if(isset($_GET['delete_category']))
{
    $delete_category = $_GET['delete_category'];

    // Delete Query //

    $delete_pr = "DELETE FROM `category` WHERE Category_ID='$delete_category'";
    $res=mysqli_query($conn,$delete_pr);
    if($res)
    {
        echo "
        <script>
        alert('Category Deleted Successfully!!');
        window.location.href='view_category.php';
        </script>
    ";    
    }
}


?>