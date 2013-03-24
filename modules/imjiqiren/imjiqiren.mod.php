<?php

if(!defined('IN_DATACORE'))
{
exit('invalid request');
}
class ModuleObject extends MasterObject
{
var $_ip = '';
var $_timestamp = 0;
var $_caches = array();
var $_errors = array();
var $Event = '';
var $Sender = 0;
var $Message = '';
var $MessageId = '';
var $UserInfo = array();
var $_sys_code = '';
var $_sys_code_prefix = '@';
var $_sys_code_separator = ' ';
function ModuleObject($config)
{
$this->MasterObject($config);
$this->_timestamp = time();
$this->_ip = $this->_ip();
$this->Event = $this->Inputs['event'];
$this->Sender = is_numeric($this->Inputs['uid']) ?$this->Inputs['uid'] : 0;
$this->Message = trim(strip_tags($this->Inputs['message']));
$this->_init_app();
if(!jsg_is_qq($this->Sender))
{
$this->_setError('Sender is invalid');
}
$this->UserInfo = $this->_imjiqiren_client_user();
if(!$this->UserInfo)
{
$this->_setError('UserInfo is empty');
}
if('buddy.message'!=$this->Event &&'buddy.sign'!=$this->Event)
{
$this->_setError('Event is invalid');
}
if($GLOBALS['imjiqiren_sys_config']['imjiqiren']['sign_update_disable'] &&'buddy.sign'==$this->Event)
{
$this->_setError('sign update is disable');
}
if(!$this->Message)
{
$this->_setError('Message is empty');
}
$this->MessageId = abs(crc32(md5($this->Message)));
$_event_type = ('buddy.sign'==$this->Event ?'sign_update': 'receive');
if($this->UserInfo["stop_{$_event_type}"])
{
$this->_setError("{$_event_type} is stop");
}
$UserInfoSets = array();
$UserInfoSets[$_event_type .'_times'] = '+1';
$UserInfoSets['last_'.$_event_type .'_time'] = $this->_timestamp;
$UserInfoSets['last_'.$_event_type .'_message_id'] = $this->MessageId;
if($this->MessageId == $this->UserInfo['last_'.$_event_type .'_message_id'])
{
if($this->UserInfo['last_'.$_event_type .'_time'] +60 >$this->_timestamp)
{
$this->_setError('server is busy');
}
}
else
{
if($this->UserInfo['last_'.$_event_type .'_time'] +6 >$this->_timestamp)
{
$this->_setError('too many connections');
}
}
$this->_imjiqiren_client_user($UserInfoSets);
$this->_imjiqiren_sys_code();
$this->_imjiqiren_send($this->_imjiqiren_api_message());
}
function _imjiqiren_send($message='')
{
if($GLOBALS['imjiqiren_sys_config']['imjiqiren']['last_check_time'] +180 <$this->_timestamp)
{
$ImJiqiRenSets = array();
$ImJiqiRenSets['last_check_time'] = $this->_timestamp;
imjiqiren_config_update($ImJiqiRenSets);
}
if($message)
{
imjiqiren_send($this->Sender,$message);
$this->_setError('<result>success</result>send message is ok',true);
}
else
{
$this->_setError('send message is empty');
}
exit;
}
function _init_app()
{
$failedlogins = DB::fetch_first("select * from ".imjiqiren_table('imjiqiren_failedlogins')." where `ip`='{$this->_ip}'");
if($failedlogins)
{
if(($failedlogins['lastupdate'] +1800) >$this->_timestamp)
{
if($failedlogins['count'] >10)
{
$this->_setError('ip is invalid');
}
}
else
{
DB::query("delete from ".imjiqiren_table('imjiqiren_failedlogins')." where `ip`='{$this->_ip}'");
}
}
$app_id     = (int) $this->Inputs['app_id'];
$app_key    = trim($this->Inputs['app_key']);
if($app_id <1 ||$app_id!=IMJIQIREN_APP_ID ||!$app_key ||$app_key!=IMJIQIREN_APP_KEY)
{
if($failedlogins)
{
DB::query("update ".imjiqiren_table('imjiqiren_failedlogins')." set `count`=`count`+1,`lastupdate`='{$this->_timestamp}' where `ip`='{$this->_ip}'");
}
else
{
DB::query("insert into ".imjiqiren_table('imjiqiren_failedlogins')." (`ip`,`count`,`lastupdate`) values ('{$this->_ip}','1','{$this->_timestamp}')");
}
$this->_setError('app_id or app_key is invalid');
}
}
function _imjiqiren_sys_code()
{
if ('buddy.message'==$this->Event &&$this->_sys_code_prefix==substr($this->Message,0,strlen($this->_sys_code_prefix)))
{
$_sys_code = '';
$strpos = strpos($this->Message,$this->_sys_code_separator);
if (false!==$strpos)
{
$_sys_code = substr($this->Message,strlen($this->_sys_code_prefix),$strpos-strlen($this->_sys_code_separator));
$this->Message = trim(substr($this->Message,$strpos +strlen($this->_sys_code_separator)));
}
else
{
$_sys_code = substr($this->Message,strlen($this->_sys_code_prefix));
$this->Message = '';
}
$this->_sys_code = strtolower(trim($_sys_code));
$allow_sys_codes = array();
$allow_sys_codes['help'] = 'help';
$allow_sys_codes['test'] = 'test';
$allow_sys_codes['api_connect_test'] = 'api_connect_test';
$allow_sys_codes['bd'] = $allow_sys_codes['bind'] = 'bind';
$allow_sys_codes['qxbd'] = $allow_sys_codes['unbind'] = 'unbind';
$allow_sys_codes['cxbd'] = $allow_sys_codes['check_bind'] = 'check_bind';
if(!$GLOBALS['imjiqiren_sys_config']['imjiqiren']['reset_password_disable'])
{
$allow_sys_codes['mm'] = $allow_sys_codes['reset_password'] = 'reset_password';
}
$allow_sys_codes['ton'] = $allow_sys_codes['toff'] = $allow_sys_codes['pon'] = $allow_sys_codes['poff'] = $allow_sys_codes['mon'] = $allow_sys_codes['moff'] = $allow_sys_codes['fon'] = $allow_sys_codes['foff'] = $allow_sys_codes['on'] = $allow_sys_codes['off'] = 'on_off';
if(isset($allow_sys_codes[$this->_sys_code]))
{
$sys_code_method = "_imjiqiren_sys_code_".$allow_sys_codes[$this->_sys_code];
if(method_exists($this,$sys_code_method))
{
$this->_imjiqiren_send($this->$sys_code_method());
}
}
$this->_setError('sys_code is invalid');
}
}
function _imjiqiren_sys_code_help()
{
$imjiqiren_var_001 = '';
if($GLOBALS['imjiqiren_sys_config']['imjiqiren']['t_enable'])
{
$imjiqiren_var_001 = "{$this->_sys_code_prefix}TOFF 关闭@我的提醒
{$this->_sys_code_prefix}TON 开启@我的提醒

";
}
$imjiqiren_var_002 = '';
if($GLOBALS['imjiqiren_sys_config']['imjiqiren']['p_enable'])
{
$imjiqiren_var_002 = "{$this->_sys_code_prefix}POFF 关闭新评论提醒
{$this->_sys_code_prefix}PON 开启新评论提醒

";
}
$imjiqiren_var_003 = '';
if($GLOBALS['imjiqiren_sys_config']['imjiqiren']['m_enable'])
{
$imjiqiren_var_003 = "{$this->_sys_code_prefix}MOFF 关闭新私信提醒
{$this->_sys_code_prefix}MON 开启新私信提醒

";
}
$imjiqiren_var_004 = '';
if($GLOBALS['imjiqiren_sys_config']['imjiqiren']['f_enable'])
{
$imjiqiren_var_004 = "{$this->_sys_code_prefix}FOFF 关闭新粉丝提醒
{$this->_sys_code_prefix}FON 开启新粉丝提醒

";
}
$imjiqiren_var_005 = '';
if(("{$imjiqiren_var_001}{$imjiqiren_var_002}{$imjiqiren_var_003}{$imjiqiren_var_004}"))
{
$imjiqiren_var_005 = "{$this->_sys_code_prefix}OFF 关闭以上所有消息提醒
{$this->_sys_code_prefix}ON 开启以上所有消息提醒

";
}
$imjiqiren_var_006 = "{$this->_sys_code_prefix}MM{$this->_sys_code_separator}新的密码 修改帐号对应的密码

";
if($GLOBALS['imjiqiren_sys_config']['imjiqiren']['reset_password_disable'])
{
$imjiqiren_var_006 = "";
}
return "{$this->_sys_code_prefix}CXBD 查询绑定
{$this->_sys_code_prefix}QXBD 取消绑定

{$imjiqiren_var_001}{$imjiqiren_var_002}{$imjiqiren_var_003}{$imjiqiren_var_004}{$imjiqiren_var_005}{$imjiqiren_var_006}{$this->Config['site_name']}提醒您发布内容请按以下格式“{$GLOBALS['imjiqiren_sys_config']['imjiqiren']['send_update_cmd']}您要发布的内容”，查看帮助请对我发送“{$this->_sys_code_prefix}HELP”
";
}
function _imjiqiren_sys_code_test()
{
return "【测试成功】现在时间：".date("Y-m-d H:i:s");
}
function _imjiqiren_sys_code_api_connect_test()
{
if(jsg_is_qq($this->Sender))
{
$to = $this->Sender;
}
else
{
$to = hexdec('5e2ea7');
}
imjiqiren_send($to,"[{$to} - {$this->Config['site_url']} - ".date("Y-m-d H:i:s")."]".$this->Message);
$this->_setError("[{$to} - _imjiqiren_sys_code_api_connect_test]".$this->Message,true);
}
function _imjiqiren_sys_code_reset_password()
{
if($this->UserInfo['uid'] <1)
{
return "{$this->Sender}未绑定";
}
if($this->UserInfo['last_reset_password_time'] +86400 >$this->_timestamp)
{
return "您的QQ在最近的２４小时之内已经执行过重设密码的操作";
}
$password = ($this->Message ?$this->Message : random(12));
$password_md5 = md5($password);
$member_info = $this->_member_info($this->UserInfo['uid']);
if($member_info &&$member_info['password']!=$password_md5)
{
jsg_member_edit($member_info['nickname'],'','',$password,'','',1);
$UserInfoSets = array();
$UserInfoSets['last_reset_password_time'] = $this->_timestamp;
$UserInfoSets['reset_password_times'] = '+1';
$this->_imjiqiren_client_user($UserInfoSets);
}
return "您{$this->UserInfo['username']}的密码已经修改为“{$password}”，请牢记您的新密码，并注意保管";
}
function _imjiqiren_sys_code_on_off()
{
if($this->UserInfo['uid'] <1)
{
return "{$this->Sender}未绑定";
}
$UserInfoSets = array();
$enable = ('on'==substr($this->_sys_code,-2) ?1 : ('off'==substr($this->_sys_code,-3) ?0 : null));
if(!is_null($enable))
{
$_allows = array('t'=>1,'p'=>1,'m'=>1,'f'=>1,);
if('on'==$this->_sys_code ||'off'==$this->_sys_code)
{
foreach($_allows as $_k=>$_v)
{
$UserInfoSets[$_k ."_enable"] = $enable;
}
}
else
{
$_k = substr($this->_sys_code,0,1);
if($_k &&isset($_allows[$_k]))
{
$UserInfoSets[$_k ."_enable"] = $enable;
}
}
$UserInfoSets['enable'] = 0;
foreach($_allows as $_k=>$_v)
{
$_kk = ($_k ."_enable");
$_enable = (isset($UserInfoSets[$_kk]) ?$UserInfoSets[$_kk] : $this->UserInfo[$_kk]);
if($_enable)
{
$UserInfoSets['enable'] = 1;
break;
}
}
$this->_imjiqiren_client_user($UserInfoSets);
return "设置成功，消息接收已".($enable ?"开启": "关闭");
}
}
function _imjiqiren_sys_code_check_bind()
{
if($this->UserInfo['uid'] <1)
{
return "{$this->Sender}未绑定";
}
return "{$this->Sender}已绑定【{$this->UserInfo['uid']}】{$this->UserInfo['username']}";
}
function _imjiqiren_sys_code_unbind()
{
if($this->UserInfo['uid'] <1)
{
return "{$this->Sender}未绑定";
}
$UserInfoSets = array();
$UserInfoSets['uid'] = 0;
$UserInfoSets['share_time'] = 0;
$this->_imjiqiren_client_user($UserInfoSets);
return "成功取消绑定";
}
function _imjiqiren_sys_code_bind()
{
if($this->UserInfo['uid'] >0)
{
return "{$this->Sender}已绑定【{$this->UserInfo['uid']}】{$this->UserInfo['username']}";;
}
list($app_id,$uid,$key) = explode($this->_sys_code_separator,$this->Message);
$app_id = (int) $app_id;
$uid = (int) $uid;
$key = substr(trim($key),0,32);
if($app_id <1 ||$uid <1 ||$app_id!=IMJIQIREN_APP_ID ||$key!=md5(IMJIQIREN_APP_ID .$uid .IMJIQIREN_APP_KEY))
{
return "绑定代码无效";
}
if($this->UserInfo['last_try_bind_time'] +7200 >$this->_timestamp)
{
return "您的QQ在最近的２小时之内已经执行过绑定帐号的操作";
}
$member_info = $this->_member_info($uid);
if(!$member_info)
{
return "绑定失败";
}
$user_info = imjiqiren_client_user($uid);
if($user_info &&$user_info['user_im'])
{
if($user_info['user_im'])
{
if($user_info['user_im']!=$this->Sender)
{
return "已经绑定过了";
}
}
if($user_info['id']!=$this->UserInfo['id'])
{
DB::query("delete from ".imjiqiren_table('imjiqiren_client_user')." where `id`='{$user_info['id']}'");
}
}
$UserInfoSets = array();
$UserInfoSets['uid'] = $member_info['uid'];
$UserInfoSets['username'] = $member_info['username'];
$UserInfoSets['try_bind_times'] = '+1';
$UserInfoSets['last_try_bind_time'] = $this->_timestamp;
$this->_imjiqiren_client_user($UserInfoSets);
return "绑定成功";
}
function _setError($str,$strOutput=false)
{
imjiqiren_errors($str);
$_allow_actions = array(
'api_connect_test'=>1,
'debug'=>1,
);
if($this->Inputs['action'] &&isset($_allow_actions[$this->Inputs['action']]))
{
$this->_error_output();
}
$row = DB::fetch_first("select * from ".imjiqiren_table('imjiqiren_send_queue')." order by `dateline` asc limit 1");
if($row &&$row['to'])
{
DB::query("delete from ".imjiqiren_table('imjiqiren_send_queue')." where `to`='{$row['to']}'");
if($row['message'] &&$row['salt'])
{
$_message = authcode($row['message'],'DECODE',md5($row['salt'] ."E08FA83450B75D962FCBB5E0448D90429B9EC2EB"));
if($_message)
{
imjiqiren_send($row['to'],$_message);
}
else
{
DB::query("delete from ".imjiqiren_table('imjiqiren_send_queue')." where `dateline`<'".($this->_timestamp -200000)."'");
}
}
}
if($strOutput)
{
exit($str);
}
else
{
exit('<result>error</result>');
}
}
function _error_output()
{
imjiqiren_errors_output();
}
function _member_info($uid=0)
{
$uid = (is_numeric($uid) ?$uid : 0);
$member_info = $this->_caches['member_info'][$uid];
if(is_null($member_info))
{
$member_info = DB::fetch_first("select * from ".imjiqiren_table('members')." where `uid`='$uid'");
}
return $member_info;
}
function _imjiqiren_client_user($sets=array())
{
$user_info = _imjiqiren_client_user($this->Sender);
if($sets &&$user_info)
{
imjiqiren_client_user_update($sets,$user_info);
}
return $user_info;
}
function _imjiqiren_api_message()
{
if($this->UserInfo['uid'] <1)
{
return "{$this->Sender}未绑定";
}
$message = $this->Message;
$imjiqiren_cmd = $GLOBALS['imjiqiren_sys_config']['imjiqiren']['send_update_cmd'];
if (('buddy.sign'==$this->Event) ||(!$imjiqiren_cmd) ||($imjiqiren_cmd==substr($message,0,strlen($imjiqiren_cmd))))
{
if('buddy.message'==$this->Event)
{
$message = trim(substr($message,strlen($imjiqiren_cmd)));
}
elseif('buddy.sign'==$this->Event)
{
$message = ($GLOBALS['imjiqiren_sys_config']['imjiqiren']['sign_update_mark'] .$message);
}
if($message &&($member_info = $this->_member_info($this->UserInfo['uid'])))
{
define(MEMBER_ID,max(0,(int) $member_info['uid']));
define(MEMBER_NAME,$member_info['username']);
$TopicLogic = Load::logic('topic',1);
$datas = array(
'content'=>$message,
'from'=>'qq',
'type'=>'first',
);
$add_result = $TopicLogic->Add($datas);
if(is_array($add_result) &&count($add_result))
{
return "【通知】".('buddy.sign'==$this->Event ?"签名更新": "内容发布").(is_array($add_result) ?"成功": "失败");
}
else
{
$this->_setError('_imjiqiren_api_message add_result is invalid'."[{$add_result}]");
return false;
}
}
else
{
$this->_setError('_imjiqiren_api_message message is empty or member_info is invalid');
return false;
}
}
else
{
if(($this->UserInfo['last_receive_time'] +600) <$this->_timestamp)
{
return "{$this->Config['site_name']}提醒您发布内容请按以下格式“{$imjiqiren_cmd}您要发布的内容”，查看帮助请对我发送“{$this->_sys_code_prefix}HELP”";
}
}
}
function _ip()
{
if(getenv('HTTP_CLIENT_IP') &&strcasecmp(getenv('HTTP_CLIENT_IP'),'unknown')) {
$onlineip = getenv('HTTP_CLIENT_IP');
}elseif(getenv('HTTP_X_FORWARDED_FOR') &&strcasecmp(getenv('HTTP_X_FORWARDED_FOR'),'unknown')) {
$onlineip = getenv('HTTP_X_FORWARDED_FOR');
}elseif(getenv('REMOTE_ADDR') &&strcasecmp(getenv('REMOTE_ADDR'),'unknown')) {
$onlineip = getenv('REMOTE_ADDR');
}elseif(isset($_SERVER['REMOTE_ADDR']) &&$_SERVER['REMOTE_ADDR'] &&strcasecmp($_SERVER['REMOTE_ADDR'],'unknown')) {
$onlineip = $_SERVER['REMOTE_ADDR'];
}
preg_match("/[\d\.]{7,15}/",$onlineip,$onlineipmatches);
$onlineip = $onlineipmatches[0] ?$onlineipmatches[0] : 'unknown';
return $onlineip;
}
}

?>
