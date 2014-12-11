
<?php
	session_start();
	
	if (file_exists("xml/menu.xml"))
	{
		//xml file to associative array
		//got this one line beauty from http://www.bookofzeus.com/articles/convert-simplexml-object-into-php-array/
		$menu = json_decode(json_encode((array) simplexml_load_file("xml/menu.xml")), 1);
	}
	else
	{
		print "Failed to load menu...";
	}

	//an array of categories
	$categories = array_keys($menu);
	if (isset($_REQUEST["category"])) 
	{
		$category = $menu[$_REQUEST["category"]];
		$title = $category["display"];
	}
?>

<!DOCTYPE html>
<head>
	<title><?= $title ?>@Two Aces</title>
</head>
<body>