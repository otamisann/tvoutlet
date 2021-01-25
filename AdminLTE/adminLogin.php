<?php
require('../includes/connection.php');

if (isset($_POST['loginbtn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql_login = "SELECT * FROM adminaccounttbl WHERE Email = '$email' AND Password = '$password'";
    $result = mysqli_query($conn, $sql_login);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $AdminID = $row['AdminID'];
            $RoleID = $row['RoleID'];
            session_start();
            $_SESSION['AdminID'] = $AdminID;

            if ($RoleID == 1) {
                header('Location: adminindex.php');
            } else if ($RoleID == 2) {
                header('Location: packaging.php');
            } else
                header('Location: deliver.php');
        }
    } else {
        session_start();
        $_SESSION['login_failed'] = true;
    }
}
?>
<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="sweetalert2.all.min.js"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>tvOutlet | Admin Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page" style="background-color: white;">

    <div class="row">
        <!-- alert -->
        <?php
        if (isset($_SESSION['login_failed']) == true) { ?>
            <script>
                Swal.fire({
                    icon: 'info',
                    title: 'Oops...',
                    text: 'Invalid email or password',
                    // showConfirmButton: false,
                    // timer: 2000,
                    confirmButtonText: 'Try again',
                    confirmButtonColor: '#FF7F00'
                })
            </script>
        <?php unset($_SESSION['login_failed']);
        }
        
        ?>
        <!--  -->
        <div class="login-box">
            <div class="login-logo">
                <img src="tvOutlet.png" class="img-fluid" alt="Responsive image">
            </div>
            <!-- /.login-logo -->
            <div class="card shadow-md">
                <div class="card-body login-card-body rounded">
                    <p class="login-box-msg">Sign in to start your session</p>
                    <!-- form -->
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Email" name="email" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Password" name="password" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="remember">
                                    <label for="remember">
                                        Remember Me
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <!-- <button style="color: white !important;" type="submit" class="btn bg-orange btn-block">Sign In</button> -->
                                <input type="submit" name="loginbtn" value="Sign In" class="btn bg-orange btn-block" style="color: white !important;">
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                    <!-- /.social-auth-links -->
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>

</body>

<!-- Mirrored from adminlte.io/themes/dev/AdminLTE/pages/examples/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Sep 2020 10:36:40 GMT -->

</html>