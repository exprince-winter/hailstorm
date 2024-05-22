<?php
include "../../inc/formmain.php";
if(!isset($_USER)) die(header("Location: /"));

//
if($_SERVER['REQUEST_METHOD'] === 'POST' && ~$_USER["flags"] & TYPE_SUSPENDED) { 
  $stmt = $db->prepare("UPDATE `users` SET `bg` = ?, `bgcolor` = ?, `bgrepeat` = ?, `side` = ?, `sideborder` = ?, `text` = ?, `link` = ? WHERE `id` = ?");
 $bgimage = htmlspecialchars($_POST["bgi"]);
 $bgcolor = htmlspecialchars($_POST["bgc"]);
 $side = htmlspecialchars($_POST["sbc"]);
 $sideborder = htmlspecialchars($_POST["sbb"]);
 $link = htmlspecialchars($_POST["ac"]);
 $text = htmlspecialchars($_POST["tc"]);
 if ($_POST["bgr"] === "1") {
	 $repeat = "repeat";
 } else {
	 $repeat = "no-repeat";
 }
  
 $continue = true;
	  
	  
	  
  if($continue) {
	  
	  
    if (!empty($web) && !filter_var($bgi, FILTER_VALIDATE_URL)) {
      $err = "Invalid background, must be link!";
    } elseif (strlen($bgcolor) > 7) {
      $err = "Hex too long.";
    } elseif (strlen($side) > 7) {
      $err = "Hex too long.";
    } elseif (strlen($sideborder) > 7) {
      $err = "Hex too long.";
    } elseif (strlen($link) > 7) {
      $err = "Hex too long.";
    } else {
      $uid = $_SESSION["uid"];
      $stmt->bind_param("sssssssi", $bgimage, $bgcolor, $repeat, $side, $sideborder, $text, $link, $uid);
      $stmt->execute();
      die(header("Location: /account/design"));
    }
  }
  
  if(isset($err)) $_SESSION['notice'] = $err;
  die(header("Location: /"));
} else die(header("Location: /"));

?>
