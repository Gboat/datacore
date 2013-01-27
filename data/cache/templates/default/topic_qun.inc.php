<?php /* 2013-01-27 in jishigou invalid request template */ if(!defined("IN_JISHIGOU")) exit("invalid request"); ?><!--我的微群右侧 右侧导航-->
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
   <script language="javascript">
		$(document).ready(function(){
		//热门微群
		//get_hotweiqun();
		//同城微群
<?php if($member['city']) { ?>
		    get_city_qun();
<?php } ?>
//微群分类
		get_qun_category();
		});
		//热门微群
		function get_hotweiqun(){			
			right_show_ajax('<?php echo $member['uid']; ?>','hotweiqun','hotweiqun');
		}
		//同城微群
		function get_city_qun(){			
			right_show_ajax('<?php echo $member['uid']; ?>','city_qun','city_qun');
		}
		//群分类
		function get_qun_category(){			
			right_show_ajax('<?php echo $member['uid']; ?>','qun_category','qun_category');
		}
	</script>
   <div class="SC">
	<h3>
	微群分类<a class="btn SC_rementuijian_box" href="javascript:void(0);" onclick="right_show_ajax('<?php echo $member['uid']; ?>','qun_category','qun_category'); return false;"></a>
	</h3>
	<div class="FTL SC_rementuijian_box">
		<div id="<?php echo $member['uid']; ?>_qun_category"></div>
	</div>
  </div>
  <div class="SC">
  <script type="text/javascript" src="templates/default/js/qun.js?v=build+20120428"></script>
	<h3>
	推荐微群<a class="btn SC_rementuijian_box" href="javascript:void(0);" onclick="right_show_ajax('<?php echo $member['uid']; ?>','hotweiqun','hotweiqun'); return false;"></a>
	</h3>
	<div class="FTL SC_rementuijian_box">
		<div id="1_hotweiqun">
			<div id="interestUid">
<?php if($hot_qun) { ?>
			  <ul class="followList" style="overflow:hidden">
<?php if(is_array($hot_qun)) { foreach($hot_qun as $val) { ?>
				<li class="pane" id="follow_user_<?php echo $val['uid']; ?>">
				  <div class="fBox_l"><img onerror="javascript:faceError(this);" src="<?php echo $val['icon']; ?>"/> </div>
				  <div class="fBox_R "> <p><span class="name"><a href="index.php?mod=qun&qid=<?php echo $val['qid']; ?>"><?php echo $val['name']; ?></a></span> </p>
				  <p><?php echo $val['member_num']; ?>人&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo $val['member_num']; ?>条微博</p>
				  <span> <a href="javascript:;" onclick="joinQun(<?php echo $val['qid']; ?>)">加入群</a>	</span> 
				  </div>
				</li>
<?php } } ?>
  </ul>
<?php } ?>
</div>
		</div>
	</div>
  </div>
<?php if($member['city']) { ?>
  <div class="SC">
	<h3>
<?php $member_city = str_replace('市','',$member['city']); ?>
<?php echo $member_city; ?>微群<a class="btn SC_rementuijian_box" href="javascript:void(0);" onclick="right_show_ajax('<?php echo $member['uid']; ?>','city_qun','city_qun'); return false;"></a>
	</h3>
	<div class="FTL SC_rementuijian_box">
		<div id="<?php echo $member['uid']; ?>_city_qun"></div>
	</div>
  </div>
<?php } ?>
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