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
function check_province(type)
{
    if(type == 'block')
    {    
        document.getElementById('province').style.display='block';
        document.getElementById('proviect_id').value='<?php echo $people_config['proviect_id']; ?>';
    }
    if(type == 'none')
    {    
        document.getElementById('province').style.display='none';
        document.getElementById('proviect_id').value='0';
    }
}
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
    <td>V认证操作</td>
  </tr>
  <tr class="altbg1">
    <td>
      <ul>
        <li>
          <a href="admin.php?mod=vipintro&type=1">审核通过</a>|
          <a href="admin.php?mod=vipintro">等待审核</a>| 
          <a href="admin.php?mod=vipintro&type=-1">审核未通过</a>| 
          <a href="admin.php?mod=vipintro&code=insert_validate_user">导入老认证用户</a>
        </li>
      </ul>
    </td>
  </tr>
</table>
<form action="<?php echo $query_link; ?>" method="post" >
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
  <table cellspacing="1" cellpadding="4" width="100%" align="center" class="tableborder">
    <tr class="header">
      <td colspan="2">按条件检索</td>
    </tr>
    <tr class="altbg1">
      <td height="30" width="150px">用户名：</td>
      <td height="30">
        <input type="text" name="nickname" value="<?php echo $nickname; ?>"></input>
      </td>
    </tr>
    <tr>
         <td>&nbsp;</td>
      <td>
        <button class="button" type="submit" name="do">提交</button>
      </td>
    </tr>
  </table>
</form>
<?php if($code == 'validate_setting') { ?>
<form id="formInfos" name="formInfos" method="post"  action="admin.php?mod=vipintro&code=validate">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
  <table cellspacing="1" cellpadding="4" width="100%" align="center" class="tableborder">
    <tr class="header">
      <td colspan="2">V认证设置</td>
    </tr>
    <tr class="altbg1">
      <td height="30">上传证件图片：</td>
      <td height="30">
    <input type="radio" name="is_card_pic" value="1" />
    开启
      <input type="radio" name="is_card_pic" value="0" />
    关闭
    <script language='JavaScript' type="text/javascript">autoSelected(document.formInfos.is_card_pic, '<?php echo $validate_config['is_card_pic']; ?>');</script>
</td>
    </tr>
        <tr class="altbg1">
      <td width="12%" height="30">&nbsp;</td>
      <td width="88%" height="30"><button name="do" value='' type="submit" class="button">提交</button></td>
    </tr>
    <tr class="altbg1">
      <td colspan="2">（选择“开启”用户申请认证时必须上传证件图片，选择"关闭"用户可不上传证件图片。）</td>
    </tr>
  </table>
</form>
<?php } ?>
<?php if($code == 'insert_validate_user') { ?>
<table cellspacing="1" cellpadding="4" width="100%" align="center" class="tableborder">
  <tr class="header">
    <td>说明</td>
  </tr>
  <tr class="altbg1">
    <td>
    由于启用新的认证系统,增加了认证分类。 老的认证用户没有记录到新的认证记录表中因此不会显示。<br />
    可手动导入老的认证用户，为老的认证用户选择新的分类。
    </td>
  </tr>
</table>
<form id="form" name="form" method="post"  action="admin.php?mod=vipintro&code=insert_validate_user">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tableborder">
 <tr class="header">
      <td width="9%" height="27"><input class="checkbox" type="checkbox" name="chkall" onclick="checkall(this.form,'uids')" >全选</td>
      <td width="11%" height="27"><strong>用户</strong></td>
      <td width="80%" height="27">&nbsp;</td>
    </tr>
<?php if(is_array($member_list)) { foreach($member_list as $val) { ?>
    <tr align="center">
        <td height="30" align="left" class="altbg1" style="border-bottom:1px dotted #EDEDED">
          <input name="uids[]" type="checkbox" id="uids[]" value="<?php echo $val['uid']; ?>"/>
        </td>
        <td height="30" colspan="2" align="left" class="altbg1" style="border-bottom:1px dotted #EDEDED"><a href="index.php?mod=<?php echo $val['uid']; ?>" target="_blank"><?php echo $val['nickname']; ?></a></td>
       </tr>
<?php } } ?>
     <tr>
          <td width="9%" bgcolor="#F8F8F8">V认证类别：<br /></td>
          <td width="11%" bgcolor="#F8F8F8">
          <div id="category_list" style="width:100px;">
          <select name="category_fid" id="category_fid" style="width:100px;" onchange="check_category(this.value);">
          <option value="0" selected="selected">选择类别</option>
<?php if(is_array($category_list)) { foreach($category_list as $val) { ?>
            <option value="<?php echo $val['id']; ?>"><?php echo $val['category_name']; ?></option>
<?php } } ?>
          </select>
           <script language='JavaScript' type="text/javascript">autoSelected(document.frmInfo.category_fid, '<?php echo $category_info['category_fid']; ?>');</script>
          </div>          </td>
          <td width="80%" bgcolor="#F8F8F8">
          <div id="subclass_list" style="width:100px; height:30px;">
          <select name="category_id" id="category_id" style="width:100px;" >
<?php if(is_array($subclass_list)) { foreach($subclass_list as $val) { ?>
            <option value="<?php echo $val['id']; ?>"><?php echo $val['category_name']; ?></option>
<?php } } ?>
          </select>
          <script language='JavaScript' type="text/javascript">autoSelected(document.frmInfo.category_id, '<?php echo $category_info['category_id']; ?>');</script>
          </div>          </td>
        </tr>
<?php if($page_html) { ?>
    <tr>
      <td height="30" colspan="3" class="altbg1"><?php echo $page_html; ?></td>
    </tr>
<?php } ?>
    <tr align="center">
        <td height="30" colspan="3" class="altbg1">
        <button name="do" value='' type="submit" class="button">提交</button>
        <input name="postFlag" type="hidden" id="postFlag" value="1" /></td>
    </tr>
    </table>
</form>
<?php } ?>
<?php if($code == 'people_setting') { ?>
<form id="frmInfo" name="frmInfo" method="post"  action="admin.php?mod=vipintro&code=people">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
<table cellspacing="1" cellpadding="4" width="100%" align="center" class="tableborder">
    <tr class="header">
        <td height="30" colspan="3">名人堂设置</td>
    </tr>
    <tr class="altbg1">
      <td height="30" align="left">名人堂首页推荐用户：</td>
      <td height="30"><input name="people_user_limit" type="text" id="people_user_limit" value="<?php echo $people_config['people_user_limit']; ?>" />
      / 个</td>
      <td height="30">推荐用户显示数。</td>
    </tr>
    <tr class="altbg1">
      <td height="30" align="left">用户排序方式：</td>
      <td width="35%" height="30">
      <select name="people_user_orderby" id="people_user_orderby">
        <option value="topic_count">微博数最多</option>
        <option value="fans_count">粉丝最多</option>
      </select>      
      <script language='JavaScript' type="text/javascript">autoSelected(document.frmInfo.people_user_orderby, '<?php echo $people_config['people_user_orderby']; ?>');</script>
      </td>
      <td width="53%">用于“名人堂<strong>首页</strong>推荐用户”按照什么排序方式来显示。</td>
    </tr>
    <tr class="altbg1">
      <td height="30" align="left">首页微博：</td>
      <td height="30"><input name="people_topic_limit" type="text" id="people_topic_limit" value="<?php echo $people_config['people_topic_limit']; ?>"/>
      / 条</td>
      <td height="30">显示推荐用户的微博条数。</td>
    </tr>
    <tr class="altbg1">
      <td height="1" align="left">&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr class="altbg1">
      <td height="30" align="left">地区分类推荐用户：</td>
      <td height="30"><input name="proviect_user_limit" type="text" id="proviect_user_limit" value="<?php echo $people_config['proviect_user_limit']; ?>" />
      / 个</td>
      <td height="30">推荐用户显示数。</td>
    </tr>
    <tr class="altbg1">
      <td height="30" align="left">用户排序方式</td>
      <td height="30">
          <select name="proviect_user_orderby" id="proviect_user_orderby">
        <option value="topic_count">微博数最多</option>
        <option value="fans_count">粉丝最多</option>
        </select>      
        <script language='JavaScript' type="text/javascript">autoSelected(document.frmInfo.proviect_user_orderby, '<?php echo $people_config['proviect_user_orderby']; ?>');</script>
      </td>
      <td height="30">用于“名人堂<strong>地区分类</strong>推荐用户”按照什么排序方式来显示。</td>
    </tr>    
    <tr class="altbg1">
      <td height="1" align="left">&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
<tr class="header">
        <td height="30" colspan="3">地区分类导航设置 </td>
    </tr>
      <tr class="altbg1">
        <td width="12%" height="30" align="left">区域类别：        </td>
      <td height="30" colspan="2">
      <input type="radio" name="proviect_type" value="1"  onclick="check_province('none');"/>
          全部区域
       <input type="radio" name="proviect_type" value="2" onclick="check_province('block');"/>
        指定区域
        <script language='JavaScript' type="text/javascript">autoSelected(document.frmInfo.proviect_type, '<?php echo $people_config['proviect_type']; ?>');</script>      </td>
    </tr>
<?php if($people_config['proviect_id']) $display = 'block'; else $display = 'none'; ?>
<tr class="altbg1" id="province" style="display:<?php echo $display; ?>;">
      <td height="30" align="left">选择区域：</td>
      <td height="30" colspan="2">
      <select name="proviect_id" id="proviect_id">
      <option value="0" selected="selected">请选择</option>
<?php if(is_array($proviect_ary)) { foreach($proviect_ary as $val) { ?>
        <option value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>
<?php } } ?>
  </select>      
      <script language='JavaScript' type="text/javascript">autoSelected(document.frmInfo.proviect_id, '<?php echo $people_config['proviect_id']; ?>');</script>      </td>
    </tr>
  <tr class="altbg1">
      <td colspan="3">（选择“全部区域”名人堂中地区分类则显示所有省份作为类别）<br />
（选择“指定区域”名人堂中地区分类则显示选择区域的城市作为类别）</td>
  </tr>
      <tr class="altbg1">
      <td height="30">&nbsp;</td>
      <td height="30">&nbsp;</td>
      <td height="30"><button name="do" value='' type="submit" class="button">提交</button></td>
      </tr>
</table>
</form>
<?php } ?>
<?php if($act == 'vipintro') { ?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tableborder">
<?php if($categoryname) { ?>
    <tr class="header">
        <td width="32%" height="30"><strong><a href="admin.php?mod=vipintro&code=categorylist">认证分类</a> -- <?php echo $categoryname; ?> -- 用户列表</strong></td>
      <td width="16%" height="30">&nbsp;</td>
      <td width="36%" height="30">&nbsp;</td>
      <td width="8%" height="30" align="center">&nbsp;</td>
        <td width="8%" height="30" align="center">&nbsp;</td>
    </tr>
<?php } ?>
</table>
<form id="form" name="form" method="post"  action="admin.php?mod=vipintro&code=tuijian">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tableborder">
 <tr class="header">
        <td width="8%" height="30"><input class="checkbox" type="checkbox" name="chkall" onclick="checkall(this.form,'uids')" >全选</td>
      <td width="13%" height="30"><strong>申请用户</strong></td>
      <td width="14%" height="30">审核状态</td>
      <td height="30" align="left">申请时间</td>
        <td align="center">名人堂推荐</td>
        <td height="30" align="center">管理</td>
    </tr>
<?php if(is_array($category_list)) { foreach($category_list as $val) { ?>
    <tr align="center">
        <td height="30" align="left" class="altbg1" style="border-bottom:1px dotted #EDEDED">
          <input name="uids[]" type="checkbox" id="uids[]" value="<?php echo $val['uid']; ?>" <?php echo $val['readonly']; ?>/>
          <input name="category_fid[]" type="hidden" id="category_fid[]" value="<?php echo $val['category_fid']; ?>" />
          <input name="category_id[]" type="hidden" id="category_id[]" value="<?php echo $val['category_id']; ?>" />
        </td>
        <td height="30" align="left" class="altbg1" style="border-bottom:1px dotted #EDEDED"><a href="index.php?mod=<?php echo $val['uid']; ?>" target="_blank"><?php echo $val['nickname']; ?></a></td>
          <td height="30" align="left" class="altbg1" style="border-bottom:1px dotted #EDEDED"><?php echo $val['audit_show']; ?></td>
        <td width="19%" height="30" align="left" class="altbg1" style="border-bottom:1px dotted #EDEDED"><?php echo $val['dateline']; ?></td>
        <td height="30" align="center" class="altbg1" style="border-bottom:1px dotted #EDEDED">
<?php if($val['is_push'] == 1) { ?>
        名人堂首页-推荐<?php } elseif($val['is_push'] == 2) { ?>地区分类页-推荐
<?php } else { ?>未推荐
<?php } ?>
</td>
        <td width="8%" height="30" align="center" class="altbg1" style="border-bottom:1px dotted #EDEDED"><a href="admin.php?mod=vipintro&code=modify&ids=<?php echo $val['id']; ?>">编辑</a></td>
    </tr>
<?php } } ?>
<?php if($page_arr['html']) { ?>
    <tr align="center">
        <td height="30" colspan="6" class="altbg1">
        <?php echo $page_arr['html']; ?></td>
    </tr>
<?php } ?>
    <tr align="center">
      <td height="30" colspan="6" class="altbg1">
<?php if($type == 1) { ?>
        <label><input name="type" type="radio" value="people" /><span class="altbg1" style="border-bottom:1px dotted #EDEDED">名人堂首页-推荐</span></label>
        <label><input name="type" type="radio" value="city_people" /><span class="altbg1" style="border-bottom:1px dotted #EDEDED">地区分类页-推荐</span></label>
        <label><input type="radio" name="type" value="del" />取消推荐</label>
<?php } ?>
        <label><input type="radio" name="type" value="deluser" />取消认证</label>
      </td>
    </tr>
    <tr align="center">
      <td height="30" colspan="6" class="altbg1"><center><button name="do" value='' type="submit" class="button">提交</button></center></td>
    </tr>
  </table>
</form>
<?php } ?>