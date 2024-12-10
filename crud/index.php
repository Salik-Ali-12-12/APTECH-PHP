<?php

include('config.php');

$sql = "SELECT * FROM crud";
$result = $connection->query($sql);

if($result->num_rows > 0) {
 echo "<table border='1'><tr><th>ID</th><th>Name</th><th>Email</th><th>Profile Picture</th><th>Action</th></tr>";
 while($row = $result->fetch_assoc()){
  echo "<tr>
  <td>" . $row ["id"]. "</td>
  <td>" . $row ["name"]. "</td>
  <td>" . $row ["email"]. "</td>
  <td><img src='" .$row["profile_pic"]. "' width='100' height='100'></td>

  <td>
  <a href='update.php?id=" . $row["id"] . "'>Edit</a>  
  <a href='delete.php?id=" . $row["id"] . "'>Delete</a>  
  </td>
</tr>";
 }
echo"</table>";
}else{
 echo "0 results";
}
?>
<a href="create.php">Add New User </a>