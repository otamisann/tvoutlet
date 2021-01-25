<?php
session_start();
require('../includes/connection.php');
require('../includes/admin_header.php');
if (!isset($_SESSION['AdminID'])) {
    header('location: adminLogin.php');
}
$AdminID = $_SESSION['AdminID'];
$sql = "SELECT * FROM `adminaccounttbl` as a JOIN roletbl as r ON a.RoleID = r.RoleID WHERE AdminId = '$AdminID';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title>tvOutlet | Packaging</title>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-primary elevation-2">
            <!-- Brand Logo -->
            <a href="adminIndex.html" class="brand-link">
                <img src="tvOutletIcon.png" alt="AdminLTE Logo" class="brand-image">
                <span class="brand-text font-weight-light">tvOutlet Packaging</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image mt-3">
                        <img src="tvOutletIcon.png" class="img-circle elevation-1" alt="User Image">
                    </div>
                    <div class="info">
                        <span><?php echo $row['PersonInCharge']; ?></span>
                        <a href="#" class="d-block font-weight-bold"><?php echo $row['RoleDesc']; ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="packaging.php" class="nav-link active">
                                <i class="nav-icon fas fa-boxes"></i>
                                <p>
                                    For packaging
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="for_delivery.php" class="nav-link">
                                <i class="nav-icon fas fa-truck-loading"></i>
                                <p>
                                    For delivery
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">Account Setting</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-cogs"></i>
                                <p>
                                    Account
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="logout.php" class="text-white btn btn-danger btn-block mb-2">
                                Sign out
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Products ready to Pack</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <?php
            if (isset($_SESSION['packaged'])) {
                if ($_SESSION['packaged'] == 1) { ?>
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Item is ready to deliver',
                            showConfirmButton: false,
                            timer: 3000
                            // text: 'please',
                            // confirmButtonText: 'Try again',
                            // confirmButtonColor: '#FF7F00'
                        })
                    </script>
                <?php unset($_SESSION['packaged']);
                } 
            }

            ?>

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">

                    <section class="content">
                        <div class="row">
                            <div class="col-12">

                                <div class="card">
                                    <!-- <div class="card-header">
                                        <h3 class="card-title">DataTable with default features</h3>
                                    </div> -->
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th style="width: 15px;">OrderID</th>
                                                    <th class="text-center" style="width: 90px;">Customer</th>
                                                    <th class="text-center" style="width: 150px;">Product/s Ordered</th>
                                                    <th style="width: 60px;">Order Date</th>
                                                    <!-- <th style="width: 60px;">Expected ship date</th> -->
                                                    <th class="text-center" style="width: 30px;">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- php -->
                                                <?php
                                                $sql_package = "SELECT * FROM `mainordertbl` WHERE Status = 2;";
                                                $res_package = mysqli_query($conn, $sql_package);
                                                while ($row_package = mysqli_fetch_assoc($res_package)) :
                                                ?>
                                                    <!-- tv1 -->
                                                    <tr>
                                                        <td class="text-center">TVO<?php echo $row_package['MainOrderID']; ?></td>
                                                        <td class="text-center">
                                                            <?php
                                                            $sql_ord_name = "SELECT * FROM `usertbl` JOIN mainordertbl ON mainordertbl.UserID = usertbl.userID WHERE mainordertbl.UserID = $row_package[UserID];";
                                                            $res_ord_name = mysqli_query($conn, $sql_ord_name);
                                                            $row_ord_name = mysqli_fetch_assoc($res_ord_name);
                                                            ?>
                                                            <p class="text-left">Name: <?php echo $row_ord_name['firstname'] . " " . $row_ord_name['lastname']; ?><br>Phone: <?php echo $row_package['ContactNum']; ?><br>Address: <br><?php echo $row_package['ShipAddress']; ?></p>
                                                        </td>
                                                        <!-- products -->
                                                        <td>
                                                            <?php
                                                            $sql_ord_prod = "SELECT * FROM `mainordertbl` JOIN ordertbl ON mainordertbl.MainOrderID = ordertbl.MainOrderID WHERE Status = 2 AND ordertbl.MainOrderID = $row_package[MainOrderID];";
                                                            $res_ord_prod = mysqli_query($conn, $sql_ord_prod);
                                                            while ($row_ord_prod = mysqli_fetch_assoc($res_ord_prod)) :
                                                            ?>
                                                                <?php echo $row_ord_prod['TVName']; ?> <p class="text-muted">Model: <?php echo $row_ord_prod['TVModel']; ?><br>Brand: <?php echo $row_ord_prod['Brand']; ?></p>
                                                            <?php endwhile; ?>
                                                        </td>
                                                        <!-- products -->
                                                        <?php
                                                        $mydate = strtotime($row_package['MainOrderDate']);
                                                        $mydate2 = strtotime($row_package['ShipDate']);
                                                        // echo date('F jS Y', $mydate);
                                                        ?>

                                                        <td>Date:<br> <strong><?php echo date('F j, Y', $mydate); ?></strong><br>Time:<br> <strong><?php echo date('h:i:s A', $mydate); ?></strong></td>

                                                        <!-- <td>Date:<br><strong><?php echo date('F j, Y', $mydate2); ?></strong><br>Time:<br> <strong>Anytime</strong><br>(estimated)</td> -->
                                                        <td class="text-center">
                                                            <a href="packaging_process.php?MainOrderID=<?php echo $row_package['MainOrderID']; ?>" class="btn btn-success">
                                                                Packaged
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
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </section>
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
    <!-- jQuery -->
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- page script -->
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
        $(function() {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });
        });
    </script>
</body>

</html>