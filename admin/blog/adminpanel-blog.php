<?php
    include('../admin-header.php');
    include('blogfunctions.php');
?>

<!-- insert codde here -->
<section id="blog">
    <div class="container">

        <div class="row">
            <div class="col-md-12 text-center">
                <h1>BLOG SETTINGS</h1>
                <h3><?php echo "Size of blog: ".get_blog_size($db, DB_DATABASE)." MB" ?></h3>
            </div>
        </div>

    </div>
</section>

<?php include('../admin-footer.php'); ?>
