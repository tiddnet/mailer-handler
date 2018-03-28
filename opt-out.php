<?php

include_once('my_func.php');

if (($my_email) && ($unsubscribe)){
    // emailOpen($conn, $my_email, $my_campaign);
    $result = emailBlacklist($conn, $my_email);

    echo "You have been added to our opt-out list, and will be excluded from future mailings.\n";

}else{

     if ($my_email) {

         displayForm($my_email);

     } else {

        // Something went wrong
        echo "We are sorry, we are unable to understand your request.";

     }

}

echo "<br>IP Address: $track_ip"; 




?>
