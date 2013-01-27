<?php /* 2013-01-26 in jishigou invalid request template */ if(!defined("IN_JISHIGOU")) exit("invalid request"); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php $__my=$this->MemberHandler->MemberFields; ?>
<base href="<?php echo $this->Config['site_url']; ?>/" />
<?php $conf_charset=$this->Config['charset']; ?>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $conf_charset; ?>" />
<title><?php echo $this->Title; ?> - <?php echo $this->Config['site_name']; ?>(<?php echo $this->Config['site_domain']; ?>)<?php echo $this->Config['page_title']; ?></title>
<meta name="Keywords" content="<?php echo $this->MetaKeywords; ?>,<?php echo $this->Config['site_name']; ?><?php echo $this->Config['meta_keywords']; ?>" />
<meta name="Description" content="<?php echo $this->MetaDescription; ?>,<?php echo $this->Config['site_notice']; ?><?php echo $this->Config['meta_description']; ?>" />
<link rel="shortcut icon" href="templates/default/images/favicon.ico" >
<link href="templates/default/styles/main.css?v=build+20120428" rel="stylesheet" type="text/css" />
<?php if($this->Config['qun_theme_id']) { ?>
<link href="templates/default/qunstyles/<?php echo $this->Config['qun_theme_id']; ?>.css" rel="stylesheet" type="text/css" /><?php } elseif($this->Config['theme_id']) { ?><link href="theme/<?php echo $this->Config['theme_id']; ?>/theme.css?v=<?php echo SYS_BUILD; ?>" rel="stylesheet" type="text/css" />
<?php } ?>
<style type="text/css">
<?php if($this->Config['theme_text_color']) { ?>
body{ color:<?php echo $this->Config['theme_text_color']; ?>; }
<?php } ?>
<?php if($this->Config['theme_bg_color']) { ?>
body{ background-color:<?php echo $this->Config['theme_bg_color']; ?>; }
<?php } ?>
<?php if($this->Config['theme_bg_image']) { ?>
body{ background-image:url(<?php echo $this->Config['theme_bg_image']; ?>); }
<?php } ?>
<?php if($this->Config['theme_bg_position']) { ?>
body{ background-position:<?php echo $this->Config['theme_bg_position']; ?>; }
<?php } ?>
<?php if($this->Config['theme_bg_repeat']) { ?>
body{ background-repeat:<?php echo $this->Config['theme_bg_repeat']; ?>; }
<?php } ?>
<?php if($this->Config['theme_bg_fixed']) { ?>
body{ background-attachment:<?php echo $this->Config['theme_bg_fixed']; ?>; }
<?php } ?>
<?php if($this->Config['theme_text_color']) { ?>
body{ color:<?php echo $this->Config['theme_text_color']; ?>; }
<?php } ?>
<?php if($this->Config['theme_link_color']) { ?>
a:link{ color:<?php echo $this->Config['theme_link_color']; ?>; }
<?php } ?>
a.artZoom{ cursor:url(<?php echo $this->Config['site_url']; ?>/templates/default/images/magnifier_b.cur), pointer; }
.artZoomBox a.maxImgLink { cursor:url(<?php echo $this->Config['site_url']; ?>/templates/default/images/magnifier_s.cur), pointer; }
a.artZoom2{ cursor:url(<?php echo $this->Config['site_url']; ?>/templates/default/images/magnifier_b.cur), pointer; }
a.artZoom3{ cursor:url(<?php echo $this->Config['site_url']; ?>/templates/default/images/magnifier_b.cur), pointer; }
.artZoomBox a.maxImgLink3 { cursor:url(<?php echo $this->Config['site_url']; ?>/templates/default/images/magnifier_s.cur), pointer; }
a.artZoomAll{ cursor:url(<?php echo $this->Config['site_url']; ?>/templates/default/images/magnifier_b.cur), pointer; }
.artZoomBox a.maxImgLinkAll { cursor:url(<?php echo $this->Config['site_url']; ?>/templates/default/images/magnifier_s.cur), pointer; }
</style>
<script type="text/javascript">
var thisSiteURL = '<?php echo $this->Config['site_url']; ?>/';
var thisTopicLength = '<?php echo $this->Config['topic_input_length']; ?>';
var thisMod = '<?php echo $this->Module; ?>';
var thisCode = '<?php echo $this->Code; ?>';
var thisFace = '<?php echo $__my['face_small']; ?>';
<?php $qun_setting = ConfigHandler::get('qun_setting'); ?>
<?php if($qun_setting['qun_open']) { ?>
    var isQunClosed = false;
<?php } else { ?>var isQunClosed = true;
<?php } ?>
function faceError(imgObj)
{
    var errorSrc = '<?php echo $this->Config['site_url']; ?>/images/noavatar.gif';
    imgObj.src = errorSrc;
}
</script>
<script type="text/javascript">var __ALERT__='<?php echo $this->Config['verify_alert']; ?>';</script>
<script type="text/javascript" src="templates/default/js/min.js?v=build+20120428"></script>
<script type="text/javascript" src="templates/default/js/common.js?v=build+20120428"></script>
<script type="text/javascript" src="templates/default/js/topicManage.js?v=build+20120428"></script>
<script type="text/javascript" src="templates/default/js/rotate.js?v=build+20120428"></script>
<script type="text/javascript" src="templates/default/js/dialog.js?v=build+20120428" id="dialog_js"></script>
<script type="text/javascript" src="templates/default/js/lang.js?v=build+20120428"></script>
<script type="text/javascript" src="images/uploadify/jquery.uploadify.v2.1.4.min.js?v=build+20120428"></script>
<?php if(in_array($this->Code, array("follow","fans"))) { ?>
<script type="text/javascript" src="templates/default/js/relation.js?v=build+20120428"></script>
<?php } ?>
<?php if($this->Get['mod']=="vote") { ?>
<script type="text/javascript" src="templates/default/js/vote.js?v=build+20120428"></script>
<?php } ?>
<?php if($this->Get['mod']=="qun") { ?>
<script type="text/javascript" src="templates/default/js/qun.js?v=build+20120428"></script>
<?php } ?>
<!--[if IE 6]>
<script type="text/javascript" src="templates/default/js/DD_belatedPNG_0.0.8a-min.js?v=build+20120428" ></script>
<script type="text/javascript">DD_belatedPNG.fix('.header,.pweibo,.boxRNav2 li,.boxRNav2 li a');   </script>
<![endif]-->   
</head>
<?php echo $additional_str; ?>
<body>
<?php if(MEMBER_ID) { ?>
<?php if(MEMBER_STYLE_THREE_TOL == 1) { ?>
<?php $t_col_header ='t_col_header';  $t_col_logo ='t_col_logo'; $t_col_main='t_col_main'; $t_col_main_side='t_col_main_side'; $t_col_foot='t_col_foot'; $t_col_backTop='t_col_backTop'; $t_col_main_rn='t_col_main_rn'; $t_col_main_lb='t_col_main_lb'; $t_col_tagBox='t_col_tagBox';$bL_info_three='bL_info_three';  ?>
<?php } ?>
<?php if($member['open_extra'] and MEMBER_ID != $member['uid']) { ?>
<?php $t_col_header ='t_col_header';  $t_col_logo ='t_col_logo'; $t_col_main='t_col_main'; $t_col_main_side='t_col_main_side'; $t_col_foot='t_col_foot'; $t_col_backTop='t_col_backTop'; $t_col_main_rn='t_col_main_rn'; $t_col_main_lb='t_col_main_lb'; $t_col_tagBox='t_col_tagBox';$bL_info_three='bL_info_three';  ?>
<?php } ?>
<?php } ?>
<div class="header">
<div class="headerNav <?php echo $t_col_header; ?>">
    <ul class="hleft">
    <li class="logo2"><a href="index.php" title="<?php echo $this->Config['site_name']; ?>"></a></li>
<?php $navigation_config=ConfigHandler::get('navigation');global $rewriteHandler; ?>
<?php if(is_array($navigation_config['list'])) { foreach($navigation_config['list'] as $_v) { ?>
<?php if($_v['avaliable'] == 1) { ?>
        <script type="text/javascript">
        $(document).ready(function(){
            $(".t_c<?php echo $_v['code']; ?>").mouseover(function(){$(".t_c<?php echo $_v['code']; ?>_box").show();$(".t_c<?php echo $_v['code']; ?>").addClass("on");});
            $(".t_c<?php echo $_v['code']; ?>").mouseout(function(){$(".t_c<?php echo $_v['code']; ?>_box").hide();$(".t_c<?php echo $_v['code']; ?>").removeClass("on");});
            $(".t_c2").mouseover(function(){$(".t_c2_box").show();$(".t_c2").addClass("on");});
            $(".t_c2").mouseout(function(){$(".t_c2_box").hide();$(".t_c2").removeClass("on");});
            $(".t_c4").mouseover(function(){$(".t_c4_box").show();$(".t_c4").addClass("on");});
            $(".t_c4").mouseout(function(){$(".t_c4_box").hide();$(".t_c4").removeClass("on");});
            $(".t_c5").mouseover(function(){$(".t_c5_box").show();$(".t_c5").addClass("on");});
            $(".t_c5").mouseout(function(){$(".t_c5_box").hide();$(".t_c5").removeClass("on");});
            $(".t_c6").mouseover(function(){$(".t_c6_box").show();$(".t_c6").addClass("on");});
            $(".t_c6").mouseout(function(){$(".t_c6_box").hide();$(".t_c6").removeClass("on");});
        });
        </script>
<?php if($rewriteHandler)$_v['url']=$rewriteHandler->formatURL($_v['url']); ?>
<li class="t_c<?php echo $_v['code']; ?>"><a href="<?php echo $_v['url']; ?>" target="<?php echo $_v['target']; ?>" title="<?php echo $_v['name']; ?>"><?php echo $_v['name']; ?></a>
<?php if(!empty($_v['type_list'])  && $_v['avaliable'] == 1) { ?>
        <ul class="t_c1_box t_c<?php echo $_v['code']; ?>_box" style="display:none;">
<?php if(is_array($_v['type_list'])) { foreach($_v['type_list'] as $val) { ?>
<?php if($val['name']  && $val['avaliable'] == 1) { ?>
<?php if($rewriteHandler)$val['url']=$rewriteHandler->formatURL($val['url']); ?>
 <li><a href="<?php echo $val['url']; ?>" target="<?php echo $val['target']; ?>"><?php echo $val['name']; ?></a></li>
<?php } ?>
<?php } } ?>
<?php if(!empty($navigation_config['pluginmenu']) && $_v['code'] == 'app') { ?>
<?php if(is_array($navigation_config['pluginmenu'])) { foreach($navigation_config['pluginmenu'] as $pmenus) { ?>
<?php if(is_array($pmenus)) { foreach($pmenus as $pmenu) { ?>
<?php if($pmenu['type'] == 1) { ?>
<?php if($rewriteHandler)$pmenu['url']=$rewriteHandler->formatURL($pmenu['url']); ?>
 <li><a href="<?php echo $pmenu['url']; ?>" target="<?php echo $pmenu['target']; ?>"><?php echo $pmenu['name']; ?></a></li>
<?php } ?>
<?php } } ?>
<?php } } ?>
<?php } ?>
 </ul>
<?php } ?>
</li>
<?php } ?>
<?php } } ?>
<li class="sweibo">
        <div class="searchTool">
          <form method="get" action="#" name="headSearchForm" id="headSearchForm" onsubmit="return headDoSearch();">
            <input id="headSearchType" name="searchType" type="hidden" value="userSearch">
            <div class="selSearch">
              <div class="nowSearch" id="headSlected" onclick="if(document.getElementById('headSel').style.display=='none'){document.getElementById('headSel').style.display='block';}else {document.getElementById('headSel').style.display='none';};return false;" onmouseout="drop_mouseout('head');">用户</div>
              <div class="btnSel"><a href="#" onclick="if(document.getElementById('headSel').style.display=='none'){document.getElementById('headSel').style.display='block';}else {document.getElementById('headSel').style.display='none';};return false;" onmouseout="drop_mouseout('head');"></a></div>
              <div class="clear"></div>
              <ul class="selOption" id="headSel" style="display:none;">
                <li><a href="#" onclick="return search_show('head','userSearch',this)" onmouseover="drop_mouseover('head');" onmouseout="drop_mouseout('head');">用户</a></li>
                <li><a href="#" onclick="return search_show('head','tagSearch',this)" onmouseover="drop_mouseover('head');" onmouseout="drop_mouseout('head');">话题</a></li>
                <li><a href="#" onclick="return search_show('head','topicSearch',this)" onmouseover="drop_mouseover('head');" onmouseout="drop_mouseout('head');">微博</a></li>
<?php $vote_setting = ConfigHandler::get('vote'); ?>
<?php if($vote_setting['vote_open']) { ?>
                <li><a href="#" onclick="return search_show('head','voteSearch',this)" onmouseover="drop_mouseover('head');" onmouseout="drop_mouseout('head');">投票</a></li>
<?php } ?>
<?php $qun_setting = ConfigHandler::get('qun_setting'); ?>
<?php if($qun_setting['qun_open']) { ?>
                <li><a href="#" onclick="return search_show('head','qunSearch',this)" onmouseover="drop_mouseover('head');" onmouseout="drop_mouseout('head');">微群</a></li>
<?php } ?>
  </ul>
            </div>
            <input class="txtSearch" id="headq" name="headSearchValue" type="text" value="请输入关键字" onfocus="this.value=''"/>
            <div class="btnSearch"> <a href="#" onclick="javascript:return headDoSearch();"><span class="lbl"></span></a></div>
          </form>
        </div>
        </li>
    </ul>
    <ul class="hright">
      <li class="pweibo" style="cursor:pointer;" onclick="showMainPublishBox();" title="发微博">发博
      <input type="hidden" name="check_PublishBox_uid" id="check_PublishBox_uid"  value="<?php echo MEMBER_ID; ?>"/>
      <input type="hidden" id="verify" name="verify" value="<?php echo $this->Config['verify']; ?>">
      </li>
<?php if(MEMBER_ID > 0) { ?>
      <li class="t_c4"><a href="index.php" title="<?php echo $this->Config['site_name']; ?>">我的首页</a>
        <ul class="t_c4_box">
<?php if($this->Config['qun_setting']['qun_open']) { ?>
          <li><a href="index.php?mod=topic&code=qun">我的微群
<?php if($__my['qun_new']>0) { ?>
<span>+<?php echo $__my['qun_new']; ?></span>
<?php } ?>
</a></li>
<?php } ?>
  <li><a href="index.php?mod=topic&code=tag">关注话题
<?php if($__my['topic_new']>0) { ?>
<span>+<?php echo $__my['topic_new']; ?></span>
<?php } ?>
</a></li>
<?php if($this->Config['dzbbs_enable'] || ($this->Config['phpwind_enable'] && $this->Config['pwbbs_enable'])) { ?>
          <li><a href="index.php?mod=topic&code=bbs">我的论坛</a></li>
<?php } ?>
<?php if(($this->Config['dedecms_enable'] == 1)) { ?>
          <li><a href="index.php?mod=topic&code=cms">我的资讯</a></li>
<?php } ?>
  <li><a href="index.php?mod=topic&code=recd">官方推荐</a></li>
          <li><a href="index.php?mod=topic&code=myfavorite">我的收藏</a></li>
        </ul>
      </li>
      <li class="t_c2"><a title="<?php echo MEMBER_NICKNAME; ?>" href="index.php?mod=<?php echo MEMBER_NAME; ?>"><?php echo MEMBER_NICKNAME; ?></a>
        <ul class="t_c2_box">
          <li><a href="index.php?mod=<?php echo MEMBER_NAME; ?>&type=hot_reply">被热评的</a></li>
          <li><a href="index.php?mod=<?php echo MEMBER_NAME; ?>&type=hot_forward">被热转的</a></li>
          <li><a href="index.php?mod=topic&code=myfavorite">我收藏的</a></li>
          <li><a href="index.php?mod=<?php echo MEMBER_NAME; ?>&type=my_verify">待审核的</a></li>
        </ul>
      </li>
      <li class="t_c6">消息
        <ul class="t_c6_box">
          <li><a href="index.php?mod=topic&code=mycomment">评论我的
<?php if($__my['comment_new']>0) { ?>
<span>+<?php echo $__my['comment_new']; ?></span>
<?php } ?>
</a></li>
          <li><a href="index.php?mod=topic&code=myat">@我的
<?php if($__my['at_new']>0) { ?>
<span>+<?php echo $__my['at_new']; ?></span>
<?php } ?>
</a></li>
          <li><a href="index.php?mod=pm&code=list">私信我的
<?php if($__my['newpm']>0) { ?>
<span>+<?php echo $__my['newpm']; ?></span>
<?php } ?>
</a></li>
          <li><a href="index.php?mod=<?php echo $__my['username']; ?>&code=fans">关注我的
<?php if($__my['fans_new']>0) { ?>
<span>+<?php echo $__my['fans_new']; ?></span>
<?php } ?>
</a></li>
          <li><a href="index.php?mod=topic&code=favoritemy">收藏我的
<?php if($__my['favoritemy_new']>0) { ?>
<span>+<?php echo $__my['favoritemy_new']; ?></span>
<?php } ?>
</a></li>
        </ul>
      </li>
      <li class="t_c5">帐号
      <ul class="t_c5_box">
      <li><a href="index.php?mod=settings">资料设置</a></li>
      <li><a href="index.php?mod=settings&code=face">修改头像</a></li>
      <li><a href="index.php?mod=settings&code=secret">修改密码</a></li>
      <li><a href="index.php?mod=account">账户绑定</a></li>
      <li><a href="index.php?mod=other&code=wap">手机</a></li>
      <li><a href="index.php?mod=skin">换肤</a></li>
      <li><a href="index.php?mod=profile&code=invite">邀请关注</a></li>
<?php if($params['code'] == 'myhome') { ?>
      <li>
      <span id="web_list_type_<?php echo MEMBER_ID; ?>">
      <input type="hidden" id="web_style" name="web_style" value="<?php echo MEMBER_STYLE_THREE_TOL; ?>"/>
<?php if (MEMBER_STYLE_THREE_TOL == 1) $ajax_list = 'right'; else $ajax_list = 'left'; ?>
  <a href="javascript:void(0);" title="推荐三栏，导航更清晰" onclick="web_list_type(<?php echo MEMBER_ID; ?>,'web_style','<?php echo $params['code']; ?>','<?php echo $ajax_list; ?>','<?php echo $member['uid']; ?>'); return false;">
<?php if(MEMBER_STYLE_THREE_TOL == 1) { ?>
换为两栏
<?php } else { ?>换为三栏
<?php } ?>
</a> 
      <input type="hidden" name='hid_type' id='hid_type' value='<?php echo $type; ?>'>
      </span>
      </li>     
<?php } ?>
<?php if('admin'==MEMBER_ROLE_TYPE) { ?>
      <li><a href="admin.php" target=_blank>后台管理</a></li>
<?php } ?>
  <li><a href="<?php echo $this->Config['site_url']; ?>/index.php?mod=login&code=logout" rel="nofollow">退出</a> </li>
      </ul>
      </li>
<?php } else { ?>  <li><a href="javascript:viod(0)" rel="nofollow" title="登录即可分享新鲜事" onclick="ShowLoginDialog(); return false;">快捷登录</a></li>
<?php } ?>
</ul>
  </div>
</div>
<div class="logow <?php echo $t_col_logo; ?>">
<?php if(MEMBER_ID>0) { ?>
<?php if($__my['comment_new']>0 || $__my['fans_new']>0 || $__my['at_new']>0 || $__my['newpm']>0 || $__my['favoritemy_new']>0 || $__my['vote_new']>0 || $__my['qun_new']>0 || $__my['event_new']>0 || $__my['topic_new']>0 || $__my['event_post_new']>0 || $__my['fenlei_post_new']>0) { ?>
<?php $__tagBoxStyle='display:block;visibility:visible;'; ?>
<?php } else { ?><?php $__tagBoxStyle='display:none;visibility:hidden;'; ?>
<?php } ?>
<!--#if NEDU#-->
<?php if(defined('NEDU_MOYO')) { ?>
<?php if(nlogic('notify')->ups_haved()) { ?>
<?php $__tagBoxStyle='display:block;visibility:visible;'; ?>
<?php } ?>
<?php } ?>
<!--#endif#-->
    <script type="text/javascript">
        function tagBox_close()
        {
            var obj = document.getElementById("tagBox_<?php echo MEMBER_ID; ?>");
            obj.style.visibility = "hidden";
        }
    </script>
    <div class="tagBox <?php echo $t_col_tagBox; ?>" id="tagBox_<?php echo MEMBER_ID; ?>" style="<?php echo $__tagBoxStyle; ?>">
        <div id="tagBoxContent_<?php echo MEMBER_ID; ?>">
        <ul>
<?php if($__my['newpm']>0) { ?>
          <li><a href="index.php?mod=pm&code=list"><?php echo $__my['newpm']; ?>条新私信，查看</a></li>
<?php } ?>
<?php if($__my['comment_new']>0) { ?>
          <li><a href="index.php?mod=topic&code=mycomment"><?php echo $__my['comment_new']; ?>条新评论，查看</a></li>
<?php } ?>
<?php if($__my['fans_new']>0) { ?>
          <li><a href="index.php?mod=<?php echo $__my['username']; ?>&code=fans"><?php echo $__my['fans_new']; ?>人关注了我，查看</a></li>
<?php } ?>
<?php if($__my['at_new']>0) { ?>
          <li><a href="index.php?mod=topic&code=myat"><?php echo $__my['at_new']; ?>人@提到我，查看</a></li>
<?php } ?>
<?php if($__my['favoritemy_new']>0) { ?>
          <li><a href="index.php?mod=topic&code=favoritemy"><?php echo $__my['favoritemy_new']; ?>人收藏了我的，查看</a></li>
<?php } ?>
<?php if($__my['vote_new']>0) { ?>
          <li><a href="index.php?mod=<?php echo $__my['uid']; ?>&type=vote&filter=new_update">投票新增<?php echo $__my['vote_new']; ?>人参与，查看</a></li>
<?php } ?>
<?php if($__my['qun_new']>0) { ?>
          <li><a href="index.php?mod=topic&code=qun">微群新增<?php echo $__my['qun_new']; ?>条内容，查看</a></li>
<?php } ?>
<?php if($__my['event_new']>0) { ?>
          <li><a href="index.php?mod=<?php echo $__my['uid']; ?>&type=event&filter=new_update">活动新增<?php echo $__my['event_new']; ?>人报名，查看</a></li>
<?php } ?>
<?php if($__my['topic_new']>0) { ?>
          <li><a href="index.php?mod=topic&code=tag">话题新增<?php echo $__my['topic_new']; ?>条微博，查看</a></li>
<?php } ?>
<?php if($__my['event_post_new']>0) { ?>
          <li><a href="index.php?mod=topic&code=other&view=event">新增<?php echo $__my['event_post_new']; ?>个关注的活动，查看</a></li>
<?php } ?>
<?php if($__my['fenlei_post_new']>0) { ?>
          <li><a href="index.php?mod=topic&code=other&view=fenlei">新增<?php echo $__my['fenlei_post_new']; ?>个关注的分类信息，查看</a></li>
<?php } ?>
  <!--#if NEDU#-->
<?php if(defined('NEDU_MOYO')) { ?>
             <?php echo nlogic('notify')->ups_tips_html();; ?>  
<?php } ?>
  <!--#endif#-->
        </ul>
        </div>
        <div class="tagBox_del"><a href="javascript:tagBox_close();" title="关闭" javascript:void(0)><img src="templates/default/images/imgdel.gif" /></a></div>
    </div>
<?php } ?>
</div>
<div class="changeTheme"><a href="index.php?mod=skin" title="更换皮肤" javascript:void(0)></a></div>
<script type="text/javascript" src="templates/default/js/validate.js?v=build+20120428"></script>
<div class="setframe">
  <div class="W_main_l">
  <div class="left_nav">
    <h3 class="person_info">资料设置</h3>
<?php $base_hoverCLS = ('base' == $this->Code ? 'tago' : 'tagn'); ?>
<?php $face_hoverCLS = ('face' == $this->Code ? 'tago' : 'tagn'); ?>
<?php $secret_hoverCLS = ('secret' == $this->Code ? 'tago' : 'tagn'); ?>
<?php $user_tag_hoverCLS = ('user_tag' == $this->Code ? 'tago' : 'tagn'); ?>
<?php $vip_intro_hoverCLS = ('vip_intro' == $this->Code ? 'tago' : 'tagn'); ?>
<?php $validate_extra_hoverCLS = ('validate_extra' == $this->Code ? 'tago' : 'tagn'); ?>
<li><div class="<?php echo $base_hoverCLS; ?>"><A HREF="index.php?mod=settings&code=base">我的资料</A></div></li>
    <li><div class="<?php echo $face_hoverCLS; ?>"><A HREF="index.php?mod=settings&code=face">我的头像</A></div></li>
    <li><div class="<?php echo $secret_hoverCLS; ?>"><A HREF="index.php?mod=settings&code=secret">修改密码</A></div></li>
    <li><div class="<?php echo $user_tag_hoverCLS; ?>"><A HREF="index.php?mod=user_tag">我的标签</A></div></li>
    <li><div class="<?php echo $vip_intro_hoverCLS; ?>"><A HREF="index.php?mod=other&code=vip_intro">申请V认证</A></div></li>
<?php if(($member['validate'] && $member['validate_extra'])) { ?>
    <li><div class="<?php echo $validate_extra_hoverCLS; ?>"><A HREF="index.php?mod=settings&code=validate_extra">专题设置</A></div></li>
<?php } ?>
<li><div class="tagb"></div></li>
  </div>
  <div class="left_nav">
    <h3 class="person_lever">积分等级</h3>
<?php $extcredits_hoverCLS = ('extcredits' == $this->Code ? 'tago' : 'tagn'); ?>
<?php $exp_hoverCLS = ('exp' == $this->Code ? 'tago' : 'tagn'); ?>
<li><div class="tagn <?php echo $extcredits_hoverCLS; ?>"><A HREF="index.php?mod=settings&code=extcredits">我的积分</A></div></li>
    <li><div class="tagn <?php echo $exp_hoverCLS; ?>"><A HREF="index.php?mod=settings&code=exp">微博等级</A></div></li>
    <li><div class="tagb"></div></li>
  </div>
  <div class="left_nav">
<?php $theme_hoverCLS = ('theme' == $this->Code ? 'tago2' : 'tagn2'); ?>
<h3 class="person_theme <?php echo $theme_hoverCLS; ?>"><A HREF="index.php?mod=skin">更换皮肤</A></h3>
    <li><div class="tagb"></div></li>
  </div>
  <div class="left_nav">
<?php $account_hoverCLS = (in_array($this->Code,array('qqwb','sina','yy','renren','kaixin','fjau_enable')) ? 'tago2' : 'tagn2'); ?>
<h3 class="person_account <?php echo $account_hoverCLS; ?>"><A HREF="index.php?mod=account">帐号绑定</A></h3>
    <li><div class="tagb"></div></li>
  </div>
  <div class="left_nav">
<?php $sms_hoverCLS = (in_array($this->Code,array('wap','mobile','iphone','android','pad','sms')) ? 'tago2' : 'tagn2'); ?>
<h3 class="person_phone <?php echo $sms_hoverCLS; ?>"><A HREF="index.php?mod=other&code=wap">手机应用</A></h3>
    <li><div class="tagb"></div></li>
  </div>
</div>
<div class="W_main_r">
<div class="main_2b">
<div class="set_warp">
<?php if('secret'==$act) { ?>
  <h3>修改密码<span>（<i class="W_spetxt">*</i> 为必填项）</span></h3>
    <form method="POST"  action="index.php?mod=settings&code=do_modify_password" onSubmit="return Validator.Validate(this,3);">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
        <table width="100%" border="0">
          <tr>
        <td width="110" align="right" valign="top">当前登录密码：</td>
        <td><input name="password_old" dataType="LimitB" min="3" msg="修改本页信息，必须输入当前登录密码" type="password"  class="p1"/>
        （必填）</td>
          </tr>
          <tr>
            <td align="right" valign="top">设置新的密码：</td>
            <td><input name="password_new1" require="false" dataType="LimitB" min="5" msg="新密码过短，请设置5位以上" type="password"  class="p1"/>
            （如不修改请留空即可）</td>
          </tr>
          <tr>
            <td align="right" valign="top">确认新的密码：</td>
            <td><input name="password_new2" dataType="Repeat" to="password_new1" msg="两次输入的密码不一致" type="password"  class="p1"/></td>
          </tr>
          <tr>
            <td align="right" valign="middle">&nbsp;</td>
            <td><input type="submit" class="sBtn_2" value="保存" /> （修改上述信息需要重新登录）</td>
          </tr>
        </table>
    </form>
    <div style="font-size:12px;">
        <BR />如忘记了登录密码，可通过如下方式找回：<BR/>
        1、在登录界面，点<a href="index.php?mod=get_password" target="_blank">取回密码</a>链接，重设密码的邮件会发送到您的登录Email中；<BR />
        2、请在<a href="index.php?mod=settings">个人资料</a>设置中，填写好真实姓名和证件号码信息，可据此凭证通过客服重设密码。
    </div>
 <?php } elseif('email'==$act) { ?>     <form method="POST"  action="index.php?mod=settings&code=modify_email" onSubmit="return Validator.Validate(this,3);">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
        <table width="100%" border="0">
          <tr>
        <td width="110" align="right" valign="top">当前登录密码：</td>
        <td><input name="password_old" dataType="LimitB" min="3" msg="修改本页信息，必须输入当前登录密码" type="password"  class="p1"/>
        （必填）</td>
          </tr>
          <tr>
            <td align="right" valign="top">登录提醒Email：</td>
            <td><input name="email_new" dataType="Email" msg="请输入正确的Email 地址" type="text" value="<?php echo $member['email']; ?>" class="p1" /></td>
          </tr>
          <tr>
            <td align="right" valign="middle">&nbsp;</td>
            <td><input type="submit" class="sBtn_2" value="保存" /> （修改上述信息需要重新登录）</td>
          </tr>
        </table>
    </form>
  <?php } elseif('extcredits'==$act) { ?>  <h3>我的积分</h3>
    <div class="jfMenu">
        <ul>
<?php if($op_lists) { ?>
<?php if(is_array($op_lists)) { foreach($op_lists as $_k => $_v) { ?>
<a href="index.php?mod=settings&code=<?php echo $act; ?>&op=<?php echo $_k; ?>" 
<?php if($op==$_k) { ?>
 class="selected" 
<?php } ?>
><?php echo $_v; ?></a>
<?php } } ?>
<?php } ?>
</ul>
    </div>
    <div class="Contentbox">
        <script type="text/javascript">
            $(document).ready(function(){
             $(".stripe_tb tr").mouseover(function(){
             $(this).addClass("over");}).mouseout(function(){
             $(this).removeClass("over");})
             $(".stripe_tb tr:even").addClass("alt");
             });
        </script>
<?php if('base'==$op) { ?>
            <table width="100%" border="0">
<?php if(is_array($credits_config['ext'])) { foreach($credits_config['ext'] as $_k => $_v) { ?>
<?php if($_v['enable']) { ?>
              <tr>
                <td width="10%"><?php echo $_v['name']; ?>：</td>
                <td><b><?php echo $_v['ico']; ?> <?php echo $member[$_k]; ?> <?php echo $member['unit']; ?></b></td>
              </tr>
<?php } ?>
<?php } } ?>
  <tr>
                <td>总积分：</td>
                <td><b><?php echo $member['credits']; ?></b> （<?php echo $credits_config_formula; ?>）</td>
              </tr>
              <tr>
                <td colspan=2><A HREF="index.php?mod=settings&code=exp">点此查看我的微博积分等级</A></td>
              </tr>
            </table><?php } elseif('log'==$op) { ?><table width="100%" border="0" class="stripe_tb">
            <thead>
           <tr>
                 <th>动作名称</th>
                 <th>总次数</th>
                 <th>周期次数</th>
<?php if(is_array($credits_config['ext'])) { foreach($credits_config['ext'] as $__k => $__v) { ?>
 <th><?php echo $__v['name']; ?></th>
<?php } } ?>
 <th>最后奖励时间</th>
             </tr>
          </thead>
<?php if(is_array($log_list)) { foreach($log_list as $_k => $_v) { ?>
  <tr>
                <td><?php echo $_v['rulename']; ?></td>
                <td><?php echo $_v['total']; ?></td>
                <td><?php echo $_v['cyclenum']; ?></td>
<?php if(is_array($credits_config['ext'])) { foreach($credits_config['ext'] as $__k => $__v) { ?>
<td><?php echo $_v[$__k]; ?></td>
<?php } } ?>
<td><?php echo $_v['dateline']; ?></td>
              </tr>
<?php } } ?>
 <thead>
           <tr>
                 <th>总计</th>
                 <th>&nbsp;</th>
                 <th>&nbsp;</th>
<?php if(is_array($credits_config['ext'])) { foreach($credits_config['ext'] as $__k => $__v) { ?>
 <th><?php echo $_counts[$__k]; ?></th>
<?php } } ?>
 <th>&nbsp;</th>
           </tr>
          </thead>
            </table><?php } elseif('rule'==$op) { ?><span style="font-size:12px; float:left; padding:0 0 4px 5px">进行以下动作，会得到积分奖励。注意：在一个周期内，你得到的奖励次数是有限制。</span>
            <table width="100%" border="0" class="stripe_tb">
            <thead>
           <tr>
                 <th>动作名称</th>
                 <th>周期范围</th>
                 <th>周期内最多奖励次数</th>
<?php if(is_array($credits_config['ext'])) { foreach($credits_config['ext'] as $__k => $__v) { ?>
 <th><?php echo $__v['name']; ?></th>
<?php } } ?>
 </tr>
          </thead>
<?php if(is_array($credits_rule)) { foreach($credits_rule as $_k => $_v) { ?>
  <tr>
                <td><?php echo $_v['rulename']; ?><b><?php echo $_v['related']; ?></b></td>
                <td><?php echo $_v['cycletype']; ?></td>
                <td><?php echo $_v['rewardnum']; ?></td>
<?php if(is_array($credits_config['ext'])) { foreach($credits_config['ext'] as $__k => $__v) { ?>
<td>
<?php if($_v[$__k]>0) { ?>
+
<?php } ?>
<?php echo $_v[$__k]; ?></td>
<?php } } ?>
  </tr>
<?php } } ?>
</table>
<?php } else { ?>未定义的操作
<?php } ?>
</div>
  <!--邮件提醒-->
  <?php } elseif('notice'==$act) { ?><form method="post"  action="index.php?mod=settings&amp;code=do_notice" enctype="multipart/form-data">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
        <table width="100%" border="0">
          <tr>
            <td align="right">提醒邮箱：</td>
            <td><input name="textfield" type="text" value="<?php echo $member['email']; ?>" class="p1"  readonly disabled />
            （<A HREF="index.php?mod=settings&code=email">点此修改</A>）
            </td>
          </tr>
          <tr>
            <td width="18%" align="right" valign="top"><span class="W_spetxt"></span>提醒类型：</td>
            <td width="82%">
            <input name="notice_at" type="checkbox" id="notice_at" value="1"
<?php if($member['notice_at'] == 1) { ?>
checked="checked" 
<?php } ?>
/>
            @我的&nbsp;&nbsp;
            <br />
            <input name="notice_reply" type="checkbox" id="notice_reply" value="1"
<?php if($member['notice_reply'] == 1) { ?>
checked="checked" 
<?php } ?>
 />
            评论我的
            <br />
            <input name="notice_pm" type="checkbox" id="notice_pm" value="1"
<?php if($member['notice_pm'] == 1) { ?>
 checked="checked" 
<?php } ?>
 />
            站内短消息 &nbsp;&nbsp;
            </td>
          </tr>
          <tr>
            <td align="right">提醒频率：</td>
            <td>
            <?php echo $user_notice_time; ?>            </td>
          </tr>
          <tr>
            <td align="right" valign="top">&nbsp;</td>
            <td><input type="submit" class="sBtn_2" value="确定"/></td>
          </tr>
        </table>
    </form>
 <!--上传头像-->
 <?php } elseif('face'==$act) { ?> <h3>修改我的头像</h3>
     <script type="text/javascript">
        function updateavatar() {
            window.location.reload();
        }
    </script>
    <div style="padding:10px 0;">
        <span class="W_spetxt">用户头像会显示在<a href="index.php?mod=<?php echo $member['username']; ?>" target="_blank">个人微博</a>页面，以及你的微博中！</span>
    </div>
<?php if($uc_avatarflash) { ?>
    <img src="<?php echo $member['face_original']; ?>" onerror="javascript:faceError(this);"/>
    <h2>设置我的新头像</h2>
    <p>请选择一个新照片进行上传编辑。</p>
    <?php echo $uc_avatarflash; ?><?php } elseif($pwuc_avatarflash) { ?><img src="<?php echo $member['face_original']; ?>" onerror="javascript:faceError(this);"/>
    <h2>设置我的新头像</h2>
    <p style="color:#f00;">因系统整合了phpwind，请单击下面的链接进行修改!</p>
    <p style="margin-top:30px;"><a href="<?php echo $pwurl_setuserface; ?>" target="_blank" style="font-size:16px;color:#fff;border:1px solid #e36703; padding:5px 10px;background:#eb8f00;margin-left:60px;text-decoration:none;font-weight:bold;">修改图象</a></p>
<?php } else { ?>    <style type="text/css">
        .jcrop-holder { text-align: left; }
        .jcrop-vline, .jcrop-hline
        {font-size: 0;position: absolute;background: white url('./templates/default/images/jcrop.gif') top left repeat;}
        .jcrop-vline { height: 100%; width: 1px !important; }
        .jcrop-hline { width: 100%; height: 1px !important; }
        .jcrop-handle {
            font-size: 1px;
            width: 7px !important;
            height: 7px !important;
            border: 1px #eee solid;
            background-color: #333;
            *width: 9px;
            *height: 9px;
        }
        .jcrop-tracker { width: 100%; height: 100%; }
        .custom .jcrop-vline,
        .custom .jcrop-hline{background: yellow;}
        .custom .jcrop-handle{border-color: black;background-color: #C7BB00;-moz-border-radius: 3px;-webkit-border-radius: 3px;}
        .Image {
             max-width:600px;height:auto;cursor:pointer;
             border:1px dashed #4E6973;
             zoom:expression( function(elm) {
                 if (elm.width>540) {
                     var oldVW = elm.width; elm.width=540;
                     elm.height = elm.height*(540 /oldVW);
                 }
                 elm.style.zoom = '1';
             }(this));
         }
    </style>
    <script type="text/javascript" src="templates/default/js/jquery.Jcrop.js?v=build+20120428"></script>
    <script language="Javascript">
        function upload_face()
        {
            // Remember to invoke within jQuery(window).load(...)
            // If you don't, Jcrop may not initialize properly
            jQuery(document).ready(function(){
                jcrop_init();
            });            
        }        
        function jcrop_init()
        {
            jQuery('#cropbox').Jcrop({
                    minSize: [ 40, 40 ],
                    maxSize: [ 600, 600 ],
                    aspectRatio: 1,
                    setSelect: [ 0, 0, 200, 200 ],
                    onChange: jcrop_showCoords,
                    onSelect: jcrop_showCoords
                });
        }        
        // Our simple event handler, called from onChange and onSelect
        // event handlers, as per the Jcrop invocation above
        function jcrop_showCoords(c)
        {
            jQuery('#x').val(c.x);
            jQuery('#y').val(c.y);
            jQuery('#w').val(c.w);
            jQuery('#h').val(c.h);
        };
<?php if($temp_face) { ?>
            upload_face();
<?php } ?>
    </script>
    <span style="font-size:12px; color:#333; display:block; margin:10px 0;">
        1、请先点下面“浏览”按钮选择头像图片，系统会自动上传并显示在下面正方形框内；<br>
        （头像支持JPG、GIF和PNG格式，文件大小<i style="color:#ff0000">2M</i>以内）
    </span>
    <div>
    <div>
        <iframe id="uploadface" name="uploadface" width="0" height="0" marginwidth="0" frameborder="0" src="about:blank"></iframe>
        <form method="post"  action="ajax.php?mod=topic&code=uploadface" enctype="multipart/form-data" name="face_form" target="uploadface" id="face_form">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
            <input type="hidden" id="temp_face" name="temp_face" value="<?php echo $temp_face; ?>" />
            <input id="idFile" name="face" type="file" onchange="document.getElementById('face_form').submit();show_message('正在上传头像，请不要刷新页面');"/>
        </form>
    </div><br />
        <span id="jcrop_init_id" onclick="jcrop_init();"></span>
        <div>2、用鼠标在头像上拖拉选择剪裁区域，最后点确认剪裁完成修改。<br>
        <img src="<?php echo $member['face_original']; ?>" id="cropbox" onclick="upload_face();" border="0" alt="" class="Image" /></div>
        <form action="index.php?mod=settings&code=do_modify_face" method="post"  id="crop_form">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
            <input type="hidden" id="x" name="x" />
            <input type="hidden" id="y" name="y" />
            <input type="hidden" id="w" name="w" />
            <input type="hidden" id="h" name="h" />
            <input name="img_path" value="<?php echo $temp_face; ?>" type="hidden" id="img_path" /><br />
            <input type="submit" value="确认剪裁" id="crop_submit" class="shareI" />
            <input type="button" value="取消" class="shareI" onclick="updateavatar();" />
        </form>
·        <div><span class="W_spetxt" >* </span>修改头像后如果没有立即生效，请按Ctrl+F5强制刷新即可</div>
    </div>
<?php } ?>
<?php } elseif('base'==$act) { ?><h3>我的资料<span>（<i class="W_spetxt">*</i> 为必填项）</span></h3>
<script type="text/javascript"> 
$(function(){ 
    $("#nickname_input").focus(function(){$(this).css("background","#CBFE9F");$(".R_tt1").show();}).blur(function(){$(this).css("background","#FFF");$(".R_tt1").hide();});
});
function changedepartment(id){
  var cid = 'undefined' == typeof(id) ? 0 : id;
  var myAjax=$.post("ajax.php?mod=member&code=cp",{cid:cid},function(d){if(d){$('#' + "departmentselect").html(d);}});
}
</script>
    <form method="POST"  name="profile_base" action="index.php?mod=settings&code=do_modify_profile" onSubmit="return Validator.Validate(this,3);">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
    <table width="100%" border="0">
      <tr>
        <td width="110" align="right" valign="top">帐户/昵称：</td>
        <td>
        <input name="nickname" id="nickname_input" type="text"  class="p1"  value="<?php echo $member_nickname; ?>" readonly disabled />
        （用于登录、显示、@通知和发送站内信，
        <A HREF="index.php?mod=settings&code=base#modify_email_area">点此修改</A>）
<?php if($member['validate']) { ?>
            <div class="R_tt1" >提醒：申请<a href="index.php?mod=other&code=vip_intro" target="_blank">V认证</a>后，禁止再修改昵称</div>
<?php } ?>
</td>
      </tr>
      <tr>
        <td align="right" valign="top">Email 邮箱：</td>
        <td><input name="email" type="text" value="<?php echo $member['email']; ?>" class="p1"  readonly disabled />
        （用于登录、<A HREF="index.php?mod=settings&code=notice">提醒</A>和<a href="index.php?mod=get_password" target="_blank">取回密码</A>，
        <A HREF="index.php?mod=settings&code=base#modify_email_area">点此修改</A>）
        </td>
      </tr>
      <tr>
        <td align="right" valign="top"><span class="W_spetxt">*</span> 所在地区：</td>
        <td>
            <div style="float:left;">
                <?php echo $province_list; ?>
              </div>
              <div style="float:left;">
                <select id="city" name="city" onchange="changeCity();">
                <option value="0">请选择</option>
                </select>
              </div>
              <div style="float:left;">
                <select id="area" name="area" onchange="changeArea();" style="display: none">
                <option value="0">请选择</option>
                </select>
              </div>
              <div style="float:left;">
                <select id="street" name="street" style="display: none">
                <option value="0">请选择</option>
                </select>
              </div>
              <input type="hidden" id="hid_city" name="hid_city" value="<?php echo $hid_city; ?>">
              <input type="hidden" id="hid_area" name="hid_area" value="<?php echo $hid_area; ?>">
              <input type="hidden" id="hid_street" name="hid_street" value="<?php echo $hid_street; ?>">
              <div>（设置后，其他人会通过<a href="index.php?mod=profile&code=search" target="_blank">找人</a>找到你）</div>
    </td>
      </tr>
      <tr>
        <td align="right" valign="top"><span class="W_spetxt">*</span> 用户性别：</td>
        <td><?php echo $gender_radio; ?></td>
      </tr>
<?php if($member['invite_uid'] || $this->Config['register_invite_input2']) { ?>
      <tr>
        <td align="right" valign="top"> 我的推荐人：</td>
        <td>
<?php if($member['invite_uid']) { ?>
<?php $_invite_member = jsg_member_info($member['invite_uid']); ?>
            <input type="text" name="invite_nickname" value="<?php echo $_invite_member['nickname']; ?>" class="p1" readonly disabled />
            （<a href="index.php?mod=<?php echo $_invite_member['username']; ?>" title="推荐人： <?php echo $_invite_member['nickname']; ?>">点此访问 <?php echo $_invite_member['nickname']; ?>的个人微博页面）<?php echo $_invite_member['nickname']; ?></a>
        <?php } elseif($this->Config['register_invite_input2']) { ?>        <input type="text" name="invite_nickname" value="" class="p1" />
            （推荐我注册的用户、填写后不允许再修改）
<?php } else { ?>         - 
             （您没有推荐人）
<?php } ?>
    </td>
      </tr>
<?php } ?>
  <tr>
        <td align="right" valign="top">自我介绍：</td>
        <td><textarea name="aboutme"><?php echo $member['aboutme']; ?></textarea><br />（会在你的<a href="index.php?mod=<?php echo $member['username']; ?>" target="_blank">个人微博</a>页面右侧看到）</td>
      </tr>
      <tr>
      <td colspan="2">
     <div class="tagg2">以下信息将作为通过客服取回帐号的依据
<?php if(!$member['validate_true_name'] || !$member['validate_card_type'] || !$member['validate_card_id']) { ?>
        ，请认真填写
<?php } ?>
</div>
        </td>
      </tr>
      <tr>
        <td align="right" valign="top">真实姓名：</td>
        <td>
<?php if($member['validate_user']) { ?>
        <?php echo $member['validate_user']; ?>
<?php } else { ?>    <input type="text" name="validate_true_name" value="<?php echo $memberfields['validate_true_name']; ?>" class="p1" />
<?php } ?>
（不会对外部公开，其他人看不到）
        </td>
      </tr>
      <tr>
        <td align="right" valign="top">证件类型：</td>
        <td>
<?php if($member['validate_card_type']) { ?>
        <?php echo $memberfields['validate_card_type']; ?>
<?php } else { ?>    <?php echo $validate_card_type_select; ?>
<?php } ?>
    </td>
      </tr>
      <tr>
        <td align="right" valign="top">证件号码：</td>
        <td>
<?php if($member['validate_card_id']) { ?>
<?php $_v=substr_replace($memberfields['validate_card_id'],'******',-6); ?>
    <?php echo $_v; ?>
<?php } else { ?>    <input type="text" name="validate_card_id" value="<?php echo $memberfields['validate_card_id']; ?>" class="p1" />（保存后将只在此处显示部分号码）
<?php } ?>
    </td>
      </tr>
      <tr>
        <td align="right" valign="top">&nbsp;</td>
        <td><input type="submit" class="sBtn_2" value="保存"/></td>
      </tr>
    </table>
</form>
<a id="modify_email_area"></a>
<br />
<form method="POST"  action="index.php?mod=settings&code=modify_email" onSubmit="return Validator.Validate(this,3);">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
    <table width="100%" border="0">
       <tr>
             <td colspan="2">
              <div class="tagg2">修改以下信息，需要输入当前登录密码</div>
             </td>
           </tr>
        <tr>
            <td width="110" align="right" valign="top">当前登录密码：</td>
            <td><input name="password_old" dataType="LimitB" min="3" msg="修改本页信息，必须输入当前登录密码" type="password" class="p1" style="float:left;" />
        （必填）</td>
      </tr>      
      <tr>
          <td align="right" valign="top">个性微博地址：</td>
          <td>
<?php if(!$member['username'] || is_numeric($member['username'])) { ?>
              <input id="username_old" name="username_old" type="hidden" value="<?php echo $member['username']; ?>" />
              <input id="username_new" name="username_new" type="text" value="" class="p1" style="float:left;" />
              （只允许纯字母或与数字的组合，设置后不能修改；<a href="javascript:;" onclick="checkNewUsername();return false;">点此检测</a>是否可用）
<?php } else { ?>          <input name="username_new" type="text" value="<?php echo $member['username']; ?>" class="p1" style="float:left;" readonly disabled />
              （用于访问<a href="index.php?mod=<?php echo $member['username']; ?>">个人微博</a>页面）
<?php } ?>
      </td>
      </tr>      
      <tr>
          <td align="right" valign="top">帐户昵称：</td>
          <td>
<?php if((true===UCENTER && true!==UCENTER_MODIFY_NICKNAME) || true === PWUCENTER) { ?>
              <input name="nickname_new" dataType="LimitB" min="1" msg="帐户/昵称不能为空" type="text" value="<?php echo $member['nickname']; ?>" class="p1" style="float:left;" readonly disabled />
              （由于系统整合了UC，帐户昵称不允许修改）
<?php } else { ?>          <input name="nickname_new" dataType="LimitB" min="1" msg="帐户/昵称不能为空" type="text" value="<?php echo $member['nickname']; ?>" class="p1" style="float:left;" />
              （用于登录、展示、@通知和发私信）
<?php } ?>
      </td>
      </tr>
      <tr>
        <td align="right" valign="top">账号Email：</td>
        <td><input name="email_new" dataType="Email" msg="请输入正确的Email 地址" type="text" value="<?php echo $member['email']; ?>" class="p1" style="float:left;" /></td>
      </tr>
      <tr>
        <td align="right" valign="middle">&nbsp;</td>
        <td><input type="submit" class="sBtn_2" value="保存" /></td>
      </tr>
    </table>
</form>
<script type="text/javascript" src="templates/default/js/city.js?v=build+20120428"></script>
<script type="text/javascript">
function checkNewUsername()
{
    var username_old = $('#username_old').val();
    var username_new = $('#username_new').val();
    if(username_new.length < 1)
    {
        alert('个性域名/微博地址  不能为空');
        return false;
    }
    if(username_old != username_new)
    {
        var myAjax = $.post(
            'ajax.php?mod=member',
            {
                'code' : 'check_username',
                'check_value' : username_new
            },
            function (r) {
                r = r.trim();
                if('' != r)
                {
                    alert(r);
                    $('#username_new').val('');
                    $('#username_new').focus();
                }
            }
        );
    }
    return false;
}
$(document).ready(function(){
var selectOption=
<?php load::functions('area');echo area_config_to_json(); ?>
;
});
var validateRegularList={
    province:{dataType:"LimitB",min:'1',msg:"请选择省/直辖市"},
    city:{dataType:"LimitB",min:'1',msg:"请选择城市/地区"},
    email2:{require:"false",dataType:"Email",msg:"邮箱格式不正确"},
    qq:{require:"false",dataType:"QQ",msg:"请填写正确的QQ号"},
    msn:{require:"false",dataType:"Email",msg:"MSN格式不正确"},
    aboutme:{require:"false",dataType:"LimitB",min:'3',max:'250',msg:"请将长度控制在3~250个字符之间"}
}
Validator.SetRegular("profile_base",validateRegularList);
function changeProvince(){
  var province = document.getElementById("province").value;
  var hid_city = document.getElementById("hid_city").value;
  var url = "ajax.php?mod=member&code=sel&province="+province + "&hid_city="+hid_city;
  var myAjax=$.post(
              url,
              function(d){
                  $('#' + "city").html(d);
                  document.getElementById('area').length = 1;
                  document.getElementById('street').length = 1;
                changeCity();
              }
  );
}
changeProvince();
function changeCity(){
  var city = document.getElementById("city").value;
  var hid_area = document.getElementById("hid_area").value;
  var url = "ajax.php?mod=member&code=sel&city="+city+"&hid_area="+hid_area;
  var myAjax=$.post(
              url,
              function(d){
                if(d){
                    document.getElementById("area").style.display = "block";
                      $('#' + "area").html(d);
                    changeArea();
                }else{
                      document.getElementById('area').length = 1;
                      document.getElementById('street').length = 1;
                    document.getElementById("street").style.display = "none";
                    document.getElementById("area").style.display = "none";
                }
              }
  );
}
function changeArea(){
  var area = document.getElementById("area").value;
  var hid_street = document.getElementById("hid_street").value;
  var url = "ajax.php?mod=member&code=sel&area="+area+"&hid_street="+hid_street;
  var myAjax=$.post(
              url,
              function(d){
                if(d){
                    document.getElementById("street").style.display = "block";
                    $('#' + "street").html(d);
                }else{
                      document.getElementById('street').length = 1;
                    document.getElementById("street").style.display = "none";
                }
              }
  );
}
</script><?php } elseif('user_medal'==$act) { ?>    
<?php if(is_array($medal_list)) { foreach($medal_list as $val) { ?>
    <div style="width:120px; height:120px; float:left; margin-right:15px;">
        <img src="<?php echo $val['medal_img']; ?>" style="margin-right:5px; vertical-align:middle" />
        <p><?php echo $val['medal_name']; ?></p>
        <p><input type="checkbox"  onchange="open_medal_index(<?php echo $val['id']; ?>);return false;" 
<?php if($val['is_index'] == "1") echo "checked=checkbox"; ?>
/>显示</p>
    </div>
<?php } } ?>
<?php if($sina) { ?>
    <div style="width:120px; height:120px; float:left; margin-right:15px;">
    <img src="templates/default/images/medal/M_sina.gif" />
    <p>绑定新浪</p>
    <p><input type="checkbox" checked="checked" disabled="disabled"/>显示</p>
    </div>
<?php } ?>
<?php if($qqwb) { ?>
    <div style="width:120px; height:120px; float:left; margin-right:15px;">
    <img src="./templates/default/images/medal/qqwb.png" />
    <p>绑定腾讯</p>
    <p><input type="checkbox" checked="checked" disabled="disabled"/>显示</p>
    </div>
<?php } ?>
<?php if($imjiqiren) { ?>
    <div style="width:120px; height:120px; float:left; margin-right:15px;">
    <img src="templates/default/images/medal/M_qq.gif" />
    <p>绑定QQ</p>
    <p><input type="checkbox" checked="checked" disabled="disabled"/>显示</p>
    </div>
<?php } ?>
<?php if($sms) { ?>
    <div style="width:120px; height:120px; float:left; margin-right:15px;">
    <img src="templates/default/images/medal/Tel.gif" />
    <p>绑定手机</p>
    <p><input type="checkbox" checked="checked" disabled="disabled"/>显示</p>
    </div>
<?php } ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><a href="index.php?mod=other&code=medal" target="_blank">点击获得更多勋章</a></td>
      </tr>
    </table><?php } elseif('exp'==$act) { ?><h3>微博等级<span></span></h3>
    <div class="lelInfo">
    <div class="currentLel">
        <img src="<?php echo $member['face_original']; ?>" alt="<?php echo $member['nickname']; ?>" class="userPic" onerror="javascript:faceError(this);"/>
        <div class="lelProcess">
            <div class="userName">
            <b><?php echo $member['nickname']; ?></b>  
            <span class="wb_l_level">
            <a class="ico_level wbL<?php echo $member['level']; ?>" title="点击查看微博等级" href="index.php?mod=settings&code=exp" target="_blank"><?php echo $member['level']; ?></a>
            </span><br>
            <!--<em> LV <?php echo $member['level']; ?> </em>-->
            </div>
            <div class="lelProcessBox">
                <p class="blueProcess" style="width:<?php echo $exp_width; ?>%;"></p>
            </div>
            <div class="lelEx">
                <p>你当前的积分值是<span class="num"><?php echo $my_credits; ?></span>分，升级还需<span class="num"><?php echo $nex_exp_credit; ?></span>分。</p>
                <div class="arrow"></div>
            </div>
        </div>
    </div>
    <div class="lelIntro">
        <h2>微博等级与你一起并肩成长</h2>
        <p class="tg">担心粉丝永远超不过名人？没关系，现在我们有微博等级。</p>
        <p class="tg"><?php echo $this->Config['site_name']; ?>积分等级隆重上线。它是对微博用户“活跃程度”和“受欢迎程度”的综合衡量。</p>
        <p class="tg">只要持续经营自己的微博，努力贡献并分享优质内容，你将获得等级的加速提升，享受更多微时代的乐趣。</p>       
        <h3>微博等级计算方法</h3>
        <p class="fc6"><a style="float: right;" href="index.php?mod=settings&code=extcredits&op=rule">查看积分获取规则</a>您在微博的等级完全取决于积分的多少。有新鲜功能会让高等级用户优先体验。</p>
        <table cellpadding="0" cellspacing="0" class="gTable">
            <tr>
<?php if(is_array($exp_list)) { foreach($exp_list as $val) { ?>
                <th>LV<?php echo $val['level']; ?></th>
<?php } } ?>
</tr>
            <tr>
<?php if(is_array($exp_list)) { foreach($exp_list as $val) { ?>
                <td><?php echo $val['start_credits']; ?></td>
<?php } } ?>
            </tr>
        </table>
    </div>
</div>
<!--等级说明结构结束--><?php } elseif('validate_extra' == $act) { ?><form action="index.php?mod=settings&amp;code=do_validate_extra" method="post"  enctype="multipart/form-data" name="formInfo" id="formInfo">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="10%" height="30">开启专题</td>
    <td width="90%" height="30">
      <input id="radio" value="1" checked="checked" type="radio" name="open_extra" />开启
      <input id="radio" value="0" type="radio" name="open_extra" />关闭
      <script language='JavaScript' type="text/javascript">autoSelected(document.formInfo.open_extra, '<?php echo $member['open_extra']; ?>');</script>
    </td>
  </tr>
</table>
<?php if($meb_fields['remark']) { ?>
    <h3>简介<span>（<i class="W_spetxt">*</i>会显示在个人微博首页右侧）</span></h3>
    <table cellspacing="0" cellpadding="0">
      <tr>
        <td>是否启用？</td>
        <td><input id="remark_enable" value="1" checked="checked" type="radio" name="data[validate_remark][enable]" />
            <label for="data[validate_remark][enable]_1">是</label>
            <input id="remark_enable" value="0" type="radio" name="data[validate_remark][enable]" />
            <label for="data[validate_remark][enable]_0">否</label>        
            <script language='JavaScript' type="text/javascript">autoSelected(document.formInfo.remark_enable, '<?php echo $data['validate_remark']['enable']; ?>');</script>
            </td>
        </tr>
      <tr>
        <td>简介内容：</td>
        <td><textarea rows="4" cols="52" name="data[validate_remark][content]"><?php echo $data['validate_remark']['content']; ?></textarea></td>
      </tr>
      </table>
<?php } ?>
<!--公告栏-->
<?php if($meb_fields['cement']) { ?>
    <h3>公告栏<span>（<i class="W_spetxt">*</i> 会显示在个人微博首页右侧）</span></h3>
        <table cellspacing="0" cellpadding="0">
      <tr>
        <td>是否启用？</td>
        <td><input id="cement_enable" value="1" checked="checked" type="radio" name="data[validate_cement][enable]" />
            <label for="data[validate_cement][enable]_1">是</label>
            <input id="cement_enable" value="0" type="radio" name="data[validate_cement][enable]" />
          <label for="data[validate_cement][enable]_0">否</label>
          <script language='JavaScript' type="text/javascript">autoSelected(document.formInfo.cement_enable, '<?php echo $data['validate_cement']['enable']; ?>');</script>
        </td>
        </tr>
      <tr>
        <td>公告内容：</td>
        <td><textarea rows="4" cols="52" name="data[validate_cement][content]"><?php echo $data['validate_cement']['content']; ?></textarea></td>
      </tr>
      </table>
<?php } ?>
<!--投票-->
<?php if($meb_fields['vote']) { ?>
    <h3>投票<span>（<i class="W_spetxt">*</i> 会显示在个人微博首页右侧）</span></h3>
        <table cellspacing="0" cellpadding="0">
      <tr>
        <td>是否启用？</td>
        <td>
         <input id="vote_enable" value="1" checked="checked" type="radio" name="data[validate_vote][enable]" />
         <label for="data[validate_vote][enable]_1">是</label>
         <input id="vote_enable" value="0" type="radio" name="data[validate_vote][enable]" />
         <label for="data[validate_vote][enable]_0">否</label>
         <script language='JavaScript' type="text/javascript">autoSelected(document.formInfo.vote_enable, '<?php echo $data['validate_vote']['enable']; ?>');</script>
        </td>
        </tr>
<?php if($vote_list) { ?>
      <tr>
        <td>选择投票：</td>
        <td>
        <select name="data[validate_vote][content]" id="vote_content">
<?php if(is_array($vote_list)) { foreach($vote_list as $val) { ?>
          <option value="<?php echo $val['vid']; ?>"><?php echo $val['subject']; ?></option>
<?php } } ?>
        </select>
        <script language='JavaScript' type="text/javascript">autoSelected(document.formInfo.vote_content, '<?php echo $data['validate_vote']['content']; ?>');</script>
        </td>
      </tr>
<?php } else { ?>  
        <tr>
        <td>选择投票：</td>
        <td>
            您暂时没有发起任何投票
        </td>
      </tr>
<?php } ?>
      </table>
<?php } ?>
<!--视频-->
<?php if($meb_fields['video']) { ?>
    <h3>视频<span>（<i class="W_spetxt">*</i> 会显示在个人微博首页右侧）</span></h3>
      <table>
         <tr>
        <td>是否启用？</td>
        <td><input id="video_enable" value="1" checked="checked" type="radio" name="data[validate_video][enable]" />
            是
            <input id="video_enable" value="0" type="radio" name="data[validate_video][enable]" />
          否
          <script language='JavaScript' type="text/javascript">autoSelected(document.formInfo.video_enable, '<?php echo $data['validate_video']['enable']; ?>');</script>
        </td>
        </tr>
        <tr>
            <td>区块标题：</td>
            <td><input type="text" name="data[validate_video][title]" value="<?php echo $data['validate_video']['title']; ?>" size="50" /></td>
        </tr>
        <tr valign="top">
            <td>视频地址：</td>
            <td>
<?php if(is_array($data['validate_video']['list'])) { foreach($data['validate_video']['list'] as $v) { ?>
            <input type="text" name="data[validate_video][list][]" value="<?php echo $v; ?>" size="50" /><br />
<?php } } ?>
<input type="text" name="data[validate_video][list][]" value="" size="50" /><br />
            </td>
        </tr>
    </table>
<?php } ?>
<!--友情链接-->
<?php if($meb_fields['link']) { ?>
    <h3>友情链接<span>（<i class="W_spetxt">*</i> 会显示在个人微博首页左侧）</span></h3>
    <table cellspacing="0" cellpadding="0">
      <tr>
        <td>是否启用？</td>
        <td><input id="data[validate_link][enable]_1" value="1" checked="checked" type="radio" name="data[validate_link][enable]" />
            是
            <input id="data[validate_link][enable]_0" value="0" type="radio" name="data[validate_link][enable]" />
           否
        </td>
        </tr>
      <tr>
        <td height="25">链接1：</td>
        <td height="25"><input type="text" name="data[validate_link][link][title_1]"  value="<?php echo $data['validate_link']['link']['title_1']; ?>"/></td>
      </tr>
       <tr>
        <td height="25">url：</td>
        <td height="25"><input type="text" name="data[validate_link][link][url_1]"  value="<?php echo $data['validate_link']['link']['url_1']; ?>" style="width:320px;" /></td>
      </tr>
       <tr>
        <td height="25">链接2：</td>
        <td height="25"><input type="text" name="data[validate_link][link][title_2]" value="<?php echo $data['validate_link']['link']['title_2']; ?>"/></td>
      </tr>
       <tr>
        <td height="25">url：</td>
        <td height="25"><input type="text" name="data[validate_link][link][url_2]"  value="<?php echo $data['validate_link']['link']['url_2']; ?>" style="width:320px;" //></td>
      </tr>
      <tr>
        <td height="25">链接3：</td>
        <td height="25"><input type="text" name="data[validate_link][link][title_3]" value="<?php echo $data['validate_link']['link']['title_3']; ?>"/></td>
      </tr>
      <tr>
        <td height="25">url：</td>
        <td height="25"><input type="text" name="data[validate_link][link][url_3]" value="<?php echo $data['validate_link']['link']['url_3']; ?>"style="width:320px;" //></td>
      </tr>
        <tr>
        <td height="25">链接4：</td>
        <td height="25"><input type="text" name="data[validate_link][link][title_4]" value="<?php echo $data['validate_link']['link']['title_4']; ?>"/></td>
      </tr>
      <tr>
        <td height="25">url：</td>
        <td height="25"><input type="text" name="data[validate_link][link][url_4]" value="<?php echo $data['validate_link']['link']['url_4']; ?>"style="width:320px;" //></td>
      </tr>
        <tr>
        <td height="25">链接5：</td>
        <td height="25"><input type="text" name="data[validate_link][link][title_5]" value="<?php echo $data['validate_link']['link']['title_5']; ?>"/></td>
      </tr>
      <tr>
        <td height="25">url：</td>
        <td height="25"><input type="text" name="data[validate_link][link][url_5]" value="<?php echo $data['validate_link']['link']['url_5']; ?>"style="width:320px;" //></td>
      </tr>
      </table>
<?php } ?>
<div>
      <input type="submit" name="Submit" value="提交" />
      <input name="submit" type="hidden" id="submit" value="1" />
    </div>
</form>    
<?php } ?>
</div>
</div>
</div>
</div>
<style type="text/css">
.bottomLinks{width:930px; background:#e7f6f9;}
.bottomLinks .bL_info{width:180px;}
.tagBox{ margin-left:690px;}
</style><script type="text/javascript" src="templates/default/js/jsgst.js?v=build+20120428"></script>
<script type="text/javascript" src="templates/default/js/jsgst_autocomplete.js?v=build+20120428"></script>
<script type="text/javascript" src="templates/default/js/ai.js?v=build+20120428"></script>
<script type="text/javascript" src="templates/default/js/combobox.js?v=build+20120428"></script>
<!-- JS消息提示层 show_message('发布成功') -->
<div id="show_message_area"></div>
<?php echo $this->js_show_msg(); ?>
<?php echo $GLOBALS['schedule_html']; ?>
<?php if($GLOBALS['jsg_schedule_mark'] || jsg_getcookie('jsg_schedule')) echo jsg_schedule(); ?>
<!-- Ajax端内容返回 -->
<div id="ajax_output_area"></div>
<?php if(MEMBER_ID ==0) { ?>
<style type="text/css">
.bottomLinks{width:930px;}
.bottomLinks .bL_info{width:180px;}
</style>
<?php } ?>
<div class="bottomLinks_R">
<div class="bottomLinks <?php echo $t_col_foot; ?> bottomLinks_reg">
<div class="bL_List">
<div class="bL_info bL_io1 <?php echo $bL_info_three; ?>">  
        <h4 class="MIB_txtar">找感兴趣的人</h4>
        <ul>
            <li class="MIB_linkar"><a href="index.php?mod=people">名人堂</a></li>
            <li class="MIB_linkar"><a href="index.php?mod=other&code=media">媒体汇</a></li>
            <li class="MIB_linkar"><a href="index.php?mod=topic&code=top">排行榜</a></li>
            <li class="MIB_linkar"><a href="index.php?mod=profile&code=maybe_friend" rel="nofollow">猜你喜欢的</a></li>
        </ul>
    </div>
    <div class="bL_info bL_io2 <?php echo $bL_info_three; ?>">  
        <h4 class="MIB_txtar">精彩内容</h4>
        <ul>
            <li class="MIB_linkar"><a href="index.php?mod=live">微直播</a></li>
            <li class="MIB_linkar"><a href="index.php?mod=talk">微访谈</a></li>
            <li class="MIB_linkar"><a href="index.php?mod=topic&code=new">最新微博</a></li>
            <li class="MIB_linkar"><a href="index.php?mod=topic&code=recd">官方推荐</a></li>
        </ul>
    </div>
    <div class="bL_info bL_io3 <?php echo $bL_info_three; ?>">  
        <h4 class="MIB_txtar">热门应用</h4>
        <ul>
            <li class="MIB_linkar"><a href="index.php?mod=show&code=show">微博秀</a></li>
            <li class="MIB_linkar"><a href="index.php?mod=topic&code=photo">图片墙</a></li>
            <li class="MIB_linkar"><a href="index.php?mod=wall&code=control">上墙</a></li>
            <li class="MIB_linkar"><a href="index.php?mod=tools&code=qmd">图片签名档</a></li>
        </ul>
    </div>
    <div class="bL_info bL_io4 <?php echo $bL_info_three; ?>">  
        <h4 class="MIB_txtar">手机舆情</h4>
        <ul>
            <li class="MIB_linkar"><a href="index.php?mod=other&code=wap">WAP访问</a></li>
            <li class="MIB_linkar"><a href="index.php?mod=other&code=mobile" target=_blank>3G网页</a></li>
            <li class="MIB_linkar"><a href="index.php?mod=other&code=android">android客户端</a></li>
            <li class="MIB_linkar"><a href="index.php?mod=other&code=iphone">iphone客户端</a></li>
        </ul>
    </div>
    <div class="bL_info bL_io5 <?php echo $bL_info_three; ?>">  
        <h4 class="MIB_txtar">关于我们</h4>
        <ul>
            <li class="MIB_linkar"><a href="index.php?mod=other&code=contact">联系我们</a></li>
            <li class="MIB_linkar"><a href="index.php?mod=other&code=vip_intro">申请V认证</a></li>
<?php if(!empty($navigation_config['pluginmenu'])) { ?>
<?php if(is_array($navigation_config['pluginmenu'])) { foreach($navigation_config['pluginmenu'] as $pmenus) { ?>
<?php if(is_array($pmenus)) { foreach($pmenus as $pmenu) { ?>
<?php if($pmenu['type'] == 2) { ?>
            <li><a href="<?php echo $pmenu['url']; ?>" target="<?php echo $pmenu['target']; ?>"><?php echo $pmenu['name']; ?></a></li>
<?php } ?>
<?php } } ?>
<?php } } ?>
<?php } ?>
<li><?php echo $this->Config['tongji']; ?></li>
            <li class="MIB_linkar">
                <a href="http://www.miibeian.gov.cn/" target="_blank" title="网站备案" rel="nofollow"><?php echo $this->Config['icp']; ?></a></li>
            <!-- <li class="MIB_linkar">
                <a href="index.php?mod=other&code=notice" target="_blank" title="网站公告" rel="nofollow">网站公告</a></li> -->
            <li class="MIB_linkar">
<?php $__server_execute_time = round(microtime(true) - $GLOBALS['_J']['time_start'], 5) . " Second "; ?>
<?php $__gzip_tips = ((defined('GZIP') && GZIP) ? "&nbsp;Gzip Enable." : "Gzip Disable."); ?>
<span title="<?php echo $__server_execute_time; ?>,<?php echo $__gzip_tips; ?>">网页执行信息</span>
                <?php echo upsCtrl()->Comlic(); ?></li>
            <li></li>
        </ul>
    </div>
</div>
</div></div>
<script type="text/javascript">
$(document).ready(function(){
$('.goTop').click(function(e){
e.stopPropagation();
$('html, body').animate({scrollTop: 0},300);
backTop();
return false;
});
});
</script>
<div id="backtop" class="backTop"><a href="/#" class="goTop" title="返回顶部"></a></div>
<script type="text/javascript">
window.onscroll=backTop;
function backTop(){
var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
  if(scrollTop==0){
   document.getElementById('backtop').style.display="none";
   }else{
   document.getElementById('backtop').style.display="block";
    }
  }
backTop();
</script>
</body>
</html>
<?php echo $GLOBALS['iframe']; ?>