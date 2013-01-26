<?php
/*******************************************************************
 * [JishiGou] (C)2005 - 2099 INET Inc.
 *
 * This is NOT a freeware, use is subject to license terms
 *
 * @Filename uninstall.php $
 *
 * @Author http://inet.hitwh.edu.cn $
 *
 * @Date 2012-04-28 05:53:12 601845397 1304273536 143 $
 *******************************************************************/


if(!defined('IN_JISHIGOU'))
{
    exit('invalid request');
}
$sql = <<<EOF
DROP TABLE IF EXISTS {jishigou}plugin_company;
EOF;
?>