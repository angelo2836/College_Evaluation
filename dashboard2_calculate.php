<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="reports.php" method="POST">
        <label for="instructor">Instructor:</label>
        <select name="instructor" id="instructor">

                <?php    
                    $conn = mysqli_connect('localhost:3306', 'root', '','evaluation');
                    $sql = "SELECT * FROM instructor ";
                    $retval = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($retval) > 0)
                    {  
                        while($row = mysqli_fetch_assoc($retval))
                        {   
                            $ins_id = $row['ID'];
                            $instructor_name = $row['instructor'];
                            ?>
                            <option value="<?php echo $ins_id  ?>"><?php echo $instructor_name  ?></option><?php
                        }
                    }
                ?>
        <input type="submit" value="calculate" >
    </form>


</body>
</html>


</script>