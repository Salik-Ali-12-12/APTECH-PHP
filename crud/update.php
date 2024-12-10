<?php

include('config.php');

if(isset($_GET['id'])) {

 $id = $_GET['id'];
 $sql = "select * from crud where id = $id";
 $result = $connection -> query($sql);
 $row = $result -> fetch_assoc();
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
 $id = $_POST['id'];
 $name = $_POST['name'];
 $email = $_POST['email'];
 $target_file = $_POST['existing_picture'];

 if(!empty($_FILES["profile_picture"]["name"])){
  $target_dir = "uploads/";
  $target_file = $target_dir .basename($_FILES["profile_picture"]["name"]);
  move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file);
 }

  $sql = "UPDATE crud SET name = '$name', email = '$email', profile_pic = '$target_file' WHERE id =$id";

  if($connection->query($sql) === TRUE){
   echo "Record updates Successfully";
   header("location:index.php");
  }else{
   echo "Error: " . $sql . "<br>" . $connection->error;
  }
$connection->close();
}

?>

<form action="update.php" method="POST" enctype="multipart/form-data">

 <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
 <input type="hidden" name="existing_picture" value="<?php echo['profile_picture']; ?>">

 Name: <input type="text" name="name" value="<?php echo $row['name']; ?>" required></br>
 Email: <input type="email" name="email" value="<?php echo $row['email']; ?>" required></br>
 Profile Picture: <input type="file" name="profile_picture"></br>
 <img src="<?php echo $row['profile_pic']; ?>" width = "100" height="100"><br>
 <input type="submit" value="Update">
 </form>