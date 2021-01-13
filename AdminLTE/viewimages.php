<?php
require('../includes/connection.php');
require('../includes/admin_header.php');
$page = 'productview';
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title>tvOutlet | Images</title>


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
                            <h1 class="m-0 text-dark">Products Images</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <?php
            $tvid = $_GET['TVID'];
            $sql3 = "SELECT * FROM tvimagetbl WHERE TVID = $tvid;";
            $result3 = mysqli_query($conn, $sql3);

            if (isset($_POST['add_image'])) {
                $tvid = $_GET['TVID'];
                $fileElementName = 'image';
                $path = 'images/';
                $location = $path . $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], $location);
                $TVImage = $_FILES['image']['name'];

                $sql_insert = "INSERT INTO tvimagetbl (TVID, TVImage) VALUES ('$tvid','$TVImage');";
                $res_image = mysqli_query($conn, $sql_insert);

                if ($res_image) { ?>
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Image Added',
                            // text: 'Invalid email or password',
                            showConfirmButton: false,
                            timer: 2000
                            // confirmButtonText: 'Try again',
                            // confirmButtonColor: '#FF7F00'
                        })
                    </script>
            <?php    }
            }

            ?>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card card-solid">
                    <div class="card-body pb-0">
                        <div class="row">
                            <!-- img card -->
                            <?php while ($row3 = mysqli_fetch_assoc($result3)) :
                                $tvimage = $row3['TVImage'];
                                $tvimageid = $row3['TVImageID'];
                            ?>
                                <div class="col-md-3">
                                    <div class="card bg-light">
                                        <div class="card-body pt-0">
                                            <div class="row">
                                                <div class="col-12 text-center mt-3">
                                                    <img src="images/<?php echo $row3['TVImage']; ?>" alt="<?php echo $row3['TVImage']; ?>" class="img-rounded img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="text-center">
                                                <a href="viewimageds.php?tv=<?php echo $tvimageid; ?>" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i> Remove
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- img card ends -->
                            <?php endwhile; ?>
                            <div class="col-md-3">
                                <div class="card bg-light ">
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                                                <div class="col-12">
                                                    <div class="form-group pt-3">
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="exampleInputFile" name="image" accept="image/*" required>
                                                                <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input type="submit" name="add_image" class="btn btn-success btn-block" value="Add image">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- img add ends -->
                        </div>
                    </div>

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
    <!-- jQuery -->
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- page script -->
    <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            bsCustomFileInput.init();
        });
    </script>
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