<?php 
	foreach($arr as $rows)
	{
 ?>
<a href="<?php echo $rows["c_url"]; ?>" target="_blank"><img src="public/upload/adv/<?php echo $rows["c_img"]; ?>" style="margin-top: 5px; max-width: 270px; border:1px solid #dddddd; padding:1px;"></a>
<?php } ?>