
<?php
    if(isset($_GET['rating']))
{ 
  $instructor_id = $_GET['rating'];


include 'header.php';
?>
    <form action="save_rating.php" method="POST">
    <input type="hidden" name="ins_id" value="<?php echo $instructor_id;?>">
    <div class="container">
        <h3>Instruction</h3>
        <p>Using the Rating Scale above, please check the number in each item that best described the teaching
            performance
            of your instructor.</p>


            <?php


                    $conn = mysqli_connect('localhost:3306', 'root', '','evaluation');
                    $sql = "SELECT * FROM sub_title";
                    $retval = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($retval) > 0)
                    {  
                        $temp = 1;
                        $temp2 = 1;
                        while($row = mysqli_fetch_assoc($retval))
                        {  
                            $eval_title_id = $row['eval_title_id'];
                            $sub_title_id = $row['ID'];
                        
                            $sql1 = "SELECT * FROM eval_title where ID = $eval_title_id";
                            $retval1 = mysqli_query($conn, $sql1);
                            $row1 = mysqli_fetch_assoc($retval1);
                                $title = $row1['title'];
                                $sub_title = $row['sub_title'];
                                $title_id = $row1['ID'];
                                if($temp == $eval_title_id)
                                { 
                                    $temp2=1;
                                    ?>
                                        <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="number-table"><?php echo$title_id;?></th>
                                                <th class="title-table"><?php echo$title;?></th>
                                                <?php
                                                if($temp==1)
                                                {    ?>
                                                    <th class="padding-20">5</th>
                                                    <th class="padding-20">4</th>
                                                    <th class="padding-20">3</th>
                                                    <th class="padding-20">2</th>
                                                    <th class="padding-20">1</th>
                                                    <?php
                                                }else{
                                                    ?>
                                                    <th class="padding-20"></th>
                                                    <th class="padding-20"></th>
                                                    <th class="padding-20"></th>
                                                    <th class="padding-20"></th>
                                                    <th class="padding-20"></th>
                                                    <?php
                                                }
                                                ?>
                                            </tr>
                                        </thead>
                                    <tbody>
                                    <td><?php echo $temp2;?></td>
                                    <td><?php echo $sub_title;?></td>
                                    <td><input type="radio" value="5" name="<?php echo 'title'."_".$sub_title_id; ?>" required></td>
                                    <td><input type="radio" value="4" name="<?php echo 'title'."_".$sub_title_id; ?>" required></td>
                                    <td><input type="radio" value="3" name="<?php echo 'title'."_".$sub_title_id; ?>" required></td>
                                    <td><input type="radio" value="2" name="<?php echo 'title'."_".$sub_title_id; ?>" required></td>
                                    <td><input type="radio" value="1" name="<?php echo 'title'."_".$sub_title_id; ?>" required></td>
                                    <?php $temp++;
                                }
                                else{
                               
                                    ?>                   
                                        <tr>
                                            <td><?php echo $temp2;?></td>
                                            <td><?php echo $sub_title;?></td>
                                            <td><input type="radio" value="5" name="<?php echo 'title'."_".$sub_title_id; ?>" required></td>
                                            <td><input type="radio" value="4" name="<?php echo 'title'."_".$sub_title_id; ?>" required></td>
                                            <td><input type="radio" value="3" name="<?php echo 'title'."_".$sub_title_id; ?>" required></td>
                                            <td><input type="radio" value="2" name="<?php echo 'title'."_".$sub_title_id; ?>" required></td>
                                            <td><input type="radio" value="1" name="<?php echo 'title'."_".$sub_title_id; ?>" required></td>                        
                                        </tr>    
                                            <?php 
                                    }
                                    
                                    $temp2++;
                        }
                    }

                ?>
                
            </tbody>
        </table>
    </div>
        <input type="submit">
    </form>

    <script src="../Evaluation_program/fontawesome-free-6.4.0-web/fontawesome-free-6.4.0-web/js/fontawesome.js">
    </script>
    <script src="../Evaluation_program/fontawesome-free-6.4.0-web/fontawesome-free-6.4.0-web/js/all.js"></script>

</body>

</html>

<?php
}
?>