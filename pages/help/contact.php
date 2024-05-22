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
			<h2>Email us!</h2>
<ul>
	<li>For any inquires, questions, takedowns, or anything revolving the site please contact through my email (<a href="mailto:<?=$mail?>"><?=$mail?></a>)<?php if ($dis != null) { ?> or through <a href="<?=$dis?>">Discord</a><?php } ?>.</li>
</ul>
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