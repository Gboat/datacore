<?php

/**
 * 缓存管理
 *
 * @author 狐狸<foxis@qq.com>
 * @package JishiGou
 * @version $Id: cache.mod.php 866 2012-04-27 08:15:42Z wuliyong $
 */

if(!defined('IN_JISHIGOU')) {
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
		ob_start();
		switch($this->Code) {
			case 'do_clean':
				$this->DoClean();
					
			default:
				$this->Code = '';
				$this->Main();
				break;
		}
		$body = ob_get_clean();

		$this->ShowBody($body);
	}

	function Main() {
		
		$this->_free_login_ip();
		$this->_fix_members();
		

		include template('admin/cache_index');
	}

	function DoClean() {
		$type = get_param('type');
		if(!$type) {
			$this->Messager("请先选择要清理的缓存对象");
		}		
		
				$this->_removeTopicImage();
		$this->_removeTopicAttach();
		
		if(in_array('data', $type)) {
						Load::model('cache/db')->clean();
		}

		if(in_array('tpl', $type)) {
						clearcache();
			
						ConfigHandler::set('validate_category', array());
		}


		$this->Messager("已清空所有缓存，同时清理了用户上传但未使用的图片及附件");
	}

	function _removeTopicImage() {
				Load::logic('image', 1)->clear_invalid(300);
	}
	function _removeTopicAttach() {
				Load::logic('attach', 1)->clear_invalid(300);
	}

	function _free_login_ip() {
		$onlineip = client_ip();
		$timestamp = time();

		$failedlogins = $this->DatabaseHandler->FetchFirst("SELECT count, lastupdate FROM ".TABLE_PREFIX.'failedlogins'." WHERE ip='$onlineip'");

		if($failedlogins) {
			$this->DatabaseHandler->Query("UPDATE ".TABLE_PREFIX.'failedlogins'." SET count='1', lastupdate='$timestamp' WHERE ip='$onlineip'");
		}
		$this->DatabaseHandler->Query("DELETE FROM ".TABLE_PREFIX.'failedlogins'." WHERE lastupdate<$timestamp-901", 'UNBUFFERED');
	}
	function _fix_members() {
		DB::query("update ".DB::table("members")." set `username`=`uid` where `username`=''");
		DB::query("update ".DB::table("members")." set `nickname`=`username` where `nickname`=''");
		DB::query("REPLACE INTO ".TABLE_PREFIX."memberfields
            (`uid`)
SELECT
  M.uid
FROM ".TABLE_PREFIX."members M
  LEFT JOIN ".TABLE_PREFIX."memberfields MF
    ON MF.uid = M.uid
WHERE MF.uid IS NULL");
	}
	function _fix_settings() {
				;
	}

}
?>