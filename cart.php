<?php
require("helpers.php");

session_start();

//if form not submitted, redirect to index
if (isset($_POST["action"]) != 1)
{
	flash("flash", "No item selected");
	redirect("index.php");
}

extract($_POST);

//removing from cart
if ($_POST["action"] == "remove")
{
	for ($i = 0; $i < count($_SESSION["cart"]); $i++) {
		if ($item == $_SESSION["cart"][$i]["item"] && $size == $_SESSION["cart"][$i]["size"])
		{
			$_SESSION["cart"][$i]["quantity"] = 0;
			flash("flash", "Removed item");
			redirect("index.php");
		}
	}
	flash("flash", "Item not found");
	redirect("index.php");
}

//check to see if submitted item is already in cart
for ($i = 0; $i < count($_SESSION["cart"]); $i++) {
	if ($item == $_SESSION["cart"][$i]["item"] && $size == $_SESSION["cart"][$i]["size"])
	{
		//update quantity
		$_SESSION["cart"][$i]["quantity"] = $quantity;
		flash("flash", "Updated Quantity");
		redirect("index.php");
	}
}

//item was not found in cart, add it
$_SESSION["cart"][] = $_POST;

flash("flash", "Added to cart");

redirect("index.php");

?>