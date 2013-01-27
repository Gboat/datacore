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
<form method="post"  name="config[settings]" action="admin.php?mod=setting&code=domodify_normal" enctype="multipart/form-data">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
    <a name="user"></a>
    <table cellspacing="1" cellpadding="4" width="100%" align="center" class="tableborder">
        <tr class="header">
            <td colspan="2">用户注册相关设置</td>
        </tr>
        <tr class="altbg1">
            <td width="45%"><b>开启用户普通注册功能？</b><br>
            <span class="smalltxt">设置是否允许游客注册成为站点会员，可根据需求选择允许的注册方式</span></td>
            <td><?php echo $regstatus_checkbox; ?></td>
        </tr>
<?php if($third_party_regstatus_checkbox) { ?>
        <tr class="altbg1">
            <td width="45%"><b>启用第三方帐号注册功能？</b><br>
            <span class="smalltxt">如果启用了上述“普通注册”那新浪等平台账号登陆注册默认也是允许的；<br />
            如为了防止注册机，那请关闭普通注册，并单独勾选启用第三方账号登陆即可，前提是已经设置了<a href="admin.php?mod=setting&code=modify_sina">新浪微博绑定</a></span></td>
            <td><?php echo $third_party_regstatus_checkbox; ?></td>
        </tr>
<?php } ?>
<tr class="altbg2">
            <td width="45%"><b>完全关闭普通注册时的提示信息:</b><br>
            <span class="smalltxt">建议告知用户为什么关闭，并说明如何才能注册（支持html代码）
            </span>
            </td>
            <td>
            <textarea cols="48" rows="4" name="config[regclosemessage]"><?php echo $this->Config['regclosemessage']; ?></textarea>
            </td>
        </tr>
        <tr class="altbg1">
            <td width="45%"><b>给新注册用户发私信</b><br>
            <span class="smalltxt">新用户注册后，系统会把下面内容发送给新注册用户（支持html代码）
            <br>留空将关闭此功能</span></td>
            <td><textarea cols="48" rows="4" name="config[notice_to_new_user_news]"><?php echo $this->Config['notice_to_new_user_news']; ?></textarea></td>
        </tr>
        <tr class="altbg2">
            <td><b>以哪个管理员名义给新注册用户发私信:</b><br>
            <span class="smalltxt">此项与上述发私信设置配合使用，将以此处填写的管理员昵称给新用户发私信
            <br>留空将关闭此功能</span></td>
            <td><input type="text" name="config[notice_to_new_user]" value="<?php echo $this->Config['notice_to_new_user']; ?>" size="50" ></td>
        </tr>
        <tr class="altbg1">
            <td width="45%"><b>每个邀请链接可注册人数:</b><br>
            <span class="smalltxt">达到指定注册人数后，邀请链接将失效，方便控制注册人数；<BR>
            <A HREF="index.php?mod=profile&code=invite" target=_blank><b>查看前台邀请好友的描述</b></A></span></td>
            <td><input type="text" name="config[invite_limit]" value="<?php echo $this->Config['invite_limit']; ?>" size="5" /></td>
        </tr>
        <tr class="altbg2">
            <td width="45%"><b>每用户最多可邀请人数:</b><br>
            <span class="smalltxt">在开启邀请功能后，每个注册用户最多可以邀请多少人来注册并关注自己，默认为30 </span></td>
            <td><input type="text" name="config[invite_count_max]" value="<?php echo $this->Config['invite_count_max']; ?>" size="5" /></td>
        </tr>
        <tr class="altbg1">
            <td width="45%"><b>用户昵称/个性微博地址中禁止包含的字符:</b><br>
            <span class="smalltxt">一行一个，可以使用通配符*<BR>
            个性微博地址将用于访问用户个人微博，右侧预设的词语系统已经使用，禁止用户使用。
            </span>
            </td>
            <td>
            <textarea cols="28" rows="5" name="user_forbid"><?php echo $user_forbid; ?></textarea>
            </td>
        </tr>        
        <tr class="altbg2">
            <td width="45%"><b>新注册用户默认的角色:</b><br>
              <span class="smalltxt">设置新注册的用户属于哪个用户组，如无特殊需求请设置为“普通会员” ；
                <br><b style="color:red;">如需人工审核用户注册</b>，请设置为“待验证会员”，其后新用户注册，将会收到相应私信通知；
                <br>有待审核会员时，管理员也会收到私信通知（<a href="admin.php?mod=setting&code=modify_normal"><b style="color:blue;">点此设定通知哪些管理员</b></a>）；
                <br><a href="admin.php?mod=role&code=list&type=normal" target=_blank>点此设置用户角色权限</a>，<a href="admin.php?mod=member&code=waitvalidate" target=_blank><span style="color:green;">点此审核待验证会员</span></a>。
              </span>
            </td>
            <td><?php echo $normal_role_select; ?></td>
        </tr>
        <tr class="altbg1">
            <td width="45%"><b>给待验证会员发私信通知:</b><br>
            <span class="smalltxt">当注册用户进入‘待验证用户’组时，以初始帐号发私信告知的内容</span></td>
            <td><textarea cols="48" rows="4" name="config[notice_to_waitvalidate_user]"><?php echo $this->Config['notice_to_waitvalidate_user']; ?></textarea></td>
        </tr>
        <tr class="altbg2">
            <td width="45%"><b>待验证会员审核通过后发私信通知:</b><br>
            <span class="smalltxt">当待验证用户通过审核后，以初始帐号发私信告知的内容。 </span></td>
            <td><textarea cols="48" rows="4" name="config[notice_to_validatesucssee_user]"><?php echo $this->Config['notice_to_validatesucssee_user']; ?></textarea></td>
        </tr>
        <tr class="altbg1">
            <td width="45%"><b>新用户验证EMAIL:</b><br>
            <span class="smalltxt">选择“否”，无需验证Email，用户可直接注册成功；<BR>
            选择“是”将向用户注册Email发送一封验证邮件，以确认Email有效性。 
            </span></td>
            <td><?php echo $email_verify_radio; ?> </td>
        </tr>
        <tr class="altbg2">
            <td width="45%"><b>EMAIL未验证的用户角色:</b><br>
            <span class="smalltxt">如设置了新注册用户需要EMAIL验证，但用户注册了却没验证，就属于该角色。 
            </span></td>
            <td><?php echo $no_verify_email_role_select; ?> </td>
        </tr>
        <tr class="altbg1">
            <td width="45%"><b>禁止使用的Email地址:</b><br>
            <span class="smalltxt">由于一些大型邮件服务提供商会过滤系统程序发送的有效邮件，您可以要求新用户不得以某些域名结尾的邮箱注册，每行一个域名，例如 
            @hotmail.com </span></td>
            <td>
            <img src="./templates/default/images/admincp/zoomin.gif" onmouseover="this.style.cursor='pointer'" onclick="zoomtextarea('config[reg_email_forbid]', 1)"> 
            <img src="./templates/default/images/admincp/zoomout.gif" onmouseover="this.style.cursor='pointer'" onclick="zoomtextarea('config[reg_email_forbid]', 0)">
            <br />
            <textarea rows="4" name="config[reg_email_forbid]" cols="48"><?php echo $this->Config['reg_email_forbid']; ?></textarea>
            </td>
        </tr>
        <!-- 
        <tr class="altbg2">
            <td width="45%"><b>允许同一 Email 注册不同用户:</b><br>
            <span class="smalltxt">选择“否”将只允许一个 Email 地址只能注册一个用户名</span></td>
            <td><?php echo $email_doublee_radio; ?> </td>
        </tr>
        -->
        <tr class="altbg2">
            <td width="45%"><b>只开启普通时，是否显示邀请人输入框？</b><br>
            <span class="smalltxt">选择“否”，注册页面上不显示邀请人输入框</span></td>
            <td><?php echo $register_invite_input_radio; ?> </td>
        </tr>
        <tr class="altbg1">
            <td width="45%"><b>邀请人为空时，是否允许用户自定义？</b><br>
            <span class="smalltxt">选择“否”，用户在个人设置页面将不能自定义的设置邀请人</span></td>
            <td><?php echo $register_invite_input2_radio; ?> </td>
        </tr>
    </table>
    <br>
    <center><input type="submit" class="button" name="settingsubmit" value="提 交"></center><br>
</form>
<br>