<?php
include 'auth.php';
include '../db.php';

if ($_SESSION['role'] == 'super_admin') {
    $q = mysqli_query($conn,"
    SELECT l.*, c.name cname
    FROM leads l
    JOIN campaigns c ON c.id=l.campaign_id
    ");
} else {
    $cid = $_SESSION['customer_id'];
    $q = mysqli_query($conn,"
    SELECT l.*, c.name cname
    FROM leads l
    JOIN campaigns c ON c.id=l.campaign_id
    WHERE c.customer_id='$cid'
    ");
}
?>

<table border="1">
<tr><th>Name</th><th>Email</th><th>Mobile</th><th>Campaign</th></tr>
<?php while($r=mysqli_fetch_assoc($q)): ?>
<tr>
<td><?= $r['name'] ?></td>
<td><?= $r['email'] ?></td>
<td><?= $r['mobile'] ?></td>
<td><?= $r['cname'] ?></td>
</tr>
<?php endwhile; ?>
</table>
