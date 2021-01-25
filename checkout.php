<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
}
require('includes/connection.php');
// print_r($_SESSION);
?>
<!doctype html>
<html class="no-js" lang="en">
<title>tvOutlet || Cart</title>
<style>
    input[type="number"],
    input[type="date"],
    input[type="email"] {
        background: #fff none repeat;
        border: 1px solid transparent;
        box-shadow: 0 0 4px rgba(0, 0, 0, 0.1);
        color: #999999;
        font-size: 13px;
        height: 40px;
        margin-bottom: 20px;
        padding-left: 20px;
        width: 100%;
    }
</style>
<?php include('includes/header.php') ?>

<body>
    <!-- Body main wrapper start -->
    <div class="wrapper">

        <!-- START HEADER AREA -->
        <?php include('includes/index_header.php') ?>
        <!-- END HEADER AREA -->

        <!-- BREADCRUMBS SETCTION START -->
        <div class="breadcrumbs-section plr-200 mb-80">
            <div class="breadcrumbs overlay-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="breadcrumbs-inner">
                                <h1 class="breadcrumbs-title">Checkout</h1>
                                <ul class="breadcrumb-list">
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="cart.php">Cart</a></li>
                                    <li>Checkout</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BREADCRUMBS SETCTION END -->

        <!-- Start page content -->
        <section id="page-content" class="page-wrapper">

            <!-- SHOP SECTION START -->
            <div class="shop-section mb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2">
                            <ul class="cart-tab">
                                <li>
                                    <a class="active" href="cart.php">
                                        <span>01</span>
                                        Shopping cart
                                    </a>
                                </li>
                                <li>
                                    <a class="active" href="#checkout">
                                        <span>02</span>
                                        Checkout
                                    </a>
                                </li>
                                <li>
                                    <a href="#order-complete">
                                        <span>03</span>
                                        Order complete
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-10">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <!-- checkout start -->
                                <div class="tab-pane active" id="checkout">
                                    <div class="checkout-content box-shadow p-30">
                                        <form action="checkout_process.php" method="POST">
                                            <div class="row">
                                                <!-- billing details -->
                                                <div class="col-md-6">
                                                    <div class="billing-details pr-10">
                                                        <h6 class="widget-title border-left mb-20">Delivery address</h6>
                                                        <!-- php -->
                                                        <?php
                                                        $sql_user = "SELECT * FROM `usertbl` WHERE userID = $_SESSION[user_id];";
                                                        $res_user = mysqli_query($conn, $sql_user);
                                                        $row_user = mysqli_fetch_assoc($res_user);
                                                        ?>
                                                        <!-- php -->
                                                        <input style="font-weight: 800;" type="text" placeholder="Your Name Here..." value="<?php echo $row_user['firstname'] . " " . $row_user['lastname']; ?> - <?php echo $row_user['phonenumber']; ?>" disabled="">
                                                        <!-- inputs -->
                                                        <!--  -->
                                                        <label for="">Phone Number</label>
                                                        <input type="text" placeholder="Phone Number" value="<?php echo $row_user['phonenumber']; ?>" name="phonenumber" required>
                                                        <!--  -->
                                                        <label for="">Address Line 1</label>
                                                        <input type="text" placeholder="Address Line 1" value="<?php echo $row_user['address1']; ?>" name="address1" required>
                                                        <!--  -->
                                                        <label for="">Address Line 2 (Optional)</label>
                                                        <input type="text" placeholder="Address Line 2 (Optional)" value="<?php echo $row_user['address2']; ?>" name="address2">
                                                        <!--  -->
                                                        <label for="">City</label>
                                                        <input type="text" placeholder="City" value="<?php echo $row_user['city']; ?>" name="city" required>
                                                        <!--  -->
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="col-md-6">
                                                                    <!--  -->
                                                                    <label for="">Barangay</label>
                                                                    <input type="text" placeholder="Barangay" value="<?php echo $row_user['barangay']; ?>" name="barangay" required>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <!--  -->
                                                                    <label for="">Postal Code</label>
                                                                    <input type="number" placeholder="Postal Code" value="<?php echo $row_user['postalcode']; ?>" name="postal" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <!-- our order -->
                                                    <div class="payment-details pl-10 mb-50">
                                                        <h6 class="widget-title border-left mb-20">Products ordered</h6>
                                                        <table>
                                                            <!-- products -->
                                                            <!-- php -->
                                                            <?php
                                                            $totalprice = 0;
                                                            $sql_products_ordered = "SELECT * FROM `ordertbl` WHERE userID = $_SESSION[user_id] AND OrderStatus = 1;";
                                                            $res_products_ordered = mysqli_query($conn, $sql_products_ordered);
                                                            while ($row_ordered = mysqli_fetch_assoc($res_products_ordered)) :
                                                                $totalprice = $totalprice + $row_ordered['Price'];
                                                                $grandtotal = $totalprice + 250;
                                                            ?>
                                                                <tr>
                                                                    <td class="td-title-1"><?php echo $row_ordered['TVName']; ?></td>
                                                                    <td class="td-title-2">₱ <?php echo number_format($row_ordered['Price'], 2); ?></td>
                                                                </tr>
                                                            <?php endwhile; ?>
                                                            <tr>
                                                                <td class="order-total">Cart Subtotal</td>
                                                                <td class="td-title-2">₱ <?php echo number_format($totalprice, 2); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="order-total">Shipping and Handing</td>
                                                                <td class="td-title-2">₱ 250.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="order-total">Order Total</td>
                                                                <td class="order-total-price h3">₱<?php echo number_format($grandtotal, 2); ?></td>
                                                            </tr>
                                                            <input type="hidden" name="grand_total" value="<?php echo $grandtotal; ?>">
                                                        </table>
                                                        <div class="quote-author pl-10">
                                                            <?php $shipdate = date('Y-j-n ', strtotime('2 week')); ?>
                                                            <p class="quote-border pl-30">(Standard Delivery) Received
                                                                by <?php echo $shipdate; ?> </p>
                                                            <input type="hidden" name="ShipDate" value="<?php echo $shipdate; ?>">
                                                        </div>
                                                    </div>
                                                    <!-- payment-method -->
                                                    <div class="payment-method">
                                                        <h6 class="widget-title border-left mb-20">payment method</h6>
                                                        <div class="new-customers p-30">
                                                            <select class="custom-select" name="PaymentMethod" required>
                                                                <option selected="" disabled value="">Payment Method</option>
                                                                <option value="Cash on Delivery">Cash on Delivery</option>
                                                                <option value="Credit/Debit Card">Credit / Debit Card</option>
                                                            </select>
                                                            <p class="quote-border pl-30">(Standard Delivery) Received
                                                                by Jan 8 - 10 </p>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <input type="text" placeholder="Card Number">
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <input type="text" placeholder="Card Security Code">
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <select class="custom-select">
                                                                        <option value="defalt">Month</option>
                                                                        <option value="c-1">January</option>
                                                                        <option value="c-2">February</option>
                                                                        <option value="c-3">March</option>
                                                                        <option value="c-4">April</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <select class="custom-select">
                                                                        <option value="defalt">Year</option>
                                                                        <option value="c-4">2017</option>
                                                                        <option value="c-1">2016</option>
                                                                        <option value="c-2">2015</option>
                                                                        <option value="c-3">2014</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- payment-method end -->
                                                    <button class="submit-btn-1 mt-30 btn-hover-1 f-right" type="submit" name="place_order" >place order</button>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- end form -->
                                    </div>
                                </div>
                                <!-- checkout end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- SHOP SECTION END -->

        </section>
        <!-- End page content -->

        <!-- START FOOTER AREA -->
        <?php include('includes/footer.php'); ?>
        <!-- END FOOTER AREA -->
    </div>
    <!-- Body main wrapper end -->


    <!-- Placed JS at the end of the document so the pages load faster -->

    <!-- jquery latest version -->
    <script src="js/vendor/jquery-3.1.1.min.js"></script>
    <!-- Bootstrap framework js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- jquery.nivo.slider js -->
    <script src="lib/js/jquery.nivo.slider.js"></script>
    <!-- All js plugins included in this file. -->
    <script src="js/plugins.js"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="js/main.js"></script>

</body>

</html>