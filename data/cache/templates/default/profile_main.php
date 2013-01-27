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
<div class="main <?php echo $t_col_main; ?>">
<!--此处三栏-->
<div class="t_col_main_si <?php echo $t_col_main_side; ?>">
<div class="t_col_main_fl">
    <div id="topic_index_left_ajax_list">
     <!--网站开启三栏后 显示左边  关于我的信息-->
<div class="t_col_main_ln <?php echo $t_col_main_lb; ?>">
<script type="text/javascript">
    $(document).ready(function(){
        $(".member_exp").mouseover(function(){$(".member_exp_c").show();});
        $(".member_exp").mouseout(function(){$(".member_exp_c").hide();});
        $("#m_avatar2").mouseover(function(){$(".avatar_tips").show();});
        $("#m_avatar2").mouseout(function(){$(".avatar_tips").hide();});
    });
</script>
<!--用户头像等信息-->
<?php if($my_member || $member) { ?>
<?php $_mymember = $my_member ? $my_member : $member ?>
<div class="sideBox" style="margin:0; padding:0;">
        <div class="avatar2" id="m_avatar2">
        <p class="avatar2_i"><a href="index.php?mod=<?php echo $_mymember['username']; ?>" title="<?php echo $_mymember['username']; ?>"><img src="<?php echo $_mymember['face_original']; ?>" alt="<?php echo $_mymember['nickname']; ?>" onerror="javascript:faceError(this);" /></a></p>
<?php if(MEMBER_ID == $_mymember['uid']) { ?>
<p class="avatar_tips"><a id="avatar_upload" href="index.php?mod=settings&code=face">上传头像</a></p>
<?php } ?>
</div>
        <div class="avatar2_info">
        <p><a href="index.php?mod=<?php echo $_mymember['username']; ?>" title="@<?php echo $_mymember['nickname']; ?>"><b><?php echo $_mymember['nickname']; ?></b></a><?php echo $_mymember['validate_html']; ?></p>
        <p>
<?php if($this->Config['level_radio']) { ?>
<?php if($this->Config['topic_level_radio']) { ?>
          <span class="wb_l_level" style="margin:0;">
            <a class="ico_level wbL<?php echo $_mymember['level']; ?>" title="点击查看微博等级"  href="index.php?mod=settings&code=exp" target="_blank"><?php echo $_mymember['level']; ?></a>
          </span>
<?php } ?>
<?php } ?>
<?php if($_mymember['credits']) { ?>
积分：<a title="点击查看我的积分" href="index.php?mod=settings&code=extcredits"><b><?php echo $_mymember['credits']; ?></b></a>
<?php } ?>
</p>
        <p style="width:132px; height:20px; overflow:hidden;">
<?php $member_signature = cut_str($_mymember['signature'],20); ?>
<?php if($_mymember['uid'] == MEMBER_ID ) { ?>
            <a href="javascript:viod(0);" onclick="follower_choose(<?php echo $_mymember['uid']; ?>,'<?php echo $_mymember['nickname']; ?>','topic_signature'); return false;" >
            <span ectype="user_signature_ajax_left_<?php echo $_mymember['uid']; ?>">
                <span  title="个人签名：<?php echo $_mymember['signature']; ?>">
<?php if($_mymember['signature']) { ?>
(<?php echo $member_signature; ?>)
<?php } else { ?>编辑个人签名
<?php } ?>
</span>
            </span>
            </a>
<?php } else { ?><span  title="个人签名：<?php echo $_mymember['signature']; ?>">
<?php if($_mymember['signature']) { ?>
<?php if('admin' == MEMBER_ROLE_TYPE) { ?>
                <a href="javascript:void(0);" onclick="follower_choose(<?php echo $_mymember['uid']; ?>,'<?php echo $_mymember['nickname']; ?>','topic_signature');" title="点击修改个人签名">
                <em ectype="user_signature_ajax_<?php echo $_mymember['uid']; ?>">(<?php echo $member_signature; ?>)</em>
                </a>
<?php } ?>
<?php } ?>
</span>
<?php } ?>
</p>
        <?php echo $this->hookall_temp['global_user_extra1']; ?>
        <?php echo $this->hookall_temp['global_user_extra2']; ?>
        <?php echo $this->hookall_temp['global_user_extra3']; ?>
        </div>
   </div>
    <div class="sideBox">
    <div class="user_atten">
        <div class="person_atten_l">
            <p><span class="num"><a href="index.php?mod=<?php echo $_mymember['username']; ?>&code=follow" title="<?php echo $_mymember['nickname']; ?>关注的"><?php echo $_mymember['follow_count']; ?></a></span></p>
            <p><a href="index.php?mod=<?php echo $_mymember['username']; ?>&code=follow" title="<?php echo $_mymember['nickname']; ?>关注的">关注</a> </p>
        </div>
        <div class="person_atten_l">
            <p><span class="num"><a href="index.php?mod=<?php echo $_mymember['username']; ?>&code=fans" title="关注<?php echo $_mymember['nickname']; ?>的"><?php echo $_mymember['fans_count']; ?></a></span></p>
            <p><a href="index.php?mod=<?php echo $_mymember['username']; ?>&code=fans" title="关注<?php echo $_mymember['nickname']; ?>的">粉丝</a> </p>
        </div>
        <div class="person_atten_r">
            <p><span class="num"><a href="index.php?mod=<?php echo $_mymember['username']; ?>" title="<?php echo $_mymember['nickname']; ?>的微博"><?php echo $_mymember['topic_count']; ?></a></span></p>
            <p><a href="index.php?mod=<?php echo $_mymember['username']; ?>" title="<?php echo $_mymember['nickname']; ?>的微博">微博</a> </p>
        </div>
     </div>
        <?php echo $this->hookall_temp['global_user_extra4']; ?>
    </div>
<?php } ?>
<!------用户头像等信息------->
<!------用户勋章信息------->
<script type="text/javascript">
$(document).ready(function(){
    $(".sina_weibo").mouseover(function(){$(".sina_weibo_c").show();});
    $(".sina_weibo").mouseout(function(){$(".sina_weibo_c").hide();});
    $(".qqwb").mouseover(function(){$(".qqwb_c").show();});
    $(".qqwb").mouseout(function(){$(".qqwb_c").hide();});
    $(".qqim").mouseover(function(){$(".qqim_c").show();});
    $(".qqim").mouseout(function(){$(".qqim_c").hide();});
    $(".tel").mouseover(function(){$(".tel_c").show();});
    $(".tel").mouseout(function(){$(".tel_c").hide();});
<?php if(is_array($medal_list)) { foreach($medal_list as $v) { ?>
        $(".medal_<?php echo $v['id']; ?>").mouseover(function(){$(".medal_c_<?php echo $v['id']; ?>").show();});
        $(".medal_<?php echo $v['id']; ?>").mouseout(function(){$(".medal_c_<?php echo $v['id']; ?>").hide();});
<?php } } ?>
});
</script>
<ul class="Vimg">
<?php if('tag'!=$this->Get['mod'] || $_mymember['style_three_tol'] == 1) { ?>
<?php if($this->Config['sina_enable'] && sina_weibo_init($this->Config)) { ?>
    <li class="sina_weibo">
<?php echo sina_weibo_bind_icon($_mymember['uid']); ?>
 &nbsp; 
        <div class="sina_weibo_c">
            <div class="VM_box">
                <div class="VM_top">
                    <div class="med_img"><img src="./templates/default/images/medal/M_sina.gif"></div>
                    <div class="med_intro">
                        <p>新浪微博</p>
                         绑定后，可以使用新浪微博帐号进行登录，在本站发的微博可以同步发到新浪微博<br />
<?php $sina_return  = sina_weibo_has_bind($member['uid']); ?>
<?php if(!$sina_return) { ?>
                        <a href="index.php?mod=account&code=sina">绑定新浪微博</a> |
<?php } ?>
<a target="_blank" href="index.php?mod=other&code=medal&view=my">查看我的勋章</a>
                    </div>
                </div>
            </div>
        </div>        
    </li>
<?php } ?>
<?php if($this->Config['qqwb_enable'] && qqwb_init($this->Config)) { ?>
    <li class="qqwb">
<?php echo qqwb_bind_icon($_mymember['uid']); ?>
 &nbsp; 
        <div class="qqwb_c">
            <div class="VM_box">
                <div class="VM_top">
                    <div class="med_img"><img src="./templates/default/images/medal/qqwb.png"></div>
                    <div class="med_intro">
                        <p>腾讯微博</p>
                         绑定后，可以使用腾讯微博帐号进行登录，在本站发的微博可以同步发到腾讯微博<br />
<?php $qqwb_return  = qqwb_bind_icon($member['uid']); ?>
<?php if(!$qqwb_return) { ?>
                        <a href="index.php?mod=account&code=qqwb">绑定腾讯微博</a> |
<?php } ?>
<a target="_blank" href="index.php?mod=other&code=medal&view=my">查看我的勋章</a>
                    </div>
                </div>
            </div>
        </div>
    </li>
<?php } ?>
<?php if($this->Config['imjiqiren_enable'] && imjiqiren_init($this->Config)) { ?>
    <li class="qqim">
<?php echo imjiqiren_bind_icon($_mymember['uid']); ?>
 &nbsp; 
        <div class="qqim_c">
            <div class="VM_box">
                <div class="VM_top">
                    <div class="med_img"><img src="./templates/default/images/medal/M_qq.gif"></div>
                    <div class="med_intro">
                    <p>QQ机器人</p>
                    用自己的QQ发微博、通过QQ签名发微博，如果有人@你、评论你、关注你、给你发私信，你都可以第一时间收到QQ机器人的通知<br />
<?php $imjiqiren_return  = imjiqiren_has_bind($member['uid']); ?>
<?php if(!$imjiqiren_return) { ?>
                    <a href="index.php?mod=tools&code=imjiqiren">绑定QQ机器人</a> |
<?php } ?>
<a target="_blank" href="index.php?mod=other&code=medal&view=my">查看我的勋章</a>
                    </div>
                </div>
            </div>
        </div>
    </li>
<?php } ?>
<?php if($this->Config['sms_enable'] && sms_init($this->Config)) { ?>
    <li class="tel">
<?php echo sms_bind_icon($_mymember['uid']); ?>
 &nbsp; 
        <div class="tel_c">
            <div class="VM_box">
                <div class="VM_top">
                    <div class="med_img"><img src="./templates/default/images/medal/Tel.gif"></div>
                    <div class="med_intro">
                    <p>手机短信</p>
                    用自己的手机发微博、通过手机签名发微博，如果有人@你、评论你、关注你、给你发私信，你都可以第一时间收到手机短信的通知<br />
<?php $sms_return  = sms_has_bind($_mymember['uid']); ?>
<?php if(!$sms_return) { ?>
                    <a href="index.php?mod=other&code=sms">绑定手机短信</a> |
<?php } ?>
<a target="_blank" href="index.php?mod=other&code=medal&view=my">查看我的勋章</a>
                    </div>
                </div>
            </div>
        </div>
    </li>
<?php } ?>
<?php } ?>
<?php if($member['validate'] || $medal_list) { ?>
<?php if(is_array($medal_list)) { foreach($medal_list as $val) { ?>
<?php $medal_type = unserialize($val['conditions']); ?>
<li class="medal_<?php echo $val['id']; ?>"><a href="index.php?mod=other&code=medal" target="_blank"><img src="<?php echo $val['medal_img']; ?>"/></a> &nbsp; 
        <div class="medal_c medal_c_<?php echo $val['id']; ?>">
            <div class="VM_box">
                <div class="VM_top">
                <div class="med_img"><img src="<?php echo $val['medal_img']; ?>"/></div>
                    <div class="med_intro">
                    <p><?php echo $val['medal_name']; ?></p>
                    <?php echo $val['medal_depict']; ?> <br />
<?php if(MEMBER_ID != $member['uid']) { ?>
(他于：<?php echo $val['dateline']; ?> 获得) <br />
<?php if($medal_type['type'] == 'topic') { ?>
                    <a href="index.php?mod=topic&code=myhome" target="_blank">我要发微博</a> |<?php } elseif($medal_type['type'] == 'reply') { ?><a href="index.php?mod=topic&code=new" target="_blank">我要发评论</a> |<?php } elseif($medal_type['type'] == 'tag') { ?><a href="index.php?mod=tag&code=<?php echo $medal_type['tagname']; ?>" target="_blank">我要发话题</a> |<?php } elseif($medal_type['type'] == 'invite') { ?><a href="index.php?mod=profile&code=invite" target="_blank">马上去邀请好友</a> |<?php } elseif($medal_type['type'] == 'shoudong') { ?>管理员手动发放  |    
<?php } ?>
<?php } else { ?>(我于：<?php echo $val['dateline']; ?> 获得) <br />
<?php } ?>
<a target="_blank" href="index.php?mod=other&code=medal&view=my">查看我的勋章</a>
                    </div>
                </div>
            </div>
        </div>
    </li>
<?php } } ?>
<?php } ?>
<?php if($this->Config['yy_enable'] && yy_init($this->Config)) { ?>
    <li class="yy">
<?php echo yy_bind_icon($_mymember['uid']); ?>
 &nbsp;</li>
<?php } ?>
<?php if($this->Config['renren_enable'] && renren_init($this->Config)) { ?>
    <li class="renren">
<?php echo renren_bind_icon($_mymember['uid']); ?>
 &nbsp;</li>
<?php } ?>
<?php if($this->Config['kaixin_enable'] && kaixin_init($this->Config)) { ?>
    <li class="kaixin">
<?php echo kaixin_bind_icon($_mymember['uid']); ?>
 &nbsp;</li>
<?php } ?>
<?php if($this->Config['fjau_enable'] && fjau_init($this->Config)) { ?>
    <li class="fjau">
<?php echo fjau_bind_icon($_mymember['uid']); ?>
 &nbsp;</li>
<?php } ?>
</ul>   
<?php if(MEMBER_ID == $_mymember['uid'] ) { ?>
      <div class="blackBox"></div>
      <ul class="boxRNav2">
<?php if(in_array($this->Code,array('myhome','tag','groupview','qun','cms','bbs','recd'))) $current_myhome = 'current' ?>
<?php if('myat'== $this->Code) $current_myat = 'current' ?>
<?php if('mycomment'== $this->Code) $current_mycomment = 'current' ?>
<?php if('myfavorite'== $this->Code) $current_myfavorite = 'current' ?>
        <li class="index <?php echo $current_myhome; ?>"> 
          <a href="index.php?mod=topic&code=myhome" hidefocus="true" title="我的首页">我的首页</a>
        </li>
        <li class="about <?php echo $current_myat; ?>"> 
          <a href="index.php?mod=topic&code=myat" hidefocus="true" title="提到我的">提到我的</a>
        </li>
        <li class="letter <?php echo $current_mycomment; ?>"> 
          <a href="index.php?mod=topic&code=mycomment" hidefocus="true" title="评论我的">评论我的</a>
        </li>
        <li class="myfav <?php echo $current_myfavorite; ?>"> 
          <a href="index.php?mod=topic&code=myfavorite" hidefocus="true" title="我的收藏">我的收藏</a>
        </li>
      </ul>
<?php } ?>
      <div class="blackBox"></div>
        <ul class="boxRNav2">
<?php if(MEMBER_ID == $_mymember['uid']) $_my = '我'; elseif(1==$_mymember['gender']) $_my = '他';else $_my = '她'; ?>
<?php if('myblog'== $params['code'] && !$type) $current_myblog = 'current' ?>
<?php if('myblog'== $params['code'] && 'pic' == $type) $current_pic = 'current' ?>
<?php if('myblog'== $params['code'] && 'video' == $type) $current_video = 'current' ?>
<?php if('myblog'== $params['code'] && 'music' == $type) $current_music = 'current' ?>
<?php if('myblog'== $params['code'] && 'attach' == $type) $current_attach = 'current' ?>
<?php if('myblog'== $params['code'] && 'my_reply' == $type) $current_my_reply = 'current' ?>
<?php if('myblog'== $params['code'] && 'vote' == $type) $current_vote = 'current' ?>
<?php if('myblog'== $params['code'] && 'event' == $type) $current_event = 'current' ?>
<li class="mypub <?php echo $current_myblog; ?>"> 
          <a href="index.php?mod=<?php echo $_mymember['username']; ?>" hidefocus="true" title="<?php echo $_my; ?>的微博"><?php echo $_my; ?>的微博</a>
        </li>
        <li class="mycomment <?php echo $current_my_reply; ?>">
          <a href="index.php?mod=<?php echo $_mymember['username']; ?>&type=my_reply" hidefocus="true" title="<?php echo $_my; ?>的图片"><?php echo $_my; ?>的评论</a>
        </li>
        <li class="mypic <?php echo $current_pic; ?>">
          <a href="index.php?mod=<?php echo $_mymember['username']; ?>&type=pic" hidefocus="true" title="<?php echo $_my; ?>的图片"><?php echo $_my; ?>的图片</a>
        </li>
        <li class="myvoid <?php echo $current_video; ?>">
          <a href="index.php?mod=<?php echo $_mymember['username']; ?>&type=video" hidefocus="true" title="<?php echo $_my; ?>的视频"><?php echo $_my; ?>的视频</a>
        </li>
        <li class="mymusic <?php echo $current_music; ?>">
          <a href="index.php?mod=<?php echo $_mymember['username']; ?>&type=music" hidefocus="true" title="<?php echo $_my; ?>的音乐"><?php echo $_my; ?>的音乐</a>
        </li>
        <li class="myatt <?php echo $current_attach; ?>">
          <a href="index.php?mod=<?php echo $_mymember['username']; ?>&type=attach" hidefocus="true" title="<?php echo $_my; ?>的附件"><?php echo $_my; ?>的附件</a>
        </li>
<?php if($this->Config['vote_open']) { ?>
        <li class="myvote <?php echo $current_vote; ?>">
          <a href="index.php?mod=<?php echo $_mymember['username']; ?>&type=vote" hidefocus="true" title="<?php echo $_my; ?>的投票"><?php echo $_my; ?>的投票</a>
        </li>
<?php } ?>
<?php if($this->Config['event_open']) { ?>
        <li class="myact <?php echo $current_event; ?>">
           <a href="index.php?mod=<?php echo $_mymember['username']; ?>&type=event" hidefocus="true" title="<?php echo $_my; ?>的活动"><?php echo $_my; ?>的活动</a>
        </li>
<?php } ?>
<?php $navigation_config=ConfigHandler::get('navigation') ?>
<?php if(!empty($navigation_config['pluginmenu'])) { ?>
<?php if(is_array($navigation_config['pluginmenu'])) { foreach($navigation_config['pluginmenu'] as $pmenus) { ?>
<?php if(is_array($pmenus)) { foreach($pmenus as $pmenu) { ?>
<?php if($pmenu['type'] == 3) { ?>
<?php if('topic'==$this->require) { ?>
          <li class="mypub current">
<?php } else { ?>  <li class="mypub">
<?php } ?>
  <a href="<?php echo $pmenu['url']; ?>&require=topic" hidefocus="true" title="<?php echo $pmenu['name']; ?>"><?php echo $pmenu['name']; ?></a></li>
<?php } ?>
<?php } } ?>
<?php } } ?>
<?php } ?>
      </ul>
      <div class="blackBox2"></div>
</div>
    </div>
</div>
</div>
<!--此处三栏-->
<div class="mainL">
    <div class="mblogTitle3"><b>找人</b></div>
    <div class="Menubox2" style="width:540px;">
    <ul>
<?php if(is_array($act_list)) { foreach($act_list as $key => $val) { ?>
<?php $_hoverCLS = ($key==$act ? ' class="tago" ' : 'class="tagn"'); ?>
<?php if(!is_array($val)) { ?>
    <li><div <?php echo $_hoverCLS; ?>><A HREF="index.php?mod=profile&code=<?php echo $key; ?>"><span><?php echo $val; ?></span></A></div></li>
<?php } else { ?><li><div <?php echo $_hoverCLS; ?>><A HREF="index.php?mod=<?php echo $val['link_mod']; ?>&code=<?php echo $val['link_code']; ?>"><span><?php echo $val['name']; ?></span></A></div></li>
<?php } ?>
<?php } } ?>
</ul>
    </div>
<div class="set_warp" style="width:540px;">
<?php if('search'==$act) { ?>
<div class="oneCity">
  <form method="GET" name="profile_base" action="index.php" onSubmit="return Validator.Validate(this,3);">
    <p>
      <?php echo $province_list; ?>
      <select id="city" name="city" onchange="changeCity();">
        <option value="0">请选择</option>
      </select>
      <select id="area" name="area" onchange="changeArea();" style="display:none">
        <option value="0">请选择</option>
      </select>
      <select id="street" name="street" style="display:none">
        <option value="0">请选择</option>
      </select>
    </p>
    <p>
      <input type="submit" class="shareI" value="搜索"/>
      <input type="hidden" name="mod" value="profile" />
      <input type="hidden" name="code" value="search" />
    </p>
  </form>
  <input type="hidden" id="hid_city" name="hid_city" value="<?php echo $hid_city; ?>">
  <input type="hidden" id="hid_area" name="hid_area" value="<?php echo $hid_area; ?>">
  <input type="hidden" id="hid_street" name="hid_street" value="<?php echo $hid_street; ?>">
</div>
<script type="text/javascript" src="templates/default/js/city.js?v=build+20120428"></script>
<script type="text/javascript">
$(document).ready(function(){
var selectOption=
<?php load::functions('area');echo area_config_to_json(); ?>
;
});
function changeProvince(){
  var province = document.getElementById("province").value;
  var hid_city = document.getElementById("hid_city").value;
  var url = "ajax.php?mod=member&code=sel&type=top&province="+province + "&hid_city="+hid_city;
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
  var province = document.getElementById("province").value;
  var city = document.getElementById("city").value;
  document.getElementById("area").style.display = '';
  var hid_area = document.getElementById("hid_area").value;
  if(city){
    var url = "ajax.php?mod=member&code=sel&type=top&city="+city+"&hid_area="+hid_area;
    var myAjax=$.post(
              url,
              function(d){
                if(d){
                    document.getElementById("area").style.display = "block";
                      $('#' + "area").html(d);
                    changeArea();
                }else{
                    document.getElementById("street").style.display = "none";
                    document.getElementById("area").style.display = "none";
                    document.getElementById("hid_city").value = '';
                    document.getElementById("hid_area").value = '';
                    document.getElementById("hid_street").value = '';
                }
              }
  );
  }else{
        document.getElementById("street").style.display = "none";
        document.getElementById("area").style.display = "none";
        document.getElementById("hid_city").value = '';
        document.getElementById("hid_area").value = '';
        document.getElementById("hid_street").value = '';
  }
}
function changeArea(){
  var area = document.getElementById("area").value;
  var hid_street = document.getElementById("hid_street").value;
  if(area){
      var url = "ajax.php?mod=member&code=sel&type=top&area="+area+"&hid_street="+hid_street;
      var myAjax=$.post(
                  url,
                  function(d){
                    if(d){
                        document.getElementById("street").style.display = "block";
                        $('#' + "street").html(d);
                    }else{
                        document.getElementById("street").style.display = "none";
                    }
                  }
      );
  }else{
      document.getElementById("street").style.display = "none";
  }
  document.getElementById("hid_city").value = '';
  document.getElementById("hid_area").value = '';
  document.getElementById("hid_street").value = '';
}
</script>
<?php if($member_list) { ?>
   <p class="p_tip">找到 <?php echo $total_record; ?>人在<span class="fontRed"><?php echo $province_name; ?>&nbsp;<?php echo $city_name; ?>&nbsp;<?php echo $area_name; ?>&nbsp;<?php echo $street_name; ?>&nbsp;(<A HREF="index.php?mod=settings">修改</A>)</span></p>
    <ul class="followList" style="padding:0">
<?php if(is_array($member_list)) { foreach($member_list as $val) { ?>
    <li>
        <div class="fBox_l ">
          <img onmouseover="get_user_choose(<?php echo $val['uid']; ?>,'_user',<?php echo $val['uid']; ?>)" onmouseout="clear_user_choose()" onerror="javascript:faceError(this);" src="<?php echo $val['face']; ?>" width="50px" height="50px;"/>
        </div>
        <div id="user_<?php echo $val['uid']; ?>_user" class="layS"></div>
        <div class="fBox_R ">
            <a href="index.php?mod=<?php echo $val['username']; ?>" target="_blank"><?php echo $val['nickname']; ?><?php echo $val['validate_html']; ?></a>
            <span style="color:#666">@<?php echo $val['nickname']; ?> &nbsp;<?php echo $val['from_area']; ?></span>
            <div>被<span style="color:#ff0000;"><?php echo $val['fans_count']; ?></span>人关注 | 微博 <span style="color:#ff0000;"><?php echo $val['topic_count']; ?></span> 条</div>
<?php if(is_array($topic_list)) { foreach($topic_list as $t_val) { ?>
<?php if($val['uid'] == $t_val['uid']) { ?>
                 <div style="color:#666">最近更新：<?php echo $t_val['dateline']; ?><?php echo $t_val['tid']; ?></div>
                 <span><a href="index.php?mod=topic&code=<?php echo $t_val['tid']; ?>">
<?php if($t_val['content']) { ?>
<?php echo $t_val['content']; ?>
<?php } ?>
</a></span>
<?php } ?>
<?php } } ?>
         </div>
<?php if(MEMBER_ID!=$val['uid'] && $val['follow_html']) { ?>
                <div class="fBox_R2"><?php echo $val['follow_html']; ?></div>
<?php } ?>
        </li>
        <div id="Pmsend_to_user_area" style="width:430px;"></div>
        <div id="alert_follower_menu_<?php echo $val['uid']; ?>"></div>
        <span id="button_<?php echo $val['uid']; ?>" onclick="get_group_choose(<?php echo $val['uid']; ?>);"></span>
        <div id="global_select_<?php echo $val['uid']; ?>" class="alertBox alertBox_2" style="display:none"></div>
<?php } } ?>
<?php if($page_arr['html']) { ?>
        <li><?php echo $page_arr['html']; ?></li>
<?php } ?>
</ul>
<?php } else { ?><br />
    暂无符合条件的用户；<BR />
    你可尝试通过<A HREF="index.php?mod=profile&code=invite">邀请好友</A>功能，邀请站外朋友加入。
<?php } ?>
 <?php } elseif('maybe_friend'==$act) { ?><div class="oneCity">
        <form method="GET" name="profile_base" action="index.php" onSubmit="return Validator.Validate(this,3);">
            <input type="hidden" name="mod" value="search" />
            <input type="hidden" name="code" value="tag" />
            <p>
            <input name="tag" value="" type="text" class="p1 iip2" width="60px"  />
            <input type="submit" class="shareI" value="按话题"/></p>
        </form>
    </div>
<p>这里显示与你关注同样<a href="index.php?mod=tag" target="_blank">话题</a>、并且你还未关注的人；</p>
<?php if($member_list) { ?>
    <ul class="followList"  style="padding:0">
<?php if(is_array($member_list)) { foreach($member_list as $val) { ?>
        <li class="pane">
            <div class="fBox_l "><img onerror="javascript:faceError(this);" src="<?php echo $val['face']; ?>" onmouseover="get_user_choose(<?php echo $val['uid']; ?>,'_user',<?php echo $val['uid']; ?>)" onmouseout="clear_user_choose()"/></div>
            <div id="user_<?php echo $val['uid']; ?>_user"></div>
            <div class="fBox_R ">
                <span class="name"><a href="index.php?mod=<?php echo $val['username']; ?>"><?php echo $val['nickname']; ?></a><?php echo $val['validate_html']; ?>(@<?php echo $val['nickname']; ?>)</span>
                <div class="fBox_R"> 被<span style="color:#ff0000;"><?php echo $val['fans_count']; ?></span>人关注 | 微博<span style="color:#ff0000;"><?php echo $val['topic_count']; ?></span>条</div>
                <div>他关注的话题：
<?php if(is_array($user_favorite)) { foreach($user_favorite as $v) { ?>
<?php if($val['uid'] == $v['uid']) { ?>
                            <span><a href="index.php?mod=tag&code=<?php echo $v['tag']; ?>"><?php echo $v['tag']; ?></a> |</span>
<?php } ?>
<?php } } ?>
</div>
            </div>
            <div class="fBox_R2">
<?php if(MEMBER_ID!=$val['uid'] && $val['follow_html']) { ?>
                    <?php echo $val['follow_html']; ?><?php } elseif(MEMBER_ID==$val['uid']) { ?>（这是我自己）
<?php } ?>
</div>
        </li>
        <div id="Pmsend_to_user_area" style="width:430px;"></div>
        <div id="alert_follower_menu_<?php echo $val['uid']; ?>"></div>
        <span id="button_<?php echo $val['uid']; ?>" onclick="get_group_choose(<?php echo $val['uid']; ?>);"></span>
        <div id="global_select_<?php echo $val['uid']; ?>" class="alertBox alertBox_2" style="display:none"></div>
<?php } } ?>
</ul>
<?php } else { ?><div class="oneCity">
暂时没有（查看所有<a href="index.php?mod=<?php echo $member['username']; ?>&code=follow" target="_blank">我关注的</a>人）。<BR /><BR />
你可以先访问<a href="index.php?mod=tag" target="_blank">话题</a>页，查找感兴趣的话题并予以关注，然后再访问此页面；<BR/>
或者直接访问<a href="index.php?mod=topic&code=top" target="_blank">达人榜</a>，关注网站达人们。
</div>
<?php } ?>
<?php } elseif('usertag'==$act) { ?><p>系统根据你的个性标签为你推荐同类人（<A HREF="index.php?mod=user_tag">设置标签</A>），你也可以用搜索框查找。</p>
<div style="margin: 20px 0 0 0">
<form method="GET" name="profile_base" action="index.php" onSubmit="return Validator.Validate(this,3);">
  <span>输入标签：</span> 
  <span><input name="usertag" value="" type="text" class="p1" /></span>
  <span><input type="submit" class="shareI" value="搜 索"/></span>
  <input type="hidden" name="mod" value="search" />
  <input type="hidden" name="code" value="usertag" />
</form>
<p style="margin: 0 0 0 63px; color:#666;">输入你的兴趣标签，找到更多同类。如：音乐</p>
</div>
<?php if($member_list) { ?>
<p>&nbsp;</p>
    <div class="TopicMan">
    <div class="nfTagB">
        <ul>
            <li class="current"><span>我的标签</span></li>
        </ul>    
        <div class="clear"></div>
    </div>
    <div class="nfBox">
              <div>
<?php if(is_array($mytag)) { foreach($mytag as $my_val) { ?>
                  <span  style="float:left; padding:3px; white-space:nowrap"><a href="index.php?mod=search&code=usertag&usertag=<?php echo $my_val['tag_name']; ?>"><?php echo $my_val['tag_name']; ?></a></span>
<?php } } ?>
  </div>
              <div class="clear"></div>
        </div>
</div>
 <ul class="followList" style="padding:0">
<?php if(is_array($member_list)) { foreach($member_list as $val) { ?>
  <li>
    <div class="fBox_l"><img onerror="javascript:faceError(this);" src="<?php echo $val['face']; ?>" onmouseover="get_user_choose(<?php echo $val['uid']; ?>,'_user',<?php echo $val['uid']; ?>)" onmouseout="clear_user_choose()"/></div>
    <div id="user_<?php echo $val['uid']; ?>_user"></div>
    <div class="fBox_R">
      <span>
      <a href="index.php?mod=<?php echo $val['username']; ?>"><?php echo $val['nickname']; ?></a> 
<?php if($val['validate']) { ?>
<img src="./images/vip.gif"/>
<?php } ?>
      <a href="javascript:void(0)" onclick="follower_choose(<?php echo $val['uid']; ?>,'<?php echo $val['nickname']; ?>','at','');">(@<?php echo $val['nickname']; ?>)</a>
      </span>
    </div>
    <div class="fBox_R">被<span style="color:#ff0000;"><?php echo $val['fans_count']; ?></span>人关注 | 微博 <span style="color:#ff0000;"><?php echo $val['topic_count']; ?></span>条</div>
    <div class="fBox_R2">
<?php if(MEMBER_ID!=$val['uid'] && $val['follow_html']) { ?>
      <?php echo $val['follow_html']; ?>
      <?php } elseif(MEMBER_ID==$val['uid']) { ?>  
<?php } ?>
    </div>
    <div class="fBox_R">
<?php if(is_array($member_tag)) { foreach($member_tag as $mb_val) { ?>
<?php if($val['uid'] == $mb_val['uid']) { ?>
    <span style="float:left; padding:3px; white-space:nowrap">
        <a href="index.php?mod=search&code=usertag&usertag=<?php echo $mb_val['tag_name']; ?>">
<?php if(in_array($mb_val['tag_id'],$user_tagid)) { ?>
        <span style="color:#FF0000;word-wrap: break-word; word-break: normal; "><?php echo $mb_val['tag_name']; ?></span> | 
<?php } else { ?><?php echo $mb_val['tag_name']; ?> | 
<?php } ?>
</a>
    </span>
<?php } ?>
<?php } } ?>
</div>
    <div id="Pmsend_to_user_area" style="width:430px;"></div>
    <div id="alert_follower_menu_<?php echo $val['uid']; ?>"></div>
    <span id="button_<?php echo $val['uid']; ?>" onclick="get_group_choose(<?php echo $val['uid']; ?>);"></span>
    <div id="global_select_<?php echo $val['uid']; ?>" class="alertBox alertBox_2" style="display:none"></div>
  </li>
<?php } } ?>
<?php if($page_arr['html']) { ?>
  <li><?php echo $page_arr['html']; ?></li>
<?php } ?>
</ul>
<?php } else { ?> 
<br />
暂无符合条件的用户；<BR />
<?php } ?>
<?php } elseif('share'==$act) { ?><div class="friends textB">
<li>
<p class="vshare"><img src="templates/default/images/shareB.gif" border="0" />将其他网页内容分享到<?php echo $this->Config['site_name']; ?>（复制下面代码，粘贴到其他网页源码中）</p>
<textarea id="inviteURL1" type="text"  value="" onclick="copyText(this.value);"><a title="分享到<?php echo $this->Config['site_name']; ?>" href="javascript:var d=document,w=window,f='<?php echo $this->Config['site_url']; ?>',l=d.location,e=encodeURIComponent,p=''+e(l.href)+'&t='+e(d.title);if(!w.open(f+'/index.php?mod=share&code=share&url='+p,'','toolbar=0,status=0,width=500,height=400')){l.href=f+'.new'+p;}void(0)"><img src="
            <?php echo $this->Config['site_url']; ?>/templates/default/images/shareB.gif" border="0" />分享到<?php echo $this->Config['site_name']; ?></a>
</textarea>
<input type="button" class="save frr" value="复制链接" onclick="copyText($('#inviteURL1').val());" />
</li>
</div><?php } elseif('invite'==$act) { ?>
<?php if($can_invite_count<1) { ?>
您的<?php echo $this->Config['invite_count_max']; ?>个邀请名额已经用完，暂时不能再邀请好友了。
<?php } else { ?>邀请好友是有限制的，您还可以邀请 <span class="fontRed"><?php echo $can_invite_count; ?>人 </span>，可在下面看到已发邀请的相关信息。<BR /> 
通过你邀请加入的朋友，将与你自动相互关注（查看所有正在<a href="index.php?mod=<?php echo $member['username']; ?>&code=fans" target="_blank">关注我的</a>人）。
<div class="friends textB">
<span>方法一：根据情况复制下面的邀请内容，通过QQ、MSN、网站等发给你的朋友<br />
注意：以下邀请链接每次最多可邀请<?php echo $this->Config['invite_enable']; ?>人，达到<?php echo $this->Config['invite_enable']; ?>人后邀请即自动失效</span>
<textarea id="invite_url" type="text" onclick="copyText($(this).val());">
<?php if(!empty($invite_msg)) { ?>
<?php echo $invite_msg; ?>
<?php } else { ?>想体验最酷、最火的即时微博服务吗？
    欢迎在内测期加入【<?php echo $this->Config['site_name']; ?>】做‘创始元老’，即可随时随地的记录生活、分享见闻，更可自由关注人物和话题的动态，与朋友保持联络；内测邀请<?php echo $inviteURL; ?>（限<?php echo $this->Config['invite_enable']; ?>人）
<?php } ?>
</textarea>
<input type="button" class="save frr" value="复制链接" onclick="copyText($('#invite_url').val());" />
</div>
<div class="friends textB">
<form method="POST"  action="index.php?mod=profile&code=invite_by_email" onsubmit="return Validator.Validate(this,3);">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
<span>方法二：直接在下面输入朋友的邮箱地址，系统将自动通过邮件发邀请<br />
注意：多个邮箱地址需用;分隔开，最多不超过10个。</span>
<input dataType="LimitB" min="6" max="300" msg="请将长度控制在6~300个字符之间" name="inviteEmail" type="text" class="p1" style="width:400px; height:80px; padding:5px; margin-bottom:5px; margin-top:10px;" />&nbsp;<input type="submit" class="save frr" value="发送邀请" />
</form>
</div>
<br />
<?php } ?>
<a id="MIL"></a>
已发送 <span class="fontRed"><?php echo $my_invite_count; ?>个</span> 邀请
<?php if($my_invite_count) { ?>
<table width="100%" border="0" class="table_1">
<?php if(is_array($invite_list)) { foreach($invite_list as $val) { ?>
<tr>
    <td width="60" class="t1">
<?php if($val['fusername']) { ?>
    <a href="index.php?mod=<?php echo $val['fusername']; ?>"><img onerror="javascript:faceError(this);" src="<?php echo $val['face']; ?>" width="50" height="50"/></a> 
<?php } ?>
</td>
    <td  class="t1">
    <p><span class="fontGreen">
<?php if($val['fusername']) { ?>
    <a href="index.php?mod=<?php echo $val['fusername']; ?>"><?php echo $val['fusername']; ?></a>
<?php } ?>
<?php if($val['femail']) { ?>
&lt;<?php echo $val['femail']; ?>&gt;
<?php } ?>
</span></p>
    <p><span><?php echo $val['from_area']; ?></span></p>
    <p><span>粉丝<?php echo $val['fans_count']; ?>人 | <?php echo $val['topic_count']; ?>条微博</span></p>
    </td>
    <td width="120" class="t1">
<?php if($val['fuid'] || ($val['dateline']+600)>time()) { ?>
<?php $tm=my_date_format($val['dateline'],'Y-m-d H:i'); ?>
<?php echo $tm; ?>
<?php if($val['follow_html']) { ?>
            <br /><?php echo $val['follow_html']; ?>    
<?php } ?>
<?php } elseif($val['femail']) { ?><a href="index.php?mod=profile&code=invite_by_email&inviteEmail=<?php echo $val['femail']; ?>">重新发送邀请？</a><?php } elseif(!$val['fuid']) { ?>邀请已发送，等待其注册
<?php } ?>
</td>
</tr>
<?php } } ?>
<?php if($page_arr['html']) { ?>
<tr>
<td colspan="3"><?php echo $page_arr['html']; ?></td>
</tr>
<?php } ?>
</table>
<?php } ?>
<?php } ?>
</div>
</div><div class="mainR">
<div id="topic_right_ajax_list">
<!--两栏  三栏 显示判断  (style_three_tol != 1 两栏)-->
<?php if(MEMBER_STYLE_THREE_TOL != 1) { ?>
<?php if(MEMBER_ID != $member['uid']) { ?>
<?php if($member['open_extra'] && $params['code']) { ?>
<script language="javascript">
        var vote_open = '<?php echo $this->Config['vote_open']; ?>';
        $(document).ready(function(){
        //这里的函数可以随便更改位置，加载的顺序也会不同。
            get_validate_remark(); 
            get_validate_cement();
            get_validate_link();
            get_validate_video();
            if(vote_open){
                get_validate_vote();
            }
        });
        function get_validate_remark(){
            //认证 专题 简介
            right_show_ajax('<?php echo $member['uid']; ?>','validate_remark','remark_content','validate');
        }
        function get_validate_cement(){
            //认证 专题 公告
            right_show_ajax('<?php echo $member['uid']; ?>','validate_cement','cement_content','validate');
        }
        function get_validate_link(){
            //认证 专题 公告
            right_show_ajax('<?php echo $member['uid']; ?>','validate_link','link_content','validate');
        }
        function get_validate_video(){
            //认证 专题 视频
            right_show_ajax('<?php echo $member['uid']; ?>','validate_video','video_content','validate');
        }
        function get_validate_vote(){
            //认证 专题 投票
            right_show_ajax('<?php echo $member['uid']; ?>','validate_vote','vote_content','validate');
        }
</script>
<div>
  <div class="mainR">
    <!--用户认证 专题简介-->
    <script type="text/javascript">
            $(document).ready(function(){
            $(".SC_benzhouremen").click(function(){$(this).parent().toggleClass("fold_benzhouremen");$(".SC_benzhouremen_box").toggle();});
            });
    </script>
    <div id="<?php echo $member['uid']; ?>_remark_content"></div>
    <!--用户认证 专题 友情链接 -->
    <script type="text/javascript">
            $(document).ready(function(){
            $(".SC_benzhouremen").click(function(){$(this).parent().toggleClass("fold_benzhouremen");$(".SC_benzhouremen_box").toggle();});
            });
    </script>
    <div id="<?php echo $member['uid']; ?>_link_content"></div>
    <!--用户认证 专题 公告栏 -->
    <script type="text/javascript">
            $(document).ready(function(){
            $(".SC_benzhouremen").click(function(){$(this).parent().toggleClass("fold_benzhouremen");$(".SC_benzhouremen_box").toggle();});
            });
    </script>
    <div id="<?php echo $member['uid']; ?>_cement_content"></div>
    <!--用户认证 专题 视频 -->
    <script type="text/javascript">
            $(document).ready(function(){
            $(".SC_benzhouremen").click(function(){$(this).parent().toggleClass("fold_benzhouremen");$(".SC_benzhouremen_box").toggle();});
            });
    </script>
    <div id="<?php echo $member['uid']; ?>_video_content"></div>
    <!--用户认证 专题 投票 -->
    <div id="<?php echo $member['uid']; ?>_vote_content"></div>
    <div id="alert_follower_menu_<?php echo $member['uid']; ?>" style="display:none"></div>
  </div>
</div>
<?php } else { ?><!--网站开启三栏后 显示左边  关于我的信息-->
<div class="t_col_main_ln <?php echo $t_col_main_lb; ?>">
<script type="text/javascript">
    $(document).ready(function(){
        $(".member_exp").mouseover(function(){$(".member_exp_c").show();});
        $(".member_exp").mouseout(function(){$(".member_exp_c").hide();});
        $("#m_avatar2").mouseover(function(){$(".avatar_tips").show();});
        $("#m_avatar2").mouseout(function(){$(".avatar_tips").hide();});
    });
</script>
<!--用户头像等信息-->
<?php if($my_member || $member) { ?>
<?php $_mymember = $my_member ? $my_member : $member ?>
<div class="sideBox" style="margin:0; padding:0;">
        <div class="avatar2" id="m_avatar2">
        <p class="avatar2_i"><a href="index.php?mod=<?php echo $_mymember['username']; ?>" title="<?php echo $_mymember['username']; ?>"><img src="<?php echo $_mymember['face_original']; ?>" alt="<?php echo $_mymember['nickname']; ?>" onerror="javascript:faceError(this);" /></a></p>
<?php if(MEMBER_ID == $_mymember['uid']) { ?>
<p class="avatar_tips"><a id="avatar_upload" href="index.php?mod=settings&code=face">上传头像</a></p>
<?php } ?>
</div>
        <div class="avatar2_info">
        <p><a href="index.php?mod=<?php echo $_mymember['username']; ?>" title="@<?php echo $_mymember['nickname']; ?>"><b><?php echo $_mymember['nickname']; ?></b></a><?php echo $_mymember['validate_html']; ?></p>
        <p>
<?php if($this->Config['level_radio']) { ?>
<?php if($this->Config['topic_level_radio']) { ?>
          <span class="wb_l_level" style="margin:0;">
            <a class="ico_level wbL<?php echo $_mymember['level']; ?>" title="点击查看微博等级"  href="index.php?mod=settings&code=exp" target="_blank"><?php echo $_mymember['level']; ?></a>
          </span>
<?php } ?>
<?php } ?>
<?php if($_mymember['credits']) { ?>
积分：<a title="点击查看我的积分" href="index.php?mod=settings&code=extcredits"><b><?php echo $_mymember['credits']; ?></b></a>
<?php } ?>
</p>
        <p style="width:132px; height:20px; overflow:hidden;">
<?php $member_signature = cut_str($_mymember['signature'],20); ?>
<?php if($_mymember['uid'] == MEMBER_ID ) { ?>
            <a href="javascript:viod(0);" onclick="follower_choose(<?php echo $_mymember['uid']; ?>,'<?php echo $_mymember['nickname']; ?>','topic_signature'); return false;" >
            <span ectype="user_signature_ajax_left_<?php echo $_mymember['uid']; ?>">
                <span  title="个人签名：<?php echo $_mymember['signature']; ?>">
<?php if($_mymember['signature']) { ?>
(<?php echo $member_signature; ?>)
<?php } else { ?>编辑个人签名
<?php } ?>
</span>
            </span>
            </a>
<?php } else { ?><span  title="个人签名：<?php echo $_mymember['signature']; ?>">
<?php if($_mymember['signature']) { ?>
<?php if('admin' == MEMBER_ROLE_TYPE) { ?>
                <a href="javascript:void(0);" onclick="follower_choose(<?php echo $_mymember['uid']; ?>,'<?php echo $_mymember['nickname']; ?>','topic_signature');" title="点击修改个人签名">
                <em ectype="user_signature_ajax_<?php echo $_mymember['uid']; ?>">(<?php echo $member_signature; ?>)</em>
                </a>
<?php } ?>
<?php } ?>
</span>
<?php } ?>
</p>
        <?php echo $this->hookall_temp['global_user_extra1']; ?>
        <?php echo $this->hookall_temp['global_user_extra2']; ?>
        <?php echo $this->hookall_temp['global_user_extra3']; ?>
        </div>
   </div>
    <div class="sideBox">
    <div class="user_atten">
        <div class="person_atten_l">
            <p><span class="num"><a href="index.php?mod=<?php echo $_mymember['username']; ?>&code=follow" title="<?php echo $_mymember['nickname']; ?>关注的"><?php echo $_mymember['follow_count']; ?></a></span></p>
            <p><a href="index.php?mod=<?php echo $_mymember['username']; ?>&code=follow" title="<?php echo $_mymember['nickname']; ?>关注的">关注</a> </p>
        </div>
        <div class="person_atten_l">
            <p><span class="num"><a href="index.php?mod=<?php echo $_mymember['username']; ?>&code=fans" title="关注<?php echo $_mymember['nickname']; ?>的"><?php echo $_mymember['fans_count']; ?></a></span></p>
            <p><a href="index.php?mod=<?php echo $_mymember['username']; ?>&code=fans" title="关注<?php echo $_mymember['nickname']; ?>的">粉丝</a> </p>
        </div>
        <div class="person_atten_r">
            <p><span class="num"><a href="index.php?mod=<?php echo $_mymember['username']; ?>" title="<?php echo $_mymember['nickname']; ?>的微博"><?php echo $_mymember['topic_count']; ?></a></span></p>
            <p><a href="index.php?mod=<?php echo $_mymember['username']; ?>" title="<?php echo $_mymember['nickname']; ?>的微博">微博</a> </p>
        </div>
     </div>
        <?php echo $this->hookall_temp['global_user_extra4']; ?>
    </div>
<?php } ?>
<!------用户头像等信息------->
<!------用户勋章信息------->
<script type="text/javascript">
$(document).ready(function(){
    $(".sina_weibo").mouseover(function(){$(".sina_weibo_c").show();});
    $(".sina_weibo").mouseout(function(){$(".sina_weibo_c").hide();});
    $(".qqwb").mouseover(function(){$(".qqwb_c").show();});
    $(".qqwb").mouseout(function(){$(".qqwb_c").hide();});
    $(".qqim").mouseover(function(){$(".qqim_c").show();});
    $(".qqim").mouseout(function(){$(".qqim_c").hide();});
    $(".tel").mouseover(function(){$(".tel_c").show();});
    $(".tel").mouseout(function(){$(".tel_c").hide();});
<?php if(is_array($medal_list)) { foreach($medal_list as $v) { ?>
        $(".medal_<?php echo $v['id']; ?>").mouseover(function(){$(".medal_c_<?php echo $v['id']; ?>").show();});
        $(".medal_<?php echo $v['id']; ?>").mouseout(function(){$(".medal_c_<?php echo $v['id']; ?>").hide();});
<?php } } ?>
});
</script>
<ul class="Vimg">
<?php if('tag'!=$this->Get['mod'] || $_mymember['style_three_tol'] == 1) { ?>
<?php if($this->Config['sina_enable'] && sina_weibo_init($this->Config)) { ?>
    <li class="sina_weibo">
<?php echo sina_weibo_bind_icon($_mymember['uid']); ?>
 &nbsp; 
        <div class="sina_weibo_c">
            <div class="VM_box">
                <div class="VM_top">
                    <div class="med_img"><img src="./templates/default/images/medal/M_sina.gif"></div>
                    <div class="med_intro">
                        <p>新浪微博</p>
                         绑定后，可以使用新浪微博帐号进行登录，在本站发的微博可以同步发到新浪微博<br />
<?php $sina_return  = sina_weibo_has_bind($member['uid']); ?>
<?php if(!$sina_return) { ?>
                        <a href="index.php?mod=account&code=sina">绑定新浪微博</a> |
<?php } ?>
<a target="_blank" href="index.php?mod=other&code=medal&view=my">查看我的勋章</a>
                    </div>
                </div>
            </div>
        </div>        
    </li>
<?php } ?>
<?php if($this->Config['qqwb_enable'] && qqwb_init($this->Config)) { ?>
    <li class="qqwb">
<?php echo qqwb_bind_icon($_mymember['uid']); ?>
 &nbsp; 
        <div class="qqwb_c">
            <div class="VM_box">
                <div class="VM_top">
                    <div class="med_img"><img src="./templates/default/images/medal/qqwb.png"></div>
                    <div class="med_intro">
                        <p>腾讯微博</p>
                         绑定后，可以使用腾讯微博帐号进行登录，在本站发的微博可以同步发到腾讯微博<br />
<?php $qqwb_return  = qqwb_bind_icon($member['uid']); ?>
<?php if(!$qqwb_return) { ?>
                        <a href="index.php?mod=account&code=qqwb">绑定腾讯微博</a> |
<?php } ?>
<a target="_blank" href="index.php?mod=other&code=medal&view=my">查看我的勋章</a>
                    </div>
                </div>
            </div>
        </div>
    </li>
<?php } ?>
<?php if($this->Config['imjiqiren_enable'] && imjiqiren_init($this->Config)) { ?>
    <li class="qqim">
<?php echo imjiqiren_bind_icon($_mymember['uid']); ?>
 &nbsp; 
        <div class="qqim_c">
            <div class="VM_box">
                <div class="VM_top">
                    <div class="med_img"><img src="./templates/default/images/medal/M_qq.gif"></div>
                    <div class="med_intro">
                    <p>QQ机器人</p>
                    用自己的QQ发微博、通过QQ签名发微博，如果有人@你、评论你、关注你、给你发私信，你都可以第一时间收到QQ机器人的通知<br />
<?php $imjiqiren_return  = imjiqiren_has_bind($member['uid']); ?>
<?php if(!$imjiqiren_return) { ?>
                    <a href="index.php?mod=tools&code=imjiqiren">绑定QQ机器人</a> |
<?php } ?>
<a target="_blank" href="index.php?mod=other&code=medal&view=my">查看我的勋章</a>
                    </div>
                </div>
            </div>
        </div>
    </li>
<?php } ?>
<?php if($this->Config['sms_enable'] && sms_init($this->Config)) { ?>
    <li class="tel">
<?php echo sms_bind_icon($_mymember['uid']); ?>
 &nbsp; 
        <div class="tel_c">
            <div class="VM_box">
                <div class="VM_top">
                    <div class="med_img"><img src="./templates/default/images/medal/Tel.gif"></div>
                    <div class="med_intro">
                    <p>手机短信</p>
                    用自己的手机发微博、通过手机签名发微博，如果有人@你、评论你、关注你、给你发私信，你都可以第一时间收到手机短信的通知<br />
<?php $sms_return  = sms_has_bind($_mymember['uid']); ?>
<?php if(!$sms_return) { ?>
                    <a href="index.php?mod=other&code=sms">绑定手机短信</a> |
<?php } ?>
<a target="_blank" href="index.php?mod=other&code=medal&view=my">查看我的勋章</a>
                    </div>
                </div>
            </div>
        </div>
    </li>
<?php } ?>
<?php } ?>
<?php if($member['validate'] || $medal_list) { ?>
<?php if(is_array($medal_list)) { foreach($medal_list as $val) { ?>
<?php $medal_type = unserialize($val['conditions']); ?>
<li class="medal_<?php echo $val['id']; ?>"><a href="index.php?mod=other&code=medal" target="_blank"><img src="<?php echo $val['medal_img']; ?>"/></a> &nbsp; 
        <div class="medal_c medal_c_<?php echo $val['id']; ?>">
            <div class="VM_box">
                <div class="VM_top">
                <div class="med_img"><img src="<?php echo $val['medal_img']; ?>"/></div>
                    <div class="med_intro">
                    <p><?php echo $val['medal_name']; ?></p>
                    <?php echo $val['medal_depict']; ?> <br />
<?php if(MEMBER_ID != $member['uid']) { ?>
(他于：<?php echo $val['dateline']; ?> 获得) <br />
<?php if($medal_type['type'] == 'topic') { ?>
                    <a href="index.php?mod=topic&code=myhome" target="_blank">我要发微博</a> |<?php } elseif($medal_type['type'] == 'reply') { ?><a href="index.php?mod=topic&code=new" target="_blank">我要发评论</a> |<?php } elseif($medal_type['type'] == 'tag') { ?><a href="index.php?mod=tag&code=<?php echo $medal_type['tagname']; ?>" target="_blank">我要发话题</a> |<?php } elseif($medal_type['type'] == 'invite') { ?><a href="index.php?mod=profile&code=invite" target="_blank">马上去邀请好友</a> |<?php } elseif($medal_type['type'] == 'shoudong') { ?>管理员手动发放  |    
<?php } ?>
<?php } else { ?>(我于：<?php echo $val['dateline']; ?> 获得) <br />
<?php } ?>
<a target="_blank" href="index.php?mod=other&code=medal&view=my">查看我的勋章</a>
                    </div>
                </div>
            </div>
        </div>
    </li>
<?php } } ?>
<?php } ?>
<?php if($this->Config['yy_enable'] && yy_init($this->Config)) { ?>
    <li class="yy">
<?php echo yy_bind_icon($_mymember['uid']); ?>
 &nbsp;</li>
<?php } ?>
<?php if($this->Config['renren_enable'] && renren_init($this->Config)) { ?>
    <li class="renren">
<?php echo renren_bind_icon($_mymember['uid']); ?>
 &nbsp;</li>
<?php } ?>
<?php if($this->Config['kaixin_enable'] && kaixin_init($this->Config)) { ?>
    <li class="kaixin">
<?php echo kaixin_bind_icon($_mymember['uid']); ?>
 &nbsp;</li>
<?php } ?>
<?php if($this->Config['fjau_enable'] && fjau_init($this->Config)) { ?>
    <li class="fjau">
<?php echo fjau_bind_icon($_mymember['uid']); ?>
 &nbsp;</li>
<?php } ?>
</ul>   
<?php if(MEMBER_ID == $_mymember['uid'] ) { ?>
      <div class="blackBox"></div>
      <ul class="boxRNav2">
<?php if(in_array($this->Code,array('myhome','tag','groupview','qun','cms','bbs','recd'))) $current_myhome = 'current' ?>
<?php if('myat'== $this->Code) $current_myat = 'current' ?>
<?php if('mycomment'== $this->Code) $current_mycomment = 'current' ?>
<?php if('myfavorite'== $this->Code) $current_myfavorite = 'current' ?>
        <li class="index <?php echo $current_myhome; ?>"> 
          <a href="index.php?mod=topic&code=myhome" hidefocus="true" title="我的首页">我的首页</a>
        </li>
        <li class="about <?php echo $current_myat; ?>"> 
          <a href="index.php?mod=topic&code=myat" hidefocus="true" title="提到我的">提到我的</a>
        </li>
        <li class="letter <?php echo $current_mycomment; ?>"> 
          <a href="index.php?mod=topic&code=mycomment" hidefocus="true" title="评论我的">评论我的</a>
        </li>
        <li class="myfav <?php echo $current_myfavorite; ?>"> 
          <a href="index.php?mod=topic&code=myfavorite" hidefocus="true" title="我的收藏">我的收藏</a>
        </li>
      </ul>
<?php } ?>
      <div class="blackBox"></div>
        <ul class="boxRNav2">
<?php if(MEMBER_ID == $_mymember['uid']) $_my = '我'; elseif(1==$_mymember['gender']) $_my = '他';else $_my = '她'; ?>
<?php if('myblog'== $params['code'] && !$type) $current_myblog = 'current' ?>
<?php if('myblog'== $params['code'] && 'pic' == $type) $current_pic = 'current' ?>
<?php if('myblog'== $params['code'] && 'video' == $type) $current_video = 'current' ?>
<?php if('myblog'== $params['code'] && 'music' == $type) $current_music = 'current' ?>
<?php if('myblog'== $params['code'] && 'attach' == $type) $current_attach = 'current' ?>
<?php if('myblog'== $params['code'] && 'my_reply' == $type) $current_my_reply = 'current' ?>
<?php if('myblog'== $params['code'] && 'vote' == $type) $current_vote = 'current' ?>
<?php if('myblog'== $params['code'] && 'event' == $type) $current_event = 'current' ?>
<li class="mypub <?php echo $current_myblog; ?>"> 
          <a href="index.php?mod=<?php echo $_mymember['username']; ?>" hidefocus="true" title="<?php echo $_my; ?>的微博"><?php echo $_my; ?>的微博</a>
        </li>
        <li class="mycomment <?php echo $current_my_reply; ?>">
          <a href="index.php?mod=<?php echo $_mymember['username']; ?>&type=my_reply" hidefocus="true" title="<?php echo $_my; ?>的图片"><?php echo $_my; ?>的评论</a>
        </li>
        <li class="mypic <?php echo $current_pic; ?>">
          <a href="index.php?mod=<?php echo $_mymember['username']; ?>&type=pic" hidefocus="true" title="<?php echo $_my; ?>的图片"><?php echo $_my; ?>的图片</a>
        </li>
        <li class="myvoid <?php echo $current_video; ?>">
          <a href="index.php?mod=<?php echo $_mymember['username']; ?>&type=video" hidefocus="true" title="<?php echo $_my; ?>的视频"><?php echo $_my; ?>的视频</a>
        </li>
        <li class="mymusic <?php echo $current_music; ?>">
          <a href="index.php?mod=<?php echo $_mymember['username']; ?>&type=music" hidefocus="true" title="<?php echo $_my; ?>的音乐"><?php echo $_my; ?>的音乐</a>
        </li>
        <li class="myatt <?php echo $current_attach; ?>">
          <a href="index.php?mod=<?php echo $_mymember['username']; ?>&type=attach" hidefocus="true" title="<?php echo $_my; ?>的附件"><?php echo $_my; ?>的附件</a>
        </li>
<?php if($this->Config['vote_open']) { ?>
        <li class="myvote <?php echo $current_vote; ?>">
          <a href="index.php?mod=<?php echo $_mymember['username']; ?>&type=vote" hidefocus="true" title="<?php echo $_my; ?>的投票"><?php echo $_my; ?>的投票</a>
        </li>
<?php } ?>
<?php if($this->Config['event_open']) { ?>
        <li class="myact <?php echo $current_event; ?>">
           <a href="index.php?mod=<?php echo $_mymember['username']; ?>&type=event" hidefocus="true" title="<?php echo $_my; ?>的活动"><?php echo $_my; ?>的活动</a>
        </li>
<?php } ?>
<?php $navigation_config=ConfigHandler::get('navigation') ?>
<?php if(!empty($navigation_config['pluginmenu'])) { ?>
<?php if(is_array($navigation_config['pluginmenu'])) { foreach($navigation_config['pluginmenu'] as $pmenus) { ?>
<?php if(is_array($pmenus)) { foreach($pmenus as $pmenu) { ?>
<?php if($pmenu['type'] == 3) { ?>
<?php if('topic'==$this->require) { ?>
          <li class="mypub current">
<?php } else { ?>  <li class="mypub">
<?php } ?>
  <a href="<?php echo $pmenu['url']; ?>&require=topic" hidefocus="true" title="<?php echo $pmenu['name']; ?>"><?php echo $pmenu['name']; ?></a></li>
<?php } ?>
<?php } } ?>
<?php } } ?>
<?php } ?>
      </ul>
      <div class="blackBox2"></div>
</div>
<?php } ?>
<?php } else { ?><!--网站开启三栏后 显示左边  关于我的信息-->
<div class="t_col_main_ln <?php echo $t_col_main_lb; ?>">
<script type="text/javascript">
    $(document).ready(function(){
        $(".member_exp").mouseover(function(){$(".member_exp_c").show();});
        $(".member_exp").mouseout(function(){$(".member_exp_c").hide();});
        $("#m_avatar2").mouseover(function(){$(".avatar_tips").show();});
        $("#m_avatar2").mouseout(function(){$(".avatar_tips").hide();});
    });
</script>
<!--用户头像等信息-->
<?php if($my_member || $member) { ?>
<?php $_mymember = $my_member ? $my_member : $member ?>
<div class="sideBox" style="margin:0; padding:0;">
        <div class="avatar2" id="m_avatar2">
        <p class="avatar2_i"><a href="index.php?mod=<?php echo $_mymember['username']; ?>" title="<?php echo $_mymember['username']; ?>"><img src="<?php echo $_mymember['face_original']; ?>" alt="<?php echo $_mymember['nickname']; ?>" onerror="javascript:faceError(this);" /></a></p>
<?php if(MEMBER_ID == $_mymember['uid']) { ?>
<p class="avatar_tips"><a id="avatar_upload" href="index.php?mod=settings&code=face">上传头像</a></p>
<?php } ?>
</div>
        <div class="avatar2_info">
        <p><a href="index.php?mod=<?php echo $_mymember['username']; ?>" title="@<?php echo $_mymember['nickname']; ?>"><b><?php echo $_mymember['nickname']; ?></b></a><?php echo $_mymember['validate_html']; ?></p>
        <p>
<?php if($this->Config['level_radio']) { ?>
<?php if($this->Config['topic_level_radio']) { ?>
          <span class="wb_l_level" style="margin:0;">
            <a class="ico_level wbL<?php echo $_mymember['level']; ?>" title="点击查看微博等级"  href="index.php?mod=settings&code=exp" target="_blank"><?php echo $_mymember['level']; ?></a>
          </span>
<?php } ?>
<?php } ?>
<?php if($_mymember['credits']) { ?>
积分：<a title="点击查看我的积分" href="index.php?mod=settings&code=extcredits"><b><?php echo $_mymember['credits']; ?></b></a>
<?php } ?>
</p>
        <p style="width:132px; height:20px; overflow:hidden;">
<?php $member_signature = cut_str($_mymember['signature'],20); ?>
<?php if($_mymember['uid'] == MEMBER_ID ) { ?>
            <a href="javascript:viod(0);" onclick="follower_choose(<?php echo $_mymember['uid']; ?>,'<?php echo $_mymember['nickname']; ?>','topic_signature'); return false;" >
            <span ectype="user_signature_ajax_left_<?php echo $_mymember['uid']; ?>">
                <span  title="个人签名：<?php echo $_mymember['signature']; ?>">
<?php if($_mymember['signature']) { ?>
(<?php echo $member_signature; ?>)
<?php } else { ?>编辑个人签名
<?php } ?>
</span>
            </span>
            </a>
<?php } else { ?><span  title="个人签名：<?php echo $_mymember['signature']; ?>">
<?php if($_mymember['signature']) { ?>
<?php if('admin' == MEMBER_ROLE_TYPE) { ?>
                <a href="javascript:void(0);" onclick="follower_choose(<?php echo $_mymember['uid']; ?>,'<?php echo $_mymember['nickname']; ?>','topic_signature');" title="点击修改个人签名">
                <em ectype="user_signature_ajax_<?php echo $_mymember['uid']; ?>">(<?php echo $member_signature; ?>)</em>
                </a>
<?php } ?>
<?php } ?>
</span>
<?php } ?>
</p>
        <?php echo $this->hookall_temp['global_user_extra1']; ?>
        <?php echo $this->hookall_temp['global_user_extra2']; ?>
        <?php echo $this->hookall_temp['global_user_extra3']; ?>
        </div>
   </div>
    <div class="sideBox">
    <div class="user_atten">
        <div class="person_atten_l">
            <p><span class="num"><a href="index.php?mod=<?php echo $_mymember['username']; ?>&code=follow" title="<?php echo $_mymember['nickname']; ?>关注的"><?php echo $_mymember['follow_count']; ?></a></span></p>
            <p><a href="index.php?mod=<?php echo $_mymember['username']; ?>&code=follow" title="<?php echo $_mymember['nickname']; ?>关注的">关注</a> </p>
        </div>
        <div class="person_atten_l">
            <p><span class="num"><a href="index.php?mod=<?php echo $_mymember['username']; ?>&code=fans" title="关注<?php echo $_mymember['nickname']; ?>的"><?php echo $_mymember['fans_count']; ?></a></span></p>
            <p><a href="index.php?mod=<?php echo $_mymember['username']; ?>&code=fans" title="关注<?php echo $_mymember['nickname']; ?>的">粉丝</a> </p>
        </div>
        <div class="person_atten_r">
            <p><span class="num"><a href="index.php?mod=<?php echo $_mymember['username']; ?>" title="<?php echo $_mymember['nickname']; ?>的微博"><?php echo $_mymember['topic_count']; ?></a></span></p>
            <p><a href="index.php?mod=<?php echo $_mymember['username']; ?>" title="<?php echo $_mymember['nickname']; ?>的微博">微博</a> </p>
        </div>
     </div>
        <?php echo $this->hookall_temp['global_user_extra4']; ?>
    </div>
<?php } ?>
<!------用户头像等信息------->
<!------用户勋章信息------->
<script type="text/javascript">
$(document).ready(function(){
    $(".sina_weibo").mouseover(function(){$(".sina_weibo_c").show();});
    $(".sina_weibo").mouseout(function(){$(".sina_weibo_c").hide();});
    $(".qqwb").mouseover(function(){$(".qqwb_c").show();});
    $(".qqwb").mouseout(function(){$(".qqwb_c").hide();});
    $(".qqim").mouseover(function(){$(".qqim_c").show();});
    $(".qqim").mouseout(function(){$(".qqim_c").hide();});
    $(".tel").mouseover(function(){$(".tel_c").show();});
    $(".tel").mouseout(function(){$(".tel_c").hide();});
<?php if(is_array($medal_list)) { foreach($medal_list as $v) { ?>
        $(".medal_<?php echo $v['id']; ?>").mouseover(function(){$(".medal_c_<?php echo $v['id']; ?>").show();});
        $(".medal_<?php echo $v['id']; ?>").mouseout(function(){$(".medal_c_<?php echo $v['id']; ?>").hide();});
<?php } } ?>
});
</script>
<ul class="Vimg">
<?php if('tag'!=$this->Get['mod'] || $_mymember['style_three_tol'] == 1) { ?>
<?php if($this->Config['sina_enable'] && sina_weibo_init($this->Config)) { ?>
    <li class="sina_weibo">
<?php echo sina_weibo_bind_icon($_mymember['uid']); ?>
 &nbsp; 
        <div class="sina_weibo_c">
            <div class="VM_box">
                <div class="VM_top">
                    <div class="med_img"><img src="./templates/default/images/medal/M_sina.gif"></div>
                    <div class="med_intro">
                        <p>新浪微博</p>
                         绑定后，可以使用新浪微博帐号进行登录，在本站发的微博可以同步发到新浪微博<br />
<?php $sina_return  = sina_weibo_has_bind($member['uid']); ?>
<?php if(!$sina_return) { ?>
                        <a href="index.php?mod=account&code=sina">绑定新浪微博</a> |
<?php } ?>
<a target="_blank" href="index.php?mod=other&code=medal&view=my">查看我的勋章</a>
                    </div>
                </div>
            </div>
        </div>        
    </li>
<?php } ?>
<?php if($this->Config['qqwb_enable'] && qqwb_init($this->Config)) { ?>
    <li class="qqwb">
<?php echo qqwb_bind_icon($_mymember['uid']); ?>
 &nbsp; 
        <div class="qqwb_c">
            <div class="VM_box">
                <div class="VM_top">
                    <div class="med_img"><img src="./templates/default/images/medal/qqwb.png"></div>
                    <div class="med_intro">
                        <p>腾讯微博</p>
                         绑定后，可以使用腾讯微博帐号进行登录，在本站发的微博可以同步发到腾讯微博<br />
<?php $qqwb_return  = qqwb_bind_icon($member['uid']); ?>
<?php if(!$qqwb_return) { ?>
                        <a href="index.php?mod=account&code=qqwb">绑定腾讯微博</a> |
<?php } ?>
<a target="_blank" href="index.php?mod=other&code=medal&view=my">查看我的勋章</a>
                    </div>
                </div>
            </div>
        </div>
    </li>
<?php } ?>
<?php if($this->Config['imjiqiren_enable'] && imjiqiren_init($this->Config)) { ?>
    <li class="qqim">
<?php echo imjiqiren_bind_icon($_mymember['uid']); ?>
 &nbsp; 
        <div class="qqim_c">
            <div class="VM_box">
                <div class="VM_top">
                    <div class="med_img"><img src="./templates/default/images/medal/M_qq.gif"></div>
                    <div class="med_intro">
                    <p>QQ机器人</p>
                    用自己的QQ发微博、通过QQ签名发微博，如果有人@你、评论你、关注你、给你发私信，你都可以第一时间收到QQ机器人的通知<br />
<?php $imjiqiren_return  = imjiqiren_has_bind($member['uid']); ?>
<?php if(!$imjiqiren_return) { ?>
                    <a href="index.php?mod=tools&code=imjiqiren">绑定QQ机器人</a> |
<?php } ?>
<a target="_blank" href="index.php?mod=other&code=medal&view=my">查看我的勋章</a>
                    </div>
                </div>
            </div>
        </div>
    </li>
<?php } ?>
<?php if($this->Config['sms_enable'] && sms_init($this->Config)) { ?>
    <li class="tel">
<?php echo sms_bind_icon($_mymember['uid']); ?>
 &nbsp; 
        <div class="tel_c">
            <div class="VM_box">
                <div class="VM_top">
                    <div class="med_img"><img src="./templates/default/images/medal/Tel.gif"></div>
                    <div class="med_intro">
                    <p>手机短信</p>
                    用自己的手机发微博、通过手机签名发微博，如果有人@你、评论你、关注你、给你发私信，你都可以第一时间收到手机短信的通知<br />
<?php $sms_return  = sms_has_bind($_mymember['uid']); ?>
<?php if(!$sms_return) { ?>
                    <a href="index.php?mod=other&code=sms">绑定手机短信</a> |
<?php } ?>
<a target="_blank" href="index.php?mod=other&code=medal&view=my">查看我的勋章</a>
                    </div>
                </div>
            </div>
        </div>
    </li>
<?php } ?>
<?php } ?>
<?php if($member['validate'] || $medal_list) { ?>
<?php if(is_array($medal_list)) { foreach($medal_list as $val) { ?>
<?php $medal_type = unserialize($val['conditions']); ?>
<li class="medal_<?php echo $val['id']; ?>"><a href="index.php?mod=other&code=medal" target="_blank"><img src="<?php echo $val['medal_img']; ?>"/></a> &nbsp; 
        <div class="medal_c medal_c_<?php echo $val['id']; ?>">
            <div class="VM_box">
                <div class="VM_top">
                <div class="med_img"><img src="<?php echo $val['medal_img']; ?>"/></div>
                    <div class="med_intro">
                    <p><?php echo $val['medal_name']; ?></p>
                    <?php echo $val['medal_depict']; ?> <br />
<?php if(MEMBER_ID != $member['uid']) { ?>
(他于：<?php echo $val['dateline']; ?> 获得) <br />
<?php if($medal_type['type'] == 'topic') { ?>
                    <a href="index.php?mod=topic&code=myhome" target="_blank">我要发微博</a> |<?php } elseif($medal_type['type'] == 'reply') { ?><a href="index.php?mod=topic&code=new" target="_blank">我要发评论</a> |<?php } elseif($medal_type['type'] == 'tag') { ?><a href="index.php?mod=tag&code=<?php echo $medal_type['tagname']; ?>" target="_blank">我要发话题</a> |<?php } elseif($medal_type['type'] == 'invite') { ?><a href="index.php?mod=profile&code=invite" target="_blank">马上去邀请好友</a> |<?php } elseif($medal_type['type'] == 'shoudong') { ?>管理员手动发放  |    
<?php } ?>
<?php } else { ?>(我于：<?php echo $val['dateline']; ?> 获得) <br />
<?php } ?>
<a target="_blank" href="index.php?mod=other&code=medal&view=my">查看我的勋章</a>
                    </div>
                </div>
            </div>
        </div>
    </li>
<?php } } ?>
<?php } ?>
<?php if($this->Config['yy_enable'] && yy_init($this->Config)) { ?>
    <li class="yy">
<?php echo yy_bind_icon($_mymember['uid']); ?>
 &nbsp;</li>
<?php } ?>
<?php if($this->Config['renren_enable'] && renren_init($this->Config)) { ?>
    <li class="renren">
<?php echo renren_bind_icon($_mymember['uid']); ?>
 &nbsp;</li>
<?php } ?>
<?php if($this->Config['kaixin_enable'] && kaixin_init($this->Config)) { ?>
    <li class="kaixin">
<?php echo kaixin_bind_icon($_mymember['uid']); ?>
 &nbsp;</li>
<?php } ?>
<?php if($this->Config['fjau_enable'] && fjau_init($this->Config)) { ?>
    <li class="fjau">
<?php echo fjau_bind_icon($_mymember['uid']); ?>
 &nbsp;</li>
<?php } ?>
</ul>   
<?php if(MEMBER_ID == $_mymember['uid'] ) { ?>
      <div class="blackBox"></div>
      <ul class="boxRNav2">
<?php if(in_array($this->Code,array('myhome','tag','groupview','qun','cms','bbs','recd'))) $current_myhome = 'current' ?>
<?php if('myat'== $this->Code) $current_myat = 'current' ?>
<?php if('mycomment'== $this->Code) $current_mycomment = 'current' ?>
<?php if('myfavorite'== $this->Code) $current_myfavorite = 'current' ?>
        <li class="index <?php echo $current_myhome; ?>"> 
          <a href="index.php?mod=topic&code=myhome" hidefocus="true" title="我的首页">我的首页</a>
        </li>
        <li class="about <?php echo $current_myat; ?>"> 
          <a href="index.php?mod=topic&code=myat" hidefocus="true" title="提到我的">提到我的</a>
        </li>
        <li class="letter <?php echo $current_mycomment; ?>"> 
          <a href="index.php?mod=topic&code=mycomment" hidefocus="true" title="评论我的">评论我的</a>
        </li>
        <li class="myfav <?php echo $current_myfavorite; ?>"> 
          <a href="index.php?mod=topic&code=myfavorite" hidefocus="true" title="我的收藏">我的收藏</a>
        </li>
      </ul>
<?php } ?>
      <div class="blackBox"></div>
        <ul class="boxRNav2">
<?php if(MEMBER_ID == $_mymember['uid']) $_my = '我'; elseif(1==$_mymember['gender']) $_my = '他';else $_my = '她'; ?>
<?php if('myblog'== $params['code'] && !$type) $current_myblog = 'current' ?>
<?php if('myblog'== $params['code'] && 'pic' == $type) $current_pic = 'current' ?>
<?php if('myblog'== $params['code'] && 'video' == $type) $current_video = 'current' ?>
<?php if('myblog'== $params['code'] && 'music' == $type) $current_music = 'current' ?>
<?php if('myblog'== $params['code'] && 'attach' == $type) $current_attach = 'current' ?>
<?php if('myblog'== $params['code'] && 'my_reply' == $type) $current_my_reply = 'current' ?>
<?php if('myblog'== $params['code'] && 'vote' == $type) $current_vote = 'current' ?>
<?php if('myblog'== $params['code'] && 'event' == $type) $current_event = 'current' ?>
<li class="mypub <?php echo $current_myblog; ?>"> 
          <a href="index.php?mod=<?php echo $_mymember['username']; ?>" hidefocus="true" title="<?php echo $_my; ?>的微博"><?php echo $_my; ?>的微博</a>
        </li>
        <li class="mycomment <?php echo $current_my_reply; ?>">
          <a href="index.php?mod=<?php echo $_mymember['username']; ?>&type=my_reply" hidefocus="true" title="<?php echo $_my; ?>的图片"><?php echo $_my; ?>的评论</a>
        </li>
        <li class="mypic <?php echo $current_pic; ?>">
          <a href="index.php?mod=<?php echo $_mymember['username']; ?>&type=pic" hidefocus="true" title="<?php echo $_my; ?>的图片"><?php echo $_my; ?>的图片</a>
        </li>
        <li class="myvoid <?php echo $current_video; ?>">
          <a href="index.php?mod=<?php echo $_mymember['username']; ?>&type=video" hidefocus="true" title="<?php echo $_my; ?>的视频"><?php echo $_my; ?>的视频</a>
        </li>
        <li class="mymusic <?php echo $current_music; ?>">
          <a href="index.php?mod=<?php echo $_mymember['username']; ?>&type=music" hidefocus="true" title="<?php echo $_my; ?>的音乐"><?php echo $_my; ?>的音乐</a>
        </li>
        <li class="myatt <?php echo $current_attach; ?>">
          <a href="index.php?mod=<?php echo $_mymember['username']; ?>&type=attach" hidefocus="true" title="<?php echo $_my; ?>的附件"><?php echo $_my; ?>的附件</a>
        </li>
<?php if($this->Config['vote_open']) { ?>
        <li class="myvote <?php echo $current_vote; ?>">
          <a href="index.php?mod=<?php echo $_mymember['username']; ?>&type=vote" hidefocus="true" title="<?php echo $_my; ?>的投票"><?php echo $_my; ?>的投票</a>
        </li>
<?php } ?>
<?php if($this->Config['event_open']) { ?>
        <li class="myact <?php echo $current_event; ?>">
           <a href="index.php?mod=<?php echo $_mymember['username']; ?>&type=event" hidefocus="true" title="<?php echo $_my; ?>的活动"><?php echo $_my; ?>的活动</a>
        </li>
<?php } ?>
<?php $navigation_config=ConfigHandler::get('navigation') ?>
<?php if(!empty($navigation_config['pluginmenu'])) { ?>
<?php if(is_array($navigation_config['pluginmenu'])) { foreach($navigation_config['pluginmenu'] as $pmenus) { ?>
<?php if(is_array($pmenus)) { foreach($pmenus as $pmenu) { ?>
<?php if($pmenu['type'] == 3) { ?>
<?php if('topic'==$this->require) { ?>
          <li class="mypub current">
<?php } else { ?>  <li class="mypub">
<?php } ?>
  <a href="<?php echo $pmenu['url']; ?>&require=topic" hidefocus="true" title="<?php echo $pmenu['name']; ?>"><?php echo $pmenu['name']; ?></a></li>
<?php } ?>
<?php } } ?>
<?php } } ?>
<?php } ?>
      </ul>
      <div class="blackBox2"></div>
</div>
<?php } ?>
<?php } ?>
<!--两栏  三栏 显示判断-->    
</div>
<?php if($member) { ?>
 <ul class="boxRNav3">
<?php if($this->Code == 'follow') $follow_tab = 'current'; ?>
<?php if($this->Code == 'fans') $fans_tab = 'current'; ?>
<?php if($this->Code == 'maybe_friend') $maybe_friend_tab = 'current'; ?>
<?php if($this->Code == 'usertag') $usertag_tab = 'current'; ?>
<?php if($this->Code == 'search') $search_tab = 'current'; ?>
<?php if($this->Get['mod'] == 'blacklist') $blacklist_tab = 'current'; ?>
<?php if (MEMBER_ID==$member['uid'] ) $_my = '我'; else $_my = $member['gender_ta'] ?>
<li class="<?php echo $follow_tab; ?> i_follow"><a href="index.php?mod=<?php echo $member['username']; ?>&code=follow"><?php echo $_my; ?>的关注(<?php echo $member['follow_count']; ?>)</a></li>
    <li class="<?php echo $fans_tab; ?> i_fans"><a href="index.php?mod=<?php echo $member['username']; ?>&code=fans" ><?php echo $_my; ?>的粉丝(<?php echo $member['fans_count']; ?>)</a></li>
    <li class="<?php echo $maybe_friend_tab; ?> i_maybe"><a href="index.php?mod=profile&code=maybe_friend">找到感兴趣的人</a></li>
    <li class="<?php echo $usertag_tab; ?> i_tag"><a href="index.php?mod=profile&code=usertag">标签/兴趣爱好</a></li>
    <li class="<?php echo $search_tab; ?> i_search"><a href="index.php?mod=profile&code=search">可能在我附近 </a></li>
    <li class="<?php echo $blacklist_tab; ?> i_black"><a href="index.php?mod=blacklist">黑名单 </a></li>
 </ul>
<?php } ?>
</div>
</div>
</div>
<style type="text/css">
.mainL{ _overflow:hidden}.textB textarea{ width:400px; height:80px;}
.followList li .fBox_l{ margin:2px 5px 0 1px;}
.followList li .fBox_R{ width:365px; margin:0 0 0 5px; line-height:18px;}
.followList li .fBox_R2{ width:100px; overflow:hidden;}
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