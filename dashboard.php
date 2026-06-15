<?php include('server11.php');
if(!isset($_SESSION['username'])){ header('location:login.php'); exit(); }
header('location:products.php'); exit();
?>