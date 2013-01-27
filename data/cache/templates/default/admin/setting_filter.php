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
<form method="post"  action="admin.php?mod=setting&code=domodify_filter">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tableborder">
    <tr class="header">
        <td colspan="2">内容过滤设置</td>
    </tr>        
    <tr>
        <td><b>查询已有关键词</b><br>
          <span class="smalltext">查询结果将会显示在对应关键词库的右侧</span>
        </td>
        <td>
          <input type="text" id="keyword" name="keyword" size="20">
          <input class="button" type="submit" name="cronssubmit" value="查询" onclick="searchKeyWord($('#keyword').val());return false;">
        </td>
    </tr>
    <tr class="altbg1">
        <td><b>启用过滤功能</b><br>
            <span class="smalltext">选择“是”会对提交的内容、个人签名等进行过滤；<br>词语过多时有一定的效率影响。 </span></td>
        <td>    <?php echo $enable_radio; ?>    <BR>
        </td>
    </tr>            
    <tr class="altbg2">
        <td><b>隐藏被过滤的关键词？</b><br>
            <span class="smalltext">
            选择“是”将隐藏具体哪个词语有问题，避免用户跳过；<br />
            选择“否”告知具体哪个词语被过滤，方便用户改正。
            </span></td>
        <td>    <?php echo $keyword_disable_radio; ?>    <BR>
        </td>
    </tr>
    <tr class="altbg1">
        <td><b>设置违法关键词</b><br>
            <span class="smalltext">包含下面设置的关键词时，将禁止提交发布
            <br>(关键词一行一个，或用 "|" 隔开)</span></td>
        <td class="altbg1">
            <textarea cols="30" rows="6" name="filter[keywords]"><?php echo $filter['keywords']; ?></textarea>
            <span id="keyword_f" style="color:red" class="fiter"></span>
        </td>
    </tr>            
    <tr class="altbg2">
        <td><b>设置审核关键词</b><br>
            <span class="smalltext">包含下面设置的关键词时，将审核提交内容
            <br>(关键词一行一个，或用 "|" 隔开)</span></td>
        <td>
            <textarea cols="30" rows="6" name="filter[verifys]"><?php echo $filter['verifys']; ?></textarea>
            <span id="verify_f" style="color:red" class="fiter"></span>
        </td>
    </tr>
    <tr class="altbg1">
        <td><b>设置替换关键词</b><br>
            <span class="smalltext">包含下面设置的关键词时，将替换提交内容
            <br>(关键词一行一个，或用 "|" 隔开)
            <br>如：需要替换的内容=***</span></td>
        <td>
            <textarea cols="30" rows="6" name="filter[replaces]"><?php echo $filter['replaces']; ?></textarea>
            <span id="replace_f" style="color:red" class="fiter"></span>
        </td>
    </tr>
    <tr class="altbg2">
        <td><b>设置屏蔽关键词</b><br>
            <span class="smalltext">包含下面设置的关键词时，在前台搜索不到内容
            <br>(关键词一行一个，或用 "|" 隔开)</span></td>
        <td>
            <textarea cols="30" rows="6" name="filter[shield]"><?php echo $filter['shield']; ?></textarea>
            <span id="shield_f" style="color:red" class="fiter"></span>
        </td>
    </tr>
</table>
    <br>
    <center><input class="button" type="submit" name="cronssubmit" value="提 交"></center>
</form>
<script type="text/javascript">
  function searchKeyWord(keyword){
    if(keyword == ''){
        show_message('输入你想要检索的关键字',2);
        return false;
    }
    $.post(
        'ajax.php?mod=class&code=keyword',
        {keyword:keyword},
        function(d){
          if(d.done == false){
            show_message(d.msg);
          }else{
            $('#keyword_f').html(d.retval.keyword_f);
            $('#verify_f').html(d.retval.verify_f);
            $('#replace_f').html(d.retval.replace_f);
            $('#shield_f').html(d.retval.shield_f);
            window.scroll(0,350);
          }
        },'json'
    )
  }
</script>