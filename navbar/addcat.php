<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Category</title>
</head>
<body>
 <form method="POST" action="addcat.php">
 <label for="category_name">category Name:</label></br></br>
 <input type="text" id="category_name" name="category_name" required></br></br>
 <input type="submit" value="Add Category">
 </form> 

 <?php
 include('config.php');
 if($_SERVER["REQUEST_METHOD"] == "POST"){
  $category_name = $_POST['category_name'];

  $sql = "INSERT INTO categ (category_name) VALUES ('$category_name')";

  if($connection -> query($sql) === TRUE){
   echo "New Category Added Successfully";
  } else {
   echo "Error: " . $sql . "<br>" . $connection -> error;
  }

 }
 ?>

</body>
</html>