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
			
              <form action="/t/account/picture" enctype="multipart/form-data" method="post" name="pic">
                <fieldset>
                  <table cellspacing="0">
                    <tbody>
                      <tr>
                        <th>
                          <label for="user_profile_image">
                            Picture:
                          </label>
                        </th>
                        <td>
                          <input id="user_profile_image_temp" name="profile_image_temp" type="hidden"><input
                            id="user_profile_image" name="profile_image" size="30" type="file">
                          <p><small>(Optional) JPEGs only!<br> If you don’t include a picture, your current profile
                              picture will be kept.</small></p>
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