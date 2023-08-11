<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="../College_evaluation/fontawesome-free-6.4.2-web/css/fontawesome.css">
    <link rel="stylesheet"
        href="../College_evaluation/fontawesome-free-6.4.2-web/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>Document</title>
</head>

<body>
    <div class="container-fluid nav-width">

        <nav class="navbar navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Student's Faculty Evaluation</a>
                </div>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><i class="fa-solid fa-house"></i>home</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>
            </div>
        </nav>

        <div class="content container">

            <div class="navigation-buttons ">
                <button type="button" class="btn btn-add-instructor" data-toggle="modal" data-target="#addModal">Add
                    Instructor <i class="fa-solid fa-plus"></i></button>
                <input type="text" placeholder="Search..." id="myInput" class="input-search">
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="padding-20">Instructor</th>
                        <th class="rate-col padding-20">Action</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                <?php
                $conn = mysqli_connect('localhost:3306', 'root', '', 'evaluation');
                $sql = "SELECT * FROM instructor ";
                $retval = mysqli_query($conn, $sql);
                if (mysqli_num_rows($retval) > 0) 
                {
                    while ($row = mysqli_fetch_assoc($retval))
                    {
                        $ins_id = $row['ID'];
                        $instructor_name = $row['instructor'];?>
                            <tr>
                                <td class="padding-20"><?php echo $instructor_name; ?></td>
                                <td class="text-center padding-20">
                                    <a href="dashboard_rating_per_title.php?rating=<?php echo $row['ID']; ?>" ><i class="fa-regular fa-face-smile"></i>
                                    <a href="dashboard_view_rating.php?rating=<?php echo $row['ID']; ?>" ><i class="fa-solid fa-star"></i>
                                    <a href="rating.php?rating=<?php echo $row['ID']; ?>" ><i class="fa-solid fa-list-check"></i>
                                    <a href="dashboard.php?update=<?php echo $row['ID']; ?>"><i class="fa-solid fa-pencil" 
                                        aria-hidden="true"></i>
                                    
                                </td>
                            </tr>
                    <?php
                        
                    }
                }
            ?>
                </tbody>

            </table>

        </div>
    

    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div>
                        <h5 class="modal-title" id="exampleModalLabel">Add Instructor</h5>
                    </div>
                    <div><button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button></div>
                </div>
                <div class="modal-body">
                    <form action="add_instructor.php" method="POST" class="form-inline">
                        <input type="text" name="ins_name" placeholder="Name of Instructor" class="input-instructor">
                        <button type="submit" class="btn btn-save-instructor">Save</button>
                    </form>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
<?php
    if(isset($_GET['update']))
{ 
  $a = $_GET['update'];
?>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Instructor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="update_intructor_name.php" method="POST">
                <?php
                $conn_edit = mysqli_connect('localhost:3306', 'root', '', 'evaluation');
                $sql_edit = "SELECT * FROM instructor WHERE ID = $a ";
                $retval_edit = mysqli_query($conn_edit, $sql_edit);
                if (mysqli_num_rows($retval_edit) > 0) 
                {
                    while ($row = mysqli_fetch_assoc($retval_edit))
                    {
                        $ins_name = $row['instructor'];
                    }
                }

                        ?>
                    <input type="hidden" value="<?php echo$a;?>" name="ins_id">
                    <input type="text" name="ins_name" value="<?php echo$ins_name;?>" class="input-instructor">
                    <button type="submit" class="btn btn-update-instructor">Update</button>
                    </form>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>



<?php
}
?>

</body>

</html>
<script>


$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>


<script>
  $(document).ready(function(){
    $("#editModal").modal('show');
  });
</script>


<script src="../Evaluation_program/fontawesome-free-6.4.0-web/fontawesome-free-6.4.0-web/js/fontawesome.js">
    </script>
    <script src="../Evaluation_program/fontawesome-free-6.4.0-web/fontawesome-free-6.4.0-web/js/all.js"></script>
    