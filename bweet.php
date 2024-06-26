<?php
include "inc/main.php";
if(!isset($_USER)) die(header("Location: /"));
function secondsToTime($seconds) {
  $dtF = new \DateTime('@0');
  $dtT = new \DateTime("@$seconds");
  if($seconds > 24*60*60) {
    return $dtF->diff($dtT)->format('%a days and %h hours');
  } elseif($seconds > 60*60) {
    return $dtF->diff($dtT)->format('%h hours and %i minutes');
  } elseif($seconds > 60) {
    return $dtF->diff($dtT)->format('%i minutes and %s seconds');
  } else {
    return $dtF->diff($dtT)->format('%s seconds');
  }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' & $_USER["flags"] != TYPE_SUSPENDED) {
  $content = trim($_POST["content"]);
  if(strlen($content) > 140) {
    $_SESSION["notice"] = "Update cannot be longer than 140 characters.";
    die(header("Location: /"));
  } elseif(strlen($content) < 1) {
    $_SESSION["notice"] = "Update cannot be blank.";
    die(header("Location: /"));
  }

  $content = htmlspecialchars($content);

  $uid = $_USER["id"];
  if(is_restricted($_USER, "BWEET")) {
    $left = secondsToTime(restricted($_USER, "BWEET"));
    $_SESSION["notice"] = "Your ability to Bweet is restricted for $left.";
    die(header("Location: /"));
  } elseif(is_restricted($_USER, "RATELIMIT")) {
    $left = restricted($_USER, "RATELIMIT");
    $_SESSION["notice"] = "Can't bweet for another ".($left > 60 ? (floor(($left/60)*10)/10)." minutes" : "$left seconds").".";
    die(header("Location: /"));
  }
  $id = $snowflake->id();
  $timestamp = time();

  $stmt = $db->prepare("INSERT INTO `tweets` (`content`, `user`, `timestamp`) VALUES ( ?, ?, ?)");
  if(!$stmt || !$stmt->bind_param("sii", $content, $uid, $timestamp) || !$stmt->execute()) {
    $_SESSION["notice"] = "Internal server error.\r\n";
    $_SESSION["notice"] .= $db->error;
    die(header("Location: /"));
  }

  $time = 60;
  if($_USER["flags"] & TYPE_ADMIN)
    $time = 10;

  restrict($_USER, "RATELIMIT", $time);
  die(header("Location: /"));
} else die(header("Location: /"));
?>