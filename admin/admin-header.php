<?php
    /* Session checks if logged in properly! */
    include('resources/phpinclude/include.php');

    /* Link to server/admin */
    $sitelink = "http://".actual_link_prev_dir();
?>

<!DOCTYPE>

<!-- Html closed in footer -->
<html>

<!--Head start-->
<head>
    <!-- Metadata -->
    <meta charset="utf-8" lang="no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="../resources/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../resources/css/custom.css">
    <!-- Title -->
    <title>Admin Panel</title>
</head>
<!--Head end-->

<!--Body closed in admin-footer -->
<body>

<!-- Navbar top start -->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand navbar-left" href=<?php echo $sitelink."home"; ?>>
            <p><b>Admin</b> Panel</p>
        </a>

        <ul class="nav navbar-nav navbar-right">
            <li><a href=<?php echo $sitelink."logout.php"; ?>><b>LOG OUT</b></a></li>
        </ul>
    </div>
</nav>
<!-- Navbar top end -->

<!--Navbar start-->
<nav class="navbar navbar-default navbar-fixed-left" role="navigation">
    <ul class="nav navbar-nav">

        <li><a href=<?php echo $sitelink."home"; ?>>DASHBOARD</a></li>

        <li><a href=<?php echo $sitelink."news"; ?>>NEWS</a></li>

        <li><!-- BLOGG START -->
            <a class="dropdown-toggle" data-toggle="dropdown" href="">BLOG
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href=<?php echo $sitelink."blog/adminpanel-blog.php" ?>>SETTINGS</a></li>
                <li><a href=<?php echo $sitelink."blog/adminpanel-blog-create.php" ?>>CREATE</a></li>
                <li><a href=<?php echo $sitelink."blog/adminpanel-blog-edit.php" ?>>EDIT</a></li>
                <li><a href=<?php echo $sitelink."blog/adminpanel-blog-delete.php" ?>>DELETE</a></li>
            </ul>
        </li><!-- BLOGG END -->

        <li><a href=<?php echo $sitelink."pages"; ?>>PAGES</a></li>

    </ul>
</nav>
<!--Navbar stop-->

<div class="offset-top"></div>
