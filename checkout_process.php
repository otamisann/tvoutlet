<?php
session_start();
require('includes/connection.php');
if (isset($_POST['place_order'])) {
    $userID = $_SESSION['user_id'];
    $phonenumber = $_POST['phonenumber'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $city = $_POST['city'];
    $barangay = $_POST['barangay'];
    $postal = $_POST['postal'];
    $total_payment = $_POST['grand_total'];
    $payment_method = $_POST['PaymentMethod'];
    $ShipDate = $_POST['ShipDate'];
    $ShipAddress = $address1 . " " . $address2 . " Barangay ," . $barangay . ", " . $city . " " . $postal;

    $sql_insert_order = "INSERT INTO mainordertbl (UserID,TotalPayment,PaymentMethod,ShipDate,ShipPayment,ShipAddress,ContactNum,Status) VALUES ('$userID','$total_payment','$payment_method','$ShipDate',250,'$ShipAddress','$phonenumber',2)";
    $res_insert_order = mysqli_query($conn, $sql_insert_order);
    // last id
    $last_id = mysqli_insert_id($conn);
    $sql_update_order = "UPDATE ordertbl SET MainOrderID = $last_id, OrderStatus = 3 WHERE OrderStatus = 1 AND userID = $userID;";
    if ($res_update_order = mysqli_query($conn, $sql_update_order)) {
        $_SESSION['order_complete'] = 1;
        echo '<script type="text/javascript">';
        echo 'window.location.href="order.php";';
        echo '</script>';
    } 

}
// echo "\n". $userID; 
// echo "\n". $phonenumber;
// echo "\n". $address1;
// echo "\n". $address2;
// echo "\n". $city;
// echo "\n". $barangay;
// echo "\n". $postal;
// echo "\n". $total_payment;
// echo "\n". $payment_method;
// echo $address1." ".$address2." Barangay ,".$barangay.", ".$city." ".$postal;
// echo $ShipAddress;
