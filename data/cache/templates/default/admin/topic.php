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
<script src="templates/default/./js/date/WdatePicker.js?v=build+20120428" type="text/javascript"></script>
<script src="templates/default/./js/topicManage.js?v=build+20120428" type="text/javascript"></script>
<div class="mt10">
    <form action="admin.php" method="get" name="search">
    <table cellspacing="1" cellpadding="4" width="100%" align="center" class="tableborder">
        <tr class="header">
            <td colspan="4">搜索微博</td>
        </tr>
        <tr>
            <td class="altbg1" width="80">
            关键词语:
            </td>
            <td class="altbg2">
            <input type="text" name="keyword" value="<?php echo $keyword; ?>" size="30">        
            </td>
            <td class="altbg1">
            微博ID:
            </td>
            <td class="altbg2">
            <input name="tid" type="text" id="tid" value="<?php echo $tid; ?>" size="30">多个ID用空格隔开
            </td>
        </tr>
        <tr>
            <!-- <td class="altbg1">
            用户:
            </td>
            <td class="altbg2">
            <input name="username" type="text" id="username" value="<?php echo $username; ?>" size="30">        
            </td> -->
            <td class="altbg1">
            用户昵称:
            </td>
            <td class="altbg2">
            <input name="nickname" type="text" id="nickname" value="<?php echo $nickname; ?>" size="30">        
            </td>
            <td class="altbg1">管理状态：</td>
            <td class="altbg2">
              <select name="mtype">
                <option value="">请选择...</option>
                <option value="0" <?php echo $mtype_arr['0']; ?>>未处理</option>
                <option value="1" <?php echo $mtype_arr['1']; ?>>已处理</option>
                <option value="2" <?php echo $mtype_arr['2']; ?>>禁止互动</option>
              </select>
            </td>
        </tr>
        <tr>
            <td class="altbg1">
            发布时间:
            </td>
            <td class="altbg2">
                <input type="text" id="timefrom" name="timefrom" value="<?php echo $timefrom; ?>" readonly onFocus="WdatePicker({startDate:'%y-%M-%d 00:00:00',dateFmt:'yyyy-MM-dd HH:mm',alwaysUseStartDate:true})"/>
              &nbsp;&nbsp;至&nbsp;&nbsp;
              <input type="text" id="timeto" name="timeto" value="<?php echo $timeto; ?>" readonly onFocus="var fromt=document.getElementById('timefrom').value;WdatePicker({startDate:'%y-%M-%d 00:00:00',dateFmt:'yyyy-MM-dd HH:mm',alwaysUseStartDate:true,minDate:fromt})"/>
            </td>
            <td class="altbg1">内容类型：</td>
            <td class="altbg2">
              <select name="type">
                <option value="">请选择...</option>
                <option value="first" <?php echo $type_arr['first']; ?>>首发</option>
                <option value="forward" <?php echo $type_arr['forward']; ?>>转发</option>
                <option value="reply" <?php echo $type_arr['reply']; ?>>评论</option>
              </select>
            </td>
        </tr>
        <tr>
            <td class="altbg1" width="80">&nbsp;
            </td>
            <td class="altbg2">
            <button name="do" value='' type="submit" class="button">搜索指定</button>
            &nbsp;
            <button class="button" type="button" onclick="window.location.href='admin.php?mod=topic&code=<?php echo $this->Code; ?>';return false;">查看全部微博</button>
            <input type="hidden" id="code" name="code" value="<?php echo $this->Code; ?>">
            <input name="mod" type="hidden" value="topic">
            <input name="per_page_num" type="hidden" value="<?php echo $per_page_num; ?>">
            </td>
            <td class="altbg2"></td>
            <td class="altbg2"></td>
        </tr>
    </table>
    </form>
      <form name="manageform" method="post"  action="<?php echo $action; ?>">
<input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/>
    <div class="Ptitle">
          <span>批量预选处理结果：</span>
          <label><input type="radio" id="show" name="acttype" onclick="setactall(this.form,1);" title="允许微博正常显示">显示</label>
          <label><input type="radio" id="stop" name="acttype" onclick="setactall(this.form,2);" title="允许显示，但禁止评论和转发">禁止</label>
          <label><input type="radio" id="si" name="acttype" onclick="setactall(this.form,3);" title="把微博放到待审核中">待审</label>
          <label><input type="radio" id="del" name="acttype" onclick="setactall(this.form,4);" title="把微博删除到回收站">删除</label>
    </div>
<script type="text/javascript">
function setactall(form,type){
    for(var i = 0; i < form.elements.length; i++) {
        var e = form.elements[i];
        if(e.name.match('managetype') && e.value == type) {
            e.checked = ' checked ';
        }
    }
}
</script>
      <div class="PcomBox">
        <ul class="followList" style="overflow:hidden">
<?php if(is_array($topic_list)) { foreach($topic_list as $key => $topic) { ?>
        <li>
          <div class="fBox_l" style="margin-top:13px"><img src="<?php echo $topic['face']; ?>"/> </div>
          <div class="fBox_R3">
            <p class="utitle2">
             <span>
               <a href="index.php?mod=<?php echo $topic['uid']; ?>" target="_blank"><b><?php echo $topic['nickname']; ?></b></a>&nbsp;&nbsp;
               <a href="admin.php?mod=topic&amp;code=modifylist&amp;tid=<?php echo $topic['tid']; ?>">[编辑]</a>&nbsp;&nbsp;
               <A href="javascript:void(0);" onclick="sendemailtoleader('<?php echo $topic['uid']; ?>','<?php echo $topic['tid']; ?>','topic');" title="给领导发邮件">[上报]</A>&nbsp;&nbsp;
               <A href="javascript:void(0);" onclick="force_out('<?php echo $topic['uid']; ?>');" title="禁言或者禁止登录，可在用户管理中解封">[封杀此用户]</A>
             </span>
             <span style="float: right"><?php echo my_date_format($topic['lastupdate'],'Y-m-d H:i:s'); ?></span>
             </p>
             <span>
               <a href="index.php?mod=topic&code=<?php echo $key; ?>" target="_blank"><?php echo $topic['content']; ?></a>
<?php if($topic['attachid'] && $topic['attach_list']) { ?>
<?php if(is_array($topic['attach_list'])) { foreach($topic['attach_list'] as $iv) { ?>
                    <img src="<?php echo $iv['attach_img']; ?>" width="32" border="0"/><a href="<?php echo $iv['attach_file']; ?>" target="_blank"><?php echo $iv['attach_name']; ?></a>(<?php echo $iv['attach_score']; ?>分)
<?php } } ?>
<?php } ?>
<?php if($topic['imageid'] && $topic['image_list']) { ?>
<?php if(is_array($topic['image_list'])) { foreach($topic['image_list'] as $iv) { ?>
                    <a href="<?php echo $iv['image_original']; ?>" target="_blank"><img src="<?php echo $iv['image_small']; ?>" width="30" border="0" /></a>
<?php } } ?>
<?php } ?>
<?php if($topic['videoid']) { ?>
                <div class="feedUservideo">
                 <a onClick="javascript:showFlash('<?php echo $topic['VideoHosts']; ?>', '<?php echo $topic['VideoLink']; ?>', this, '<?php echo $topic['VideoID']; ?>');" >
                 <div id="play_<?php echo $topic['VideoID']; ?>" class="vP"><img src="images/feedvideoplay.gif"  /></div>
                 <img src="<?php echo $topic['VideoImg']; ?>" style="border:none; width:130px; "/>
                </a>
                </div>
<?php } ?>
<?php if($topic['musicid']) { ?>
<?php if($topic['xiami_id']) { ?>
<div class="feedUserImg"><embed width="257" height="33" wmode="transparent" type="application/x-shockwave-flash" src="http://www.xiami.com/widget/0_<?php echo $topic['xiami_id']; ?>/singlePlayer.swf"></embed></div>
<?php } else { ?><div class="feedUserImg"><div id="play_<?php echo $topic['MusicID']; ?>"></div><img src="images/music.gif" title="点击播放音乐" onClick="javascript:showFlash('music', '<?php echo $topic['MusicUrl']; ?>', this, '<?php echo $topic['MusicID']; ?>');" style="cursor:pointer; border:none;" /> </div>
<?php } ?>
<?php } ?>
<?php if($topic['root_topic']['content']) { ?>
                //[原微博]<a href="index.php?mod=topic&code=<?php echo $topic['root_topic']['tid']; ?>" target="_blank"><?php echo $topic['root_topic']['content']; ?></a>
<?php } ?>
 </span>
             <p>
               <span><?php echo $topic['from_html']; ?></span>
               <span>
<?php if($topic['postip']) { ?>
                 <a href="admin.php?mod=topic&postip=<?php echo $topic['postip']; ?>" title="查看此IP今天所发未审核的微博内容"><?php echo $topic['postip']; ?></a>&nbsp;
                 <a href="admin.php?mod=setting&code=modify_access" target=_blank title="新开窗口进入IP访问设置页面">[封IP]</a>
<?php } else { ?>未知IP
<?php } ?>
   </span>
               <span style="float: right">
<?php if($topic['type'] == 'reply') { ?>
<span style="color:gray">此内容是评论</span>
<?php } ?>
 <label title="允许微博正常显示"><input type="radio" name="managetype[<?php echo $key; ?>]" <?php echo $topic['manage_type']['1']; ?> value="1">显示&nbsp;</label>
<?php if($topic['type'] != 'reply') { ?>
                 <label title="允许显示，但禁止评论和转发"><input type="radio" name="managetype[<?php echo $key; ?>]" <?php echo $topic['manage_type']['2']; ?> value="2">禁止&nbsp;</label>
                 <label title="转到待审微博中，发布者自己可见"><input type="radio" name="managetype[<?php echo $key; ?>]" <?php echo $topic['manage_type']['3']; ?> value="3">待审&nbsp;</label>
<?php } ?>
 <label title="删除到回收站"><input type="radio" name="managetype[<?php echo $key; ?>]" <?php echo $topic['manage_type']['4']; ?> value="4">删除&nbsp;</label>
               </span>
             </p>
          </div>
        </li>
<?php } } ?>
    </ul>
<?php if($page_arr['html']) { ?>
        <ul>
          <li class="altbg3" >
            <?php echo $page_arr['html']; ?>
          </li>
        </ul>
<?php } ?>
<!-- <ul>
          <li class="altbg3" >
            <span style="color:red">*注：</span>
            <span>
                1、显：正常显示；
                2、止：禁止该微博的评论和转发；
                3、私：只有发布者可见（在微博审核的待审核中可见）；
                4、删：删除（留记录，在微博审核的回收站中可见）。</span>
          </li>
        </ul> -->
      </div>
        <center>
          <input class="button" type="submit" id="cronssubmit" name="cronssubmit" value="提交" title="CTRL+ENTER提交">
        </center>
    </form>
</div>
<script type="text/javascript">    
document.onkeydown=function(event){
    event = event || window.event;
    if(event.ctrlKey==true && event.keyCode==13){
        $("#cronssubmit").click();
    }
}
</script>