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
            case 'do_add':
            case 'add':
            {
                $this->DoAdd();
                break;
            }
            case 'delete':
            case 'del':
            {
                $this->Delete();
                break;
            }
            case 'view':
            case 'show':
            {
                $this->Show();
                break;
            }
            case 'list':
            {
                $this->DoList();
                break;
            }
            case 'comment':
            {
                $this->Comment();
                break;
            }
            case 'favorite':
            {
                $this->Favorite();
                break;
            }
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
    function DoAdd()
    {
        $content = trim(strip_tags($this->Inputs['content']));
        if(!$content)
        {
            api_error('content is empty',104);
        }
        $totid = max(0,(int) $this->Inputs['totid']);
        $from = "api";
        $type = "first";
        if($totid)
        {
            $_types = array('first'=>1,'forward'=>1,'reply'=>1,'both'=>1);
            $_type = trim(strtolower($this->Inputs['type']));
            if($_type &&isset($_types[$_type]))
            {
                $type = $_type;
            }
        }
        else
        {
        }
        $datas = array(
            'content'=>$content,
            'totid'=>$totid,
            'from'=>$from,
            'type'=>$type,
            'uid'=>MEMBER_ID,
            'item'=>'api',
            'item_id'=>$this->app['id'],
            );
        $add_result = $this->TopicLogic->Add($datas);
        if(is_array($add_result) &&count($add_result))
        {
            api_output($this->_topic($add_result['tid']));
        }
        else
        {
            api_error(($add_result ?$add_result : '【通知】内容发布失败'),105);
        }
    }
    function Delete()
    {
        $id = max(0,(int) $this->Inputs['id']);
        if(!$id) {
            api_error('id is empty',102);
        }
        $topic = $this->_topic($id);
        if(!$topic) {
            api_error('id is invalid',103);
        }
        if($topic['uid']!=$this->user['uid']) {
            api_error('id is invalid',103);
        }
        $return = $this->TopicLogic->DeleteToBox($id);
        if($return) {
            api_error($return,106);
        }
        api_output('delete is ok');
    }
    function Show() {
        $id = max(0,(int) $this->Inputs['id']);
        if(!$id) {
            api_error('id is empty',102);
        }
        $topic = $this->_topic($id);
        if(!$topic) {
            api_error('id is invalid',103);
        }
        if($topic['longtextid'] >0) {
            $longtext_info = Load::logic('longtext',1)->get_info($topic['longtextid'],1);
            if($longtext_info &&$longtext_info['tid']==$id) {
                $topic['longtext'] = nl2br($longtext_info['longtext']);
            }
        }
        api_output($topic);
    }
    function DoList()
    {
        $sql_wheres = array();
        $sql_wheres[] = "`type` IN('first','forward','both')";
        $id_max = max(0,(int) $this->Inputs['id_max']);
        if($id_max) {
            $sql_wheres[] = "`tid`<='$id_max'";
        }
        $id_min = max(0,(int) $this->Inputs['id_min']);
        if($id_min)  {
            $sql_wheres[] = "`tid`>'$id_min'";
        }
        $sql_where = ($sql_wheres ?" where ".implode(" and ",$sql_wheres) : "");
        $sql = "select count(*) as count from ".TABLE_PREFIX."topic $sql_where";
        $row = $this->DatabaseHandler->FetchFirst($sql);
        $return = array();
        if($row['count'])
        {
            $return = $this->_page($row['count']);
            $return['topics'] = $this->_topic(" $sql_where order by `tid` desc limit {$return[offset]},{$return[count]} ");
        }
        api_output($return);
    }
    function Comment()
    {
        $id = max(0,(int) $this->Inputs['id']);
        if(!$id)
        {
            api_error('id is empty',102);
        }
        $topic = $this->TopicLogic->Get($id);
        if(!$topic)
        {
            api_error('id is invalid',103);
        }
        $return = array();
        $reply_ids = $this->TopicLogic->GetReplyIds($topic['tid']);
        $reply_ids_count = count($reply_ids);
        if($reply_ids &&$reply_ids_count)
        {
            $return = $this->_page($reply_ids_count);
            $sql_where = " where `tid` in ('".implode("','",$reply_ids)."') order by `tid` desc limit {$return[offset]},{$return[count]}";
            $return['comments'] = $this->_topic($sql_where);
        }
        api_output($return);
    }
    function Favorite() {
        $id = max(0,(int) $this->Inputs['id']);
        if(!$id) {
            api_error('id is empty',102);
        }
        $topic = $this->_topic($id);
        if(!$topic) {
            api_error('id is invalid',103);
        }
        $act = (in_array($this->Inputs['act'],array('check','add','delete')) ?$this->Inputs['act'] : 'check');
        $ret = Load::logic('other',1)->TopicFavorite(MEMBER_ID,$id,$act);
        $ret = ('check'==$act ?($ret ?1 : 0) : 1);
        api_output($ret);
    }
}

?>
