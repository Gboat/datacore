<?php
define('CHARSET', 'utf-8');
define('ROOT_PATH',substr(dirname(__FILE__),0,-4) . '/');
define('TEMPLATE_ROOT_PATH', ROOT_PATH . 'wap/');
define('RELATIVE_ROOT_PATH','../');
require ROOT_PATH . 'include/jishigou.php';
$jishigou = new jishigou();
$jishigou->run('wap');
?>
