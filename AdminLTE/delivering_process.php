<?php
session_start();
require('../includes/connection.php');
$id = $_GET['MainOrderID'];

$sql_up_main = "UPDATE mainordertbl SET Status = 4,DeliveredOn = current_timestamp WHERE MainOrderID = $id;";
if ($res_up_main = mysqli_query($conn, $sql_up_main)) {
// update order tbl status
$sql_up_ordStat = "UPDATE ordertbl SET OrderStatus = 5 WHERE MainOrderID = $id;";
$res_up_ordStat = mysqli_query($conn, $sql_up_ordStat);

$_SESSION['delivered'] = 1;
header("location:deliver.php");

} else {
    echo "Eror: ". mysqli_errno($conn);
}
