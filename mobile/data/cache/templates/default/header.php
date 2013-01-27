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
                <li><button class="g_nav_btn" onclick="history.go(-1);">取消</button></li><?php } elseif(in_array($this->Module, array('search')) || in_array($this->Code, array('detail', 'hot_comments', 'hot_forwards', 'new', 'comment', 'follow', 'fans', 'my_blog', 'list', 'blacklist', 'my_favorite', 'tag', 'about'))) { ?>                <li><button class="g_nav_btn" onclick="history.go(-1);">返回</button></li>
           <?php } elseif($this->Code == 'userinfo' && $_GET['uid'] != MEMBER_ID) { ?>                <li><button class="g_nav_btn" onclick="history.go(-1);">返回</button></li>
           <?php } elseif($this->Code=='login') { ?>                   <li>&nbsp;</li>
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
<?php } else { ?>            资料
<?php } ?>
    <?php } elseif($this->Module == "more") { ?>    
<?php if($this->Code == "about") { ?>
            关于
<?php } else { ?>            更多
<?php } ?>
    <?php } elseif($this->Code == "3g") { ?>        广场
    <?php } elseif($this->Code == "publish") { ?>    
<?php if($_GET['pt'] == "new") { ?>
            新微博
        <?php } elseif($_GET['pt'] == "reply") { ?>            评论
        <?php } elseif($_GET['pt'] == "forward") { ?>            转发
<?php } ?>
<?php } elseif($this->Code == "detail") { ?>        微博正文<?php } elseif($this->Code == 'hot_comments') { ?>        热门评论<?php } elseif($this->Code == "new") { ?>        随便看看
    <?php } elseif($this->Code == "hot_forwards") { ?>        热门转发
<?php } else { ?><?php $_title_ary = array('follow'=>'关注','fans'=>'粉丝','my_blog'=>'我的微博','list'=>'话题','blacklist'=>'黑名单','my_favorite'=>'收藏','tag'=>'话题', 'comment'=>'评论', 'login'=>'登录') ?>
<?php echo $_title_ary[$this->Code] ?>
<?php } ?>
</div>
<?php if($this->Code != "at_my" && $this->Code != "comment_my") { ?>
    <div class="g_right_nav_toolbar">
        <ul>
<?php if($this->Code=='publish') { ?>
            <?php } elseif($this->Code=='comment') { ?>                <li><button class="g_nav_btn_edit" onclick="openPublishBox(PUBLISH_COMMENT, {totid:'<?php echo $tid; ?>'});">&nbsp;</button></li>
            <?php } elseif($this->Code=='login') { ?>                <li>&nbsp;</li>
<?php } else { ?>                   <li><button class="g_nav_btn_ref" onclick="location.reload();">&nbsp;</button></li>
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