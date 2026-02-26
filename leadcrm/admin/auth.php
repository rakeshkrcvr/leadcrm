<?php
// --------------------
// AUTH CHECK FILE
// --------------------

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// If user not logged in → redirect to login
if (!isset($_SESSION['user_id'])) {
    header("Location: /leadcrm/admin/login.php");
    exit;
}

// Optional: role-based protection helper
function require_role($allowed_roles = []) {
    if (!in_array($_SESSION['role'], $allowed_roles)) {
        echo "<h3>Access Denied</h3>";
        exit;
    }
}
