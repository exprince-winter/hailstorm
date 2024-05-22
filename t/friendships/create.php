<?php
include "../../inc/formmain.php";
if(!isset($_USER)) die(header("Location: /"));

if($_USER["flags"] !== TYPE_SUSPENDED) { 
  $stmt = $db->prepare("INSERT INTO `followers` (`userid`, `personid`, `status`) VALUES (?, ?, ?)");
  $id = $_USER["id"];
  
  if (!is_numeric($_GET["id"]) or !isset($_GET["id"])) {
	  die("id is not set or invaild.");
  } else {
	  $person = $_GET["id"];
  }
  
  if ($person == $id) {
	  die("Thats you..?");
	  $err = "Thats you..?";	  
  }
  
  $checkuser = mysqli_query($db, "SELECT * FROM `users` WHERE `id` = '$person'");
  $checkeduser = mysqli_num_rows($checkuser);
  if ($checkeduser == "" or $checkeduser == 0) {
	  die("user does not exist.");
	  $err = "user does not exist";  
  }
  
  // TODO: make this check if someone is hidden
  $stat = "1";
  
  
  
  
  $checkerquery = mysqli_query($db, "SELECT * FROM `followers` WHERE `userid` = '$id' AND `personid` = '$person'");
  $checked = mysqli_num_rows($checkerquery);
  if ($checked >= 1) {
	  die("Already friended!");
	  $err = "Already friended!";	  
  }
  
  
 $continue = true;
 
  if($continue) {
      $stmt->bind_param("iii", $id, $person, $stat);
      $stmt->execute();
      die(header("Location: /")); 
  }
  if(isset($err)) $_SESSION['notice'] = $err;
  
} else die(header("Location: /"));

?>
