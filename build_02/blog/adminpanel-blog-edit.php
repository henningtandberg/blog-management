<?php

    /* Include header file */
    include('../admin-header.php');

    /* Include blog get functions */
    include('blogfunctions.php');


    $title_err  = ""; /* Displayed if no title entered */
    $post_err   = ""; /* Displayed if no post entered */
    $title      = ""; /* Holds the title from form */
    $post       = ""; /* Holds the post text from form */
    $id         = ""; /* Holds the id of the blog post */
    $message    = ""; /* Message about post status */
    $uploaderr  = FALSE;

    if( $_SERVER["REQUEST_METHOD"] == "POST" ) {

        if( empty($_POST['title']) ) {
            $title_err = "Title is required";
            $uploaderr = TRUE;
        } else {
            $title = mysqli_real_escape_string($db, $_POST['title']);
            $title = htmlspecialchars($title);
        }

        if( empty($_POST['post']) ) {
            $post_err   = "A post is required";
            $uploaderr  = TRUE;
        } else {
            $post = mysqli_real_escape_string($db, $_POST['post']);
            $post = htmlspecialchars($post);
        }

        $id = $_POST['id'];

        if( $uploaderr ) {
            $message = "Oops! All fields must be filled out.";
        } else {
            //Need to fix link..
            $sql    = "UPDATE blog SET b_title='$title', b_post='$post' WHERE b_id='$id'";
            $result = mysqli_query($db, $sql);

            if( $result ) {
                $message = "Post successfully uploaded!";
            } else {
                $message = "Oops! Somthing whent wrong whilst uploading!";
            }
        }

    }

?>

<!-- insert codde here -->
<section id="blog-edit">
    <div class="container">
        <div class="row">

            <div class="col-md-12 text-center">
                <h1>EDIT A BLOG POST</h1>
                <h3><?php
                    if($message) echo "$message";
                    else echo "Edit a selected post";
                ?></h3>
            </div>

            <div class="col-md-12">
                <div class="text-center">
                    <?php list_posts($db, "", "show_post(this.value)"); ?>
                </div>

                <!-- Ajax request shows up here -->
                <div id="printarea"></div>
            </div>

        </div>
    </div>
</section>

<!-- Extra script -->
<script type="text/javascript" src="get-blog-post.js"></script>

<?php include('../admin-footer.php'); ?>
