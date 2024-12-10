<?php
include('config.php');

if(isset($_GET ['id'])) {

 $id = $_GET['id'];

 $sql = "Select product_img From filter_img Where id=$id";
 $result = $connection ->query($sql);
 $row = $result->fetch_assoc(); 
 $product_img = $row['product_img'];

$sql = "Delete From filter_img Where id=$id";

if($connection->query($sql) === TRUE){
 if(file_exists($product_img))
 {
  unlink($product_img);
 }
 echo "record deleted successfully";
}else{
 echo "Error: " . $sql . "<br>" .$connection->error;
}
$connection->close();
header("location:read.php");
}


?>