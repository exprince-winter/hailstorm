<?php
include "../../inc/formmain.php";
if(!isset($_USER)) die(header("Location: /"));

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
  
  
  
        $f = "./../../account/profile_image/$_USER[id].jpg";
        if(file_exists($f)) unlink($f);
        rename($file, $f);
      if($stmt->error) $err = $stmt->error; else {
        die(header("Location: /"));
      }

} else die(header("Location: /"));
?>
