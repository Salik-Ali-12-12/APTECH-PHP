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
   'car_img' => $product['car_img'],
   'car_name' => $product['car_name'],
   'car_model' => $product['car_model'],
   'quantity' => 1
  ];

  if(isset($_SESSION['cart'][$id])){
   $_SESSION['cart'][$id]['quantity']++;
  }else{
   $_SESSION['cart'][$id] = $cartItem;
  }
 }

 header("Location: addtocart.php");
 exit;
}
 if(isset($_GET['action']) && $_GET['action'] == 'remove'){
  $id = $_GET['id'];
  unset($_SESSION['cart'][$id]);

  header("Location: addtocart.php");
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
  <ol type="1">
        <?php if (!empty($cartItems)) : ?> 
            <?php foreach ($cartItems as $item) : ?> 
                <li>
                 <img src="<?= htmlspecialchars($item['car_img']) ?>" alt="<?= htmlspecialchars($item['car_name']) ?>" style="width:200px;height:auto;"><br>
                   Car_name = <?=($item['car_name']) ?> <br> 
                   Car_model = <?= ($item['car_model']) ?> x <?= $item['quantity'] ?>
                    <a href="addtocart.php?action=remove&id=<?= $item['id'] ?>">Remove</a><br><br>
                </li>
            <?php endforeach; ?>
            <?php else: ?>
                <ul>
            <li>Your Cart is empty!</li>
            </ul>
        <?php endif; ?>
    </ol>
  <a href="index.php">Continue Shopping</a>
</body>
</html>