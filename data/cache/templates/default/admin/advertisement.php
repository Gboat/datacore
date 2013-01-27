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
<script language="JavaScript" type="text/javascript">
function synchronous(mod,position,o)
{
    var obj=document.getElementsByTagName('textarea');
//    var ad_string=$('ad_'+mod+'_'+position).value;
    var ad_string = document.getElementById('ad_'+mod+'_'+position).value;
    for (var i=0;i<obj.length;i++)
    {
        if(obj[i].getAttribute('position')==position)
        {
            obj[i].value=ad_string;
        }
    }
    alert("已成功将"+o.title);
    return false;
}
</script>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tableborder">
  <tr class="header">
    <td>技巧提示<div style="float:right;"> <a href="#" onclick="collapse_change('tip')">收缩/展开</a></div>
     </td>
  </tr>
  <tbody id="menu_tip" style="display:">
    <tr>
      <td><ul>
          <li><B>强烈建议</B>：在搜索引擎未收录网站前，不要添加广告，否则影响收录；</li>
          <li>系统在几乎每个页面都内置了常用的广告位，你可以在下面开启或者关闭全部广告，如果将广告位留空则自动隐藏广告位。</li>
          <li>广告代码支持html代码（包括JS代码）。比如，要加入图片广告的话，填入的代码一般为&lt;a href="xxx"&gt;&lt;img src="http://xxx.com/xxx.gif"&gt;&lt;/a&gt;</li>
          <li>可以将某个页面某个位置的广告代码，同步设置到其他页面，只需“<font color=red>点此同步到其它页面</font>”即可。</li>
          <li><b  style="color:#FF0000;">添加幻灯图广告提示</b>：&lt;item&gt;&lt;img&gt;图片路径或者地址（如：http://xxx.com/xxx.gif）&lt;/img&gt;&lt;url&gt;链接跳转地址（如：http://xxx.com/xxx.html）&lt;/url&gt;&lt;/item&gt;<br />
            需要添加多个，修改参数后重复添加即可。注意在输入框内代码不要换行。</li>
        </ul></td>
    </tr>
</table>
<br />
<form method="post"  action="admin.php?mod=income&code=domodify"  enctype="multipart/form-data">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
  <table cellspacing="1" cellpadding="4" width="100%" align="center" class="tableborder">
    <tr class="header">
      <td colspan="2">参数设置</td>
    </tr>
    <tr>
      <td class="altbg1" width="40%"><b>是否启用广告:</b><br>
        <span class="smalltxt">启用后下面设置的广告才能显示</span> </td>
      <td class="altbg2"> <?php echo $enable_radio; ?> </td>
    </tr>
  </table>
  <br />
<?php if(is_array($this->_config)) { foreach($this->_config as $mod => $config) { ?>
 <br />
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tableborder">
    <tr class="header">
      <td colspan="2"><?php echo $config['name']; ?><!--<a href="index.php?mod=<?php echo $mod; ?>" style="float:right;margin-top:10px" target="_blank">预览</a>--> <div style="float:right;"><a href="#" onclick="collapse_change('tip_<?php echo $mod; ?>')"> <img id="menuimg_tip_<?php echo $mod; ?>" src="./templates/default/images/admincp/menu_add.gif" border="0"/>展开/收缩</a></div></td>
    </tr>
    <tbody id="menu_tip_<?php echo $mod; ?>" style="display:none" ><!--style="display:none"-->
<?php if(is_array($config['ad_list'])) { foreach($config['ad_list'] as $ad) { ?>
      <tr align="center">
        <td class="altbg2"><?php echo $ad['name']; ?><BR>
          (最大宽度:<?php echo $ad['width']; ?>)<br>
          <a href="#" onclick="return synchronous('<?php echo $mod; ?>','<?php echo $ad['value']; ?>',this);" title="将所有[<?php echo $ad['name']; ?>]设为与[<?php echo $config['name']; ?><?php echo $ad['name']; ?>]相同"><font color=red>点此同步到其它页面</font></a> </td>
        <td class="altbg1"><textarea name="ad[<?php echo $mod; ?>][<?php echo $ad['value']; ?>]" rows="5" cols="100" position='<?php echo $ad['value']; ?>' id="ad_<?php echo $mod; ?>_<?php echo $ad['value']; ?>"><?php echo $_AD[$mod][$ad['value']]; ?></textarea>
        </td>
      </tr>
<?php } } ?>
     <tr><td colspan="2">
    <center>    <input class="button" type="submit" name="cronssubmit" value="提 交">  </center>
    </td></tr>
   </tbody>
  </table>
<?php } } ?>
<?php if(0) { ?>
  <br />
  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tableborder">
    <tr class="header">
      <td>更新到站点</td>
      <td>&nbsp;</td>
    </tr>
    <tr align="center">
      <td class="altbg2"  width="300">选择站点<br>
        如果不选择，就为当前站点。</td>
      <td class="altbg1">
<?php if(is_array($domain_list)) { foreach($domain_list as $domain) { ?>
<?php $checked=$domain==$current_domain?" checked":"" ?>
        <input type="checkbox" name="domain_list[]" value="<?php echo $domain; ?>"<?php echo $checked; ?>=>
        <?php echo $domain; ?>&nbsp;
<?php } } ?>
      </td>
    </tr>
  </table>
<?php } ?>
  <br>
</form>