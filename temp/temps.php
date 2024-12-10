<?php

$connection = new mysqli ("localhost","root","","salik12");

if ($connection -> connect_error){
die ("Connection failed : " . $connection -> connect_error);

};


if($_SERVER["REQUEST_METHOD"] == "POST"){

    $name = $_POST ['username'];
    $email = $_POST ['usermail'];
    $password = password_hash($_POST['userpass'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO temp (user_name, user_mail, user_pass) VALUES ('$name', '$email', '$password')";

    if($connection -> query($sql) === TRUE){
        echo "New Record Created Successfully";
    }else{
        echo "Error" . $sql . "<br>" . connect->error;
    }
}

$connection->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Signup Website</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    <div class="container" id="container">

        <div class="form-container sign-up">
            <form action="temps.php" method="POST">
                <h1>Create Account</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-youtube"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-x-twitter"></i></a>
                </div>
                <span>or use your email for register</span>
                <input type="text" placeholder="Full Name" name="username" required>
                <input type="email" placeholder="Email" name="usermail" required>
                <input type="password" placeholder="Password" name="userpass" required>
                <button type="submit">Sign Up</button>
            </form>
        </div>

        <div class="form-container sign-in">
            <form action="" method="POST">
                <h1>Sign In</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-youtube"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-x-twitter"></i></a>
                </div>
                <span>or use your email and password</span>
                <input type="email" placeholder="Email" name="usermail1" required>
                <input type="password" placeholder="Password" name="userpass1" required>
                <a href="#">Forgot Password?</a>
                <button type = "sumbit" name = "log">Sign In</button>
            </form>
        </div>

        <div class="toggle-container">
            <div class="toggle">

                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features.</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>

                <div class="toggle-panel toggle-right">
                    <h1>Hello, Subscriber!</h1>
                    <p>Register with your personal details to use all of site features.</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script src="temp.js"></script>
</body>
</html>


<?php
$connection = new mysqli ("localhost","root","","salik12");

if ($connection -> connect_error){
die ("Connection failed : " . $connection -> connect_error);

};

if(isset($_POST['log'])){

    $ail=$_POST['usermail1'];
    $word=$_POST['userpass1'];
    
    if(!empty($ail) && !empty($word)){
    
      $sql = "select * from temp where user_mail = '$ail'";
    
      $exe = mysqli_query($connection,$sql);
      if($exe){
    
        $row = mysqli_fetch_array($exe);
    
        $verifypass=password_verify($password, $row['user_pass']);
    
        if($row['user_name'] == $ail && $verifypass == true){
    
          if($row['role'] == "admin"){
            header("location:index.php");
          }
    
          if($row['user_name'] == $ail && $verifypass == true){
    
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