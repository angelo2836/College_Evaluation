<?php

if(isset($_GET['rating']))
{
$rating_id_instructor = $_GET['rating'];
 
$conn = mysqli_connect('localhost:3306', 'root', '','evaluation');
$sql_rating_search = "SELECT * FROM rating where instructor_id = $rating_id_instructor";
$retval_rating_search = mysqli_query($conn, $sql_rating_search);
if(mysqli_num_rows($retval_rating_search) > 0)
{
     include 'header.php';
?>

    <form action="save_rating.php" method="POST">
    <input type="hidden" name="ins_id" value="<?php echo $instructor_id;?>">
    <div class="container">
        <?php
        
        $conn = mysqli_connect('localhost:3306', 'root', '','evaluation');
        $sql1 = "SELECT * FROM instructor where ID = $rating_id_instructor";
        $retval1 = mysqli_query($conn, $sql1);
        if(mysqli_num_rows($retval1) > 0)
        {
            $row_search = mysqli_fetch_assoc($retval1 );
            $row_search['instructor'];
        }
        
        ?>
        <h3><strong><?php echo $row_search['instructor'];?></strong></h3>
    

            <?php
         
                for($n=1;$n<=5;$n++)
                {
              

                    $temp=1;
                    $score_1 = $temp;
                    $score_2 = $temp + 1;
                    $score_3 = $temp + 2;
                    $score_4 = $temp + 3;
                    $score_5 = $temp + 4;


                    $conn = mysqli_connect('localhost:3306', 'root', '','evaluation');
                    //condition for searching rating
                    if($n==1)
                    {
                        $sql_rating1 = "SELECT sum(score_$score_1) from rating where instructor_id = $rating_id_instructor AND sub_title_id BETWEEN 0 AND 7";
                        $sql_rating2 = "SELECT sum(score_$score_2) from rating where instructor_id = $rating_id_instructor AND sub_title_id BETWEEN 0 AND 7";
                        $sql_rating3 = "SELECT sum(score_$score_3) from rating where instructor_id = $rating_id_instructor AND sub_title_id BETWEEN 0 AND 7";
                        $sql_rating4 = "SELECT sum(score_$score_4) from rating where instructor_id = $rating_id_instructor AND sub_title_id BETWEEN 0 AND 7";
                        $sql_rating5 = "SELECT sum(score_$score_5) from rating where instructor_id = $rating_id_instructor AND sub_title_id BETWEEN 0 AND 7";
                    }
                    elseif($n==2)
                    {
                        $sql_rating1 = "SELECT sum(score_$score_1) from rating where instructor_id = $rating_id_instructor AND sub_title_id BETWEEN 8 AND 14";
                        $sql_rating2 = "SELECT sum(score_$score_2) from rating where instructor_id = $rating_id_instructor AND sub_title_id BETWEEN 8 AND 14";
                        $sql_rating3 = "SELECT sum(score_$score_3) from rating where instructor_id = $rating_id_instructor AND sub_title_id BETWEEN 8 AND 14";
                        $sql_rating4 = "SELECT sum(score_$score_4) from rating where instructor_id = $rating_id_instructor AND sub_title_id BETWEEN 8 AND 14";
                        $sql_rating5 = "SELECT sum(score_$score_5) from rating where instructor_id = $rating_id_instructor AND sub_title_id BETWEEN 8 AND 14";
                    }
                    elseif($n==3)
                    {
                        $sql_rating1 = "SELECT sum(score_$score_1) from rating where instructor_id = $rating_id_instructor AND sub_title_id BETWEEN 15 AND 19";
                        $sql_rating2 = "SELECT sum(score_$score_2) from rating where instructor_id = $rating_id_instructor AND sub_title_id BETWEEN 15 AND 19";
                        $sql_rating3 = "SELECT sum(score_$score_3) from rating where instructor_id = $rating_id_instructor AND sub_title_id BETWEEN 15 AND 19";
                        $sql_rating4 = "SELECT sum(score_$score_4) from rating where instructor_id = $rating_id_instructor AND sub_title_id BETWEEN 15 AND 19";
                        $sql_rating5 = "SELECT sum(score_$score_5) from rating where instructor_id = $rating_id_instructor AND sub_title_id BETWEEN 15 AND 19";
                    }
                    elseif($n==4)
                    {
                        $sql_rating1 = "SELECT sum(score_$score_1) from rating where instructor_id = $rating_id_instructor AND sub_title_id BETWEEN 20 AND 29";
                        $sql_rating2 = "SELECT sum(score_$score_2) from rating where instructor_id = $rating_id_instructor AND sub_title_id BETWEEN 20 AND 29";
                        $sql_rating3 = "SELECT sum(score_$score_3) from rating where instructor_id = $rating_id_instructor AND sub_title_id BETWEEN 20 AND 29";
                        $sql_rating4 = "SELECT sum(score_$score_4) from rating where instructor_id = $rating_id_instructor AND sub_title_id BETWEEN 20 AND 29";
                        $sql_rating5 = "SELECT sum(score_$score_5) from rating where instructor_id = $rating_id_instructor AND sub_title_id BETWEEN 20 AND 29";
                    }
                    elseif($n==5)
                    {
                        $sql_rating1 = "SELECT sum(score_$score_1) from rating where instructor_id = $rating_id_instructor AND sub_title_id BETWEEN 30 AND 37";
                        $sql_rating2 = "SELECT sum(score_$score_2) from rating where instructor_id = $rating_id_instructor AND sub_title_id BETWEEN 30 AND 37";
                        $sql_rating3 = "SELECT sum(score_$score_3) from rating where instructor_id = $rating_id_instructor AND sub_title_id BETWEEN 30 AND 37";
                        $sql_rating4 = "SELECT sum(score_$score_4) from rating where instructor_id = $rating_id_instructor AND sub_title_id BETWEEN 30 AND 37";
                        $sql_rating5 = "SELECT sum(score_$score_5) from rating where instructor_id = $rating_id_instructor AND sub_title_id BETWEEN 30 AND 37";
                    }

                    $retval_rating1 = mysqli_query($conn, $sql_rating1);
                    $retval_rating2 = mysqli_query($conn, $sql_rating2);
                    $retval_rating3 = mysqli_query($conn, $sql_rating3);
                    $retval_rating4 = mysqli_query($conn, $sql_rating4);
                    $retval_rating5 = mysqli_query($conn, $sql_rating5);
                    if(mysqli_num_rows($retval_rating1) > 0 )
                    {
                        $row1 = mysqli_fetch_assoc($retval_rating1);
                        
                            $row2 = mysqli_fetch_assoc($retval_rating2);
                            $row3 = mysqli_fetch_assoc($retval_rating3);
                            $row4 = mysqli_fetch_assoc($retval_rating4);
                            $row5 = mysqli_fetch_assoc($retval_rating5);

                           //searching for title
                            $sql_title = "SELECT * FROM eval_title WHERE ID = $n ";
                            $retval_title = mysqli_query($conn, $sql_title);
                            mysqli_num_rows($retval_title);
                            $row_title = mysqli_fetch_assoc($retval_title);
                            $row_title['title'];

                            ?>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="number-table"><?php echo $n;?></th>
                                        <th class="title-table"><?php echo $row_title['title'];?></th>
                                        
                                        <div class="container">
                                            <th class="padding-20"></th>
                                            <th class="padding-20"></th>
                                            <th class="padding-20"></th>
                                            <th class="padding-20"></th>
                                            <th class="padding-20"></th>
                                        </div>
                                            <th class="padding-20">5</th>
                                            <th class="padding-20">4</th>
                                            <th class="padding-20">3</th>
                                            <th class="padding-20">2</th>
                                            <th class="padding-20">1</th>                                             
                                    </tr>
                                </thead>
                            <tbody>
                                <td>C</td>
                                <td>HAHAHAHAH</td>
                                <div class="container">
                                    <td class="padding-20"></td>
                                    <td class="padding-20"></td>
                                    <td class="padding-20"></td>
                                    <td class="padding-20"></td>
                                    <td class="padding-20"></td>
                                </div>
                                <td><label><?php echo $row5['sum(score_5)'] ;?></label></td>
                                <td><label><?php echo $row4['sum(score_4)'] ;?></label></td>
                                <td><label><?php echo $row3['sum(score_3)'] ;?></label></td>
                                <td><label><?php echo $row2['sum(score_2)'] ;?></label></td>
                                <td><label><?php echo $row1['sum(score_1)'] ;?></label></td>

            <?php    
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
        
        else
        {
            echo $site="dashboard.php";
            ?>
            <script type="text/javascript">
                window.location="<?php echo $site;?>";
            </script>

            <?php
        }
    }
        ?>
