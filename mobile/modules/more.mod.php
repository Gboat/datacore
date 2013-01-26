<?php
/*******************************************************************
 * [JishiGou] (C)2005 - 2099 INET Inc.
 *
 * This is NOT a freeware, use is subject to license terms
 *
 * @Filename more.mod.php $
 *
 * @Author http://inet.hitwh.edu.cn $
 *
 * @Date 2012-04-28 05:53:06 17110058 1986834442 789 $
 *******************************************************************/




if (!defined('IN_JISHIGOU')) {
    exit('Access Denied');
}

class ModuleObject extends MasterObject
{
	var $CacheConfig;

	function ModuleObject($config)
	{
		$this->MasterObject($config);
		$this->CacheConfig = ConfigHandler::get('cache');
				Mobile::is_login();
		$this->Execute();
	}

	
	function Execute()
	{
		ob_start();
		switch ($this->Code) {
			case "about":
				$this->about();
				break;
			default:
				$this->main();
		}
		$body=ob_get_clean();
		echo $body;
	}
	
	function main()
	{
		include(template('more'));
	}
	
	function about()
	{
		include(template('about'));
	}
}
?>