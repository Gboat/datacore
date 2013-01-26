<?php /* 2013-01-26 in jishigou invalid request template */ if(!defined("IN_JISHIGOU")) exit("invalid request"); ?><div class="alt_1">
<?php echo $forward_topic['nickname']; ?>：<?php echo $forward_topic['content']; ?>
 &nbsp;&nbsp;
<span class="fontRed">
<?php if($forward_topic['forwards']) { ?>
(原文共<?php echo $forward_topic['forwards']; ?> 次转发)
<?php } ?>
</span>
</div>