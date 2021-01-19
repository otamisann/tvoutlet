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
<?php include('includes/header.php') ?>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!-- Body main wrapper start -->
    <div class="wrapper">

        <!-- START HEADER AREA -->
        <?php include('includes/index_header.php') ?>
        <!-- END HEADER AREA -->

        <!-- BREADCRUMBS SETCTION START -->
        <div class="breadcrumbs-section plr-200 mb-40">
            <div class="breadcrumbs overlay-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="breadcrumbs-inner">
                                <h1 class="breadcrumbs-title">Shopping Cart</h1>
                                <ul class="breadcrumb-list">
                                    <li><a href="index.html">Home</a></li>
                                    <li>Shopping Cart</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BREADCRUMBS SETCTION END -->
        <?php
        if (isset($_SESSION['removed_from_cart'])) {
            if ($_SESSION['removed_from_cart'] == 1) { ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Item removed from cart',
                        showConfirmButton: false,
                        timer: 2000
                        // text: 'please',
                        // confirmButtonText: 'Try again',
                        // confirmButtonColor: '#FF7F00'
                    })
                </script>
            <?php unset($_SESSION['removed_from_cart']);
            } elseif ($_SESSION['removed_from_cart'] == 0) { ?>
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Item error',
                        showConfirmButton: false,
                        timer: 2000
                        // text: 'please',
                        // confirmButtonText: 'Try again',
                        // confirmButtonColor: '#FF7F00'
                    })
                </script>
        <?php unset($_SESSION['removed_from_cart']);
            }
        }
        ?>

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
                                    <a>
                                        <span>02</span>
                                        Checkout
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span>03</span>
                                        Order complete
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-10 col-sm-12">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <!-- shopping-cart start -->
                                <div class="tab-pane active" id="shopping-cart">
                                    <div class="shopping-cart-content">
                                        <form action="#">
                                            <div class="table-content table-responsive">
                                                <table class="text-center">
                                                    <thead>
                                                        <tr>
                                                            <th class="product-thumbnail">Item</th>
                                                            <th class="product-price">unit price</th>
                                                            <th class="product-quantity">Quantity</th>
                                                            <th class="product-subtotal">subtotal</th>
                                                            <th class="product-remove">remove</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- tr -->
                                                        <!-- php -->
                                                        <?php
                                                        $tot_cart = 0;
                                                        $sql_cart = "SELECT * FROM ordertbl WHERE OrderStatus = 1 and userID = '$_SESSION[user_id]';";
                                                        $res_cart = mysqli_query($conn, $sql_cart);
                                                        while ($row_cart = mysqli_fetch_assoc($res_cart)) :
                                                            $OrderID = $row_cart['OrderID'];
                                                            $tvname = $row_cart['TVName'];
                                                            $tvmodel = $row_cart['TVModel'];
                                                            $tvimage = $row_cart['TVImage'];
                                                            $brand = $row_cart['Brand'];
                                                            $price = $row_cart['Price'];
                                                            $tot_cart = $tot_cart + $price;
                                                        ?>
                                                            <tr>
                                                                <td class="product-thumbnail">
                                                                    <div class="pro-thumbnail-img">
                                                                        <img src="AdminLTE/images/<?php echo $tvimage; ?>" style="object-fit: scale-down;width: 100px;height: 111px;" alt="">
                                                                    </div>
                                                                    <div class="pro-thumbnail-info text-left">
                                                                        <h6 class="product-title-2">
                                                                            <a href="single-product.html"><?php echo $tvname; ?></a>
                                                                        </h6>
                                                                        <p>Manufacturer: <?php echo $brand; ?></p>
                                                                        <p>Model: <?php echo $tvmodel; ?></p>
                                                                        <!-- <p>TV Size: 65"</p> -->
                                                                    </div>
                                                                </td>
                                                                <td class="product-price">₱<?php echo number_format($price, 2) ?></td>
                                                                <!-- item quantity -->
                                                                <td class="product-price">1</td>
                                                                <td class="product-subtotal">₱<?php echo number_format($price, 2) ?></td>
                                                                <td class="product-remove">
                                                                    <center><a href="remove_item.php?remove_id=<?php echo $OrderID; ?>"><i class="zmdi zmdi-close ce"></i></a></center>
                                                                </td>
                                                            </tr>
                                                        <?php endwhile; ?>
                                                        <tr>
                                                            <td colspan="3">

                                                            </td>
                                                            <td colspan="2" class="product-price" style="background-color: orange;color: white;">
                                                                Order Total: ₱<?php echo number_format($tot_cart, 2) ?>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <a href="checkout.html" class="button extra-small mt-20 f-right" tabindex="-1">
                                                <span class="text-uppercase">Proceed to checkout</span>
                                            </a>
                                            <a href="shop.php" class="button extra-small button-black mt-20 f-right" tabindex="-1">
                                                <span class="text-uppercase">Continue shopping</span>
                                            </a>

                                        </form>
                                    </div>
                                </div>
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