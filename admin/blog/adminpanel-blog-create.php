<?php

    /* Include header file */
    include('../admin-header.php');

    /* Includes summernote and other needed css */
    include('blog-header.php');


    $title_err  = ""; /* Displayed if no title entered */
    $post_err   = ""; /* Displayed if no post entered */
    $title      = ""; /* Holds the title from form */
    $post       = ""; /* Holds the post text from form */
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
            $post_err = "A post is required";
            $uploaderr = TRUE;
        } else {
            $post = mysqli_real_escape_string($db, $_POST['post']);
            $post = htmlspecialchars($post);
        }

        if( $uploaderr ) {
            $message = "Oops! All fields must be filled out.";
        } else {
            //Need to fix link..
            $sql = "INSERT INTO blog (b_pub, b_title, b_post, b_date, b_link)
            VALUES (TRUE, '$title', '$post', CURDATE(), 'http://invalid_link')";

            $result = mysqli_query($db, $sql);

            if( $result ) {
                $message = "Post successfully uploaded!";
            } else {
                $message = "Oops! Somthing whent wrong whilst uploading!";
            }
        }

    }

?>

<section id="blog-create">
    <div class="container">
        <div class="row">

            <div class="col-md-12 text-center">
                <h1>CRATE A BLOG POST</h1>
                <h3><?php
                    if($message) echo $message;
                    else echo "Create a new blog post";
                 ?></h3>
            </div>

            <div class="col-md-12 size-fix">
                <form class="well" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="form-group">

                        <!-- Label for input where title i written -->
                        <label>Title:</label>
                        <span class="blog-error">
                            * <?php echo $title_err; ?>
                        </span><br>
                        <input type="text" name="title" class="box"/>
                        <br><br>

                        <!-- Label for textarea where post i written -->
                        <label>Post:</label>
                        <span class="blog-error">
                            * <?php echo $post_err; ?>
                        </span><br>
                        <textarea name="post" rows="4" cols="50" class="form-control summernote"></textarea>
                        <br><br>
                        
                    </div>
                    <!-- Submit button -->
                    <input type="submit" class="btn btn-md btn-primary" name="submit" value="Submit" />
                </form>
            </div>

            <div class="col-md-12">
                <p>* Must be filled inn.</p>
            </div>

        </div>
    </div>
</section>

<?php

    /* Other scripts */

    /* Main scripts */
    include('../admin-footer.php');

    include('blog-footer.php');

?>
