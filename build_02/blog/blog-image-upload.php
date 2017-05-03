<?php

    if ($_FILES['image']['name']) {

        $name =     md5(rand(100, 200));
        $tmpname =  $_FILES["image"]["tmp_name"];
        $error =    $_FILES['image']['error'];
        $size =     $_FILES['image']['size'];
        $ext =      explode('.', $_FILES['image']['name']);

        //Error handling
        $valid =    true;

        switch ($error) {
            case UPLOAD_ERR_OK:
                $valid = true;
                break;
            case UPLOAD_ERR_INI_SIZE:
                $response = 'The uploaded file exceeds the upload_max_filesize directive in php.ini.';
                break;
            case UPLOAD_ERR_FORM_SIZE:
                $response = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.';
                break;
            case UPLOAD_ERR_PARTIAL:
                $response = 'The uploaded file was only partially uploaded.';
                break;
            case UPLOAD_ERR_NO_FILE:
                $response = 'No file was uploaded.';
                break;
            case UPLOAD_ERR_NO_TMP_DIR:
                $response = 'Missing a temporary folder. Introduced in PHP 4.3.10 and PHP 5.0.3.';
                break;
            case UPLOAD_ERR_CANT_WRITE:
                $response = 'Failed to write file to disk. Introduced in PHP 5.1.0.';
                break;
            case UPLOAD_ERR_EXTENSION:
                $response = 'File upload stopped by extension. Introduced in PHP 5.2.0.';
                break;
            default:
                $response = 'Unknown error';
            break;
        } // end switch

        if($valid) {
            //Check file extension
            if ( !in_array($ext[1], array('jpg','jpeg','png','gif')) ) {
                $response = 'Invalid file extension.';
            }
            //Check file size
            /*elseif ( $size/50000/50000 > 2 ) {
                $response = 'File size is exceeding maximum allowed size.';
            }*/
            //Valid -> upload
            else {

                // Edit to be uploads folder! 
                $filename = $name . '.' . $ext[1];
                $destination = '../blogg/img/' . $filename; //change this directory
                $location = $tmpname;
                move_uploaded_file($location, $destination);
                $response = '../blogg/img/' . $filename;//change this URL
            }

        } //END if valid

        echo $response;

    }

?>
