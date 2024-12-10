<?php
include('config.php');

$result = $connection -> query("SELECT * FROM bootproducts");
if($result -> num_rows > 0) {

?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
 <title>Document</title>
</head>
<body>
 <div class="container">
  <h1 class="mt-4">Products</h1>
 <div class="row">
  <?php while($row = $result -> fetch_assoc()) {?>
  <div class="col-md-4">
   <div class="col-mb-4">
  <div class="card-body">
    <h5 class="card-title"><?php echo $row['name']; ?></h5>
    <p class="card-text"><?php echo $row['description']; ?></p>
    <p class="card-text">Price:<?php echo $row['price']; ?></p>
    <form action="cart.php" method="POST">
      <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
      <div class="input-group-mb-3">
        <input type="number" name="quantity" class="form-control" value="1" min="1">
        <button type="submit" class="btn btn-primary">ADD TO CART</button>
      </div>
    </form>
  </div>
</div>
   </div>
   <?php } ?>
  </div>

 </div>
 </div>
</body>
</html>
<?php
}
else{
  echo "No products available";
}
$connection->close();
?>