<?php
include "./../inc/settingsmain.php";
header( "content-type: application/json");

echo "[";

foreach($_ATWEETS as $_STATUS) {
 // nullifying!
 if ($_STATUS["user"]["bio"] != null) {
	 $bio = '"' . $_STATUS["user"]["bio"] . '"';
 } else {
	 $bio = "null";
 }
 
 if ($_STATUS["user"]["location"] != null) {
	 $loc = '"' . $_STATUS["user"]["location"] . '"';
 } else {
	 $loc = "null";
 }
 
 //
  
  echo '{"user": {"name": "' .  $_STATUS["user"]["fullname"] . '", "id": ' .  $_STATUS["user"]["id"] . ', "description": ' .  $bio . ', "screen_name": "' . $_STATUS["user"]["username"] .'", "location": ' . $loc . '}, "text": "' . htmlspecialchars($_STATUS["content"]) . '", "id": ' . $_STATUS["id"] . ', "relative_created_at": "' . time_since($_STATUS["timestamp"]) . '", "created_at": "' . $_STATUS["timestamp"] . '"}, ';
}

echo "]";
?>