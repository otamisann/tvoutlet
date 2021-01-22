<?php
session_start();
require('includes/connection.php');
// $_SESSION['most_recent'] = $_SESSION['recent_product'];
$_SESSION['order_item']  = $_GET['TVID'];
// print_r($_SESSION);
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
            // sql images
            $sql_image = "SELECT * from tvimagetbl WHERE TVID = '$_GET[TVID]' LIMIT 1;";
            $result_image = mysqli_query($conn, $sql_image);
            $row_image = mysqli_fetch_assoc($result_image);

            if (isset($_SESSION['added_to_cart'])) {
                if ($_SESSION['added_to_cart'] == 1) { ?>
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Item added to cart',
                            showConfirmButton: false,
                            timer: 2000
                            // text: 'please',
                            // confirmButtonText: 'Try again',
                            // confirmButtonColor: '#FF7F00'
                        })
                    </script>
                <?php unset($_SESSION['added_to_cart']);
                } elseif ($_SESSION['added_to_cart'] == 0) { ?>
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Item not added to cart',
                            showConfirmButton: false,
                            timer: 2000
                            // text: 'please',
                            // confirmButtonText: 'Try again',
                            // confirmButtonColor: '#FF7F00'
                        })
                    </script>
            <?php unset($_SESSION['added_to_cart']);
                }
            }

            ?>

            <!-- SHOP SECTION START -->
            <div class="shop-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-xs-12">
                            <!-- single-product-area start -->
                            <div class="single-product-area mb-10">
                                <div class="row">
                                    <!-- imgs-zoom-area start -->
                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                        <div class="imgs-zoom-area">
                                            <!-- main image -->
                                            <img id="zoom_03" src="AdminLTE/images/<?php echo $row_image['TVImage']; ?>" style="object-fit: cover;width: 300px;height: 270px;" data-zoom-image="AdminLTE/images/<?php echo $row_image['TVImage']; ?>" alt="">
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div id="gallery_01" class="carousel-btn slick-arrow-3 mt-30">
                                                        <!-- images 1 -->
                                                        <?php
                                                        $sql_image2 = "SELECT * from tvimagetbl WHERE TVID = '$_GET[TVID]' and IsDelete = 0;";
                                                        $result_image2 = mysqli_query($conn, $sql_image2);
                                                        while ($row_image2 = mysqli_fetch_assoc($result_image2)) :
                                                            $tvimage = $row_image2['TVImage'];
                                                        ?>
                                                            <div class="p-c">
                                                                <a href="#" data-image="AdminLTE/images/<?php echo $row_image2['TVImage']; ?>" data-zoom-image="AdminLTE/images/<?php echo $row_image2['TVImage']; ?>">
                                                                    <img class="zoom_03" src="AdminLTE/images/<?php echo $row_image2['TVImage']; ?>" alt="">
                                                                </a>
                                                            </div>
                                                        <?php endwhile; ?>
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
                                            <h6 class="text-sucess text-success">In-Stock (<?php echo $row_product['TVQuantity']; ?>) units available</h6>
                                            <h3 class="text-black-1"><?php echo $row_product['TVName']; ?></h3>
                                            <h6 class="brand-name-1">MODEL : <?php echo $row_product['TVModel']; ?></h6>
                                            <div class="pro-rating sin-pro-rating f-right">
                                                <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#" tabindex="0"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#" tabindex="0"><i class="zmdi zmdi-star-half"></i></a>
                                                <a href="#" tabindex="0"><i class="zmdi zmdi-star-outline"></i></a>
                                                <span class="text-black-5">( 27 Rating)</span>
                                            </div>
                                            <h6 class="brand-name-2"><?php echo $row_product['BrandName']; ?></h6>

                                            <hr>
                                            <div class="plus-minus-pro-action clearfix">
                                                <h2 class="pro-price f-left"> ₱<?php echo number_format($row_product['TVPrice'], 2); ?></h2>
                                                <div class="sin-pro-action f-right">
                                                    <ul class="action-button">
                                                        <li>
                                                            <a href="#" title="Add to Wishlist" tabindex="0"><i class="zmdi zmdi-favorite"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#" title="Share to Facebook" tabindex="0"><i class="zmdi zmdi-facebook"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#" title="Share to Twitter" tabindex="0"><i class="zmdi zmdi-twitter"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <hr>
                                            <div>
                                                <!-- buy noow and add to cart btn -->
                                                <?php
                                                if (isset($_SESSION['user_id'])) { ?>
                                                    <a href="add_to_cart.php" class="button extra-small" tabindex="-1">
                                                        <span class="text-uppercase">Add to cart</span>
                                                    </a>
                                                    <!-- <a href="#" class="button extra-small" tabindex="-1">
                                                        <span class="text-uppercase">Buy now</span>
                                                    </a> -->
                                                <?php } else { ?>
                                                    <!-- Sign in to buy -->
                                                    <a href="login.php" class="button extra-small " tabindex="-1">
                                                        <span class="text-uppercase">Log in to Buy</span>
                                                    </a>
                                                <?php }
                                                ?>


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
                            if (!isset($_SESSION['recently_viewed'])) {
                                $value = $_GET['TVID'];
                                // $_SESSION['pre_value'] = $value;
                                // $_SESSION['value'] = $value;
                                // $_SESSION['recent_product'] = $_GET['TVID'];
                                // $recent_id = $_SESSION['recent_product'];
                                $sql_recent = "SELECT TVName, TVPrice FROM tvspecstbl WHERE TVID = $value;";
                                $result_recent = mysqli_query($conn, $sql_recent);
                                $row_recent = mysqli_fetch_assoc($result_recent);
                                // image
                                $sql_image = "SELECT * from tvimagetbl WHERE TVID = $value LIMIT 1;";
                                $result_image = mysqli_query($conn, $sql_image);
                                $row_image = mysqli_fetch_assoc($result_image);
                                // set recent product value
                                $_SESSION['recently_viewed'] = $value;
                            } elseif (isset($_SESSION['recently_viewed'])) {
                                $value = $_SESSION['recently_viewed'];
                                // $_SESSION['pre_value'] = $value;
                                // $_SESSION['value'] = $value;
                                // $_SESSION['recent_product'] = $_GET['TVID'];
                                // $recent_id = $_SESSION['recent_product'];
                                $sql_recent = "SELECT TVName, TVPrice FROM tvspecstbl WHERE TVID = $value;";
                                $result_recent = mysqli_query($conn, $sql_recent);
                                $row_recent = mysqli_fetch_assoc($result_recent);
                                // image
                                $sql_image = "SELECT * from tvimagetbl WHERE TVID = $value LIMIT 1;";
                                $result_image = mysqli_query($conn, $sql_image);
                                $row_image = mysqli_fetch_assoc($result_image);
                                // set recent product value
                                $_SESSION['recently_viewed'] = $_GET['TVID'];
                            }
                            
                            
                            ?>

                            <aside class="widget widget-product box-shadow mb-30">
                                <h6 class="widget-title border-left mb-20">recent product</h6>
                                <!-- product-item start -->
                                <div class="product-item">
                                    <div class="product-img">
                                        <a href="single-product.php?TVID=<?php echo $row_image['TVID'];; ?>">
                                            <img src="AdminLTE/images/<?php echo $row_image['TVImage']; ?>" alt="" />
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
                            
                            <!-- aside tv screen types -->
                            <aside class="widget operating-system box-shadow mb-30">
                                <h6 class="widget-title border-left mb-20">TV Type</h6>
                                <!-- php -->
                                <?php
                                $sql_tech = "SELECT ScreenTechID,tvscreentechtbl.ScreenTechName,COUNT(tvscreentechtbl.ScreenTechID) as count_tech FROM `tvspecstbl` RIGHT JOIN tvscreentechtbl ON tvspecstbl.TVScreenTech = tvscreentechtbl.ScreenTechID WHERE tvspecstbl.IsDelete = 0 GROUP by tvscreentechtbl.ScreenTechName;";
                                $res_tech = mysqli_query($conn, $sql_tech);
                                ?>
                                <ul>
                                    <li><a href="shop.php">All</a></li>
                                    <?php while ($row_tech = mysqli_fetch_assoc($res_tech)) :
                                        $screenid = $row_tech['ScreenTechID'];
                                        $screenname = $row_tech['ScreenTechName'];
                                        $tech_count = $row_tech['count_tech'];
                                    ?>
                                        <li><a href="shop_results.php?screen_tech=<?php echo $screenid; ?>"><?php echo $screenname . ' (' . $tech_count . ')'; ?></a></li>
                                    <?php endwhile; ?>
                                </ul>
                            </aside>
                            <!-- aside brands -->
                            <aside class="widget operating-system box-shadow mb-30">
                                <h6 class="widget-title border-left mb-20">TV Manufacturer</h6>
                                <!-- php -->
                                <?php
                                $sql_brands = "SELECT BrandID,BrandName, COUNT(tvspecstbl.TVID) as brandsss FROM `brandtbl` left JOIN tvspecstbl ON BrandID = tvspecstbl.TVBrandID WHERE tvspecstbl.IsDelete = 0 GROUP BY BrandName ORDER BY BrandName ASC;";
                                $res_brands = mysqli_query($conn, $sql_brands);
                                ?>
                                <ul>
                                    <li><a href="shop.php">All</a></li>
                                    <?php while ($row_brands = mysqli_fetch_assoc($res_brands)) :
                                        $brandid = $row_brands['BrandID'];
                                        $brandname = $row_brands['BrandName'];
                                        $brand_count = $row_brands['brandsss'];
                                    ?>
                                        <li><a href="shop_results.php?brand=<?php echo $brandid; ?>"><?php echo $brandname . ' (' . $brand_count . ')'; ?></a></li>
                                    <?php endwhile; ?>
                                </ul>
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
                            <!-- php -->
                            <?php
                            $sql_related_products = "SELECT * FROM tvspecstbl WHERE IsDelete = 0 AND TVID != '$_GET[TVID]' ORDER BY RAND() LIMIT 4;";
                            $res_related_products = mysqli_query($conn, $sql_related_products);
                            while ($row_related_products = mysqli_fetch_assoc($res_related_products)) :
                                $tvid = $row_related_products['TVID'];
                                $prod_name = $row_related_products['TVName'];
                                $prod_price = $row_related_products['TVPrice'];
                                // image
                                $sql_image = "SELECT * FROM tvimagetbl WHERE TVID = $tvid limit 1;";
                                $result_image = mysqli_query($conn, $sql_image);
                                $row_image = mysqli_fetch_assoc($result_image);
                            ?>
                                <!-- product-item start -->
                                <div class="col-lg-3">
                                    <div class="product-item">
                                        <div class="product-img">
                                            <a href="single-product.php?TVID=<?php echo $tvid; ?>">
                                                <img src="AdminLTE/images/<?php echo $row_image['TVImage']; ?>" alt="" style="object-fit: scale-down;width: 100%;height: 250px;" />
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <h6 class="product-title">
                                                <a href="single-product.html"><?php echo $prod_name; ?></a>
                                            </h6>
                                            <div class="pro-rating">
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                            </div>
                                            <h3 class="pro-price">$ <?php echo number_format($prod_price, 2); ?></h3>

                                        </div>
                                    </div>
                                </div>
                                <!-- product-item end -->
                            <?php endwhile; ?>

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