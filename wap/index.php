<?php
/**
 *
 * WAP入口
 *
 *
 * @copyright Copyright (C) 2005 - 2099 INET Inc.
 * @license http://inet.hitwh.edu.cn
 * @link http://inet.hitwh.edu.cn
 * @author 狐狸<foxis@qq.com>
 * @version $Id: index.php 487 2012-03-29 12:55:11Z wuliyong $
 */



define('CHARSET', 'utf-8');
define('ROOT_PATH',substr(dirname(__FILE__),0,-4) . '/');
define('TEMPLATE_ROOT_PATH', ROOT_PATH . 'wap/');
define('RELATIVE_ROOT_PATH','../');

require ROOT_PATH . 'include/jishigou.php';
$jishigou = new jishigou();

$jishigou->run('wap');


?>