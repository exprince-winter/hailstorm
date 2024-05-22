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
			<h2>About Us</h2>
			<p>
			<?php if ($site != 'Bwitter') { ?>
			Based on Bwitter, which,
			<?php } else { ?>
			Bwitter
			<?php } ?>
			 was made when a person named <a href="https://github.com/ashley-graves">Ashley</a> decided to make a twitter revival. They open-sourced it in October 2022, then shutting it down in November due to lack of interest.
			</p>
			<p>
			However, in 2024 a person named <a href="https://github.com/exprince-winter">Winter</a> updated the source to be more accurate. This project is using that source.
			</p>
			<p></p>
			<div id="bio-pics"><div>
		<a href="/prince_winter" title="Winter"><img alt="Winter" src="/account/profile_image/1.jpg"></a>
		</div>
</div>

<p>
	Visit the <a href="/blog"><?=$site ?> blog</a>
	for more up-to-date info about <?=$site ?>.  Please <a href="/help/contact">contact us</a>
	with any service questions, business development or press inquiries.
</p>
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