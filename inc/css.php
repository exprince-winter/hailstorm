<?php if (isset($_USER)) {?>	
	<style type="text/css">
		body {
			color: <?php echo $_USER["text"] ?>;
			background-color: <?php echo $_USER["bgcolor"] ?>;
			background: <?php echo $_USER["bgcolor"] ?> url(<?php echo $_USER["bg"] ?>) fixed <?php echo $_USER["bgrepeat"] ?> top left;
			text-align: center; 
			font: 0.75em/1.5 Helvetica, Arial, sans-serif; 
		}
		
		a {color: <?php echo $_USER["link"] ?>;}
		h2.thumb, h2.thumb a {color: <?php echo $_USER["text"] ?>;}
		
		
		
		#side {
			background-color: <?php echo $_USER["side"] ?>;
			border: 1px solid <?php echo $_USER["sideborder"] ?>;
			
		}
		

		#side .notify {border: 1px solid <?php echo $_USER["sideborder"] ?>;}
		#side .actions {border: 1px solid <?php echo $_USER["sideborder"] ?>;}
    
	</style>
<?php } else { ?>
<style type="text/css">
    body {
      background: #9ae4e8 url(/images/bg.gif) fixed no-repeat top left;
      text-align: center;
      font: 0.75em/1.5 Helvetica, Arial, sans-serif;
      color: #333;
    }
  </style>
<?php }?>