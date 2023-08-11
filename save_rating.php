<?php
$rating=0;
$ins_id = $_POST['ins_id'];
$temp=1;
for($n=1;$n<38;$n++)
{
$title = "title_".$n;?><br><?php
$rating = $_POST["$title"];

    if($rating == 1)
    {
        $conn = mysqli_connect('localhost:3306', 'root', '','evaluation');
        $sql1 = "SELECT * FROM rating where instructor_id = $ins_id AND sub_title_id = $n";
        $retval1 = mysqli_query($conn, $sql1);
        if(mysqli_num_rows($retval1) > 0)
        {
            $row = mysqli_fetch_assoc($retval1);
            $preview_score = $row['score_1'];

            $new_score = $preview_score + 1;

            $sql = "UPDATE rating SET score_1 = $new_score WHERE instructor_id = $ins_id AND sub_title_id = $n";
            mysqli_query($conn, $sql);
        }
        else
        {
            $sql = "INSERT INTO rating VALUES ('','$ins_id','$n','1','','','','')";
            mysqli_query($conn, $sql);

        }
           

    }
    if($rating == 2)
    {
        $conn = mysqli_connect('localhost:3306', 'root', '','evaluation');
        $sql1 = "SELECT * FROM rating where instructor_id = $ins_id AND sub_title_id = $n";
        $retval1 = mysqli_query($conn, $sql1);
        if(mysqli_num_rows($retval1) > 0)
        {
            $row = mysqli_fetch_assoc($retval1);
            $preview_score = $row['score_2'];

            $new_score = $preview_score + 1;

            $sql = "UPDATE rating SET score_2 = $new_score WHERE instructor_id = $ins_id AND sub_title_id = $n";
            mysqli_query($conn, $sql);
        }
        else
        {
            $sql = "INSERT INTO rating VALUES ('','$ins_id','$n','','1','','','')";
            mysqli_query($conn, $sql);

        }
           
    }
    if($rating == 3)
    {

        $conn = mysqli_connect('localhost:3306', 'root', '','evaluation');
        $sql1 = "SELECT * FROM rating where instructor_id = $ins_id AND sub_title_id = $n";
        $retval1 = mysqli_query($conn, $sql1);
        if(mysqli_num_rows($retval1) > 0)
        {
            $row = mysqli_fetch_assoc($retval1);
            $preview_score = $row['score_3'];

            $new_score = $preview_score + 1;

            $sql = "UPDATE rating SET score_3 = $new_score WHERE instructor_id = $ins_id AND sub_title_id = $n";
            mysqli_query($conn, $sql);
        }
        else
        {
            $sql = "INSERT INTO rating VALUES ('','$ins_id','$n','','','1','','')";
            mysqli_query($conn, $sql);

        }
    }
    if($rating == 4)
    {
        $conn = mysqli_connect('localhost:3306', 'root', '','evaluation');
        $sql1 = "SELECT * FROM rating where instructor_id = $ins_id AND sub_title_id = $n";
        $retval1 = mysqli_query($conn, $sql1);
        if(mysqli_num_rows($retval1) > 0)
        {
            $row = mysqli_fetch_assoc($retval1);
            $preview_score = $row['score_4'];

            $new_score = $preview_score + 1;

            $sql = "UPDATE rating SET score_4 = $new_score WHERE instructor_id = $ins_id AND sub_title_id = $n";
            mysqli_query($conn, $sql);
        }
        else
        {
            $sql = "INSERT INTO rating VALUES ('','$ins_id','$n','','','','1','')";
            mysqli_query($conn, $sql);

        }
    }
    if($rating == 5)
    {
        $conn = mysqli_connect('localhost:3306', 'root', '','evaluation');
        $sql1 = "SELECT * FROM rating where instructor_id = $ins_id AND sub_title_id = $n";
        $retval1 = mysqli_query($conn, $sql1);
        if(mysqli_num_rows($retval1) > 0)
        {
            $row = mysqli_fetch_assoc($retval1);
            $preview_score = $row['score_5'];

            $new_score = $preview_score + 1;

            $sql = "UPDATE rating SET score_5 = $new_score WHERE instructor_id = $ins_id AND sub_title_id = $n";
            mysqli_query($conn, $sql);
        }
        else
        {
            $sql = "INSERT INTO rating VALUES ('','$ins_id','$n','','','','','1')";
            mysqli_query($conn, $sql);

        }      
    }


   
}

$conn = mysqli_connect('localhost:3306', 'root', '','evaluation');
    $sql_res = "SELECT * FROM respondent where instructor_id =$ins_id ";
    $retvalr_res = mysqli_query($conn, $sql_res);
    if(mysqli_num_rows($retvalr_res) > 0)
    {
        $row = mysqli_fetch_assoc($retvalr_res);
        $respondents = $row['no_respondent'];
        echo $new_respondents = $respondents+1;
        $sql_update_res = "UPDATE respondent SET no_respondent = $new_respondents WHERE instructor_id = $ins_id ";
        $retvalr_update_res = mysqli_query($conn, $sql_update_res);


    }else{
        $sql_update_res = "INSERT INTO respondent VALUES ('','$ins_id','1')";
        $retvalr_update_res = mysqli_query($conn, $sql_update_res);
    }

echo $site="dashboard_view_rating.php?rating=".$ins_id;
?>
<script type="text/javascript">
        window.location="<?php echo $site;?>";
    </script>
