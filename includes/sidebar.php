<?php
include('connection.php');
if (!isset($_SESSION)) {
    session_start();
}

$AdminID = $_SESSION['AdminID'];
$sql = "SELECT * FROM `adminaccounttbl` as a JOIN roletbl as r ON a.RoleID = r.RoleID WHERE AdminId = '$AdminID';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
<aside class="main-sidebar sidebar-light-primary elevation-2">
    <!-- Brand Logo -->
    <a href="adminIndex.html" class="brand-link">
        <img src="tvOutletIcon.png" alt="AdminLTE Logo" class="brand-image">
        <span class="brand-text font-weight-light">tvOutlet Admin</span>
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
                    <a href="adminindex.php" class="nav-link <?php echo ($page == "adminindex" ? "active" : "") ?>">
                        <i class="nav-icon fas fa-tachometer-alt "></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cart-arrow-down"></i>
                        <p>
                            Orders
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cash-register"></i>
                        <p>
                            Sales
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="" class="nav-link ">
                        <i class="nav-icon fas fa-tv"></i>
                        <p>
                            Products
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="productView.html" class="nav-link">
                                <i class="fas fa-table nav-icon"></i>
                                <p>View Products</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="productAdd.html" class="nav-link">
                                <i class="far fa-plus-square nav-icon"></i>
                                <p>Add Product</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-box-open"></i>
                        <p>
                            Stock Control
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-pallet nav-icon"></i>
                                <p>Update stock</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-table nav-icon"></i>
                                <p>View Stocks</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Customers
                        </p>
                    </a>
                </li>
                <li class="nav-header">Maintenance</li>
                <li class="nav-item">
                    <a href="banners.html" class="nav-link">
                        <i class="nav-icon fas fa-sliders-h"></i>
                        <p>
                            Home Banner/Slider
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="manufacturer.php" class="nav-link  <?php echo ($page == "manufacturer" ? "active" : "") ?>">
                        <i class="nav-icon fas fa-store"></i>
                        <p>
                            Manufacturers
                        </p>
                    </a>
                </li>
                <!-- <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-store"></i>
                                <p>
                                    Manufacturers
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-table nav-icon"></i>
                                        <p>View Manufacturers</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-plus-square nav-icon"></i>
                                        <p>Add Manufacturer/Brand</p>
                                    </a>
                                </li>
                            </ul>
                        </li> -->
                <li class="nav-item">
                    <a href="screentech.php" class="nav-link <?php echo ($page == "screentech" ? "active" : "") ?>">
                        <i class="nav-icon fas fa-desktop"></i>
                        <p>
                            Screen Technology
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="additionalfeature.php" class="nav-link <?php echo ($page == "additionalfeature" ? "active" : "") ?>">
                        <i class="nav-icon fas fa-memory"></i>
                        <p>
                            Additional Features
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