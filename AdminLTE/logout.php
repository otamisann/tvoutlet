<?php
// unset($_SESSION['AdminID']);
session_destroy();

header('Location: adminLogin.php');