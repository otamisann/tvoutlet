<?php
session_start();
require('../includes/connection.php');
$id = $_GET['MainOrderID'];

$sql_up_main = "UPDATE mainordertbl SET Status = 3,PackagedOn = current_timestamp WHERE MainOrderID = $id;";
if ($res_up_main = mysqli_query($conn, $sql_up_main)) {

    $sql_up_ord = "SELECT * FROM ordertbl WHERE MainOrderID = $id;";
    $res_up_ord = mysqli_query($conn, $sql_up_ord);
    
    while ($row_up_ord = mysqli_fetch_assoc($res_up_ord)) : 
        $tvid = $row_up_ord['TVID'];
        {
        $sql_sel_tv = "SELECT * FROM tvspecstbl WHERE TVID = $tvid;";
        $res_sel_tv = mysqli_query($conn, $sql_sel_tv);
        $row_tv_quant = mysqli_fetch_assoc($res_sel_tv);
            $tvquant = $row_tv_quant['TVQuantity']-1;
        $sql_up_tv = "UPDATE tvspecstbl SET TVQuantity = $tvquant WHERE TVID = $tvid;";
        $res_up_tv = mysqli_query($conn, $sql_up_tv);
    } 
endwhile;

// update order tbl status
$sql_up_ordStat = "UPDATE ordertbl SET OrderStatus = 4 WHERE MainOrderID = $id;";
$res_up_ordStat = mysqli_query($conn, $sql_up_ordStat);

$_SESSION['packaged'] = 1;
header("location:packaging.php");

} else {
    echo "Eror: ". mysqli_errno($conn);
}
