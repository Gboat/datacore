<?php

if(!defined('IN_JISHIGOU'))
{
exit('invalid request');
}
class ModuleObject extends MasterObject
{
var $_ip = '';
var $_timestamp = 0;
var $_caches = array();
var $_errors = array();
var $Sender = 0;
var $Message = '';
var $MessageId = '';
var $UserInfo = array();
var $_sys_code = '';
var $_sys_code_prefix = '@';
var $_sys_code_separator = ' ';
var $_log_id = 0;
function ModuleObject($config)
{
$this->MasterObject($config);
$this->_timestamp = time();
$this->_ip = $this->_ip();
$this->_init_vars();
$this->_init_app();
if(!is_numeric($this->Sender))
{
$this->_setError('Sender is invalid');
}
$this->UserInfo = $this->_sms_client_user();
if(!$this->UserInfo &&$this->Config['sms']['auto_register']['enable'])
{
$this->_auto_register();
}
if(!$this->UserInfo)
{
$this->_setError('UserInfo is empty');
}
if(!$this->Message)
{
$this->_setError('Message is empty');
}
$this->MessageId = abs(crc32(md5($this->Message)));
$_event_type = 'receive';
$UserInfoSets = array();
$UserInfoSets[$_event_type .'_times'] = '+1';
$UserInfoSets['last_'.$_event_type .'_time'] = $this->_timestamp;
$UserInfoSets['last_'.$_event_type .'_message_id'] = $this->MessageId;
if($this->MessageId == $this->UserInfo['last_'.$_event_type .'_message_id'])
{
if($this->UserInfo['last_'.$_event_type .'_time'] +60 >$this->_timestamp)
{
}
}
else
{
if($this->UserInfo['last_'.$_event_type .'_time'] +6 >$this->_timestamp)
{
}
}
$this->_sms_client_user($UserInfoSets);
DB::query("insert into ".TABLE_PREFIX."sms_receive_log (`uid`,`username`,`dateline`,`mobile`,`message`,`msg_id`,`status`) values ('{$this->UserInfo['uid']}','{$this->UserInfo['username']}','{$this->_timestamp}','{$this->Sender}','".addslashes($this->Message)."','','')");
$this->_log_id = DB::insert_id();
$this->_sms_sys_code();
$this->_sms_send($this->_sms_api_message());
}
function _sms_send($message='')
{
if($message)
{
sms_send($this->Sender,$message);
}
else
{
$this->_setError('send message is empty');
}
if($this->Config['sms_extra_enable'])
{
if(!function_exists('sms_extra_exit'))
{
Load::functions('sms_extra');
}
echo sms_extra_exit();
}
exit;
}
function _init_vars()
{
$this->Sender = $this->Inputs['mobile'];
$this->Message = trim(strip_tags($this->Inputs['content']));
}
function _init_app()
{
$failedlogins = DB::fetch_first("select * from ".sms_table('sms_failedlogins')." where `ip`='{$this->_ip}'");
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
DB::query("delete from ".sms_table('sms_failedlogins')." where `ip`='{$this->_ip}'");
}
}
$app_id     = (int) $this->Inputs['app_id'];
$app_key    = trim($this->Inputs['app_key']);
if($app_id <1 ||$app_id!=SMS_APP_ID ||!$app_key ||$app_key!=SMS_APP_KEY)
{
if($failedlogins)
{
DB::query("update ".sms_table('sms_failedlogins')." set `count`=`count`+1,`lastupdate`='{$this->_timestamp}' where `ip`='{$this->_ip}'");
}
else
{
DB::query("insert into ".sms_table('sms_failedlogins')." (`ip`,`count`,`lastupdate`) values ('{$this->_ip}','1','{$this->_timestamp}')");
}
$this->_setError('app_id or app_key is invalid');
}
}
function _sms_sys_code()
{
if ($this->_sys_code_prefix==substr($this->Message,0,strlen($this->_sys_code_prefix)))
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
$allow_sys_codes['mm'] = $allow_sys_codes['reset_password'] = 'reset_password';
$allow_sys_codes['ton'] = $allow_sys_codes['toff'] = $allow_sys_codes['pon'] = $allow_sys_codes['poff'] = $allow_sys_codes['mon'] = $allow_sys_codes['moff'] = $allow_sys_codes['fon'] = $allow_sys_codes['foff'] = $allow_sys_codes['on'] = $allow_sys_codes['off'] = 'on_off';
if(isset($allow_sys_codes[$this->_sys_code]))
{
$sys_code_method = "_sms_sys_code_".$allow_sys_codes[$this->_sys_code];
if(method_exists($this,$sys_code_method))
{
$this->_sms_send($this->$sys_code_method());
}
}
$this->_setError('sys_code is invalid');
}
}
function _sms_sys_code_help()
{
$sms_var_001 = '';
if($GLOBALS['sms_sys_config']['sms']['t_enable'])
{
$sms_var_001 = "{$this->_sys_code_prefix}TOFF/{$this->_sys_code_prefix}TON 关闭/开启@我的提醒;";
}
$sms_var_002 = '';
if($GLOBALS['sms_sys_config']['sms']['p_enable'])
{
$sms_var_002 = "{$this->_sys_code_prefix}POFF/{$this->_sys_code_prefix}PON 关闭/开启新评论提醒;";
}
$sms_var_003 = '';
if($GLOBALS['sms_sys_config']['sms']['m_enable'])
{
$sms_var_003 = "{$this->_sys_code_prefix}MOFF/{$this->_sys_code_prefix}MON 关闭/开启新私信提醒;";
}
$sms_var_004 = '';
if($GLOBALS['sms_sys_config']['sms']['f_enable'])
{
$sms_var_004 = "{$this->_sys_code_prefix}FOFF/{$this->_sys_code_prefix}FON 关闭/开启新粉丝提醒;";
}
$sms_var_005 = '';
if(("{$sms_var_001}{$sms_var_002}{$sms_var_003}{$sms_var_004}"))
{
$sms_var_005 = "{$this->_sys_code_prefix}OFF/{$this->_sys_code_prefix}ON 关闭/开启以上所有消息提醒;";
}
return "{$this->_sys_code_prefix}CXBD/{$this->_sys_code_prefix}QXBD 查询/取消绑定;{$sms_var_001}{$sms_var_002}{$sms_var_003}{$sms_var_004}{$sms_var_005}{$this->_sys_code_prefix}MM{$this->_sys_code_separator}新的密码 修改帐号对应的密码";
}
function _sms_sys_code_test()
{
return "【测试成功】现在时间：".date("Y-m-d H:i:s");
}
function _sms_sys_code_api_connect_test()
{
;
}
function _sms_sys_code_reset_password()
{
if(!sms_has_bind($this->UserInfo))
{
return "{$this->Sender}，您的手机号与帐号还未绑定";
}
if($this->UserInfo['last_reset_password_time'] +86400 >$this->_timestamp)
{
return "您的手机在最近的２４小时之内已经执行过重设密码的操作";
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
$this->_sms_client_user($UserInfoSets);
}
return "您{$this->UserInfo['username']}的密码已经修改为“{$password}”，请牢记您的新密码，并注意保管";
}
function _sms_sys_code_on_off()
{
if(!sms_has_bind($this->UserInfo))
{
return "{$this->Sender}，您的手机号与帐号还未绑定";
}
$UserInfoSets = array();
$enable = ('on'==substr($this->_sys_code,-2) ?1 : ('off'==substr($this->_sys_code,-3) ?0 : null));
if(!is_null($enable))
{
$_tipk = $_tipv = '';
$_allows = array('t'=>'@我的','p'=>'新评论','m'=>'新私信','f'=>'新粉丝',);
if('on'==$this->_sys_code ||'off'==$this->_sys_code)
{
$_tipv = '全部';
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
$_tipk = strtoupper($_k);
$_tipv = $_allows[$_k];
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
$this->_sms_client_user($UserInfoSets);
return "设置成功，{$_tipv}提醒已".($enable ?"开启": "关闭") ."，回复{$this->_sys_code_prefix}{$_tipk}".($enable ?"OFF 关闭": "ON 开启")."{$_tipv}提醒";
}
}
function _sms_sys_code_check_bind()
{
if(!sms_has_bind($this->UserInfo))
{
return "{$this->Sender}，您的手机号与帐号还未绑定";
}
return "{$this->Sender}已绑定【{$this->UserInfo['uid']}】{$this->UserInfo['username']}";
}
function _sms_sys_code_unbind()
{
if(!sms_has_bind($this->UserInfo))
{
return "{$this->Sender}，您的手机号与帐号还未绑定";
}
$UserInfoSets = array();
$UserInfoSets['user_im'] = '';
$UserInfoSets['last_try_bind_time'] = 0;
$UserInfoSets['share_time'] = 0;
$this->_sms_client_user($UserInfoSets);
DB::query("update `".TABLE_PREFIX."members` set `phone`='' where `uid`='{$this->UserInfo['uid']}'");
return "成功取消绑定";
}
function _sms_sys_code_bind()
{
if(sms_has_bind($this->UserInfo))
{
return "{$this->Sender}已绑定【{$this->UserInfo['uid']}】{$this->UserInfo['username']}";;
}
list($app_id,$uid,$key) = explode($this->_sys_code_separator,$this->Message);
$app_id = (int) $app_id;
$uid = (int) $uid;
$key = substr(trim($key),0,32);
if($app_id <1 ||$uid <1 ||$app_id!=SMS_APP_ID ||$key!=md5(SMS_APP_ID .$uid .SMS_APP_KEY))
{
return "绑定代码无效";
}
if($this->UserInfo['last_try_bind_time'] +7200 >$this->_timestamp)
{
return "您的手机在最近的２小时之内已经执行过绑定帐号的操作";
}
$member_info = $this->_member_info($uid);
if(!$member_info)
{
return "绑定失败";
}
$user_info = sms_client_user($uid);
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
DB::query("delete from ".sms_table('sms_client_user')." where `id`='{$user_info['id']}'");
}
}
$UserInfoSets = array();
$UserInfoSets['uid'] = $member_info['uid'];
$UserInfoSets['username'] = $member_info['username'];
$UserInfoSets['try_bind_times'] = '+1';
$UserInfoSets['last_try_bind_time'] = $this->_timestamp;
$this->_sms_client_user($UserInfoSets);
return "绑定成功";
}
function _setError($str,$strOutput=false)
{
sms_errors($str);
$_allow_actions = array(
'api_connect_test'=>1,
'debug'=>1,
);
if($this->Inputs['action'] &&isset($_allow_actions[$this->Inputs['action']]))
{
$this->_error_output();
}
if($strOutput)
{
exit($str);
}
else
{
if($this->Config['sms_extra_enable'])
{
if(!function_exists('sms_extra_exit'))
{
Load::functions('sms_extra');
}
echo sms_extra_exit();
exit;
}
else
{
exit('<result>error</result>');
}
}
}
function _error_output()
{
sms_errors_output();
}
function _member_info($uid=0)
{
$uid = (int) $uid;
$member_info = $this->_caches['member_info'][$uid];
if(is_null($member_info))
{
$member_info = DB::fetch_first("select * from ".sms_table('members')." where `uid`='$uid'");
}
return $member_info;
}
function _auto_register()
{
if($this->UserInfo)
{
return ;
}
$username = $this->Sender;
$username{4}= $username{5}= $username{6}= 'x';$password = mt_rand();
$email = $this->Sender .'@139.com';
$role_id = $this->Config['normal_default_role_id'];
$ret = jsg_member_register($username,$password,$email,'',0,$role_id);
if($ret >0)
{
$user_info = sms_client_user($ret);
$sets = array(
'username'=>$username,
'user_im'=>$this->Sender,
'bind_key'=>0,
'bind_key_time'=>0,
'try_bind_times'=>'+1',
'last_try_bind_time'=>time(),
);
sms_client_user_update($sets,$user_info);
$this->UserInfo = $this->_sms_client_user();
sms_send($this->Sender,"注册成功，您的用户名 $username 密码 $password ");
}
}
function _sms_client_user($sets=array())
{
$user_info = _sms_client_user($this->Sender);
if($sets &&$user_info)
{
sms_client_user_update($sets,$user_info);
}
return $user_info;
}
function _sms_api_message()
{
if(!sms_has_bind($this->UserInfo))
{
return "{$this->Sender}，您的手机号与帐号还未绑定";
}
$message = $this->Message;
$sms_cmd = $GLOBALS['sms_sys_config']['sms']['send_update_cmd'];
if ((!$sms_cmd) ||($sms_cmd==substr($message,0,strlen($sms_cmd))))
{
if($sms_cmd)
{
$message = trim(substr($message,strlen($sms_cmd)));
}
if($message &&($member_info = $this->_member_info($this->UserInfo['uid'])))
{
define(MEMBER_ID,max(0,(int) $member_info['uid']));
define(MEMBER_NAME,$member_info['username']);
$TopicLogic = Load::logic('topic',1);
$datas = array(
'content'=>$message,
'from'=>'sms',
);
$add_result = $TopicLogic->Add($datas);
$success = ((is_array($add_result) &&count($add_result)));
if(!$success)
{
$this->_setError('_sms_api_message add_result is invalid'."[{$add_result}]");
}
else
{
if($this->_log_id >0)
{
DB::query("update ".TABLE_PREFIX."sms_receive_log set `tid`='{$add_result['tid']}' where `id`='{$this->_log_id}'");
}
}
if($this->Config['sms']['r_enable'] ||!isset($this->Config['sms']['r_enable'])) {
return "内容发布".($success ?"成功": "失败");
}else {
return false;
}
}
else
{
$this->_setError('_sms_api_message message is empty or member_info is invalid');
return false;
}
}
else
{
if(($this->UserInfo['last_receive_time'] +180) <$this->_timestamp)
{
return "发布内容请按以下格式“{$sms_cmd}您要发布的内容”，查看帮助请对我发送“{$this->_sys_code_prefix}HELP”";
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
preg_match('/[\d\.]{7,15}/',$onlineip,$onlineipmatches);
$onlineip = $onlineipmatches[0] ?$onlineipmatches[0] : 'unknown';
return $onlineip;
}
}

?>
