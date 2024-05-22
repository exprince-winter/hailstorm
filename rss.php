<?php
include "inc/main.php";
header( "Content-type: application/rss+xml; charset=utf-8");
?>
<?xml version="1.0" encoding="UTF-8">
<rss version="2.0">
	<channel>
		<title>Bwitter public timeline</title>
		<link>http://<?php echo $_SERVER['HTTP_HOST'];?>/public_timeline</link>
		<description>Bwitter updates from everyone!</description>
		<language>en-us</language>
		<ttl>40</ttl>
	<?php

foreach($_ATWEETS as $_STATUS) {
  $u = $_STATUS["user"]["username"];
  $d = htmlspecialchars($_STATUS["content"]);
  $t = time_since($_STATUS["timestamp"]); ?>
  <item>
      <title><?php echo $u . ": " . $d; ?></title>
      <description><?php echo $u . ": " . $d; ?></description>
      <pubDate><?php $t ?></pubDate>
      <guid>http://<?php echo $_SERVER['HTTP_HOST'] . '/' . $u . '/statuses/' . $_STATUS["id"] ?></guid>
      <link>http://<?php echo $_SERVER['HTTP_HOST'] . '/' . $u . '/statuses/' . $_STATUS["id"] ?></link>
    </item>
    
<?php } ?>
</channel></rss>