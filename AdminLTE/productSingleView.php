<?php
require('../includes/connection.php');
require('../includes/admin_header.php');
$page = 'productview';
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title>tvOutlet | Product View</title>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php include('../includes/sidebar.php'); ?>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
        <!-- php -->
        <?php
        $TVID = $_GET['TVID'];
        $sql_product = "SELECT * FROM tvspecstbl JOIN brandtbl ON tvspecstbl.TVBrandID = brandtbl.BrandID JOIN tvscreentechtbl ON tvspecstbl.TVScreenTech = tvscreentechtbl.ScreenTechID  WHERE TVID = $TVID;";
        $result = mysqli_query($conn, $sql_product);
        $row = mysqli_fetch_assoc($result);

        ?>
        <!-- php -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1><?php echo $row['TVName']; ?></h1>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card card-solid">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <h3 class="d-inline-block d-sm-none"><?php echo $row['TVName']; ?></h3>
                                <!--  -->
                                <?php
                                $sql_image = "Select * from tvimagetbl where TVID = $TVID and IsDelete = 0;";
                                $result_image = mysqli_query($conn, $sql_image);
                                $row_image = mysqli_fetch_assoc($result_image);

                                $sql_image2 = "Select * from tvimagetbl where TVID = $TVID and IsDelete = 0;";
                                $result_image2 = mysqli_query($conn, $sql_image2);

                                ?>
                                <div class="col-12">
                                    <img src="images/<?php echo $row_image['TVImage']; ?>" class="product-image" alt="Product Image">
                                </div>
                                <div class="col-12 product-image-thumbs">
                                    <?php while ($row_image2 = mysqli_fetch_assoc($result_image2)) : $tvimage = $row_image2['TVImage']; ?>
                                        <div class="product-image-thumb active"><img src="images/<?php echo $row_image2['TVImage']; ?>" alt="Product Image"></div>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <h3 class="my-3"><?php echo $row['TVName']; ?></h3>
                                <p>Model:<?php echo $row['TVModel']; ?><br>Manufacturer: <?php echo $row['BrandName']; ?></p>
                                <p><?php echo $row['TVOverview']; ?></p>

                                <hr>
                                <h3><span class="badge badge-info font-weight-light"><?php echo $row['TVScreensize']; ?>"</span>
                                    <span class="badge badge-info font-weight-light"><?php echo $row['ScreenTechName']; ?></span>
                                    <span class="badge badge-info font-weight-light"><?php echo $row['TVFeature']; ?></span></h3>
                                <div style="background-color: #ff7f00;color: white;" class="py-2 px-3 mt-4">
                                    <h2 class="mb-0">
                                        Price: ₱<?php echo number_format($row['TVPrice'], 2); ?>
                                    </h2>
                                </div>

                            </div>
                        </div>
                        <div class="row mt-4">
                            <nav class="w-100">
                                <div class="nav nav-tabs" id="product-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-specs" role="tab" aria-controls="product-desc" aria-selected="true">Specifications</a>
                                    <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-others" role="tab" aria-controls="product-comments" aria-selected="false">Others</a>
                                    <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Rating</a>
                                </div>
                            </nav>
                            <div class="tab-content p-3" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="product-specs" role="tabpanel" aria-labelledby="product-desc-tab">
                                    <pre><?php echo $row['TVOtherDesc']; ?></pre>
                                    <p><span class="font-weight-bold">Resolution: </span> <?php echo $row['TVResolution']; ?></p>
                                </div>

                                <div class="tab-pane fade" id="product-others" role="tabpanel" aria-labelledby="product-comments-tab">
                                    <p><span class="font-weight-bold">Dimension: </span> <?php echo $row['TVDimension']; ?></p>
                                    <p><span class="font-weight-bold">Warranty: </span> <?php echo $row['TVWarrantyPeriod']; ?></p>
                                    <p><span class="font-weight-bold">Release Date: </span> <?php echo $row['TVReleaseDate']; ?></p>
                                    <p><span class="font-weight-bold">What's in the box: </span>
                                        <pre><?php echo $row['TVWhatsInTheBox']; ?></pre>
                                    </p>
                                </div>

                                <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"> Cras ut ipsum ornare, aliquam ipsum non,
                                    posuere elit. In hac habitasse platea dictumst. Aenean elementum leo augue, id
                                    fermentum risus efficitur vel. Nulla iaculis malesuada scelerisque. Praesent vel
                                    ipsum felis. Ut molestie, purus aliquam placerat sollicitudin, mi ligula euismod
                                    neque, non bibendum nibh neque et erat. Etiam dignissim aliquam ligula, aliquet
                                    feugiat nibh rhoncus ut. Aliquam efficitur lacinia lacinia. Morbi ac molestie
                                    lectus, vitae hendrerit nisl. Nullam metus odio, malesuada in vehicula at,
                                    consectetur nec justo. Quisque suscipit odio velit, at accumsan urna vestibulum a.
                                    Proin dictum, urna ut varius consectetur, sapien justo porta lectus, at mollis nisi
                                    orci et nulla. Donec pellentesque tortor vel nisl commodo ullamcorper. Donec varius
                                    massa at semper posuere. Integer finibus orci vitae vehicula placerat. </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </section>

            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- Default to the left -->
            <strong>Copyright &copy; 2020 <a href="#" style="color: #FF7F00;">tvOutlet.com</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
</body>

</html>