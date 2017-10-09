<?php

    /*
        Author: Henning P. Tandberg
        Date:   18.01.2017
        Usage:  Includes all nessecary files for adminpanel
        Build:  0.5.1
    */

    /* Custom error handling */
    include('errorhandler.php');

    /* Set of functions to access serverurls */
    include('urlfunctions.php');

    /* Connects to MySQL database */
    include('config.php');

    /* Creates session to secure adminpanel */
    include('session.php');

?>
