<?php
session_start();
session_unset();
session_destroy();
header("location: shopowner_login.php");
exit;
?>