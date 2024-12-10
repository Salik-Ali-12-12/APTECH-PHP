<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>SiGN_UP PAGE</title>
</head>
<body>
 
 <div class="form_container">
  <h2>Sign_up Page</h2>
  <form action="signup.php" method="POST">

  <input type="text" name="username" placeholder="Enter Your Name" required></br></br>
  <input type="email" name="email" placeholder="Enter Your Mail" required></br></br>
  <input type="password" name="password" placeholder="Enter Your Password" required></br></br>
  <button type="submit">Signup</button>
 </form>
 </div>

 <?php

 include('config.php');
 if($_SERVER["REQUEST_METHOD"] == "POST"){

  $user = $_POST ['username'];
  $mail = $_POST ['email'];
  $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $sql = "INSERT INTO classtest (user_name, user_mail, user_password) VALUES ('$user', '$mail', '$pass')";

  if($connection -> query($sql) === TRUE){
   echo "New Record Created Successfully";
  }else{
   echo "ERROR" . $sql . "<br>" . connect->error;
  }
 }
 $connection -> close();
 ?>
</body>
</html>