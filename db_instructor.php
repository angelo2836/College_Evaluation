<?php


$conn = mysqli_connect('localhost:3306', 'root', '','evaluation');
$sql = "SELECT * FROM ";
$retval = mysqli_query($conn, $sql);

if(mysqli_num_rows($retval) > 0)
{  
  while($row = mysqli_fetch_assoc($retval))
  {   
    $instructor_name = $row['instructor'];
  }
}

?>
