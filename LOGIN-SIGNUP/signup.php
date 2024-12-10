<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <!-- <link rel="stylesheet" href="signup.css"> -->
 <title>Document</title>
</head>
<body>
 
<div class="form_container">
 <h2>Sign_up page</h2>
 <form action="signup.php" method="POST">
  <input type ="text" name ="username" placeholder ="username" required></br></br>
  <input type ="email" name ="email" placeholder ="E-mail" required></br></br>
  <input type="tel" name="cnic" placeholder="CNIC" required></br></br>
  <input type ="password" name ="password" placeholder ="Password" required></br></br>
  <button type = "sumbit">SignUp</button>
 </form>
</div>


<?php

include('config.php');
if($_SERVER["REQUEST_METHOD"] == "POST"){

$username = $_POST ['username'];
$email = $_POST ['email'];
$cnic = $_POST ['cnic'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "INSERT INTO signup (username, email, passwordd, cnic) VALUES ('$username', '$email', '$password', '$cnic')";

if($connection -> query($sql) === TRUE){
 echo "New recoed created successfully";
}else{
 echo "Error" . $sql . "<br>" . connect->error;
}
}
$connection -> close();
?>
</body>
</html>