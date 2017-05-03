<?php
    /*
        Author: Henning P. Tandberg
        Date:   18.01.2017
        Usage:  Custom error handling
        Build:  0.5.1
    */

    /*
        Returns server link/name
    */
    function host_name() {
        return "$_SERVER[HTTP_HOST]";
    }

    /*
        Returns current url
    */
    function actual_link () {
        return "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    }

    /*
        Returns current url with no fileending
    */
    function actual_link_dir () {
        $url    = $_SERVER['REQUEST_URI'];
        $parts  = explode('/',$url);
        $dir    = $_SERVER['SERVER_NAME'];

        for ($i = 0; $i < count($parts) - 1; $i++)
        { $dir .= $parts[$i] . "/"; }

        return $dir;
    }

    /*
        Returns current url with no fileending
    */
    function actual_link_prev_dir () {
        $url    = $_SERVER['REQUEST_URI'];
        $parts  = explode('/',$url);
        $dir    = $_SERVER['SERVER_NAME'];

        for ($i = 0; $i < count($parts) - 2; $i++)
        { $dir .= $parts[$i] . "/"; }

        return $dir;
    }

?>
