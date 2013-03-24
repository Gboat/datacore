<?php
if(!defined('IN_DATACORE'))
{
    exit('invalid request');
}
class ModuleObject extends MasterObject
{
    function ModuleObject($config)
    {
        global $plugin_info,$member;
        $this->MasterObject($config);
        $this->TopicLogic = Load::logic('topic', 1);
        $this->Execute();
    }
    function Execute()
    {
        ob_start();
        $this->Main();
        $body=ob_get_clean();        
        $this->ShowBody($body);
    }
    function Main()
    {
        $plugin = $this->Post['plugin'] ? $this->Post['plugin'] : $this->Get['plugin'];
        if(!empty($plugin)) {
            list($identifier, $module) = explode(':', $plugin);
            $module = $module !== NULL ? $module : $identifier;
        }
        $query = $this->DatabaseHandler->Query("SELECT *  FROM ".TABLE_PREFIX."plugin WHERE identifier = '".$identifier."'");
        $plugin_row = $query->GetRow();
        $member = $this->_member();
        $template = 'plugin/'.$plugin_row['directory'].$module;        
        $plugin_info = $plugin_row;
        if(!$plugin_row || $plugin_row['available'] == 0)
        {        
            $this->Messager("插件不存在或已关闭");
        }
        elseif(@!file_exists($modfile = PLUGIN_DIR .'/'.$plugin_row['directory'].$module.'.inc.php'))
        {
            $this->Messager("插件模块文件(".'plugin/'.$template.'.inc.php'.")不存在或者插件文件不完整", -1);
        }
        else
        {
            include_once($modfile);
        }
        $this->Title = $plugin_row['name'];
        $this->require = $this->Post['require'] ? $this->Post['require'] : $this->Get['require'];
        $loadtemplate = empty($this->require) ? '' : $this->require .'_';
        include($this->TemplateHandler->Template($loadtemplate.'plugin'));
    }
    function _member()
    {
        $member = $this->TopicLogic->GetMember(MEMBER_ID);        
        return $member;
    }
}
?>