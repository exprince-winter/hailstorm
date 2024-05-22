<?php include_once "inc/main.php";

if(!isset($_USER)) die(header("Location: /login?return=".urlencode($_SERVER["REQUEST_URI"])));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<?php include "inc/head.php"; ?>

<body class="account" id="front">
  <?php include "inc/css.php"; ?>

  <div id="container" class="subpage">
    <?php include "inc/header.php"; ?>
    <div id="content" style="background: none;">
	<form action="/bweet" method="POST" id="doingForm">
          
          <div class="bar">
            <h3 style="margin: 0;">What are you doing?</h3>
            <span>
              Characters available: 
            <b id="length">140</b>
            </span>
          </div>
        <div class="info">
          <script>
            function u(e) {
              if (e.value.length > e.maxLength) {
                e.value = e.value.substr(0, e.maxLength);
              }
              document.getElementById('length').innerText = e.maxLength - e.value.length;
            }
          </script>
          <textarea name="content" maxlength="140" id="" cols="30" rows="4" oninput="u(this);"></textarea>
           </div>
          <div class="submit">
       <input type="submit" id="submit" value="Update">
        </div>
        </form>
		
		<?php if(!empty($_NOTICE)) { ?>
        <div
          style="border: 5px solid #87BC44; background: white; font-weight: bold; padding: 10px; margin:10px; font-size:1.1em">
          <?=parse_bweet($_NOTICE)?></div>
        <?php } ?>
		
		<div class="tabMenu">
		
		<?php if (!isset($_GET["t"]) or $_GET["t"] != "a") { ?>
        <li>
		<?php } else { ?>
		<li class="active">
		<?php } ?>
          <a href="/home?t=a">Archive</a>
        </li>
		
        <?php if (!isset($_GET["t"]) or $_GET["t"] != "a") { ?>
        <li class="active">
		<?php } else { ?>
		<li>
		<?php } ?>
          <a href="/home">Public Timeline</a>
        </li>
		
      </div>
		
      <div class="wrapper">
		<?php if (!isset($_GET["t"]) or $_GET["t"] != "a") { ?>
        <h2>What you and everyone else is doing...</h2>
        <table class="doing" id="timeline" cellspacing="0">
          <?php foreach($_ATWEETS as $_STATUS) { render_bweet($_STATUS); } ?>
        </table>
		<?php } else { ?>
		<h2>Your Updates</h2>
        <table class="doing" id="timeline" cellspacing="0">
		<?php include "inc/archive.php"; ?>
		</table>
		<?php }?>
        
      </div>
	  
    </div>
    <hr />
    <?php include "inc/side.php"; ?>
    <hr />
    <hr />
    <?php include "inc/footer.php"; ?>
  </div>
</body>
<?php ?>

</html>