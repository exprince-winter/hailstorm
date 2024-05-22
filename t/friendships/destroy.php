<?php
include "../../inc/formmain.php";
if(!isset($_USER)) die(header("Location: /"));

if($_USER["flags"] !== TYPE_SUSPENDED) { 
  $stmt = $db->prepare("DELETE FROM `followers` WHERE personid = ? AND userid = ?");
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
  
  $checkuser = mysqli_query($db, "SELECT * FROM `followers` WHERE `userid` = '$id' AND `personid` = '$person'");
  $checkeduser = mysqli_num_rows($checkuser);
  if ($checkeduser == "" or $checkeduser == 0) {
	  die("Not followed.");
	  $err = "Not followed.";  
  }
  
  
 $continue = true;
 
  if($continue) {
      $stmt->bind_param("ii", $person, $id);
      $stmt->execute();
      die(header("Location: /")); 
  }
  if(isset($err)) $_SESSION['notice'] = $err;
  
} else die(header("Location: /"));

?>
