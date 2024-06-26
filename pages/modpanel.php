<?php include_once "inc/main.php";
$page = isset($args[1]) ? $args[1] : "home";
if(!file_exists("pages/mod/$page.php")) {
  include "pages/error/404.php";
  exit;
}
$pages = array("home", "reports", "users");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<?php include "inc/ahead.php"; ?>

<body class="sessions" id="new">
  <?php include "inc/css.php"; ?>

  <div id="container">
    <?php include "inc/header.php"; ?>
    <div id="content">
      <div class="wrapper">
        <div class="hfeed">
          <div class="desc hentry">
            <div class="entry-title entry-content" style="background:white;padding:6px;">
              <h4>&nbsp;Mod Panel</h4>
            </div>
          </div>
        </div>
        <ul class="tabMenu">
<?php foreach($pages as $_PAGE) { ?>
          <li <?=$page == $_PAGE ? 'class="active"' : ""?>><a href="/mod<?=$_PAGE != "home" ? "/$_PAGE" : ""?>"><?=ucwords($_PAGE)?></a></li>
<?php } ?>
        </ul>
        <div class="tab">
          <?php include "pages/mod/$page.php"; ?>
        </div>
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