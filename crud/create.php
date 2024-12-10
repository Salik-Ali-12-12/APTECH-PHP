<?php
include('config.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){
 $name = $_POST['name'];
 $email = $_POST['email'];

 //picture uploading method
 $target_dir = "uploads/";
 $target_file = $target_dir . basename($_FILES["profile_picture"]["name"]);  //uploads/salik.png
 move_uploaded_file($_FILES["profile_picture"]["tmp_name"],$target_file);

 $sql = "INSERT INTO crud (name, email, profile_pic) VALUES ('$name', '$email', '$target_file')";

 if($connection -> query($sql) === TRUE){
  echo "New record created successfully";
 } else {
  echo "Error: " . $sql . "<br>" . $connection->error;
 }

}

$connection->close();

?>

<form method="POST" action="create.php"  enctype="multipart/form-data">
 Name: <input type="text" name="name" required></br></br>
 Email: <input type="email" name="email" required></br></br>
 Profile Picture: <input type="file" name="profile_picture" required></br></br>
 <input type="submit" value="Create">
</form> 