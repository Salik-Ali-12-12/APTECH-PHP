<?php

include('config.php');

if(isset($_GET['id'])) {
 $id = $_GET['id'];
 $sql = "select * from filter_img where id = $id";
 $result = $connection -> query($sql);
 $row = $result -> fetch_assoc();
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
 $id = $_POST['id'];
 $product_name = $_POST['product_name'];
 $category = $_POST['category'];
 $target_file = $_POST['existing_picture'];

 if(!empty($_FILES["product_img"]["name"])){
  $target_dir = "uploads/";
  $target_file = $target_dir .basename($_FILES["product_img"]["name"]);
  move_uploaded_file($_FILES["product_img"]["tmp_name"], $target_file);
 }

  $sql = "UPDATE filter_img SET product_name = '$product_name', category = '$category', product_img = '$target_file' WHERE id =$id";

  if($connection->query($sql) === TRUE){
   echo "Record updates Successfully";
   header("location:read.php");
  }else{
   echo "Error: " . $sql . "<br>" . $connection->error;
  }
$connection->close();
}




?>


<form action="upd.php" method="POST" enctype="multipart/form-data">

 <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
 <input type="hidden" name="existing_picture" value="<?php echo['product_img']; ?>">

 Product Name : <input type="text" name="product_name" value="<?php echo $row['product_name']; ?>" required></br>
 Category : <input type="email" name="category" value="<?php echo $row['category']; ?>" required></br>
 Product Image: <input type="file" name="product_img"></br>
 <img src="<?php echo $row['product_img']; ?>" width = "100" height="100"><br>
 <input type="submit" value="Update">
 </form>