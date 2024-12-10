<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "salik12");

$query = "Select * From products";
$result = $mysqli->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Products List</title>
</head>
<body>
 <h1>products</h1>
 <ul>

<?php while ($row = $result->fetch_assoc()) : ?> 
    <li>
        <b><?= htmlspecialchars($row['name']) ?></b> - $<?= number_format($row['price'], 2) ?>
        <a href="cart.php?action=add&id=<?= $row['id'] ?>">Add To Cart</a>
    </li>
<?php endwhile; ?>

</ul>
  <a href="cart.php">View cart</a>
</body>
</html>

