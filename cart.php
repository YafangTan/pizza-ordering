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

$addItem = array('quantity' => $quantity, 'item' => $item, 'price' => $price, 'size' => $size);

$_SESSION["cart"][] = $addItem;

flash("flash", "Added to cart");

redirect("index.php");


?>