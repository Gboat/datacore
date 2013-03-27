<?php

if(!defined('IN_DATACORE'))
{
exit('invalid request');
}
class MasterObject
{
var $Config=array();
var $DatabaseHandler;
var $MemberHandler;
var $Inputs = array();
function MasterObject(&$config)
{
if(!$config['sms_enable']) {
exit('SMS功能没有启用');
}else {
require ROOT_PATH .'setting/sms.php';
}
$this->Config=$config;
if(!(sms_init($this->Config)))
{
exit('sms_init is invalid');
}
$this->init_inputs();
include_once ROOT_PATH .'include/db/database.db.php';
include_once ROOT_PATH .'include/db/mysql.db.php';
$this->DatabaseHandler = new MySqlHandler($this->Config['db_host'],$this->Config['db_port']);
$this->DatabaseHandler->Charset($this->Config['charset']);
$this->DatabaseHandler->doConnect($this->Config['db_user'],$this->Config['db_pass'],$this->Config['db_name'],$this->Config['db_persist']);
Obj::register('DatabaseHandler',$this->DatabaseHandler);
include_once ROOT_PATH .'include/lib/member.han.php';
$this->MemberHandler = new MemberHandler();
Obj::register("MemberHandler",$this->MemberHandler);
}
function init_inputs()
{
$inputs = array();
if ($_GET)
{
foreach ($_GET as $_k=>$_v)
{
$inputs[$_k] = $_v;
}
unset($_GET);
}
if ($_POST)
{
foreach ($_POST as $_k=>$_v)
{
$inputs[$_k] = $_v;
}
unset($_POST);
}
$inputs = array_iconv(($inputs['input_charset'] ?$inputs['input_charset'] : "GBK"),$this->Config['charset'],$inputs);
if($this->Config['sms_extra_enable'])
{
if(!function_exists('sms_extra_inputs'))
{
Load::functions('sms_extra');
}
$inputs = sms_extra_inputs($inputs);
}
$this->Inputs = $inputs;
unset($inputs);
}
}

?>
