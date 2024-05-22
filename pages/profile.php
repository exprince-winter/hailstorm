<?php include_once "inc/main.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<?php
$number = $_SERVER['REQUEST_URI']; 
if (strpos($number, '/statuses/') !== false) {
	$fulltitle = $site . " / " .$_PROFILE["fullname"] .': ' . mb_strimwidth($_STATUS["content"], 0, 27, "...");
}

include "inc/head.php"; ?>

<body class="sessions" id="new">
  <style type="text/css">
	  body {
			color: <?php echo $_PROFILE["text"] ?>;
			background-color: <?php echo $_PROFILE["bgcolor"] ?>;
			background: <?php echo $_PROFILE["bgcolor"] ?> url(<?php echo $_PROFILE["bg"] ?>) fixed <?php echo $_PROFILE["bgrepeat"] ?> top left;
			text-align: center; 
			font: 0.75em/1.5 Helvetica, Arial, sans-serif; 
		}
		
		a {color: <?php echo $_PROFILE["link"] ?>;}
		h2.thumb, h2.thumb a {color: <?php echo $_PROFILE["text"] ?>;}
		
		
		
		#side {
			background-color: <?php echo $_PROFILE["side"] ?>;
			border: 1px solid <?php echo $_PROFILE["sideborder"] ?>;
			
		}
		

		#side .notify {border: 1px solid <?php echo $_PROFILE["sideborder"] ?>;}
		#side .actions {border: 1px solid <?php echo $_PROFILE["sideborder"] ?>;}
		
  </style>

  <div id="container">
  <?php if (!$_SINGLE) { ?>
    <?php include "inc/header.php"; ?>
    <div id="content">
      <?php if(isset($err)) { ?>
      <p><?php print_r($err); ?></p>
      <?php } ?>

      <div class="wrapper">
        <h2 class="thumb">
          <a href="/account/profile_image/<?=$_PROFILE["id"]?>.jpg"><img alt="Loom-icon" border="0"
              src="/account/profile_image/<?=$_PROFILE["id"]?>.jpg" alt="<?=$_PROFILE["fullname"]?>" valign="middle" /></a>
          <?php if(!$_SINGLE) { ?>
          <?=$_PROFILE["username"]?>
          <?php } else { ?>
          <a href="/<?=$_PROFILE["username"]?>"><?=$_PROFILE["username"]?></a>
          <?php } ?><?=isset($_PROFILE["badge"]) ? " <i class=\"badge $_PROFILE[badge]\"></i>" : "" ?>
          
        </h2>

        <div class="hfeed">
          <?php if ($_PROFILE["flags"] != "18") { ?>
          <div class="desc">
		  
            <p><?=parse_bweet($_STATUS["content"])?></p>
            <p class="meta entry-meta">
              <a href="/<?=$_PROFILE["username"]?>/statuses/<?=$_STATUS["id"]?>" class="entry-date" rel="bookmark"><abbr
                  class="published"><?=time_since($_STATUS["timestamp"])?></abbr></a> from
              web
              <span id="status_actions_<?=$_STATUS["timestamp"]?>"></span>
            </p>
          </div>
          
          <?php if(!$_SINGLE && count($_TWEETS) > 0) { ?>
          <ul class="tabMenu">
			<li>
				<a href="/<?=$_PROFILE["username"]?>/with_friends">With Friends (24h)</a>
			</li>
			<li class="active">
				<a href="/<?=$_PROFILE["username"]?>">Previous</a>
			</li>
		  </ul>
          <div class="tab">
            <table class="doing" id="timeline" cellspacing="0">
              <?php foreach($_TWEETS as $_STATUS) { render_bweet($_STATUS); } ?>
            </table>
          </div>
          <?php } ?>
		  <?php } else { ?>
		   <div class="desc">
		  
            <p>I'm only giving updates to friends <a href="#">add me</a>.</p>
           
          </div>
		  <?php } ?>
        </div>
      </div>
	  
    </div>
    <hr />
    <?php include "inc/side.php"; ?>
    <hr />
    <hr />
    <?php include "inc/footer.php"; ?>
	<?php } else { ?>
	  <div id="content"><div class="wrapper">	
			

<div id="permalink">
	
	
    	<div class="desc">
    		<p>
    		
    		  <?=parse_bweet($_STATUS["content"])?>
    		
    		</p>
    		<p class="meta">
    			<span class="meta">
    				
    				    					 <?=time_since($_STATUS["timestamp"])?>
    				    				from web
					  
						    				<span id="status_actions_<?=$_STATUS["id"]?>">
</span>

    			</span>
    		</p>
    	</div>
	
	<h2 class="thumb">
		<a href="/<?=$_PROFILE["username"]?>"><img alt="<?=$_PROFILE["username"]?>" src="/account/profile_image/<?=$_PROFILE["id"]?>.jpg"></a>
		<a href="/<?=$_PROFILE["username"]?>"><?=$_PROFILE["fullname"]?></a>
	</h2>

		<div id="ad">
		 <iframe src="https://fazlabz-dev.github.io/openlink/embed.html" width="234" height="60" frameborder="0" name="neolink"></iframe>
		</div>
	 <?php }?>
  </div>
</body>

</html>