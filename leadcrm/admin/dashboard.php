<?php
/*************************************************
 * admin/dashboard.php
 * ROLE BASED DASHBOARD
 * Super Admin & Customer Admin
 *************************************************/

session_start();

/* ---------------- AUTH CHECK ---------------- */
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

/* ---------------- DB ---------------- */
require_once __DIR__ . "/../db.php";

/* ---------------- SESSION DATA ---------------- */
$user_id     = $_SESSION['user_id'];
$name        = $_SESSION['name'] ?? 'User';
$role        = $_SESSION['role'] ?? '';
$customer_id = $_SESSION['customer_id'] ?? null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Dashboard - LeadCRM</title>

<style>
/* ---------------- BASIC RESET ---------------- */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* ---------------- BODY ---------------- */
body {
    font-family: Arial, Helvetica, sans-serif;
    background: #f4f6f9;
    color: #333;
}

/* ---------------- LAYOUT ---------------- */
.container {
    width: 100%;
    max-width: 1200px;
    margin: auto;
    padding: 20px;
}

/* ---------------- HEADER ---------------- */
.header {
    background: #ffffff;
    padding: 20px;
    border-radius: 6px;
    margin-bottom: 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.header h2 {
    font-size: 24px;
}

.nav a {
    margin-left: 15px;
    text-decoration: none;
    font-weight: bold;
    color: #0066cc;
}

.nav a:hover {
    text-decoration: underline;
}

/* ---------------- BOX ---------------- */
.box {
    background: #ffffff;
    padding: 20px;
    border-radius: 6px;
    margin-bottom: 20px;
}

/* ---------------- GRID ---------------- */
.grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 20px;
}

/* ---------------- CARD ---------------- */
.card {
    border: 1px solid #ddd;
    padding: 20px;
    border-radius: 6px;
    background: #fafafa;
}

.card h4 {
    margin-bottom: 10px;
}

.card a {
    display: inline-block;
    margin-top: 10px;
    text-decoration: none;
    color: #fff;
    background: #0066cc;
    padding: 8px 12px;
    border-radius: 4px;
    font-size: 14px;
}

.card a:hover {
    background: #004999;
}

/* ---------------- FOOTER ---------------- */
.footer {
    text-align: center;
    font-size: 13px;
    color: #777;
    margin-top: 40px;
}
</style>
</head>

<body>

<div class="container">

    <!-- ================= HEADER ================= -->
    <div class="header">
        <h2>Welcome, <?php echo htmlspecialchars($name); ?></h2>

        <div class="nav">
            <a href="dashboard.php">Dashboard</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>

    <!-- ================= SUPER ADMIN ================= -->
    <?php if ($role === 'super_admin'): ?>

        <div class="box">
            <h3>Super Admin Panel</h3>
            <p>You have full access to campaigns and leads.</p>
        </div>

        <div class="grid">

            <div class="card">
                <h4>Campaigns</h4>
                <p>Create and manage all campaigns.</p>
                <a href="campaigns.php">Manage Campaigns</a>
            </div>

            <div class="card">
                <h4>Leads</h4>
                <p>View all incoming leads.</p>
                <a href="leads.php">View Leads</a>
            </div>

            <div class="card">
                <h4>System Info</h4>
                <p>Logged in as Super Admin.</p>
            </div>

        </div>

    <!-- ================= CUSTOMER ADMIN ================= -->
    <?php elseif ($role === 'customer_admin'): ?>

        <div class="box">
            <h3>Customer Dashboard</h3>
            <p>You can view your campaigns and leads only.</p>
        </div>

        <div class="grid">

            <div class="card">
                <h4>My Campaigns</h4>
                <p>View campaigns assigned to you.</p>
                <a href="campaigns.php">View Campaigns</a>
            </div>

            <div class="card">
                <h4>My Leads</h4>
                <p>View leads generated from your campaigns.</p>
                <a href="leads.php">View Leads</a>
            </div>

            <div class="card">
                <h4>Account</h4>
                <p>Customer access only.</p>
            </div>

        </div>

    <!-- ================= INVALID ROLE ================= -->
    <?php else: ?>

        <div class="box">
            <p style="color:red; font-weight:bold;">
                Invalid role detected. Please contact administrator.
            </p>
        </div>

    <?php endif; ?>

    <!-- ================= FOOTER ================= -->
    <div class="footer">
        © <?php echo date("Y"); ?> LeadCRM. All rights reserved.
    </div>

</div>

</body>
</html>
