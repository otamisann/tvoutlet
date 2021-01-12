<?php
require('../includes/connection.php');
require('../includes/admin_header.php');
$page = 'stockview';
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title>tvOutlet | Stock History</title>


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
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
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
                            <h1 class="m-0 text-black">View Stocks</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <section class="content">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped" style="width: 100%;">
                                            <thead>
                                                <tr class="text-center">
                                                    <th style="width: 3%;">#</th>
                                                    <th style="width: 30%;">Product</th>
                                                    <th style="width: 15%;">Quantity</th>
                                                    <th>Unit Price</th>
                                                    <th>Total Price</th>
                                                    <th>Date Delivered</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- tv1 -->
                                                <?php
                                                $tvid = $_GET['TVID'];
                                                $overall = 0;
                                                $overall_quantity = 0;
                                                $sql_products = "SELECT * FROM tvspecstbl as t JOIN brandtbl as b ON t.TVBrandID = b.BrandID JOIN stockcontroltbl as s ON t.TVID = s.TVID  WHERE t.IsDelete = 0 and s.TVID = $tvid;";
                                                $result_products = mysqli_query($conn, $sql_products);
                                                while ($row = mysqli_fetch_assoc($result_products)) :

                                                    $ID = $row['StockControlID'];
                                                    $Quantity = $row['StockQuantity'];
                                                    $TVQuantity = $row['TVQuantity'];
                                                    $Name = $row['TVName'];
                                                    $Brand = $row['BrandName'];
                                                    $Model = $row['TVModel'];
                                                    $Price = $row['TVPrice'];
                                                    $totalPrice = $row['StockTotalPrice'];
                                                    $dateDelivered = $row['StockDate'];
                                                    // $Overall = $row['Overall'];
                                                    $overall = $overall + $totalPrice;
                                                    $overall_quantity = $overall_quantity + $Quantity;

                                                ?>
                                                    <tr>
                                                        <td class="text-center"><?php echo $ID; ?></td>
                                                        <td class="font-weight-bolder"><?php echo $Name; ?> <p class="text-muted">Model: <?php echo $Model; ?><br>Brand: <?php echo $Brand; ?></p>
                                                        </td>
                                                        <td class="text-center"><?php echo $Quantity; ?> items</td>
                                                        <td>₱<?php echo number_format($Price, 2); ?></td>
                                                        <td>₱<?php echo number_format($totalPrice, 2); ?></td>
                                                        <td><?php echo $dateDelivered; ?></td>
                                                    </tr>
                                                <?php endwhile; ?>
                                                <tr class="h5">
                                                    <td colspan="2" class="bg-teal"><span>Stock level: </span><span class="font-weight-bolder"><?php echo $TVQuantity; ?></span></td>

                                                    <td colspan="2" class="bg-cyan"><span>Total items received: </span><span class="font-weight-bolder"><?php echo $overall_quantity; ?></span></td>

                                                    <td colspan="2" class="bg-primary"><span>Overall price: </span><span class="font-weight-bolder">₱<?php echo number_format($overall, 2); ?></span></td>
                                                </tr>
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
            $("#example1").dataTable({
                "autoWidth": false
            });
        });
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
</body>

</html>