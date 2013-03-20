<?php

if(!defined('IN_JISHIGOU'))
{
    exit('invalid request');
}
class ModuleObject extends MasterObject
{
    function ModuleObject($config)
    {
        $this->MasterObject($config);
        $this->Execute();
    }
    function Execute()
    {
        switch($this->Code)
        {
            ;
            default :
            {
                $this->Main();
                break;
            }
        }
    }
    function Main()
    {
        api_output('api is ok');
    }
}
?>
