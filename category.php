<?php

require("header.php");

$category = $menu[$_REQUEST["category"]];
$items = $category["item"];
?>

<h1><?= $category["display"] ?></h1>

<ul>

<?php 

//there are many items in this category
if ($items[0]) {
	foreach ($items as $item){
		print "<li>".$item['name'];
		if ($item["description"]) { print ": <i>".$item["description"]."</i>"; }
		print "</li>";
		print "<ul>";

		foreach ($item["sizes"] as $size => $price) {
			print	"<li>$size : \$$price</li>";
		}
		print "</ul>";
	}

//there is only one item in this category
} else {

	print "<li>".$items["name"]."</li>";
	print "<ul>";
		foreach ($items["sizes"] as $size => $price) {	
			print "<li>$size: \$$price</li>";
		}
	print "</ul>";
}
print "</ul>";
require("footer.php");