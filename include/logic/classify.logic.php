<?php
if(!defined('IN_DATACORE'))
{
    exit('invalid request');
}
class ClassifyLogic
{
    var $_cache;
    function ClassifyLogic($base = null) {

    }
    function Trend($text)
    {
        $trend = array(
            "中立",
            "支持",
            "反对",
        );
        return $trend[0];
    }
    function TopicTag($text)
    {
        $tag = "#测试标签#";
        return $tag;
    }
}
?>
