<div id="side">
  <?php if(!isset($_PROFILE)) { ?>
  <?php if(!isset($_USER)) { ?>
  <div class="msg">
    <h3>Please Sign In!</h3>
  </div>
  <form method="post" class="signin" action="/sessions">
    <fieldset>
      <div>
        <label for="username_or_email">Username or Email</label>
        <input id="email" name="username_or_email" type="text" />
      </div>
      <div>
        <label for="password">Password</label>
        <input id="pass" name="password" type="password" />
      </div>
      <input id="remember_me" name="remember_me" type="checkbox" value="1" /> <label for="remember_me">Remember
        me</label>
      <small><a href="/account/resend_password">Forgot?</a></small>
      <input id="submit" name="commit" type="submit" value="Sign In!" />
    </fieldset>
  </form>

  <script type="text/javascript">
    document.getElementById('email').focus()
  </script>

  <div class="notify">
    Want an account?<br />
    <a href="/signup" class="join">Join for Free!</a><br />
    It&rsquo;s fast and easy!
  </div>
  
  
  
  <?php } else { 
  $id = $_USER['id'];
  
  $favourget = mysqli_query($db, "SELECT * FROM favour WHERE userid='$id'");
  $favourcount = mysqli_num_rows($favourget);
  
  $tweetget = mysqli_query($db, "SELECT * FROM tweets WHERE user='$id'");
  $tweetcount = mysqli_num_rows($tweetget);
  
  $followingget = mysqli_query($db, "SELECT * FROM followers WHERE userid='$id' AND status=1");
  $followingcount = mysqli_num_rows($followingget);
  
  $followget = mysqli_query($db, "SELECT * FROM followers WHERE personid='$id' AND status=1");
  $followcount = mysqli_num_rows($followget);
  
  ?>
  <div class="msg">
    <h3 style="margin: 0;padding: 0;">Welcome,</h3>
    <strong><a href="/<?=$_USER["username"]?>"><?=$_USER["username"]?></a></strong>
  </div>
  <ul>
   <li>Currently: <i><?=count($_MYTWEETS) > 0 ? $_MYTWEETS[0]["content"] : "N/A"?></i></li>
   <br>
   <li>0 Direct Messages</li>
   <li><?=$favourcount?> Favorite<?php if ($favourcount != "1") { echo 's'; }?></li>
   <li><?=$followingcount?> Friend<?php if ($followingcount != "1") { echo 's'; }?></li>
   <li><?=$followcount?> Follower<?php if ($followcount != "1") { echo 's'; }?></li>
   <li><?=$tweetcount?> Update<?php if ($tweetcount != "1") { echo 's'; }?></li>
  </ul>
  
  <?php if(isset($_USER) && ($_USER["flags"] & TYPE_MODERATOR || $_USER["flags"] & TYPE_ADMIN)) { ?>
  <ul class="admin">
  <strong>Secret stuff</strong>
    <?php if($_USER["flags"] & TYPE_ADMIN) { ?>
    <li><a href="/admin">Admin panel</a></li>
    <?php } ?>
    <li><a href="/mod">Mod panel</a>
      <?php if(count($_REPORTS) > 0) { ?>
      <small class="b"><?=count($_REPORTS)?></small>
      <?php } ?>
    </li>
  </ul>
  
  <?php } ?>
  <div id="friends">
  <?php
	$sql = "SELECT personid FROM followers WHERE userid='$id' AND status=1";
    $result = $db->query($sql);



if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) { 
	$peopleid = $row["personid"];
	
	$peoplesql = "SELECT * FROM `users` WHERE `id` = '$peopleid'";
    $peoplesqlr = $db->query($peoplesql);
	if ($peoplesqlr->num_rows > 0) {
    while($rowed = $peoplesqlr->fetch_assoc()) {
		$username = $rowed["username"];	
		$title = $rowed["fullname"];		
		}
		}




	
	?>
		
		<a href="/<?=$username?>" rel="contact" title="<?=$title?>">
			<img alt="<?=$title?>" height="24" src="/account/profile_image/<?=$peopleid?>.jpg" width="24" />
		</a>
		
		<?php
	}
	} $db->close();
?>
</div>
  <?php } ?>
  
  <?php
  if (isset($feat)) {?>
  <ul class="featured">
    <li><strong>Featured</strong></li>
    <!-- currently hardcoded, ill fix it later-->
    <li>
      <a href="/prince_winter"><img alt="Logo" height="24" src="/account/profile_image/1.jpg" width="24" /></a>
      <a href="/prince_winter">Winter</a>
    </li>
    
  </ul>
  <?php } ?>
  
  <?php } else { 
  $profile = $_PROFILE["id"];
  
  $favourget = mysqli_query($db, "SELECT * FROM favour WHERE userid='$profile'");
  $favourcount = mysqli_num_rows($favourget);
  
  $tweetget = mysqli_query($db, "SELECT * FROM tweets WHERE user='$profile'");
  $tweetcount = mysqli_num_rows($tweetget);
  
  $followingget = mysqli_query($db, "SELECT * FROM followers WHERE userid='$profile' AND status=1");
  $followingcount = mysqli_num_rows($followingget);
  
  $followget = mysqli_query($db, "SELECT * FROM followers WHERE personid='$profile' AND status=1");
  $followcount = mysqli_num_rows($followget);
  
  
  
  
  ?>
  <div class="msg">
    <h3 style="margin: 0;padding: 0;">About</h3>
    <strong><?=$_PROFILE["username"]?></strong>
  </div>
  <ul class="about">
   <li>Name: <?=$_PROFILE["fullname"]?></li>

  <?php if(!empty($_PROFILE["bio"])) { ?>
  <li>Bio: <?=$_PROFILE["bio"]?></li>
  <?php } ?>

  <?php if(!empty($_PROFILE["location"])) { ?>
  <li>Location: <?=$_PROFILE["location"]?></li>
  <?php } ?>

  <?php if(!empty($_PROFILE["web"])) { ?>
  <li>Web: <a href="<?=$_PROFILE["web"]?>"><?=$_PROFILE["web"]?></a></li>
  <?php } ?>
  </ul>
  
  <ul>
	<li><a href="/favourings?id=<?=$_PROFILE["id"]?>"><?=$favourcount?> Favorite<?php if ($favourcount != "1") { echo 's'; }?></a></li>
	<li><?=$followingcount?> Friend<?php if ($followingcount != "1") { echo 's'; }?></li>
	<li><?=$followcount?> Follower<?php if ($followcount != "1") { echo 's'; }?></li>
	<li><?=$tweetcount?> Update<?php if ($tweetcount != "1") { echo 's'; }?></li>
</ul>
  
  <?php if(isset($_USER) && $_PROFILE["username"] != $_USER["username"]) { 
    $id = $_USER["id"];
	 $sql = "SELECT personid FROM `followers` WHERE `userid` = '$id' AND `personid` = '$profile' AND `status` = 1 ";
    $result = $db->query($sql);
	
	if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) { 
	$peopleid = $row["personid"];
	}
	}
  ?>
  <div class="actions">
   <strong>Actions</strong>
   <br>
   <?php if (empty($peopleid)) { ?>
   <small><a href="/t/friendships/create?id=<?=$_PROFILE["id"]?>">add</a> <?=$_PROFILE["username"]?></small>
   <?php } else { ?>
   <small><a href="/t/friendships/destroy?id=<?=$_PROFILE["id"]?>">leave</a> <?=$_PROFILE["username"]?></small>
   <?php } ?>
  </div>
  <?php }
  ?>
	<div id="friends">
  <?php
	$sql = "SELECT personid FROM followers WHERE userid='$profile' AND status=1";
    $result = $db->query($sql);



if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) { 
	$peopleid = $row["personid"];
	
	$peoplesql = "SELECT * FROM `users` WHERE `id` = '$peopleid'";
    $peoplesqlr = $db->query($peoplesql);
	if ($peoplesqlr->num_rows > 0) {
    while($rowed = $peoplesqlr->fetch_assoc()) {
		$username = $rowed["username"];	
		$title = $rowed["fullname"];		
		}
		}




	
	?>
		
		<a href="/<?=$username?>" rel="contact" title="<?=$title?>">
			<img alt="<?=$title?>" height="24" src="/account/profile_image/<?=$peopleid?>.jpg" width="24" />
		</a>
		
		<?php
	}
	} $db->close();
?>
</div>
<?php  }
  ?>
  
</div>
