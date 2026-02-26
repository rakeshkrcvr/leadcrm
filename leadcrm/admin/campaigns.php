<?php
include 'auth.php';
include '../db.php';

if ($_SESSION['role'] != 'super_admin') {
    die("Access Denied");
}

if ($_POST) {
    mysqli_query($conn,"
    INSERT INTO campaigns (customer_id,name,code,source,status)
    VALUES ('$_POST[cid]','$_POST[name]','$_POST[code]','$_POST[source]','Active')
    ");
}
?>

<form method="post">
<select name="cid">
<?php
$c=mysqli_query($conn,"SELECT * FROM customers");
while($r=mysqli_fetch_assoc($c)):
?>
<option value="<?= $r['id'] ?>"><?= $r['name'] ?></option>
<?php endwhile; ?>
</select><br><br>

<input name="name" placeholder="Campaign Name"><br>
<input name="code" placeholder="Code"><br>
<input name="source" placeholder="Source"><br>
<button>Add Campaign</button>
</form>
