<?php include_once "inc/main.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<?php include "inc/head.php"; ?>

<body class="account" id="front">
  <?php include "inc/css.php"; ?>

  <div id="container" class="subpage">
    <?php include "inc/header.php"; ?>
    <div id="content">
      <div class="wrapper">	
			<h2><?=$site ?>, Help!</h2>

<p>Below you will find a few helpful text and links. However, if you're really stuck, feel free to <a href="/help/contact">contact us</a> and we'll fix you right up.</p>


<h3>Six Frequently Asked Questions <small><a href="#">(Read all)</a></small></h3>

<h4>How does <?=$site ?> work?</h4>

<p>uhhh 2007 twitter idk</p>

<br>

<h4>Are my updates public?</h4>

<p>Currently are, however I'm workin' on it!</p>

<br>

<h4>Mobile?</h4>

<p>There currently no mobile.</p>

<br>

<h4>How do I delete my account?</h4>

<p>Sad to see you go, please <a href="mailto:<?=$mail?>">send me an email</a><?php if ($dis !== "") {?> or <a href="<?=$dis ?>">ask me on discord</a><?php } ?> as theres no delete account button in settings yet...</p>

<br>

<h4>Is this based on <a href="">Bwitter</a>?</h4>

<p>Yes.</p>

<br>

<h4>Do I still get phone updates when I use Twitter with chat?</h4>

<p>No. Logging into chat automatically turns off your phone alerts. When you’re done with chat, text ON to Twitter to get your updates on your phone. Questions? <a href="http://web.archive.org/web/20070205204714/http://twttr.helpspothosting.com/index.php?pg=request">Write us</a>.</p>

		</div>
    </div>
    <hr />
    <?php include "inc/side.php"; ?>
    <hr />
    <hr />
    <?php include "inc/footer.php"; ?>
  </div>
</body>

</html>