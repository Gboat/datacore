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


<table width="100%" border="0" cellpadding="0" cellspacing="0"
	class="tableborder">
	<tr class="header">
		<td>相关说明</td>
	</tr>
	<tr>
		<td>
		<ul>
				<li>功能说明：微博评论模块，其支持将微博的发布框通过一段JS代码放到任何网页中，该模块能自动区分来自不同页面所发的微博并自动展示到所在网页，是记事狗首创的社会化评论模块；</li>
				<li><font color=red>用途说明：微博评论模块可替代CMS等系统的评论功能，用户评论时可选同时转发到微博，从而实现将资讯等内容传播到微博系统中，进而打通整个网站的信息流</font>；</li>
				<li>使用说明：不同的网页、系统可共用一段微博评论模块JS代码（系统会自动区分），并且可限定所使用的网站域名，或者设置评论框中默认显示#话题#；</li>
		</ul>
		</td>
	</tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0"
	class="tableborder">
	<tr class="header">
		<td width="30%">调用名称（调用次数）</td>
		<td width="50%">调用代码</td>
		<td>其他操作</td>
	</tr>
<?php if($output_list) { ?>
<?php if(is_array($output_list)) { foreach($output_list as $val) { ?>
<?php $_tr_class = ++$_tr_count % 2 ? "altbg2" : "altbg1"; ?>
<tr class="<?php echo $_tr_class; ?>" valign="top" align="center">
		<td align="left"><?php echo $val['id']; ?>、<?php echo $val['name']; ?>（<?php echo $val['open_times']; ?>）<br>创建时间：
<?php echo my_date_format($val['dateline']); ?>
</td>
		<td align="left"><textarea name="textarea" rows="3"
			style="width: 90%"><?php echo $val['output_code']; ?></textarea></td>
		<td><a href="admin.php?mod=output&code=modify&id=<?php echo $val['id']; ?>">编辑</a>&nbsp;
		<a href="admin.php?mod=output&code=delete&id=<?php echo $val['id']; ?>"
			onclick="return confirm('删除后的内容不可恢复，确认删除？');">删除</a></td>
	</tr>
	
<?php } } ?>
<?php } else { ?><tr class="altbg1">
		<td align="center" colspan=3>暂无站外评论调用，第一次使用请点此"添加微博评论模块"</button>
		</td>
	</tr>
	
<?php } ?>

<?php if($page_arr['html']) { ?>
	<tr align="center">
		<td colspan="3" class="altbg1"><?php echo $page_arr['html']; ?></td>
	</tr>
	
<?php } ?>
<tr>
		<td colspan="3">
		<button class="button" type="button"
			onclick="window.location.href='admin.php?mod=output&code=add';return false;">添加微博评论模块调用</button>
		</td>
	</tr>
</table>