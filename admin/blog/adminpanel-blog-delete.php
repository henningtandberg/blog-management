<?php

    include('../admin-header.php');
    include('blogfunctions.php');

    $id      = 0;  /* Id to blogpost to delete */
    $message = ""; /* Message to user */

    if( $_SERVER["REQUEST_METHOD"] == "POST" ) {

        $id = $_POST['del-id'];

        if ($id > 0) {
            $sql    = "DELETE FROM blog WHERE b_id='$id'";
            $result = mysqli_query($db, $sql);

            if($result) {
                $message = "Post Deleted!";
            } else {
                $message = "Error: Could not delete post!";
            }
        } else {
            $message = "You must select a post first!";
        }

    }

?>

<!-- insert codde here -->
<section id="blog-delete">
    <div class="container">
        <div class="row">

            <div class="col-md-12 text-center">
                <h1>DELETE A BLOG POST</h1>
                <h3><?php
                    if($message) echo "$message";
                    else echo "Select a post to delete";
                ?></h3>
            </div>

            <div class="col-md-12 text-center">
                <form class="well" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="form-group">
                        <!-- List the post for deletion -->
                        <?php list_posts($db, "del-id", ""); ?>

                        <!-- Submit button -->
                        <input id="del-btn" type="button" class="btn btn-md btn-primary"
                        onclick="disp_options('del-opts', 'del-btn');" value="Delete" style="display: inline-block"/>

                        <!-- Hidden buttons -->
                        <div id="del-opts" style="display: none">
                            <h4>Are you sure you wish to delete this post?</h4>
                            <input type="submit" class="btn btn-md btn-primary" name="submit" value="YES" />
                            <input type="button" class="btn btn-md btn-primary" name="hide"  onclick="disp_options('del-opts', 'del-btn');" value="NO" />
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>

<!-- Extra script -->
<script>
    function disp_options(id1, id2) {
        var div = document.getElementById(id1);
        var btn = document.getElementById(id2);

        if( div.style.display === 'block' ) {
            div.style.display = 'none';
        } else if( div.style.display === 'none' ) {
            div.style.display = 'block';
        }

        if( btn.style.display === 'inline-block' ) {
            btn.style.display = 'none';
        } else if( btn.style.display === 'none' ) {
            btn.style.display = 'inline-block';
        }
    }
</script>

<?php include('../admin-footer.php'); ?>
