<!-- widget-search -->
<aside class="widget-search mb-30">
    <form action="#">
        <input type="text" placeholder="Search here...">
        <button type="submit"><i class="zmdi zmdi-search"></i></button>
    </form>
</aside>
<!-- widget-categories -->
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
<!-- tv-type -->
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
<!-- price -->
<aside class="widget shop-filter box-shadow mb-30">
    <h6 class="widget-title border-left mb-20">Price</h6>
    <ul>
        <li><a href="shop.php">All</a></li>
        <li><a href="shop_results.php?low=0&high=15000">0 - 15,000</a></li>
        <li><a href="shop_results.php?low=15001&high=25000">15,001 - 25,000</a></li>
        <li><a href="shop_results.php?low=25001&high=30000">25.001 - 30,000</a></li>
        <li><a href="shop_results.php?low=30001&high=55000">30,001 - 55,000</a></li>
        <li><a href="shop_results.php?low=55001&high=10000000">55,001 - >100,000</a></li>
    </ul>
</aside>
<!--tv size -->
<aside class="widget widget-color box-shadow mb-30">
    <h6 class="widget-title border-left mb-20">Screen Sizes</h6>
    <ul>
        <li><a href="shop.php">All</a></li>
        <li><a href="shop_results.php?screen_low=30&screen_high=37">30" - 37"</a></li>
        <li><a href="shop_results.php?screen_low=38&screen_high=43">38" - 43" </a></li>
        <li><a href="shop_results.php?screen_low=44&screen_high=49">44" - 49" </a></li>
        <li><a href="shop_results.php?screen_low=50&screen_high=55">50" - 55" </a></li>
        <li><a href="shop_results.php?screen_low=61&screen_high=65">61" - 65" </a></li>
        <li><a href="shop_results.php?screen_low=66&screen_high=75">66" - 75"</a></li>
        <li><a href="shop_results.php?screen_low=76&screen_high=1000">76" & above </a></li>
    </ul>
</aside>
<!-- widget-product -->
<aside class="widget widget-product box-shadow">
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
                <a href="single-product.html">Product Name</a>
            </h6>
            <h3 class="pro-price">$ 869.00</h3>
        </div>
    </div>
    <!-- product-item end -->
</aside>