<?php /* 2013-01-26 in jishigou invalid request template */ if(!defined("IN_JISHIGOU")) exit("invalid request"); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php $__my=$this->MemberHandler->MemberFields; ?>
<?php $conf_charset=$this->Config['charset']; ?>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $conf_charset; ?>" />
<link href="./templates/default/styles/admincp.css?v=build+20120428" rel="stylesheet" type="text/css" />
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
<script language="JavaScript" type="text/javascript" src="./templates/default/js/cookies.js?v=build+20120428"></script>
<script type="text/javascript" src="templates/default/js/min.js?v=build+20120428"></script>
<script src="templates/default/./js/common.js?v=build+20120428" type="text/javascript"></script>
<script src="templates/default/./js/dialog.js?v=build+20120428" type="text/javascript"></script>
<script type="text/javascript" src="templates/default/./js/admin_script_common.js?v=build+20120428"></script>
<script type="text/javascript" src="./images/uploadify/jquery.uploadify.v2.1.4.min.js?v=build+20120428"></script>
<script language="JavaScript">
function checkalloption(form, value) {
    for(var i = 0; i < form.elements.length; i++) {
        var e = form.elements[i];
        if(e.value == value && e.type == 'radio' && e.disabled != true) {
            e.checked = true;
        }
    }
}
function checkallvalue(form, value, checkall) {
    var checkall = checkall ? checkall : 'chkall';
    for(var i = 0; i < form.elements.length; i++) {
        var e = form.elements[i];
        if(e.type == 'checkbox' && e.value == value) {
            e.checked = form.elements[checkall].checked;
        }
    }
}
function zoomtextarea(objname, zoom) {
    zoomsize = zoom ? 10 : -10;
    obj = $(objname);
    if(obj.rows + zoomsize > 0 && obj.cols + zoomsize * 3 > 0) {
        obj.rows += zoomsize;
        obj.cols += zoomsize * 3;
    }
}
function redirect(url) {
    window.location.replace(url);
}
function checkall(form, prefix, checkall) {
    var checkall = checkall ? checkall : 'chkall';
    for(var i = 0; i < form.elements.length; i++) {
        var e = form.elements[i];
        if(e.name != checkall && (!prefix || (prefix && e.name.match(prefix)))) {
            e.checked = form.elements[checkall].checked;
        }
    }
}
var collapsed = Cookies.getCookie('guanzhu_collapse');
function collapse_change(menucount) {
    if(document.getElementById('menu_' + menucount).style.display == 'none') {
        document.getElementById('menu_' + menucount).style.display = '';collapsed = collapsed.replace('[' + menucount + ']' , '');
        $('menuimg_' + menucount).src = './templates/default/images/admincp/menu_reduce.gif';
    } else {
        document.getElementById('menu_' + menucount).style.display = 'none';collapsed += '[' + menucount + ']';
        $('menuimg_' + menucount).src = './templates/default/images/admincp/menu_add.gif';
    }
    Cookies.setCookie('guanzhu_collapse', collapsed, 2592000);
}
function advance_search(o)
{
    o.innerHTML=$('advance_search').visible()?"高级搜索":"简单搜索";
    $('advance_search').toggle();
    return false;
}
</script>
</head>
<body>
<div id="show_message_area"></div>
<table width="100%" border="0" cellpadding="2" cellspacing="6" style="_margin-left:-10px; ">
<tr>
  <td><table width="100%" border="0" cellpadding="2" cellspacing="6">
    <tr>
      <td>
<?php if($__is_messager!=true) { ?>
        <div style="width:100%; height:15px;color:#000;margin:0px 0px 10px;">
          <div style="float:left;"><a href="admin.php?mod=index&code=home">控制面板首页</a>&nbsp;&raquo;&nbsp;
<?php if($pluginconfig && $pluginname) { ?>
          <?php echo $pluginconfig; ?>&nbsp;&raquo;&nbsp;<?php echo $pluginname; ?>
          <?php } elseif($this->pluginconfig && $this->pluginname) { ?>  <?php echo $this->pluginconfig; ?>&nbsp;&raquo;&nbsp;<?php echo $this->pluginname; ?>
<?php } else { ?>  
<?php echo $this->actionName(); ?>
<?php } ?>
  </div>
<?php if($this->RoleActionId) { ?>
          <div style="float: right;"><a title="查看谁操作过这个页面" href="admin.php?mod=logs&role_action_id=<?php echo $this->RoleActionId; ?>"><b style="color:red">查看当前页操作记录</b></a></div>
<?php } ?>
        </div>
<?php } ?>
<?php $sub_menu_list = $_sub_menu_list?$_sub_menu_list:get_sub_menu(); ?>
<?php if($sub_menu_list) { ?>
<div class="nav3">
    <ul class="cc">
<?php if(is_array($sub_menu_list)) { foreach($sub_menu_list as $value) { ?>
<?php if($value['type'] == '1' && PLUGINDEVELOPER < 1)continue; ?>
<li 
<?php if($value['current']) { ?>
class="current"
<?php } ?>
>
<?php if($this->pluginid) { ?>
                <a href="<?php echo $value['link']; ?>&id=<?php echo $this->pluginid; ?>">
<?php } else { ?><a href="<?php echo $value['link']; ?>">
<?php } ?>
<?php echo $value['name']; ?></a>
            </li>
<?php } } ?>
</ul>
</div>
<?php } ?> <br />
<!--
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tableborder">
  <tr class="header">
    <td><div style="float:left; padding-top:4px">技巧提示 
    <span style="float:right;"><a href="#" onclick="collapse_change('tip')">收缩/展开</a></span></div>
      <div style="float:right; margin-right:4px; padding-bottom:9px"></div></td>
  </tr>
  <tbody id="menu_tip" style="display:">
    <tr>
      <td><ul>
          <li>微博内容中#关键词#中的关键词会被解析为话题，话题是一种内容分类，方便用户订阅等。</li>
        </ul></td>
    </tr>
</table>
-->
    <form action="admin.php" method="get" name="search">
    <table cellspacing="1" cellpadding="4" width="100%" align="center" class="tableborder">
        <tr class="header">
            <td colspan="2">查找已推荐的微博</td>
        </tr>
        <input name="mod" type="hidden" value="recdtopic">
        <input name="per_page_num" type="hidden" value="<?php echo $per_page_num; ?>">
        <tr>
            <td class="altbg1" width="150">
            按昵称查找:
            </td>
            <td class="altbg2">
            <input name="nickname" type="text" id="nickname" value="<?php echo $nickname; ?>" size="40">        
            </td>
        </tr>
        <tr>
            <td class="altbg1" width="150">
            按关键词查找:
            </td>
            <td class="altbg2">
            <input type="text" name="keyword" value="<?php echo $keyword; ?>" size="40">        
            </td>
        </tr>
        <tr>
            <td class="altbg1" width="150">&nbsp;
            </td>
            <td class="altbg2">
            <button name="do" value='' type="submit" class="button">搜索指定</button> &nbsp;<button class="button" type="button" onclick="window.location.href='admin.php?mod=recdtopic';return false;">全部已推荐</button>
            </td>
        </tr>
    </table>
    </form>
    <form method="post"  action="admin.php?mod=recdtopic&code=delete">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
      <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
      <!--
        <tr>
          <td width="120" height="30" align="right"><a href="admin.php?mod=topic">所有的微博</a></td>
          <td width="120" align="right"><a href="admin.php?mod=topic&amp;type=pic">有图片的微博</a></td>
          <td width="120" align="right"><a href="admin.php?mod=topic&amp;type=video">有视频的微博</a></td>
          <td width="120" align="right"><a href="admin.php?mod=topic&amp;type=music">有音乐的微博</a></td>
        </tr>
        -->
      </table>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tableborder">
            <tr class="header">
                <td width="40">
                <input class="checkbox" type="checkbox" name="chkall" onclick="checkall(this.form,'ids')" >删</td>    
                <td>已推荐/置顶的微博</td>
                <td width="120">推荐时间</td>
                <td width="120">是否过期</td>
                <td width="60">操作</td>
            </tr>
<?php if(is_array($topic_list)) { foreach($topic_list as $topic) { ?>
            <tr align="center">
                <td class="altbg1" style="border-bottom:1px dotted #EDEDED">
                <input class="checkbox" type="checkbox" name="ids[]" value="<?php echo $topic['tid']; ?>" ></td>
                <td class="altbg2" style="border-bottom:1px dotted #EDEDED">
                <b><a href="index.php?mod=<?php echo $topic['username']; ?>" target="_blank"><?php echo $topic['nickname']; ?></a></b>:<?php echo $topic['content']; ?>
<?php if($topic['imageid'] && $topic['image_list']) { ?>
<?php if(is_array($topic['image_list'])) { foreach($topic['image_list'] as $iv) { ?>
                        <a href="<?php echo $iv['image_original']; ?>" target="_blank"><img src="<?php echo $iv['image_small']; ?>" width="30" border="0" /></a>
<?php } } ?>
<?php } ?>
<!-- 视频分享-->
<?php if($topic['videoid']) { ?>
                <div class="feedUservideo">
                 <a onClick="javascript:showFlash('<?php echo $topic['VideoHosts']; ?>', '<?php echo $topic['VideoLink']; ?>', this, '<?php echo $topic['VideoID']; ?>');" >
                 <div id="play_<?php echo $topic['VideoID']; ?>" class="vP"><img src="images/feedvideoplay.gif"  /></div>
                 <img src="<?php echo $topic['VideoImg']; ?>" style="border:none; width:130px; "/>
                </a>
                </div>
<?php } ?>
<!-- 视频分享-->
                <!-- 音乐分享-->
<?php if($topic['musicid']) { ?>
                <div class="feedUserImg">
                <div id="play_<?php echo $topic['MusicID']; ?>"></div>
                <img src="images/music.gif" title="点击播放音乐" border="0" onclick="javascript:showFlash('music', '<?php echo $topic['MusicUrl']; ?>', this, '<?php echo $topic['MusicID']; ?>');" style="cursor:pointer; border:none;" />  
                </div>
<?php } ?>
<!-- 音乐分享-->
              </td>
                <td class="altbg1" style="border-bottom:1px dotted #EDEDED"><?php echo $topic['recd_time']; ?></td>
                <td class="altbg2" style="border-bottom:1px dotted #EDEDED">
<?php if($topic['expiration'] != 0 && $topic['expiration']<=time()) { ?>
                        是
<?php } else { ?>否
<?php } ?>
</td>
                <td class="altbg1" style="border-bottom:1px dotted #EDEDED">
                <a href="admin.php?mod=recdtopic&code=edit&tid=<?php echo $topic['tid']; ?>">编辑</a>&nbsp;&nbsp;
                <A href="admin.php?mod=recdtopic&code=delete&ids=<?php echo $topic['tid']; ?>">删除</A>&nbsp;                </td>
            </tr>
<?php } } ?>
<?php if($page_arr['html']) { ?>
            <tr align="center">
                <td colspan="4" class="altbg1">
                <?php echo $page_arr['html']; ?>
                </td>
            </tr>
<?php } ?>
</table>
        <center>
            <input class="button" type="submit" name="cronssubmit" value="提 交">
            <span style="margin-left:10px;">
            <input class="button" type="button" value="一键清理过期推荐" onclick="location.href='admin.php?mod=recdtopic&code=onekey'">
            </span>
        </center>
    </form>
    <br />