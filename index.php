<?php

include_once('my_func.php');

if ($my_email){
    // emailOpen($conn, $my_email, $my_campaign);
    $result = emailBlacklist($conn, $email);

}else{

    // lookup and verify hash
    echo "<br> reversed hash $my_id";   
    echo "<br> original hash $rmy_id";

   // update db

}


$ua = $_SERVER['HTTP_USER_AGENT'].'';

echo "<br>UA: $ua";
echo "<br>IP: $your_ip"; 

// $hash1 = md5("$my_id");


// opt-out (blacklist)



?>
