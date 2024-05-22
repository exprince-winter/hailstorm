<h1 id="header">
  <a href="/" title="<?=$site?>: home" accesskey="1" style="text-decoration: none;">
    <img alt="<?=$site?>.com" height="49" src="/images/logo/<?=$logo?>.png" width="210" />
  </a>
</h1>

<?php if(isset($_USER)) { ?>
<div id="navigation">
  <h3>Navigation</h3>
  <ul>
    <li class="first"><a href="/home">Home</a></li>
    <li><a href="/<?php echo $_USER["username"] ?>">Your profile</a></li>
    <li><a href="/invite">Invite</a></li>
    <li><a href="/public_timeline">Public timeline</a></li>
    <li><a href="/account/badges">Badges</a></li>
    <li><a href="/account/settings">Settings</a></li>
    <li><a href="/help" target="_blank">Help</a></li>
    <li><a href="/signout">Signout</a></li>
    
  </ul>
</div>
<?php } ?>