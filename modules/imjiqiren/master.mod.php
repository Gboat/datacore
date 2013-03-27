<?php

if(!defined('IN_DATACORE'))
{
exit('invalid request');
}
class MasterObject
{
var $Config=array();
var $DatabaseHandler;
var $Inputs = array();
function MasterObject(&$config)
{
if(!$config['imjiqiren_enable']) {
exit('IMJIQIREN功能没有启用');
}else {
require ROOT_PATH .'setting/imjiqiren.php';
}
$this->Config=$config;
if(!(imjiqiren_init($this->Config)))
{
exit('imjiqiren_init is invalid');
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
$inputs = array_iconv(($inputs['input_charset'] ?$inputs['input_charset'] : "UTF-8"),$this->Config['charset'],$inputs);
$this->Inputs = $inputs;
unset($inputs);
}
}

?>
