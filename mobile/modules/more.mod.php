<?php
if (!defined('IN_DATACORE')) {
    exit('Access Denied');
}
class ModuleObject extends MasterObject
{
    var $CacheConfig;
    function ModuleObject($config)
    {
        $this->MasterObject($config);
        $this->CacheConfig = ConfigHandler::get('cache');
                Mobile::is_login();
        $this->Execute();
    }
    function Execute()
    {
        ob_start();
        switch ($this->Code) {
            case "about":
                $this->about();
                break;
            default:
                $this->main();
        }
        $body=ob_get_clean();
        echo $body;
    }
    function main()
    {
        include(template('more'));
    }
    function about()
    {
        include(template('about'));
    }
}
?>