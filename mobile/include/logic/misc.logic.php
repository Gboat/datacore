<?php
class MiscLogic
{
    var $Config;
    var $DatabaseHandler;
    var $OtherLogic;
    function MiscLogic()
    {
        $this->Config = ConfigHandler::get();
        $this->DatabaseHandler = &Obj::registry('DatabaseHandler');
        Load::logic('other');
        $this->OtherLogic = new OtherLogic();
    }
    function getSignTag()
    {
        $tags = $this->OtherLogic->getSignTag();
        return $tags;
    }
}
?>
