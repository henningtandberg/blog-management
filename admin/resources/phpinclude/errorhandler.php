<?php
    /*
        Author: Henning P. Tandberg
        Date:   18.01.2017
        Usage:  Custom error handling
        Build:  0.5.1
    */


    /*
        Catches error. If over lvl 2 mailed to admin
        $errno:     Errornumber/level
        $errstr:    Message
        $errfile:   What file the error occured in
        $errline:   Specified line where error occured
    */
    function errhan ($errno, $errstr, $errfile, $errline) {
        $errmsg = "<b>Date</b>:    ".date('d.m.y')." <br>
                   <b>Error level</b>:  $errno<br>
                   <b>Message</b>: $errstr <br>
                   <b>File</b>:    $errfile <br>
                   <b>Line</b>:    $errline <br>";

        echo "$errmsg";

        logerr($errmsg, "../log/error.log"); //Not working...

        if($errno > 2) {
            mailerr($errmsg, "mail@to.com", "mail@from.com");
        }

        echo "Ending script<br>-------------<br>";
        die();
    }

    /*
        Logs error to custom errorlog
        $msg:   Errormessage containing $errno and $errstr
        $file:  Destinationfile to where the error shall be logged
    */
    function logerr ($msg, $file) {
        echo "Logging error to $file<br>";
        file_put_contents($file, $msg, FILE_APPEND);
    }

    /*
        Mails error to specified mail
        $msg:   Errormessage containing $errno and $errstr
        $to:    Reciever
        $from:  Sender
    */
    function mailerr ($msg, $to, $from) {
        echo "Notifying admin by mail<br>";
        error_log($msg,1, $to, $from);
    }

    set_error_handler('errhan');

?>
