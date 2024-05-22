<?php 
$id = $_USER["id"];
$sql = "SELECT * FROM `tweets` WHERE `user` LIKE '$id' ORDER BY `tweets`.`id` DESC" ;

$result = $db->query($sql);



if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) { ?>

		<tr class="<?php
  $number = callCount();
if ($number % 2) { 
echo 'even';
} else {
	
	echo 'odd'; 
	}
   ?> hentry" id="status_<?=$row["timestamp"]?>">
	<td class="thumb">
		<a href="<?=$_USER["username"] ?>">
			<img alt="<?=$_USER["username"] ?>" src="/account/profile_image/<?=$_USER["id"]?>.jpg">
		</a>
	</td>
	<td>	
		<strong>
			<a href="<?=$_USER["username"] ?>" title="<?=$_USER["username"] ?>"><?=$_USER["username"] ?></a>
		</strong>
		
					<?=parse_bweet($row["content"])?>
			
				
		<span class="meta">
						  <a href="/<?=$_USER["username"] ?>/statuses/<?=$row["id"]?>"><?=time_since($row["timestamp"])?></a>
						from 
						<?php if ($row["methodlink"] != null) {
							echo '<a href="' . $row["methodlink"] . '">' . $row["method"] . '</a>';
							} else { 
							echo $row["method"];
							}?> 
			<span id="status_actions_<?=$row["id"]?>">
			<?php if (isset($_USER)) {?>
			<a href="<?php 
			$tweet = $row['id'];
			$checkfavour = mysqli_query($db, "SELECT * FROM `favour` WHERE `tweetid` = '$tweet' AND `userid` = $id");
			$checkedfavour = mysqli_num_rows($checkfavour);
			if ($checkedfavour == "" or $checkedfavour == 0) {
				echo "/t/favour/create?id=" . $tweet;				
			} else {
				echo "/t/favour/destroy?id=" . $tweet;
			} 
			?>"><img src="/images/icon_star_empty.gif" alt="icon_star_empty"></a>
			<?php } ?>
</span>

		</span>
	</td>
	
	
	
  </tr>
					
			
	
	
	<?php
}
}
?>