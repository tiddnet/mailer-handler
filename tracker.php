<?php
include_once('my_func.php');
// Get input, record it. 

//$my_id; 
//$my_campaign;
// $track_ip = getUserIP();


//echo "<br>UA: $track_ua";
//echo "<br>IP: $track_ip";
$result = emailOpen($conn, $my_email, $my_campaign, $track_ua);


header('Content-Type: image/png');
echo base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAAA1BMVEUAAACnej3aAAAAAXRSTlMAQObYZgAAAApJREFUCNdjYAAAAAIAAeIhvDMAAAAASUVORK5CYII=');

?>
