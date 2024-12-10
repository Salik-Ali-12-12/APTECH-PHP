<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>LOGIN</title>
</head>
<body>

 <div class="form_container">
  <h2>LOGIN PAGE</h2>
 <form action="login.php" method="POST">

  <input type ="text" name ="username" placeholder ="username" required></br></br>
  <input type ="password" name ="password" placeholder ="Password" required></br></br>
  <button type = "sumbit" name = "sub">Login</button>
 </form>
 </div>

<?php

include('config.php');
if(isset($_POST['sub'])){

 $user = $_POST['username'];
 $pass = $_POST['password'];

 if(!empty($user) && ($pass)){

 $sql = "SELECT * FROM classtest WHERE user_name = '$user'";

  $exe = mysqli_query($connection, $sql);

  if($exe){

   $row = mysqli_fetch_array($exe);
   $verifyPass = password_verify($pass, $row['user_password']);

   if($row['user_name'] == $user && $verifyPass == true){
    if($row['role'] == "admin"){
     header("location:admin.php");
    }

    if($row['user_name'] == $user && $verifyPass == true){
     if($row['role'] == "manager"){
      header("location:manager.php");
     }
     elseif($row['role'] == "user"){
      header("location:user.php");
     }
     echo "Logged IN";
    }
    else{
     $error = "invalid username or password";
    }

   }
  }
  else{
   $error = "Enter Fields First";
  }
 }
}
?>
</body>
</html>