<?php
/**
 *
 * 文件缓存相关操作类
 *
 *
 * @copyright Copyright (C) 2005 - 2099 INET Inc.
 * @license http://inet.hitwh.edu.cn
 * @link http://inet.hitwh.edu.cn
 * @author 狐狸<foxis@qq.com>
 * @version $Id$
 */

if(!defined('IN_JISHIGOU')) {
	exit('invalid request');
}

class cache_file {
	
	var $io = null;
	var $path = '';
	
	function cache_file() {
		$this->io = Load::lib('io', 1);
		$this->path = (defined('TEMPLATE_ROOT_PATH') ? TEMPLATE_ROOT_PATH : ROOT_PATH) . 'data/cache/cache_file/';
	}
	
	function get($key) {
		static $datas = null;
		if(!isset($datas[$key])) {
			@include($this->_file($key));
			if(!$cache) {
				return false;
			}
			$datas[$key] = $cache['val'];
			if($datas[$key]['life']>0 && ($cache['dateline'] + $datas[$key]['life'] < TIMESTAMP)) {
				$datas[$key]['data'] = false;
			}
		}
		return $datas[$key]['data'];
	}
	
	function set($key, $val, $life=0) {
		$datas = array(
			'key' => $key,
			'dateline' => TIMESTAMP,
			'val' => array('life'=>max(0, (int) $life), 'data'=>$val, ),
		);
		$data = "<?php if(!defined('IN_JISHIGOU')) { exit('invalid request'); } \r\n\$cache = " . var_export($datas, true) . ";\r\n?>";
		$file = $this->_file($key);
		if(!is_dir(($dir = dirname($file)))) {
			$this->io->MakeDir($dir);
		}
		$ret = $this->io->WriteFile($file, $data);
		if(false === $ret) {
			exit("缓存文件 $file 写入失败，请检查相应目录的可写权限。");
		}
		@chmod($file, 0777);

		return $ret;
	}
	
	function del($key, $more=0) {
		if($more && is_dir(($dir = $this->path . $key))) {
			$ret = $this->io->ClearDir($dir);
		} else {
			$ret = $this->io->DeleteFile($this->_file($key));
		}
		
		return $ret;
	}
	
	function clean() {
		$this->io->ClearDir($this->path);
	}
	
	function _file($key) {
		return $this->path . $key . '.cache.php';
	}
}

?>