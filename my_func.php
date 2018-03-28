<?php

include_once('connect.php');
include_once('functions.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     // The request is using the POST method
     // If no input, display page, or redirect. 
    if ((empty($_POST['unsubscribe'])) && (empty($_POST['email']))) {
        // no data passed by get
       echo "(POST) Error: Malformed submission.";
   
    }

	// check length of input

	if (strlen($_POST["email"]) > 256) {
	  echo "(POST) Error: The email length you have specified is too long.";
	  exit;
	} else {

	 $my_email    = filter_var($_POST['email'], FILTER_SANITIZE_STRING);

	}

	if (strlen($_POST["unsubcribe"]) > 5) {
	  echo "(POST) Error: The unsunscribe value length you have specified is too long.";
	  exit;
	} else {

	 $unsubscribe = filter_var($_POST['unsubscribe'], FILTER_SANITIZE_STRING);

	}


	if (strlen($_POST['c']) > 30) {
	  // echo "Error: The click length you have specified is too long.";
	  exit;
	} else {
	 
	 $my_campaign = filter_var($_POST['c'], FILTER_SANITIZE_STRING);

	}

	// check allowed characters
	 $my_id       = filter_var($_POST['id'], FILTER_SANITIZE_STRING);



} else {




	// If no input, display page, or redirect. 
	if ((empty($_GET['id'])) && (empty($_GET['email']))) {
	    // no data passed by get
	   echo "(GET) Error: Malformed submission.";
	   
	}

	// check length of input
	if (strlen($_GET['id']) > 32) {
	  echo "Error: The id length you have specified is too long.";
	  exit;
	} 

	if (strlen($_GET['email']) > 256) {
	  echo "(GET) Error: The email length you have specified is too long.";
	  exit;
	} else {

	 $my_email    = filter_var($_GET['email'], FILTER_SANITIZE_STRING);

	} 



	if (strlen($_GET['c']) > 30) {
	  // echo "Error: The click length you have specified is too long.";
	  exit;
	} else {

	 $my_campaign = filter_var($_GET['c'], FILTER_SANITIZE_STRING);

	}


	// check allowed characters
	 $my_id       = filter_var($_GET['id'], FILTER_SANITIZE_STRING);

}

// Additional tracking characteristics
 $track_ua    = $_SERVER['HTTP_USER_AGENT'].'';
 $track_ip    = getUserIP();

// perform email lookup

// reverse my_id 
$rmy_id = strrev($my_id);

$rhash_email = emailHash($my_email); 

function getUserIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}

function displayForm($my_email) {
// This should really be a template

echo "<form method=POST><input type=hidden name=email value=\"$my_email\"><input type=hidden name=unsubscribe value=true><input type=submit name=opt-out value=\"Opt Out\">"; 



}
