<?php
$instructor_id = $_POST['instructor'];
$temp=0;

 
                    $conn = mysqli_connect('localhost:3306', 'root', '','evaluation');
                    $sql = "SELECT * FROM rating WHERE instructor_id=$instructor_id";
                    $retval = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($retval) > 0)
                    {  
                        while($row = mysqli_fetch_assoc($retval))
                        {   
                            
                            
                            if($temp==0)
                            {
                                $instructor_rating = $row['rating'];
                                $temp++;
                            }
                            else{
                            $instructor_rating =  $instructor_rating + $row['rating'];;
                            }

                            

                            
                        }
                    }

?>

<input type="text" value="<?php echo $instructor_rating;?>">