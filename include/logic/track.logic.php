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
    function Add($datas, $uid = 1)
    {
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
        //
        if(!empty($track)&&!empty($type)){
            if(_check($type, $track)){
                return "该记录已经存在！";
            }else{
                $this->DatabaseHandler->Query("INSERT ".TABLE_PREFIX."track (`track`) ");
                ${$type}=$track;
            }
        }
        if (!empty($mail)){
            //获取mail到用户名，对比
            if(1)//匹配邮箱名确定为已经添加到track user
            {
                //get tuid
                //update track table
            }

        }
        if (!empty($phone)){
            //获取phone的地理位置信息，用于补全用户信息

        }
        if (!empty($weicart)){
            //获取weicart简介
        }
        if (!empty($qq)){
            //获取qq资料
        }
        if (!empty($mark)){
            //获取用户到备注，并分词检测。可能不单纯的是名字。获取到名字信息。
            $tuid = _tuid($mark);
            if ($tuid == 0){
                $this->DatabaseHandler->Query("INSERT ".TABLE_PREFIX."track_member (`track`) ");
                $tuid = $this->DatabaseHandler->LastID() ;
            }
            $this->DatabaseHandler->Query("update ".TABLE_PREFIX."track set ");
        }

        return $tuid;
    }

    function Modify($trackid, $mark)
    {   
        
        $tuid = _tuid($mark);
        $_tuid = gettuid($trackid);
        if ($tuid == $_tuid){
            //更新备注名称
            $this->DatabaseHandler->Query("update ".TABLE_PREFIX."topic set ".(implode(" , " , $sql_sets))." where `tid`='$tid'");
        }else{
            //检查原tuid是否有其他使用者，没有则删除
            //有则保留
            //修改trackid对应记录到tuid 为$tuid
        }

    }

    function DeleteTrack($tid)
    {

    }
    function DeleteTrackUser($tuid)
    {
    }
}
?>
