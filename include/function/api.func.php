<?php
if(!defined('IN_JISHIGOU'))
{
    exit('invalid request');
}
function api_output($result,$status='',$code=0)
{
    $outputs = array();
    if($status)
    {
        $outputs['status'] = $status;
        $outputs[$status] = true;
    }
    if($code)
    {
        $outputs['code'] = $code;
    }
    $outputs['result'] = $result;
    $outputs = array_iconv($GLOBALS['_J']['charset'],'utf-8',$outputs);
    ob_clean();
    if('json'==API_OUTPUT)
    {
        header("Content-type: text/html;charset=utf-8");
        echo json_encode($outputs);
    }
    elseif('serialize_base64'==API_OUTPUT)
    {
        header("Content-type: text/html;charset=utf-8");
        echo base64_encode(serialize($outputs));
    }
    else
    {
        header("Content-type: application/xml;charset=utf-8");
        echo xml_serialize($outputs);
    }
}
function api_error($msg,$code=0,$halt=true)
{
    api_output($msg,'error',$code);
    $halt &&exit;
}
if(!function_exists('xml_unserialize'))
{
    function xml_unserialize(&$xml,$isnormal = FALSE) {
        $xml_parser = new XML($isnormal);
        $data = $xml_parser->parse($xml);
        $xml_parser->destruct();
        return $data;
    }
}
if(!function_exists('xml_serialize'))
{
    function xml_serialize($arr,$htmlon = false,$isnormal = false,$level = 1)
    {
        $s = ($level == 1 ?"<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>\r\n<root>\r\n": '');
        $space = str_repeat("\t",$level);
        foreach($arr as $k =>$v)
        {
            if(!is_array($v))
            {
                $html = ($htmlon ?true : (false!==strpos($v,'</')));
                $s .= $space.($isnormal ?"<$k>": "<item id=\"$k\">").($html ?'<![CDATA[': '').$v.($html ?']]>': '').($isnormal ?"</$k>": "</item>")."\r\n";
            }
            else
            {
                $s .= $space.($isnormal ?"<$k>": "<item id=\"$k\">")."\r\n".xml_serialize($v,$htmlon,$isnormal,$level +1).$space.($isnormal ?"</$k>": "</item>")."\r\n";
            }
        }
        $s = preg_replace("/([\x01-\x08\x0b-\x0c\x0e-\x1f])+/",' ',$s);
        return ($level == 1 ?$s."</root>": $s);
    }
}
class XML {
    var $parser;
    var $document;
    var $stack;
    var $data;
    var $last_opened_tag;
    var $isnormal;
    var $attrs = array();
    var $failed = FALSE;
    function __construct($isnormal) {
        $this->XML($isnormal);
    }
    function XML($isnormal) {
        $this->isnormal = $isnormal;
        $this->parser = xml_parser_create('ISO-8859-1');
        xml_parser_set_option($this->parser,XML_OPTION_CASE_FOLDING,false);
        xml_set_object($this->parser,$this);
        xml_set_element_handler($this->parser,'open','close');
        xml_set_character_data_handler($this->parser,'data');
    }   
    function destruct() {
        xml_parser_free($this->parser);
    }
    function parse(&$data) {
        $this->document = array();
        $this->stack	= array();
        return xml_parse($this->parser,$data,true) &&!$this->failed ?$this->document : '';
    }
    function open(&$parser,$tag,$attributes) {
        $this->data = '';
        $this->failed = FALSE;
        if(!$this->isnormal) {
            if(isset($attributes['id']) &&!is_string($this->document[$attributes['id']])) {
                $this->document  = &$this->document[$attributes['id']];
            }else {
                $this->failed = TRUE;
            }
        }else {
            if(!isset($this->document[$tag]) ||!is_string($this->document[$tag])) {
                $this->document  = &$this->document[$tag];
            }else {
                $this->failed = TRUE;
            }
        }
        $this->stack[] = &$this->document;
        $this->last_opened_tag = $tag;
        $this->attrs = $attributes;
    }
    function data(&$parser,$data) {
        if($this->last_opened_tag != NULL) {
            $this->data .= $data;
        }
    }
    function close(&$parser,$tag) {
        if($this->last_opened_tag == $tag) {
            $this->document = $this->data;
            $this->last_opened_tag = NULL;
        }
        array_pop($this->stack);
        if($this->stack) {
            $this->document = &$this->stack[count($this->stack)-1];
        }
    }
}

?>
