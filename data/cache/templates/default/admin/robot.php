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
<form method="post"  action="admin.php?mod=robot&code=domodify"  enctype="multipart/form-data">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
    <table cellspacing="1" cellpadding="4" width="100%" align="center" class="tableborder">
        <tr class="header">
            <td colspan="2">参数设置</td>
        </tr>
        <tr>
            <td class="altbg1" width="60%"><b>开启统计:</b>
            <span class="smalltxt">开启后能统计搜索引擎的来访次数，会轻微加重服务器负担。</span><br>
            提醒1：蜘蛛爬行次数不等于实际收录，<A HREF="http://shoulu.biniu.com"><font color=red>点此查看各搜索引擎收录</font></A>；<BR>
            提醒2：在一些权重高的网站留下链接也可引导蜘蛛，<A HREF="http://backlink.biniu.com"><font color=red>外部链接站点分析</font></A>。<BR>
            提醒3：不与受惩罚的网站放同一个IP上，避免受牵连，<A HREF="http://cnrdn.com/G8f4"><font color=red>同IP网站查询</font></A>。<BR>
            </td>
            <td class="altbg2">
            <?php echo $turnon_radio; ?>
            </td>
        </tr>
    </table>
    <br />
        <center><input class="button" type="submit" name="cronssubmit" value="提 交"></center>
        <br />
<?php if($config['turnon']) { ?>
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tableborder">
    <tr class="header">
    <td colspan="10">蜘蛛来访记录</td>
    </tr>
<?php if($robot_list==false) { ?>
    <tr align="center">
        <td colspan="10" align="center">
        暂无搜索引擎蜘蛛来访
        </td>
    </tr>
<?php } else { ?><tr class="altbg1">
<!--
<td width="48"><input type="checkbox" name="chkall" onclick="checkall(this.form,'delete')" class="checkbox">删</td>
-->
        <td><a href="admin.php?mod=robot&order_by=name&order_type=<?php echo $toggle_order_type; ?>" class="order <?php echo $name; ?>">蜘蛛名称</a></td>
        <td><a href="admin.php?mod=robot&order_by=today_times&order_type=<?php echo $toggle_order_type; ?>" class="order <?php echo $today_times; ?>">今日次数</a></td>
        <td><a href="admin.php?mod=robot&order_by=times&order_type=<?php echo $toggle_order_type; ?>" class="order <?php echo $times; ?>">总次数</a></td>
        <td><a href="admin.php?mod=robot&order_by=last_visit&order_type=<?php echo $toggle_order_type; ?>" class="order <?php echo $last_visit; ?>">最后来访时间</a></td>
        <td>IP地址</td>
        <td>访问权限</td>
<?php if($this->ad) { ?>
        <td>显示广告?</td>
<?php } ?>
<td>查看最近来访日志</td>
    </tr>
<?php } ?>
<?php if(is_array($robot_list)) { foreach($robot_list as $robot) { ?>
        <tr align="center">
<!--
<td class="altbg2">
<input class="checkbox" type="checkbox" name="delete[]" value="<?php echo $robot['name']; ?>">
</td>
-->
                <td class="altbg2">
<?php if(!empty($robot['link'])) { ?>
                <a href="<?php echo $robot['link']; ?>" target="_blank" title="<?php echo $robot['agent']; ?>"><?php echo $robot['name']; ?></a>
<?php } else { ?><span title="<?php echo $robot['agent']; ?>"><?php echo $robot['name']; ?></span>
<?php } ?>
</td>
                <td class="altbg2"><b><?php echo $robot['today_times']; ?></b></td>
                <td class="altbg2"><b><?php echo $robot['times']; ?></b></td>
                <td class="altbg2"><?php echo $robot['last_visit']; ?></td>
                <td class="altbg2">
                <a href="admin.php?mod=robot&code=viewip&robot=<?php echo $robot['name']; ?>" title="查看详细记录">
<?php if(is_array($robot_ip_list[$robot['name']])) { foreach($robot_ip_list[$robot['name']] as $ip) { ?>
                <?php echo $ip; ?><br>
<?php } } ?>
</a>
                </td>
                <td class="altbg2">
<?php if($robot['disallow']) { ?>
                    <font color="Gray">已禁止</font>,<a href="admin.php?mod=robot&code=disallow0&name=<?php echo $robot['name']; ?>">允许访问?</a>
<?php } else { ?><font color="Red">允许访问</font>,<a href="admin.php?mod=robot&code=disallow1&name=<?php echo $robot['name']; ?>">禁止?</a>
<?php } ?>
</td>
<?php if($this->ad) { ?>
                <td class="altbg2"><?php echo $robot['show_ad_radio']; ?></td>
<?php } ?>
<td class="altbg2">
                <a href="admin.php?mod=robot&code=view&name=<?php echo $robot['name']; ?>&day=5">5天</a>
                <a href="admin.php?mod=robot&code=view&name=<?php echo $robot['name']; ?>&day=15">15天</a>
                <a href="admin.php?mod=robot&code=view&name=<?php echo $robot['name']; ?>&day=30">30天</a>
                </td>
        </tr>
<?php } } ?>
</table>
        <br>
<?php } ?>
</form>