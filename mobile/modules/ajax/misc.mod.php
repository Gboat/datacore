<?php
/*******************************************************************
 * [JishiGou] (C)2005 - 2099 INET Inc.
 *
 * This is NOT a freeware, use is subject to license terms
 *
 * @Filename misc.mod.php $
 *
 * @Author http://inet.hitwh.edu.cn $
 *
 * @Date 2012-04-28 05:53:06 1277292622 1454634603 1219 $
 *******************************************************************/



 
 if(!defined('IN_JISHIGOU'))
{
    exit('invalid request');
}

class ModuleObject extends MasterObject
{
	var $MiscLogic;
	var $Config;
	
	function ModuleObject($config)
	{
		$this->MasterObject($config);
		$this->Config = $config;
		
				
		Mobile::is_login();
		
		Mobile::logic('misc');
		$this->MiscLogic = new MiscLogic();
		
		$this->Execute();
	}

	
	function Execute()
	{
        ob_start();

		switch($this->Code)
		{
			case 'sign':
				$this->sign();
				break;
			default:
				exit();
						}

        response_text(ob_get_clean());
	}
	
	function sign()
	{
				$sign_config = $this->Config['sign'];
		if ($sign_config['sign_enable'] != 1) {
			Mobile::error('Not Turned', 407);
		}
		
		$tags = $this->MiscLogic->getSignTag();
		if (!empty($tags)) {
			Mobile::output($tags);
		}
		Mobile::error('No Data', 400);
	}
}

?>
