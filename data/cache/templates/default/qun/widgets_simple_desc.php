<?php /* 2013-01-26 in jishigou invalid request template */ if(!defined("IN_JISHIGOU")) exit("invalid request"); ?>
<?php if(!empty($qun_info)) { ?>
<div class="app_info_wp" style="padding:10px 25px; width:540px; overflow:hidden;">
	<div class="app_left" style="float:left">
		<div id="qun_icon">
			<a href="index.php?mod=qun&qid=<?php echo $qun_info['qid']; ?>" title="<?php echo $qun_info['name']; ?>"><img src="<?php echo $qun_info['icon']; ?>" style="padding:1px; border: solid 1px #ccc;"/></a>
		</div>
		<div style="color:#666; text-align:center;">
<?php if($qun_info['gview_perm'] == 0) { ?>
				公开群<?php } elseif($qun_info['gview_perm'] == 1) { ?>私密群
			
<?php } ?>
</div>
	</div>
	<div id="app_info_right" style="float:left; margin-left:15px;">
		<div id="info_title">
			<span class="qun_s2"><a href="index.php?mod=qun&qid=<?php echo $qun_info['qid']; ?>" title="<?php echo $qun_info['name']; ?>"><?php echo $qun_info['name']; ?></a></span>
			<span class="qun_s3">(群号：<?php echo $qun_info['qid']; ?>)</span>
		</div>
		<div style="margin-left:5px; color:#999999; clear:both;">
			创建于
<?php echo my_date_format($qun_info['dateline'], 'Y年m月d日'); ?>
</div>
	</div>
	<div style="clear:both;"></div>
</div>
<?php } ?>