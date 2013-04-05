<?php
if(!defined('IN_DATACORE'))
{
    exit('invalid request');
}
class TrackLogic
{
    var $DatabaseHandler;
    var $Config;
    var $_cache;
    function TrackLogic($base = null) {
        if ($base) {
            $this->DatabaseHandler = & $base->DatabaseHandler;
            $this->Config = & $base->Config;
        } else {
            $this->DatabaseHandler = & Obj::registry("DatabaseHandler");
            $this->Config = & Obj::registry("config");
        }
    }
    function Add($key, $type, $name )
    {
        $trackid = 111;
        /*
        $trackid = $this->DatabaseHandler->Query("SELECT trackid FROM ".TABLE_PREFIX."track WHERE `tracktype`=$type AND `trackkey`=$key ");
        if ($trackid < 1){
            $this->DatabaseHandler->Query("INSERT ".TABLE_PREFIX."track (`tracktype`,`trackkey`,`username`) VALUES ('$type','$key','$name') ");
            $trackid = 1;
        }else{
            $this->DatabaseHandler->Query("UPDATE ".TABLE_PREFIX."track  set lastactivity = $TIMESTAMP ");
        }
        return $trackid
         */

        return $trackid;
    }
}
?>
