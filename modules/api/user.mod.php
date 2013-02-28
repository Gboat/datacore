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
            case 'view':		      
            case 'show':
            {
                $this->Show();
                break;
            }
            case 'fans':
            {
                $this->Fans();
                break;
            }
            case 'follow':
            {
                $this->Follow();
                break;
            }
            case 'follow_new':
            case 'follownew':
            case 'new_follow':
            case 'newfollow':
            {
                $this->FollowNew();
                break;
            }
            case 'follow_del':
            case 'followdel':
            case 'del_follow':
            case 'delfollow':
            {
                $this->FollowDel();
                break;
            }
            case 'follow_show':
            case 'followshow':
            case 'show_follow':
            case 'showfollow':
            {
                $this->FollowShow();
                break;
            }
            case 'my_topic':    
            case 'mytopic':    
            case 'topic':
            {
                $this->Topic();
                break;
            }
            case 'my_friend_topic':
            case 'myfriendtopic':
            {
                $this->MyFriendTopic();
                break;
            }
            case 'my_favorite':
            case 'myfavorite':
            {
                $this->MyFavorite();
                break;
            }
            case 'favorite_my':
            case 'favoritemy':
            {
                $this->FavoriteMy();
                break;
            }
            case 'my_comment':
            case 'mycomment':
            {
                $this->MyComment();
                break;
            }
            case 'comment_my':
            case 'commentmy':
            {
                $this->CommentMy();
                break;
            }
            case 'at_my':
            case 'atmy':
            {
                $this->AtMy();
                break;
            }
            case 'my_pm':
            case 'mypm':
            case 'pm':
            case 'pm_sent':
            case 'pmsent':
            {
                $this->PmList();
                break;
            }
            case 'pm_new':
            case 'pmnew':
            {
                $this->PmNew();
                break;
            }
            default :
            {
                $this->Code = '';
                $this->Main();
                break;
            }
        }
    }
    function Main()
    {
        api_output('api is ok');
    }
    function Show()
    {
        $uid = max(0,(int) ($this->Inputs['uid'] ?$this->Inputs['uid'] : $this->user['uid']));
        $user = $this->_init_user($uid);
        api_output($user);
    }
    function Fans()
    {
        $uid = max(0,(int) ($this->Inputs['uid'] ?$this->Inputs['uid'] : $this->user['uid']));
        $user = $this->_init_user($uid);
        $page_arr = $this->_page($user['fans_count']);
        $p = array(
            'fields'=>'uid',
            'count'=>$page_arr[count],
            'limit'=>" {$page_arr[offset]},{$page_arr[count]} ",
            'buddyid'=>$user['uid'],
        );
        $uids = Load::model('buddy')->get_ids($p);
        $return = array();
        if($uids) {
            $return = $page_arr;
            $return['users'] = $this->_user($uids);
        }
        api_output($return);
    }
    function Follow()
    {
        $uid = max(0,(int) ($this->Inputs['uid'] ?$this->Inputs['uid'] : $this->user['uid']));
        $user = $this->_init_user($uid);
        $page_arr = $this->_page($user['follow_count']);
        $p = array(
            'fields'=>'buddyid',
            'count'=>$page_arr[count],
            'limit'=>" {$page_arr[offset]},{$page_arr[count]} ",
            'uid'=>$user['uid'],
        );
        $uids = Load::model('buddy')->get_ids($p);
        $return = array();
        if($uids) {
            $return = $page_arr;
            $return['users'] = $this->_user($uids);
        }
        api_output($return);
    }
    function FollowNew()
    {
        $uid = max(0,(int) $this->Inputs['uid']);
        $user = $this->_init_user($uid);
        if($user['uid'] != $this->user['uid']) {
            $rets = buddy_add($user['uid'],$this->user['uid']);
            if($rets &&$rets['error']) {
                api_error($rets['error']);
            }
        }
        api_output('follownew is ok');
    }
    function FollowDel()
    {
        $uid = max(0,(int) $this->Inputs['uid']);
        $user = $this->_init_user($uid);
        if($uid != $this->user['uid']) {
        buddy_del($uid,$this->user['uid']);
        api_output('followdel is ok');
    }
    }
    function FollowShow()
    {
        $source_id = max(0,(int) ($this->Inputs['source_id'] ?$this->Inputs['source_id'] : $this->user['uid']));
        if(!$source_id) {
            api_error('source_id is empty',107);
        }
        $source_user = $this->_user($source_id);
        if(!$source_user) {
            api_error('source_id is invalid',108);
        }
        $target_id = max(0,(int) ($this->Inputs['target_id']));
        if(!$target_id) {
            api_error('target_id is empty',109);
        }
        $target_user = $this->_user($target_id);
        if($source_id==$target_id ||!$target_user) {
            api_error('target_id is invalid',110);
        }
        $return = array();
        $return['source'] = array(
            'uid'=>$source_user['uid'],
            'username'=>$source_user['username'],
            'nickname'=>$source_user['nickname'],
            'following'=>false,
            'followed_by'=>false,
        );
        $return['target'] = array(
            'uid'=>$target_user['uid'],
            'username'=>$target_user['username'],
            'nickname'=>$target_user['nickname'],
            'following'=>false,
            'followed_by'=>false,
        );
        $row = Load::model('buddy')->info($target_id,$source_id);
        if($row) {
            $return['target']['followed_by'] = $return['source']['following'] = true;
        }
        $row = Load::model('buddy')->info($source_id,$target_id);
        if($row) {
            $return['target']['following'] = $return['source']['followed_by'] = true;
        }
        api_output($return);
    }
    function Topic()
    {
        $uid = max(0,(int) ($this->Inputs['uid'] ?$this->Inputs['uid'] : $this->user['uid']));
        $user = $this->_init_user($uid);
        $sql_wheres = array();
        $sql_wheres[] = "`uid`='{$uid}'";
        $sql_wheres[] = "`type` IN('first','forward','both')";
        $id_max = max(0,(int) $this->Inputs['id_max']);
        if($id_max) {
            $sql_wheres[] = "`tid`<='$id_max'";
        }
        $id_min = max(0,(int) $this->Inputs['id_min']);
        if($id_min) {
            $sql_wheres[] = "`tid`>'$id_min'";
        }
        $sql_where = " where ".implode(" and ",$sql_wheres);
            $sql = "select count(*) as count from ".TABLE_PREFIX."topic $sql_where";
            $row = $this->DatabaseHandler->FetchFirst($sql);
            $return = array();
            if($row['count']) {
                $return = $this->_page($row['count']);
                $return['topics'] = $this->_topic(" $sql_where order by `tid` desc limit {$return[offset]},{$return[count]} ");
            }
            api_output($return);
    }
    function MyFriendTopic()
    {
        $uid = max(0,(int) $this->user['uid']);
        $user = $this->_init_user($uid);
        $uids = get_buddyids($uid,$this->Config['topic_myhome_time_limit']);
        $uids[$uid] = $uid;
        $sql_wheres = array();
        $sql_wheres[] = "`type` IN('first','forward','both')";
        if($uids) {
            $sql_wheres[] = "`uid` in ('".implode("','",$uids)."')";
        }
        if ($topic_myhome_time_limit >0) {
            $sql_wheres[] = "`dateline`>'{$topic_myhome_time_limit}'";
        }
        $sql_where = ($sql_wheres ?" where ".(implode(" and ",$sql_wheres)) : null);
        $row = $this->DatabaseHandler->FetchFirst("select count(*) as `count` from ".TABLE_PREFIX."topic $sql_where ");
        $return = array();
        if($row['count']) {
            $return = $this->_page($row['count']);
            $sql_where .= " order by `tid` desc limit {$return[offset]},{$return[count]} ";
            $return['topics'] = $this->_topic($sql_where);
        }
        api_output($return);
    }
    function MyFavorite()
    {
        $uid = max(0,(int) $this->user['uid']);
        $user = $this->_init_user($uid);
        $return = array();
        $row = $this->DatabaseHandler->FetchFirst("select count(*) as `count` from `".TABLE_PREFIX."topic_favorite` TF where TF.uid='{$uid}'");
        if($row['count'])
        {
            $return = $this->_page($row['count']);
            $sql = "select TF.dateline as favorite_time , T.* from `".TABLE_PREFIX."topic_favorite` TF left join `".TABLE_PREFIX."topic` T on T.tid=TF.tid where TF.uid='{$uid}' order by TF.id desc limit {$return['offset']},{$return['count']}";
            $query = $this->DatabaseHandler->Query($sql);
            $topic_list = array();
            while (false != ($row = $query->GetRow()))
            {
                if($row['tid']<1) {
                    continue;
                }
                $row['favorite_time'] = my_date_format2($row['favorite_time']);
                $row = $this->TopicLogic->Make($row);
                $topic_list[] = $this->_process_topic($row);
            }
            $return['topics'] = $topic_list;
        }
        api_output($return);
    }
    function FavoriteMy()
    {
        $uid = max(0,(int) $this->user['uid']);
        $user = $this->_init_user($uid);
        $return = array();
        $row = $this->DatabaseHandler->FetchFirst("select count(*) as `count` from `".TABLE_PREFIX."topic_favorite` TF where TF.tuid='{$uid}'");
        if($row['count'])
        {
            $return = $this->_page($row['count']);
            $query = $this->DatabaseHandler->Query("select TF.dateline as favorite_time , TF.uid as fuid , T.* from `".TABLE_PREFIX."topic_favorite` TF left join `".TABLE_PREFIX."topic` T on T.tid=TF.tid where TF.tuid='{$uid}' order by TF.id desc limit {$return['offset']},{$return['count']}");
            while (false != ($row = $query->GetRow()))
            {
                if($row['tid']<1) {
                    continue;
                }
                $row['favorite_time'] = my_date_format2($row['favorite_time']);
                $row = $this->TopicLogic->Make($row);
                $row['favorite_members'] = $this->TopicLogic->GetMember($row['fuid'],"`uid`,`ucuid`,`username`,`nickname`,`face_url`,`face`,`validate`");
                $topic_list[] = $this->_process_topic($row);
            }
            $return['topics'] = $topic_list;
        }
        api_output($return);
    }
function MyComment()
{
$uid = max(0,(int) $this->user['uid']);
$user = $this->_init_user($uid);
$return = array();
$row = $this->DatabaseHandler->FetchFirst("select count(*) as `count` from ".TABLE_PREFIX."topic where `uid` = '$uid' and `type` in ('both','reply')");
if($row['count'])
{
$return = $this->_page($row['count']);
$return['topics'] = $this->_topic(" where `uid` = '$uid' and `type` in ('both','reply') order by `tid` desc limit {$return['offset']},{$return['count']} ");
}
api_output($return);
}
function CommentMy()
{
$uid = max(0,(int) $this->user['uid']);
$user = $this->_init_user($uid);
$return = array();
$row = $this->DatabaseHandler->FetchFirst("select count(*) as `count` from ".TABLE_PREFIX."topic where `touid`='{$uid}' and `type` in ('both','reply') ");
if($row['count'])
{
$return = $this->_page($row['count']);
$return['topics'] = $this->_topic(" where `touid`='{$uid}' and `type` in ('both','reply') order by `tid` desc limit {$return['offset']},{$return['count']} ");
}
api_output($return);
}
function AtMy()
{
$uid = max(0,(int) $this->user['uid']);
$user = $this->_init_user($uid);
$return = array();
$sql = "select * from `".TABLE_PREFIX."topic_mention` where `uid`='{$uid}'";
$query = $this->DatabaseHandler->Query($sql);
while (false != ($row = $query->GetRow()))
{
$topic_ids[$row['tid']] = $row['tid'];
}
$topic_ids_count = count($topic_ids);
if($topic_ids_count)
{
$return = $this->_page($topic_ids_count);
$return['topics'] = $this->_topic(" where `tid` in ('".implode("','",$topic_ids)."') order by `tid` desc limit {$return['offset']},{$return['count']} ");
}
api_output($return);
}
function PmListBak()
{
$user = $this->_init_user(max(0,(int) $this->user['uid']));
$folder = ('outbox'== $this->Inputs['folder'] ?'outbox': 'inbox');
$wheres = array(
" p.`msgtoid`='{$user['uid']}' ",
" p.`folder`='{$folder}' ",
" p.`delstatus`!='2' ",
);
$id_max = max(0,(int) $this->Inputs['id_max']);
if($id_max) {
$wheres[] = " p.`pmid`<='{$id_max}' ";
}
$id_min = max(0,(int) $this->Inputs['id_min']);
if($id_min) {
$wheres[] = " p.`pmid`>'{$id_min}' ";
}
$uid = max(0,(int) $this->Inputs['uid']);
if($uid >0) {
$wheres[] = " p.`msgfromid`='{$uid}' ";
}
if('newpm'==$this->Inputs['filter']) {
$wheres[] = " p.`new`>0 ";
}
$sql_where = ($wheres ?" WHERE ".implode(" AND ",$wheres) : '');
$sql_order = " ORDER BY p.`pmid` DESC ";
$return = array();
$row = $this->DatabaseHandler->FetchFirst("SELECT count(*) AS `count` FROM `".TABLE_PREFIX."pms` p $sql_where ");
if($row['count']) {
$return = $this->_page($row['count']);
$sql_limit = " LIMIT {$return['offset']}, {$return['count']} ";
$query = $this->DatabaseHandler->Query("SELECT p.* FROM `".TABLE_PREFIX."pms` p $sql_where $sql_order $sql_limit ");
$pm_list=array();
while($row=$query->GetRow()) {
$row['id'] = $row['pmid'];
$row['send_time'] = my_date_format($row['dateline'],"Y-m-d H:i");
$row['user'] = $row['msgto'];
$row['user_id'] = $row['msgtoid'];
$row['nickname'] = $row['msgnickname'];
$pm_list[]=$row;
}
$return['pms'] = $pm_list;
}
api_output($return);
}
function PmList() {
$user = $this->_init_user(max(0,(int) $this->user['uid']));
$uid = max(0,(int) $this->Inputs['uid']);
$_page = $this->_page();
$page = array(
'per_page_num'=>$_page['count'],
);
$PmLogic = Load::logic('pm',1);
$info = array();
$count = 0;
$rets = array();
if($uid <1) {
$info = $PmLogic->getPmList('inbox',$page,$user['uid']);
}else {
$info = $PmLogic->getHistory($user['uid'],$uid,$page);
}
if($info) {
$count = $info['page_arr']['total_record'];
if($count >0) {
$rets = $this->_page($count);
$pms = array();
foreach($info['pm_list'] as $row) {
$pms[] = $row;
}
$rets['pms'] = $pms;
}
}
api_output($rets);
}
function PmNew()
{
$uid = max(0,(int) $this->user['uid']);
$user = $this->_init_user($uid);
$text = trim(strip_tags($this->Inputs['text']));
$text = cutstr($text,300);
$to_user = trim(strip_tags($this->Inputs['to_user']));
$PmLogic = Load::logic('pm',1);
$post = array(
'to_user'=>$to_user,
'message'=>$text,
);
$ret = $PmLogic->pmSend($post,$user['uid'],$user['username'],$user['nickname']);
if($ret) {
if(1 == $ret) {
api_error('text is empty',111);
}elseif (2 == $ret) {
api_error('to_user is empty',112);
}elseif (3 == $ret) {
api_error('to_user is invalid',113);
}else {
api_error($ret,114);
}
}
api_output('send is ok');
}
}

?>
