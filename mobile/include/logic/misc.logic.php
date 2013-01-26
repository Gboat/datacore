<?php
/*******************************************************************
 * [JishiGou] (C)2005 - 2099 INET Inc.
 *
 * This is NOT a freeware, use is subject to license terms
 *
 * @Filename misc.logic.php $
 *
 * @Author http://inet.hitwh.edu.cn $
 *
 * @Date 2012-04-28 05:53:06 734864297 1158027625 449 $
 *******************************************************************/



 
class MiscLogic
{
	var $Config;
	var $DatabaseHandler;
	var $OtherLogic;
	
	function MiscLogic()
	{
		$this->Config = ConfigHandler::get();
		$this->DatabaseHandler = &Obj::registry('DatabaseHandler');
		Load::logic('other');
		$this->OtherLogic = new OtherLogic();
	}
	
	function getSignTag()
	{
		$tags = $this->OtherLogic->getSignTag();
		return $tags;
	}
}
?>
