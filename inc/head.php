<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="Content-Language" content="en-us" />
  <?php if (isset($fulltitle)) { 
  echo '<title>' . $fulltitle . '</title>';
  } else {?>
  <title><?=$site ?> / <?php $current_url = $_SERVER['REQUEST_URI']; 
$parts = explode('/', $current_url);
$number = $parts[count($parts) - 1];
if (isset($_PROFILE)) {
	echo $number;
} else {
	echo ucfirst($number);
}?></title>
  <?php } ?>
  <link href="/assets/screen.css?<?=time()?>" media="screen, projection" rel="stylesheet" type="text/css" />
  <link rel="shortcut icon" href="/images/logo/<?=$logo?>-favi.png" type="image/png" />
  <script src="/assets/main.js?<?=time()?>"></script>
  <?php if(isset($_SINGLE) && $_SINGLE) { ?>
  <meta property="og:title" content="<?=$_PROFILE["username"]?> (@<?=$_PROFILE["username"]?>)">
  <meta property="og:url" content="/<?=$_PROFILE["username"]?>/statuses/<?=$_STATUS["id"]?>">
  <meta property="og:description" content="<?=htmlentities($_STATUS["content"], ENT_QUOTES)?>">
  <meta content="#1DA1F2" data-react-helmet="true" name="theme-color" />
  <?php } ?>
</head>