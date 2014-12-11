<?php	

$title = "Home";

require("helpers.php");
require("header.php");

print "<h1>Two Aces</h1>";

//Flash message if there is one
flash("flash");
print "<p>";

//Link to a category page
//(maybe in the future make expandables...)
foreach ($categories as $category) 
{
	print "<a href=\"category.php?category=$category\">".$menu[$category]["display"]."</a>";
	print "<br />";
}

print "</p>";
require("footer.php");

?>