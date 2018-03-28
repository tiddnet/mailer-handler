<?php

include_once('connect.php');
include_once('functions.php');

// If no input, display page, or redirect. 
if ((empty($_GET['id'])) && (empty($_GET['email']))) {
    // no data passed by get
   echo "Error: Malformed submission.";
   
}

// check length of input
if (strlen($_GET['id']) > 32) {
  echo "Error: The id length you have specified is too long.";
  exit;
} 

if (strlen($_GET['email']) > 80) {
  echo "Error: The email length you have specified is too long.";
  exit;
} 


if (strlen($_GET['c']) > 6) {
  // echo "Error: The click length you have specified is too long.";
  exit;
} 

// check allowed characters
 $my_id       = filter_var($_GET['id'], FILTER_SANITIZE_STRING);
 $my_email    = filter_var($_GET['email'], FILTER_SANITIZE_STRING);
 $my_campaign = filter_var($_GET['c'], FILTER_SANITIZE_STRING);

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


