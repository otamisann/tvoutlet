<!-- START HEADER AREA -->
<header class="header-area header-wrapper">
    <!-- header-top-bar -->
    <div class="header-top-bar plr-185">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 hidden-xs">
                    <div class="call-us">
                        <!-- <p class="mb-0 roboto">(+88) 01234-567890</p> -->
                    </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div class="top-link clearfix">
                        <ul class="link f-right">
                            <li>
                                <a href="my-account.html">
                                    <i class="zmdi zmdi-account"></i>
                                    My Account
                                </a>
                            </li>
                            <li>
                                <a href="wishlist.html">
                                    <i class="zmdi zmdi-favorite"></i>
                                    Wish List (0)
                                </a>
                            </li>
                            <?php if (isset($_SESSION['user_id'])) { ?>
                            <li>
                                <a href="logout.php">
                                    <i class="zmdi zmdi-lock"></i>
                                    Logout
                                </a>
                            </li>
                            <?php } else { ?>
                                <li>
                                <a href="login.php">
                                    <i class="zmdi zmdi-lock"></i>
                                    Login
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header-middle-area -->
    <div id="sticky-header" class="header-middle-area plr-185">
        <div class="container-fluid">
            <div class="full-width-mega-dropdown">
                <div class="row">
                    <!-- logo -->
                    <div class="col-md-2 col-sm-6 col-xs-12">
                        <div class="logo">
                            <a href="index.php">
                                <img src="images/logo/tvoutlet.png" style="width: 100px;height: 40px;" alt="main logo">
                            </a>
                        </div>
                    </div>
                    <!-- primary-menu -->
                    <div class="col-md-8 hidden-sm hidden-xs font-weight-bolder">
                        <nav id="primary-menu">
                            <ul class="main-menu text-center">
                                <li><a href="index.php">Home</a>
                                </li>
                                <li class="mega-parent"><a href="#">Products</a>
                                    <div class="mega-menu-area mega-menu-area-2 clearfix">
                                        <div class="mega-menu-link mega-menu-link-2  f-left">
                                            <?php
                                            $sql_tech = "SELECT ScreenTechID,tvscreentechtbl.ScreenTechName,COUNT(tvscreentechtbl.ScreenTechID) as count_tech FROM `tvspecstbl` RIGHT JOIN tvscreentechtbl ON tvspecstbl.TVScreenTech = tvscreentechtbl.ScreenTechID WHERE tvspecstbl.IsDelete = 0 GROUP by tvscreentechtbl.ScreenTechName;";
                                            $res_tech = mysqli_query($conn, $sql_tech);
                                            ?>
                                            <ul class="single-mega-item">
                                                <li class="menu-title">TV's</li>
                                                <?php while ($row_tech = mysqli_fetch_assoc($res_tech)) :
                                                    $screenid = $row_tech['ScreenTechID'];
                                                    $screenname = $row_tech['ScreenTechName'];
                                                    $tech_count = $row_tech['count_tech'];
                                                ?>
                                                    <li><a href="shop_results.php?screen_tech=<?php echo $screenid; ?>"><?php echo $screenname; ?></a></li>
                                                <?php endwhile; ?>
                                            </ul>
                                            <?php
                                            $sql_brandss = "SELECT BrandID,BrandName, COUNT(tvspecstbl.TVID) as brandsss FROM `brandtbl` left JOIN tvspecstbl ON BrandID = tvspecstbl.TVBrandID WHERE tvspecstbl.IsDelete = 0 GROUP BY BrandName ORDER BY BrandName ASC;";
                                            $res_brandss = mysqli_query($conn, $sql_brandss);
                                            ?>
                                            <ul class="single-mega-item">
                                                <li class="menu-title">TV Brands</li>
                                                <?php while ($row_brandss = mysqli_fetch_assoc($res_brandss)) :
                                                    $brandids = $row_brandss['BrandID'];
                                                    $brandnames = $row_brandss['BrandName'];
                                                ?>
                                                    <li><a href="shop_results.php?brand=<?php echo $brandids; ?>"><?php echo $brandnames; ?></a></li>
                                                <?php endwhile; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li><a href="shop.php">Shop</a></li>
                                <li><a href="blog.html">Blog</a></li>
                                <li>
                                    <a href="contact.html">Contact</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!-- header-search & total-cart -->
                    <div class="col-md-2 col-sm-6 col-xs-12">
                        <div class="search-top-cart  f-right">
                            <!-- header-search -->
                            <div class="header-search f-left">
                                <div class="header-search-inner">
                                    <button class="search-toggle">
                                        <i class="zmdi zmdi-search"></i>
                                    </button>
                                    <form action="#">
                                        <div class="top-search-box">
                                            <input type="text" placeholder="Search here your product...">
                                            <button type="submit">
                                                <i class="zmdi zmdi-search"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- total-cart -->
                            <div class="total-cart f-left">
                                <div class="total-cart-in">
                                    <div class="cart-toggler">
                                        <a href="#">
                                            <span class="cart-quantity">02</span><br>
                                            <span class="cart-icon">
                                                <i class="zmdi zmdi-shopping-cart-plus"></i>
                                            </span>
                                        </a>
                                    </div>
                                    <ul>
                                        <li>
                                            <div class="top-cart-inner your-cart">
                                                <h5 class="text-capitalize">Your Cart</h5>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="total-cart-pro">
                                                <!-- single-cart -->
                                                <div class="single-cart clearfix">
                                                    <div class="cart-img f-left">
                                                        <a href="#">
                                                            <img src="img/cart/1.jpg" alt="Cart Product" />
                                                        </a>
                                                        <div class="del-icon">
                                                            <a href="#">
                                                                <i class="zmdi zmdi-close"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="cart-info f-left">
                                                        <h6 class="text-capitalize">
                                                            <a href="#">Dummy Product Name</a>
                                                        </h6>
                                                        <p>
                                                            <span>Brand <strong>:</strong></span>Brand Name
                                                        </p>
                                                        <p>
                                                            <span>Model <strong>:</strong></span>Grand s2
                                                        </p>
                                                        <p>
                                                            <span>Color <strong>:</strong></span>Black, White
                                                        </p>
                                                    </div>
                                                </div>
                                                <!-- single-cart -->
                                                <div class="single-cart clearfix">
                                                    <div class="cart-img f-left">
                                                        <a href="#">
                                                            <img src="img/cart/1.jpg" alt="Cart Product" />
                                                        </a>
                                                        <div class="del-icon">
                                                            <a href="#">
                                                                <i class="zmdi zmdi-close"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="cart-info f-left">
                                                        <h6 class="text-capitalize">
                                                            <a href="#">Dummy Product Name</a>
                                                        </h6>
                                                        <p>
                                                            <span>Brand <strong>:</strong></span>Brand Name
                                                        </p>
                                                        <p>
                                                            <span>Model <strong>:</strong></span>Grand s2
                                                        </p>
                                                        <p>
                                                            <span>Color <strong>:</strong></span>Black, White
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="top-cart-inner subtotal">
                                                <h4 class="text-uppercase g-font-2">
                                                    Total =
                                                    <span>$ 500.00</span>
                                                </h4>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="top-cart-inner view-cart">
                                                <h4 class="text-uppercase">
                                                    <a href="cart.html">View cart</a>
                                                </h4>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>