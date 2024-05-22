<?php
include "../../inc/formmain.php";
if(!isset($_USER)) die(header("Location: /"));

//
if($_SERVER['REQUEST_METHOD'] === 'POST' && ~$_USER["flags"] & TYPE_SUSPENDED) { 
  $stmt = $db->prepare("UPDATE `users` SET `fullname` = ?, `email` = ?, `username` = ?, `bio` = ?, `location` = ?, `web` = ?, `timezone` = ? WHERE `id` = ?");
  $fullname = htmlspecialchars($_POST["fullname"]);
  $email = htmlspecialchars($_POST["email"]);
  $username = htmlspecialchars($_POST["username"]);
  $timezone = htmlspecialchars($_POST["time_zone"]);
  
  if ($_USER["username"] != $username) {
  $newinfq = mysqli_query($db, "SELECT * FROM users WHERE username='$username'");
  $newinfa = mysqli_num_rows($newinfq);
  if ($newinfa >= 1) {
	  $err = "This username is already taken.";
	  die(header("Location: /"));
  }
  }
  
  $bio = htmlspecialchars($_POST["bio"]);
  $web = htmlspecialchars($_POST["url"]);
  $location = htmlspecialchars($_POST["loc"]);
  
 $continue = true;
	  
	  
	  
  if($continue) {
	  
	  
    if (!preg_match("/^[a-zA-Z0-9- ]{1,64}$/", $fullname)) {
      $err = "Only alphanumerical characters, spaces and hyphens allowed in name.";
    } elseif (!empty($web) && !filter_var($web, FILTER_VALIDATE_URL)) {
      $err = "Invalid web.";
    } elseif (strlen($bio) > 160) {
      $err = "Bio can't be longer than 160 characters.";
    } elseif (strlen($location) > 64) {
      $err = "Location can't be longer than 64 characters.";
    } elseif (!preg_match("/^[a-zA-Z0-9]{1,64}$/\s/", $username)) {
      $err = "Only alphanumerical characters  are allowed in username.";
    } else {
      $uid = $_SESSION["uid"];
      $stmt->bind_param("sssssssi", $fullname, $email, $username, $bio, $location, $web, $timezone, $uid);
      $stmt->execute();
      die(header("Location: /account/settings"));
    }
  }
  
  if(isset($err)) $_SESSION['notice'] = $err;
  die(header("Location: /"));
} else die(header("Location: /"));

?>
