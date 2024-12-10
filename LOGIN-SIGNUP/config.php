<?php 

// $servername = "localhost";
// $username = "root";
// $password = "";
// $db_name = "signup_page";

// $connection = new mysqli ("$servername ", "$username", "$password", "$db_name"); 

// if ($connection){
// echo ("Conntected");

// };

$connection = new mysqli ("localhost","root","","salik12");

if ($connection -> connect_error){
die ("Connection failed : " . $connection -> connect_error);

};





?>