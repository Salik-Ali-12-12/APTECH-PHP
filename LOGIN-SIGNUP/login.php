<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <title>LOGIN</title>
</head>

<body>

    <div class="form_container">
        <h2>Login Page</h2>
        <form action="" method="POST">
            <input type="text" name="username" placeholder="username" required></br></br>
            <input type="password" name="password" placeholder="Password" required></br></br>
            <button type="sumbit" name="sub">Login</button>
        </form>
    </div>

    <?php
 include('config.php');


 if(isset($_POST['sub'])){

$user=$_POST['username'];
$pass=$_POST['password'];

if(!empty($user) && !empty($pass)){

  $sql = "select * from signup where username = '$user'";

  $exe = mysqli_query($connection,$sql);
  if($exe){

    $row = mysqli_fetch_array($exe);

    $verifypass=password_verify($pass, $row['passwordd']);
    
    if($row['username'] == $user && $verifypass == true){

      if($row['role'] == "admin"){
        header("location:index.php");
      }

      if($row['username'] == $user && $verifypass == true){

        if($row['role'] == "manager"){
          header("location:manager.php");
        }

        elseif($row['role'] == "user"){
          header("location:user.php");
        }

        echo "Logged IN";
      }

      else{
        $error = "Invalid username or password";
      }

    }
    
    else{
      $error = "Enter fields first";
    }
  }
}


 }
?>
</body>

</html>