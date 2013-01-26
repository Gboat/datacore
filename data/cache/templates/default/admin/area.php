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
<div class="nav3">
  <ul class="cc">
    <li class="current">
      <a href="admin.php?mod=city">省份管理</a>
    </li>
    <li>
      <a href="admin.php?mod=city&code=city">城市管理</a>
    </li>
    <li>
      <a href="admin.php?mod=city&code=zone">区域管理</a>
    </li>
	<li>
	  <a href="admin.php?mod=city&code=street">地段管理</a>
	</li>
  </ul>
</div>

<div class="mt10">
<form name="form1" method="post"  action="admin.php?mod=city&code=addarea">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
  <table width=98% cellspacing=1 cellpadding=3 class="tableorder">
  
<?php if($id) { ?>
    <tr class="header"> 
      <td colspan=2>修改省份</td>
    </tr>
    <tr>
  	  <td class="altbg1">名称</td>
  	  <td class="altbg2"><input type="text" id="area" name="area" value="<?php echo $province; ?>"></td>
    </tr>
  
<?php } else { ?>    <tr class="header"> 
      <td colspan=2>创建省份</td>
    </tr>
    <tr>
  	  <td class="altbg1">名称</td>
  	  <td class="altbg2"><textarea id="area" name="area" rows="5" cols="40"></textarea><font color="red">注:</font>如要同时添加多个地名,每个省份换一行.</td>
    </tr>
  
<?php } ?>
    <tr>
      <td>
        <input type="submit" name="submit22" value="确定" class="button">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
      </td>
    </tr>
  </table>
</form>
<br>
<form name="form2" method="post"  action="admin.php?mod=city&code=areaorder">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
  <table width="98%" border="0" cellspacing="0" cellpadding="0" class="tableorder">
    <tr align="center" class="header"> 
      <td width="40%">名称</td>
      <td width="30%">排序</td>
      <td width="30%">操作</td>
    </tr>
    
<?php if(is_array($rs)) { foreach($rs as $key => $val) { ?>
    <tr> 
      <td class="altbg1" style="border-bottom:1px dotted #EDEDED"><a href="admin.php?mod=city&code=city&area=<?php echo $val['id']; ?>"><?php echo $val['name']; ?></a></td>
      <td class="altbg1" style="border-bottom:1px dotted #EDEDED"><input type='text' name='order[<?php echo $val['id']; ?>]' value='<?php echo $val['list']; ?>' size='5'/></td>
      <td class="altbg1" style="border-bottom:1px dotted #EDEDED">
        <a href="admin.php?mod=city&id=<?php echo $val['id']; ?>">编辑</a>
        <span>&nbsp;|&nbsp;</span>
        <a href="admin.php?mod=city&code=delarea&fid=<?php echo $val['id']; ?>" onclick="return confirm('将一并删除该省份下的所有市、区、街道信息，你确实要删除吗?不可恢复');">删除</a>
      </td>
    </tr>
    
<?php } } ?>
    <tr>
      <td><input type="submit" name="submit11" value="修改排序" class="button"></td>
    </tr>
  </table>
</form>
</div>