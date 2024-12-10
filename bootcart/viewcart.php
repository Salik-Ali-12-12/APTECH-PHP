<?php

include('config.php');

$result = $connection->query("
    SELECT bootcart.id, bootproducts.name, bootproducts.price, bootcart.quantity 
    FROM bootcart 
    JOIN bootproducts ON bootcart.products_id = bootproducts.id
");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Cart</title>
</head>
<body>
<div class="container">
    <h1 class="mt-4">Your Cart</h1>
    <?php if ($result-> num_rows > 0) { ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $total = 0;
            while ($row = $result->fetch_assoc()) {
                $subtotal = $row['price'] * $row['quantity'];
                $total += $subtotal;
            ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td>$<?php echo $row['price']; ?></td>
                <td><?php echo $row['quantity']; ?></td>
                <td>$<?php echo number_format($subtotal, 2); ?></td>
            </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">Total</th>
                <th>$<?php echo number_format($total, 2); ?></th>
            </tr>
        </tfoot>
    </table>
    <?php } else { ?>
        <p>Your cart is empty.</p>
    <?php } ?>
</div>
</body>
</html>
<?php
$connection->close();
?>