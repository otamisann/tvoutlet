<?php
session_start();
require('includes/connection.php');
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>tvOutlet || Register</title>
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
    <style>
        input[type="number"],
        input[type="date"],
        input[type="email"] {
            background: #fff none repeat;
            border: 1px solid transparent;
            box-shadow: 0 0 4px rgba(0, 0, 0, 0.1);
            color: #999999;
            font-size: 13px;
            height: 40px;
            margin-bottom: 20px;
            padding-left: 20px;
            width: 100%;
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
                                <h1 class="breadcrumbs-title">Register</h1>
                                <ul class="breadcrumb-list">
                                    <li><a href="index.php">Home</a></li>
                                    <li>Register</li>
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
        if (isset($_POST['register'])) {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $middlename = $_POST['middlename'];
            $emailaddress =  $_POST['emailaddress'];
            $password = $_POST['password'];
            $address1 = $_POST['address1'];
            $address2 = $_POST['address2'];
            $barangay = $_POST['barangay'];
            $city = $_POST['city'];
            $postalcode = $_POST['postalcode'];
            $phonenumber = $_POST['phonenumber'];
            $gender = $_POST['gender'];
            $birthday = $_POST['birthday'];

            $sql_new_user = "INSERT INTO usertbl (firstname,lastname,middlename,emailaddress,password,address1,address2,barangay,city,postalcode,phonenumber,gender,birthday) VALUES ('$firstname','$lastname','$middlename','$emailaddress','$password','$address1','$address2','$barangay','$city','$postalcode','$phonenumber','$gender','$birthday');";
            $res_new_user = mysqli_query($conn, $sql_new_user);
            if ($res_new_user = 1)  {
                // session_start();
                $last_id = mysqli_insert_id($conn);
                $_SESSION['user_id'] = $last_id;
                $_SESSION['new_user'] = true;
                // header('Location: index.php');
                echo '<script type="text/javascript">';
                echo 'window.location.href="index.php";';
                echo '</script>';
            } else {
                echo ("Error description: " . $mysqli->error);
            }
        }
        ?>

        <!-- Start page content -->
        <div id="page-content" class="page-wrapper">

            <!-- register -->
            <div class="login-section mb-80">
                <div class="container">
                    <div class="row">
                        <!-- new-customers -->
                        <div class="col-md-8 col-md-offset-2">
                            <div class="new-customers">
                                <form action="register.php" method="POST">
                                    <h4 class="widget-title border-left mb-20">register</h4>
                                    <p>If you have an account already <a href="login.html" style="color: orange;">login
                                            here.</a></p>
                                    <!-- <?php echo $_SESSION['user_id']; ?> -->
                                    <div class="login-account p-30 box-shadow">
                                        <!-- personal info -->
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="k" class="text-muted">First Name</label>
                                                <input type="text" name="firstname" required>
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="k" class="text-muted">Middle Name (Optional)</label>
                                                <input type="text" name="middlename">
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="k" class="text-muted">Last Name</label>
                                                <input type="text" name="lastname" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="k" class="text-muted">Email Address</label>
                                                <input type="text" name="emailaddress" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="k" class="text-muted">Phone Number</label>
                                                <input type="number" name="phonenumber" required placeholder="09*********">
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="k" class="text-muted">Gender</label>
                                                <select class="custom-select" name="gender" required>
                                                    <option selected disabled>Choose</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="k" class="text-muted">Birthday</label>
                                                <input type="date" name="birthday" required>
                                            </div>
                                        </div>
                                        <!-- address -->
                                        <label for="k" class="text-muted">Adress Line 1</label>
                                        <input type="text" name="address1" required placeholder="House number, blk, street name">

                                        <label for="k" class="text-muted">Adress Line 2 (Optional)</label>
                                        <input type="text" name="address2" placeholder="Building name, apartment or suite">

                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="k" class="text-muted">Barangay</label>
                                                <input type="text" name="barangay" required>
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="k" class="text-muted">City</label>
                                                <input type="text" name="city" required>
                                            </div>
                                            <div class="col-sm-4">
                                                <label for="k" class="text-muted">Postal Code</label>
                                                <input type="number" name="postalcode" required>
                                            </div>
                                        </div>
                                        <!-- Password -->
                                        <label for="k" class="text-muted">Password</label>
                                        <input type="password" name="password" required placeholder="Password">

                                        <label for="k" class="text-muted">Confirm Password</label>
                                        <input type="password" name="confirm_password" required placeholder="Confirm Password">

                                        <div class="checkbox">
                                            <label class="mr-10">
                                                <small>
                                                    <input type="checkbox" name="signup">Sign up for our newsletter!
                                                </small>
                                            </label>
                                            <label>
                                                <small>
                                                    <input type="checkbox" name="signup">Receive special offers from our
                                                    partners!
                                                </small>
                                            </label>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <button class="submit-btn-1 mt-20 btn-hover-1" type="submit" name="register" value="register">Register</button>
                                            </div>
                                            <div class="col-md-6">
                                                <button class="submit-btn-1 mt-20 btn-hover-1 f-right" type="reset">Clear</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- register-->

        </div>
        <!-- End page content -->

        <!-- START FOOTER AREA -->
        <footer id="footer" class="footer-area">
            <div class="footer-top">
                <div class="container-fluid">
                    <div class="plr-185">
                        <div class="footer-top-inner gray-bg">
                            <div class="row">
                                <div class="col-lg-4 col-md-5 col-sm-4">
                                    <div class="single-footer footer-about">
                                        <div class="footer-logo">
                                            <img src="img/logo/logo.png" alt="">
                                        </div>
                                        <div class="footer-brief">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                industry. Lorem Ipsum has been the subas industry's standard dummy text
                                                ever since the 1500s,</p>
                                            <p>When an unknown printer took a galley of type and If you are going to use
                                                a passage of Lorem Ipsum scrambled it to make.</p>
                                        </div>
                                        <ul class="footer-social">
                                            <li>
                                                <a class="facebook" href="" title="Facebook"><i class="zmdi zmdi-facebook"></i></a>
                                            </li>
                                            <li>
                                                <a class="google-plus" href="" title="Google Plus"><i class="zmdi zmdi-google-plus"></i></a>
                                            </li>
                                            <li>
                                                <a class="twitter" href="" title="Twitter"><i class="zmdi zmdi-twitter"></i></a>
                                            </li>
                                            <li>
                                                <a class="rss" href="" title="RSS"><i class="zmdi zmdi-rss"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-2 hidden-md hidden-sm">
                                    <div class="single-footer">
                                        <h4 class="footer-title border-left">Shipping</h4>
                                        <ul class="footer-menu">
                                            <li>
                                                <a href="#"><i class="zmdi zmdi-circle"></i><span>New
                                                        Products</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="zmdi zmdi-circle"></i><span>Discount
                                                        Products</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="zmdi zmdi-circle"></i><span>Best Sell
                                                        Products</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="zmdi zmdi-circle"></i><span>Popular
                                                        Products</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="zmdi zmdi-circle"></i><span>Manufactirers</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="zmdi zmdi-circle"></i><span>Suppliers</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="zmdi zmdi-circle"></i><span>Special
                                                        Products</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-3 col-sm-4">
                                    <div class="single-footer">
                                        <h4 class="footer-title border-left">my account</h4>
                                        <ul class="footer-menu">
                                            <li>
                                                <a href="#"><i class="zmdi zmdi-circle"></i><span>My Account</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="zmdi zmdi-circle"></i><span>My Wishlist</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="zmdi zmdi-circle"></i><span>My Cart</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="zmdi zmdi-circle"></i><span>Sign In</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="zmdi zmdi-circle"></i><span>Registration</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="zmdi zmdi-circle"></i><span>Check out</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="zmdi zmdi-circle"></i><span>Oder
                                                        Complete</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="single-footer">
                                        <h4 class="footer-title border-left">Get in touch</h4>
                                        <div class="footer-message">
                                            <form action="#">
                                                <input type="text" name="name" placeholder="Your name here...">
                                                <input type="text" name="email" placeholder="Your email here...">
                                                <textarea class="height-80" name="message" placeholder="Your messege here..."></textarea>
                                                <button class="submit-btn-1 mt-20 btn-hover-1" type="submit">submit
                                                    message</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom black-bg">
                <div class="container-fluid">
                    <div class="plr-185">
                        <div class="copyright">
                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <div class="copyright-text">
                                        <p>&copy; <a href="https://themeforest.net/user/codecarnival/portfolio" target="_blank">CodeCarnival</a> 2016. All Rights Reserved.</p>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <ul class="footer-payment text-right">
                                        <li>
                                            <a href="#"><img src="img/payment/1.jpg" alt=""></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="img/payment/2.jpg" alt=""></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="img/payment/3.jpg" alt=""></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="img/payment/4.jpg" alt=""></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
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