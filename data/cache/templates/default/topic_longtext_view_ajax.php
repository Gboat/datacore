<?php /* 2013-01-27 in jishigou invalid request template */ if(!defined("IN_JISHIGOU")) exit("invalid request"); ?>
<?php if($longtext_info) { ?>
<!-- <success></success> -->
<div class="longtext_full"><?php echo $longtext_info['longtext']; ?></div>
<script type="text/javascript">
$(document).ready(function(){
	setTimeout(function(){
		$('.longtext_full img').each(function(){
			var imgWidthMax = 460;
			if(this.width > imgWidthMax)
			{
				var p = imgWidthMax / $(this).attr('width');
				$(this).attr('height', (p * $(this).attr('height')));
				$(this).attr('width', imgWidthMax);
			}
		});
	}, 200);
});
</script>
<?php } ?>