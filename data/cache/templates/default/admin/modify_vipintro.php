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
<script>
//
function check_category(category_id)
{
    var category_id = 'undefined' == typeof(category_id) ? 0 : category_id;
    if(category_id == 0){
        var html = "<select name='category_id' id='category_id' style='width:100px;' notnull='true' ></select>";
        document.getElementById('subclass_list').innerHTML=html;
        return false;
    }
    var myAjax = $.post(
        "admin.php?mod=vipintro&code=check_category",
        {
            category_id:category_id
        },
        function (d)
        {
              document.getElementById('subclass_list').innerHTML=d;
        }
    );
}
function check_audit(audit)
{
    if(audit == 1 )
    {
//        document.getElementById('audit_list').style.display='none';
//        document.getElementById('audit_list2').style.display='none';
//        document.getElementById('audit_list3').style.display='block';
        $("#audit_list").hidden();$("#audit_list2").hidden();$("#audit_list3").show();
    }
    if(audit != 1)
    {
//        document.getElementById('audit_list').style.display='block';
//        document.getElementById('audit_list2').style.display='block';
//        document.getElementById('audit_list3').style.display='none';
        $("#audit_list").show();$("#audit_list2").show();$("#audit_list3").none();
    }
}
</script>
<script type="text/javascript">
    $(document).ready(function(){
        check_audit(<?php echo $category_info['is_audit']; ?>);
     });
</script>
<script language="javascript">
function autoSelected(obj, defVal)
{
    if(!obj) return;
    if((typeof defVal).toLowerCase() != 'object')
    {
        var tmp = defVal;
        defVal = new Array();
        defVal[0] = tmp;
    }
    if(obj.tagName)
    {
        switch(obj.tagName.toLowerCase())
        {
            case 'select':
                    for(var i = 0; i < obj.length; i++)
                    {
                        if(in_array(obj.options[i].value, defVal))
                        {
                            obj.options[i].selected = true;
                        }
                    }
            case 'input':
                    if(obj.type.toLowerCase() == 'checkbox' || obj.type.toLowerCase() == 'radio')
                    {
                        if(in_array(obj.value, defVal))
                        {
                            obj.checked = true;
                        }
                    }
                    break;
        }
    }
    else
    {
        for(var i = 0; i < obj.length; i++)
        {
            if(obj[i].tagName.toLowerCase() == 'select')
            {
                for(var j = 0; j < obj[i].length; j++)
                {
                    if(in_array(obj[i].options[j].value, defVal))
                    {
                        obj[i].options[j].selected = true;
                    }
                }
            }
            else if(obj[i].tagName.toLowerCase() == 'input')
            {
                if(in_array(obj[i].value, defVal))
                {
                    obj[i].checked = true;
                }
            }
        }
    }
}
</script>
<table cellspacing="1" cellpadding="4" width="100%" align="center" class="tableborder">
    <tr class="header">
        <td>技巧提示</td>
    </tr>
    <tr class="altbg11">
        <td>
        输入昵称，选择开启或关闭V认证，填写V认证内容，提交即可。
      </td>
    </tr>
</table>
<form action="admin.php?mod=vipintro&amp;code=domodify" method="post"  enctype="multipart/form-data" name="frmInfo" id="frmInfo">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
  <table cellspacing="1" cellpadding="4" width="100%" align="center">
       <tr class="header">
          <td height="30" colspan="3">用户V认证信息</td>
        </tr>
        <tr>
          <td height="30" class="altbg11">用户头像:</td>
          <td height="30" colspan="2">
          <a href="index.php?mod=<?php echo $member['uid']; ?>" target="_blank"><img height='60' width='60' src="<?php echo $member['face']; ?>"></img></a></td>
        </tr>
        <tr>
          <td height="30" class="altbg11">用户昵称:</td>
          <td height="30" colspan="2">
          <a href="index.php?mod=<?php echo $member['uid']; ?>" target="_blank"><?php echo $member['nickname']; ?></a></td>
        </tr>
        <tr>
          <td height="30" class="altbg11">所在地区：</td>
          <td height="30" colspan="2"><?php echo $member_province; ?> -- <?php echo $member_city; ?> </td>
        </tr>
        <tr>
          <td height="30" class="altbg11"> 真实姓名：</td>
          <td height="30" colspan="2"><input name="validate_true_name" type="text" id="validate_true_name" value="<?php echo $memberfields['validate_true_name']; ?>" /></td>
        </tr>
        <tr>
          <td height="30" class="altbg11">证件类型：</td>
          <td height="30" colspan="2"><?php echo $validate_card_type_select; ?> </td>
        </tr>
        <tr>
          <td height="30" class="altbg11">证件号码：</td>
          <td height="30" colspan="2"><input name="validate_card_id" type="text" id="validate_card_id" value="<?php echo $memberfields['validate_card_id']; ?>" style="width:300px;" /></td>
        </tr>
        <tr>
          <td width="17%" class="altbg11">认证类别：<br /></td>
          <td>
            <div id="category_list" style="width:100px;">
              <select name="category_fid" id="category_fid" style="width:100px; float:left" onchange="check_category(this.value);">
<?php if(1 != $category_info['is_audit']) { ?>
                <option value="">请选择</option>
<?php } ?>
<?php if(is_array($category_list)) { foreach($category_list as $val) { ?>
                <option value="<?php echo $val['id']; ?>"><?php echo $val['category_name']; ?></option>
<?php } } ?>
              </select>
              <script language='JavaScript' type="text/javascript">autoSelected(document.frmInfo.category_fid, '<?php echo $category_info['category_fid']; ?>');</script>
            </div>
          </td>
          <td width="75%">
            <div id="subclass_list" style="width:100px; float:left;">
              <select name="category_id" id="category_id" style="width:100px;" >
<?php if(is_array($subclass_list)) { foreach($subclass_list as $val) { ?>
                <option value="<?php echo $val['id']; ?>"><?php echo $val['category_name']; ?></option>
<?php } } ?>
              </select>
              <script language='JavaScript' type="text/javascript">autoSelected(document.frmInfo.category_id, '<?php echo $category_info['category_id']; ?>');</script>
            </div>
          </td>
        </tr>
           <tr>
          <td height="30" class="altbg11">认证内容：<br /></td>
          <td height="30" colspan="2">
          <textarea name="validate_info" id="validate_info" cols="45" rows="5"><?php echo $memberfields['validate_remark']; ?></textarea>
          <br>（会在用户V认证图标和个人微博页面显示）</td>
        </tr>
           <tr>
             <td height="30" class="altbg11">证件图片：</td>
             <td height="30" colspan="2" class="altbg11">
<?php if($memberfields['validate_card_pic']) { ?>
             <a href="<?php echo $memberfields['validate_card_pic']; ?>" target="_blank">已上传 - 点此查看</a>
<?php } else { ?> 未上传
<?php } ?>
 </td>
           </tr>
        <tbody>
            <!--       
               <tr>
            <td width="26%" class="altbg11"><strong>V身份认证:</strong><br />
            选择是，用户头像右侧会显示一个“V”型图标</td>
            <td width="74%" bgcolor="#FFFFFF">
               <input name="validate" id="validate_1" type="radio" value="1" checked="checked" />
                是
                <input name="validate" id="validate_0" type="radio" value="0" />
           否</td>
          </tr>-->
        </tbody>
      </table>
      <table cellspacing="1" cellpadding="4" width="100%" align="center">
          <tr class="header">
          <td height="30" colspan="3">V认证操作<br /></td>
        </tr>
        <tr>
          <td height="30" class="altbg11">审核状态：</td>
          <td height="30" colspan="2">
            <label>
              <input type="radio" name="is_audit" id="is_audit" value="-1" onclick="check_audit('-1');" />
              <font color="#FF0000">审核-未通过</font>
            </label>
            <label>
              <input type="radio" name="is_audit" id="radio4" value="1" onclick="check_audit('1');"/>
              <font color="#339966">通过审核</font>
            </label>
            <script language='JavaScript' type="text/javascript">autoSelected(document.frmInfo.is_audit, '<?php echo $category_info['is_audit']; ?>');</script>
          </td> 
        </tr>
        <tr id="audit_list">
          <td height="30" class="altbg11">拒绝理由：</td>
          <td height="30" colspan="2"><textarea name="to_message" id="to_message" cols="45" rows="5"><?php echo $category_info['audit_info']; ?></textarea>
            <br />
            （审核未通过时请填写&ldquo;拒绝理由&rdquo;。）</td>
        </tr>
        <tr id="audit_list2">
          <td height="30" class="altbg11">私信通知：<br /></td>
          <td height="30" colspan="2"><input name="is_pm_notice" type="checkbox" id="is_pm_notice" value="1" checked/>（勾选后，将&ldquo;拒绝理由&rdquo;通过私信告知对方。）</td>
        </tr>
        <tr id="audit_list3">
          <td height="30" class="altbg11">专题权限：<br /></td>
          <td height="30" colspan="2">
            <input name="member_extra[remark]" type="checkbox" id="member_extra" value="remark" />
            简介 
            <script language='JavaScript' type="text/javascript">autoSelected(document.frmInfo.member_extra, '<?php echo $meb_fields['remark']; ?>');</script>
            <input name="member_extra[cement]" type="checkbox" id="member_extra" value="cement" />
            公告栏 
            <script language='JavaScript' type="text/javascript">autoSelected(document.frmInfo.member_extra, '<?php echo $meb_fields['cement']; ?>');</script>
            <input name="member_extra[vote]" type="checkbox" id="member_extra" value="vote" />
            投票展示
            <script language='JavaScript' type="text/javascript">autoSelected(document.frmInfo.member_extra, '<?php echo $meb_fields['vote']; ?>');</script>
            <input name="member_extra[video]" type="checkbox" id="member_extra" value="video" />
            视频展示
            <script language='JavaScript' type="text/javascript">autoSelected(document.frmInfo.member_extra, '<?php echo $meb_fields['video']; ?>');</script>
            <input name="member_extra[link]" type="checkbox" id="member_extra" value="link" />
            友情链接
            <script language='JavaScript' type="text/javascript">autoSelected(document.frmInfo.member_extra, '<?php echo $meb_fields['link']; ?>');</script><br>
            （勾选后，该用户将在个人资料设置页面中可进行专题内容设置，并展示在个人微博首页。）
          </td>
        </tr>
        <tbody>
          <tr>
            <td colspan="3">
              <center>
              <button name="do" value='' type="submit" class="button">确定提交</button>
              <button class="button" type="button" onclick="window.location.href='admin.php?mod=vipintro';return false;">返回</button>
              <input name="uid" type="hidden" id="uid" value="<?php echo $member['uid']; ?>" />
              <input name="nickname" type="hidden" id="nickname" value="<?php echo $member['nickname']; ?>" />
              <input name="ids" type="hidden" id="ids" value="<?php echo $ids; ?>" />
              </center>
            </td>
          </tr>
        </tbody>
  </table>
</form>