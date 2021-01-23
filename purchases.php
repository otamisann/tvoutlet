<?php
session_start();
require('includes/connection.php');
// print_r($_SESSION);
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>tvOutlet || Purchases</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="AdminLTE/tvOutletIcon.png">
    <!-- All CSS Files -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Nivo-slider css -->
    <link rel="stylesheet" href="lib/css/nivo-slider.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Template color css -->
    <link href="css/color/color-core.css" data-style="styles" rel="stylesheet">
    <!-- User style -->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Modernizr JS -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
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
</head>

<body>
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
                                <h1 class="breadcrumbs-title">My Purchases</h1>
                                <ul class="breadcrumb-list">
                                    <li><a href="index.php">Home</a></li>
                                    <li>My Account</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BREADCRUMBS SETCTION END -->


        <!-- Start page content -->
        <div id="page-content" class="page-wrapper">

            <div class="shop-section mb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <?php include('includes/account_sidebar.php') ?>
                        </div>
                        <!-- account side -->
                        <div class="col-md-9">
                            <div>
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active">
                                        <a href="#all" aria-controls="all" role="tab" data-toggle="tab">All Purchase</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#ship" aria-controls="ship" role="tab" data-toggle="tab">To Ship</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#receive" aria-controls="receive" role="tab" data-toggle="tab">To
                                            Receive</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#completed" aria-controls="completed" role="tab" data-toggle="tab">Completed</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#cancelled" aria-controls="cancelled" role="tab" data-toggle="tab">Cancelled</a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="all">
                                        <div class="featured-product-section pt-30 pb-55">
                                        <div class="col-md-12">
                                                <div class="row">
                                                <!-- php ship -->
                                                <?php
                                                $sql_toShip = "SELECT * FROM `mainordertbl` RIGHT JOIN ordertbl ON mainordertbl.MainOrderID = ordertbl.MainOrderID WHERE mainordertbl.UserID = $_SESSION[user_id] AND OrderStatus = 2 OR OrderStatus = 3 OR OrderStatus = 4 OR OrderStatus = 5;";
                                                $res_toShip = mysqli_query($conn, $sql_toShip);
                                                while ($row_ship = mysqli_fetch_assoc($res_toShip)) :

                                                ?>
                                                <div class="col-md-3">
                                                        <div class="product-item product-item-2">
                                                            <div class="product-img box-shadow">
                                                                <a href="single-product.html">
                                                                    <img src="AdminLTE/images/<?php echo $row_ship['TVImage']; ?>" alt="" style="object-fit: scale-down;height: 181.88px;width: 180px;" />
                                                                </a>
                                                            </div>
                                                            <div class="product-info" style="border: 1px solid #666666;">
                                                                <h6 class="product-title">
                                                                    <a href="single-product.html"><?php echo $row_ship['TVName']; ?></a>
                                                                </h6>
                                                                <h6 class="brand-name"><?php echo $row_ship['Brand']; ?></h6>
                                                                <h3 class="pro-price">₱<?php echo number_format($row_ship['Price'],2); ?></h3>
                                                                <h5 class="mt-20" style="color: #FF7F00"><?php if ($row_ship['OrderStatus'] = 2){echo 'To Ship';} elseif ($row_ship['OrderStatus'] = 3){echo 'To Receive';} elseif ($row_ship['OrderStatus'] = 4){echo 'Shipped';} elseif ($row_ship['OrderStatus'] = 5){echo 'Cancelled';} ?></h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endwhile; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- SHIP -->
                                    <div role="tabpanel" class="tab-pane" id="ship">
                                        <div class="featured-product-section pt-30 pb-55">
                                            <div class="col-md-12">
                                                <div class="row">
                                                <!-- php ship -->
                                                <?php
                                                $sql_toShip = "SELECT * FROM `mainordertbl` RIGHT JOIN ordertbl ON mainordertbl.MainOrderID = ordertbl.MainOrderID WHERE mainordertbl.UserID = $_SESSION[user_id] AND mainordertbl.Status = 2;";
                                                $res_toShip = mysqli_query($conn, $sql_toShip);
                                                while ($row_ship = mysqli_fetch_assoc($res_toShip)) :

                                                ?>
                                                <div class="col-md-3">
                                                        <div class="product-item product-item-2">
                                                            <div class="product-img box-shadow">
                                                                <a href="single-product.html">
                                                                    <img src="AdminLTE/images/<?php echo $row_ship['TVImage']; ?>" alt="" style="object-fit: scale-down;height: 181.88px;width: 180px;" />
                                                                </a>
                                                            </div>
                                                            <div class="product-info" style="border: 1px solid #666666;">
                                                                <h6 class="product-title">
                                                                    <a href="single-product.html"><?php echo $row_ship['TVName']; ?></a>
                                                                </h6>
                                                                <h6 class="brand-name"><?php echo $row_ship['Brand']; ?></h6>
                                                                <h3 class="pro-price">₱<?php echo number_format($row_ship['Price'],2); ?></h3>
                                                            </div>
                                                            <ul class="action-button"  style="border: 1px solid #666666;">
                                                                <li>
                                                                    <a href="single-product.php?TVID=<?php echo $row_ship['TVID']; ?>" target="_blank" title="View product"><i class="zmdi zmdi-shopping-basket"></i></a>
                                                                </li>
                                                            </ul>
                                                            <ul class="action-button"  style="border: 1px solid #666666;">
                                                                <li>
                                                                    <a href="single-product.php?TVID=<?php echo $row_ship['TVID']; ?>" target="_blank" title="View product"><i class="zmdi zmdi-shopping-basket"></i></a>
                                                                </li>
                                                                <li>
                                                                    <a href="order_receipt.php?mainorderid=<?php echo $row_ship['MainOrderID']; ?>" target="_blank" title="View receipt"><i class="zmdi zmdi-receipt"></i></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                <?php endwhile; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="receive">
                                        <div class="featured-product-section pt-30 pb-55">
                                            <div class="col-md-12">
                                                <div class="row">

                                                    <!-- product-item start -->
                                                    <div class="col-md-3">
                                                        <div class="product-item product-item-2">
                                                            <div class="product-img">
                                                                <a href="single-product.html">
                                                                    <img src="img/product-2/1.jpg" alt="" />
                                                                </a>
                                                            </div>
                                                            <div class="product-info">
                                                                <h6 class="product-title">
                                                                    <a href="single-product.html">Product Name</a>
                                                                </h6>
                                                                <h6 class="brand-name">Sumsung</h6>
                                                                <h3 class="pro-price">$ 869.00</h3>
                                                            </div>
                                                            <ul class="action-button">
                                                                <li>
                                                                    <a href="#" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                                                </li>
                                                                <li>
                                                                    <a href="single-product.html" title="Buy Again"><i class="zmdi zmdi-shopping-basket"></i></a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" title="Order Details"><i class="zmdi zmdi-collection-text"></i></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <!-- product-item end -->
                                                    <!-- product-item start -->
                                                    <div class="col-md-3">
                                                        <div class="product-item product-item-2">
                                                            <div class="product-img">
                                                                <a href="single-product.html">
                                                                    <img src="img/product-2/1.jpg" alt="" />
                                                                </a>
                                                            </div>
                                                            <div class="product-info">
                                                                <h6 class="product-title">
                                                                    <a href="single-product.html">Product Name</a>
                                                                </h6>
                                                                <h6 class="brand-name">Sumsung</h6>
                                                                <h3 class="pro-price">$ 869.00</h3>
                                                            </div>
                                                            <ul class="action-button">
                                                                <li>
                                                                    <a href="#" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                                                </li>
                                                                <li>
                                                                    <a href="single-product.html" title="Buy Again"><i class="zmdi zmdi-shopping-basket"></i></a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" title="Order Details"><i class="zmdi zmdi-collection-text"></i></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <!-- product-item end -->
                                                    <!-- product-item start -->
                                                    <div class="col-md-3">
                                                        <div class="product-item product-item-2">
                                                            <div class="product-img">
                                                                <a href="single-product.html">
                                                                    <img src="img/product-2/1.jpg" alt="" />
                                                                </a>
                                                            </div>
                                                            <div class="product-info">
                                                                <h6 class="product-title">
                                                                    <a href="single-product.html">Product Name</a>
                                                                </h6>
                                                                <h6 class="brand-name">Sumsung</h6>
                                                                <h3 class="pro-price">$ 869.00</h3>
                                                            </div>
                                                            <ul class="action-button">
                                                                <li>
                                                                    <a href="#" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                                                </li>
                                                                <li>
                                                                    <a href="single-product.html" title="Buy Again"><i class="zmdi zmdi-shopping-basket"></i></a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" title="Order Details"><i class="zmdi zmdi-collection-text"></i></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <!-- product-item end -->
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="completed">
                                        <div class="featured-product-section pt-30 pb-55">
                                            <div class="col-md-12">
                                                <div class="row">

                                                    <!-- product-item start -->
                                                    <div class="col-md-3">
                                                        <div class="product-item product-item-2">
                                                            <div class="product-img">
                                                                <a href="single-product.html">
                                                                    <img src="img/product-2/1.jpg" alt="" />
                                                                </a>
                                                            </div>
                                                            <div class="product-info">
                                                                <h6 class="product-title">
                                                                    <a href="single-product.html">Product Name</a>
                                                                </h6>
                                                                <h6 class="brand-name">Sumsung</h6>
                                                                <h3 class="pro-price">$ 869.00</h3>
                                                            </div>
                                                            <ul class="action-button">
                                                                <li>
                                                                    <a href="#" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                                                </li>
                                                                <li>
                                                                    <a href="single-product.html" title="Buy Again"><i class="zmdi zmdi-shopping-basket"></i></a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" title="Order Details"><i class="zmdi zmdi-collection-text"></i></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <!-- product-item end -->
                                                    <!-- product-item start -->
                                                    <div class="col-md-3">
                                                        <div class="product-item product-item-2">
                                                            <div class="product-img">
                                                                <a href="single-product.html">
                                                                    <img src="img/product-2/1.jpg" alt="" />
                                                                </a>
                                                            </div>
                                                            <div class="product-info">
                                                                <h6 class="product-title">
                                                                    <a href="single-product.html">Product Name</a>
                                                                </h6>
                                                                <h6 class="brand-name">Sumsung</h6>
                                                                <h3 class="pro-price">$ 869.00</h3>
                                                            </div>
                                                            <ul class="action-button">
                                                                <li>
                                                                    <a href="#" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                                                </li>
                                                                <li>
                                                                    <a href="single-product.html" title="Buy Again"><i class="zmdi zmdi-shopping-basket"></i></a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" title="Order Details"><i class="zmdi zmdi-collection-text"></i></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <!-- product-item end -->
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="cancelled">
                                        <div class="featured-product-section pt-30 pb-55">
                                            <div class="col-md-12">
                                                <div class="row">

                                                    <!-- product-item start -->
                                                    <div class="col-md-3">
                                                        <div class="product-item product-item-2">
                                                            <div class="product-img">
                                                                <a href="single-product.html">
                                                                    <img src="img/product-2/1.jpg" alt="" />
                                                                </a>
                                                            </div>
                                                            <div class="product-info">
                                                                <h6 class="product-title">
                                                                    <a href="single-product.html">Product Name</a>
                                                                </h6>
                                                                <h6 class="brand-name">Sumsung</h6>
                                                                <h3 class="pro-price">$ 869.00</h3>
                                                            </div>
                                                            <ul class="action-button">
                                                                <li>
                                                                    <a href="#" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                                                </li>
                                                                <li>
                                                                    <a href="single-product.html" title="Buy Again"><i class="zmdi zmdi-shopping-basket"></i></a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" title="Order Details"><i class="zmdi zmdi-collection-text"></i></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <!-- product-item end -->
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- SHOP SECTION END -->

        </div>
        <!-- End page content -->

        <!-- START FOOTER AREA -->
        <footer id="footer" class="footer-area">
            <div class="footer-top">
                <div class="container-fluid">
                    <div class="plr-185">
                        <div class="footer-top-inner theme-bg">
                            <div class="row">
                                <div class="col-lg-4 col-md-5 col-sm-4">
                                    <div class="single-footer footer-about">
                                        <div class="footer-logo">
                                            <img src="img/logo/logo.png" alt="">
                                        </div>
                                        <div class="footer-brief">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                industry. Lorem Ipsum has been the subas industry's standard dummy text
                                                ever since the 1500s,</p>
                                            <p>When an unknown printer took a galley of type and If you are going to use
                                                a passage of Lorem Ipsum scrambled it to make.</p>
                                        </div>
                                        <ul class="footer-social">
                                            <li>
                                                <a class="facebook" href="" title="Facebook"><i class="zmdi zmdi-facebook"></i></a>
                                            </li>
                                            <li>
                                                <a class="google-plus" href="" title="Google Plus"><i class="zmdi zmdi-google-plus"></i></a>
                                            </li>
                                            <li>
                                                <a class="twitter" href="" title="Twitter"><i class="zmdi zmdi-twitter"></i></a>
                                            </li>
                                            <li>
                                                <a class="rss" href="" title="RSS"><i class="zmdi zmdi-rss"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-2 hidden-md hidden-sm">
                                    <div class="single-footer">
                                        <h4 class="footer-title border-left">Shipping</h4>
                                        <ul class="footer-menu">
                                            <li>
                                                <a href="#"><i class="zmdi zmdi-circle"></i><span>New
                                                        Products</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="zmdi zmdi-circle"></i><span>Discount
                                                        Products</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="zmdi zmdi-circle"></i><span>Best Sell
                                                        Products</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="zmdi zmdi-circle"></i><span>Popular
                                                        Products</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="zmdi zmdi-circle"></i><span>Manufactirers</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="zmdi zmdi-circle"></i><span>Suppliers</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="zmdi zmdi-circle"></i><span>Special
                                                        Products</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-3 col-sm-4">
                                    <div class="single-footer">
                                        <h4 class="footer-title border-left">my account</h4>
                                        <ul class="footer-menu">
                                            <li>
                                                <a href="my-account.html"><i class="zmdi zmdi-circle"></i><span>My
                                                        Account</span></a>
                                            </li>
                                            <li>
                                                <a href="wishlist.html"><i class="zmdi zmdi-circle"></i><span>My
                                                        Wishlist</span></a>
                                            </li>
                                            <li>
                                                <a href="cart.html"><i class="zmdi zmdi-circle"></i><span>My
                                                        Cart</span></a>
                                            </li>
                                            <li>
                                                <a href="login.html"><i class="zmdi zmdi-circle"></i><span>Sign
                                                        In</span></a>
                                            </li>
                                            <li>
                                                <a href="login.html"><i class="zmdi zmdi-circle"></i><span>Registration</span></a>
                                            </li>
                                            <li>
                                                <a href="checkout.html"><i class="zmdi zmdi-circle"></i><span>Check
                                                        out</span></a>
                                            </li>
                                            <li>
                                                <a href="order.html"><i class="zmdi zmdi-circle"></i><span>Oder
                                                        Complete</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="single-footer">
                                        <h4 class="footer-title border-left">Newsletter</h4>
                                        <div class="footer-message">
                                            <form action="#">
                                                <p>Enter your email address to know more about our latest offers</p>
                                                <input type="text" name="email" placeholder="Your email here...">
                                                <button class="submit-btn-1 mt-20 btn-hover-1" type="submit">Subscribe</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="footer-bottom black-bg">
                <div class="container-fluid">
                    <div class="plr-185">
                        <div class="copyright">
                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <div class="copyright-text">
                                        <p>&copy; <a href="https://themeforest.net/user/codecarnival/portfolio" target="_blank">CodeCarnival</a> 2016. All Rights Reserved.</p>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <ul class="footer-payment text-right">
                                        <li>
                                            <a href="#"><img src="img/payment/1.jpg" alt=""></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="img/payment/2.jpg" alt=""></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="img/payment/3.jpg" alt=""></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="img/payment/4.jpg" alt=""></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- END FOOTER AREA -->

        <!-- START QUICKVIEW PRODUCT -->
        <div id="quickview-wrapper">
            <!-- Modal -->
            <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="modal-product clearfix">
                                <div class="product-images">
                                    <div class="main-image images">
                                        <img alt="" src="img/product/quickview.jpg">
                                    </div>
                                </div><!-- .product-images -->

                                <div class="product-info">
                                    <h1>Aenean eu tristique</h1>
                                    <div class="price-box-3">
                                        <div class="s-price-box">
                                            <span class="new-price">£160.00</span>
                                            <span class="old-price">£190.00</span>
                                        </div>
                                    </div>
                                    <a href="single-product-left-sidebar.html" class="see-all">See all features</a>
                                    <div class="quick-add-to-cart">
                                        <form method="post" class="cart">
                                            <div class="numbers-row">
                                                <input type="number" id="french-hens" value="3">
                                            </div>
                                            <button class="single_add_to_cart_button" type="submit">Add to cart</button>
                                        </form>
                                    </div>
                                    <div class="quick-desc">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec
                                        est tristique auctor. Donec non est at libero.
                                    </div>
                                    <div class="social-sharing">
                                        <div class="widget widget_socialsharing_widget">
                                            <h3 class="widget-title-modal">Share this product</h3>
                                            <ul class="social-icons clearfix">
                                                <li>
                                                    <a class="facebook" href="#" target="_blank" title="Facebook">
                                                        <i class="zmdi zmdi-facebook"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="google-plus" href="#" target="_blank" title="Google +">
                                                        <i class="zmdi zmdi-google-plus"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="twitter" href="#" target="_blank" title="Twitter">
                                                        <i class="zmdi zmdi-twitter"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="pinterest" href="#" target="_blank" title="Pinterest">
                                                        <i class="zmdi zmdi-pinterest"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="rss" href="#" target="_blank" title="RSS">
                                                        <i class="zmdi zmdi-rss"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div><!-- .product-info -->
                            </div><!-- .modal-product -->
                        </div><!-- .modal-body -->
                    </div><!-- .modal-content -->
                </div><!-- .modal-dialog -->
            </div>
            <!-- END Modal -->
        </div>
        <!-- END QUICKVIEW PRODUCT -->
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