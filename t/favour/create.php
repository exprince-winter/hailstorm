<?php
include "../../inc/formmain.php";
if(!isset($_USER)) die(header("Location: /"));

if($_USER["flags"] !== TYPE_SUSPENDED) { 
  $stmt = $db->prepare("INSERT INTO `favour` (`userid`, `tweetid`) VALUES (?, ?)");
  $id = $_USER["id"];
  
  if (!is_numeric($_GET["id"]) or !isset($_GET["id"])) {
	  die("id is not set or invaild.");
  } else {
	  $tweet = $_GET["id"];
  }
  
  $checkuser = mysqli_query($db, "SELECT * FROM `tweets` WHERE `id` = '$tweet'");
  $checkeduser = mysqli_num_rows($checkuser);
  if ($checkeduser == "" or $checkeduser == 0) {
	  die("tweet does not exist.");
	  $err = "tweet does not exist";  
  }
  
  $checkerquery = mysqli_query($db, "SELECT * FROM `favour` WHERE `userid` = '$id' AND `tweetid` = '$tweet'");
  $checked = mysqli_num_rows($checkerquery);
  if ($checked >= 1) {
	  die("Already favourited!");
	  $err = "Already favourited!";	  
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
