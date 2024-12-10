<?php
include('config.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){

 $product_name = $_POST['product_name'];
 $category = $_POST['category'];

 $target_dir = "upload/";
 $target_file = $target_dir . basename($_FILES["product_img"]["name"]);
 move_uploaded_file($_FILES["product_img"]["tmp_name"],$target_file);

 $sql = "INSERT INTO filter_img (product_name, category, product_img) VALUES ('$product_name', '$category', '$target_file')";

 if($connection -> query($sql) === TRUE){
  echo "New record created successfully";
 }else {
  echo "Error: " . $sql . "<br>" . $connection->error;
 }

}

?>

<form method="POST" action="cre.php"  enctype="multipart/form-data">
 Product Name: <input type="text" name="product_name" required></br></br>
 Category: <input type="text" name="category" required></br></br>
 Product Image: <input type="file" name="product_img" required></br></br>
 <input type="submit" value="Create">
</form> 