<?php
include "../../inc/formmain.php";
if(!isset($_USER)) die(header("Location: /"));

if($_USER["flags"] !== TYPE_SUSPENDED) { 
  $stmt = $db->prepare("DELETE FROM `favour` WHERE userid = ? AND tweetid = ?");
  $id = $_USER["id"];
  
  if (!is_numeric($_GET["id"]) or !isset($_GET["id"])) {
	  die("id is not set or invaild.");
  } else {
	  $tweet = $_GET["id"];
  }
  
  $checktweet = mysqli_query($db, "SELECT * FROM `tweets` WHERE `id` = '$tweet'");
  $checkedtweet = mysqli_num_rows($checktweet);
  if ($checkedtweet == "" or $checkedtweet == 0) {
	  die("tweet does not exist.");
	  $err = "tweet does not exist";  
  }
  
  $checkerquery = mysqli_query($db, "SELECT * FROM `favour` WHERE `userid` = '$id' AND `tweetid` = '$tweet'");
  $checked = mysqli_num_rows($checkerquery);
  if ($checked === 0) {
	  die("Not favorited.");
	  $err = "Not favoritied.";	  
  }
  
  
 $continue = true;
 
  if($continue) {
      $stmt->bind_param("ii", $id, $tweet);
      $stmt->execute();
      die(header("Location: /")); 
  }
  if(isset($err)) $_SESSION['notice'] = $err;
  
} else die(header("Location: /"));

?>
