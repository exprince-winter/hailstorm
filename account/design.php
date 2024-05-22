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
			
              <form action="/t/account/design" enctype="multipart/form-data" method="post" name="f">
                <fieldset>
                  <table cellspacing="0">
                    <tbody>
                      <tr>
                        <th><label for="bgc">Background color:</label></th>
                        <td><input id="bgc" name="bgc" size="30" type="color" value="<?=$_USER["bgcolor"]?>">
                        </td>
                      </tr>
					  
					  <tr>
                        <th><label for="bgi">Background image:</label></th>
                        <td><input id="bgi" autocomplete="off" name="bgi" size="30" type="text" value="<?=$_USER["bg"]?>">
                        </td>
                      </tr>
					  
					  <tr>
                        <th><label for="bgr">Background repeat:</label></th>
                        <td><input id="bgr" name="bgr" size="30" type="checkbox" value="1" <?php if ($_USER["bgrepeat"] === "repeat") { echo 'checked=""'; } ?>>
                        </td>
                      </tr>
					  
					  <tr>
                        <th><label for="tc">Text color:</label></th>
                        <td><input id="tc" name="tc" size="30" type="color" value="<?=$_USER["text"]?>">
                        </td>
                      </tr>
					  
					  <tr>
                        <th><label for="ac">Link color:</label></th>
                        <td><input id="ac" name="ac" size="30" type="color" value="<?=$_USER["link"]?>">
                        </td>
                      </tr>
					  
					   <tr>
                        <th><label for="sbc">Sidebar fill color:</label></th>
                        <td><input id="sbc" name="sbc" size="30" type="color" value="<?=$_USER["side"]?>">
                        </td>
                      </tr>
                      
					   <tr>
                        <th><label for="sbb">Sidebar border color:</label></th>
                        <td><input id="sbb" name="sbb" size="30" type="color" value="<?=$_USER["sideborder"]?>">
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