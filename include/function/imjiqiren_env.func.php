<?php

if(!defined('IN_DATACORE'))
{
exit('invalid request');
}
function imjiqiren_env()
{
$msgs = array();
if(!defined('ROOT_PATH'))
{
define('ROOT_PATH',substr(dirname(__FILE__),0,-17) .'/');
}
$files = array(ROOT_PATH .'imjiqiren.php',ROOT_PATH .'include/function/imjiqiren.func.php',ROOT_PATH .'include/function/imjiqiren_env.func.php',ROOT_PATH .'modules/imjiqiren/master.mod.php',ROOT_PATH .'modules/imjiqiren/imjiqiren.mod.php',ROOT_PATH .'modules/imjiqiren.mod.php',ROOT_PATH .'modules/admin/imjiqiren.mod.php',ROOT_PATH .'include/lib/imjiqiren_db.class.php',);
foreach ($files as $f)
{
if (!is_file($f))
{
$msgs[] = "文件<b>{$f}</b>不存在";
}
}
$funcs = array('version_compare',array('fsockopen','pfsockopen'),array('iconv','mb_convert_encoding'),);
foreach ($funcs as $func)
{
if (!is_array($func))
{
if (!function_exists($func))
{
$msgs[] = "函数<b>{$func}</b>不可用";
}
}
else
{
$t = false;
foreach ($func as $f)
{
if(function_exists($f))
{
$t = true;
break;
}
}
if (!$t)
{
$msgs[] = "函数<b>".implode(" , ",$func)."</b>都不可用";
}
}
}
if (version_compare(PHP_VERSION,'4.3') <0)
{
$msgs[] = "PHP版本需要<b>4.3</b>及以上";
}
$files = array(ROOT_PATH .'setting/',ROOT_PATH .'setting/settings.php',ROOT_PATH .'setting/imjiqiren.php',ROOT_PATH .'./data/cache/',);
foreach ($files as $file)
{
$test_file_name = "write_test_".date("Ymd").".test";
if (is_dir($file))
{
$test_file = "{$file}/{$test_file_name}";
if (!(@file_put_contents($test_file,$test_file_name)))
{
$msgs[] = "目录<b>{$file}</b>不可写";
}
else
{
if(!(@unlink($test_file)))
{
$msgs[] = "目录<b>{$file}</b>没有删除文件的权限";
}
}
}
else
{
if (!(file_exists($file)))
{
@file_put_contents($file,$test_file_name);
if(!(file_exists($file) &&@unlink($file)))
{
$msgs[] = "文件<b>{$file}</b>不可写";
}
}
else
{
if(!($fp = fopen($file,'a+')))
{
$msgs[] = "文件<b>{$file}</b>不可写";
}
@fclose($fp);
}
}
}
include(ROOT_PATH .'setting/settings.php');
if(!defined('TABLE_PREFIX'))
{
define('TABLE_PREFIX',$config['db_table_prefix']);
}
include_once(ROOT_PATH .'include/lib/imjiqiren_db.class.php');
$db = new imjiqiren_client_db();
$db->connect(($config['db_host'] .($config['db_port'] ?":{$config['db_port']}": "")),$config['db_user'],$config['db_pass'],$config['db_name'],str_replace("-","",$config['charset']),$config['db_persist']);
if (!$db)
{
$msgs[] = "数据库连接失败";
}
else
{
$query = $db->query("select count(*) from ".TABLE_PREFIX."imjiqiren_client_user",'SILENT');
if (!$query &&'1146'==$db->errno())
{
$query = $db->query("CREATE TABLE `".TABLE_PREFIX."imjiqiren_client_user` (
`id` int(10) unsigned NOT NULL auto_increment,
`uid` int(10) unsigned NOT NULL default '0',
`username` char(30) NOT NULL default '',
`user_im` int(10) unsigned NOT NULL default '0',
`try_bind_times` int(10) unsigned NOT NULL default '0',
`last_try_bind_time` int(10) unsigned NOT NULL default '0',
`send_times` int(10) unsigned NOT NULL default '0',
`last_send_time` int(10) unsigned NOT NULL default '0',
`last_send_message_id` int(10) unsigned NOT NULL default '0',
`stop_receive` tinyint(1) unsigned NOT NULL default '0',
`receive_times` int(10) unsigned NOT NULL default '0',
`last_receive_time` int(10) unsigned NOT NULL default '0',
`last_receive_message_id` int(10) unsigned NOT NULL default '0',
`stop_sign_update` tinyint(1) unsigned NOT NULL default '0',
`sign_update_times` int(10) unsigned NOT NULL default '0',
`last_sign_update_time` int(10) unsigned NOT NULL default '0',
`last_sign_update_message_id` int(10) unsigned NOT NULL default '0',
`reset_password_times` int(10) unsigned NOT NULL default '0',
`last_reset_password_time` int(10) unsigned NOT NULL default '0',
`dateline` int(10) unsigned NOT NULL default '0',
`enable` tinyint(1) unsigned NOT NULL default '1',
`t_enable` tinyint(1) unsigned NOT NULL default '1',
`p_enable` tinyint(1) unsigned NOT NULL default '1',
`m_enable` tinyint(1) unsigned NOT NULL default '1',
`f_enable` tinyint(1) unsigned NOT NULL default '1',
`share_time` int(10) unsigned NOT NULL default '0',
PRIMARY KEY  (`id`),
KEY `uid` (`uid`),
KEY `user_im` (`user_im`)
) ENGINE=MyISAM");
}
if (!$query)
{
$msgs[] = "数据表<b>".TABLE_PREFIX."imjiqiren_client_user</b>不存在或创建失败";
}
$query = $db->query("select count(*) from ".TABLE_PREFIX."imjiqiren_failedlogins",'SILENT');
if (!$query &&'1146'==$db->errno())
{
$query = $db->query("CREATE TABLE `".TABLE_PREFIX."imjiqiren_failedlogins` (
`ip` CHAR(15) NOT NULL default '',
`count` TINYINT(1) UNSIGNED NOT NULL default '0',
`lastupdate` INT(10) UNSIGNED NOT NULL default '0',
PRIMARY KEY  (`ip`)
) ENGINE=MyISAM");
}
if (!$query)
{
$msgs[] = "数据表<b>".TABLE_PREFIX."imjiqiren_failedlogins</b>不存在或创建失败";
}
$query = $db->query("select count(*) from ".TABLE_PREFIX."imjiqiren_send_queue",'SILENT');
if (!$query &&'1146'==$db->errno())
{
$query = $db->query("CREATE TABLE `".TABLE_PREFIX."imjiqiren_send_queue` (
`to` int(10) unsigned NOT NULL default '0',
`message` text NOT NULL default '',
`salt` char(10) NOT NULL default '',
`dateline` int(10) unsigned NOT NULL default '0',
UNIQUE KEY `to` (`to`),
KEY `dateline` (`dateline`)
) ENGINE=MyISAM");
}
if (!$query)
{
$msgs[] = "数据表<b>".TABLE_PREFIX."imjiqiren_send_queue</b>不存在或创建失败";
}
}
return $msgs;
}

?>
