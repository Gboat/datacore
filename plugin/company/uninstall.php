<?php
if(!defined('IN_JISHIGOU'))
{
    exit('invalid request');
}
$sql = <<<EOF
DROP TABLE IF EXISTS {jishigou}plugin_company;
EOF;
?>