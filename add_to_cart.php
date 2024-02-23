<?php
session_start();
if(isset($_GET['add_to_cart']))
{
    $pr_id=$_GET['add_to_cart'];
    if(isset($_GET['quantity']))
    {
        $quantity = $_GET['quantity'];
    }
    else
    {
        $quantity = 1;
    }
    $_SESSION['cart'][$pr_id] = array('quantity' => $quantity);
    // echo "<pre>";
    // print_r($_SESSION['cart']);
    // echo "</pre>";
    header('location:cart.php');
}
?>