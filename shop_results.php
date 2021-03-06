<?php
require('includes/connection.php');
if (isset($_GET['brand'])) {
    $brandid = $_GET['brand'];
} elseif (isset($_GET['screen_tech'])) {
    $screen_tech = $_GET['screen_tech'];
}
?>
<!doctype html>
<html class="no-js" lang="en">
<title>tvOutlet || Shop</title>

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
        <!-- END HEADER AREA -->


        <!-- Start page content -->
        <div id="page-content" class="page-wrapper">

            <!-- SHOP SECTION START -->
            <div class="shop-section mb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-md-push-3 col-sm-12">
                            <div class="shop-content">
                                <!-- shop-option start -->
                                <div class="shop-option box-shadow mb-30 clearfix">
                                    <!-- Nav tabs -->
                                    <ul class="shop-tab f-left" role="tablist">
                                        <li class="active">
                                            <a href="#grid-view" data-toggle="tab"><i class="zmdi zmdi-view-module"></i></a>
                                        </li>
                                        <li>
                                            <a href="#list-view" data-toggle="tab"><i class="zmdi zmdi-view-list-alt"></i></a>
                                        </li>
                                    </ul>
                                    <div class="showing f-right text-right">
                                        <span>Showing : 01-09 of 17.</span>
                                    </div>
                                </div>
                                <!-- shop-option end -->
                                <!-- Tab Content start -->
                                <div class="tab-content">
                                    <!-- grid-view -->
                                    <div role="tabpanel" class="tab-pane active" id="grid-view">
                                        <div class="row">
                                            <!-- php -->
                                            <?php
                                            if (isset($_GET['brand'])) {
                                                $sql_products = "SELECT * FROM tvspecstbl JOIN brandtbl ON TVBrandID = BrandID WHERE tvspecstbl.IsDelete = 0 AND TVBrandID = $brandid ORDER BY RAND();";
                                                $result_products = mysqli_query($conn, $sql_products);
                                            } elseif (isset($_GET['screen_tech'])) {
                                                $sql_products = "SELECT * FROM tvspecstbl JOIN brandtbl on brandtbl.BrandID = tvspecstbl.TVBrandID WHERE TVScreenTech = $screen_tech and tvspecstbl.IsDelete = 0 ORDER BY RAND();";
                                                $result_products = mysqli_query($conn, $sql_products);
                                            } elseif (isset($_GET['low']) && isset($_GET['high'])) {
                                                $low = $_GET['low'];
                                                $high = $_GET['high'];
                                                // echo $low . $high;
                                                $sql_products = "SELECT * FROM tvspecstbl join brandtbl on BrandID = TVBrandID WHERE TVPrice BETWEEN $low AND $high and tvspecstbl.IsDelete = 0 ORDER BY RAND();";
                                                $result_products = mysqli_query($conn, $sql_products);
                                            } elseif (isset($_GET['screen_low']) && isset($_GET['screen_high'])) {
                                                $low = $_GET['screen_low'];
                                                $high = $_GET['screen_high'];
                                                // echo $low . $high;
                                                $sql_products = "SELECT * FROM tvspecstbl join brandtbl on BrandID = TVBrandID WHERE TVScreensize BETWEEN $low AND $high and tvspecstbl.IsDelete = 0 ORDER BY RAND();";
                                                $result_products = mysqli_query($conn, $sql_products);
                                            } elseif (isset($_POST['search_btn'])) {
                                                $search = $_POST['search'];
                                                $sql_products = "SELECT * FROM tvspecstbl join brandtbl on BrandID = TVBrandID WHERE TVName LIKE '%$search%' OR TVModel LIKE '%$search%' OR TVKeywords LIKE '%$search%';";
                                                $result_products = mysqli_query($conn, $sql_products);
                                            }
                                            else $result_products = false; ?>

                                            <?php
                                            if ($result_products) {
                                                while ($row_products = mysqli_fetch_assoc($result_products)) :
                                                    $tvid = $row_products['TVID'];
                                                    $tvname = $row_products['TVName'];
                                                    $brandname = $row_products['BrandName'];
                                                    $price = $row_products['TVPrice'];
                                                    $overview = $row_products['TVOverview'];
                                                    // $image = $row_products['TVImage'];
                                                    $sql_image = "SELECT * from tvimagetbl WHERE TVID = $tvid LIMIT 1;";
                                                    $result_image = mysqli_query($conn, $sql_image);
                                                    $row_image = mysqli_fetch_assoc($result_image);
                                            ?>
                                                    <!-- product-item start -->
                                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                                        <div class="product-item">
                                                            <div class="product-img" style="background-color: white;border-radius: 10px 10px 0 0;">
                                                                <a href="single-product.php?TVID=<?php echo $tvid; ?>">
                                                                    <img src="AdminLTE/images/<?php echo $row_image['TVImage']; ?>" alt="" style="object-fit: scale-down;width: 100%;height: 250px;" />
                                                                </a>
                                                            </div>
                                                            <div class="product-info">
                                                                <h6 class="product-title">
                                                                    <a href="single-product.php?TVID = <?php echo $tvid; ?>"><?php echo $tvname; ?></a>
                                                                </h6>
                                                                <h5 class="brand-name mb-30" ><?php echo $brandname; ?></h5>
                                                                <div class="pro-rating">
                                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                                    <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                                </div>
                                                                <h3 class="pro-price">₱<?php echo number_format($price); ?></h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endwhile;
                                                if (mysqli_num_rows($result_products) <= 0) { ?>
                                                    <script>
                                                        Swal.fire({
                                                            icon: 'info',
                                                            title: 'Oooppss...',
                                                            text: 'There`s nothing here',
                                                            showConfirmButton: false,
                                                            timer: 5000
                                                            // confirmButtonText: 'Try again',
                                                            // confirmButtonColor: '#FF7F00'
                                                        })
                                                    </script>
                                                <?php    }
                                            } else { ?>
                                                <div class="order-complete-content ">
                                                    <div class="thank-you p-30 text-center">
                                                        <h6 class="text-black-5 mb-0">Ooops There's nothing here.</h6>
                                                    </div>
                                                </div>
                                            <?php } ?>

                                        </div>
                                    </div>
                                    <!-- list-view -->
                                    <div role="tabpanel" class="tab-pane" id="list-view">
                                        <div class="row">
                                            <!-- php -->
                                            <?php
                                            if (isset($_GET['brand'])) {
                                                $sql_products = "SELECT * FROM tvspecstbl JOIN brandtbl ON TVBrandID = BrandID WHERE tvspecstbl.IsDelete = 0 AND TVBrandID = $brandid ORDER BY RAND();";
                                                $result_products = mysqli_query($conn, $sql_products);
                                            } elseif (isset($_GET['screen_tech'])) {
                                                $sql_products = "SELECT * FROM tvspecstbl JOIN brandtbl on brandtbl.BrandID = tvspecstbl.TVBrandID WHERE TVScreenTech = $screen_tech and tvspecstbl.IsDelete = 0 ORDER BY RAND();";
                                                $result_products = mysqli_query($conn, $sql_products);
                                            } elseif (isset($_GET['low']) && isset($_GET['high'])) {
                                                $low = $_GET['low'];
                                                $high = $_GET['high'];
                                                // echo $low . $high;
                                                $sql_products = "SELECT * FROM tvspecstbl join brandtbl on BrandID = TVBrandID WHERE TVPrice BETWEEN $low AND $high and tvspecstbl.IsDelete = 0 ORDER BY RAND();";
                                                $result_products = mysqli_query($conn, $sql_products);
                                            } elseif (isset($_GET['screen_low']) && isset($_GET['screen_high'])) {
                                                $low = $_GET['screen_low'];
                                                $high = $_GET['screen_high'];
                                                // echo $low . $high;
                                                $sql_products = "SELECT * FROM tvspecstbl join brandtbl on BrandID = TVBrandID WHERE TVScreensize BETWEEN $low AND $high and tvspecstbl.IsDelete = 0 ORDER BY RAND();";
                                                $result_products = mysqli_query($conn, $sql_products);
                                            } elseif (isset($_POST['search_btn'])) {
                                                $search = $_POST['search'];
                                                $sql_products = "SELECT * FROM tvspecstbl join brandtbl on BrandID = TVBrandID WHERE TVName LIKE '%$search%' OR TVModel LIKE '%$search%' OR TVKeywords LIKE '%$search%';";
                                                $result_products = mysqli_query($conn, $sql_products);
                                            }
                                            else $result_products = false; ?>

                                            <?php
                                            if ($result_products) {
                                                while ($row_products = mysqli_fetch_assoc($result_products)) :
                                                    $tvid = $row_products['TVID'];
                                                    $tvname = $row_products['TVName'];
                                                    $brandname = $row_products['BrandName'];
                                                    $price = $row_products['TVPrice'];
                                                    $overview = $row_products['TVOverview'];
                                                    // $image = $row_products['TVImage'];
                                                    $sql_image = "SELECT * from tvimagetbl WHERE TVID = $tvid LIMIT 1;";
                                                    $result_image = mysqli_query($conn, $sql_image);
                                                    $row_image = mysqli_fetch_assoc($result_image);
                                            ?>
                                                    <!-- product-item start -->
                                                    <div class="col-md-12">
                                                        <div class="shop-list product-item">
                                                            <div class="product-img">
                                                                <a href="single-product.php?TVID=<?php echo $tvid; ?>">
                                                                    <img src="AdminLTE/images/<?php echo $row_image['TVImage']; ?>" alt="" style="object-fit: scale-down;width: 100%;height: 270px;" />
                                                                </a>
                                                            </div>
                                                            <div class="product-info">
                                                                <div class="clearfix">
                                                                    <h6 class="product-title text-truncate f-left" style="width: 350px;">
                                                                        <a href="single-product.php?TVID=<?php echo $tvid; ?>"><?php echo $tvname; ?> </a>
                                                                    </h6>
                                                                    <div class="pro-rating f-right">
                                                                        <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                                        <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                                        <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                                        <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                                        <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                                    </div>
                                                                </div>
                                                                <h5 class="brand-name mb-30"><?php echo $brandname; ?></h5>
                                                                <h3 class="pro-price">₱<?php echo number_format($price); ?></h3>
                                                                <p><?php echo $overview; ?></p>
                                                                <ul class="action-button">
                                                                    <li>
                                                                        <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- product-item end -->
                                                <?php endwhile;
                                            } else { ?>
                                                <div class="order-complete-content ">
                                                    <div class="thank-you p-30 text-center">
                                                        <h6 class="text-black-5 mb-0">Ooops There's nothing here.</h6>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- Tab Content end -->
                                <!-- shop-pagination start -->
                                <ul class="shop-pagination box-shadow text-center ptblr-10-30 fixed-bottom">
                                    <li><a href="#"><i class="zmdi zmdi-chevron-left"></i></a></li>
                                    <li><a href="#">01</a></li>
                                    <li><a href="#">02</a></li>
                                    <li><a href="#">03</a></li>
                                    <li><a href="#">...</a></li>
                                    <li><a href="#">05</a></li>
                                    <li class="active"><a href="#"><i class="zmdi zmdi-chevron-right"></i></a></li>
                                </ul>
                                <!-- shop-pagination end -->
                            </div>
                        </div>
                        <!-- side barssss -->
                        <div class="col-md-3 col-md-pull-9 col-sm-12">
                            <?php include('includes/shop_sidebar.php') ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- SHOP SECTION END -->
            <!-- search -->


        </div>
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