<?php
require('../includes/connection.php');
require('../includes/admin_header.php');
$page = 'screentech';
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title>tvOutlet | Screen Tech</title>

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
        <!-- php -->
        <?php
        // add
        if (isset($_POST['add'])) {
            $ScreenTechName = $_POST['ScreenTechName'];
            $ScreenTechDesc = $_POST['ScreenTechDesc'];
            $query_add = "INSERT INTO tvscreentechtbl (ScreenTechName,ScreenTechDesc) VALUES ('$ScreenTechName','$ScreenTechDesc');";
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
                    title: 'Screen Technology Added',
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
                    title: 'Screen Technology removed',
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
                    title: 'Scren Technology updated',
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
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Screen Technology</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="card card-default color-pallete-box collapsed-card">
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold">Add Screen Technology</h3>
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
                                            <label for="inputName">Screen Tech (Abbreviation only)</label>
                                            <input type="text" name="ScreenTechName" class="form-control" placeholder="e.g LED, LCD, OLED">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="inputName">Technology Description</label>
                                            <input type="text" name="ScreenTechDesc" class="form-control" placeholder="e.g Active Matrix Organic Light Emitting Diodes">
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex align-self-end justify-content-lg-end">
                                        <input type="reset" class="btn btn-secondary mr-2" value="Cancel">
                                        <input type="submit" name="add" value="Add Screen Technology" class="btn bg-orange font-weight-bold" style="color: white !important;">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold">Screen Technology List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th style="width: 220px" class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- php -->
                                    <?php
                                    $sql_screen = "SELECT * from tvscreentechtbl WHERE IsDelete = 0 ORDER BY ScreenTechName ASC;";
                                    $result_screen = mysqli_query($conn, $sql_screen);
                                    while ($row = mysqli_fetch_assoc($result_screen)) :
                                        $ScreenTechID = $row['ScreenTechID'];
                                        $ScreenTechName = $row['ScreenTechName'];
                                        $ScreenTechDesc = $row['ScreenTechDesc'];
                                    ?>
                                        <tr>
                                            <td><?php echo $ScreenTechID; ?></td>
                                            <td><?php echo $ScreenTechName; ?></td>
                                            <td><?php echo $ScreenTechDesc; ?></td>
                                            <td>
                                                <a href="#edit<?php echo $ScreenTechID; ?>" data-toggle="modal" class="btn btn-warning text-white btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                                <a href="#remove<?php echo $ScreenTechID; ?>" data-toggle="modal" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Remove</a>
                                            </td>
                                        </tr>
                                        <!-- modal for edit -->
                                        <div id="edit<?php echo $ScreenTechID; ?>" class="modal fade" role="dialog">
                                            <form method="post">
                                                <div class="modal-dialog modal-md">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-warning">
                                                            <h4 class="modal-title">Edit <?php echo $ScreenTechName; ?></h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="hidden" name="ScreenTechID" value="<?php echo $ScreenTechID ?>">
                                                            <div class="form-group">
                                                                <label for="Scree$ScreenTechName">Screen Technology</label>
                                                                <input class="form-control" type="text" name="ScreenTechName" value="<?php echo $ScreenTechName ?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="Scree$ScreenTechName">Screen Technology Description</label>
                                                                <input class="form-control" type="text" name="ScreenTechDesc" value="<?php echo $ScreenTechDesc ?>" required>
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
                                        <div id="remove<?php echo $ScreenTechID; ?>" class="modal fade" role="dialog">
                                            <form method="post">
                                                <div class="modal-dialog modal-md">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger">
                                                            <h4 class="modal-title">Remove <?php echo $ScreenTechName; ?></h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="hidden" name="$ScreenTechID" value="<?php echo $ScreenTechID; ?>">
                                                            Do you really want to <span class="font-weight-bolder">remove</span> this screen technology?
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
                                        $ScreenTechID = $_POST['$ScreenTechID'];
                                        $query_remove = "UPDATE tvscreentechtbl SET IsDelete = 1 WHERE ScreenTechID = '$ScreenTechID';";
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
                                        $ScreenTechID = $_POST['ScreenTechID'];
                                        $ScreenTechName = $_POST['ScreenTechName'];
                                        $ScreenTechDesc = $_POST['ScreenTechDesc'];
                                        $query_edit = "UPDATE tvscreentechtbl SET ScreenTechName = '$ScreenTechName',ScreenTechDesc = '$ScreenTechDesc' WHERE ScreenTechID = '$ScreenTechID';";
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