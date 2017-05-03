<?php

    /* Logg out page that ends log-in-session. */

    include('resources/phpinclude/errorhandler.php');

    session_start();

    if( session_destroy() ) {
        header("Location: login.php");
    }

?>
