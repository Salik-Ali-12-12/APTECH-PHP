<?php

session_start();
$mysqli = new mysqli("localhost", "root", "", "salik12");

if(isset($_GET['action']) && $_GET['action'] == 'add') {

 $id = $_GET['id'];
 $query = "Select * From products Where id = $id";
 $result = $mysqli->query($query);
 $product = $result->fetch_assoc();

 if($product){
  $cartItem = [
   'id' => $product['id'],
   'name' => $product['name'],
   'price' => $product['price'],
   'quantity' => 1
  ];

  if(isset($_SESSION['cart'][$id])){
   $_SESSION['cart'][$id]['quantity']++;
  }else{
   $_SESSION['cart'][$id] = $cartItem;
  }
 }

 header("Location: cart.php");
 exit;
}
 if(isset($_GET['action']) && $_GET['action'] == 'remove'){
  $id = $_GET['id'];
  unset($_SESSION['cart'][$id]);

  header("Location: cart.php");
  exit;
 }

 $cartItems = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>CART</title>
</head>
<body>
  <h1>Shopping Cart</h1>
  <ul>
        <?php if (!empty($cartItems)) : ?> 
            <?php foreach ($cartItems as $item) : ?> 
                <li>
                    <?= htmlspecialchars($item['name']) ?> - $<?= number_format($item['price'], 2) ?> x <?= $item['quantity'] ?>
                    <a href="cart.php?action=remove&id=<?= $item['id'] ?>">Remove</a>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>Your Cart is empty!</li>
        <?php endif; ?>
    </ul>
  <a href="index.php">Continue Shopping</a>
</body>
</html>