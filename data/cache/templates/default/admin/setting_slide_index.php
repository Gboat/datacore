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

<iframe id="uploadframe" name="uploadframe" width="0" height="0" marginwidth="0" frameborder="0" src="about:blank"></iframe>
<form method="post"  name="settings" action="admin.php?mod=setting&code=do_modify_slide_index" enctype="multipart/form-data">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>

    <a name="幻灯设置"></a>
    <table cellspacing="1" cellpadding="4" width="100%" align="center" class="tableborder">
        <tr class="header">
    		<td colspan="2">首页幻灯广告设置</td>
    	</tr>
    	<tr>
    		<td width="45%"><b>是否启用？</b><br />
            启用幻灯广告后，在网站首页会显示幻灯图片内容，以吸引游客访问网站；
            </td>
    		<td><?php echo $slide_enable_radio; ?></td>
    	</tr>
    </table>
    <center><input type="submit" class="button" name="settingsubmit" value="提交设置" /></center><br />

	<a name="幻灯列表"></a>
	<table cellspacing="1" cellpadding="4" width="100%" align="center" class="tableborder">
		<tr class="header"> 
            <td>启用</td>
            <td>图片地址和链接地址</td>
			<td>排序</td>          
		</tr>
        
<?php if(is_array($slide_list)) { foreach($slide_list as $k => $slide) { ?>
<tr>
            
<?php $_checked = $slide['enable'] ? ' checked checked="true" ' : ''; ?>
<td valign="top"><input type="checkbox" name="slide[list][<?php echo $k; ?>][enable]" value="1" <?php echo $_checked; ?> /></td>
            <td valign="top">1）请输入图片地址：<input type="text" name="slide[list][<?php echo $k; ?>][src]" value="<?php echo $slide['src']; ?>" size="50" />图片大小以680x220为最佳；
            <br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;或上传图片：<input type="file" name="slide_pic_<?php echo $k; ?>"><br />
			2）完整链接url地址：<input type="text" name="slide[list][<?php echo $k; ?>][href]" value="<?php echo $slide['href']; ?>" size="50" />
			</td>
            <td valign="top"><input type="text" name="slide[list][<?php echo $k; ?>][order]" value="<?php echo $slide['order']; ?>" size="5" /></td> 
		</tr>
		<tr>
			<td valign="top">&nbsp;</td>
            <td valign="top"><a href="<?php echo $slide['href']; ?>" target=_blank><img src="<?php echo $slide['src']; ?>" height="220" border="0" /></a></td>
            <td valign="top">&nbsp;</td> 
		</tr>
		<tr> 
            <td>&nbsp;</td>
            <td>&nbsp;</td>
			<td>&nbsp;</td>          
		</tr>
        
<?php } } ?>
        <tr>
			<td><input type="checkbox" name="slide_new[0][enable]" value="1" checked checked="true" /></td>
            <td>1）请输入图片地址：<input type="text" name="slide_new[0][src]" value="" size="50" />
            <BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;或上传图片：<input type="file" name="slide_new_pic_0"><br />
			2）完整链接url地址：<input type="text" name="slide_new[0][href]" value="" size="50" /></td>
            <td><input type="text" name="slide_new[0][order]" value="" size="5" /></td> 
		</tr>
        <tr>
			<td><input type="checkbox" name="slide_new[1][enable]" value="1" checked checked="true" /></td>
            <td>1）请输入图片地址：<input type="text" name="slide_new[1][src]" value="" size="50" />
			图片大小以680x220为最佳；<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;或上传图片：<input type="file" name="slide_new_pic_1"><br />
			2）完整链接url地址：<input type="text" name="slide_new[1][href]" value="" size="50" />
			</td>
            <td><input type="text" name="slide_new[1][order]" value="" size="5" /></td> 
		</tr>
	</table>
	<center><input type="submit" class="button" name="settingsubmit" value="提交设置" /></center><br />
    
</form>
<br />