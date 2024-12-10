<?php
include('config.php');
if($_SERVER["REQUEST_METHOD"] == "POST"){

 $car_name = $_POST['car_name'];
 $car_model = $_POST['car_model'];
 $car_description = $_POST['car_description'];

 $target_dir = "upload/";
 $target_file = $target_dir . basename($_FILES["car_img"]["name"]);
 move_uploaded_file($_FILES["car_img"]["tmp_name"],$target_file);

 $sql = "INSERT INTO cards (car_name, car_model, car_description, car_img) VALUES ('$car_name', '$car_model', '$car_description', '$target_file')";

 if($connection -> query($sql) === TRUE){
  echo "New record created successfully";
 }else {
  echo "Error: " . $sql . "<br>" . $connection->error;
 }

}

?>

<form method="POST" action="create.php"  enctype="multipart/form-data">
 Car_name: <input type="text" name="car_name" required></br></br>
 Car_model: <input type="text" name="car_model" required></br></br>
 description: <input type="text" name="car_description" required></br></br>
 Car_Image: <input type="file" name="car_img" required></br></br>
 <input type="submit" value="Create">
</form> 