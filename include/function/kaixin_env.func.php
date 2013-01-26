<?php
/**
 * 文件名：kaixin_env.func.php
 * 版本号：1.0
 * 最后修改时间：2011年9月19日
 * 作者：狐狸<foxis@qq.com>
 * 功能描述: 开心接口函数
 */
if(!defined('IN_JISHIGOU'))
{
    exit('invalid request');
}



function kaixin_env()
{    
	$msgs = array();
    if(!defined('ROOT_PATH'))
    {
        define('ROOT_PATH', substr(dirname(__FILE__), 0, -17) . '/');
    }
	
	
	$files = array(ROOT_PATH . 'include/lib/oauth2.han.php', ROOT_PATH . 'include/function/kaixin.func.php', ROOT_PATH . 'modules/kaixin.mod.php', );
	foreach ($files as $f)
	{
		if (!is_file($f)) 
		{
			$msgs[] = "文件<b>{$f}</b>不存在";
		}
	}
	
	
	$funcs = array('version_compare',array('fsockopen', 'pfsockopen'),'curl_init','preg_replace',array('iconv','mb_convert_encoding'),array("hash_hmac","mhash"));
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
	
	
	
	if (version_compare(PHP_VERSION,'4.3') < 0) 
	{
		$msgs[] = "PHP版本需要<b>4.3</b>及以上";
	}
	
	
	
	$files = array(ROOT_PATH . 'setting/', ROOT_PATH . 'setting/settings.php', ROOT_PATH . 'setting/kaixin.php', ROOT_PATH . './data/cache/', );
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
				if(!(file_exists($file) && @unlink($file)))
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
	
	
	
	$config = array();
    include(ROOT_PATH . 'setting/settings.php');
    if(!defined('TABLE_PREFIX'))
    {
        define('TABLE_PREFIX',$config['db_table_prefix']);
    }
    $db_charset = str_replace("-","",$config['charset']);
	include_once(ROOT_PATH . 'include/xwb/lib/xwbDB.class.php');
	$db = new xwbDB();
	$db->connect(($config['db_host'] . ($config['db_port'] ? ":{$config['db_port']}" : "")),$config['db_user'],$config['db_pass'],$config['db_name'],$config['db_persist'],true,$db_charset);
	if (!$db) 
	{
		$msgs[] = "数据库连接失败";
	}
	else 
	{
		$query = $db->query("select count(*) from ".TABLE_PREFIX."kaixin_bind_info",'SKIP_ERROR');
		if (!$query && '1146'==$db->errno()) 
		{
			$query = $db->query("CREATE TABLE `".TABLE_PREFIX."kaixin_bind_info` (
  `uid` int(10) unsigned NOT NULL,
  `kaixin_uid` char(32) NOT NULL default '',
  `kaixin_name` char(32) NOT NULL default '',
  `kaixin_gender` char(64) NOT NULL default '',
  `kaixin_logo50` char(32) NOT NULL default '',
  `token` char(128) NOT NULL default '',
  `token_time` int(10) NOT NULL,
  `token_expire` int(10) NOT NULL,
  `dateline` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`uid`),
  UNIQUE KEY `renren_uid` (`kaixin_uid`)
) ".(mysql_get_server_info() > '4.1' ? " ENGINE=MyISAM DEFAULT CHARSET=$db_charset" : " TYPE=MyISAM"));
		}
		if (!$query) 
		{
			$msgs[] = "数据表<b>".TABLE_PREFIX."kaixin_bind_info</b>创建失败";
		}
		
		$query = $db->query("select count(*) from ".TABLE_PREFIX."kaixin_bind_topic",'SKIP_ERROR');
		if (!$query && '1146'==$db->errno()) 
		{
			$query = $db->query("CREATE TABLE `".TABLE_PREFIX."kaixin_bind_topic` (
  `tid` int(10) unsigned NOT NULL,
  `kaixin_id` bigint(20) unsigned NOT NULL,
  KEY `tid` (`tid`),
  KEY `kaixin_id` (`kaixin_id`)
) ".(mysql_get_server_info() > '4.1' ? " ENGINE=MyISAM DEFAULT CHARSET=$db_charset" : " TYPE=MyISAM"));
		}
		if (!$query) 
		{
			$msgs[] = "数据表<b>".TABLE_PREFIX."kaixin_bind_topic</b>创建失败";
		}		
		
	}
		
	
    return $msgs;
}

?>