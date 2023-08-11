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
            $conn = mysqli_connect('localhost:3306', 'root', '','evaluation');
            $sql = "SELECT * FROM sub_title";
            $retval = mysqli_query($conn, $sql);

            if(mysqli_num_rows($retval) > 0)
            {   
                $rating_loop = 1;
                $temp = 1;
                $temp2 = 1;
                $sum_temp=1;
                while($row = mysqli_fetch_assoc($retval))
                {
                    //search title 
                    $eval_title_id = $row['eval_title_id'];
                    $sub_title_id = $row['ID'];
                
                    $sql1 = "SELECT * FROM eval_title where ID = $eval_title_id";
                    $retval1 = mysqli_query($conn, $sql1);
                    $row1 = mysqli_fetch_assoc($retval1);
                    $title = $row1['title'];
                    $sub_title = $row['sub_title'];
                    $title_id = $row1['ID'];

                    //search rating
                    $sql_rating = "SELECT * FROM rating where instructor_id = $rating_id_instructor AND sub_title_id = $rating_loop";
                    $retval1 = mysqli_query($conn, $sql_rating);
                    $row_rating = mysqli_fetch_assoc($retval1);

                        $rate1 = $row_rating['score_1'];
                        $rate2 = $row_rating['score_2'];
                        $rate3 = $row_rating['score_3'];
                        $rate4 = $row_rating['score_4'];
                        $rate5 = $row_rating['score_5'];

                        if($sum_temp=1)
                        {
                            $sum_rate1 = $rate1;
                            $sum_rate2 = $rate2;
                            $sum_rate3 = $rate3;
                            $sum_rate4 = $rate4;
                            $sum_rate5 = $rate5;
                            $sum_temp ++;
                        }
                        else{
                        $sum_rate1 = $sum_rate1 + $rate1;
                        $sum_rate2 = $sum_rate2 + $rate2;
                        $sum_rate3 = $sum_rate3 + $rate3;
                        $sum_rate4 = $sum_rate4 + $rate4;
                        $sum_rate5 = $sum_rate5 + $rate5;
                        $sum_temp++;

                        }
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
                                            <th class="padding-20">Total</th>
                                            <?php
                                        }else{
                                            ?>
                                            <div class="container">
                                                <th class="padding-20"></th>
                                                <th class="padding-20"></th>
                                                <th class="padding-20"></th>
                                                <th class="padding-20"></th>
                                                <th class="padding-20"></th>
                                                <th class="padding-20"></th>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </tr>
                                </thead>
                        <tbody>
                        <?php  

                            $sql_res_total = "SELECT * FROM respondent WHERE instructor_id = $rating_id_instructor";
                            $retval_res_total = mysqli_query($conn, $sql_res_total);
                            $row_res_total = mysqli_fetch_assoc($retval_res_total);
                            
                            $no_respondent = $row_res_total['no_respondent'];
                            //for passing rates      
                            $new_rate1=0;
                            $new_rate2=0;
                            $new_rate3=0;
                            $new_rate4=0;
                            $new_rate5=0;

                            if($rate1>0)
                            {
                                $new_rate1 = $rate1 * 1;

                            }
                            if($rate2>0)
                            {
                                $new_rate2 = $rate2 * 2;

                            }
                            if($rate3>0)
                            {
                                $new_rate3 = $rate3 * 3;

                            }
                            if($rate4>0)
                            {
                                $new_rate4 = $rate4 * 4;

                            }
                            if($rate5>0)
                            {
                                $new_rate5 = $rate5 * 5;

                            }




                            $total = ($new_rate1 + $new_rate2 + $new_rate3 + $new_rate4 + $new_rate5)/$no_respondent;
                            
                            
                         


                        ?>                                    
                        <td><?php echo $temp2;?></td>
                        <td><?php echo $sub_title;?></td>
                        <td><label><?php echo$rate5; ?></label></td>
                        <td><label><?php echo$rate4; ?></label></td>
                        <td><label><?php echo$rate3; ?></label></td>
                        <td><label><?php echo$rate2; ?></label></td>
                        <td><label><?php echo$rate1; ?></label></td>
                        <td><label><?php echo$total; ?></label></td>
                        
                        <?php $temp++;
                    }
                    else{
                    
                        ?>                   
                            <tr>
                                <td><?php echo $temp2;?></td>
                                <td><?php echo $sub_title;?></td>
                                <td><label><?php echo$rate5; ?></label></td>
                                <td><label><?php echo$rate4; ?></label></td>
                                <td><label><?php echo$rate3; ?></label></td>
                                <td><label><?php echo$rate2; ?></label></td>
                                <td><label><?php echo$rate1; ?></label></td>
                                <td><label><?php echo$total; ?></label></td>
                            </tr>    
                                <?php 
                        }
                        
                        $temp2++;

                    $rating_loop++;     
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
