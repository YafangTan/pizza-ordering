<?php	
$title = "Home";
require("header.php");

//Link to a category page
//(maybe in the future make expandables...)
foreach ($categories as $category) {
	print "<a href=\"category.php?category=$category\">".$menu[$category]["display"]."</a>";
	print "<br />";
}

require("footer.php");
?>