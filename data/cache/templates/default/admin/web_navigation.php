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
<div id="main_wp" class="mt10">
    <script type="text/JavaScript">
        var rowtypedata = [
            [
                [1,'', 'td2'],
                [1,'<input type="text" name="slide_new_order[]" value="0" size="1"/>', 'td2'], 
                [1, '<input name="slide_new_name[]" value="" type="text" style="width:80px; height:15px;"/>', 'td2'],
                [1, '<input name="slide_new_code[]" value="" type="text" style="width:80px; height:15px;"/>', 'td2'],
                [1, '<input name="slide_new_url[]" value="" type="text" style="width:300px; height:15px;"/>', 'td2'],
                [1,'<select name="slide_new_target[]"style="width:80px;"><option value="_parent">本窗口</option><option value="_blank">新窗口</option></select>','td2'],
                [1,'<input type="checkbox" name="slide_new_avaliable[]" checked value="1"/>','td2']
            ],
            [
                [1,'', 'td2'],
                [1,'<input type="text" name="type_new_order[{1}][]" value="0" size="1"/>', 'td2'], 
                [1, '<i class="lower"></i><input name="type_new_name[{1}][]" value="" type="text" style="width:80px; height:15px;"/>', 'td2'],
                [1, '<input name="type_new_code[{1}][]" value="" type="text" style="width:80px; height:15px;"/>', 'td2'],
                [1, '<input name="type_new_url[{1}][]" value="" type="text" style="width:300px; height:15px;"/>', 'td2'],
                [1,'<select name="type_new_target[{1}][]"style="width:80px;"><option value="_parent">本窗口</option><option value="_blank">新窗口</option></select>','td2'],
                [1,'<input type="checkbox" name="type_new_avaliable[{1}][]" checked value="1"/>','td2']
            ],
        ];
        var addrowdirect = 0;
        function addrow(obj, type) {
            var table = obj.parentNode.parentNode.parentNode;
            if(!addrowdirect) {
                var row = table.insertRow(obj.parentNode.parentNode.rowIndex);
            } else {
                var row = table.insertRow(obj.parentNode.parentNode.rowIndex + 1);
            }
            var typedata = rowtypedata[type];
            for(var i = 0; i <= typedata.length - 1; i++) {
                var cell = row.insertCell(i);
                cell.colSpan = typedata[i][0];
                var tmp = typedata[i][1];
                if(typedata[i][2]) {
                    cell.className = typedata[i][2];
                }
                tmp = tmp.replace(/\{(\d+)\}/g, function($1, $2) {return addrow.arguments[parseInt($2) + 1];});
                cell.innerHTML = tmp;
            }
            addrowdirect = 0;
        }
    </script>
    <form action="admin.php?mod=setting&code=do_navigation" method="post"  name="forminfo" id="forminfo">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="tableborder tl">
        <tr class="header">
            <td colspan="7">顶部导航菜单设置</td>
        </tr>
        <tr class="list_h">
            <td width="5%">删?</td>
            <td width="12%" title="数值大的优先显示">显示顺序</td>
            <td width="25%">导航菜单名称</td>
            <td width="15%">唯一英文名称</td>
            <td>链接地址（站内以index.php开头，站外url以http://开头）</td>
            <td>打开方式</td>
            <td width="5%">可用</td>
        </tr>
<?php if(is_array($slide_list)) { foreach($slide_list as $slide) { ?>
<?php $k=$slide['code']; ?>
<tr>
            <td class="td2"><input type="checkbox" name="chk[]" value="<?php echo $k; ?>" /></td>
            <td class="td2"><input type="text" name="slide[list][<?php echo $k; ?>][order]" value="<?php echo $slide['order']; ?>" size="1" /></td>
            <td class="td2">
                <input type="text" name="slide[list][<?php echo $k; ?>][name]" value="<?php echo $slide['name']; ?>" style="width:80px; height:15px;"/>
            </td>
            <td class="td2">
                <input type="text" name="slide[list][<?php echo $k; ?>][code]" value="<?php echo $slide['code']; ?>" style="width:80px; height:15px;"/>
            </td>
            <td class="td2">
                <input type="text" name="slide[list][<?php echo $k; ?>][url]" value="<?php echo $slide['url']; ?>" style="width:300px; height:15px;"/>
            </td>
            <td class="td2">
                <select name="slide[list][<?php echo $k; ?>][target]" id="slide[list][<?php echo $k; ?>][target]" style="width:80px;">
                    <option value="_parent"  
<?php if($slide['target'] =="_parent") echo "selected=selected"; ?>
 >本窗口</option>
                    <option value="_blank"  
<?php if($slide['target'] =="_blank") echo "selected=selected"; ?>
 >新窗口</option>
                  </select>
            </td>
            <td class="td2"><input type="checkbox" name="slide[list][<?php echo $k; ?>][avaliable]" 
<?php if($slide['avaliable'] == 1) echo "checked"; ?>
 value="1"/></td>
        </tr>
<?php if(is_array($slide['type_list'])) { foreach($slide['type_list'] as $val) { ?>
            <tr>
                <td class="td2"><input type="checkbox" name="chk[]" value="<?php echo $val['code']; ?>" /></td>
                <td class="td2"><input type="text" name="type[list][<?php echo $k; ?>][<?php echo $val['code']; ?>][order]" value="<?php echo $val['order']; ?>" size="1" /></td>
                <td class="td2" align="left">
                    <i class="lower"></i>
                    <input type="text" name="type[list][<?php echo $k; ?>][<?php echo $val['code']; ?>][name]"  style="width:80px; height:15px;" value="<?php echo $val['name']; ?>"/>
                    <input type="hidden" name="type[list][<?php echo $k; ?>][<?php echo $val['code']; ?>][code]" value="<?php echo $val['code']; ?>"/>                    
                </td>
                <td class="td2">
                    <input type="text" name="type[list][<?php echo $k; ?>][<?php echo $val['code']; ?>][code]"  style="width:80px; height:15px;"  value="<?php echo $val['code']; ?>"/>                    
                </td>
                <td class="td2">
                    <input type="text" name="type[list][<?php echo $k; ?>][<?php echo $val['code']; ?>][url]"  style="width:300px; height:15px;"  value="<?php echo $val['url']; ?>"/>                    
                </td>
                <td class="td2">
                    <select name="type[list][<?php echo $k; ?>][<?php echo $val['code']; ?>][target]" style="width:80px;">
                        <option value="_parent"  
<?php if($val['target'] =="_parent") echo "selected=selected"; ?>
 >本窗口</option>
                        <option value="_blank"  
<?php if($val['target'] =="_blank") echo "selected=selected"; ?>
 >新窗口</option>
                     </select>                    
                </td>
                <td class="td2"><input type="checkbox" name="type[list][<?php echo $k; ?>][<?php echo $val['code']; ?>][avaliable]" 
<?php if($val['avaliable'] == 1) echo "checked"; ?>
 value="1"/></td>
            </tr>
<?php } } ?>
<tr>
            <td class="td2"></td>
            <td class="td2"></td>
            <td colspan="6" class="td2">
                <i class="lower_b"></i>
                <a href="javascript:;" onclick="addrow(this, 1, '<?php echo $k; ?>')" class="addtr">二级导航</a>
            </td>
        </tr>
<?php } } ?>
<tr>
            <td colspan="6" class="td2"><a href="javascript:;" onclick="addrow(this, 0)" class="addtr">添加一级导航</a></td>
        </tr>
        <tr>
            <td class="td2"><!-- <input class="checkbox" type="checkbox" id="chkall" name="chkall" onclick="checkall(this.form, 'chk')" ><label for="chkall">删</label> --></td>
            <td colspan="6" class="td2">
                <center><input class="button" type="submit" name="cronssubmit" value="提 交"></center>
            </td>
        <tr>
      </table>
    </form>
</div>