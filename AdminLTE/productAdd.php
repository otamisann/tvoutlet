<?php
require('../includes/connection.php');
require('../includes/admin_header.php');
$page = 'productadd';
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title>tvOutlet | Add Product</title>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php include('../includes/sidebar.php') ?>

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


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Add Product</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">

                    <!-- php -->
                    <?php
                    if (isset($_POST['addproduct'])) {
                        $fileElementName = 'image';
                        $path = 'images/';
                        $location = $path . $_FILES['image']['name'];
                        move_uploaded_file($_FILES['image']['tmp_name'], $location);
                        $TVImage = $_FILES['image']['name'];

                        $TVName = $_POST['TVName'];
                        $TVModel = $_POST['TVModel'];
                        $TVBrandID = $_POST['TVBrandID'];
                        $TVPrice = $_POST['TVPrice'];
                        $TVScreensize = $_POST['TVScreensize'];
                        $TVScreenTech = $_POST['TVScreenTech'];
                        $TVResolution = $_POST['TVResolution'];
                        $TVDimension = $_POST['TVDimension'];
                        $TVReleaseDate = $_POST['TVReleaseDate'];
                        $TVFeature = $_POST['TVFeature'];
                        $TVOtherDesc = $_POST['TVOtherDesc'];
                        $TVOverview = $_POST['TVOverview'];
                        $TVWarrantyPeriod = $_POST['TVWarrantyPeriod'];
                        $TVWhatsInTheBox = $_POST['TVWhatsInTheBox'];
                        $TVKeywords = $_POST['TVKeywords'];
                        $StockQuantity = $_POST['StockQuantity'];

                        $sql_tv = "INSERT INTO tvspecstbl (TVQuantity,TVName,TVModel,TVBrandID,TVPrice,TVScreensize,TVScreenTech,TVResolution,TVDimension,TVReleaseDate,TVFeature,TVOtherDesc,TVOverview,TVWarrantyPeriod,TVWhatsInTheBox,TVKeywords) VALUES ('$StockQuantity','$TVName','$TVModel','$TVBrandID','$TVPrice','$TVScreensize','$TVScreenTech','$TVResolution','$TVDimension','$TVReleaseDate','$TVFeature','$TVOtherDesc','$TVOverview','$TVWarrantyPeriod','$TVWhatsInTheBox','$TVKeywords');";
                        if (mysqli_query($conn, $sql_tv)) {
                            // tv_id
                            $last_id = mysqli_insert_id($conn);
                            $totalprice = $StockQuantity * $TVPrice;
                            $sql_stock = "INSERT INTO stockcontroltbl (TVID, StockQuantity) VALUES ('$last_id','$StockQuantity');";
                            mysqli_query($conn, $sql_stock);
                            // image
                            $sql_image = "INSERT INTO tvimagetbl (TVID, TVImage) VALUES ('$last_id','$TVImage');";
                            mysqli_query($conn, $sql_image);
                    ?>
                            <script>
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Product Added',
                                    // text: 'Invalid email or password',
                                    showConfirmButton: false,
                                    timer: 2000
                                    // confirmButtonText: 'Try again',
                                    // confirmButtonColor: '#FF7F00'
                                })
                            </script>
                        <?php

                        } else {
                        ?>
                            <script>
                                Swal.fire({
                                    icon: 'error',
                                    title: 'ERROR',
                                    text: 'Try again',
                                    showConfirmButton: false,
                                    timer: 2000
                                    // confirmButtonText: 'Try again',
                                    // confirmButtonColor: '#FF7F00'
                                })
                            </script>
                    <?php
                        }
                    }
                    ?>

                    <div class="card-columns container">
                        <!-- stock column -->
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                                <h3 class="card-title font-weight-bolder">Stocks</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                                    <!-- name -->
                                    <div class="form-group">
                                        <label for="inputName">Product Name</label>
                                        <input type="text" name="TVName" class="form-control" required>
                                    </div>
                                    <!-- model -->
                                    <div class="form-group">
                                        <label for="inputName">Model</label>
                                        <input type="text" name="TVModel" class="form-control" required>
                                    </div>
                                    <!-- image -->
                                    <div class="callout callout-info">
                                        <p>You can add more images in <b>view products</b> tab. This is only initial image</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Product Image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile" name="image" accept="image/*" required>
                                                <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- brand -->
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="inputStatus">Manufacturer</label>
                                                <select class="form-control custom-select" name="TVBrandID">
                                                    <option selected disabled value="">Select one</option>
                                                    <!-- alphabetical -->
                                                    <option value="0">No brand</option>
                                                    <?php
                                                    $brands = "SELECT * FROM brandtbl WHERE IsDelete = 0 ORDER BY BrandName ASC";
                                                    $result_brands = mysqli_query($conn, $brands);
                                                    while ($row = mysqli_fetch_assoc($result_brands)) :
                                                        $BrandID = $row['BrandID'];
                                                        $BrandName = $row['BrandName'];
                                                    ?>
                                                        <option value="<?php echo $BrandID; ?>"><?php echo $BrandName; ?></option>
                                                    <?php endwhile; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- quantity -->
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="inputName">Quantity</label>
                                                <input type="number" name="StockQuantity" class="form-control" min="1" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- unit price -->
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="inputName">Unit Price</label>
                                                <input type="number" name="TVPrice" class="form-control" placeholder="₱ 15,000" min="1" required>
                                            </div>
                                        </div>
                                        <!-- release date -->
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="inputName">Release Date</label>
                                                <input type="date" name="TVReleaseDate" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        <!-- specs column -->
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                                <h3 class="card-title font-weight-bolder">Specifications</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <!-- screen size -->
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="inputName">Screen Size</label>
                                            <input type="number" min="2" max="200" name="TVScreensize" class="form-control" placeholder="e.g 42" required>
                                        </div>
                                    </div>
                                    <!-- screen tech -->
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="inputName">Screen Technology</label>
                                            <select class="form-control custom-select" required name="TVScreenTech">
                                                <option selected disabled>Select one</option>
                                                <!-- alphabetical -->
                                                <?php
                                                $screentech = "SELECT * FROM tvscreentechtbl WHERE IsDelete = 0 ORDER BY ScreenTechName ASC";
                                                $result_screentech = mysqli_query($conn, $screentech);
                                                while ($row = mysqli_fetch_assoc($result_screentech)) :
                                                    $ScreenTechID = $row['ScreenTechID'];
                                                    $ScreenTechName = $row['ScreenTechName'];
                                                ?>
                                                    <option value="<?php echo $ScreenTechID; ?>"><?php echo $ScreenTechName; ?></option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- tv resolution -->
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="inputName">Screen Resolution</label>
                                            <select class="form-control custom-select" required name="TVResolution">
                                                <option selected disabled>Select one</option>
                                                <!-- alphabetical -->
                                                <option value="720p">720p</option>
                                                <option value="1080p">1080p</option>
                                                <option value="4K">4K</option>
                                                <option value="8K">8K</option>
                                                <option value="FullHD">FullHD</option>
                                                <option value="UHD4K">UHD4K</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- tv feature -->
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="inputName">TV Feature</label>
                                            <select class="form-control custom-select" required name="TVFeature">
                                                <option selected disabled>Select one</option>
                                                <!-- alphabetical -->
                                                <?php
                                                $Feature = "SELECT * FROM feature WHERE IsDelete = 0 ORDER BY FeatureName ASC";
                                                $result_Feature = mysqli_query($conn, $Feature);
                                                while ($row = mysqli_fetch_assoc($result_Feature)) :
                                                    $FeatureID = $row['FeatureID'];
                                                    $FeatureName = $row['FeatureName'];
                                                ?>
                                                    <option value="<?php echo $FeatureName; ?>"><?php echo $FeatureName; ?></option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- tv dimension -->
                                <div class="form-group">
                                    <label for="inputName">TV Dimension</label>
                                    <input type="text" name="TVDimension" placeholder='e.g 25" x 15" x 2"' class="form-control" required>
                                </div>
                                <!-- other specs -->
                                <div class="form-group">
                                    <label for="inputDescription">Other Specifications</label>
                                    <pre><textarea id="inputDescription" class="form-control text-capitalize" rows="7" name="TVOtherDesc" placeholder="Other specifications of television." required></textarea></pre>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        <!-- others column -->
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title font-weight-bolder">Others</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus text-black-50"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <!-- overview -->
                                <div class="form-group">
                                    <label for="inputDescription">Product Overview</label>
                                    <textarea id="inputDescription" class="form-control" rows="4" placeholder="Text for product promotion" name="TVOverview" required></textarea>
                                </div>
                                <!-- warranty -->
                                <div class="form-group">
                                    <label for="warranty">Warranty Period</label>
                                    <input type="text" name="TVWarrantyPeriod" id="warranty" class="form-control text-capitalize" placeholder="e.g 2 years" required>
                                </div>
                                <!-- in the box -->
                                <div class="form-group">
                                    <label for="inputDescription">What's in the box</label>
                                    <textarea id="inputDescription" class="form-control text-capitalize" rows="2" name="TVWhatsInTheBox" placeholder="1 x TV Unit &#101 x Power cord &#101 x Wall bracket" required></textarea>
                                </div>
                                <!-- keywords -->
                                <div class="form-group">
                                    <label for="inputDescription">Keywords (for Search engine optimization SEO)</label>
                                    <textarea id="inputDescription" class="form-control text-capitalize" rows="2" name="TVKeywords" placeholder="Keywords will help the products relevance in search engines." required></textarea>
                                </div>
                                <input type="reset" class="btn btn-secondary" value="Cancel">
                                <a href="#add" data-toggle="modal" class="btn text-white float-right" style="background-color: #FF7F00;">Add Product</a>

                                <!-- confirmation modal -->
                                <div class="modal fade" id="add">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Add this product?</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to add this product?</p>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="submit" name="addproduct" class="btn text-white" style="background-color: #FF7F00;">Add product</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->
                            </div>
                            <!-- /.card-body -->
                            </form>
                        </div>
                    </div>

                </div>
                <!-- <div class="row">
                    <div class="col-12 mb-5">
                        <a href="#" class="btn btn-secondary" type="clear">Cancel</a>
                        <input type="submit" value="Create new Porject" class="btn btn-success float-right">
                    </div>
                </div> -->
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
    <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <script src="dist/js/adminlte.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            bsCustomFileInput.init();
        });
    </script>
</body>

</html>