<!DOCTYPE html>

<html>

<!--Head start-->
<head>
<link rel="stylesheet" type="text/css" href="../resources/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../resources/css/custom.css">
</head>
<!--Head end-->

<!-- Includes summernote css -->
<?php include('blog-header.php'); ?>

<!--Body start-->
<body>

<?php

    /* For use of database */
    include('../resources/phpinclude/config.php');


    /* Retrieves the blogpost */
    $id     = intval($_GET['q']);
    $sql    = "SELECT b_title, b_post FROM blog WHERE b_id='$id'";
    $result = mysqli_query($db, $sql);
    $row    = mysqli_fetch_array($result);

    $title  = $row['b_title'];
    $post   = htmlspecialchars_decode($row['b_post']);



    /* Prints the blogpost in the form */
    echo "
    <form class=\"well\" method=\"post\" action=\"".htmlspecialchars($_SERVER["adminpanel-blog-edit.php"])."\">
    <div class=\"form-group\">

    <br><label>Title:</label>
    <span class=\"blog-error\">
        *
    </span><br>
    <input type=\"text\" name=\"title\" class=\"box\" value=\"$title\">
    <br><br>

    <label>Post:</label>
    <span class=\"blog-error\">
        *
    </span><br>
    <textarea name=\"post\" rows=\"4\" cols=\"50\" class=\"form-control summernote\">$post</textarea>
    <br><br>

    <input type=\"hidden\" name=\"id\" value=\"$id\"/>
    <input type=\"submit\" class=\"btn btn-md btn-primary\" name=\"submit\" value=\"Submit changes\" />
    <br><br>

    </div>
    </form>

    <div class=\"col-md-12\">
        <p>* Must be filled inn.</p>
    </div>
    ";

?>

</body>
<!--Body end-->

<!--Scritp start-->
<script type="text/javascript" src="../resources/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="../resources/js/bootstrap.min.js"></script>

<!-- Includes summernote js -->
<?php include('blog-footer.php'); ?>

</html>
