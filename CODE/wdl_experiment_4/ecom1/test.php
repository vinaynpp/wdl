<table class="table ">
		<thead>
			<tr>
				<th class="serial">#</th>
				<th>ID</th>
				<th>Categories</th>
				<th>Name</th>
				<th>Image</th>
				<th>MRP</th>
				<th>Price</th>
				<th>Qty</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php
			$i = 1;
			while ($row = mysqli_fetch_assoc($res)) { ?>
				<tr>
					<td class="serial"><?php echo $i ?></td>
					<td><?php echo $row['id'] ?></td>

					<td><?php echo $row['name'] ?></td>
					<td><img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $row['image'] ?>" /></td>
					<td><?php echo $row['mrp'] ?></td>

					<td><?php echo $row['qty'] ?></td>
					<td>
						<?php
						if ($row['status'] == 1) {
							echo "<span ><a href='?type=status&operation=deactive&id=" . $row['id'] . "'>Active</a></span>&nbsp;";
						} else {
							echo "<span ><a href='?type=status&operation=active&id=" . $row['id'] . "'>Deactive</a></span>&nbsp;";
						}
						echo "<span ><a href='product.php?id=" . $row['id'] . "'>Edit</a></span>&nbsp;";

						echo "<span ><a href='?type=delete&id=" . $row['id'] . "'>Delete</a></span>";

						?>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
