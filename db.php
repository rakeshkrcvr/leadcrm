<?php
// --------------------
// DATABASE CONNECTION
// --------------------

$host = "localhost";
$user = "root";
$pass = "";
$db   = "crm_system";

// Create connection
$conn = mysqli_connect($host, $user, $pass, $db);

// Check connection
if (!$conn) {
    die("Database Connection Failed: " . mysqli_connect_error());
}

// Set charset
mysqli_set_charset($conn, "utf8");
