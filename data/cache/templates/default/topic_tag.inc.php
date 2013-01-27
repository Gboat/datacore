<?php /* 2013-01-26 in jishigou invalid request template */ if(!defined("IN_JISHIGOU")) exit("invalid request"); ?><!--我的首页 右侧导航-->
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
<!--我的关注的话题 右侧导航-->
   <script language="javascript">
        $(document).ready(function(){
            //本周最受关注话题（top10）
            get_hot_tag_top();
            //推荐话题
            get_hot_tag(); 
            //我关注的话题
<?php if(MEMBER_ID > 0) { ?>
            get_my_follow_tag();
            //共同兴趣话题的用户
            get_common_interest_user();    
<?php } ?>
});
        //最受关注话题
        function get_hot_tag_top(){            
            right_show_ajax('<?php echo $member['uid']; ?>','hot_tag_top','hot_tag_top');
        }
        function get_hot_tag(){
            //热门话题
            right_show_ajax('<?php echo $member['uid']; ?>','hot_tag','hot_tag');
        }
        function get_my_follow_tag(){
            //我关注的话题
            right_show_ajax('<?php echo $member['uid']; ?>','myfavoritetags','myfavoritetags');
        }
        function get_common_interest_user(){
            right_show_ajax('<?php echo $member['uid']; ?>','common_interest','common_interest');
        }
    </script>
  <script type="text/javascript">
    $(document).ready(function(){
    $(".SC_rementuijian").click(function(){$(this).parent().toggleClass("fold_rementuijian");$(".SC_rementuijian_box").toggle();});
    });
  </script>
   <div class="SC">
    <h3>本周最受关注话题<a class="btn SC_rementuijian_box" href="javascript:void(0);"></a>
    </h3>
    <div class="FTL SC_rementuijian_box">
        <div id="<?php echo $member['uid']; ?>_hot_tag_top"></div>
    </div>
  </div>
   <!-- 热门话题推荐-->
<?php if($this->Config['hot_tag_recommend_enable'] && ($hot_tag_recommend = ConfigHandler::get('hot_tag_recommend')) && $hot_tag_recommend['list']) { ?>
    <script type="text/javascript">
            $(document).ready(function(){
                $(".SC_rementuijian").click(function(){$(this).parent().toggleClass("fold_rementuijian");$(".SC_rementuijian_box").toggle();});
            });
          </script>
    <div class="SC">
      <h3><?php echo $hot_tag_recommend['name']; ?><a class="btn SC_rementuijian" href="javascript:void(0);"></a></h3>
      <ul class="FTL SC_rementuijian_box">
        <div id="<?php echo MEMBER_ID; ?>_hot_tag"></div>
      </ul>
    </div>
<?php } ?>
<!-- 热门话题推荐-->
<?php if(MEMBER_ID > 0) { ?>
          <!--有共同兴趣话题的人 begin-->
        <script type="text/javascript">
                $(document).ready(function(){
                    $(".SC_renqituijian").click(function(){$(this).parent().toggleClass("fold_renqituijian");$(".SC_renqituijian_box").toggle();});
                });
            </script>
        <div class="SC">
          <h3>共同兴趣话题用户<a class="btn SC_renqituijian" href="javascript:void(0);"></a></h3>
          <ul class="FTL3 SC_renqituijian_box">
            <div id="<?php echo $member['uid']; ?>_common_interest"></div>
          </ul>
        </div>
       <!--有共同兴趣话题的人 end-->
          <!--我关注的话题-->
        <script type="text/javascript">
                $(document).ready(function(){
                    $(".SC_woguanzhu").click(function(){$(this).parent().toggleClass("fold_woguanzhu");$(".SC_woguanzhu_box").toggle();});
                });
            </script>
        <div class="SC">
          <h3>我关注的话题<a class="btn SC_woguanzhu" href="javascript:void(0);"></a></h3>
          <ul class="FTL SC_woguanzhu_box">
            <div id="<?php echo $member['uid']; ?>_myfavoritetags"></div>
          </ul>
        </div>
       <!--我关注的话题-->
<?php } ?>
<!-- 意见反馈-->
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