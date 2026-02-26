<?php
session_start();

if (!isset($_SESSION['role'])) {
    header("Location: admin/login.php");
    exit;
}

header("Location: admin/dashboard.php");
exit;
