<?php	if (!empty($_SESSION)) { ?>
<h4>Shopping Cart:</h4>
<p>
	<table border="1">
		<strong>
		<tr>
			<td>Item</td>
			<td>Quantity</td>
			<td>Price</td>
			<td>Item Total</td>
		</tr>
		</strong>
		<?php foreach ($_SESSION["cart"] as $item) {
			$quantity = $item["quantity"];
			$price = $item["price"];
			$item_total = $quantity * $price;
			$item_total = number_format($item_total, 2);
			print "<tr>";
				print "<td>".$item["item"]."</td>";
				print "<td>$quantity</td>";
				print "<td>$price</td>";
				print "<td>$item_total</td>";
			print "</tr>";
			$total += $item_total;
		}
		$total = number_format($total, 2);
		?>
	</table>
	<strong>Total: <?= $total ?></strong>
</p>
<?php } ?>
</body>
</html>