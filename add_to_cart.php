<?php
session_start();
require('includes/connection.php');

$TVID = $_SESSION['order_item'];
$userID = $_SESSION['user_id'];
// select tv price from db
$sql_select_price = "SELECT TVPrice,TVName,TVModel,BrandName FROM `tvspecstbl` JOIN brandtbl ON tvspecstbl.TVBrandID = brandtbl.BrandID WHERE tvspecstbl.TVID = '$TVID';";
$res_select_price = mysqli_query($conn, $sql_select_price);
$row_tvprice = mysqli_fetch_assoc($res_select_price);
$TVPrice = $row_tvprice['TVPrice'];
$TVModel = $row_tvprice['TVModel'];
$TVName = $row_tvprice['TVName'];
$Brand = $row_tvprice['BrandName'];
// tv image
$sql_select_image = "SELECT * FROM tvimagetbl WHERE TVID = '$TVID' LIMIT 1;";
$res_select_image = mysqli_query($conn, $sql_select_image);
$row_select_image = mysqli_fetch_assoc($res_select_image);
$TVImage = $row_select_image['TVImage'];
// insert into order tbl
$sql_insert_order = "INSERT INTO ordertbl (TVID,userID,TVImage,TVName,TVModel,Brand,Price) VALUES ('$TVID','$userID','$TVImage','$TVName','$TVModel','$Brand','$TVPrice');";
if ($res_insert_order = mysqli_query($conn, $sql_insert_order)) {
    $_SESSION['added_to_cart'] = 1;
    header("location:single-product.php?TVID=$TVID");
} else {
    $_SESSION['added_to_cart'] = 0;
    header("location:single-product.php?TVID=$TVID");
}
