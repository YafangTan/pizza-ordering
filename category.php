<?php

require("helpers.php");

//if no category, send them back home
if (isset($_GET["category"]) != 1 )
{
	redirect("index.php");
}

require("header.php");

//get the category and its items from the menu for ease of indexing
$category = $menu[$_REQUEST["category"]];
$items = $category["item"];

?>

<h1><?= $category["display"] ?></h1>

<ul>

<?php 

//there are many items in this category, so use 0-indexing
if ($items[0]) 
{
	foreach ($items as $item){
		print "<li>".$item['name'];
		if ($item["description"]) { print ": <i>".$item["description"]."</i>"; }
		print "</li>";
		print "<ul>";

		foreach ($item["sizes"] as $size => $price) 
		{
		?>
			<li>
				<form action="cart.php" method="post">
				<?= $size ?>: $<?= $price ?>   
					<input type="hidden" name="action" value="add" />
					Qty: <input type="text" name="quantity" size="2px" />
					<input type="hidden" name="item" value="<?= $item['name'] ?>">
					<input type="hidden" name="price" value="<?= $price ?>">
					<input type="hidden" name="size" value="<?= $size ?>">
					<input type="submit" value="Add to Cart" />
				</form>
			</li>
			<br />
		<?php
		}
		print "</ul>";
	}

//there is only one item in this category, use key to index
} else {

	print "<li>".$items["name"]."</li>";
	if ($items["description"]) { print ": <i>".$items["description"]."</i>"; }
	print "<ul>";
		foreach ($items["sizes"] as $size => $price) {	
			?>
			<li>
				<form action="cart.php" method="post">
				<?= $size ?>: $<?= $price ?>   
					<input type="hidden" name="action" value="add" />
					Qty: <input type="text" name="quantity" size="2px" />
					<input type="hidden" name="item" value="<?= $items['name'] ?>">
					<input type="hidden" name="price" value="<?= $price ?>">
					<input type="hidden" name="size" value="<?= $size ?>">
					<input type="submit" value="Add to Cart" />
				</form>
			</li>
			<br />
		<?php
		}
	print "</ul>";
}
print "</ul>";

require("footer.php");