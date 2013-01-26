<?php
/*******************************************************************
 * [JishiGou] (C)2005 - 2099 INET Inc.
 *
 * This is NOT a freeware, use is subject to license terms
 *
 * @Filename square.mod.php $
 *
 * @Author http://inet.hitwh.edu.cn $
 *
 * @Date 2012-04-28 05:53:06 852308866 1717530668 830 $
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
		$this->Execute();
	}

	
	function Execute()
	{
		ob_start();
		switch($this->Code) {
			case '3g':
				$this->gsquare();
				break;
			default:
				$this->main();
				break;
		}
		$body=ob_get_clean();
		echo $body;
	}
	
	function main()
	{
		$this->Config['is_mobile_client'] = 1;
		include(template('square'));
	}
	
	function gsquare()
	{
		Mobile::is_login();
		include(template('g_search'));
	}
}
?>