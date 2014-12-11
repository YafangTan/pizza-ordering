<?php	

//do not display an empty shopping cart
$total_quantity = 0;
foreach ($_SESSION["cart"] as $item) $total_quantity += $item["quantity"];
if ($total_quantity != 0) { 

//there is a shopping cart: display it	?>
<h4>Shopping Cart:</h4>
<p>
	<table border="1">
		<strong>
		<tr>
			<td>Quantity</td>
			<td>Size</td>
			<td>Item</td>
			<td>Price</td>
			<td>Item Total</td>
		</tr>
		</strong>
		<form action="cart.php" method="post">
			<input type="hidden" name="action" value="add" />
		<?php foreach ($_SESSION["cart"] as $item) {
			if ($item["quantity"] != 0)
			{
				$quantity = $item["quantity"];
				$price = $item["price"];
				$item_total = $quantity * $price;
				$item_total = number_format($item_total, 2);
				print "<tr>";
				?>
					<td>
					<form method="post" action="cart.php">
						<input type="hidden" name="item" value="<?= $item['item'] ?>" />
						<input type="hidden" name="action" value="add" />
						<input type="hidden" name="size" value="<?= $item['size'] ?>" />
						<input type="submit" value="Update Qty" />
						<select name="quantity" default="<?= $quantity ?>">
							<option>0</option>
							<option <?php if ($quantity == 1) print "selected='selected'";?>>1</option>
							<option <?php if ($quantity == 2) print "selected='selected'";?>>2</option>
							<option <?php if ($quantity == 3) print "selected='selected'";?>>3</option>
							<option <?php if ($quantity == 4) print "selected='selected'";?>>4</option>
							<option <?php if ($quantity == 5) print "selected='selected'";?>>5</option>
							<option <?php if ($quantity == 6) print "selected='selected'";?>>6</option>
							<option <?php if ($quantity == 7) print "selected='selected'";?>>7</option>
							<option <?php if ($quantity == 8) print "selected='selected'";?>>8</option>
							<option <?php if ($quantity == 9) print "selected='selected'";?>>9</option>
						</select>
					</form>
					</td>
					<?php
					print "<td>".$item["size"]."</td>";
					print "<td>".$item["item"]."</td>";
					print "<td>$price</td>";
					print "<td>$item_total</td>";
					?>
					<td>
					<form method="post" action="cart.php">
						<input type="hidden" name="item" value="<?= $item['item'] ?>" />
						<input type="hidden" name="action" value="remove" />
						<input type="hidden" name="size" value="<?= $item['size'] ?>" />
						<input type="submit" value="Delete" />
					</td>
					<?php
				print "</tr>";
				$total += $item_total;
			}
		}
		$total = number_format($total, 2);
		?>
	</table>
	<strong>Total: <?= $total ?></strong>
</p>
<?php } ?>
</body>
</html>