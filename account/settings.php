<?php include_once "./../inc/settingsmain.php"; 
if(!isset($_USER)) die(header("Location: /login?return=".urlencode($_SERVER["REQUEST_URI"])));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<?php include "./../inc/head.php"; ?>

<body class="sessions" id="new">
  <?php require_once("./../inc/css.php")?>

  <div id="container" class="subpage">
    <?php include "./../inc/header.php"; ?>
    <div id="content">
      <?php if(isset($err)) { ?>
      <p><?php print_r($err); ?></p>
      <?php } ?>
      
<div class="wrapper">
        <h2><?php echo $_USER["fullname"] ?></h2>
			
			<?php require_once("./../inc/settingsnav.php"); ?>
			
              <form action="/t/account/account" enctype="multipart/form-data" method="post" name="f">
                <fieldset>
                  <table cellspacing="0">
                    <tbody>
                      <tr>
                        <th><label for="full_name">Full Name:</label></th>
                        <td><input id="full_name" name="fullname" size="30" type="text" value="<?=$_USER["fullname"]?>">
                        </td>
                      </tr>
					  
					  <tr>
                        <th><label for="username">Username:</label></th>
                        <td><input id="username" name="username" size="30" type="text" value="<?=$_USER["username"]?>">
                        </td>
                      </tr>
					  
					  <tr>
                        <th><label for="email">Email:</label></th>
                        <td><input id="email" name="email" size="30" type="text" value="<?=$_USER["email"]?>">
                        </td>
                      </tr>
					  
					  <tr>
                        <th><label for="timezone">Time zone:</label></th>
                        <td><select id="user_time_zone" name="time_zone">
						<option value="<?=$_USER["timezone"]?>"><?=$_USER["timezone"]?></option>
						<option>-------</option>
                    <?php require_once('./../inc/options.html'); ?>
                    
                  </select></td>
                      </tr>
					  
					  <tr>
                        <th><label for="moreinfo">More info URL:</label></th>
                        <td><input id="moreinfo" name="url" size="30" type="text" value="<?=$_USER["web"]?>">
						<br>
						<small>Have a SpaceHey or blog? Put the address here</small>
                        </td>
						
                      </tr>
					  
					  <tr>
                        <th><label for="bio">One Line Bio:</label></th>
                        <td><input id="bio" name="bio" maxlength="160" size="30" type="text" value="<?=$_USER["bio"]?>">
						<br>
						<small>About yourself in fewer than 160 chars</small>
                        </td>
                      </tr>
					  
					  <tr>
                        <th><label for="loc">Location:</label></th>
                        <td><input id="loc" name="loc" size="30" type="text" value="<?=$_USER["location"]?>">
						<br>
						<small>Where in the world are you?</small>						
                        </td>
                      </tr>
					  
					  <tr>
                        <th></th>
                        <td><input id="lock" name="lock" size="30" type="checkbox" value="1" disabled="">
						<label for="lock">Protect my updates</label>
						<br>
						<small>Only let people whom I accept as friends read my updates. If this is checked, you WILL NOT appear on the <a href="/public_timeline">public timline</a>.</small>						
                        </td>
                      </tr>
                      
                      
                      <tr>
                        <th></th>
                        <td>
                          <input type="submit" id="submit" value="Update">
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </fieldset>
              </form>
            </div>
          
         
          
        </div>
     
    
    <hr />
    <?php include "./../inc/side.php"; ?>
    <hr />
    <hr />
    <?php include "./../inc/footer.php"; ?>
  </div>
</body>

</html>