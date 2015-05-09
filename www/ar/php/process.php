<?php

    // Your Email Address
    $youremail = "info@egyptcsrforum.com";

    // Register Form
    if ( isset($_POST['email']) && isset($_POST['name']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ) {

        // Detect & Prevent Header Injections
        $test = "/(content-type|bcc:|cc:|to:)/i";
        foreach ( $_POST as $key => $val ) {
            if ( preg_match( $test, $val ) ) {
                exit;
            }
        }

        // Email Format
        $body  =    "New User Registration \n\n";
        $body .=    "========== \n\n";
        $body .=    "Name:  $_POST[name] \n\n";
        $body .=    "Title:  $_POST[title] \n\n";
		$body .=    "Company:  $_POST[company] \n\n";
        $body .=    "Email:  $_POST[email] \n\n";
        $body .=    "Telephone:  $_POST[telephone] \n\n";
        

        //Send email
        mail( $youremail, "New User Registration", $body, "From:" . $_POST['email'] );

    }

    // Subscribe Form
    if( isset($_POST['smail']) && isset($_POST['sname']) && filter_var($_POST['smail'], FILTER_VALIDATE_EMAIL) ) {
		$sbody  =    "New Subscribe \n\n";
		$sbody .=    "========== \n\n";
		$sbody .=    "Name:  $_POST[sname] \n\n";
		$sbody .=    "Email:  $_POST[smail] \n\n";
        //$data = $_POST['smail'] . "," . $_POST['sname'] . ";" . "\n";
        //$ret = file_put_contents('subscribers.txt', $data, FILE_APPEND | LOCK_EX);
        mail( $youremail, "New Subscribe", $sbody, "From:" . $_POST['smail'] );
    } else {
        die('No post data to process');
    }

?>