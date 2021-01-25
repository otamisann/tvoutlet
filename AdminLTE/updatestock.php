<?php
require('../includes/connection.php');
require('../includes/admin_header.php');
$page = 'updatestock';
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title>tvOutlet | Update stocks</title>

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
            $tvid = $_POST['tvid'];
            $quantity = $_POST['quantity'];
            $query_add = "INSERT INTO stockcontroltbl (TVID,StockQuantity) VALUES ('$tvid','$quantity');";
            $result = mysqli_query($conn, $query_add);

            // select
            $sql_select = "SELECT * from tvspecstbl where TVID = $tvid;";
            $res_select = mysqli_query($conn, $sql_select);
            $row_quantity = mysqli_fetch_assoc($res_select);
            $kim = $row_quantity['TVQuantity'];

            // update
            $final_quantity = $kim + $quantity;
            $sql_update = "UPDATE tvspecstbl SET TVQuantity = $final_quantity WHERE TVID = $tvid;";
            $res_update = mysqli_query($conn, $sql_update);

            if ($result) { ?>
                <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Updated',
                    text: 'Products stock level has been updated',
                    showConfirmButton: false,
                    timer: 2000
                    // confirmButtonText: 'Try again',
                    // confirmButtonColor: '#FF7F00'
                })
            </script>
            <?php } else { ?>
                <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Not updated',
                    // text: 'Products stock level has been updated',
                    showConfirmButton: false,
                    timer: 2000
                    // confirmButtonText: 'Try again',
                    // confirmButtonColor: '#FF7F00'
                })
            </script>
            <?php }
        }

        ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Adjust Stock-Level</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="card card-default color-pallete-box">
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold">Choose a product you want to update</h3>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label for="inputName">Select product</label>
                                            <select class="form-control custom-select" name="tvid" required>
                                                <option selected disabled value="">Select one</option>
                                                <!-- alphabetical -->
                                                <?php
                                                $products = "SELECT * FROM tvspecstbl join brandtbl ON TVBrandID = BrandID WHERE tvspecstbl.IsDelete = 0 ORDER BY tvname ASC";
                                                $result_prod = mysqli_query($conn, $products);
                                                while ($row = mysqli_fetch_assoc($result_prod)) :
                                                    $tvid = $row['TVID'];
                                                    $tvname = $row['TVName'];
                                                    $tvbrand = $row['BrandName'];
                                                    $tvquantity = $row['TVQuantity'];
                                                ?>
                                                    <option value="<?php echo $tvid; ?>">[<?php echo $tvbrand; ?>] - <?php echo $tvname; ?></option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="inputName">Add Quantity</label>
                                            <input type="number" name="quantity" class="form-control" min="1" required>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex align-self-end justify-content-lg-end">
                                        <input type="reset" class="btn btn-secondary mr-2" value="Cancel">
                                        <input type="submit" name="add" value="Update" class="btn bg-orange font-weight-bold" style="color: white !important;">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


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