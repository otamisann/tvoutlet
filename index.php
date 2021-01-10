<?php
    require('includes/connection.php');
?>

<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>tvOutlet || Home</title>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="sweetalert2.all.min.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

</head>

<body>

    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml: true,
                version: 'v9.0'
            });
        };
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <!-- Your Chat Plugin code -->

    <div class="fb-customerchat" attribution=setup_tool page_id="106579068035942" theme_color="#ff7f00" logged_in_greeting="Hi! Welcome to tvOutlet!  How can we help you?" logged_out_greeting="Hi! Welcome to tvOutlet!  How can we help you?">
    </div>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!-- Body main wrapper start -->
    <div class="wrapper">

        <?php include('includes/index_header.php') ?>
        <!-- END HEADER AREA -->

        <!-- START SLIDER AREA -->
        <div class="slider-area  plr-185  mb-10">
            <div class="container-fluid">
                <div class="slider-content">
                    <div class="row">
                        <div class="active-slider-1 slick-arrow-1 slick-dots-1">
                            
                            <!-- layer-1 end -->
                            <!-- layer-1 Start -->
                            <div class="col-md-12 h-75">
                                <div class="layer-1">
                                    <div class="slider-img">
                                        <img src="AdminLTE/images/levant-qledtv-q60t-qa75q60tauxtw-frontblack-229832344.png" alt="" style="object-fit: cover; width: 100%;height: 100%;">
                                    </div>
                                    <div class="slider-info gray-bg h-100">
                                        <div class="slider-info-inner">
                                            <h1 class="slider-title-1 text-uppercase text-black-1">WaterProof smartphone
                                            </h1>
                                            <div class="slider-brief text-black-2">
                                                <p>There are many variations of passages of Lorem Ipsum available, but
                                                    the majority have suffered alteration in some form, by injected
                                                    humour, or randomised words which don't look even slightly
                                                    believable. If you are going to use a passage of Lorem Ipsum,</p>
                                            </div>
                                            <a href="#" class="button medium">
                                                <span class="text-uppercase">Buy now</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- layer-1 end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SLIDER AREA -->

        <!-- START PAGE CONTENT -->
        <section id="page-content" class="page-wrapper">

            <!-- FEATURED PRODUCT SECTION START -->
            <div class="featured-product-section section-bg-tb pt-80 pb-55">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title text-left mb-20">
                                <h2 class="uppercase">new products</h2>
                                <h6>There are many variations of passages of brands available,</h6>
                            </div>
                        </div>
                    </div>
                    <!-- php -->
                    <?php
                        $sql_new = "SELECT * FROM tvspecstbl join brandtbl ON TVBrandID = BrandID JOIN tvimagetbl ON tvspecstbl.TVID = tvimagetbl.TVID WHERE InputDate >= '2021-01-08 00:00:00' AND InputDate <= CURRENT_TIMESTAMP AND tvspecstbl.IsDelete = 0;";
                        $result_new = mysqli_query($conn, $sql_new);
                    ?>
                    <div class="featured-product">
                        <div class="row active-featured-product slick-arrow-2">
                    <?php while ($row_new = mysqli_fetch_assoc($result_new)) :
                                $TVID = $row_new['TVID'];
                                $TVName = $row_new['TVName'];
                                $BrandName = $row_new['BrandName'];
                                $TVPrice = $row_new['TVPrice'];
                                $TVImage = $row_new['TVImage'];
                                
                    ?>
                            <!-- product-item start -->
                            <div class="col-xs-12">
                                <div class="product-item product-item-2">
                                    <div class="product-img">
                                        <a href="single-product.php?TVID=<?php echo $TVID; ?>">
                                            <img src="AdminLTE/images/<?php echo $TVImage; ?>" alt="" style="object-fit: cover;width: 270px;height: 270px;" />
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <h6 class="product-title">
                                            <a href="single-product.php?TVID=<?php echo $TVID; ?>"><?php echo $TVName; ?></a>
                                        </h6>
                                        <h6 class="brand-name"><?php echo $BrandName; ?></h6>
                                        <h3 class="pro-price">₱ <?php echo number_format($TVPrice,2); ?></h3>
                                    </div>
                                    <ul class="action-button text-center">
                                        <li>
                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                        </li>
                                        <!-- <li>
                                            <a href="#" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                        </li> -->
                                    </ul>
                                </div>
                            </div>
                            <!-- product-item end -->
                    <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FEATURED PRODUCT SECTION END -->

            <!-- UP COMMING PRODUCT SECTION START -->
            <div class="up-comming-product-section ptb-60">
                <div class="container">
                    <div class="row">
                        <!-- up-comming-pro -->
                        <div class="col-md-8 col-sm-12 col-xs-12">
                            <div class="up-comming-pro gray-bg up-comming-pro-2 clearfix">
                                <div class="up-comming-pro-img f-left">
                                    <a href="#">
                                        <img src="img/up-comming/2.jpg" alt="">
                                    </a>
                                </div>
                                <div class="up-comming-pro-info f-left">
                                    <h3><a href="#">Upcoming Product Name</a></h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elitest, sed do eiusmod
                                        tempor incididunt ut labore et dolores top magna aliqua. Ut enim ad minim
                                        veniam, quis nostrud exer citation ullamco laboris nisi ut aliquip ex ea commodo
                                        consequat. laborum. </p>
                                    <div class="up-comming-time-2 clearfix">
                                        <div data-countdown="2017/01/15"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 hidden-sm col-xs-12">
                            <div class="banner-item banner-1" >
                                <div class="ribbon-price" >
                                    <span>Premium</span>
                                </div>
                                <div class="banner-img">
                                    <a href="#"><img src="https://www.lg.com/us/images/tvs/md06065137/features/TV-SIGNATURE-OLED-Z9-01-Intro-Desktop.jpg" alt="" style="object-fit: fill;width: 370px;height: 340px;"></a>
                                </div>
                                <div class="banner-info">
                                    <h2 class="font-weight-bold shadow-lg"><a href="products.php?price=" class=" text-white">Premium Televisions</a></h2>
                                    <ul class="banner-featured-list">
                                        <li>
                                            <i class="zmdi zmdi-check text-white"></i><span class="text-white">LG Signature</span>
                                        </li>
                                        <li>
                                            <i class="zmdi zmdi-check text-white"></i><span class="text-white">Sony ZH-Series</span>
                                        </li>
                                        <li>
                                            <i class="zmdi zmdi-check text-white"></i><span class="text-white">SAMSUNG QLEDs</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- UP COMMING PRODUCT SECTION END -->

            <!-- PRODUCT TAB SECTION START -->
            <div class="product-tab-section section-bg-tb pt-80 pb-55">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="section-title text-left mb-40">
                                <h2 class="uppercase">products</h2>
                                <h6>Our Popular and Best Sellers televsions</h6>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="pro-tab-menu pro-tab-menu-2 text-right">
                                <!-- Nav tabs -->
                                <ul class="">
                                    <li class="active"><a href="#popular-product" data-toggle="tab">Popular Products
                                        </a></li>
                                    <li><a href="#best-seller" data-toggle="tab">Best Seller</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="product-tab">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <!-- popular-product start -->
                            <div class="tab-pane active" id="popular-product">
                                <div class="row">
                                    <!-- php -->
                                    <?php
                                        $sql_popular = "SELECT * FROM tvspecstbl join brandtbl ON TVBrandID = BrandID JOIN tvimagetbl ON tvspecstbl.TVID = tvimagetbl.TVID WHERE InputDate >= '2021-01-08 00:00:00' AND InputDate <= CURRENT_TIMESTAMP AND tvspecstbl.IsDelete = 0 ORDER BY Views DESC LIMIT 8;";
                                        $result_popular = mysqli_query($conn, $sql_popular);
                                        while ($row_popular = mysqli_fetch_assoc($result_popular)) :
                                            $TVID = $row_popular['TVID'];
                                            $TVName = $row_popular['TVName'];
                                            $BrandName = $row_popular['BrandName'];
                                            $TVPrice = $row_popular['TVPrice'];
                                            $TVImage = $row_popular['TVImage'];
                                    ?>
                                    <!-- product-item start -->
                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                        <div class="product-item product-item-2">
                                            <div class="product-img">
                                                <a href="single-product.php?TVID=<?php echo $TVID; ?>">
                                                <img src="AdminLTE/images/<?php echo $TVImage; ?>" alt="" style="object-fit: cover;width: 270px;height: 270px;" />
                                                </a>
                                            </div>
                                            <div class="product-info">
                                                <h6 class="product-title">
                                                    <a href="single-product.php?TVID=<?php echo $TVID; ?>"><?php echo $TVName; ?></a>
                                                </h6>
                                                <h6 class="brand-name"><?php echo $BrandName; ?></h6>
                                                <h3 class="pro-price">₱<?php echo number_format($TVPrice,2); ?></h3>
                                            </div>
                                            <ul class="action-button text-center">
                                                <li>
                                                    <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                        <?php endwhile; ?>
                                    <!-- product-item end -->
                                </div>
                            </div>
                            <!-- popular-product end -->
                            <!-- best-seller start -->
                            <div class="tab-pane" id="best-seller">
                                <div class="row">
                                    <!-- product-item start -->
                                    <div class="col-md-3 col-sm-4 col-xs-12">
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
                                                    <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- product-item end -->
                                    <!-- product-item start -->
                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                        <div class="product-item product-item-2">
                                            <div class="product-img">
                                                <a href="single-product.html">
                                                    <img src="img/product-2/4.jpg" alt="" />
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
                                                    <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- product-item end -->
                                    <!-- product-item start -->
                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                        <div class="product-item product-item-2">
                                            <div class="product-img">
                                                <a href="single-product.html">
                                                    <img src="img/product-2/7.jpg" alt="" />
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
                                                    <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- best-seller end -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- PRODUCT TAB SECTION END -->

            <!-- BLOG SECTION START -->
            <div class="blog-section-2 pt-60 pb-30">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title text-left mb-40">
                                <h2 class="uppercase">Latest blog</h2>
                                <h6>There are many variations of passages of brands available,</h6>
                            </div>
                        </div>
                    </div>
                    <div class="blog">
                        <div class="row active-blog-2">
                            <!-- blog-item start -->
                            <div class="col-xs-12">
                                <div class="blog-item-2">
                                    <div class="row">
                                        <div class="col-md-6 col-xs-12">
                                            <div class="blog-image">
                                                <a href="single-blog.html"><img src="img/blog/4.jpg" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="blog-desc">
                                                <h5 class="blog-title-2"><a href="#">dummy Blog name</a></h5>
                                                <p>There are many variations of passages of in psum available, but the
                                                    majority have sufe ered on in some form...</p>
                                                <div class="read-more">
                                                    <a href="#">Read more</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- blog-item end -->
                            <!-- blog-item start -->
                            <div class="col-xs-12">
                                <div class="blog-item-2">
                                    <div class="row">
                                        <div class="col-md-6 col-xs-12">
                                            <div class="blog-image">
                                                <a href="single-blog.html"><img src="img/blog/5.jpg" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="blog-desc">
                                                <h5 class="blog-title-2"><a href="#">dummy Blog name</a></h5>
                                                <p>There are many variations of passages of in psum available, but the
                                                    majority have sufe ered on in some form...</p>
                                                <div class="read-more">
                                                    <a href="#">Read more</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- blog-item end -->
                            <!-- blog-item start -->
                            <div class="col-xs-12">
                                <div class="blog-item-2">
                                    <div class="row">
                                        <div class="col-md-6 col-xs-12">
                                            <div class="blog-image">
                                                <a href="single-blog.html"><img src="img/blog/4.jpg" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="blog-desc">
                                                <h5 class="blog-title-2"><a href="#">dummy Blog name</a></h5>
                                                <p>There are many variations of passages of in psum available, but the
                                                    majority have sufe ered on in some form...</p>
                                                <div class="read-more">
                                                    <a href="#">Read more</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- blog-item end -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- BLOG SECTION END -->

        </section>
        <!-- END PAGE CONTENT -->

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