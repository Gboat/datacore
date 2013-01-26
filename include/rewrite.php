<?php
/**
 *
 * 记事狗REWRITE相关
 *
 *
 * @copyright Copyright (C) 2005 - 2099 INET Inc.
 * @license http://inet.hitwh.edu.cn
 * @link http://inet.hitwh.edu.cn
 * @author 狐狸<foxis@qq.com>
 * @version $Id: rewrite.php 333 2012-03-14 11:13:37Z wuliyong $
 */

if(!defined('IN_JISHIGOU')) {
    exit('invalid request');
}

include(ROOT_PATH . 'setting/rewrite.php');
if($_rewrite['mode']) {
	include_once(ROOT_PATH . 'include/lib/rewrite.han.php');
	global $rewriteHandler;
	$rewriteHandler=new rewriteHandler();
	$rewriteHandler->absPath=$_rewrite['abs_path'];
	$rewriteHandler->gateway=$_rewrite['gateway'];
	$rewriteHandler->argSeparator=$_rewrite['arg_separator'];
	$rewriteHandler->varSeparator=$_rewrite['var_separator'];
	$rewriteHandler->prependVarList=$_rewrite['prepend_var_list'];
	$rewriteHandler->varReplaceList=(array)$_rewrite['var_replace_list'];
	$rewriteHandler->valueReplaceList=(array)$_rewrite['value_replace_list'];
	if(true === IN_JISHIGOU_INDEX || true === IN_JISHIGOU_AJAX) {
		$rewriteHandler->parseRequest($_rewrite['request']);
	}
}
?>