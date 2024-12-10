<?php
$connection = new mysqli ("localhost","root","","salik12");

if ($connection -> connect_error){
die ("Connection failed : " . $connection -> connect_error);

};
?>