<?php
session_start();
require('includes/connection.php');
if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
}
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>tvOutlet || Login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="AdminLTE/tvOutletIcon.png">
    <!-- All CSS Files -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Nivo-slider css -->
    <link rel="stylesheet" href="lib/css/nivo-slider.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Template color css -->
    <link href="css/color/color-core.css" data-style="styles" rel="stylesheet">
    <!-- User style -->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Modernizr JS -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="sweetalert2.all.min.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <style>
        .swal2-popup {
            font-size: 1.6rem !important;
        }
    </style>
</head>

<body>
    <!-- Body main wrapper start -->
    <div class="wrapper">
        <!-- START HEADER AREA -->
        <?php include('includes/index_header.php') ?>
        <!-- END HEADER AREA -->
        <!-- BREADCRUMBS SETCTION START -->
        <div class="breadcrumbs-section plr-200 mb-50">
            <div class="breadcrumbs overlay-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="breadcrumbs-inner">
                                <h1 class="breadcrumbs-title">Login</h1>
                                <ul class="breadcrumb-list">
                                    <li><a href="index.php">Home</a></li>
                                    <li>Login</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BREADCRUMBS SETCTION END -->
        <!-- php -->
        <?php
        if (isset($_POST['login'])) {
            $email = $_POST['emailaddress'];
            $password = $_POST['password'];
            $sql_check = "SELECT * FROM usertbl WHERE emailaddress = '$email' AND password = '$password';";
            $res_check = mysqli_query($conn, $sql_check);
            if (mysqli_num_rows($res_check) > 0) {
                while ($row_check = mysqli_fetch_assoc($res_check)) {
                    $user_id = $row_check['userID'];
                    $_SESSION['user_id'] = $user_id;
                    // header('Location: index.php');
                    echo '<script type="text/javascript">';
                    echo 'window.location.href="index.php";';
                    echo '</script>';
                }
            } else { ?>
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Invalid email or password',
                        // text: 'please',
                        confirmButtonText: 'Try again',
                        confirmButtonColor: '#FF7F00'
                    })
                </script>
        <?php }
        }
        ?>

        <!-- Start page content -->
        <div id="page-content" class="page-wrapper">

            <!-- LOGIN SECTION START -->
            <div class="login-section mb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="registered-customers">
                                <h4 class="widget-title border-left mb-30">Login</h4>
                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                    <div class="login-account p-30 box-shadow shadow-lg white-bg">
                                        <p>If you have an account with us, Please log in.</p>
                                        <!-- email -->
                                        <input type="text" name="emailaddress" placeholder="Email Address" required="">
                                        <!-- password -->
                                        <input type="password" name="password" placeholder="Password" required="">
                                        <p><small><a href="#">Forgot your password?</a></small></p>
                                        <p>if you don't have a account yet<a href="register.php" style="color: orange;"> register here.</a></p>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="submit-btn-1 mt-20 btn-hover-1 f-right" type="submit" name="login">Login</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- LOGIN SECTION END -->

        </div>
        <!-- End page content -->

        <!-- START FOOTER AREA -->
        <?php include('includes/footer.php'); ?>   
        <!-- END FOOTER AREA -->
    </div>
    <!-- Body main wrapper end -->


    <!-- Placed JS at the end of the document so the pages load faster -->

    <!-- jquery latest version -->
    <script src="js/vendor/jquery-3.1.1.min.js"></script>
    <!-- Bootstrap framework js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- jquery.nivo.slider js -->
    <script src="lib/js/jquery.nivo.slider.js"></script>
    <!-- All js plugins included in this file. -->
    <script src="js/plugins.js"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="js/main.js"></script>

</body>

</html>