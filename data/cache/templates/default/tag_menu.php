<?php /* 2013-01-26 in jishigou invalid request template */ if(!defined("IN_JISHIGOU")) exit("invalid request"); ?><script type="text/javascript"> $(document).ready(function(){$(".menu_htb_c1").click(function(){$(".menu_htb").hide();});$(".menu_htb_c2").click(function(){$(".menu_htb").hide();}); });</script>
<div id="tag_menu_list" class="nleftLskill">
<ul id="tabnav2"> 
	<a href="javascript:void(0)" onClick="thread_insert();return false;">插入空话题</a></li> 
    <a href="javascript:void(0)" onclick="get_tag_choose(<?php echo MEMBER_ID; ?>,'my_tag');return false;"  class="<?php echo $my_tag_class; ?>">我关注的</a>
    <a href="javascript:void(0)" onclick="get_tag_choose(<?php echo MEMBER_ID; ?>,'tui_tag');return false;" class="<?php echo $tui_tag_class; ?>">推荐话题</a>
	<div class="menu_htb_c1"></div>
</ul> 
<ul class="tagB">

  <div id="add_ajax_favorite_tags">
  
<?php if(is_array($list)) { foreach($list as $val) { ?>
  
<?php $val['tag_name']=$val['tag_name']?$val['tag_name']:$val['name']; ?>
  	<span><a href="javascript:void(0)" onClick="tag_insert('<?php echo $val['tag_name']; ?>')" style="cursor:pointer" class="menu_htb_c2">#<?php echo $val['tag_name']; ?>#</a></span>
  
<?php } } ?>
  </div>
<?php if(!$list) { ?>
  <div class="add_ajax_favorite_buttom">
	<span>请添加想关注的话题
		<p style="margin:5px 0">	
			<input type="text" name="tag_names" id="tag_names" class="sc_r_t_a" style="width:225px;"/>
			<input name="button" type="button" onclick="favoriteTag('tag_names','input_add')" value="保存" class="c_b1"/>
		</p>
	</span>
  </div>
<?php } ?>
</ul>
</div>