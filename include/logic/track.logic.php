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
    function TopicLogic($base = null) {
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
        /*
        if(is_array($datas) && count($datas))
        {
            $ks = array(
                'mail'=>1,
                'phone'=>1,
                'qq'=>1,
                'weicart'=>1,
                'track'=>1,
                'type'=>1,
                'mark'=>1,
                'uid'=>1,
            );
            foreach($datas as $k=>$v)
            {
                if(isset($ks[$k]))
                {
                    ${$k} = $v;
                }
            }
        }
        else
        {
            return "输入参数有误！";
        }
         */
        if ('mail' === $type){
            //检查mail
        }
        if ('phone'=== $type){
            //获取phone的地理位置信息，用于补全用户信息
        }
        if ('weicart' === $type){
            //获取weicart简介
        }
        if ('qq' === $type){
            //获取qq资料
        }
        $trackid = $this->DatabaseHandler->Query("SELECT trackid FROM ".TABLE_PREFIX."track WHERE `tracktype`=$type AND `trackkey`=$key ");
        if ($trackid < 1){
            $this->DatabaseHandler->Query("INSERT ".TABLE_PREFIX."track (`tracktype`,`trackkey`,`username`) VALUES ('$type','$key','$name') ");
            $trackid = 1;
        }else{
            $this->DatabaseHandler->Query("UPDATE ".TABLE_PREFIX."track  set lastactivity = $TIMESTAMP ");
        }
    }

    function Modify($trackid, $mark)
    {   
    }

    function DeleteTrack($tid)
    {
    }

    function DeleteTrackUser($tuid)
    {
    }
}
?>
