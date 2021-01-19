<footer id="footer" class="footer-area">
    <div class="footer-top">
        <div class="container-fluid">
            <div class="plr-185">
                <div class="footer-top-inner theme-bg">
                    <div class="row">
                        <div class="col-lg-4 col-md-5 col-sm-4">
                            <div class="single-footer footer-about">
                                <div class="footer-logo">
                                    <img src="AdminLTE/tvoutlet.png" style="height: 50px;width: 130px;" alt="">
                                </div>
                                <div class="footer-brief">
                                    <p>Television all in one place.</p>
                                </div>
                                <ul class="footer-social">
                                    <li>
                                        <a class="facebook" target="_blank" href="https://www.facebook.com/TvOutlet-106579068035942" title="Facebook"><i class="zmdi zmdi-facebook"></i></a>
                                    </li>
                                    <li>
                                    <h6 style="color: white;">Visit our facebook page</h6>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-2 hidden-md hidden-sm">
                            <div class="single-footer">
                                <h4 class="footer-title border-left">Shop</h4>
                                <ul class="footer-menu">
                                    <li>
                                        <a href="index.php"><i class="zmdi zmdi-circle"></i><span>Home</span></a>
                                    </li>
                                    <li>
                                        <a href="shop.php"><i class="zmdi zmdi-circle"></i><span>Shop</span></a>
                                    </li>
                                    <li>
                                        <a href="blog.php"><i class="zmdi zmdi-circle"></i><span>Blog</span></a>
                                    </li>
                                    <li>
                                        <a href="index.php"><i class="zmdi zmdi-circle"></i><span>Popular
                                                Products</span></a>
                                    </li>
                                    <li>
                                        <a href="index.php"><i class="zmdi zmdi-circle"></i><span>Best Sellers</span></a>
                                    </li>
                                    <li>
                                        <a href="index.php"><i class="zmdi zmdi-circle"></i><span>New Products</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-4">
                            <div class="single-footer">
                                <h4 class="footer-title border-left">my account</h4>
                                <ul class="footer-menu">
                                    <li>
                                        <a href="login.php"><i class="zmdi zmdi-circle"></i><span>Log in</span></a>
                                    </li>
                                    <li>
                                        <a href="register.php"><i class="zmdi zmdi-circle"></i><span>Register</span></a>
                                    </li>
                                    <li>
                                        <a href="cart.php"><i class="zmdi zmdi-circle"></i><span>My
                                                Cart</span></a>
                                    </li>
                                    <li>
                                        <a href="login.html"><i class="zmdi zmdi-circle"></i><span>Sign
                                                In</span></a>
                                    </li>
                                    <li>
                                        <a href="login.html"><i class="zmdi zmdi-circle"></i><span>Registration</span></a>
                                    </li>
                                    <li>
                                        <a href="checkout.html"><i class="zmdi zmdi-circle"></i><span>Check
                                                out</span></a>
                                    </li>
                                    <li>
                                        <a href="order.html"><i class="zmdi zmdi-circle"></i><span>Oder
                                                Complete</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="single-footer">
                                <h4 class="footer-title border-left">Newsletter</h4>
                                <div class="footer-message">
                                    <?php $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
                                    <form action="<?php echo $actual_link; ?>" method="POST">
                                        <p>Enter your email address to know more about our latest offers</p>
                                        <input type="text" name="email" placeholder="Your email here..." required>
                                        <button class="submit-btn-1 mt-20 btn-hover-1" type="submit" name="subscribe">Subscribe</button>
                                    </form>
                                    <?php
                                    if (isset($_POST['subscribe'])) {
                                        $emailaddress = $_POST['email'];

                                        $sql_check_email = "SELECT * FROM emaillisttbl WHERE emailaddress = '$emailaddress';";
                                        $res_sql_check = mysqli_query($conn, $sql_check_email);
                                        if (mysqli_num_rows($res_sql_check) > 0) { ?>
                                            <script>
                                                Swal.fire({
                                                    icon: 'info',
                                                    title: 'Already subscribed!',
                                                    text: 'Thank you but youre already part of our newsletter!',
                                                    confirmButton: false
                                                    // confirmButtonText: 'Try again',
                                                    // confirmButtonColor: '#FF7F00'
                                                })
                                            </script>
                                            <?php } else {
                                            $sql_subscribe = "INSERT INTO emaillisttbl (emailaddress) VALUES ('$emailaddress');";
                                            $res_subscribe = mysqli_query($conn, $sql_subscribe);
                                            if ($res_subscribe) { ?>
                                                <script>
                                                    Swal.fire({
                                                        icon: 'success',
                                                        title: 'Subscribed',
                                                        text: 'Thank you for subscribing to our newsletter!',
                                                        confirmButton: false
                                                        // confirmButtonText: 'Try again',
                                                        // confirmButtonColor: '#FF7F00'
                                                    })
                                                </script>
                                    <?php }
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
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