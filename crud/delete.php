<?php
include('config.php');

if(isset($_GET ['id'])) {

 $id = $_GET['id'];

 $sql = "Select profile_pic From crud Where id=$id";
 $result = $connection ->query($sql);
 $row = $result->fetch_assoc(); 
 $profile_picture = $row['profile_pic'];

$sql = "Delete From crud Where id=$id";

if($connection->query($sql) === TRUE){
 if(file_exists($profile_picture))
 {
  unlink($profile_picture);
 }
 echo "record deleted successfully";
}else{
 echo "Error: " . $sql . "<br>" .$connection->error;
}
$connection->close();
header("location:index.php");
}


?>