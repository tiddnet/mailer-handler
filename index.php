<?php

include_once('my_func.php');

if ($my_email){
    // get rhash for email address
    echo "<br> rhash_email $rhash_email";

}else{

    // lookup and verify hash
    echo "<br> reversed hash $my_id";   
    echo "<br> original hash $rmy_id";

   // update db

}


// $hash1 = md5("$my_id");


// opt-out (blacklist)



?>
