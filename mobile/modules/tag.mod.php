<?php
if (!defined('IN_JISHIGOU')) {
    exit('Access Denied');
}
class ModuleObject extends MasterObject
{
    var $ShowConfig;
    var $CacheConfig;
    var $TopicLogic;
    var $MTagLogic;
    var $ID = '';
    function ModuleObject($config)
    {
        $this->MasterObject($config);
        $this->ID = (int) ($this->Post['id'] ? $this->Post['id'] : $this->Get['id']);
        Load::logic('topic');
        $this->TopicLogic = new TopicLogic($this);
        Mobile::logic('tag');
        $this->MTagLogic = new MTagLogic(); 
        $this->CacheConfig = ConfigHandler::get('cache');
                $this->ShowConfig = ConfigHandler::get('show');
                Mobile::is_login();
        $this->Execute();
    }
    function Execute()
    {
        ob_start();
        switch($this->Code)
        {
            case 'favorite':
                $this->favorite();
                break;
            case 'list':                
            default:
                $this->Main();
                break;
        }
        $body=ob_get_clean();
        echo $body;
    }
    function Main()
    {    
        $uid = intval($this->Get['uid']);
        $param = array(
            'limit' => Mobile::config("perpage_def"),
            'uid' => $uid,
        );
        $ret = Mobile::convert($this->MTagLogic->getTagList($param));
        if (is_array($ret)) {
            $tag_list = $ret['tag_list'];
            $list_count = $ret['list_count'];
            $total_record = $ret['total_record'];
            $max_id = $ret['max_id'];
        } else {
            Mobile::show_message($ret);
        }
        include(template('tag_list'));
    }
}
?>