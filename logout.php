<?php
session_start();
$total_price2 = $total_price2 - $total_price2;
 
$_SESSION = array();
 
session_destroy();
 
header("location: login.php");
exit;
?>