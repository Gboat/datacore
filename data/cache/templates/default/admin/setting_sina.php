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
<table cellspacing="1" cellpadding="4" width="100%" align="center"
    class="tableborder">
    <tr class="header">
        <td>技巧提示</td>
    </tr>
    <tr class="altbg1">
        <td>
        <ul>
            <li>启用新浪微博，可以使用新浪微博帐户登录<?php echo $this->Config['site_name']; ?>(<?php echo $this->Config['site_url']; ?>)、不再担心忘记密码；</li>
            <li>还可实现与<?php echo $this->Config['site_name']; ?>新浪微博平台内容的双向同步，吸引更多人关注；</li>
        </ul>
        </td>
    </tr>
</table>
<br>
<form method="post"  name="settings"
    action="admin.php?mod=setting&code=do_modify_sina">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/><a
    name="新浪微博设置"></a>
<table cellspacing="1" cellpadding="4" width="100%" align="center"
    class="tableborder">
    <tr class="header">
        <td colspan="2">新浪微博设置</td>
    </tr>
    <tr>
        <td width="45%"><b>是否启用？</b><br>
        这是下面所有功能的总开关</td>
        <td><?php echo $sina_enable_radio; ?></td>
    </tr>
    <tr>
        <td width="45%"><b>App Key</b><br>
        默认 “3015840342”，可正常使用；<BR>
        如需全新申请，请访问<A HREF="http://open.t.sina.com.cn/" target=_blank>http://open.t.sina.com.cn/</A><br />
        注意：切换App Key会解除原先的用户绑定关系，需要重新绑定</td>
        <td><input type="text" name="sina[app_key]"
            value="<?php echo $sina['app_key']; ?>" /></td>
    </tr>
    <tr>
        <td width="45%"><b>App Secret</b><br>
        默认 “484175eda3cf0da583d7e7231c405988”，同上；</td>
        <td><input type="text" name="sina[app_secret]"
            value="<?php echo $sina['app_secret']; ?>" /></td>
    </tr>
    <tr>
        <td width="45%"><b>允许新浪微博帐号绑定和登录本站？</b><br>
        建议选是，可吸引新浪微博用户</td>
        <td><?php echo $sina_is_account_binding_radio; ?></td>
    </tr>
    <tr>
        <td width="45%"><b>用新浪微博帐号登录后，是否向用户展示本站的昵称/密码注册页面？</b><br>
        建议选是，因为新浪API提供的信息不包括email</td>
        <td><?php echo $sina_reg_pwd_display_radio; ?></td>
    </tr>
    <tr>
        <td width="45%"><b>用新浪微博帐号登录后，是否同步新浪微博的头像？</b><br>
        建议选是</td>
        <td><?php echo $sina_is_sync_face_radio; ?></td>
    </tr>
    <tr>
        <td width="45%"><b>允许将微博同步到发布者的新浪微博上？</b><br>
        建议选是，可将内容推广到新浪微博平台</td>
        <td><?php echo $sina_is_synctopic_toweibo_radio; ?></td>
    </tr>
    <tr>
        <td width="45%"><b>同步内容到新浪微博时，是否包括图片？</b><br>
        建议选是，假如此功能导致服务器反应缓慢，则可以将其关闭。</td>
        <td><?php echo $sina_is_upload_image_radio; ?></td>
    </tr>
    <tr>
        <td width="45%"><b>同步到新浪微博的时间限制</b><br>
        单位为秒，默认为 “15”</td>
        <td><input type="text" name="sina[wbx_share_time]"
            value="<?php echo $sina['wbx_share_time']; ?>" /> 秒</td>
    </tr>
    <tr>
        <td width="45%"><b>允许从绑定的新浪微博帐户获取微博到本站？</b><br>
        选是，将有助于从新浪获取微博内容，但会轻微增加网站的负担</td>
        <td><?php echo $sina_is_synctopic_tojishigou_radio; ?></td>
    </tr>
    <tr>
        <td width="45%"><b>允许获取新浪微博的评论读取到本站？</b><br>
        前提是评论者已在本站绑定了微博帐户，会轻微增加网站负担；</td>
        <td><?php echo $sina_is_syncreply_tojishigou_radio; ?></td>
    </tr>
    <tr>
        <td width="45%"><b>允许获取新浪微博内容时读取图片到本站？</b><br>
        选是，那么微博中有图片也会同步过来，会增加网站的负担；</td>
        <td><?php echo $sina_is_syncimage_tojishigou_radio; ?></td>
    </tr>
    <tr>
        <td width="45%"><b>从新浪获取微博内容的时间限制</b><br>
        在满足时间限制的前提下，用户在访问时会触发内容同步；</td>
        <td><input type="text" name="sina[syncweibo_tojishigou_time]"
            value="<?php echo $sina['syncweibo_tojishigou_time']; ?>" /> 秒</td>
    </tr>
    <tr>
        <td width="45%"><b>允许推送回复内容到相关联的新浪微博中？</b><br>
        前提是回复者已经绑定了新浪微博，并且要求被回复的微博已经推送到新浪微博中。</td>
        <td><?php echo $sina_is_syncreply_toweibo_radio; ?></td>
    </tr>
    <tr>
        <td width="45%"><b>允许微博详情页显示转发到新浪微博按钮？</b><br>
        建议选择是，不会增加网站负担；</td>
        <td><?php echo $sina_is_rebutton_display_radio; ?></td>
    </tr>
</table>
<br>
<center><input type="submit" class="button"
    name="settingsubmit" value="提 交"></center>
<br>
</form>
<br>