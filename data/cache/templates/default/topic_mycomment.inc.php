<?php /* 2013-01-27 in jishigou invalid request template */ if(!defined("IN_JISHIGOU")) exit("invalid request"); ?><!--评论我的 右侧导航-->
<div>
<div class="mainR">

<!--右侧顶部广告-->
<?php if($this->Config['ad_enable']) { ?>
  
<?php if('myhome'== $this->Code) { ?>
    
<?php if($this->Config['ad']['ad_list']['group_myhome']['middle_right']) { ?>
<div class="R_AD"> <?php echo $this->Config['ad']['ad_list']['group_myhome']['middle_right']; ?></div>	
<?php } ?>
  <?php } elseif('tag'== $this->Get['mod']) { ?>    
<?php if($this->Config['ad']['ad_list']['tag_view']['middle_right']) { ?>
<div class="R_AD"><?php echo $this->Config['ad']['ad_list']['tag_view']['middle_right']; ?></div>
<?php } ?>
  
<?php } ?>
<?php } ?>
<!--右侧顶部广告-->

<div id="topic_right_ajax_list"></div>

<?php echo $this->hookall_temp['global_usernav_extra2']; ?>

<!--@我的 右侧-->
<script language="javascript">
	$(document).ready(function(){
		//本周常评论我的人
<?php if(MEMBER_ID > 0) { ?>
	
		get_comment_user();
		
<?php } ?>
//本周热门评论
		get_hot_comment();
	});
	function get_comment_user(){			
		right_show_ajax('<?php echo $member['uid']; ?>','comment_user','comment_user');
	}
	function get_hot_comment(){
		right_show_ajax('<?php echo $member['uid']; ?>','hot_comment','hot_comment');
	}
</script>
  
<?php if(MEMBER_ID > 0) { ?>
 	<!--本周常评论我的人 begin-->
	<script type="text/javascript">
			$(document).ready(function(){
				$(".SC_renqituijian").click(function(){$(this).parent().toggleClass("fold_renqituijian");$(".SC_renqituijian_box").toggle();});
			});
		</script>
	<div class="SC">
	  <h3>本周常评论我的人<a class="btn SC_renqituijian" href="javascript:void(0);" onclick="right_show_ajax('<?php echo $member['uid']; ?>','comment_user','comment_user')"></a></h3>
	  <ul class="FTL3 SC_renqituijian_box">
		<div id="<?php echo $member['uid']; ?>_comment_user"></div>
	  </ul>
	</div>
	<!--本周常评论我的人 end-->
   
<?php } ?>
   
 	<!--本周热门评论  begin-->
	<script type="text/javascript">
			$(document).ready(function(){
				$(".SC_renqituijian").click(function(){$(this).parent().toggleClass("fold_renqituijian");$(".SC_renqituijian_box").toggle();});
			});
		</script>
	<div class="SC">
	  <h3>本周热门评论<a class="btn SC_renqituijian" href="javascript:void(0);" onclick="right_show_ajax('<?php echo $member['uid']; ?>','hot_comment','hot_comment')"></a></h3>
	  <ul class="FTL3 SC_renqituijian_box">
		<div id="<?php echo $member['uid']; ?>_hot_comment"></div>
	  </ul>
	</div>
	<!--本周热门评论 end-->
   <?php /* 2013-01-26 in jishigou invalid request template */ if(!defined("IN_JISHIGOU")) exit("invalid request"); ?><!-- 意见反馈-->
<script type="text/javascript">
    $(document).ready(function(){
    $(".SC_yijianfankui").click(function(){$(this).parent().toggleClass("fold_yijianfankui");$(".SC_yijianfankui_box").toggle();});
    });
  </script>
  <div class="SC">
  <h3><?php echo $this->Config['site_name']; ?>意见反馈<a class="btn SC_yijianfankui" href="javascript:void(0)"></a></h3>
  <ul class="FTL SC_yijianfankui_box">
      <li>众人拾柴火焰高，如您有任何建议欢迎点<a href="index.php?mod=tag&code=意见反馈" target="_blank">意见反馈</a>告诉我们。</li>
      <li>&nbsp;</li>
    </ul>
  </div>
<!--意见反馈-->
<?php if($member['uid']) { ?>
<div id="add_remark_<?php echo $member['uid']; ?>" class="alertBox" style="display:none" >
    <ul class="manBox">
     <li>
        <div class="tt1">
            <span>设置备注名</span>
            <div class="mclose" onclick="getElementById('add_remark_<?php echo $member['uid']; ?>').style.display=(getElementById('add_remark_<?php echo $member['uid']; ?>').style.display=='none')?'':'none'"></div>
        </div>
        <div class="mWarp">
             <form action="ajax.php?mod=topic&code=add_remark" method="POST"  name="remarkform"   onsubmit="publishSubmit_remark('remark_<?php echo $member['uid']; ?>',<?php echo $member['uid']; ?>);return false;">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
              给朋友加个备注名，方便认出他是谁（0~6个字符）
                    <table >
                      <tr>
                        <td><input name="remark_<?php echo $member['uid']; ?>" type="text" id="remark_<?php echo $member['uid']; ?>" class="text-area2" value="<?php echo $buddys['remark']; ?>" size="6" maxlength="6"/>
                        </td>
                        <td align="left">
                        <input type="button" class="shareI" value="保 存" onclick="publishSubmit_remark('remark_<?php echo $member['uid']; ?>',<?php echo $member['uid']; ?>);return false;" /> 
                        </td>
                      </tr>
                    </table>
              </form>
          </div>
        </li>
     </ul>
 </div>
<?php } ?>

</div>
</div>