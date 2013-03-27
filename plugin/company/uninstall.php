<?php
if(!defined('IN_DATACORE'))
{
    exit('invalid request');
}
$sql = <<<EOF
DROP TABLE IF EXISTS {datacore}plugin_company;
EOF;
?>