<?php /* 2013-01-26 in jishigou invalid request template */ if(!defined("IN_JISHIGOU")) exit("invalid request"); ?>
</div>
<?php if(!in_array($this->Code, array('publish', 'detail', 'userinfo','tag','login', 'about')) || ($this->Code=="userinfo" && $this->Get['uid'] == MEMBER_ID)) { ?>
<?php $tab = $this->Code;if(empty($tab))$tab = $this->Module; $tab_actives[$tab] = "g_tabbar_on"; ?>
    <div id="g_footer">
        <ul class="g_tabbar">
            <li onclick="changeTab(TAB_HOME);">
                <div class="g_tab <?php echo $tab_actives['home']; ?>">
                    <img src="images/tabbar/icon_1_n.png" />
                    <span class="g_tabbar_tips">首页</span>
                </div>
            </li>
            <li onclick="changeTab(TAB_MESSAGE);">
                <div class="g_tab <?php echo $tab_actives['at_my']; ?> <?php echo $tab_actives['comment_my']; ?>">
                    <img src="images/tabbar/icon_2_n.png" />
                    <span class="g_tabbar_tips">信息</span>
                </div>
            </li>
            <li onclick="changeTab(TAB_PROFILE);">
                <div class="g_tab <?php echo $tab_actives['userinfo']; ?>">
                    <img src="images/tabbar/icon_3_n.png" />
                    <span class="g_tabbar_tips">我的资料</span>
                </div>
            </li>
            <li onclick="changeTab(TAB_SQUARE);">
                <div class="g_tab <?php echo $tab_actives['3g']; ?>">
                    <img src="images/tabbar/icon_4_n.png" />
                    <span class="g_tabbar_tips">广场</span>
                </div>
            </li>
            <li onclick="changeTab(TAB_MORE);">
                <div class="g_tab <?php echo $tab_actives['more']; ?>">
                    <img src="images/tabbar/icon_5_n.png" />
                    <span class="g_tabbar_tips">更多</span>
                </div>
            </li>
        </ul>
    </div><?php } elseif($this->Code == "tag") { ?><div id="g_toolbar" class="g_toolbar">
        <ul class="g_toolbar_ul g_towbtn">
            <li><a href="javascript:openPublishBox(PUBLISH_NEW, {'tagid':<?php echo $tag_id; ?>});" class="btn_comment"></a></li>
            <li><a href="javascript:;" class="btn_fav" id="btn_fav_topic"></a></li>
        </ul>
    </div>
    <script language="javascript">
        checkTopic('<?php echo $uncode_tag_key; ?>');
    </script><?php } elseif($this->Code=="detail") { ?><div id="g_toolbar" class="g_toolbar">
        <ul class="g_toolbar_ul">
            <li><a href="javascript:location.reload();" class="btn_ref"></a></li>
            <li><a href="javascript:openPublishBox(PUBLISH_COMMENT, {totid:'<?php echo $detail['tid']; ?>'});" class="btn_comment"></a></li>
            <li><a href="javascript:openPublishBox(PUBLISH_FORWARD, {totid:'<?php echo $detail['tid']; ?>'});" class="btn_forward"></a></li>
            <li><a id="btn_fav_mblog" href="javascript:
<?php if($detail['is_favorite']) { ?>
favMBlog('delete', <?php echo $detail['tid']; ?>)
<?php } else { ?>favMBlog('add', <?php echo $detail['tid']; ?>)
<?php } ?>
;" class="
<?php if($detail['is_favorite']) { ?>
btn_fav_on
<?php } else { ?>btn_fav
<?php } ?>
"></a></li>
        </ul>
    </div><?php } elseif($this->Code=="userinfo" && $this->Get['uid'] != MEMBER_ID) { ?><div id="g_toolbar" class="g_toolbar">
        <ul class="g_toolbar_ul g_towbtn">
            <li><a href="javascript:openPublishBox(PUBLISH_NEW, {'atuid':<?php echo $member['uid']; ?>});" class="btn_at"></a></li>
            <li><a href="javascript:
<?php if($is_blacklist) { ?>
delFromBlackList('btn_blacklist', <?php echo $member['uid']; ?>, 1)
<?php } else { ?>addToBlackList('btn_blacklist', <?php echo $member['uid']; ?>, 1)
<?php } ?>
;" class="btn_blacklist" id="btn_blacklist"></a></li>
        </ul>
    </div><?php } elseif($this->Code=="publish") { ?><div id="g_toolbar" class="g_toolbar">
<?php if(in_array($_GET['pt'], array('reply', 'forward'))) { ?>
            <div class="left_block"><input name="" type="checkbox" value="both" id="p_both"/><label for="p_both">
<?php if($_GET['pt'] == "reply") { ?>
同时转发<?php } elseif($_GET['pt'] == "forward") { ?>同时评论
<?php } ?>
</label></div>
<?php } ?>
        <div class="right_block"><button class="publish_btn" onclick="publishMBlog();" id="publish_btn" >发送</button></div>
    </div>
<?php } ?>