<?php
if(!defined('IN_DATACORE'))
{
    exit('invalid request');
}
require_once(ROOT_PATH . "include/class/XS.php");
class ClassifyLogic
{
    //$xs = null;
    var $search;
    var $_cache;
    function ClassifyLogic($base = null) {
        $xs = new XS(ROOT_PATH . "/setting/classify.ini");
        $this->search = $xs->search;
        $this->search->setCharSet('UTF-8');
        $this->search->setFuzzy(true);
        $this->search->setLimit(1,0);
        $this->search->setDb('classify');
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
        $this->search->setQuery($text);
        $result = $this->search->search();
        $count = $this->search->getLastCount();
        if ($count < 1){
            $tag = "";
        }
        else{
            $rs = $result[0];
            //$tag = "#".$rs->subject."#".$rs->percent();
            $tag = "#".$rs->subject."#";//.$rs->percent();
        }
        return $tag;
    }
}
?>
