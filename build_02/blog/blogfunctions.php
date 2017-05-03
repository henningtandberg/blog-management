<?php

    /*
        Author: Henning P. Tandberg
        Date:   24.01.2017
        Usage:  Custom error handling
        Build:  0.5.2
    */


    /*
        Function returns the size of the blog
        (images + blog posts) in MB.
    */
    function get_blog_size($db, $dbname) {
        $sql    = "SELECT table_name AS `Table`, round(((data_length + index_length) / 1024 / 1024), 2) `Size in MB` FROM information_schema.TABLES WHERE table_schema = '$dbname' AND table_name = 'blog'";
        $result = mysqli_query($db, $sql);
        $row    = mysqli_fetch_assoc($result);

        $postsize = $row['Size in MB'];

        /* Add later a sum of blog photo sizes */

        return $postsize;
    }

    function list_posts ($db, $name, $func) {
        $sql    = "SELECT b_id, b_title FROM blog ORDER BY b_id ASC";
        $result = mysqli_query($db, $sql);

        echo "
        <select name=\"$name\" onchange=\"$func\">
            <option value=\"0\">Select a post</option>";
        while ( $row = mysqli_fetch_array($result, MYSQL_ASSOC) ){
            echo "<option value='".$row['b_id']."'>".$row['b_title']."</option>";
        }
        echo "</select>";
    }


?>
