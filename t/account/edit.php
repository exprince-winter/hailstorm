<?php
include "inc/main.php";
if(!isset($_USER)) die(header("Location: /"));

if (isset($_GET["picture"])) {
	if($_SERVER['REQUEST_METHOD'] === 'POST' && ~$_USER["flags"] & TYPE_SUSPENDED) {
		 $avatarxd = $_FILES["profile_image"];
		 
		  $img = true;
  $continue = true;
  if(!isset($_FILES["profile_image"]) || !file_exists($_FILES["profile_image"]["tmp_name"])) {
    $img = false;
  } else {
    $file = $_FILES["profile_image"]["tmp_name"];
    if((mime_content_type($file) !== "image/jpeg" && mime_content_type($file) !== "image/png") || getimagesize($file) === false) {
      $continue = false;
      $err = "Invalid Image.";
    }
  }

  if($img) {
  list($width, $height) = getimagesize($file);
  $src = imagecreatefromstring(file_get_contents($file));
  $dst = imagecreatetruecolor(48, 48);
  imagecopyresampled($dst, $src, 0, 0, 0, 0, 48, 48, $width, $height);
  imagedestroy($src);
  $filepath = pathinfo($file, PATHINFO_DIRNAME);
  $filename = pathinfo($file, PATHINFO_FILENAME).".jpg";
  $file = $filepath.DIRECTORY_SEPARATOR.$filename;
  if(file_exists($file)) unlink($file);
  imagejpeg($dst, $file);
  imagedestroy($dst);
  }
  
  if($img) {
        $f = "account/profile_image/$_USER[id].jpg";
        if(file_exists($f)) unlink($f);
        rename($file, $f);
      }
      if($stmt->error) $err = $stmt->error; else {
        
      }
}
}


//

if($_SERVER['REQUEST_METHOD'] === 'POST' && ~$_USER["flags"] & TYPE_SUSPENDED) {
  if(!empty($_POST["new_password"])) {
    $stmt = $db->prepare("UPDATE `users` SET `fullname` = ?, `email` = ?, `username` = ?, `bio` = ?, `location` = ?, `web` = ?, `timezone` = ?, `password` = ? WHERE `id` = ?");
    $new_password = $_POST["new_password"];
    $new_password = password_hash($new_password, PASSWORD_DEFAULT);
  } else {
    $stmt = $db->prepare("UPDATE `users` SET `fullname` = ?, `email` = ?, `username` = ?, `bio` = ?, `location` = ?, `web` = ?, `timezone` = ? WHERE `id` = ?");
  }
  $fullname = htmlspecialchars($_POST["fullname"]);
  $email = htmlspecialchars($_POST["email"]);
  $username = htmlspecialchars($_POST["username"]);
  $timezone = htmlspecialchars($_POST["time_zone"]);
  $password = $_POST["password"];
  
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
    } else {
      $uid = $_SESSION["uid"];
      if(isset($new_password)) {
        $stmt->bind_param("ssssssssi", $fullname, $email, $username, $bio, $location, $web, $timezone, $new_password, $uid);
      } else {
        $stmt->bind_param("sssssssi", $fullname, $email, $username, $bio, $location, $web, $timezone, $uid);
      }
      $stmt->execute();
        die(header("Location: /"));
    }
  }
  if(isset($err)) $_SESSION['notice'] = $err;
  die(header("Location: /"));
} else die(header("Location: /"));
?>
