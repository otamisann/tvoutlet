<?php
require('../includes/connection.php');
require('../includes/admin_header.php');
$page = 'manufacturer';
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title>tvOutlet | Manufacturers</title>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Main Sidebar Container -->
        <?php include('../includes/sidebar.php') ?>
        <!-- end sidebar -->
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
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Manufacturers</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- php -->
            <?php
            // add
            if (isset($_POST['add'])) {
                $BrandName = $_POST['brand_name'];
                $BrandEmail = $_POST['brand_email'];
                $BrandWebsite = $_POST['brand_link'];
                $query_add = "INSERT INTO brandtbl (BrandName,BrandEmail,BrandWebsite) VALUES ('$BrandName','$BrandEmail','$BrandWebsite');";
                $result = mysqli_query($conn, $query_add);
                if ($result) {
                    $_SESSION['added'] = true;
                } else {
                    $_SESSION['error'] = true;
                }
            }

            // added
            if (isset($_SESSION['added']) == true) { ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Brand Added',
                        // text: 'Invalid email or password',
                        showConfirmButton: false,
                        timer: 2000
                        // confirmButtonText: 'Try again',
                        // confirmButtonColor: '#FF7F00'
                    })
                </script>
            <?php unset($_SESSION['added']);
            }
            // remove
            if (isset($_SESSION['remove']) == true) { ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Brand removed',
                        // text: 'Invalid email or password',
                        showConfirmButton: false,
                        timer: 2000
                        // confirmButtonText: 'Try again',
                        // confirmButtonColor: '#FF7F00'
                    })
                </script>
            <?php unset($_SESSION['remove']);
            }
            // edit
            if (isset($_SESSION['edit']) == true) { ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Brand updated',
                        // text: 'Invalid email or password',
                        showConfirmButton: false,
                        timer: 2000
                        // confirmButtonText: 'Try again',
                        // confirmButtonColor: '#FF7F00'
                    })
                </script>
            <?php unset($_SESSION['edit']);
            }
            // error
            if (isset($_SESSION['error']) == true) { ?>
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'ERROR',
                        // text: 'Invalid email or password',
                        showConfirmButton: false,
                        timer: 2000
                        // confirmButtonText: 'Try again',
                        // confirmButtonColor: '#FF7F00'
                    })
                </script>
            <?php unset($_SESSION['error']);
            }
            ?>
            <!--  -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="card card-default color-pallete-box collapsed-card">
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold">Add Manufacturer/Brand</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool mt-1" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="inputName">Brand Name</label>
                                            <input type="text" name="brand_name" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="inputName">Brand Email Address</label>
                                            <input type="email" name="brand_email" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="inputName">Brand Website Link</label>
                                            <input type="text" name="brand_link" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-6 d-flex align-self-end justify-content-lg-end">
                                        <input type="reset" class="btn btn-secondary mr-2" value="Cancel">
                                        <input type="submit" name="add" value="Add Brand" class="btn bg-orange font-weight-bold" style="color: white !important;">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold">Manufacturer List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Brand Name</th>
                                        <th>Email Address</th>
                                        <th>Website Link</th>
                                        <th style="width: 220px" class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- php -->
                                    <?php
                                    $sql_brands = "SELECT * from brandtbl WHERE IsDelete = 0 ORDER BY BrandName ASC;";
                                    $result_brands = mysqli_query($conn, $sql_brands);
                                    while ($row = mysqli_fetch_assoc($result_brands)) :
                                        $BrandID = $row['BrandID'];
                                        $BrandName = $row['BrandName'];
                                        $BrandEmail = $row['BrandEmail'];
                                        $BrandWebsite = $row['BrandWebsite'];
                                    ?>
                                        <tr>
                                            <td><?php echo $BrandID; ?></td>
                                            <td><?php echo $BrandName; ?></td>
                                            <td><?php echo $BrandEmail; ?></td>
                                            <td><a href="https://<?php echo $BrandWebsite; ?>" target="_blank"><?php echo $BrandWebsite; ?></a></td>
                                            <td>
                                                <a href="#edit<?php echo $BrandID; ?>" data-toggle="modal" class="btn btn-warning text-white btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                                <a href="#remove<?php echo $BrandID; ?>" data-toggle="modal" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Remove</a>
                                            </td>
                                        </tr>
                                        <!-- modal for edit -->
                                        <div id="edit<?php echo $BrandID; ?>" class="modal fade" role="dialog">
                                            <form method="post">
                                                <div class="modal-dialog modal-md">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-warning">
                                                            <h4 class="modal-title">Edit <?php echo $BrandName; ?></h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="hidden" name="BrandID" value="<?php echo $BrandID ?>">
                                                            <div class="form-group">
                                                                <label for="BrandName">Brand Name</label>
                                                                <input class="form-control" type="text" name="BrandName" id="" value="<?php echo $BrandName ?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="BrandName">Brand Email</label>
                                                                <input class="form-control" type="email" name="BrandEmail" id="" value="<?php echo $BrandEmail ?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="BrandName">Brand Website</label>
                                                                <input class="form-control" type="text" name="BrandWebsite" id="" value="<?php echo $BrandWebsite ?>" required>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                                                            <button type="submit" class="btn btn-primary" name="edit"><span class="glyphicon glyphicon-edit"></span> Save changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- modal for remove -->
                                        <div id="remove<?php echo $BrandID; ?>" class="modal fade" role="dialog">
                                            <form method="post">
                                                <div class="modal-dialog modal-md">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger">
                                                            <h4 class="modal-title">Remove <?php echo $BrandName; ?></h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="hidden" name="BrandID" value="<?php echo $BrandID; ?>">
                                                            Do you really want to <span class="font-weight-bolder">remove</span> this manufacturer?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                                                            <button type="submit" class="btn btn-danger" name="remove"><span class="glyphicon glyphicon-edit"></span> Save changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    <?php endwhile;
                                    // remove
                                    if (isset($_POST['remove'])) {
                                        $BrandID = $_POST['BrandID'];
                                        $query_remove = "UPDATE brandtbl SET IsDelete = 1 WHERE BrandID = '$BrandID';";
                                        $result_remove = mysqli_query($conn, $query_remove) or die(mysqli_error($conn));
                                        if ($result_remove) {
                                            $_SESSION['remove'] = true;
                                            echo "<meta http-equiv='refresh' content='0'>";
                                            echo '<script type="text/javascript">';
                                            echo 'window.location.href="manufacturer.php';
                                            echo '</script>';
                                        } elseif ($result_remove == false) {
                                            $_SESSION['error'] = true;
                                        }
                                    }
                                    // edit
                                    if (isset($_POST['edit'])) {
                                        $BrandID = $_POST['BrandID'];
                                        $BrandName = $_POST['BrandName'];
                                        $BrandEmail = $_POST['BrandEmail'];
                                        $BrandWebsite = $_POST['BrandWebsite'];
                                        $query_edit = "UPDATE brandtbl SET BrandName = '$BrandName', BrandEmail = '$BrandEmail', BrandWebsite = '$BrandWebsite' WHERE BrandID = '$BrandID';";
                                        $result_edit = mysqli_query($conn, $query_edit) or die(mysqli_error($conn));
                                        if ($result_edit) {
                                            $_SESSION['edit'] = true;
                                            echo "<meta http-equiv='refresh' content='0'>";
                                            echo '<script type="text/javascript">';
                                            echo 'window.location.href="manufacturer.php';
                                            echo '</script>';
                                        } elseif ($result_edit == false) {
                                            $_SESSION['error'] = true;
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div><!-- /.container-fluid -->
            </div>
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
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
</body>

</html>