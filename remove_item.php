<?php
session_start();
require('includes/connection.php');

$orderID = $_GET['remove_id'];
$userID = $_SESSION['user_id'];

$sql_remove_cart = "UPDATE ordertbl SET OrderStatus = 2 WHERE OrderID = $orderID;";
if ($res_remove_cart = mysqli_query($conn, $sql_remove_cart)) {
    $_SESSION['removed_from_cart'] = 1;
    header("location:cart.php");
} else {
    $_SESSION['removed_from_cart'] = 0;
    header("location:cart.php");
}
