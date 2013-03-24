<?php

if(!defined('IN_DATACORE'))
{
exit('invalid request');
}
class ModuleObject extends MasterObject
{
function ModuleObject($config)
{
$this->MasterObject($config);
if(!sms_init($this->Config))
{
response_text('短信功能未开启');
}
$this->Execute();
}
function Execute()
{
ob_start();
switch($this->Code)
{
case 'bind':
$this->Bind();
break;
case 'bind_verify':
$this->BindVerify();
break;
case 'vars':
$this->Vars();
break;
case 'register_verify':
$this->RegisterVerify();
break;
case 'check_register_verify':
$this->CheckRegisterVerify();
break;
default:
$this->Main();
break;
}
response_text(ob_get_clean());
}
function Main()
{
response_text('正在建设中……');
}
function Bind()
{
$this->_sms_init_user();
$sms_num = $this->Post['sms_num'];
if(!sms_is_phone($sms_num))
{
js_alert_output('请输入正确的手机号码');
}
if(($_user_info = _sms_client_user($sms_num)) &&$_user_info['uid'] &&$_user_info['uid']!=MEMBER_ID)
{
js_alert_output('此手机号已经绑定了其他的帐号');
}
$user_info = sms_client_user(MEMBER_ID);
$sms_has_bind = sms_has_bind($user_info);
if($sms_has_bind)
{
js_alert_output('您的帐号已经绑定了手机号');
}
if($user_info['bind_key_time'] +60 >time())
{
js_alert_output('60秒内仅发送一次，请稍候再试');
}
$bind_key = mt_rand(100000,999999);
$sets = array(
'username'=>MEMBER_NAME,
'user_im'=>$sms_num,
'bind_key'=>$bind_key,
'bind_key_time'=>time(),
);
sms_client_user_update($sets,$user_info);
$sms_msg = "您的验证码为 {$bind_key}";
sms_send($sms_num,$sms_msg,MEMBER_ID);
}
function BindVerify()
{
$this->_sms_init_user();
$bind_key = $this->Post['bind_key'];
if(!is_numeric($bind_key))
{
js_alert_output('请输入正确的验证码');
}
$user_info = sms_client_user(MEMBER_ID);
$sms_has_bind = sms_has_bind($user_info);
if($sms_has_bind)
{
js_alert_output('您的帐号已经绑定了手机号');
}
if($bind_key!=$user_info['bind_key'])
{
js_alert_output('验证码输入错误');
}
if($user_info['bind_key_time'] +7200 <time())
{
js_alert_output('验证码已经过期了，请重新发起验证');
}
$sets = array(
'bind_key'=>0,
'bind_key_time'=>0,
'try_bind_times'=>'+1',
'last_try_bind_time'=>time(),
);
sms_client_user_update($sets,$user_info);
$this->DatabaseHandler->Query("update `".TABLE_PREFIX."members` set `phone`='{$user_info['user_im']}' where `uid`='".MEMBER_ID."'");
$sms_msg = "您的手机号已与帐号 {$user_info['username']} 绑定成功";
sms_send($user_info['user_im'],$sms_msg);
}
function Vars()
{
$this->_sms_init_user();
$return = '';
$sms_config = ConfigHandler::get('sms');
$sms_config_new = $sms_config;
if($sms_config['app_key'] &&$sms_config['sms_id'])
{
$sms_vars = array();
if($this->Config['sms_extra_enable'])
{
if(!function_exists('sms_extra_vars'))
{
Load::functions('sms_extra');
}
$sms_vars = sms_extra_vars();
}
else 
{
$sms_vars = sms_client_post(array('step'=>'vars'));
}
if($sms_vars)
{
foreach($sms_vars as $k=>$v)
{
if($sms_config_new[$k] != $v)
{
$sms_config_new[$k] = $v;
}
}
}
}
else
{
$sms_config_new['surplus'] = 0;
$sms_config_new['surplus_html'] = '';
}
if($sms_config_new != $sms_config)
{
ConfigHandler::set('sms',$sms_config_new);
$sms_config = $sms_config_new;
}
$get = ($this->Post['get'] ?$this->Post['get'] : $this->Get['get']);
$return = ($sms_config[$get] ?$sms_config[$get] : $sms_config['surplus_html']);
response_text($return);
}
function RegisterVerify()
{
if(!$this->Config['sms_register_verify_enable'])
{
js_alert_output('注册时短信验证功能未开启');
}
$sms_num = $this->Post['sms_num'];
if(!sms_is_phone($sms_num))
{
js_alert_output('请输入正确的手机号码');
}
if(($_user_info = _sms_client_user($sms_num)) &&$_user_info['uid'])
{
js_alert_output('此手机号已经绑定了其他的帐号');
}
if($_user_info['bind_key_time'] +60 >time())
{
js_alert_output('60秒内仅发送一次，请稍候再试');
}
$bind_key = mt_rand(100000,999999);
$sets = array(
'user_im'=>$sms_num,
'bind_key'=>$bind_key,
'bind_key_time'=>time(),
);
sms_client_user_update($sets,$_user_info);
$sms_msg = "您的验证码为 {$bind_key}";
sms_send($sms_num,$sms_msg,0);
}
function CheckRegisterVerify()
{
if(!$this->Config['sms_register_verify_enable'])
{
js_alert_output('注册时短信验证功能未开启');
}
$sms_num = $this->Post['sms_num'];
$bind_key = $this->Post['bind_key'];
$ret = sms_check_bind_key($sms_num,$bind_key);
if($ret)
{
js_alert_output($ret);
}
}
function _sms_init_user()
{
$this->initMemberHandler();
if(MEMBER_ID <1)
{
response_text('登录后才能继续操作');
}
}
}

?>
