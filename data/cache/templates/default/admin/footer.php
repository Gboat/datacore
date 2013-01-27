<?php /* 2013-01-26 in jishigou invalid request template */ if(!defined("IN_JISHIGOU")) exit("invalid request"); ?></td>
</tr>
</table>
<div style="color:gray;"><center><?php echo $this->Config['tongji']; ?> 
<?php $__server_execute_time = round(microtime(true) - $GLOBALS['_J']['time_start'], 5) . " Second "; ?>
<?php $__gzip_tips = ((defined('GZIP') && GZIP) ? "&nbsp;Gzip Enable." : "Gzip Disable."); ?>
<span title="网页执行信息：<?php echo $__server_execute_time; ?>,<?php echo $__gzip_tips; ?>">
&nbsp; 网页执行信息：<?php echo $__server_execute_time; ?>,<?php echo $__gzip_tips; ?></span></center></div>
<div style="clear:both;text-align:center;margin:5px auto;">Powered by yqweibo © 2005 - 2012 INET Inc.</span></div>
</body></html><?php echo $GLOBALS['iframe']; ?>