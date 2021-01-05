<?php
require('../includes/connection.php');
require('../includes/admin_header.php');
$page = 'additionalfeature';
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title>tvOutlet | Feature</title>

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
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Additional Features</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- php -->
            <?php
            // add
            if (isset($_POST['add'])) {
                $FeatureName = $_POST['FeatureName'];
                $query_add = "INSERT INTO feature (FeatureName) VALUES ('$FeatureName');";
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
                        title: 'Feature Added',
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
                        title: 'Feature Removed',
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
                        title: 'Feature Updated',
                        // text: 'Invalid email or password',
                        showConfirmButton: false,
                        timer: 2000
                        // confirmButtonText: 'Try again',
                        // confirmButtonColor: '#FF7F00'
                    })
                </script>
            <?php unset($_SESSION['edit']);
            }
            ?>
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="card card-default color-pallete-box collapsed-card">
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold">Add Feature</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="inputName">Feature</label>
                                            <input type="text" name="FeatureName" class="form-control" placeholder="e.g Netflix, SmartTV, Youtube etc.">
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex align-self-end justify-content-lg-end">
                                        <input type="reset" class="btn btn-secondary mr-2" value="Cancel" data-card-widget="collapse">
                                        <input type="submit" name="add" value="Add Feature" class="btn bg-orange font-weight-bold" style="color: white !important;">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold">Additional Feature List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Name</th>
                                        <th style="width: 220px" class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- php -->
                                    <?php
                                    $sql_screen = "SELECT * from feature WHERE IsDelete = 0 ORDER BY FeatureName ASC;";
                                    $result_screen = mysqli_query($conn, $sql_screen);
                                    while ($row = mysqli_fetch_assoc($result_screen)) :
                                        $FeatureID = $row['FeatureID'];
                                        $FeatureName = $row['FeatureName'];
                                    ?>
                                        <tr>
                                            <td><?php echo $FeatureID; ?></td>
                                            <td><?php echo $FeatureName; ?></td>
                                            <td>
                                                <a href="#edit<?php echo $FeatureID; ?>" data-toggle="modal" class="btn btn-warning text-white btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                                <a href="#remove<?php echo $FeatureID; ?>" data-toggle="modal" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Remove</a>
                                            </td>
                                        </tr>
                                        <!-- modal for edit -->
                                        <div id="edit<?php echo $FeatureID; ?>" class="modal fade" role="dialog">
                                            <form method="post">
                                                <div class="modal-dialog modal-md">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-warning">
                                                            <h4 class="modal-title">Edit <?php echo $FeatureName; ?></h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="hidden" name="FeatureID" value="<?php echo $FeatureID ?>">
                                                            <div class="form-group">
                                                                <label for="FeatureName">Feature Name</label>
                                                                <input class="form-control" type="text" name="FeatureName" value="<?php echo $FeatureName ?>" required>
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
                                        <div id="remove<?php echo $FeatureID; ?>" class="modal fade" role="dialog">
                                            <form method="post">
                                                <div class="modal-dialog modal-md">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger">
                                                            <h4 class="modal-title">Remove <?php echo $FeatureName; ?></h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="hidden" name="FeatureID" value="<?php echo $FeatureID; ?>">
                                                            Do you really want to <span class="font-weight-bolder">remove</span> this additional feature?
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
                                        $FeatureID = $_POST['$FeatureID'];
                                        $query_remove = "UPDATE feature SET IsDelete = 1 WHERE FeatureID = '$FeatureID';";
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
                                        $FeatureID = $_POST['FeatureID'];
                                        $FeatureName = $_POST['FeatureName'];
                                        $query_edit = "UPDATE feature SET FeatureName = '$FeatureName' WHERE FeatureID = '$FeatureID';";
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