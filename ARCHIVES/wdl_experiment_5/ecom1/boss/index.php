<?php
require('connection.inc.php');
require('functions.inc.php');

if (isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN'] != '') {
} else {
	header('location:bossandar.php');
	die();
}
if (isset($_GET['type']) && $_GET['type'] != '') {
	$type = get_safe_value($con, $_GET['type']);
	if ($type == 'status') {
		$operation = get_safe_value($con, $_GET['operation']);
		$id = get_safe_value($con, $_GET['id']);
		if ($operation == 'active') {
			$status = '1';
		} else {
			$status = '0';
		}
		$update_status_sql = "update product set status='$status' where id='$id'";
		mysqli_query($con, $update_status_sql);
	}

	if ($type == 'delete') {
		$id = get_safe_value($con, $_GET['id']);
		$delete_sql = "delete from product where id='$id'";
		mysqli_query($con, $delete_sql);
	}
}

$sql = "select product.* from product order by product.id desc";
$res = mysqli_query($con, $sql);
?>


<?php require('bossnav.php');?>


	<table style="width: 100%;">
		<tr>
			<th>IMAGES</th>
			<th>TITLE</th>
			<th>MRP</th>
			<th>STOCK</th>
			<th>DETAIL</th>
			<th>ACTIVATION</th>
			<th>EDIT</th>
			<th>DELETE</th>
		</tr><?php
				$i = 1;
				while ($row = mysqli_fetch_assoc($res)) {
				?><tr>
				<td><img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $row['image'] ?>" alt="product images" style="width: 60px;"></td>
				<td>
					<h5><?php echo $row['name'] ?></h5>
				</td>
				<td>
					<H4><?php echo "₹";
						echo  $row['mrp'] ?></H4>
				</td>
				<td><?php echo $row['qty'] ?></td>
				<td style="width: 30%;"><?php echo "DETAIL : ";
										echo $row['description'] ?></td>
				<td><?php if ($row['status'] == 1) {
						echo "<span ><a href='?type=status&operation=deactive&id=" . $row['id'] . "'>Active</a></span>&nbsp;";
					} else {
						echo "<span ><a href='?type=status&operation=active&id=" . $row['id'] . "'>Deactive</a></span>&nbsp;";
					}           ?></td>
				<td><?php
					echo "<span ><a href='product.php?id=" . $row['id'] . "'>Edit</a></span>&nbsp;";
					?></td>
				<td><?php
					echo "<span ><a href='?type=delete&id=" . $row['id'] . "'>Delete</a></span>";
					?></td>
				<td></td>
			</tr><?php } ?>
	</table>
	<div class="footer">
		<p>Copyright© <a href="http://vinaypanchal.com/">VINAY PANCHAL</a>All right reserved.</p>
	</div>
	<script src="bs.js"></script>
</body>

</html>