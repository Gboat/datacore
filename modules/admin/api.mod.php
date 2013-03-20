<?php

if(!defined('IN_JISHIGOU'))
{
exit('invalid request');
}
class ModuleObject extends MasterObject
{
function ModuleObject($config)
{
$this->MasterObject($config);
$this->Execute();
}
function Execute()
{
switch($this->Code)
{
case 'do_modify_setting':
{
$this->DoModifySetting();
break;
}
case 'modify':
{
$this->Modify();
break;
}
case 'do_modify':
{
$this->DoModify();
break;
}
case 'status0':
case 'status1':
{
$this->Status();
break;
}
case 'delete':
{
$this->Delete();
break;
}
default :
{
$this->Main();
break;
}
}
}
function Main()
{
$api = $api_config = ConfigHandler::get('api');
if(!$api_config)
{
$api_config = array
(
'enable'=>0,
'from_enable'=>1,
);
ConfigHandler::set('api',$api_config);
}
Load::lib('form');
$FormHandler = new FormHandler();
$app_enable_radio = $FormHandler->YesNoRadio('api[enable]',(int) ($api_config['enable'] &&$this->Config['api_enable']));
$app_from_enable_radio = $FormHandler->YesNoRadio('api[from_enable]',(int) $api_config['from_enable']);
$query = $this->DatabaseHandler->Query("select * from ".TABLE_PREFIX."app");
$app_list = array();
while(false != ($row = $query->GetRow()))
{
$row['last_request_time_html'] = my_date_format($row['last_request_time']);
$row['status_html'] = ($row['status'] ?'正常': '暂停');
$app_list[] = $row;
}
include($this->TemplateHandler->Template('admin/api'));
}
function DoModifySetting()
{
$app_name_new = trim(strip_tags($this->Post['app_name_new']));
if($app_name_new)
{
$app_key = abs(crc32(md5(random(128))));
$app_secret = md5(random(128));
$status = 1;
$this->DatabaseHandler->Query("insert into ".TABLE_PREFIX."app (`uid`,`username`,`app_name`,`app_key`,`app_secret`,`status`) values ('".MEMBER_ID."','".MEMBER_NAME."','$app_name_new','$app_key','$app_secret','$status')");
$app_id = $this->DatabaseHandler->Insert_ID();
$this->Messager(null,"admin.php?mod=api&code=modify&id=$app_id");
}
$api = $this->Post['api'];
$api_config_default = $api_config = ConfigHandler::get('api');
$api_config['enable'] = ($api['enable'] ?1 : 0);
$api_config['from_enable'] = ($api['from_enable'] ?1 : 0);
$api_config['request_times_day_limit'] = (is_numeric($api['request_times_day_limit']) ?$api['request_times_day_limit'] : 0);
if($api_config_default != $api_config)
{
ConfigHandler::set('api',$api_config);
}
if($api_config['enable']!=$this->Config['api_enable'])
{
ConfigHandler::update('api_enable',$api_config['enable']);
}
$this->Messager("修改成功");
}
function Modify()
{
$id = max(0,(int) get_param('id'));
if(!$id)
{
$this->Messager("请指定一个ID",null);
}
$app = $this->DatabaseHandler->FetchFirst("select * from ".TABLE_PREFIX."app where `id`='$id' ");
if(!$app)
{
$this->Messager("请指定一个正确的ID",null);
}
Load::lib('form');
$FormHandler = new FormHandler();
$app_show_from_radio = $FormHandler->YesNoRadio('app_show_from',$app['show_from']);
$app_status_radio = $FormHandler->YesNoRadio('app_status',$app['status']);
include($this->TemplateHandler->Template('admin/api'));
}
function DoModify()
{
$id = max(0,(int) get_param('id'));
if(!$id)
{
$this->Messager("请指定一个ID",null);
}
$app = $this->DatabaseHandler->FetchFirst("select * from ".TABLE_PREFIX."app where `id`='$id'");
if(!$app)
{
$this->Messager("请指定一个正确的ID",null);
}
$app_name = trim(strip_tags(get_param('app_name')));
$source_url = trim(strip_tags(get_param('source_url')));
$app_desc = trim(strip_tags(get_param('app_desc')));
$show_from = get_param('app_show_from') ?1 : 0;
$status = get_param('app_status') ?1 : 0;
$this->DatabaseHandler->Query("update ".TABLE_PREFIX."app set 
        `app_name`='$app_name',
        `source_url`='$source_url',
        `app_desc`='$app_desc',
        `show_from`='$show_from',
        `status`='$status' 
        where `id`='$id'");
$cache_id = "app/app_id_{$id}";
cache($cache_id,0);
Load::model('cache/file')->del($cache_id);
$this->Messager("修改成功");
}
function Status()
{
$id = max(0,(int) get_param('id'));
if(!$id)
{
$this->Messager("请指定一个ID",null);
}
$app = $this->DatabaseHandler->FetchFirst("select * from ".TABLE_PREFIX."app where `id`='$id'");
if(!$app)
{
$this->Messager("请指定一个正确的ID",null);
}
$status = ('status0'==$this->Code ?0 : 1);
$this->DatabaseHandler->Query("update ".TABLE_PREFIX."app set `status`='$status' where `id`='$id'");
$cache_id = "app/app_id_{$id}";
cache($cache_id,0);
Load::model('cache/file')->del($cache_id);
$this->Messager("设置成功");
}
function Delete()
{
$id = max(0,(int) get_param('id'));
if(!$id)
{
$this->Messager("请指定一个ID",null);
}
$app = $this->DatabaseHandler->FetchFirst("select * from ".TABLE_PREFIX."app where `id`='$id'");
if(!$app)
{
$this->Messager("请指定一个正确的ID",null);
}
$this->DatabaseHandler->Query("delete from ".TABLE_PREFIX."app where `id`='$id'");
$this->Messager("删除成功");
}
}

?>
