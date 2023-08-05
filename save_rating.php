<?php

$ins_id = $_POST['ins_id'];

for($n=1;$n<38;$n++)
{
    $title = "title_".$n;
    echo $rating = $_POST["$title"];
    $conn = mysqli_connect('localhost:3306', 'root', '','evaluation');
    echo $sql = "INSERT INTO rating VALUES ('','$ins_id','$n','$rating')";
    mysqli_query($conn, $sql);
      
   
}


?>