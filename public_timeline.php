<?php include_once "inc/main.php";
$page = !empty($_GET['page']) ? (int) $_GET['page'] : 1;
$total = count($_ATWEETS);
$limit = 100;
$totalPages = ceil($total/ $limit);
$page = max($page, 1);
$page = min($page, $totalPages);
$offset = ($page - 1) * $limit;
if($offset < 0) $offset = 0;

$_STWEETS = array_slice($_ATWEETS, $offset, $limit);
$feat = true;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<?php include "inc/head.php"; ?>

<body class="account" id="front">
  <?php include "inc/css.php"; ?>

  <div id="container" class="subpage">
    <?php include "inc/header.php"; ?>
    <div id="content">
		
		
		
		
      <div class="wrapper">

        <h3>Look at what these people are doing right now&hellip;</h3>
        <table class="doing" id="timeline" cellspacing="0">
          <?php foreach($_STWEETS as $_STATUS) { render_bweet($_STATUS); } ?>
        </table>
        <?php include "inc/paginator.php"; ?>
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