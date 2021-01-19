<?php
require('../includes/connection.php');
require('../includes/admin_header.php');
$page = 'banners';
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title>tvOutlet | Banners</title>

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
                            <h1 class="m-0 text-dark">Banners</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- php -->
            <?php
            if (isset($_POST['submit'])) {
                $tvid = $_POST['banner_id'];
                $query_banner = "UPDATE tvspecstbl SET IsBanner = 1 WHERE TVID = $tvid;";
                if ($res_query = mysqli_query($conn, $query_banner)) { ?>
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Banner Added',
                            // text: 'Invalid email or password',
                            showConfirmButton: false,
                            timer: 2000
                            // confirmButtonText: 'Try again',
                            // confirmButtonColor: '#FF7F00'
                        })
                    </script>
            <?php }
            }
            ?>

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="card card-default color-pallete-box collapsed-card">
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold">Add Banner</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="inputName">Choose Product</label>
                                            <select class="form-control custom-select" name="banner_id" required>
                                                <option selected disabled value="">Select product</option>
                                                <!-- select all from tvspecs where banner = 1 -->
                                                <!-- alphabetical -->
                                                <?php
                                                $banner = "SELECT * FROM tvspecstbl WHERE IsDelete = 0 and IsBanner = 0 ORDER BY TVName ASC";
                                                $result_ban = mysqli_query($conn, $banner);
                                                while ($row2 = mysqli_fetch_assoc($result_ban)) :
                                                    $tvid = $row2['TVID'];
                                                    $TVName = $row2['TVName'];
                                                ?>
                                                    <option value="<?php echo $tvid; ?>"><?php echo $TVName; ?></option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex align-self-end justify-content-lg-end">
                                        <input type="reset" class="btn btn-secondary mr-2" value="Cancel">
                                        <input type="submit" value="Add Banner" name="submit" class="btn bg-orange font-weight-bold" style="color: white !important;">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold">Banner List</h3>
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body p-0">
                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <th style="width: 90px" class="text-center">Image</th>
                                        <th>Product</th>
                                        <th>Overview</th>
                                        <th>Status</th>
                                        <th style="width: 220px" class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql_banner = "SELECT * FROM tvspecstbl WHERE IsBanner = 1 AND IsDelete = 0;";
                                    $result_banner = mysqli_query($conn, $sql_banner);
                                    while ($row_ban = mysqli_fetch_assoc($result_banner)) :
                                        $tvid = $row_ban['TVID'];
                                        $tvname = $row_ban['TVName'];
                                        $tvoverview = $row_ban['TVOverview'];

                                    ?>
                                        <tr>
                                            <td class="text-center">
                                                <center><img class="attachment-img" style="object-fit: scale-down;height: 90px;width: 90px;" src="https://images.samsung.com/is/image/samsung/p6pim/ph/ua70tu7000gxxp/gallery/ph-uhd-tu7000-324462-ua70tu7000gxxp-356426257?$684_547_PNG$" alt="Attachment Image"></center>
                                            </td>
                                            <td><?php echo $tvname; ?></td>
                                            <td><?php echo $tvoverview; ?></td>
                                            <td class="text-success">Enabled</td>
                                            <td class="text-center">
                                                <a href="#" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Remove">
                                                    <i class="fas fa-trash"></i> Remove banner
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
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