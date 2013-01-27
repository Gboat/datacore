<?php /* 2013-01-26 in jishigou invalid request template */ if(!defined("IN_JISHIGOU")) exit("invalid request"); ?><br /><br /><br /><br /><br /><br />
<table width="500" border="0" cellpadding="0" cellspacing="0" align="center" class="tableborder">
<tr class="header"><td>系统提示</td>
</tr>
<tr>
  <td class="altbg2">
    <div align="center"><br /><br /><br />
<?php if(is_array($message)==false) { ?>
                    <?php echo $message; ?>
<?php } else { ?>
<?php if(is_array($message)) { foreach($message as $k => $one_message) { ?>
<?php if($k) { ?>
<?php echo $k; ?>
<?php } ?>
<?php echo $one_message; ?><br>
<?php } } ?>
<?php } ?>
<?php if($return_msg=="") { ?>
                    <br /><br /><br />
<?php if($time!==null) { ?>
                    <script>setTimeout("redirect('<?php echo $redirectto; ?>');", <?php echo $time; ?>*1000);</script>
                        <a href="<?php echo $redirectto; ?>">如果您的浏览器没有自动跳转，请点这里继续</a>
<?php } else { ?><a href="<?php echo $redirectto; ?>"><?php echo $to_title; ?></a>
<?php } ?>
<?php } else { ?><?php echo $return_msg; ?>
<?php } ?>
    </div><br /><br /></td>
</tr>
</table><br /><br /><br />