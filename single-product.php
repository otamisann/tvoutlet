<?php
require('includes/connection.php');
$_SESSION['recent_product'] = $_GET['TVID'];
?>
<!doctype html>
<html class="no-js" lang="en">
<title>tvOutlet || Product</title>
<?php include('includes/header.php') ?>

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
        <!-- Start page content -->
        <section id="page-content" class="page-wrapper">
            <!-- php -->
            <?php
            $sql_product = "SELECT * FROM tvspecstbl JOIN brandtbl ON TVBrandID = BrandID JOIN tvscreentechtbl ON TVScreenTech = ScreenTechID WHERE tvspecstbl.TVID = '$_GET[TVID]';";
            $result_product = mysqli_query($conn, $sql_product);
            $row_product = mysqli_fetch_assoc($result_product);
            $new_view = $row_product['Views'] + 1;
            $sql_update_view = "UPDATE tvspecstbl SET Views = $new_view WHERE TVID = '$_GET[TVID]';";
            $result_update_view = mysqli_query($conn, $sql_update_view);

            ?>

            <!-- SHOP SECTION START -->
            <div class="shop-section mb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-xs-12">
                            <!-- single-product-area start -->
                            <div class="single-product-area mb-80">
                                <div class="row">
                                    <!-- imgs-zoom-area start -->
                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                        <div class="imgs-zoom-area">
                                            <img id="zoom_03" src="https://www.lg.com/ph/images/tvs/md06220897/gallery/DM_01_vv.jpg" style="object-fit: cover;width: 300px;height: 270px;" data-zoom-image="https://www.lg.com/ph/images/tvs/md06220897/gallery/DM_01_vv.jpg" alt="">
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div id="gallery_01" class="carousel-btn slick-arrow-3 mt-30">
                                                        <div class="p-c">
                                                            <a href="#" data-image="https://www.lg.com/ph/images/tvs/md06220897/gallery/DM_01_vv.jpg" data-zoom-image="https://www.lg.com/ph/images/tvs/md06220897/gallery/DM_01_vv.jpg">
                                                                <img class="zoom_03" src="https://www.lg.com/ph/images/tvs/md06220897/gallery/DM_01_vv.jpg" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="p-c">
                                                            <a href="#" data-image="https://www.lg.com/ph/images/tvs/md06220897/gallery/DM_01_vv.jpg" data-zoom-image="img/product/3.jpg">
                                                                <img class="zoom_03" src="https://www.lg.com/ph/images/tvs/md06220897/gallery/DM_01_vv.jpg" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="p-c">
                                                            <a href="#" data-image="img/product/4.jpg" data-zoom-image="img/product/4.jpg">
                                                                <img class="zoom_03" src="img/product/4.jpg" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="p-c">
                                                            <a href="#" data-image="img/product/5.jpg" data-zoom-image="img/product/5.jpg">
                                                                <img class="zoom_03" src="img/product/5.jpg" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="p-c">
                                                            <a href="#" data-image="img/product/6.jpg" data-zoom-image="img/product/6.jpg">
                                                                <img class="zoom_03" src="img/product/6.jpg" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="p-c">
                                                            <a href="#" data-image="img/product/7.jpg" data-zoom-image="img/product/7.jpg">
                                                                <img class="zoom_03" src="img/product/7.jpg" alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- imgs-zoom-area end -->
                                    <!-- single-product-info start -->
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                        <br>
                                        <div class="single-product-info">
                                            <div class="pro-rating sin-pro-rating f-right">
                                                <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#" tabindex="0"><i class="zmdi zmdi-star-half"></i></a>
                                                <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                <span class="text-black-5">( 27 Rating)</span>
                                            </div>
                                            <h3 class="text-black-1"><?php echo $row_product['TVName']; ?></h3>
                                            <h6 class="brand-name-1">MODEL : <?php echo $row_product['TVModel']; ?></h6>
                                            <h6 class="brand-name-2"><?php echo $row_product['BrandName']; ?></h6>
                                            <!--  hr -->
                                            <hr>
                                            <!-- plus-minus-pro-action -->
                                            <div class="plus-minus-pro-action clearfix">
                                                <div class="sin-plus-minus f-left clearfix">
                                                    <p class="color-title f-left">Qty</p>
                                                    <div class="cart-plus-minus f-left">
                                                        <input type="number" value="1" min="1" max="7" maxlength="7" name="qtybutton" class="cart-plus-minus-box">
                                                    </div>
                                                </div>
                                                <div class="sin-pro-action f-right">
                                                    <ul class="action-button">
                                                        <li>
                                                            <a href="#" title="Add to Wishlist" tabindex="0"><i class="zmdi zmdi-favorite"></i></a>
                                                        </li>
                                                        <!-- <li>
                                                            <a href="#" data-toggle="modal" data-target="#productModal" title="Quickview" tabindex="0"><i class="zmdi zmdi-zoom-in"></i></a>
                                                        </li> -->
                                                        <!-- <li>
                                                            <a href="#" title="Add to cart" tabindex="0"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                        </li> -->
                                                        <li>
                                                            <a href="#" title="Share to Facebook" tabindex="0"><i class="zmdi zmdi-facebook"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#" title="Share to Twitter" tabindex="0"><i class="zmdi zmdi-twitter"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- plus-minus-pro-action end -->
                                            <!-- hr -->
                                            <hr>
                                            <!-- single-product-price -->
                                            <h3 class="pro-price">Price: ₱ <?php echo number_format($row_product['TVPrice'], 2); ?></h3>
                                            <!--  hr -->
                                            <hr>
                                            <div>
                                                <a href="#" class="button extra-small button-black" tabindex="-1">
                                                    <span class="text-uppercase">Add to cart</span>
                                                </a>
                                                <a href="#" class="button extra-small" tabindex="-1">
                                                    <span class="text-uppercase">Buy now</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-info end -->
                                </div>
                                <!-- single-product-tab -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- hr -->
                                        <hr>
                                        <div class="single-product-tab">
                                            <ul class="reviews-tab mb-20">
                                                <li class="active"><a href="#specs" data-toggle="tab">specifications</a>
                                                </li>
                                                <li><a href="#desc" data-toggle="tab">description</a></li>
                                                <li><a href="#reviews" data-toggle="tab">reviews</a></li>
                                            </ul>
                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane active" id="specs">
                                                    <ul>
                                                        <li class="brand-name-1"><mark>Screen Size:</mark><span class="media-heading"> <?php echo $row_product['TVScreensize']; ?>"</span></li>

                                                        <li class="brand-name-1"><mark>Screen Technology:</mark><span class="media-heading"> <?php echo $row_product['ScreenTechName']; ?></span></li>

                                                        <li class="brand-name-1"><mark>Screen Resolution:</mark><span class="media-heading"> <?php echo $row_product['TVResolution']; ?></span></li>

                                                        <li class="brand-name-1"><mark>Special Feature:</mark><span class="media-heading"> <?php echo $row_product['TVFeature']; ?></span></li>

                                                        <li class="brand-name-1"><mark>TV Dimension:</mark><span class="media-heading"> <?php echo $row_product['TVDimension']; ?></span></li>

                                                        <li><span class="media-heading">Other specifications:</span>
                                                            <pre><?php echo $row_product['TVOtherDesc']; ?></pre>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div role="tabpanel" class="tab-pane" id="desc">
                                                    <h5><?php echo $row_product['TVOverview']; ?></h5>
                                                    <ul>
                                                        <li><span class="media-heading">Other specifications:</span>
                                                            <pre><?php echo $row_product['TVOtherDesc']; ?></pre>
                                                        </li>
                                                        <li><span class="media-heading">What's in the box:</span>
                                                            <pre><?php echo $row_product['TVWhatsInTheBox']; ?></pre>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div role="tabpanel" class="tab-pane" id="reviews">
                                                    <!-- reviews-tab-desc -->
                                                    <div class="reviews-tab-desc">
                                                        <!-- single comments -->
                                                        <div class="media mt-30">
                                                            <div class="media-left">
                                                                <a href="#"><img class="media-object" src="img/author/1.jpg" alt="#"></a>
                                                            </div>
                                                            <div class="media-body">
                                                                <div class="clearfix">
                                                                    <div class="name-commenter pull-left">
                                                                        <h6 class="media-heading"><a href="#">Gerald
                                                                                Barnes</a></h6>
                                                                        <p class="mb-10">27 Jun, 2016 at 2:30pm</p>
                                                                    </div>
                                                                    <div class="pull-right">
                                                                        <ul class="reply-delate">
                                                                            <li><a href="#">Reply</a></li>
                                                                            <li>/</li>
                                                                            <li><a href="#">Delate</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur
                                                                    adipiscing elit. Integer accumsan egestas .</p>
                                                            </div>
                                                        </div>
                                                        <!-- single comments -->
                                                        <div class="media mt-30">
                                                            <div class="media-left">
                                                                <a href="#"><img class="media-object" src="img/author/2.jpg" alt="#"></a>
                                                            </div>
                                                            <div class="media-body">
                                                                <div class="clearfix">
                                                                    <div class="name-commenter pull-left">
                                                                        <h6 class="media-heading"><a href="#">Gerald
                                                                                Barnes</a></h6>
                                                                        <p class="mb-10">27 Jun, 2016 at 2:30pm</p>
                                                                    </div>
                                                                    <div class="pull-right">
                                                                        <ul class="reply-delate">
                                                                            <li><a href="#">Reply</a></li>
                                                                            <li>/</li>
                                                                            <li><a href="#">Delate</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur
                                                                    adipiscing elit. Integer accumsan egestas .</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--  hr -->
                                        <hr>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-3 col-xs-12">
                            <!-- php -->
                            <?php
                            $recent_id = $_SESSION['recent_product'];
                            $sql_recent = "SELECT TVName, TVPrice FROM tvspecstbl WHERE TVID = $recent_id;";
                            $result_recent = mysqli_query($conn, $sql_recent);
                            $row_recent = mysqli_fetch_assoc($result_recent);
                            ?>

                            <aside class="widget widget-product box-shadow mb-30">
                                <h6 class="widget-title border-left mb-20">recent product</h6>
                                <!-- product-item start -->
                                <div class="product-item">
                                    <div class="product-img">
                                        <a href="single-product.html">
                                            <img src="img/product/4.jpg" alt="" />
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <h6 class="product-title">
                                            <a href="single-product.html"><?php echo $row_recent['TVName']; ?></a>
                                        </h6>
                                        <h3 class="pro-price">₱<?php echo number_format($row_recent['TVPrice']); ?></h3>
                                    </div>
                                </div>
                                <!-- product-item end -->
                            </aside>

                            <aside class="widget widget-categories box-shadow ">
                                <h6 class="widget-title border-left mb-20">TV's</h6>
                                <div id="cat-treeview" class="product-cat">
                                    <ul>
                                        <ul>
                                            <li><a href="#">LED</a></li>
                                            <li><a href="#">LCD</a></li>
                                            <li><a href="#">Smart TV</a></li>
                                            <li><a href="#">Android TV</a></li>
                                            <li><a href="#">Premium Tv</a></li>
                                        </ul>
                                    </ul>
                                </div>
                                <br>
                                <h6 class="widget-title border-left mb-20">Manufacturer</h6>
                                <div id="cat-treeview" class="product-cat">
                                    <ul>
                                        <ul>
                                            <li><a href="#">SAMSUNG</a></li>
                                            <li><a href="#">TCL</a></li>
                                            <li><a href="#">LG</a></li>
                                            <li><a href="#">SONY</a></li>
                                            <li><a href="#">Skyworth</a></li>
                                        </ul>
                                    </ul>
                                </div>
                            </aside>


                        </div>
                    </div>
                </div>
                <!-- dfdf -->
                <div class="container">
                    <!-- single-product-area end -->
                    <div class="related-product-area">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-title text-left mb-40">
                                    <h2 class="uppercase">related product</h2>
                                    <h6>There are many variations of passages of brands available,</h6>
                                    <!-- products from same brand?? or same size  -->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- product-item start -->
                            <div class="col-lg-3">
                                <div class="product-item">
                                    <div class="product-img">
                                        <a href="single-product.html">
                                            <img src="img/product/1.jpg" alt="" />
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <h6 class="product-title">
                                            <a href="single-product.html">Product Name1</a>
                                        </h6>
                                        <div class="pro-rating">
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                        </div>
                                        <h3 class="pro-price">$ 869.00</h3>

                                    </div>
                                </div>
                            </div>
                            <!-- product-item end -->
                            <!-- product-item start -->
                            <div class="col-lg-3">
                                <div class="product-item">
                                    <div class="product-img">
                                        <a href="single-product.html">
                                            <img src="img/product/1.jpg" alt="" />
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <h6 class="product-title">
                                            <a href="single-product.html">Product Name2</a>
                                        </h6>
                                        <div class="pro-rating">
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                        </div>
                                        <h3 class="pro-price">$ 869.00</h3>

                                    </div>
                                </div>
                            </div>
                            <!-- product-item end -->
                            <!-- product-item start -->
                            <div class="col-lg-3">
                                <div class="product-item">
                                    <div class="product-img">
                                        <a href="single-product.html">
                                            <img src="img/product/1.jpg" alt="" />
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <h6 class="product-title">
                                            <a href="single-product.html">Product Name3</a>
                                        </h6>
                                        <div class="pro-rating">
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                        </div>
                                        <h3 class="pro-price">$ 869.00</h3>

                                    </div>
                                </div>
                            </div>
                            <!-- product-item end -->
                            <!-- product-item start -->
                            <div class="col-lg-3">
                                <div class="product-item">
                                    <div class="product-img">
                                        <a href="single-product.html">
                                            <img src="img/product/1.jpg" alt="" />
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <h6 class="product-title">
                                            <a href="single-product.html">Product Name4</a>
                                        </h6>
                                        <div class="pro-rating">
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                        </div>
                                        <h3 class="pro-price">$ 869.00</h3>

                                    </div>
                                </div>
                            </div>
                            <!-- product-item end -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- SHOP SECTION END -->

        </section>
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