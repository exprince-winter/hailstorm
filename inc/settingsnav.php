<?php
// rewrite this entire thing probably
$current_url = $_SERVER['REQUEST_URI']; 
$parts = explode('/', $current_url);
$number = $parts[count($parts) - 1];

if ($number == "settings") {
	$tab = "se";
}

if ($number == "password") {
	$tab = "p";
}

if ($number == "phone") {
	$tab = "ph";
}

if ($number == "notifications") {
	$tab = "no";
}

if ($number == "picture") {
	$tab = "pi";
}

if ($number == "design") {
	$tab = "de";
}
?>
			<div id="settingsNav">
				<?php if ($tab == "se") { ?>
				Account
				<?php } else { ?>
				<a href="/account/settings">Account</a>
				<?php } ?>
				|
				<?php if ($tab == "pa") { ?>
				Password
				<?php } else { ?>
				<a href="/account/password">Password</a>
				<?php } ?>
				|
				<?php if ($tab == "ph") { ?>
				Phone & IM
				<?php } else { ?>
				<a href="/account/phone">Phone & IM</a>
				<?php } ?>
				|
				<?php if ($tab == "no") { ?>
				Notifications
				<?php } else { ?>
				<a href="/account/notifications">Notifications</a>
				<?php } ?>
				|
				<?php if ($tab == "pi") { ?>
				Picture
				<?php } else { ?>
				<a href="/account/picture">Picture</a>
				<?php } ?>
				|
				<?php if ($tab == "de") { ?>
				Design
				<?php } else { ?>
				<a href="/account/design">Design</a>
				<?php } ?>
				
				<?php if ($tab == "ph") { ?>
				<p>Bwitter is more fun when used through you mobile phone or instant messenger client. Set yours up!</p>
				<?php }?>
			</div>