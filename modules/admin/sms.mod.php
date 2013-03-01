<?php

if(!defined('IN_JISHIGOU'))
{
exit('invalid request');
}
class ModuleObject extends MasterObject
{
var $ModuleConfig = array();
var $server_url = '';
var $FormHandler = '';
function ModuleObject($config)
{
$this->MasterObject($config);
$this->ModuleConfig = ConfigHandler::get('sms');
$this->server_url = 'http:/'.'/cenwor.com/plugin.php?id=sms';
$this->FormHandler = Load::lib('form',1);
$this->Execute();
}
function Execute()
{
ob_start();
switch($this->Code)
{
case 'do_modify_setting':
$this->DoModifySetting();
break;
case 'list':
$this->DoList();
break;
case 'send_log':
$this->SendLog();
break;
case 'receive_log':
$this->ReceiveLog();
break;
case 'delete_log':
$this->DeleteLog();
break;
case 'test':
$this->DoTest();
break;
case 'request_test':
$this->RequestTest();
break;
case 'export_to_excel':
$this->ExportToExcel();
break;
case 'do_send':
$this->DoSend();
break;
default:
$this->Code = 'setting';
$this->Setting();
break;
}
$body = ob_get_clean();
$this->ShowBody($body);
}
function Setting()
{
$sms_config = $this->ModuleConfig;
if(!$sms_config)
{
$sms_config = array
(
'r_enable'=>1,
't_enable'=>1,
'p_enable'=>0,
'm_enable'=>1,
'f_enable'=>0,
);
ConfigHandler::set('sms',$sms_config);
}
if(!isset($sms_config['r_enable'])) {
$sms_config['r_enable'] = 1;
}
$enable_radio = $this->FormHandler->YesNoRadio('enable',(int) $sms_config['enable']);
$r_enable_radio = $this->FormHandler->YesNoRadio('r_enable',(int) $sms_config['r_enable']);
$t_enable_radio = $this->FormHandler->YesNoRadio('t_enable',(int) $sms_config['t_enable']);
$p_enable_radio = $this->FormHandler->YesNoRadio('p_enable',(int) $sms_config['p_enable']);
$m_enable_radio = $this->FormHandler->YesNoRadio('m_enable',(int) $sms_config['m_enable']);
$f_enable_radio = $this->FormHandler->YesNoRadio('f_enable',(int) $sms_config['f_enable']);
$auto_register_enable_radio = $this->FormHandler->YesNoRadio('auto_register[enable]',(int) $sms_config['auto_register']['enable']);
$register_verify_enable_radio = $this->FormHandler->YesNoRadio('register_verify[enable]',(int) $sms_config['register_verify']['enable']);
$register_verify_noemail_radio = $this->FormHandler->YesNoRadio('register_verify[noemail]',(int) $sms_config['register_verify']['noemail']);
$sms_var003 = ($sms_config['admin_mobile'] ?'<a target="_blank" href="admin.php?mod=sms&code=test"><font color="red">您可以点此在新窗口中打开测试。</font></a>': '');
$sms_var002 = '';
if($sms_config['app_id'])
{
$sms_var002 = "
    <tr class=\"altbg1\">
      <td width=\"40%\"> <b>3、有新微博通知管理员？</b> <br />建议您启用本功能，便于及时监控微博内容。<br />请按右侧步骤开启此功能</td>
      <td>
      1）绑定您的常用手机号，<a target=\"_blank\" href=\"index.php?mod=other&code=sms\"><font color=\"red\">点此在新窗口中打开绑定</font></a>；<br />
      2）在下面输入框中填入您绑定的手机号码，并提交；<br />
		<input name=\"admin_mobile\" type=\"text\" id=\"admin_mobile\" value=\"{$sms_config[admin_mobile]}\" size=\"40\" /><br />
      3）管理员手机设置完成，{$sms_var003}<br />
	  </td>
    </tr>
";
}
$this->_sms_header();
$FORMHASH = FORMHASH;
$online_qq_href = 'http:/'.'/b.qq.com/webc.htm?new=0&sid=800058566&eid=2188z8p8p8p8R8z8R8x8x&o=cenwor.com&q=7';
$_api_sign = 'Di3SSy0hTzmtoMgSVxgczj2nTdtiuWvK';
$app_id_key_href = ($this->server_url ."&op=app&co=start&api_url=".urlencode($this->Config['site_url'])."&api_sign=".md5($this->Config['site_url'].$_api_sign));
$online_buy_href = 'http:/'.'/cenwor.com/go.php?w=jsg.sms.admin';
$SMSHTML = "
<form action=\"admin.php?mod=sms&code=do_modify_setting\" method=\"POST\">
<input type=\"hidden\" name=\"FORMHASH\" value=\"{$FORMHASH}\"  />
  <table cellspacing=\"1\" cellpadding=\"4\" width=\"100%\" align=\"center\" class=\"tableborder\">
    <tr class=\"header\">
      <td colspan=\"2\">开启手机短信后，可实现短信发微博、注册短信验证、回复提醒加广告、短信群发通知等</td>
    </tr>
    <tr class=\"altbg1\">
      <td width=\"40%\"> <b>1、开启手机短信功能？</b> <br />
		1.1、如第一次开启，必须填写下面的APP ID和APP KEY
		</td>
      <td>{$enable_radio}</td>
    </tr>
    <tr class=\"altbg2\">
      <td width=\"40%\"> 1.2、是否对用户短信微博进行自动回复？ <br />
		选择是，用户通过短信发微博成功后系统会自动回复用户发布成功；<br />
		选择否，不论是否发布成功不对用户做任何回复（用户体验不好）<br />
		注册下行通知、短信微博注册等不受影响，仅针对短信发微博的 <br />
      </td>
      <td>{$r_enable_radio}</td>
    </tr>
    <tr class=\"altbg1\">
      <td width=\"40%\"> <b>2、手机短信核心配置</b></td>
      <td><font color=red>第一次设置</font>，请先<A HREF=\"$online_buy_href\" target=\"_blank\">点此购买并获取APP信息</A></td>
    </tr>
    <tr class=\"altbg2\">
      <td width=\"40%\"> 2.1、APP ID（请向在线客服索取）</td>
      <td><input name=\"app_id\" type=\"text\" id=\"app_id\" value=\"{$sms_config[app_id]}\" size=\"10\" /> &nbsp; <a href=\"$online_qq_href\" target=\"_blank\" alt=\"有问题请咨询QQ在线客服 800058566\" title=\"有问题请咨询QQ在线客服 800058566\"></a> &nbsp; <img alt=\"有问题请咨询QQ在线客服 800058566\" title=\"有问题请咨询QQ在线客服 800058566\" style=\"CURSOR: pointer\" onclick=\"javascript:window.open('$online_qq_href', '_blank', 'height=544, width=644,toolbar=no,scrollbars=no,menubar=no,status=no');\"  border=\"0\" SRC=\"./images/bqqzx.gif\"></td>
    </tr>
    <tr class=\"altbg1\">
      <td width=\"40%\"> 2.2、APP KEY（请向在线客服索取）</td>
      <td><input name=\"app_key\" type=\"text\" id=\"app_key\" value=\"{$sms_config[app_key]}\" size=\"40\" /></td>
    </tr>
    <tr class=\"altbg2\">
        <td width=\"40%\"> 2.3、SMS ID（106开头的三网合一特服号）</td>
        <td><strong>{$sms_config['sms_id']}</strong></td>
    </tr>
    <tr class=\"altbg1\">
      <td width=\"40%\"> 2.4、短信剩余条数（开通后会显示帐户短信数量）</td>
      <td><span id=\"sms_surplus_html_area\">{$sms_config['surplus_html']}</span></td>
    </tr>    
	{$sms_var002}
    <tr class=\"altbg2\">
      <td width=\"40%\"> <b>4、手机短信提醒类型设置</b> </td>
      <td>下面开启提醒功能后，前台用户才可以设置开通相应提醒</td>
    </tr>
    <tr class=\"altbg1\">
      <td width=\"40%\"> 4.1、开启@我的提醒功能？ </td>
      <td>{$t_enable_radio}</td>
    </tr>
    <tr class=\"altbg2\">
      <td width=\"40%\"> 4.2、开启新评论提醒功能？ </td>
      <td>{$p_enable_radio}</td>
    </tr>
    <tr class=\"altbg1\">
      <td width=\"40%\"> 4.3、开启新私信提醒功能？ </td>
      <td>{$m_enable_radio}</td>
    </tr>
    <tr class=\"altbg2\">
      <td width=\"40%\"> 4.4、开启新粉丝提醒功能？ </td>
      <td>{$f_enable_radio}</td>
    </tr>
    <tr class=\"altbg1\">
      <td width=\"40%\"> <b>5、开启自动注册功能？</b> <br />
      	5.1、开启后，系统接收到未绑定用户的手机发来信息时，自动为其注册一个用户，并绑定手机号码；然后再回复短信告知用户名和密码，方便用户在web上访问；
      </td>
      <td>{$auto_register_enable_radio}<BR>
		该功能主要用户使用“<A HREF=\"index.php?mod=wall&code=control\" target=_blank>上墙</A>”功能的活动现场，方便用户参与</td>
    </tr>
    <tr class=\"altbg2\">
      <td width=\"40%\"> <b>6、开启注册短信验证功能？</b> <br />
      	 6.1、在新用户注册时需要填写手机号码，并对号码进行验证；此功能可杜绝垃圾注册。
      </td>
      <td>{$register_verify_enable_radio}</td>
    </tr>
    <tr class=\"altbg1\">
      <td width=\"40%\"> 6.2、注册时不用填写邮箱地址？ <br />
      	此选项在“开启注册短信验证功能”的情况下生效
      </td>
      <td>{$register_verify_noemail_radio}</td>
    </tr>
    <tr class=\"altbg2\">
      <td width=\"40%\"> <b>7、短信内容自定义设置</b></td>
      <td>比如短信中可附加赞助商广告，可为网站带来盈利。</td>
    </tr>    
    <tr class=\"altbg1\">
      <td width=\"40%\"> 7.1、短信内容前辍<br />
      	会附加在所有发送的短信内容的前面
      </td>
      <td><input name=\"prefix\" type=\"text\" id=\"prefix\" value=\"{$sms_config[prefix]}\" size=\"40\" /></td>
    </tr>    
    <tr class=\"altbg2\">
      <td width=\"40%\"> 7.2、短信内容后辍<br />
      	会附加在所有发送的短信内容的后面
      </td>
      <td><input name=\"postfix\" type=\"text\" id=\"postfix\" value=\"{$sms_config[postfix]}\" size=\"40\" /></td>
    </tr>
  </table>
   <center>
    <input class=\"button\" type=\"submit\" name=\"sms_submit\" value=\"提 交\"> &nbsp; <input class=\"button\" type=\"button\" onclick=\"window.location.href='admin.php?mod=sms&code=send_log';return false;\" value=\"收发记录查询\" />
  </center>
</form>
<br />
<script language=\"javascript\">

    $('#sms_surplus_html_area').html('update...');
    
    var get_val = 'surplus_html';
    
    var myAjax = $.post(
        'ajax.php?mod=sms&code=vars',
        {
            get:get_val
        },
        function (d)
        {
            $('#sms_surplus_html_area').html(d);
        }
    );
    
</script>
";
echo $SMSHTML;
}
function DoList()
{
$wheres = array();
$per_page_num = min(200,max(20,(int) $this->Get['pn']));
$query_link = 'admin.php?mod=sms&code=list';
$username = $this->Get['username'];
if($username)
{
if(($user_info = $this->DatabaseHandler->FetchFirst("select * from ".TABLE_PREFIX."members where `nickname`='$username'")))
{
$wheres[] = "SCU.`uid`='{$user_info['uid']}'";
$query_link .= "&username=$username";
}
else
{
$this->Messager("用户名不存在");
}
}
$uid = $this->Get['uid'];
$uid = (is_numeric($uid) ?$uid : 0);
if($uid >0)
{
$wheres[] = "SCU.`uid`='$uid'";
$query_link .= "&uid=$uid";
}
else 
{
$wheres[] = "SCU.`uid`>'0'";
}
$mobile = $this->Get['mobile'];
$mobile = (is_numeric($mobile) ?$mobile : 0);
if($mobile >0 &&$this->_is_phone($mobile))
{
$wheres[] = "SCU.`user_im`='$mobile'";
$query_link .="&mobile=$mobile";
}
else 
{
$wheres[] = "SCU.`user_im`!=''";
}
$where = ($wheres ?(" where ".implode(" and ",$wheres)) : "");
$total_record = $this->DatabaseHandler->ResultFirst("select count(*) as `total_record` from ".TABLE_PREFIX."sms_client_user SCU {$where}");
$page_arr = page($total_record,$per_page_num,$query_link,array('return'=>'Array'),"20 30 50 100 150 200");
$query = $this->DatabaseHandler->Query("select SCU.*, M.username, M.nickname from ".TABLE_PREFIX."sms_client_user SCU LEFT JOIN ".TABLE_PREFIX."members M on M.uid=SCU.uid {$where} order by `id` desc {$page_arr['limit']}");
$list_html = "";
while($row=$query->GetRow())
{
$row['last_try_bind_time_html'] = my_date_format($row['last_try_bind_time']);
$list_html .= "    <tr>
    	<td><input type=\"checkbox\" name=\"tos[{$row['nickname']}]\" value=\"{$row['user_im']}\" /></td>
        <td>{$row['nickname']}</td>
        <td>{$row['user_im']}</td>
        <td>{$row['last_try_bind_time_html']}</td>
        <td>{$row['receive_times']}</td>
        <td>{$row['send_times']}</td>
    </tr>";
}
if(!$list_html)
{
$list_html = "<tr><td colspan='6'><center>暂时没有相关记录</center></td></tr>";
}
else
{
if($page_arr['html'])
{
$list_html .= "<tr><td colspan='6'>{$page_arr['html']}</td></tr>";
}
}
$this->_sms_header();
$HTML = "        
<form action=\"admin.php\" method=\"GET\">
    <input type=\"hidden\" name=\"mod\" value=\"sms\" />
    <input type=\"hidden\" name=\"code\" value=\"list\" />

<table cellspacing=\"1\" cellpadding=\"4\" width=\"100%\" align=\"center\" class=\"tableborder\">
    <tr class=\"header\">
      <td>记录搜索</td>
      <td>{$this->ModuleConfig['surplus_html']}</td>
    </tr>
    <tr>
      <td width=\"40%\"> 1、用户姓名</td>
      <td><input name=\"username\" type=\"text\" value=\"{$username}\" size=\"40\" /></td>
    </tr>
    <tr>
      <td width=\"40%\"> 2、手机号码</td>
      <td><input name=\"mobile\" type=\"text\" value=\"{$mobile}\" size=\"40\" /></td>
    </tr>
</table>
<center>
    <input class=\"button\" type=\"submit\" name=\"sms_submit\" value=\" 搜  索 \"> &nbsp; <input class=\"button\" type=\"button\" onclick=\"window.location.href='admin.php?mod=sms&code=list';return false;\" value=\"查看全部\"> &nbsp; <input class=\"button\" type=\"button\" onclick=\"window.location.href='admin.php?mod=sms&code=export_to_excel';return false;\" value=\"导出为EXCEL文件\">
</center>
</form>
<br />

<br />
<script language=\"Javascript\">
	function sms_send_submit2() {
		$('#sms_send_btn').attr('disable', 'true');
		$('#sms_send_btn').val('短信正在发送中，请稍候……');
		
		return true;
	}
</script>
<form method=\"post\" action=\"admin.php?mod=sms&code=do_send\" onsubmit=\"return sms_send_submit2();\">
<table cellspacing=\"1\" cellpadding=\"4\" width=\"100%\" align=\"center\" class=\"tableborder\">
    <tr class=\"header\">
    	<td width=\"30\"><input type=\"checkbox\" name=\"chkall\" value=\"1\" onclick=\"checkall(this.form, 'tos');\" /></td>
        <td>用户昵称</td>
        <td>手机号码</td>
        <td>绑定时间</td>
        <td>发送次数</td>
        <td>接收次数</td>
    </tr>
    {$list_html}
    <tr>
    	<td colspan=\"6\"><b style=\"color:red;\">短信群发</b>：（请勾选上面的用户；最多支持100个号码）<br />
    	<!-- <input type=\"text\" name=\"_tos\" value=\"\" size=\"100\" /> --></td>
    </tr>
    <tr>
    	<td colspan=\"6\">短信内容：<br>
		<b style=\"color:blue;\">注意1：内容不能超过70个字，否则会被短信网关自动截取掉；</b><br />
		<b style=\"color:red;\">注意2：仅能用于会员通知，含促销、打折、特价、房产等营销或非法内容将被运营商拦截，并可能造成账号被永久封闭，由此造成的罚款等惩罚措施将由短信内容发送方无条件承担。</b><br />
    	<textarea name=\"message\" style=\"width: 528px;\"></textarea> <br /> 
    	<input id=\"sms_send_btn\" type=\"submit\" value=\"开始发送\" class=\"button\" /></td>
    </tr>
</table>
</form>
<br />
<br />
        ";
echo $HTML;
}
function SendLog()
{
$wheres = array();
$per_page_num = min(200,max(20,(int) $this->Get['pn']));
$query_link = 'admin.php?mod=sms&code=send_log';
$username = $this->Get['username'];
if($username)
{
if(($user_info = $this->DatabaseHandler->FetchFirst("select * from ".TABLE_PREFIX."members where `nickname`='$username'")))
{
$wheres[] = "TSL.`uid`='{$user_info['uid']}'";
$query_link .= "&username=$username";
}
else
{
$this->Messager("用户名不存在");
}
}
$uid = $this->Get['uid'];
$uid = (is_numeric($uid) ?$uid : 0);
if($uid >0)
{
$wheres[] = "TSL.`uid`='$uid'";
$query_link .= "&uid=$uid";
}
$mobile = $this->Get['mobile'];
$mobile = (is_numeric($mobile) ?$mobile : 0);
if($mobile >0)
{
$wheres[] = "TSL.`mobile`='$mobile'";
$query_link .="&mobile=$mobile";
}
$dateline_min = $this->Get['dateline_min'];
$dateline_min = min(480,max(1,(int) $dateline_min));$wheres[] = "TSL.`dateline`>='".(time() -$dateline_min * 86400) ."'";
$query_link .= "&dateline_min=$dateline_min";
$dateline_min_select = $this->FormHandler->Select('dateline_min',array(1=>array('name'=>'24小时内','value'=>1),7=>array('name'=>'一周内','value'=>7),30=>array('name'=>'一个月内','value'=>30),90=>array('name'=>'三个月内','value'=>90),180=>array('name'=>'半年内','value'=>180),360=>array('name'=>'一年内','value'=>360),),$dateline_min);
$where = ($wheres ?(" where ".implode(" and ",$wheres)) : "");
$total_record = $this->DatabaseHandler->ResultFirst("select count(*) as `total_record` from ".TABLE_PREFIX."sms_send_log TSL {$where}");
$page_arr = page($total_record,$per_page_num,$query_link,array('return'=>'Array'),"20 30 50 100 150 200");
$query = $this->DatabaseHandler->Query("select TSL.*, M.username, M.nickname from ".TABLE_PREFIX."sms_send_log TSL left join ".TABLE_PREFIX."members M on M.uid=TSL.uid {$where} order by TSL.`id` desc {$page_arr['limit']}");
$status = array(1=>'违法关键词',2=>'内容不合法',3=>'发送太频繁',4=>'余额不足',);
$log_list_html = "";
while($row=$query->GetRow())
{
$row['dateline_html'] = my_date_format($row['dateline']);
if($row['status'] >0)
{
$row['status_html'] = $status[$row['status']];
}
else
{
$row['status_html'] = ($row['msg_id'] ?"发送成功": "未知错误");
}
$log_list_html .= "    <tr>
        <td><a href=\"admin.php?mod=sms&code=send_log&uid={$row['uid']}\">{$row['nickname']}</a></td>
        <td><a href=\"admin.php?mod=sms&code=send_log&mobile={$row['mobile']}\">{$row['mobile']}</a></td>
        <td>{$row['dateline_html']}</td>
        <td>{$row['message']}</td>
        <td>{$row['status_html']}</td>
    </tr>";
}
if(!$log_list_html)
{
$log_list_html = "<tr><td colspan='5'><center>暂时没有相关记录</center></td></tr>";
}
else
{
if($page_arr['html'])
{
$log_list_html .= "<tr><td colspan='5'>{$page_arr['html']}</td></tr>";
}
}
$code_radio = $this->FormHandler->Radio('code',array('send_log'=>array('name'=>'发送记录','value'=>'send_log'),'receive_log'=>array('name'=>'接收记录','value'=>'receive_log')),$this->Code);
$this->_sms_header();
$HTML = "        
<form action=\"admin.php\" method=\"GET\">
    <input type=\"hidden\" name=\"mod\" value=\"sms\" />

<table cellspacing=\"1\" cellpadding=\"4\" width=\"100%\" align=\"center\" class=\"tableborder\">
    <tr class=\"header\">
      <td>记录搜索</td>
      <td>{$this->ModuleConfig['surplus_html']}</td>
    </tr>
    <tr>
      <td width=\"40%\"> 1、记录类型</td>
      <td>{$code_radio}</td>
    </tr>
    <tr>
      <td width=\"40%\"> 2、用户姓名</td>
      <td><input name=\"username\" type=\"text\" value=\"{$username}\" size=\"40\" /></td>
    </tr>
    <tr>
      <td width=\"40%\"> 3、手机号码</td>
      <td><input name=\"mobile\" type=\"text\" value=\"{$mobile}\" size=\"40\" /></td>
    </tr>
    <tr>
      <td width=\"40%\"> 4、记录时间</td>
      <td>{$dateline_min_select} &nbsp; <a onclick=\"return confirm('删除后的内容不可恢复，确认删除？');\" href='admin.php?mod=sms&code=delete_log&from={$this->Code}'>删除半年前的记录？</a></td>
    </tr>
</table>
<center>
    <input class=\"button\" type=\"submit\" name=\"sms_submit\" value=\" 搜  索 \"> &nbsp; <input class=\"button\" type=\"button\" onclick=\"window.location.href='admin.php?mod=sms&code=send_log';return false;\" value=\"查看全部\">
</center>
</form>
<br />

<br />
<table cellspacing=\"1\" cellpadding=\"4\" width=\"100%\" align=\"center\" class=\"tableborder\">
    <tr class=\"header\">
        <td>用户</td>
        <td>号码</td>
        <td>时间</td>
        <td>内容</td>
        <td>状态</td>
    </tr>
    {$log_list_html}
</table>
<br />
<br />
        ";
echo $HTML;
}
function ReceiveLog()
{
$wheres = array();
$per_page_num = min(200,max(20,(int) $this->Get['pn']));
$query_link = 'admin.php?mod=sms&code=receive_log';
$username = $this->Get['username'];
if($username)
{
if(($user_info = $this->DatabaseHandler->FetchFirst("select * from ".TABLE_PREFIX."members where `nickname`='$username'")))
{
$wheres[] = "SRL.`uid`='{$user_info['uid']}'";
$query_link .= "&username=$username";
}
else
{
$this->Messager("用户名不存在");
}
}
$uid = $this->Get['uid'];
$uid = (is_numeric($uid) ?$uid : 0);
if($uid >0)
{
$wheres[] = "SRL.`uid`='$uid'";
$query_link .= "&uid=$uid";
}
$mobile = $this->Get['mobile'];
$mobile = (is_numeric($mobile) ?$mobile : 0);
if($mobile >0)
{
$wheres[] = "SRL.`mobile`='$mobile'";
$query_link .="&mobile=$mobile";
}
$dateline_min = $this->Get['dateline_min'];
$dateline_min = min(480,max(1,(int) $dateline_min));$wheres[] = "SRL.`dateline`>='".(time() -$dateline_min * 86400) ."'";
$query_link .= "&dateline_min=$dateline_min";
$dateline_min_select = $this->FormHandler->Select('dateline_min',array(1=>array('name'=>'24小时内','value'=>1),7=>array('name'=>'一周内','value'=>7),30=>array('name'=>'一个月内','value'=>30),90=>array('name'=>'三个月内','value'=>90),180=>array('name'=>'半年内','value'=>180),360=>array('name'=>'一年内','value'=>360),),$dateline_min);
$where = ($wheres ?(" where ".implode(" and ",$wheres)) : "");
$total_record = $this->DatabaseHandler->ResultFirst("select count(*) as `total_record` from ".TABLE_PREFIX."sms_receive_log SRL {$where}");
$page_arr = page($total_record,$per_page_num,$query_link,array('return'=>'Array'),"20 30 50 100 150 200");
$query = $this->DatabaseHandler->Query("select SRL.*, M.username, M.nickname from ".TABLE_PREFIX."sms_receive_log SRL left join ".TABLE_PREFIX."members M on M.uid=SRL.uid  {$where} order by SRL.`id` desc {$page_arr['limit']}");
$log_list_html = "";
while($row=$query->GetRow())
{
$row['dateline_html'] = my_date_format($row['dateline']);
$row['tid_html'] = ($row['tid'] >0 ?"<a href='index.php?mod=topic&code={$row['tid']}' title='在新窗口中打开查看微博' target='_blank'>微博</a>": "");
$log_list_html .= "    <tr>
        <td><a href=\"admin.php?mod=sms&code=receive_log&uid={$row['uid']}\">{$row['nickname']}</a></td>
        <td><a href=\"admin.php?mod=sms&code=receive_log&mobile={$row['mobile']}\">{$row['mobile']}</a></td>
        <td>{$row['dateline_html']}</td>
        <td>{$row['message']}</td>
        <td>{$row['tid_html']}</td>
    </tr>";
}
if(!$log_list_html)
{
$log_list_html = "<tr><td colspan='5'><center>暂时没有相关记录</center></td></tr>";
}
else
{
if($page_arr['html'])
{
$log_list_html .= "<tr><td colspan='5'>{$page_arr['html']}</td></tr>";
}
}
$code_radio = $this->FormHandler->Radio('code',array('send_log'=>array('name'=>'发送记录','value'=>'send_log'),'receive_log'=>array('name'=>'接收记录','value'=>'receive_log')),$this->Code);
$this->_sms_header();
$HTML = "        
<form action=\"admin.php\" method=\"GET\">
    <input type=\"hidden\" name=\"mod\" value=\"sms\" />

<table cellspacing=\"1\" cellpadding=\"4\" width=\"100%\" align=\"center\" class=\"tableborder\">
    <tr class=\"header\">
      <td>记录搜索</td>
      <td>{$this->ModuleConfig['surplus_html']}</td>
    </tr>
    <tr>
      <td width=\"40%\"> 1、记录类型</td>
      <td>{$code_radio}</td>
    </tr>
    <tr>
      <td width=\"40%\"> 2、用户姓名</td>
      <td><input name=\"username\" type=\"text\" value=\"{$username}\" size=\"40\" /></td>
    </tr>
    <tr>
      <td width=\"40%\"> 3、手机号码</td>
      <td><input name=\"mobile\" type=\"text\" value=\"{$mobile}\" size=\"40\" /></td>
    </tr>
    <tr>
      <td width=\"40%\"> 4、记录时间</td>
      <td>{$dateline_min_select} &nbsp; <a onclick=\"return confirm('删除后的内容不可恢复，确认删除？');\" href='admin.php?mod=sms&code=delete_log&from={$this->Code}'>删除半年前的记录？</a></td>
    </tr>
</table>
<center>
    <input class=\"button\" type=\"submit\" name=\"sms_submit\" value=\" 搜  索 \"> &nbsp; <input class=\"button\" type=\"button\" onclick=\"window.location.href='admin.php?mod=sms&code=receive_log';return false;\" value=\"查看全部\">
</center>
</form>
<br />

<br />
<table cellspacing=\"1\" cellpadding=\"4\" width=\"100%\" align=\"center\" class=\"tableborder\">
    <tr class=\"header\">
        <td>用户</td>
        <td>号码</td>
        <td>时间</td>
        <td>内容</td>
        <td>其他</td>
    </tr>
    {$log_list_html}
</table>
<br />
<br />
        ";
echo $HTML;
}
function DeleteLog()
{
$from = $this->Get['from'];
if('send_log'!=$from &&'receive_log'!=$from)
{
$this->Messager("错误的链接请求",null);
}
$this->DatabaseHandler->Query("delete from ".TABLE_PREFIX."sms_{$from} where `dateline`<'".(time() -86400 * 180)."'");
$this->Messager("删除成功");
}
function DoTest()
{
if(!$this->ModuleConfig['enable'] ||!sms_init($this->Config))
{
$this->Messager("请先开启手机短信功能","admin.php?mod=sms",10);
}
if(!$this->ModuleConfig['admin_mobile'])
{
$this->Messager("请先设置管理员的手机号","admin.php?mod=sms",10);
}
$send_result = sms_send_message($this->ModuleConfig['admin_mobile'],'to_admin_mobile',array('test'=>true,'username'=>'test','content'=>'后台发起的通知管理员测试，现在时间：'.date("Y-m-d H:i:s"),'topic_id'=>-1,));
if($send_result)
{
$msg = $send_result;
settype($msg,'array');
if('debug'==$this->Get['action'])
{
$msg[] = sms_errors_output(false);
}
$this->Messager($msg,null);
}
else
{
$this->Messager("【发送失败】".('debug'==$this->Get['action'] ?sms_errors_output(false) : ''),null);
}
}
function RequestTest()
{
$return = mt_rand();
$result = $this->_request(array('step'=>'test','test'=>$return),array(),true);
if($result==$return)
{
$this->Messager("【测试成功】{$result}",null);
}
else
{
$this->Messager("【测试失败】{$result}",null);
}
}
function DoModifySetting()
{
$check_result = $this->_smsEnvCheck();
if($check_result)
{
ConfigHandler::update('sms_enable',0);
$this->Messager($check_result,null);
}
$sms_config = $this->ModuleConfig;
$sms_config['app_id'] = max(0,(int) $this->Post['app_id']);
$sms_config['app_key'] = $this->Post['app_key'];
$sms_config['send_update_cmd'] = $this->Post['send_update_cmd'];
$sms_config['server_url'] = $this->server_url;
$sms_config['sms_id'] = $this->_sms_id($sms_config);
$enable = $this->Post['enable'];
$sms_enable = (($enable &&$sms_config['app_id']>0 &&$sms_config['app_key'] &&$sms_config['sms_id']) ?1 : 0);
$sms_config['enable'] = $sms_enable;
if(isset($this->Post['r_enable'])) $sms_config['r_enable'] = ($this->Post['r_enable'] ?1 : 0);
if(isset($this->Post['t_enable'])) $sms_config['t_enable'] = ($this->Post['t_enable'] ?1 : 0);
if(isset($this->Post['p_enable'])) $sms_config['p_enable'] = ($this->Post['p_enable'] ?1 : 0);
if(isset($this->Post['m_enable'])) $sms_config['m_enable'] = ($this->Post['m_enable'] ?1 : 0);
if(isset($this->Post['f_enable'])) $sms_config['f_enable'] = ($this->Post['f_enable'] ?1 : 0);
$sms_config['admin_mobile'] = ($this->_is_phone($this->Post['admin_mobile']) ?$this->Post['admin_mobile'] : 0);
$sms_config['auto_register']['enable'] = $this->Post['auto_register']['enable'] ?1 : 0;
$sms_config['register_verify']['enable'] = $this->Post['register_verify']['enable'] ?1 : 0;
$sms_config['register_verify']['noemail'] = $this->Post['register_verify']['noemail'] ?1 : 0;
ConfigHandler::set('sms',$sms_config);
$sms_register_verify_enable = ($sms_enable &&$sms_config['register_verify']['enable']);
if ($sms_enable!=$this->Config['sms_enable'] ||$sms_register_verify_enable!=$this->Config['sms_register_verify_enable'])
{
$config = array();
$config['sms_enable'] = $sms_enable;
$config['sms_register_verify_enable'] = $sms_register_verify_enable;
ConfigHandler::update($config);
}
if ($sms_config['app_id'] <1 ||!$sms_config['app_key'])
{
$this->Messager("配置信息有误，请重新输入");
}
$this->Messager("修改成功");
}
function ExportToExcel()
{
$query = $this->DatabaseHandler->Query("select SCU.`user_im`, SCU.`last_try_bind_time`, SCU.`send_times`, SCU.`receive_times`, M.`uid`, M.`username`, M.`nickname`, M.`email`, M.`gender`, M.`credits`, M.`province`, M.`city`, M.`phone`, M.`regdate`, M.`regip`, M.`lastip`, M.`aboutme`, M.`validate`, MF.`validate_remark`, MF.`validate_true_name`, MF.`validate_card_type`, MF.`validate_card_id` from ".TABLE_PREFIX."sms_client_user SCU left join ".TABLE_PREFIX."members M on M.uid=SCU.uid left join ".TABLE_PREFIX."memberfields MF on MF.uid=M.uid where SCU.`uid`>'0' and SCU.`user_im`!=''");
$list = array();
$list[] = array('手机号码','手机绑定时间','短信接收次数','短信发送次数','用户ID','用户名','用户昵称','Email 邮箱','性别','用户积分','省份','城市','注册时间','注册IP','最后登录IP','一句话介绍','V身份认证','V认证备注','真实姓名','证件类型','证件号码');
$genders = array('1'=>'男','2'=>'女');
while(false != ($row = $query->GetRow()))
{
if($row['user_im'] != $row['phone'])
{
$this->DatabaseHandler->Query("update ".TABLE_PREFIX."members set `phone`='{$row['user_im']}' where `uid`='{$row['uid']}'");
}
unset($row['phone']);
$row['last_try_bind_time'] = my_date_format($row['last_try_bind_time']);
$row['regdate'] = my_date_format($row['regdate']);
$row['gender'] = isset($genders[$row['gender']]) ?$genders[$row['gender']] : '未知';
$row['validate'] = $row['validate'] ?"是": "否";
$list[] = $row;
}
$this->_excel($list,"mobile-phone-user-".date("YmdH"));
}
function _excel($list,$filename = '')
{
if(!$filename)
{
$filename = date('YmdHis');
}
Load::lib('php-excel');
$XLS = new Excel_XML($this->Config['charset']);
$XLS->addArray($list);
$XLS->generateXML($filename);
}
function _smsEnvCheck()
{
Load::functions('sms_env');
return sms_env();
}
function _sms_id($sms_config = array())
{
if($this->Config['sms_extra_enable'])
{
if(!function_exists('sms_extra_sms_id'))
{
Load::functions('sms_extra');
}
return sms_extra_sms_id();
}
else
{
$datas = array(
'step'=>'sms_id',
);
return $this->_request($datas,$sms_config);
}
}
function _sms_surplus($sms_config = array())
{
$datas = array(
'step'=>'surplus',
);
return $this->_request($datas,$sms_config);
}
function _sms_vars($sms_config = array())
{
$datas = array(
'step'=>'vars',
);
return $this->_request($datas,$sms_config);
}
function _request($datas,$sms_config=array(),$test=false)
{
$return = '';
if($this->Config['sms_extra_enable'])
{
return $return;
}
settype($datas,'array');
$datas['op'] = 'server';
$datas['co'] = 'app';
$datas['app_id'] = ($sms_config['app_id'] ?$sms_config['app_id'] : $this->ModuleConfig['app_id']);
$datas['app_key'] = ($sms_config['app_key'] ?$sms_config['app_key'] : $this->ModuleConfig['app_key']);
$datas['post_time'] = time();
$datas['sys_env'] = array(
'name'=>$this->Config['site_name'],
'url'=>$this->Config['site_url'],
'path'=>ROOT_PATH,
);
$datas['input_charset'] = $this->Config['charset'];
if (function_exists('mb_convert_encoding') ||function_exists('iconv'))
{
$posts['input_charset'] = 'GBK';
$posts = array_iconv($this->Config['charset'],$posts['input_charset'],$posts);
}
if($datas['app_id'] &&$datas['app_key'] &&$datas['step'])
{
include_once(ROOT_PATH .'include/lib/http_client.class.php');
$http = new Http_Client();
foreach($datas as $key=>$val)
{
$http->addPostField($key,$val);
}
$url = ($sms_config['server_url'] ?$sms_config['server_url'] : $this->ModuleConfig['server_url']);
$response = $http->Post($url,false);
if($response)
{
if(false!==strpos($response,"\n"))
{
$response = preg_replace('~\s+[\w\d]{1,10}\s+~','',$response);
}
if (false!==strpos($response,'</DATA>'))
{
$int = preg_match('~<DATA>(.*?)<\/DATA>~s',$response,$m);
$response = $m[1];
}
if($response &&($response = unserialize(base64_decode($response))))
{
if (function_exists('mb_convert_encoding') ||function_exists('iconv'))
{
$response = array_iconv(($response['output_charset'] ?$response['output_charset'] : $datas['input_charset']),$this->Config['charset'],$response);
}
}
if($response &&is_array($response))
{
if($response['error'])
{
if($test)
{
$this->Messager($response['result'],null);
}
}
else
{
$return = $response['result'];
}
}
else
{
if($test)
{
$this->Messager("返回内容格式错误",null);
}
}
}
else
{
if($test)
{
$this->Messager("返回内容为空",null);
}
}
}
else
{
if($test)
{
$this->Messager("请求参数错误",null);
}
}
return $return;
}
function _is_phone($num)
{
$return = false;
if($num &&is_numeric($num))
{
settype($num,'string');
$num_len = strlen($num);
if(11==$num_len ||12==$num_len)
{
$return = preg_match('~^((?:13|15|18)\d{9}|0(?:10|2\d|[3-9]\d{2})[1-9]\d{6,7})$~',$num);
}
}
return $return;
}
function _sms_header() {
include($this->TemplateHandler->Template('admin/header'));
}
function DoSend() {
if(!sms_init($this->Config)) {
$this->Messager('请先开启短信功能','admin.php?mod=sms&code=setting');
}
$tos = get_param('tos');
if(!$tos) {
$this->Messager('请指定短信接收者');
}
$message = get_param('message');
if(!$message) {
$this->Messager('请指定短信内容');
}
$f_rets = filter($message,0,0);
if($f_rest &&$f_rets['error']) {
$this->Messager('发送的短信内容 '.$f_rets['error']);
}
foreach ($tos as $nk=>$to) {
sms_send($to,"{$nk}，{$message}");
usleep(rand(10000,1000000));
}
$this->Messager('短信发送成功了','',10);
}
}

?>
