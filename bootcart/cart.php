<?php
// Database connection
include('config.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$product_id = intval($_POST['product_id']);
$quantity = intval($_POST['quantity']);



$result = $connection->query("SELECT * FROM bootcart WHERE products_id = $product_id");

if ($result->num_rows > 0) {

$connection->query("UPDATE bootcart SET quantity = quantity + $quantity WHERE products_id = $product_id");
} else {


}

$connection->query("INSERT INTO bootcart (products_id, quantity) VALUES ($product_id, $quantity)");

}

header("Location: products.php?success=1");

$connection->close();
?>