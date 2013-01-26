<?php /* 2013-01-26 in jishigou invalid request template */ if(!defined("IN_JISHIGOU")) exit("invalid request"); ?>
<?php if($is_tag) { ?>
<script type="text/javascript">
$(".menu_hts_c1").click(function(){$(".menu_hts").hide();});
</script>
<div class="menu_hts_a"><span style="float:left; padding-left:5px;">选择你要签到的话题</span><sub class="menu_hts_c1"></sub></div>
<div class="menu_hts_b">
  <select name="sign_tag" id="sign_tag" onchange="setSignTag();">
  	<option value="">请选择</option>
  
<?php if(is_array($tag_arr)) { foreach($tag_arr as $val) { ?>
  	<option value="<?php echo $val; ?>"><?php echo $val; ?></option>
  	
<?php } } ?>
  </select>
</div>
<?php } else { ?><form name="form2" method="post" action="admin.php?mod=city&code=<?php echo $code; ?>&area=<?php echo $area; ?>&city=<?php echo $city; ?>&zone=<?php echo $zone; ?>">
  <table width="98%" border="0" cellspacing="0" cellpadding="0" class="tableorder">
    <tr class="header"> 
      <td width="40%">名称</td>
      <td width="30%">排序</td>
      <td width="30%">删除</td>
    </tr>
    
    
<?php if(is_array($rs)) { foreach($rs as $key => $val) { ?>
    
<?php if($act == 'city') { ?>
    <tr> 
      <td class="altbg1" style="border-bottom:1px dotted #EDEDED"><a href="admin.php?mod=city&code=zone&area=<?php echo $area; ?>&city=<?php echo $val['id']; ?>"><?php echo $val['name']; ?></a></td>
      <td class="altbg1" style="border-bottom:1px dotted #EDEDED"><input type='text' name='order[<?php echo $val['id']; ?>]' value='<?php echo $val['list']; ?>' size='5'/></td>
      <td class="altbg1" style="border-bottom:1px dotted #EDEDED">
        <a href="admin.php?mod=city&code=city&area=<?php echo $area; ?>&id=<?php echo $val['id']; ?>">编辑</a>
        <span>&nbsp;|&nbsp;</span>
        <a href="admin.php?mod=city&code=delcity&area=<?php echo $area; ?>&fid=<?php echo $val['id']; ?>"  onclick="return confirm('将一并删除该城市下的所有区、街道信息，你确实要删除吗?不可恢复');">删除</a>
      </td>
    </tr>
    <?php } elseif($act == 'zone') { ?>    <tr> 
      <td class="altbg1" style="border-bottom:1px dotted #EDEDED"><a href="admin.php?mod=city&code=street&area=<?php echo $area; ?>&city=<?php echo $city; ?>&zone=<?php echo $val['id']; ?>"><?php echo $val['name']; ?></a></td>
      <td class="altbg1" style="border-bottom:1px dotted #EDEDED"><input type='text' name='order[<?php echo $val['id']; ?>]' value='<?php echo $val['list']; ?>' size='5'/></td>
      <td class="altbg1" style="border-bottom:1px dotted #EDEDED">
        <a href="admin.php?mod=city&code=zone&area=<?php echo $area; ?>&city=<?php echo $city; ?>&id=<?php echo $val['id']; ?>">编辑</a>
        <span>&nbsp;|&nbsp;</span>
        <a href="admin.php?mod=city&code=delzone&area=<?php echo $area; ?>&city=<?php echo $city; ?>&fid=<?php echo $val['id']; ?>"  onclick="return confirm('将一并删除该区域下的所有街道信息，你确实要删除吗?不可恢复');">删除</a>
      </td>
    </tr>
    <?php } elseif($act == 'street') { ?>    <tr> 
      <td class="altbg1" style="border-bottom:1px dotted #EDEDED"><?php echo $val['name']; ?></td>
      <td class="altbg1" style="border-bottom:1px dotted #EDEDED"><input type='text' name='order[<?php echo $val['id']; ?>]' value='<?php echo $val['list']; ?>' size='5'/></td>
      <td class="altbg1" style="border-bottom:1px dotted #EDEDED">
        <a href="admin.php?mod=city&code=street&area=<?php echo $area; ?>&city=<?php echo $city; ?>&zone=<?php echo $zone; ?>&id=<?php echo $val['id']; ?>">编辑</a>
        <span>&nbsp;|&nbsp;</span>
        <a href="admin.php?mod=city&code=delstreet&area=<?php echo $area; ?>&city=<?php echo $city; ?>&zone=<?php echo $zone; ?>&fid=<?php echo $val['id']; ?>"  onclick="return confirm('你确实要删除吗?不可恢复');">删除</a>
      </td>
    </tr>
    
<?php } ?>
    
<?php } } ?>
    <tr>
      <td><input type="submit" name="submit11" value="修改排序" class="button"></td>
    </tr>
  </table>
</form>
<?php } ?>