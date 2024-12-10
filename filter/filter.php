<?php 

$connection = new mysqli ("localhost","root","","salik12");

if ($connection -> connect_error){
die ("Connection failed : " . $connection -> connect_error);

};


$category = isset($_GET['category']) ? $_GET['category'] : '';

$sql = "select * from filters";

if($category) {
 $sql .= " where category = '$category'";
}

$result = $connection->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
 <title>Products Filter</title>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Product Filter</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="filter.php">All Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="filter.php?category=category 1">Category 1</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="filter.php?category=category 2">Category 2</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="filter.php?category=category 3">Category 3</a>
        </li>
      </ul>
    </div>
  </div>
</nav>



 <div class="container mt-4">
   <div class="row">
    <?php if($result->num_rows > 0) :?>
    <?php while($row = $result->fetch_assoc()) : ?>
     <div class="col-md-4 mb-3">
      <div class="card">
       <div class="card-body">
        <h5 class="card-title"><?php echo $row['product_name']; ?></h5>
        <p class="card-text">Category:<?php echo $row['category']; ?></p>
       </div>
      </div>
     </div>
     <?php endwhile; ?>
        <?php else: ?>
            <p>No products found in this category.</p>
        <?php endif; ?>

   </div>
 </div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>?
</body>
</html>
<?php 
$connection->close();
?>