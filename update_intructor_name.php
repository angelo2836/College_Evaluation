<?php
$ins_id=$_POST['ins_id'];
$ins_name=$_POST['ins_name'];

    $conn_update_instructor = mysqli_connect('localhost:3306', 'root', '', 'evaluation');
    $sql_update_instructor = "UPDATE instructor set instructor = '$ins_name' WHERE ID = $ins_id ";
    $retval_update_instructor = mysqli_query($conn_update_instructor, $sql_update_instructor);
?>


<script type="text/javascript">
        window.location="dashboard.php";
    </script>