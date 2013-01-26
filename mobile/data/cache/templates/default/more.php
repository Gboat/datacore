<?php /* 2013-01-26 in jishigou invalid request template */ if(!defined("IN_JISHIGOU")) exit("invalid request"); ?><!DOCTYPE html>
<html>
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=0.67,maximum-scale=0.67,minimum-scale=0.67" />
        <title>
<?php echo Mobile::convert($this->Config['site_name']) ?>
</title>
        <!--
        <link href="templates/default/styles/jquery.mobile.min.css?v=build+20120428" rel="stylesheet" type="text/css" />
        <link href="templates/default/styles/jquery.mobile.i.css?v=build+20120428" rel="stylesheet" type="text/css" />-->
        <link href="templates/default/styles/common.css?v=build+20120428" rel="stylesheet" type="text/css" />
        <script src="templates/default/js/jquery-1.6.2.min.js?v=build+20120428"></script>
        <!--
		<script>
            $(document).bind("mobileinit", function(){
                $.mobile.ajaxLinksEnabled(false);
            });
        </script>
        <script src="templates/default/js/jquery.mobile.min.js?v=build+20120428"></script>-->
        <script src="templates/default/js/iscroll.js?v=build+20120428"></script>
		<script src="templates/default/js/common.js?v=build+20120428"></script>
    </head>
<body>
<script>
	//一些初始化操作
	var PerPage_MBlog = parseInt("<?php echo $this->Config['perpage_mblog']; ?>");
	var PerPage_Pm = parseInt("<?php echo $this->Config['perpage_pm']; ?>");
	var PerPage_Member = parseInt("<?php echo $this->Config['perpage_member']; ?>");
	var PerPage_Def = parseInt("<?php echo $this->Config['perpage_def']; ?>");
	var Code = "<?php echo $this->Code; ?>";
	var Module = "<?php echo $this->Module; ?>";
	var Uid = "<?php echo MEMBER_ID; ?>";
<?php if($this->Config['is_mobile_client']) { ?>
		var MobileClient = true;
<?php } else { ?>var MobileClient = false;
	
<?php } ?>

<?php if(!$this->Config['is_mobile_client'] && !in_array($_GET['code'], array('3g', 'publish', 'login'))) { ?>
		var myScroll;
		function loaded() {
			var scrollName = "g_isrcollWrapper";
			if (Module == "topic" && Code == "detail") {
				//scrollName = "";
			}
			if (scrollName != "") {
				myScroll = new iScroll(scrollName, {checkDOMChanges:true});
			}
		}
		document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
		document.addEventListener('DOMContentLoaded', function () { setTimeout(loaded, 200); }, false);
	
<?php } ?>
</script>


<div data-role="page" data-theme="f" class="page">
<?php if(!$this->Config['is_mobile_client']) { ?>
<div id="g_header">
<?php if($this->Code != "at_my" && $this->Code != "comment_my") { ?>
	<div class="g_left_nav_toolbar">
    	<ul>
        
<?php if($this->Code=='publish') { ?>
            	<li><button class="g_nav_btn" onclick="history.go(-1);">取消</button></li><?php } elseif(in_array($this->Module, array('search')) || in_array($this->Code, array('detail', 'hot_comments', 'hot_forwards', 'new', 'comment', 'follow', 'fans', 'my_blog', 'list', 'blacklist', 'my_favorite', 'tag', 'about'))) { ?>            	<li><button class="g_nav_btn" onclick="history.go(-1);">返回</button></li>
           <?php } elseif($this->Code == 'userinfo' && $_GET['uid'] != MEMBER_ID) { ?>            	<li><button class="g_nav_btn" onclick="history.go(-1);">返回</button></li>
           <?php } elseif($this->Code=='login') { ?>           		<li>&nbsp;</li>
            
<?php } else { ?>                <li><button class="g_nav_btn_edit" onclick="openPublishBox(PUBLISH_NEW)">&nbsp;</button></li>
            
<?php } ?>
        </ul>
    </div>
	
<?php } ?>
    
    <div class="
<?php if($this->Code != "at_my" && $this->Code != "comment_my") { ?>
g_middle_nav_toolbar
<?php } else { ?>g_middle_nav_toolbar_message
<?php } ?>
">
    
<?php if($this->Code == "home") { ?>
    
<?php echo Mobile::convert($this->MemberHandler->MemberFields['nickname']) ?><?php } elseif($this->Code == "at_my" || $this->Code == "comment_my") { ?>    
<?php $tab_msg_actives[$this->Code] = "g_middle_chute_on"; ?>
    	<div class="g_middle_chute">
        	<ul>
            	<li class="<?php echo $tab_msg_actives['at_my']; ?>" onclick="changeMessageTab(TAB_MESSAGE_AT);">@我</li>
            	<li class="s <?php echo $tab_msg_actives['comment_my']; ?>" onclick="changeMessageTab(TAB_MESSAGE_COMMENT);">评论</li>
            </ul>
        </div><?php } elseif($this->Module == "search") { ?>    
<?php $s_title_ary = array('user'=>'找人','topic'=>'搜索微博') ?>

<?php echo $s_title_ary[$this->Code] ?>
    <?php } elseif($this->Code == "userinfo") { ?>    
<?php if($_GET['uid'] == MEMBER_ID) { ?>
    		我的资料
        
<?php } else { ?>        	资料
        
<?php } ?>
    <?php } elseif($this->Module == "more") { ?>    
<?php if($this->Code == "about") { ?>
        	关于
        
<?php } else { ?>        	更多
        
<?php } ?>
    <?php } elseif($this->Code == "3g") { ?>    	广场
    <?php } elseif($this->Code == "publish") { ?>    
<?php if($_GET['pt'] == "new") { ?>
        	新微博
        <?php } elseif($_GET['pt'] == "reply") { ?>        	评论
        <?php } elseif($_GET['pt'] == "forward") { ?>        	转发
        
<?php } ?>
<?php } elseif($this->Code == "detail") { ?>    	微博正文<?php } elseif($this->Code == 'hot_comments') { ?>    	热门评论<?php } elseif($this->Code == "new") { ?>    	随便看看
    <?php } elseif($this->Code == "hot_forwards") { ?>    	热门转发
    
<?php } else { ?><?php $_title_ary = array('follow'=>'关注','fans'=>'粉丝','my_blog'=>'我的微博','list'=>'话题','blacklist'=>'黑名单','my_favorite'=>'收藏','tag'=>'话题', 'comment'=>'评论', 'login'=>'登录') ?>

<?php echo $_title_ary[$this->Code] ?>
    
<?php } ?>
</div>
    
    
<?php if($this->Code != "at_my" && $this->Code != "comment_my") { ?>
    <div class="g_right_nav_toolbar">
    	<ul>
        
<?php if($this->Code=='publish') { ?>
            <?php } elseif($this->Code=='comment') { ?>            	<li><button class="g_nav_btn_edit" onclick="openPublishBox(PUBLISH_COMMENT, {totid:'<?php echo $tid; ?>'});">&nbsp;</button></li>
            <?php } elseif($this->Code=='login') { ?>            	<li>&nbsp;</li>
            
<?php } else { ?>               	<li><button class="g_nav_btn_ref" onclick="location.reload();">&nbsp;</button></li>
          	
<?php } ?>
        </ul>
    </div>
    
<?php } ?>
    
</div>

<!--全局提示-->
<div id="g_tips" onclick="closeTipsExp();">
</div>
<?php if($_GET['code'] == 'login') { ?>
	<style>
        #g_isrcollWrapper {
            bottom:0px;
        }
    </style>
<?php } ?>
<div id="g_isrcollWrapper">
<?php } ?>
	<div data-role="content">
    	<!--设置 Begin-->
    	<div id="setting_wp" class="mc">
       		<ul class="lv_4">
                <li onClick="location.href='index.php?mod=member&code=logout'">
               		<div class="col accounts">退出</div>
                    <div class="arrow"></div>
                </li>
                 <li class="nb" onClick="location.href='index.php?mod=more&code=about'">
                	<div class="col about">关于</div>
                    <div class="arrow"></div>
                </li>
            </ul> 	                                    
        </div>
        <!--设置 End-->
    </div>
<?php if(!$this->Config['is_mobile_client']) { ?>
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
<?php } ?>
<div><?php echo $this->Config['tongji']; ?></div>
</div>
</body>
</html>