<?php

    /*
        Session verifyer page.
        If there is no session, the user will
        be redirected to login.php
    */

    session_start();

    if(!isset($_SESSION['login_user'])) {
        $location = "Location: http://".actual_link_prev_dir()."login.php";
        header($location);
    }

    $user_check     = $_SESSION['login_user'];
    $query          = mysqli_query($db,"SELECT user FROM admin WHERE user = '$user_check'");
    $row            = mysqli_fetch_array($query, MYSQLI_ASSOC);
    $login_session  = $row['user'];

?>
