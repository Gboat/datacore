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
<div class="setframe">

<!--此处三栏-->
<?php if(MEMBER_ID ==0) { ?>
<div class="inventLine2"> 
  <div class="atxt">
	<p class="p_2">微博是现在最酷、最火的沟通交流工具，可以随时随地分享新鲜事，与朋友保持联络。</p> 
	<p class="p_3">10秒注册微博就可通过网页、手机、客户端随时随地分享新鲜事、关注所需的最新消息！</p>
  </div>
  <div class="abtn">
	<a href="index.php?mod=member&code&uid=<?php echo $member['uid']; ?>"><img src="templates/default/images/regbtn.gif"></a>
	<p>已有帐号，<a href="javascript:void(0);" onclick="ShowLoginDialog(); return false;">请点此登录</a></p>
  </div> 
</div>
<?php } ?>
<div class="W_main_l">
  <div class="left_nav">
    <h4>广场</h4>
<?php $new_class=('new'==$this->Code && $this->Get['type']!='pic')?"tago":"tagn"; ?>

<?php $pic_class=('new'==$this->Code && 'pic'==$this->Get['type'])?"tago":"tagn"; ?>
    
<?php $tc_class=('tc'==$this->Code)?"tago":"tagn"; ?>
    
<?php $newreply_class=('newreply'==$this->Code)?"tago":"tagn"; ?>
    
<?php $hotforward_class=('hotforward'==$this->Code)?"tago":"tagn"; ?>
    
<?php $hotreply_class=('hotreply'==$this->Code)?"tago":"tagn"; ?>
    
    
<?php $top_class=('top'==$this->Code)?"tago":"tagn"; ?>
    
<?php $tag_class=('tag'==$this->Code)?"tago":"tagn"; ?>
    
<?php $media_class=('media'==$this->Code || 'media_more'==$this->Code)?"tago":"tagn"; ?>
    
    
<?php $people_class=(in_array($this->Code,array('people','view','province','city')))?"tago":"tagn"; ?>
    <ul class="topic_New">    
    <li class="<?php echo $tc_class; ?> new_tc"><a href="index.php?mod=topic&code=tc">同城微博</a></li>
    <li class="<?php echo $new_class; ?> new_new"><a href="index.php?mod=topic&code=new">
<?php if($this->Config['only_show_vip_topic']) { ?>
最新V博
<?php } else { ?>最新微博
<?php } ?>
</a></li>
	<li class="<?php echo $pic_class; ?> new_photo"><a href="index.php?mod=topic&code=photo">图片墙</a></li>
    <li class="<?php echo $newreply_class; ?> new_newreply"><a href="index.php?mod=topic&code=newreply">最新评论</a></li>
    <li class="<?php echo $hotforward_class; ?> new_forword"><a href="index.php?mod=topic&code=hotforward">热门转发</a></li>
    <li class="<?php echo $hotreply_class; ?> new_hotreply"><a href="index.php?mod=topic&code=hotreply">热门评论</a></li>
    
	<li class="<?php echo $top_class; ?> new_top"><a href="index.php?mod=topic&code=top" title="查看和关注微博达人">达人榜</a></li>
	<li class="<?php echo $tag_class; ?> new_keyword"><a href="index.php?mod=tag" title="寻找和关注话题">话题榜</a></li>
	<li class="<?php echo $media_class; ?> new_media"><a href="index.php?mod=other&code=media" title="查看名人或媒体">媒体汇</a></li>
	<li class="<?php echo $people_class; ?> new_Masters"><a href="index.php?mod=people" title="查看名人堂">名人堂</a></li>
    </ul>
  </div>
</div>
<!--此处三栏-->
	  
  <div class="main3Box_m HotW">  
    <div id="topNews_1" class="Hotwarp">
<?php if($this->Config['ad_enable']) { ?>
    <div class="L_AD"><?php echo $this->Config['ad']['ad_list']['group_new']['header']; ?> </div>
    
<?php } ?>
<script language="Javascript">
function listTopic( s,lh ) {	
	var s = 'undefined' == typeof(s) ? 0 : s;
	var lh = 'undefined' == typeof(lh) ? 1 : lh;
	if(lh) {
		window.location.hash="#listTopicArea";
	}
    $("#listTopicMsgArea").html("<div><center><span class='loading'>内容正在加载中，请稍候……</span></center></div>");
	var myAjax = $.post(
		"ajax.php?mod=topic&code=list",
		{
<?php if(is_array($params)) { foreach($params as $k => $v) { ?>
<?php echo $k; ?>:"<?php echo $v; ?>",
<?php } } ?>
start:s
		},
		function (d) {
			$("#listTopicMsgArea").html('');
			$("#listTopicArea").html(d);			
		}
	); 
}
</script>
    <script type="text/javascript">
     $(document).ready(function(){
	
	 $(".menu_bq").mouseover(function(){$("#newshowface").show();});
	 $(".menu_bq").mouseout(function(){$("#newshowface").hide();});

     });
    </script>
		<div id="listTopicMsgArea"></div>
      <div id="listTopicArea">
        <div class="Listmain">
		 
<?php if($d_list) { ?>
        <ul class="nleftL">
          <div>
            
<?php if(is_array($d_list)) { foreach($d_list as $key => $val) { ?>
            
<?php $_i = ($d==$key ? 3 : 9); ?>
            <li class="liL_<?php echo $_i; ?>" id="Num<?php echo $key; ?>"><a href="index.php?mod=topic&code=<?php echo $this->Code; ?>&d=<?php echo $key; ?>"><?php echo $val; ?></a></li>
            <li class="liLine">|</li>
            
<?php } } ?>
          </div>
        </ul>
        
<?php } ?>
        
        
<?php if($this->Config['only_show_vip_topic'] && $this->Code == 'new') { ?>
        <div style="margin:10px 10px;">
          <span style="font-size:16px">
            <a href="index.php?mod=other&code=vip_intro" target="_blank">当前仅显示V认证用户的最新微博</a>
          </span>
        </div>
        
<?php } ?>
        
        
<?php if($this->Code == 'tc') { ?>
        <p class="btop">
            <div class="b16">
              
<?php if($area_name) { ?>
              	<a href="index.php?mod=topic&code=tc&province=<?php echo $province_id; ?>"><?php echo $province_name; ?></a>，
              	<a href="index.php?mod=topic&code=tc&province=<?php echo $province_id; ?>&city=<?php echo $city_id; ?>"><?php echo $city_name; ?></a>，
              	<?php echo $area_name; ?>
              <?php } elseif($city_name) { ?>                <a href="index.php?mod=topic&code=tc&province=<?php echo $province_id; ?>"><?php echo $province_name; ?></a>，<?php echo $city_name; ?>
              <?php } elseif($province_name) { ?>                <?php echo $province_name; ?>
              
<?php } else { ?>              <a href="index.php?mod=settings">编辑地址</a>
<?php } ?>
            </div>
            
            <div class="c_area">
            <a href="javascript:void(0);" onclick="choose();" class="c_area_a" >[ 切换地域 <img src="templates/default/images/t_c_bg.gif" class="c_area_c" /> ]</a>
            <input type="hidden" id="hid_tc_city" name="hid_tc_city" value="<?php echo $city_id; ?>">
            <input type="hidden" id="hid_tc_area" name="hid_tc_area" value="<?php echo $area_id; ?>">
            
            <div id='choosecity' style="display:none" class="citysel">
            <div class="citysel_b">
            <?php echo $province_list; ?>

            <select id='tc_city' name="tc_city" onchange="changeCity();">
              <option value=''>请选择</option>
            </select>

            <select id='tc_area' name="tc_area" style="display:none width:150px">
              <option value=''>请选择</option>
            </select>

            <div class="c_area_b">
            <a href="javascript:choosecity();" class="sBtn_2 c_area_d">确定</a>

            </div>
            </div>
            </div>
            </div>

        </p>
		<script type="text/javascript">
	    function choose(){
		    var display = document.getElementById('choosecity').style.display == 'block' ? 'none' : 'block';
		  	if(display == 'block'){
		  		changeProvince();
			}
		  	document.getElementById('choosecity').style.display = display;
		}
	    function changeProvince(){
	        var province = document.getElementById('tc_province').value;
	        var city = document.getElementById('hid_tc_city').value;
	        var url = "ajax.php?mod=member&code=sel&province="+province+"&hid_city="+city;
	        $.post(
	  		url,
	  		function(r){
		  		if(r){
	  		  		$('#tc_city').html(r);
	  		  		changeCity();
		  		}else{
					document.getElementById('tc_area').lenght = 1;
					document.getElementById('tc_area').style.display = 'none';
			    }
	  		}
	        );
	      }

	    function changeCity(){
	        var city = document.getElementById('tc_city').value;
	        var area = document.getElementById('hid_tc_area').value;
	        var url = "ajax.php?mod=member&code=sel&city="+city+"&hid_area="+area;
	        $.post(
	  		url,
	  		function(r){
		  		if(r){
		  			document.getElementById('tc_area').style.display = 'block';
	  		  		$('#tc_area').html(r);
		  		}else{
					document.getElementById('tc_area').style.display = 'none';
			    }
	  		}
	        );
		}
	    
	    function choosecity(){
	    	var url = thisSiteURL + "index.php?mod=topic&code=tc";
	    	
	    	var province = document.getElementById('tc_province').value;
	    	if(province){
				url = url + "&province="+province;
		    }
	    	var city = document.getElementById('tc_city').value;
	    	if(city){
				url = url + "&city="+city;
		    }
	    	var area = document.getElementById('tc_area').value;
	    	if(area){
				url = url + "&area="+area;
		    }
		    
	        location.href=url;
		}
		</script>
		<div class="mBlog_linedot"></div>
        
<?php } ?>
        
          
<?php if($topics) { ?>
          
<?php if('favoritemy'==$this->Code) { ?>
          
<?php if(is_array($topics)) { foreach($topics as $val) { ?>
          
<?php $counts++; ?>
<script type="text/javascript">
				$(document).ready(function(){
					var objStr = "#topic_lists_<?php echo $val['tid']; ?>";
					$(objStr).mouseover(function(){$(objStr + " i").show();});
					$(objStr).mouseout(function(){$(objStr + " i").hide();});
				});
			</script>
			<div class="feedCell" id="topic_list_<?php echo $val['tid']; ?>"><div class="avatar">
	<a href="index.php?mod=<?php echo $favorite_members[$val['fuid']]['username']; ?>">
		<img onerror="javascript:faceError(this);" src="<?php echo $favorite_members[$val['fuid']]['face']; ?>" />
	</a>
</div>
<div class="Contant">
	<div id="topic_lists_<?php echo $val['tid']; ?>" style="_overflow:hidden;">
		<div class="oriTxt">
			<p>
				<a title="<?php echo $val['username']; ?>" href="index.php?mod=<?php echo $favorite_members[$val['fuid']]['username']; ?>">		 										<?php echo $favorite_members[$val['fuid']]['nickname']; ?>
				</a>
				<?php echo $favorite_members[$val['fuid']]['validate_html']; ?>：
				<span style="color:#666; font-size:12px;">收藏于<?php echo $val['favorite_time']; ?></span>
			</p>
			<span>
			<a href="index.php?mod=<?php echo $val['username']; ?>">
			  <?php echo $val['nickname']; ?>
			</a><?php echo $val['validate_html']; ?>:<?php echo $val['content']; ?>
			</span>
<?php if($val['attachid'] && $val['attach_list']) { ?>
<?php $val['attach_key']=$val['tid'].'_'.mt_rand(); ?>
<ul class="attachList" id="attach_area_<?php echo $val['attach_key']; ?>">
<?php if(is_array($val['attach_list'])) { foreach($val['attach_list'] as $iv) { ?>
	<li><img src="<?php echo $iv['attach_img']; ?>" class="attachList_img" />
	<div class="attachList_att">
	<p class="attachList_att_name"><b><?php echo $iv['attach_name']; ?></b>
	&nbsp;（<?php echo $iv['attach_size']; ?>）</p>
	<p class="attachList_att_doc"><a href="javascript:void(0);"
		onclick="downattach(<?php echo $iv['id']; ?>);">点此下载</a>（需<?php echo $iv['attach_score']; ?>积分，已下载<?php echo $iv['attach_down']; ?>次）</p>
	</div>
	</li>
	
<?php } } ?>
</ul>
<?php } ?>

<?php if($val['imageid'] && $val['image_list']) { ?>
<?php $val['image_key']=$val['tid'].'_'.mt_rand(); ?>
<ul class="imgList" id="image_area_<?php echo $val['image_key']; ?>">
<?php if(is_array($val['image_list'])) { foreach($val['image_list'] as $iv) { ?>
	<li><a href="<?php echo $iv['image_original']; ?>" class="artZoomAll"
		rel="<?php echo $iv['image_small']; ?>" rev="<?php echo $val['image_key']; ?>"><img
		src="<?php echo $iv['image_small']; ?>" /></a>
	<div class="artZoomBox" style="display: none;">
	<div class="tool"><a title="向右转" href="#" class="imgRight">向右转</a><a
		title="向左转" href="#" class="imgLeft">向左转</a><a title="查看原图"
		href="<?php echo $iv['image_original']; ?>" class="viewImg">查看原图</a></div>
	<a class="maxImgLinkAll" href="<?php echo $iv['image_original']; ?>"> <img
     src="<?php echo $iv['image_original']; ?>" class="maxImg"></a></div>
	</li>
	
<?php } } ?>
</ul>
<?php } ?>
<!--style="width:<?php echo $this->Config['thumbwidth']; ?>px; height:<?php echo $this->Config['thumbheight']; ?>px;"-->

<!--投票 Begin-->
<?php if($val['is_vote'] > 0) { ?>
<?php $val['vote_key']=$val['tid'].'_'.$val['random'] ?>
<ul class="imgList" id="vote_detail_<?php echo $val['vote_key']; ?>">
	<li><a href="javascript:;"
		onclick="getVoteDetailWidgets('<?php echo $val['vote_key']; ?>', <?php echo $val['is_vote']; ?>);"><img
		src='./images/vote_pic_01.gif' /></a></li>
</ul>
<div id="vote_area_<?php echo $val['vote_key']; ?>" style="display: none;">
<div class="blogTxt">
<div class="top"></div>
<div class="mid" id="vote_content_<?php echo $val['vote_key']; ?>"></div>
<div class="bottom"></div>
</div>
</div>
<?php } ?>
<!--投票 End-->
<?php if($val['videoid'] and $this->Config['video_status']) { ?>
<div class="feedUservideo"><a
	onClick="javascript:showFlash('<?php echo $val['VideoHosts']; ?>', '<?php echo $val['VideoLink']; ?>', this, '<?php echo $val['VideoID']; ?>','<?php echo $val['VideoUrl']; ?>');">
<div id="play_<?php echo $val['VideoID']; ?>" class="vP"><img
	src="images/feedvideoplay.gif" /></div>
<img src="<?php echo $val['VideoImg']; ?>" style="border: none" /> </a></div>
<?php } ?>

<?php if($val['musicid']) { ?>
<?php if($val['xiami_id']) { ?>
<div class="feedUserImg"><embed width="257" height="33"
	wmode="transparent" type="application/x-shockwave-flash"
	src="http://www.xiami.com/widget/0_<?php echo $val['xiami_id']; ?>/singlePlayer.swf"></embed></div>
<?php } else { ?><div class="feedUserImg">
<div id="play_<?php echo $val['MusicID']; ?>"></div>
<img src="images/music.gif" title="点击播放音乐"
	onClick="javascript:showFlash('music', '<?php echo $val['MusicUrl']; ?>', this, '<?php echo $val['MusicID']; ?>');"
	style="cursor: pointer; border: none;" /></div>
<?php } ?>
<?php } ?><script type="text/javascript"> var __TOPIC_VIEW__ = '<?php echo $topic_view; ?>'; </script>
<?php if(($tpid=$val['top_parent_id'])>0 && !in_array($this->Code, array('forward', 'reply'))) { ?>
<?php if(('mycomment'==$this->Code || $topic_view) && 'reply'==$val['type'] && $tpid!=($pid=$val['parent_id']) && $parent_list[$pid]) { ?>
<p class="feedP">回复{<a
	href="index.php?mod=<?php echo $parent_list[$pid]['username']; ?>"><?php echo $parent_list[$pid]['nickname']; ?>：</a><span><?php echo $parent_list[$pid]['content']; ?></span>}</p>
<?php } ?>

<?php if(!$topic_view) { ?>
<?php $pt=$parent_list[$tpid]; ?>
<div class="blogTxt">
<div class="top"></div>
<div class="mid">
<?php if($pt) { ?>
 <span> <a
	href="index.php?mod=<?php echo $pt['username']; ?>"
	onmouseover="get_user_choose(<?php echo $pt['uid']; ?>,'_reply_user',<?php echo $val['tid']; ?>);"
	onmouseout="clear_user_choose();"> <?php echo $pt['nickname']; ?> </a>
<?php echo $pt['validate_html']; ?> : <!--悬浮头像、弹出对话框--> <span
	id="user_<?php echo $val['tid']; ?>_reply_user"></span> <!--悬浮头像、弹出对话框--> </span> 
<?php $TPT_ = $TPT_ ? $TPT_ : 'TPT_'; ?>
<span id="topic_content_<?php echo $TPT_; ?><?php echo $pt['tid']; ?>_short"><?php echo $pt['content']; ?></span> <span
	id="topic_content_<?php echo $TPT_; ?><?php echo $pt['tid']; ?>_full"></span> 
<?php if($pt['longtextid'] > 0) { ?>
<span> <a href="javascript:;"
	onclick="view_longtext('<?php echo $pt['longtextid']; ?>', '<?php echo $pt['tid']; ?>', this, '<?php echo $TPT_; ?>', '<?php echo $val['tid']; ?>');return false;">查看全文</a>
</span> 
<?php } ?>
 
<?php if($pt['attachid'] && $pt['attach_list']) { ?>
<table class="attachst" style="width:440px;">
<?php if(is_array($pt['attach_list'])) { foreach($pt['attach_list'] as $iv) { ?>
	<tr>
		<td class="attachst_img"><img src="<?php echo $iv['attach_img']; ?>" /></td>
		<td class="attachst_att">
		<p class="attachList_att_name"><b><?php echo $iv['attach_name']; ?></b>&nbsp;（<?php echo $iv['attach_size']; ?>）</p>
		<p class="attachList_att_doc"><a href="javascript:void(0);"
		onclick="downattach(<?php echo $iv['id']; ?>);">点此下载</a>（需<?php echo $iv['attach_score']; ?>积分，已下载<?php echo $iv['attach_down']; ?>次）</p>

		</td>
	</tr>
	
<?php } } ?>
</table>
<?php } ?>
 
<?php if($pt['imageid'] && $pt['image_list']) { ?>
 
<?php $pt['image_key']=$pt['tid'].'_'.mt_rand(); ?>
<ul class="imgList" id="image_area_<?php echo $pt['image_key']; ?>">
<?php if(is_array($pt['image_list'])) { foreach($pt['image_list'] as $iv) { ?>
	<li><a href="<?php echo $iv['image_original']; ?>" class="artZoomAll"
		rel="<?php echo $iv['image_small']; ?>" rev="<?php echo $pt['image_key']; ?>"><img
		src="<?php echo $iv['image_small']; ?>" /></a>
	<div class="artZoomBox" style="display:none;">
	<div class="tool"><a title="向右转" href="#" class="imgRight">向右转</a><a
		title="向左转" href="#" class="imgLeft">向左转</a><a title="查看原图"
		href="<?php echo $iv['image_original']; ?>" class="viewImg">查看原图</a></div>
	<a class="maxImgLinkAll" href="<?php echo $iv['image_original']; ?>"> <img src="<?php echo $iv['image_original']; ?>" class="maxImg"></a></div>
	</li>
	
<?php } } ?>
</ul>
<?php } ?>
 <!--style="width:<?php echo $this->Config['thumbwidth']; ?>px; height:<?php echo $this->Config['thumbheight']; ?>px;"-->

<!--投票 Begin--> 
<?php if($pt['is_vote'] > 0) { ?>
 
<?php $__vote_key = $pt['tid'].'_'.$pt['random'] ?>
<ul class="imgList" id="vote_detail_<?php echo $__vote_key; ?>">
<li><a href="javascript:;" onclick="getVoteDetailWidgets('<?php echo $__vote_key; ?>', <?php echo $pt['is_vote']; ?>);"><img src='./images/vote_pic_01.gif' /></a></li>
</ul>
<div id="vote_area_<?php echo $__vote_key; ?>" style="display: none;">
<div class="vote_zf_box" id="vote_content_<?php echo $__vote_key; ?>"></div>
</div>
<?php } ?>
 <!--投票 End--> 
<?php if($pt['videoid'] and $this->Config['video_status']) { ?>
<div class="feedUservideo">
<a onClick="javascript:showFlash('<?php echo $pt['VideoHosts']; ?>', '<?php echo $pt['VideoLink']; ?>', this, '<?php echo $pt['VideoID']; ?>','<?php echo $pt['VideoUrl']; ?>');">
<div id="play_<?php echo $pt['VideoID']; ?>" class="vP"><img src="images/feedvideoplay.gif" /></div>
<img src="<?php echo $pt['VideoImg']; ?>" style="border: none" /> </a></div>
<?php } ?>
 
<?php if($pt['musicid']) { ?>
 
<?php if($pt['xiami_id']) { ?>
<div class="feedUserImg">
<embed width="257" height="33" wmode="transparent" type="application/x-shockwave-flash" src="http://www.xiami.com/widget/0_<?php echo $pt['xiami_id']; ?>/singlePlayer.swf"></embed></div>
<?php } else { ?><div class="feedUserImg">
<div id="play_<?php echo $pt['MusicID']; ?>"></div>
<img src="images/music.gif" title="点击播放音乐" onClick="javascript:showFlash('music', '<?php echo $pt['MusicUrl']; ?>', this, '<?php echo $pt['MusicID']; ?>');" style="cursor: pointer; border: none;" /></div>
<?php } ?>
 
<?php } ?>
<div style="width:400px; float:left; padding:5px 0; margin:0;">
<a href="index.php?mod=topic&code=<?php echo $tpid; ?>" target="_blank">原文评论(<?php echo $pt['replys']; ?>)</a>&nbsp;
<a onclick="get_forward_choose(<?php echo $tpid; ?>);return false;"href="index.php?mod=topic&code=<?php echo $tpid; ?>" target="_blank">转发原文(<?php echo $pt['forwards']; ?>)</a>&nbsp;
<?php echo $pt['from_html']; ?></div>
<?php } else { ?> 
<?php $val['reply_disable']=0; ?>
<p><span>原始微博已删除</span></p>
<?php } ?>
</div>
<div class="bottom"></div>
</div>
<?php } ?>
<?php } ?>
		</div>

		<div class="from">
			<span class="option"></span> 
			<span class="mycome"></span> 
		</div>
	</div>
	<div id="reply_area_<?php echo $val['tid']; ?>"></div>
	<!--编辑微博-->
	<div id="modify_topic_<?php echo $val['tid']; ?>"></div>
	<!--编辑微博-->
</div>
<div class="mBlog_linedot"></div>	
			</div>
          
<?php } } ?>
          
<?php } else { ?>          
<?php if(is_array($topics)) { foreach($topics as $val) { ?>
		  
<?php $counts++; ?>
          <div class="feedCell" id="topic_list_<?php echo $val['tid']; ?>">
<?php if($this->Config['ad_enable']) { ?>
<?php if($counts == 3 && $this->Config['ad']['ad_list']['group_new']['middle_center']) { ?>
				<div class="L_AD"><?php echo $this->Config['ad']['ad_list']['group_new']['middle_center']; ?></div>
				
<?php } ?>

<?php if($counts == 10 && $this->Config['ad']['ad_list']['group_new']['middle_center1']) { ?>
				<div class="L_AD"><?php echo $this->Config['ad']['ad_list']['group_new']['middle_center1']; ?></div>
				
<?php } ?>
<?php } ?>
<script type="text/javascript">
			$(document).ready(function(){
				var objStr = "#topic_lists_<?php echo $val['tid']; ?>";
				$(objStr).mouseover(function(){$(objStr + " i").show();});
				$(objStr).mouseout(function(){$(objStr + " i").hide();});
			});
			</script>
<?php $talkanswerid = ''; ?>

<div class="wb_l_face">
<div class="avatar">
<?php if($this->Code != '') { ?>
    
<?php if(MEMBER_ID != $val['uid']) { ?>
    <a href="javascript:void(0)" onmouseover="get_user_choose(<?php echo $val['uid']; ?>,'_user<?php echo $talkanswerid; ?>',<?php echo $val['tid']; ?>);" onmouseout="clear_user_choose();">
        <img src="<?php echo $val['face']; ?>" onerror="javascript:faceError(this);" />
    </a>
    
<?php } else { ?>        <img src="<?php echo $val['face']; ?>" onerror="javascript:faceError(this);" />
    
<?php } ?>
<?php } else { ?><a href="index.php?mod=<?php echo $val['username']; ?>"><img src="<?php echo $val['face']; ?>" onerror="javascript:faceError(this);" /></a>
<?php } ?>
<?php if($this->Config['is_topic_user_follow']) { ?>
<?php echo $val['follow_html']; ?>
<?php } ?>
</div>
<?php if($val['user_css']) { ?>
<p class="<?php echo $val['user_css']; ?>"><?php echo $val['user_str']; ?></p>
<?php } ?>
</div>


<!--悬浮头像、弹出对话框-->
<div id="user_<?php echo $val['tid']; ?>_user<?php echo $talkanswerid; ?>"></div>
<!--悬浮头像、弹出对话框-->

<!--私信对话框-->
<div id="Pmsend_to_user_area" style="width:430px;" style="display:none"></div>
<!--私信对话框-->

<!--AT、拉黑对话框-->
<div id="alert_follower_menu_<?php echo $val['uid']; ?>" style="display:none"></div>
<!--AT、拉黑对话框-->

<div id="button_<?php echo $val['uid']; ?>" onclick="get_group_choose(<?php echo $val['uid']; ?>);" style="display:none"></div>

<!--分组对话框-->
<div id="global_select_<?php echo $val['uid']; ?>" class="alertBox" style="display:none"></div>
<!--分组对话框-->

<!--备注对话框-->
<div id="get_remark_<?php echo $val['uid']; ?>" style="display:none"></div>
<!--备注对话框-->

<!--微博内容中 @用户 悬浮提示-->
<div id="at_<?php echo $val['tid']; ?>_user" class="at_style" style="display:none;"></div>
<!--微博内容中 @用户 悬浮提示-->
<div class="Contant">
	<div id="topic_lists_<?php echo $val['tid']; ?>" style="_overflow:hidden">
		<div class="oriTxt">
<?php if('myfavorite'==$this->Code && $val['favorite_time']) { ?>
				<p style="color:#666; font-size:12px;">收藏于：<?php echo $val['favorite_time']; ?></p>
			
<?php } ?>
  
			<p class="utitle">
				<!--个人签名文件--><span class="un">
<a title="查看<?php echo $val['nickname']; ?>的微博" href="index.php?mod=<?php echo $val['username']; ?>" class="photo_vip_t_name"><?php echo $val['nickname']; ?></a>
<?php if($val['validate_html']) { ?>
<?php echo $val['validate_html']; ?>&nbsp;
<?php } else { ?>
<?php if($this->Config['topic_level_radio']) { ?>
<span class="wb_l_level">
<a class="ico_level wbL<?php echo $val['level']; ?>" title="点击查看微博等级" href="index.php?mod=settings&code=exp" target="_blank"><?php echo $val['level']; ?></a>
</span>
<?php } ?>
<?php } ?>
<?php if($this->Config['is_signature']) { ?>
<?php if(!$_GET['mod_original'] && 'photo'!=$this->Code) { ?>
<?php if($val['signature']) { ?>
<span class="signature">
<?php if($val['uid'] == MEMBER_ID ||  'admin' == MEMBER_ROLE_TYPE) { ?>
<a href="javascript:void(0);" onclick="follower_choose(<?php echo $val['uid']; ?>,'<?php echo $val['nickname']; ?>','topic_signature');" title="点击修改个人签名">
<em ectype="user_signature_ajax_<?php echo $val['uid']; ?>">(<?php echo $val['signature']; ?>)</em>
</a>
<?php } else { ?><em>(<?php echo $val['signature']; ?>)</em>
<?php } ?>
</span>
<?php } ?>
<?php } ?>
<?php } ?>
<?php echo $this->hookall_temp['global_topiclist_extra1']; ?>
</span>
<?php echo $this->hookall_temp['global_topiclist_extra2']; ?>
				<!--个人签名文件-->
				<span class="ut"><a href="index.php?mod=topic&code=<?php echo $val['tid']; ?>" target="_blank"><?php echo $val['dateline']; ?> </a></span>
			</p>
			<span id="topic_content_<?php echo $val['tid']; ?>_short"><?php echo $val['content']; ?></span>
			<span id="topic_content_<?php echo $val['tid']; ?>_full"></span>
<?php if($val['longtextid'] > 0) { ?>
				<span>
				<a href="javascript:;" onclick="view_longtext('<?php echo $val['longtextid']; ?>', '<?php echo $val['tid']; ?>', this);return false;">查看全文</a>
				</span>
			
<?php } ?>
<?php if($val['attachid'] && $val['attach_list']) { ?>
<?php $val['attach_key']=$val['tid'].'_'.mt_rand(); ?>
<ul class="attachList" id="attach_area_<?php echo $val['attach_key']; ?>">
<?php if(is_array($val['attach_list'])) { foreach($val['attach_list'] as $iv) { ?>
	<li><img src="<?php echo $iv['attach_img']; ?>" class="attachList_img" />
	<div class="attachList_att">
	<p class="attachList_att_name"><b><?php echo $iv['attach_name']; ?></b>
	&nbsp;（<?php echo $iv['attach_size']; ?>）</p>
	<p class="attachList_att_doc"><a href="javascript:void(0);"
		onclick="downattach(<?php echo $iv['id']; ?>);">点此下载</a>（需<?php echo $iv['attach_score']; ?>积分，已下载<?php echo $iv['attach_down']; ?>次）</p>
	</div>
	</li>
	
<?php } } ?>
</ul>
<?php } ?>

<?php if($val['imageid'] && $val['image_list']) { ?>
<?php $val['image_key']=$val['tid'].'_'.mt_rand(); ?>
<ul class="imgList" id="image_area_<?php echo $val['image_key']; ?>">
<?php if(is_array($val['image_list'])) { foreach($val['image_list'] as $iv) { ?>
	<li><a href="<?php echo $iv['image_original']; ?>" class="artZoomAll"
		rel="<?php echo $iv['image_small']; ?>" rev="<?php echo $val['image_key']; ?>"><img
		src="<?php echo $iv['image_small']; ?>" /></a>
	<div class="artZoomBox" style="display: none;">
	<div class="tool"><a title="向右转" href="#" class="imgRight">向右转</a><a
		title="向左转" href="#" class="imgLeft">向左转</a><a title="查看原图"
		href="<?php echo $iv['image_original']; ?>" class="viewImg">查看原图</a></div>
	<a class="maxImgLinkAll" href="<?php echo $iv['image_original']; ?>"> <img
     src="<?php echo $iv['image_original']; ?>" class="maxImg"></a></div>
	</li>
	
<?php } } ?>
</ul>
<?php } ?>
<!--style="width:<?php echo $this->Config['thumbwidth']; ?>px; height:<?php echo $this->Config['thumbheight']; ?>px;"-->

<!--投票 Begin-->
<?php if($val['is_vote'] > 0) { ?>
<?php $val['vote_key']=$val['tid'].'_'.$val['random'] ?>
<ul class="imgList" id="vote_detail_<?php echo $val['vote_key']; ?>">
	<li><a href="javascript:;"
		onclick="getVoteDetailWidgets('<?php echo $val['vote_key']; ?>', <?php echo $val['is_vote']; ?>);"><img
		src='./images/vote_pic_01.gif' /></a></li>
</ul>
<div id="vote_area_<?php echo $val['vote_key']; ?>" style="display: none;">
<div class="blogTxt">
<div class="top"></div>
<div class="mid" id="vote_content_<?php echo $val['vote_key']; ?>"></div>
<div class="bottom"></div>
</div>
</div>
<?php } ?>
<!--投票 End-->
<?php if($val['videoid'] and $this->Config['video_status']) { ?>
<div class="feedUservideo"><a
	onClick="javascript:showFlash('<?php echo $val['VideoHosts']; ?>', '<?php echo $val['VideoLink']; ?>', this, '<?php echo $val['VideoID']; ?>','<?php echo $val['VideoUrl']; ?>');">
<div id="play_<?php echo $val['VideoID']; ?>" class="vP"><img
	src="images/feedvideoplay.gif" /></div>
<img src="<?php echo $val['VideoImg']; ?>" style="border: none" /> </a></div>
<?php } ?>

<?php if($val['musicid']) { ?>
<?php if($val['xiami_id']) { ?>
<div class="feedUserImg"><embed width="257" height="33"
	wmode="transparent" type="application/x-shockwave-flash"
	src="http://www.xiami.com/widget/0_<?php echo $val['xiami_id']; ?>/singlePlayer.swf"></embed></div>
<?php } else { ?><div class="feedUserImg">
<div id="play_<?php echo $val['MusicID']; ?>"></div>
<img src="images/music.gif" title="点击播放音乐"
	onClick="javascript:showFlash('music', '<?php echo $val['MusicUrl']; ?>', this, '<?php echo $val['MusicID']; ?>');"
	style="cursor: pointer; border: none;" /></div>
<?php } ?>
<?php } ?><script type="text/javascript"> var __TOPIC_VIEW__ = '<?php echo $topic_view; ?>'; </script>
<?php if(($tpid=$val['top_parent_id'])>0 && !in_array($this->Code, array('forward', 'reply'))) { ?>
<?php if(('mycomment'==$this->Code || $topic_view) && 'reply'==$val['type'] && $tpid!=($pid=$val['parent_id']) && $parent_list[$pid]) { ?>
<p class="feedP">回复{<a
	href="index.php?mod=<?php echo $parent_list[$pid]['username']; ?>"><?php echo $parent_list[$pid]['nickname']; ?>：</a><span><?php echo $parent_list[$pid]['content']; ?></span>}</p>
<?php } ?>

<?php if(!$topic_view) { ?>
<?php $pt=$parent_list[$tpid]; ?>
<div class="blogTxt">
<div class="top"></div>
<div class="mid">
<?php if($pt) { ?>
 <span> <a
	href="index.php?mod=<?php echo $pt['username']; ?>"
	onmouseover="get_user_choose(<?php echo $pt['uid']; ?>,'_reply_user',<?php echo $val['tid']; ?>);"
	onmouseout="clear_user_choose();"> <?php echo $pt['nickname']; ?> </a>
<?php echo $pt['validate_html']; ?> : <!--悬浮头像、弹出对话框--> <span
	id="user_<?php echo $val['tid']; ?>_reply_user"></span> <!--悬浮头像、弹出对话框--> </span> 
<?php $TPT_ = $TPT_ ? $TPT_ : 'TPT_'; ?>
<span id="topic_content_<?php echo $TPT_; ?><?php echo $pt['tid']; ?>_short"><?php echo $pt['content']; ?></span> <span
	id="topic_content_<?php echo $TPT_; ?><?php echo $pt['tid']; ?>_full"></span> 
<?php if($pt['longtextid'] > 0) { ?>
<span> <a href="javascript:;"
	onclick="view_longtext('<?php echo $pt['longtextid']; ?>', '<?php echo $pt['tid']; ?>', this, '<?php echo $TPT_; ?>', '<?php echo $val['tid']; ?>');return false;">查看全文</a>
</span> 
<?php } ?>
 
<?php if($pt['attachid'] && $pt['attach_list']) { ?>
<table class="attachst" style="width:440px;">
<?php if(is_array($pt['attach_list'])) { foreach($pt['attach_list'] as $iv) { ?>
	<tr>
		<td class="attachst_img"><img src="<?php echo $iv['attach_img']; ?>" /></td>
		<td class="attachst_att">
		<p class="attachList_att_name"><b><?php echo $iv['attach_name']; ?></b>&nbsp;（<?php echo $iv['attach_size']; ?>）</p>
		<p class="attachList_att_doc"><a href="javascript:void(0);"
		onclick="downattach(<?php echo $iv['id']; ?>);">点此下载</a>（需<?php echo $iv['attach_score']; ?>积分，已下载<?php echo $iv['attach_down']; ?>次）</p>

		</td>
	</tr>
	
<?php } } ?>
</table>
<?php } ?>
 
<?php if($pt['imageid'] && $pt['image_list']) { ?>
 
<?php $pt['image_key']=$pt['tid'].'_'.mt_rand(); ?>
<ul class="imgList" id="image_area_<?php echo $pt['image_key']; ?>">
<?php if(is_array($pt['image_list'])) { foreach($pt['image_list'] as $iv) { ?>
	<li><a href="<?php echo $iv['image_original']; ?>" class="artZoomAll"
		rel="<?php echo $iv['image_small']; ?>" rev="<?php echo $pt['image_key']; ?>"><img
		src="<?php echo $iv['image_small']; ?>" /></a>
	<div class="artZoomBox" style="display:none;">
	<div class="tool"><a title="向右转" href="#" class="imgRight">向右转</a><a
		title="向左转" href="#" class="imgLeft">向左转</a><a title="查看原图"
		href="<?php echo $iv['image_original']; ?>" class="viewImg">查看原图</a></div>
	<a class="maxImgLinkAll" href="<?php echo $iv['image_original']; ?>"> <img src="<?php echo $iv['image_original']; ?>" class="maxImg"></a></div>
	</li>
	
<?php } } ?>
</ul>
<?php } ?>
 <!--style="width:<?php echo $this->Config['thumbwidth']; ?>px; height:<?php echo $this->Config['thumbheight']; ?>px;"-->

<!--投票 Begin--> 
<?php if($pt['is_vote'] > 0) { ?>
 
<?php $__vote_key = $pt['tid'].'_'.$pt['random'] ?>
<ul class="imgList" id="vote_detail_<?php echo $__vote_key; ?>">
<li><a href="javascript:;" onclick="getVoteDetailWidgets('<?php echo $__vote_key; ?>', <?php echo $pt['is_vote']; ?>);"><img src='./images/vote_pic_01.gif' /></a></li>
</ul>
<div id="vote_area_<?php echo $__vote_key; ?>" style="display: none;">
<div class="vote_zf_box" id="vote_content_<?php echo $__vote_key; ?>"></div>
</div>
<?php } ?>
 <!--投票 End--> 
<?php if($pt['videoid'] and $this->Config['video_status']) { ?>
<div class="feedUservideo">
<a onClick="javascript:showFlash('<?php echo $pt['VideoHosts']; ?>', '<?php echo $pt['VideoLink']; ?>', this, '<?php echo $pt['VideoID']; ?>','<?php echo $pt['VideoUrl']; ?>');">
<div id="play_<?php echo $pt['VideoID']; ?>" class="vP"><img src="images/feedvideoplay.gif" /></div>
<img src="<?php echo $pt['VideoImg']; ?>" style="border: none" /> </a></div>
<?php } ?>
 
<?php if($pt['musicid']) { ?>
 
<?php if($pt['xiami_id']) { ?>
<div class="feedUserImg">
<embed width="257" height="33" wmode="transparent" type="application/x-shockwave-flash" src="http://www.xiami.com/widget/0_<?php echo $pt['xiami_id']; ?>/singlePlayer.swf"></embed></div>
<?php } else { ?><div class="feedUserImg">
<div id="play_<?php echo $pt['MusicID']; ?>"></div>
<img src="images/music.gif" title="点击播放音乐" onClick="javascript:showFlash('music', '<?php echo $pt['MusicUrl']; ?>', this, '<?php echo $pt['MusicID']; ?>');" style="cursor: pointer; border: none;" /></div>
<?php } ?>
 
<?php } ?>
<div style="width:400px; float:left; padding:5px 0; margin:0;">
<a href="index.php?mod=topic&code=<?php echo $tpid; ?>" target="_blank">原文评论(<?php echo $pt['replys']; ?>)</a>&nbsp;
<a onclick="get_forward_choose(<?php echo $tpid; ?>);return false;"href="index.php?mod=topic&code=<?php echo $tpid; ?>" target="_blank">转发原文(<?php echo $pt['forwards']; ?>)</a>&nbsp;
<?php echo $pt['from_html']; ?></div>
<?php } else { ?> 
<?php $val['reply_disable']=0; ?>
<p><span>原始微博已删除</span></p>
<?php } ?>
</div>
<div class="bottom"></div>
</div>
<?php } ?>
<?php } ?>
<?php if($this->Module=='qun') { ?>
              <script type="text/javascript">
$(document).ready(function(){
var objStr1 = "#topic_lists_<?php echo $val['tid']; ?>_a";
var objStr2 = "#topic_lists_<?php echo $val['tid']; ?>_b";
$(objStr1).mouseover(function(){$(objStr2).show();});
$(objStr1).mouseout(function(){$(objStr2).hide();});
});
</script>
<?php if($this->Config['qun_attach_enable']) $allow_attach = 1; else $allow_attach = 0  ?>
<div class="from"> 
<div class="option"> 
<ul>
<?php if(MEMBER_ID>0) { ?>
<li>
<!--转发的判断 Begin-->
<?php if($val['managetype'] != 2) { ?>
<span>
<a href="javascript:void(0);" onclick="
<?php if($allow_list_manage) { ?>
get_forward_choose(<?php echo $val['tid']; ?>,<?php echo $allow_attach; ?>, {appitem:'<?php echo $val['item']; ?>', appitem_id:'<?php echo $val['item_id']; ?>',noReply:1});
<?php } else { ?>get_forward_choose(<?php echo $val['tid']; ?>,<?php echo $allow_attach; ?>);
<?php } ?>
" style="cursor:pointer;">转发
<?php if($val['forwards']) { ?>
(<?php echo $val['forwards']; ?>)
<?php } ?>
</a>
	 </span>
	 
<?php } else { ?> <span title="设置了特殊的权限，不允许转发">转发</span>
	 
<?php } ?>
<!--转发的判断 End-->
</li>
<li class="o_line_l">|</li>

<li>
<?php if(!$val['reply_disable'] && $val['managetype'] != 2) { ?>
<span>
<a href="javascript:void(0)" onclick="
<?php if($allow_list_manage) { ?>
replyTopic(<?php echo $val['tid']; ?>,'reply_area_<?php echo $val['tid']; ?>','<?php echo $val['replys']; ?>',1,<?php echo $allow_attach; ?>,{appitem:'<?php echo $val['item']; ?>', appitem_id:'<?php echo $val['item_id']; ?>'});
<?php } else { ?>replyTopic(<?php echo $val['tid']; ?>,'reply_area_<?php echo $val['tid']; ?>','<?php echo $val['replys']; ?>',0,<?php echo $allow_attach; ?>);
<?php } ?>
return false;">评论
<?php if($val['replys']) { ?>
(<?php echo $val['replys']; ?>)
<?php } ?>
</a>
</span>
<?php } else { ?><span>评论</span>
<?php } ?>
</li>

<li class="o_line_l">|</li>
<li id="topic_lists_<?php echo $val['tid']; ?>_a" class="mobox"><a href="javascript:void(0)" class="moreti" ><span class="txt">更多</span><span class="more"></span></a> 
<div id="topic_lists_<?php echo $val['tid']; ?>_b" class="molist" style="display:none">
<?php if(MEMBER_ID>0) { ?>
<?php if('myfavorite'==$this->
Code) { ?>
 <span id="favorite_<?php echo $val['tid']; ?>"><a href="javascript:void(0)" onclick="favoriteTopic(<?php echo $val['tid']; ?>,'delete');return false;">取消收藏</a></span>
<?php } else { ?><span id="favorite_<?php echo $val['tid']; ?>"><a href="javascript:void(0)" onclick="favoriteTopic(<?php echo $val['tid']; ?>,'add');return false;">收藏</a></span> 
<?php } ?>
<?php } ?>
<?php if($this->Config['is_report'] || MEMBER_ID > 0) { ?>
<a href="javascript:void(0)" onclick="ReportBox('<?php echo $val['tid']; ?>')" title="举报不良信息">举报</a>
<?php } ?>

<?php if($val['uid']==MEMBER_ID || 'admin'==MEMBER_ROLE_TYPE) { ?>
<?php if($this->Code > 0  ||  in_array($this->Code,array('list_reply','do_add'))) $eid = 'reply_list'; else $eid = 'topic_list'  ?>
<a href="javascript:void(0)" onclick="deleteTopic(<?php echo $val['tid']; ?>,'<?php echo $eid; ?>_<?php echo $val['tid']; ?>');return false;">删除</a>
<?php $datetime = time(); $modify_time = $this->Config['topic_modify_time'] * 60 ?>
<?php if($datetime - $val['addtime'] < $modify_time || 'admin'==MEMBER_ROLE_TYPE ) { ?>
<?php if($val['replys'] <= 0 && $val['forwards'] <= 0 || 'admin'==MEMBER_ROLE_TYPE) { ?>
<a href="javascript:void(0);" onclick="modifyTopic(<?php echo $val['tid']; ?>,'modify_topic_<?php echo $val['tid']; ?>','<?php echo $eid; ?>',<?php echo $allow_attach; ?>);return false;" style="cursor:pointer;">编辑</a>
<?php } ?>
<?php } ?>
<!--推荐开始 Begin-->
		<a href="javascript:void(0)" onclick="showTopicRecdDialog({'tid':'<?php echo $val['tid']; ?>'});return false;">推荐</a>
	<!--推荐开始 End-->
<?php } ?>
</div>
</li>
<?php } ?>
</ul>
</div> 
<div class="mycome">
<?php if(!$no_from) { ?>
<?php echo $val['from_html']; ?>
<?php } ?>
</div> 
</div>
<?php } else { ?><script type="text/javascript">
$(document).ready(function(){
var objStr1 = "#<?php echo $talkanswerid; ?>topic_lists_<?php echo $val['tid']; ?>_a";
var objStr2 = "#<?php echo $talkanswerid; ?>topic_lists_<?php echo $val['tid']; ?>_b";
$(objStr1).mouseover(function(){$(objStr2).show();});
$(objStr1).mouseout(function(){$(objStr2).hide();});
});
</script>
<?php if($this->Config['attach_enable']) $allow_attach = 1; else $allow_attach = 0  ?>
<div class="from"> 
<div class="option">
<!--不是群内成员无法对群内的微博进行操作-->
<ul>
<?php if($this->Get['mod'] == 'talk' &&  $val['reply_ok']) { ?>
<li><span id="answer_<?php echo $val['tid']; ?>" class="talkreply" onclick="showMainPublishBox('answer','talk','<?php echo $talk['lid']; ?>','<?php echo $val['tid']; ?>','<?php echo $val['uid']; ?>');return false;">回答</span></li><li class="o_line_l">|</li>
<?php } ?>

<?php if($this->Get['type'] != 'my_verify') { ?>
<?php $tpid=$val['top_parent_id']; if ($tpid&&$parent_list[$tpid]) $root_type=$parent_list[$tpid]['type']; ?>
<?php if((!isset($root_type)) || (isset($root_type) && in_array($root_type, get_topic_type('forward')))) { ?>
	<li>
	  <!--转发的判断 Begin-->
	  
<?php if((in_array($val['type'], get_topic_type('forward')) || $this->Module=='qun') && $val['managetype'] != 2) { ?>
	  
<?php $not_allow_forward=0; ?>
<span 
<?php if(MEMBER_ID <1 ) { ?>
 onclick="ShowLoginDialog();" 
<?php } ?>
>
			<a href="javascript:void(0);" onclick="get_forward_choose(<?php echo $val['tid']; ?>,<?php echo $allow_attach; ?>);" style="cursor:pointer;">转发
<?php if($val['forwards']) { ?>
(<?php echo $val['forwards']; ?>)
<?php } ?>
</a>
		</span>
	 
<?php } else { ?> 
<?php $not_allow_forward=1; ?>
 
<?php if(isset($val['fansgroup'])) { ?>
	  <span><?php echo $val['fansgroup']; ?></span>
	 
<?php } else { ?> <span title="设置了特殊的权限，不允许转发">转发</span>
	 
<?php } ?>
 
<?php } ?>
 <!--转发的判断 End-->
	</li>
	<li class="o_line_l">|</li>
<?php } else { ?><?php $not_allow_forward=1; ?>
<?php } ?>
<li>
<?php if(!$val['reply_disable'] && $val['managetype'] != 2) { ?>
	<span>
		<a id="topic_list_reply_<?php echo $val['tid']; ?>_aid" href="javascript:void(0)" 
<?php if(MEMBER_ID <1 ) { ?>
 onclick="ShowLoginDialog();" 
<?php } ?>
 onclick="replyTopic(<?php echo $val['tid']; ?>,'<?php echo $talkanswerid; ?>reply_area_<?php echo $val['tid']; ?>','<?php echo $val['replys']; ?>',<?php echo $not_allow_forward; ?>,<?php echo $allow_attach; ?>);return false;">评论
<?php if($val['replys']) { ?>
(<?php echo $val['replys']; ?>)
<?php } ?>
</a>
		</span>
	 
<?php } else { ?> <span>评论</span>
	
<?php } ?>
</li>

	<li class="o_line_l">|</li>

	<li id="<?php echo $talkanswerid; ?>topic_lists_<?php echo $val['tid']; ?>_a" class="mobox">
		<a href="javascript:void(0)" class="moreti" ><span class="txt">更多</span><span class="more"></span></a> 
		<div id="<?php echo $talkanswerid; ?>topic_lists_<?php echo $val['tid']; ?>_b" class="molist" style="display:none">
<?php if('myfavorite'==$this->Code) { ?>
 
				<span id="favorite_<?php echo $val['tid']; ?>" 
<?php if(MEMBER_ID <1 ) { ?>
 onclick="ShowLoginDialog();" 
<?php } ?>
>
					<a href="javascript:void(0)" onclick="favoriteTopic(<?php echo $val['tid']; ?>,'delete');return false;">取消收藏</a>
				</span>
<?php } else { ?><span id="favorite_<?php echo $val['tid']; ?>" 
<?php if(MEMBER_ID < 1) { ?>
 onclick="ShowLoginDialog();" 
<?php } ?>
>
					<a href="javascript:void(0)" onclick="favoriteTopic(<?php echo $val['tid']; ?>,'add');return false;">收藏</a>
				</span> 
			
<?php } ?>
<?php if($this->Config['is_report'] || MEMBER_ID > 0) { ?>
			<span 
<?php if(MEMBER_ID <1 ) { ?>
 onclick="ShowLoginDialog();" 
<?php } ?>
><a href="javascript:void(0)" onclick="ReportBox('<?php echo $val['tid']; ?>')" title="举报不良信息">举报</a></span>
			
<?php } ?>
<?php if($val['uid']==MEMBER_ID || 'admin'==MEMBER_ROLE_TYPE) { ?>
<?php if($this->Code > 0  ||  in_array($this->Code,array('list_reply','do_add'))) $eid = 'reply_list'; else $eid = 'topic_list'  ?>
<a href="javascript:void(0)" onclick="deleteTopic(<?php echo $val['tid']; ?>,'<?php echo $eid; ?>_<?php echo $val['tid']; ?>');return false;">删除</a>
<?php $datetime = time(); $modify_time = $this->Config['topic_modify_time'] * 60 ?>
<?php if($datetime - $val['addtime'] < $modify_time || 'admin'==MEMBER_ROLE_TYPE ) { ?>
<?php if($val['replys'] <= 0 && $val['forwards'] <= 0 || 'admin'==MEMBER_ROLE_TYPE) { ?>
						<a href="javascript:void(0);" onclick="modifyTopic(<?php echo $val['tid']; ?>,'modify_topic_<?php echo $val['tid']; ?>','<?php echo $eid; ?>',<?php echo $allow_attach; ?>);return false;" style="cursor:pointer;">编辑</a>
					
<?php } ?>
<?php } ?>
<!--推荐开始 Begin-->
					<a href="javascript:void(0)" onclick="showTopicRecdDialog({'tid':'<?php echo $val['tid']; ?>','tag_id':'<?php echo $tag_id; ?>'});return false;">推荐</a>
				<!--推荐开始 End-->
				
			
<?php } ?>
<?php if('admin'==MEMBER_ROLE_TYPE) { ?>
			    <a onclick="force_out(<?php echo $val['uid']; ?>);" href="javascript:void(0);">封杀</a>
			    <a onclick="force_ip('<?php echo $val['postip']; ?>');" href="javascript:void(0);">封IP</a>
			
<?php } ?>
</div>
	</li>
<?php } else { ?><li id="topic_lists_<?php echo $val['id']; ?>_a" class="mobox">
<?php if($val['uid']==MEMBER_ID || 'admin'==MEMBER_ROLE_TYPE) { ?>
	  
<?php if($this->Code > 0  ||  in_array($this->Code,array('list_reply','do_add'))) $eid = 'reply_list'; else $eid = 'topic_list'  ?>
  <a href="javascript:void(0)" onclick="deleteVerify(<?php echo $val['id']; ?>,'<?php echo $eid; ?>_<?php echo $val['id']; ?>');return false;">删除</a>
	
<?php } ?>
</li>
<?php } ?>
</ul>
</div> 
<div class="mycome">
<!-- <a href="index.php?mod=topic&code=<?php echo $val['tid']; ?>"><?php echo $val['dateline']; ?></a>  -->
<?php if(!$no_from) { ?>
<?php echo $val['from_html']; ?>
<?php } ?>
<?php echo $this->hookall_temp['global_topiclist_extra3']; ?>
</div>
<?php echo $this->hookall_temp['global_topiclist_extra4']; ?>
</div>
			
<?php } ?>
</div>
	</div>
	<div id="reply_area_<?php echo $val['tid']; ?>"></div>
	<div id="modify_topic_<?php echo $val['tid']; ?>"></div>
	<div id="forward_menu_<?php echo $val['tid']; ?>" class="Fbox"></div>
</div>
<?php if(!$no_mBlog_linedot2) { ?>
	<div class="mBlog_linedot"></div>
<?php } ?>
            </div>
          
<?php } } ?>
          
<?php } ?>
          
<?php if($page_arr['html']) { ?>
          <div class="pageStyle">
            <li><?php echo $page_arr['html']; ?></li>
          </div>
          
<?php } ?>
          
<?php } ?>
        </div>
      </div>
</div>
	<div class="Hotright">
	<?php echo $this->hookall_temp['global_topicnew_extra2']; ?>
	
	<script>
		$(document).ready(function(){
			//推荐微群
			get_hotweiqun();	
			//热门话题推荐
			get_hot_tag();
		});
		//热门微群
		function get_hotweiqun(){			
			right_show_ajax('<?php echo $member['uid']; ?>','hotweiqun','hotweiqun');
		}
		function get_hot_tag(){
			//热门话题
			right_show_ajax('<?php echo MEMBER_ID; ?>','hot_tag','hot_tag');
		}
	</script>
	<div class="SC">
	<h3>
	推荐微群<a class="btn SC_rementuijian_box" href="javascript:void(0);"></a>
	</h3>
	<div class="FTL SC_rementuijian_box">
	  <div id="<?php echo $member['uid']; ?>_hotweiqun"></div>
	</div>
  </div>
	
  <div class="SC">
	<h3>热门话题推荐<a class="btn SC_rementuijian" href="javascript:void(0);"></a></h3>
	<ul class="FTL SC_rementuijian_box">
	  <div id="<?php echo MEMBER_ID; ?>_hot_tag"></div>
	</ul>
  </div>
<?php if($this->Code == 'tc') { ?>
	 <div class="HboxR">
      <div class="rightBox_t">最新同城活动TOP<?php echo $event_limit; ?> </div>
      <ul>
      
<?php if($events) { ?>
	  
<?php if(is_array($events)) { foreach($events as $val) { ?>
<?php $EventNo++; ?>
        <li>
		  <span class="boxRl listyle"><?php echo $EventNo; ?>. <a href="index.php?mod=event&code=detail&id=<?php echo $val['id']; ?>" target="_blank"><?php echo $val['title']; ?></a></span>
		  <span style="float:right;">(<?php echo $val['app_num']; ?>)</span>
		</li>
	  
<?php } } ?>
  
<?php } ?>
  <li><span style="float:right;"><a href="index.php?mod=event">查看更多>></a></span></li>
      </ul>
     </div>
	
<?php } ?>
<?php if($new_vip_user_list) { ?>
	 <div class="HboxR">
	   <div class="rightBox_t">最近认证用户</div>
       <div class="FTL FTL3 SC_renqituijian_box">
	     <div>
	     
<?php if($code == 'hot_weiqun') { ?>
<script type="text/javascript" src="templates/default/js/qun.js?v=build+20120428"></script>
<?php } ?>

<?php if($code == 'favorite_tag') { ?>
	<!---我关注的话题-->
	<li id="add_ajax_favorite_tags">
<?php if(is_array($my_favorite_tags)) { foreach($my_favorite_tags as $val) { ?>
		<span id="favorite_<?php echo $val['tag']; ?>">
		 <a href="index.php?mod=tag&code=<?php echo $val['tag']; ?>" target="_blank"><?php echo $val['tag']; ?></a>
		</span>
		
<?php } } ?>
</li>
<?php if($uid == MEMBER_ID) { ?>
	<span class="thread_add"> <a href="javascript:void(0);" onclick="getElementById('add_favorite_tags').style.display=(getElementById('add_favorite_tags').style.display=='none')?'':'none'">加关注话题</a> </span>
	<div id="add_favorite_tags" style="display:none;"> <span>请添加想关注的话题
	  <p>
		<input type="text" name="tag_name" id="tag_name" class="sc_r_t_a"/>
		<input name="button" type="button" onclick="favoriteTag('tag_name','input_add')" value="保存" class="c_b1" />
	  </p>
	  </span> 
	  </div>
	  
<?php } ?>
<!---我关注的话题--><?php } elseif($code == 'user_tag') { ?><!---属于我/TA的标签-->
	<ul class="FTL SC_biaoqian_box">
	  <li>
<?php if($myuser_tag) { ?>
<?php if(is_array($myuser_tag)) { foreach($myuser_tag as $val) { ?>
		<span class="sc_bq"><a href="index.php?mod=search&code=usertag&usertag=<?php echo $val['tag_name']; ?>"><?php echo $val['tag_name']; ?></a></span>
		
<?php } } ?>
  </li>
	  
<?php } else { ?>  设置自己的标签，<a href="index.php?mod=user_tag" target="_blank">点此添加</a>
	  
<?php } ?>
</ul><?php } elseif($code == 'to_user_tag') { ?><ul class="FTL SC_biaoqian_box">
	  <li>
<?php if($to_user_tag) { ?>
<?php if(is_array($to_user_tag)) { foreach($to_user_tag as $val) { ?>
		<span class="sc_bq"><a href="index.php?mod=search&code=usertag&usertag=<?php echo $val['tag_name']; ?>"><?php echo $val['tag_name']; ?></a></span>
		
<?php } } ?>
  </li>
	  
<?php } else { ?>  设置自己的标签，<a href="index.php?mod=user_tag" target="_blank">点此添加</a>
	  
<?php } ?>
</ul><?php } elseif($code == 'refresh') { ?>
<?php if(false!=($may_interest_user=Load::model('data_block')->may_interest_user())) { ?>
	<!-- 可能感兴趣的人 -->
	<div id="interestUid">
	  <ul class="followList" style="overflow:hidden">
<?php if(is_array($may_interest_user)) { foreach($may_interest_user as $val) { ?>
		<li class="pane" id="follow_user_<?php echo $val['uid']; ?>">
		  <div class="fBox_l"><img onerror="javascript:faceError(this);" src="<?php echo $val['face']; ?>" onmouseover="get_user_choose(<?php echo $val['uid']; ?>,'_right_user',<?php echo $val['uid']; ?>);" onmouseout="clear_user_choose();"/> </div>
		  <div class="fBox_R "> <span class="name"><a href="index.php?mod=<?php echo $val['username']; ?>"><?php echo $val['nickname']; ?></a><?php echo $val['validate_html']; ?></span> 
		  <span id="follow_<?php echo $val['uid']; ?>"> <?php echo $val['follow_html']; ?> </span> 
		  
<?php if($val['refresh_type'] == 'follow') { ?>
		  <span class="ff_1">我 关注的<?php echo $val['count']; ?>人关注<?php echo $val['gender_ta']; ?></span>
		  <?php } elseif($val['refresh_type'] == 'tag') { ?>  <span class="ff_1">我和<?php echo $val['gender_ta']; ?>有<?php echo $val['count']; ?>个共同话题</span>
		  <?php } elseif($val['refresh_type'] == 'user_tag') { ?>  <span class="ff_1">我和<?php echo $val['gender_ta']; ?>有<?php echo $val['count']; ?>个共同标签</span>
		  <?php } elseif($val['refresh_type'] == 'city') { ?>  <span class="ff_1"><?php echo $val['gender_ta']; ?>和我同在一个城市</span>
		  
<?php } ?>
  </div>
 		<div id="user_<?php echo $val['uid']; ?>_right_user" class="layS"></div>
		</li>
		
		<div id="alert_follower_menu_<?php echo $val['uid']; ?>"></div>
		<div id="Pmsend_to_user_area"></div>
		<div id="global_select_<?php echo $val['uid']; ?>" class="alertBox alertBox_2" style="display:none"></div>
		<div id="button_<?php echo $val['uid']; ?>" onclick="get_group_choose(<?php echo $val['uid']; ?>);"></div>
		
<?php } } ?>
  </ul>
	 <p class="r_replace"><a href="javascript:viod(0);" onclick="right_show_ajax('<?php echo MEMBER_ID; ?>','refresh','refresh'); return false;">换一换</a></p>
	</div>
	<!-- 可能感兴趣的人 -->
	
<?php } ?>
<?php } elseif($code == 'hot_tag') { ?><!--热门推荐话题-->
<?php if(is_array($hot_tag_recommend['list'])) { foreach($hot_tag_recommend['list'] as $val) { ?>
	<li> 
	  <a href="index.php?mod=tag&code=<?php echo $val['name']; ?>" target="_blank"><?php echo $val['name']; ?>(<?php echo $val['topic_count']; ?>)</a>
	  
<?php if($val['desc']) { ?>
	  	<div class="rught_tj_box"><span><?php echo $val['desc']; ?></span></div>
	  
<?php } ?>
 
	 </li>
	
<?php } } ?>
<!--热门推荐话题--><?php } elseif($code == 'to_user_info') { ?><!--关于他的信息-->
<?php if($member['aboutme']) { ?>
	<li>&nbsp;<?php echo $member['aboutme']; ?></li>
<?php } else { ?><li>这家伙很懒，什么也没有留下。</li>
	
<?php } ?>
<!--关于他的信息--><?php } elseif($code == 'to_user_event') { ?><!--他参与的活动-->
<?php if($to_user_event) { ?>
<?php if(is_array($to_user_event)) { foreach($to_user_event as $val) { ?>
	<li><a href="index.php?mod=event&code=detail&id=<?php echo $val['id']; ?>" title="点此查看活动详情" target="_blank"><?php echo $val['title']; ?></a></li>
	
<?php } } ?>
<?php } ?>
<!--他参与的活动-->
	
<?php } ?>
<?php if($code == 'recommend_user') { ?>
		<!--人气用户推荐-->
<?php if(is_array($recommend_user_list)) { foreach($recommend_user_list as $val) { ?>
		<li> 
		<a href="index.php?mod=<?php echo $val['username']; ?>" target="_blank"><img onerror="javascript:faceError(this);" src="<?php echo $val['face']; ?>" class="manface" onmouseover="get_user_choose(<?php echo $val['uid']; ?>,'_user',<?php echo $val['uid']; ?>)" onmouseout="clear_user_choose()"/></a> 
		<b><a href="index.php?mod=<?php echo $val['username']; ?>" target="_blank"><?php echo $val['nickname']; ?></a></b> <!--
设置分组 设置备注  点击关注触发分组 私信  @谁  拉黑  头像悬浮  操作框
-->
<div id="user_<?php echo $val['uid']; ?>_user"></div>
<div id="alert_follower_menu_<?php echo $val['uid']; ?>"></div>
<div id="global_select_<?php echo $val['uid']; ?>" class="alertBox alertBox_2" style="display:none"></div>
<div id="get_remark_<?php echo $val['uid']; ?>" ></div>
<div id="button_<?php echo $val['uid']; ?>" onclick="get_group_choose(<?php echo $val['uid']; ?>);"></div>
<div id="Pmsend_to_user_area"></div> 
		</li>
		
<?php } } ?>
<!--人气用户推荐-->
	
<?php } ?>

<?php if($new_vip_user_list) { ?>
		<!--最新认证用户-->
<?php if(is_array($new_vip_user_list)) { foreach($new_vip_user_list as $val) { ?>
			<li> 
			<a href="index.php?mod=<?php echo $val['username']; ?>" target="_blank">
			<img onerror="javascript:faceError(this);" src="<?php echo $val['face']; ?>" class="manface" onmouseover="get_user_choose(<?php echo $val['uid']; ?>,'_user',<?php echo $val['uid']; ?>)" onmouseout="clear_user_choose()"/>
			</a> 
			<b><a href="index.php?mod=<?php echo $val['username']; ?>" target="_blank"><?php echo $val['nickname']; ?></a></b> <!--
设置分组 设置备注  点击关注触发分组 私信  @谁  拉黑  头像悬浮  操作框
-->
<div id="user_<?php echo $val['uid']; ?>_user"></div>
<div id="alert_follower_menu_<?php echo $val['uid']; ?>"></div>
<div id="global_select_<?php echo $val['uid']; ?>" class="alertBox alertBox_2" style="display:none"></div>
<div id="get_remark_<?php echo $val['uid']; ?>" ></div>
<div id="button_<?php echo $val['uid']; ?>" onclick="get_group_choose(<?php echo $val['uid']; ?>);"></div>
<div id="Pmsend_to_user_area"></div> 
			</li>
			
<?php } } ?>
<!--最新认证用户-->
	
<?php } ?>

<?php if($code == 'user_follow') { ?>
	<!--TA关注的人-->
<?php if(is_array($user_follow_list)) { foreach($user_follow_list as $val) { ?>
		<li> 
		<img onerror="javascript:faceError(this);" src="<?php echo $val['face']; ?>" class="manface" onmouseover="get_user_choose(<?php echo $val['uid']; ?>,'_user',<?php echo $val['uid']; ?>)" onmouseout="clear_user_choose()"/> 
		<b><?php echo $val['nickname']; ?></b>
		<b><?php echo $val['follow_html']; ?></b> 
		</li><!--
设置分组 设置备注  点击关注触发分组 私信  @谁  拉黑  头像悬浮  操作框
-->
<div id="user_<?php echo $val['uid']; ?>_user"></div>
<div id="alert_follower_menu_<?php echo $val['uid']; ?>"></div>
<div id="global_select_<?php echo $val['uid']; ?>" class="alertBox alertBox_2" style="display:none"></div>
<div id="get_remark_<?php echo $val['uid']; ?>" ></div>
<div id="button_<?php echo $val['uid']; ?>" onclick="get_group_choose(<?php echo $val['uid']; ?>);"></div>
<div id="Pmsend_to_user_area"></div>
		
<?php } } ?>
<p class="m_m2"><a href="index.php?mod=<?php echo $member['username']; ?>&code=follow">更多&gt;&gt;</a></p>
	<!--TA关注的人-->
	
<?php } ?>

<?php if($code == 'qun_category') { ?>
	<!-- 微群分类 Begin -->
		<div id="cat_content_wp">
<?php if(is_array($top_cat_ary)) { foreach($top_cat_ary as $key => $top_cat) { ?>
<div class="cat_block">
			  <div class="cat_block_h">
			    <a href="index.php?mod=qun&code=category&cat_id=<?php echo $top_cat['cat_id']; ?>"><?php echo $top_cat['cat_name']; ?></a>
			    <span>(<?php echo $top_cat['qun_num']; ?>)</span>
			  </div>
			</div>
<?php } } ?>
<div style="clear:both"></div>
		</div>		
	<!--微群分类 End-->
		
<?php } ?>

<?php if($code == 'my_follow_qun') { ?>
	<!--我关注的微群 Begin-->
	<div id="interestUid">
	  
<?php if($follow_qun_list) { ?>
	  <ul class="followList" style="overflow:hidden">
<?php if(is_array($follow_qun_list)) { foreach($follow_qun_list as $val) { ?>
		<li class="pane" id="follow_user_<?php echo $val['uid']; ?>">
		 
		  <div class="fBox_R "> 
		    <p><span class="name"><a href="index.php?mod=qun&qid=<?php echo $val['qid']; ?>"><?php echo $val['name']; ?></a></span> </p>
			<p><?php echo $val['member_num']; ?>人&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo $val['thread_num']; ?>条微博</p>
		  </div>
		</li>
		
<?php } } ?>
  </ul>
	  
<?php } ?>
</div>
	<!--我关注的微群 End-->
	
<?php } ?>
<?php if($code == 'hot_weiqun') { ?>
	<!--热门微群-->
	<div id="interestUid">
	  
<?php if($hot_qun) { ?>
	  <ul class="followList" style="overflow:hidden">
<?php if(is_array($hot_qun)) { foreach($hot_qun as $val) { ?>
		<li class="pane" id="follow_user_<?php echo $val['uid']; ?>">
		  <div class="fBox_l"><img onerror="javascript:faceError(this);" src="<?php echo $val['icon']; ?>"/> </div>
		  <div class="fBox_R "> <p><span class="name"><a href="index.php?mod=qun&qid=<?php echo $val['qid']; ?>"><?php echo $val['name']; ?></a></span> </p>
		  <p><?php echo $val['member_num']; ?>人&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo $val['member_num']; ?>条微博</p>
		  <span> <a href="javascript:;" onclick="joinQun(<?php echo $val['qid']; ?>)">加入群</a></span> 
		  </div>
		</li>
		
<?php } } ?>
  </ul>
	  
<?php } ?>
</div>
	<!--热门微群-->
	
<?php } ?>
<?php if($code == 'city_qun') { ?>
	<!--同城微群-->
	<div>
		<ul>
<?php if(is_array($city_qun)) { foreach($city_qun as $val) { ?>
		  <li>
			<p><a href="#"><?php echo $val['name']; ?></a><span title="成员">(<?php echo $val['member_num']; ?>)</span></p>
		  </li>
		
<?php } } ?>
  
		</ul>
	  </div>
	<!--同城微群-->
	  
<?php } ?>

<?php if($code == 'hot_follow_tag') { ?>
	<!--最受关注话题-->
	<div>
		<ul>
<?php if(is_array($tag_guanzu)) { foreach($tag_guanzu as $val) { ?>
		  <li style="width:100%;">
			<a href="index.php?mod=tag&code=<?php echo $val['name']; ?>"><?php echo $val['name']; ?></a>
			<span><a href="javascript:viod(0);" onclick="favoriteTag('<?php echo $val['name']; ?>'); return false;" title="加关注">+</a></span>
		  </li>
		
<?php } } ?>
  
		</ul>
	  </div>
	<!--最受关注话题-->
	
<?php } ?>

<?php if(in_array($code,array('common_interest','at_me_user'))) { ?>
	<div id="interestUid">
	  
<?php if($user_list) { ?>
	  <ul class="followList" style="overflow:hidden">
<?php if(is_array($user_list)) { foreach($user_list as $val) { ?>
		<li class="pane" id="follow_user_<?php echo $val['uid']; ?>">
		  <div class="fBox_l"><img onerror="javascript:faceError(this);" src="<?php echo $val['face']; ?>" onmouseover="get_user_choose(<?php echo $val['uid']; ?>,'_right_user',<?php echo $val['uid']; ?>);" onmouseout="clear_user_choose();"/> </div>
		  <div class="fBox_R ">
			<span class="name"><a href="index.php?mod=<?php echo $val['username']; ?>"><?php echo $val['nickname']; ?></a></span> 
		    <span id="follow_<?php echo $val['uid']; ?>"> 	<?php echo $val['follow_html']; ?> </span> 
		    <span class="ff_1">
		      
<?php if($val['at_count']) { ?>
@我<?php echo $val['at_count']; ?>次
		      <?php } elseif($val['common_count']) { ?>有<?php echo $val['common_count']; ?>个共同话题
		      <?php } elseif($val['c_count']) { ?>评论了<?php echo $val['c_count']; ?>次
		      <?php } elseif($val['mc_count']) { ?>评论了<?php echo $val['mc_count']; ?>次
		      <?php } elseif($val['m_count']) { ?>分享音乐<?php echo $val['m_count']; ?>次
		      
<?php } ?>
    </span>
		  </div>
 		<div id="user_<?php echo $val['uid']; ?>_right_user" class="layS"></div>
		</li>
		
		<div id="alert_follower_menu_<?php echo $val['uid']; ?>"></div>
		<div id="Pmsend_to_user_area"></div>
		<div id="global_select_<?php echo $val['uid']; ?>" class="alertBox alertBox_2" style="display:none"></div>
		<div id="button_<?php echo $val['uid']; ?>" onclick="get_group_choose(<?php echo $val['uid']; ?>);"></div>
		
<?php } } ?>
  </ul>
	  
<?php } ?>
</div>
	
<?php } ?>
<?php if('photo' == $code) { ?>
	<div class="photo_right">
<?php if($photo_list['list']) { ?>
    <ul class="photo_right_ul">
<?php if(is_array($photo_list['list'])) { foreach($photo_list['list'] as $val) { ?>
	    <li class="photo_right_li">
	      <div><a href="index.php?mod=topic&code=<?php echo $val['0']['tid']; ?>" target="_blank" title="<?php echo $val['0']['nickname']; ?>"><img src="<?php echo $val['0']['photo']; ?>"></a></div>
	    </li>

	
<?php } } ?>
    </ul>
<?php } else { ?>  <ul class="photo_right_ul">
	    <li>暂无相关内容</li>
	    <li style="float:right"><a href="index.php?mod=topic&code=photo">点击查看更多</a></li>
	  </ul>
	
<?php } ?>
</div>
	
<?php } ?>
<?php if('video_list' == $code) { ?>
	  
<?php if($video_list) { ?>
        
<?php if(is_array($video_list)) { foreach($video_list as $val) { ?>
        <li>
          <div class="feedUservideo">
            <a id="a<?php echo $val['id']; ?>" onClick="javascript:showFlash('<?php echo $val['video_hosts']; ?>', '<?php echo $val['video_link']; ?>', this, '<?php echo $val['id']; ?>','<?php echo $val['video_url']; ?>',1);" >
            <div id="play_<?php echo $val['id']; ?>" class="vP"><img src="images/feedvideoplay.gif"  /></div>
            
<?php if($val['video_img']) { ?>
            <img src="<?php echo $val['video_img']; ?>" style="border:none" />
            
<?php } else { ?>            <img src="images/feedvideoplay.gif"  />
            
<?php } ?>
            </a>
          </div>
        </li>
        <li style="float:left"><a href="index.php?mod=<?php echo $val['username']; ?>" target="_blank"><?php echo $val['nickname']; ?></a></li>
        <li style="float:right"><a href="index.php?mod=topic&code=<?php echo $val['tid']; ?>" target="_blank">查看原文</a></li>
        <div class="mBlog_linedot"></div>
        <script type="text/javascript">
			$(document).ready(function(){
				$('#a<?php echo $val['id']; ?>').click();
			});				
		</script>
        
<?php } } ?>
    
<?php } else { ?><li>暂无相关内容</li>
<?php } ?>
<?php } ?>
	     </div>
	   </div>
	   <div style="float:right"><a href="index.php?mod=people" target="_blank">查看更多认证用户</a></div>
     </div>
     
<?php } ?>
     
	 <div class="HboxR">
      <div class="rightBox_t">最近话题榜  TOP<?php echo $Tg_limit; ?> </div>
      <ul>
        
<?php if(is_array($tags)) { foreach($tags as $val) { ?>
<?php $TagNo++; ?>
        <li>
		  <span class="boxRl listyle"><?php echo $TagNo; ?>. <a href="index.php?mod=tag&code=<?php echo $val['name']; ?>"><?php echo $val['name']; ?></a></span>
		  <span style="float:right;">(<?php echo $val['topic_count']; ?>)</span>
		</li>
        
<?php } } ?>
      </ul>
     </div>
   
    <div class="HboxR">
	 <div class="rightBox_t">人气关注榜 TOP<?php echo $Gz_limit; ?> </div>
      <ul>
        
<?php if(is_array($concern_users)) { foreach($concern_users as $val) { ?>
<?php $No++; ?>
        <li>
		<span class="boxRl listyle"><?php echo $No; ?>. <a href="index.php?mod=<?php echo $val['username']; ?>">
<?php $val['nickname'] ?>
<?php echo $val['nickname']; ?></a></span>
		<span style="float:right;">(<?php echo $val['fans_count']; ?>)</span>
		</li>
        
<?php } } ?>
<li><span style="float:right;"><a href="index.php?mod=topic&code=top">查看更多>></a></span></li>
      </ul>
    </div>

	  <div class="HboxR">
		<div class="rightBox_t"><?php echo $this->Config['site_name']; ?>意见反馈 <span class="set_tag"></span></div>
		<ul>
		  众人拾柴火焰高，如您有任何建议欢迎点<a href="index.php?mod=tag&code=意见反馈" target="_blank">意见反馈</a>告诉我们。
		</ul>
	  </div>
    
<?php if($this->Config['ad_enable']) { ?>
    <div class="R_AD">
     <?php echo $this->Config['ad']['ad_list']['group_new']['middle_right']; ?>
     <?php echo $this->Config['ad']['ad_list']['group_new']['middle_right1']; ?>
    </div>
    
<?php } ?>
  </div>
</div>
</div>
<?php if($this->Config['ad_enable']) { ?>
<div align="center" class="T_AD"> <?php echo $this->Config['ad']['ad_list']['group_new']['footer']; ?> </div>
<?php } ?>
<script type="text/javascript" src="templates/default/js/jsgst.js?v=build+20120428"></script>
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