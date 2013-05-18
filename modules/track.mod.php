<?php
if(!defined('IN_DATACORE'))
{
    exit('invalid request');
}
class ModuleObject extends MasterObject
{
    var $ShowConfig;
    var $CacheConfig;
    var $TopicLogic;
    var $ID = '';
    function ModuleObject($config)
    {
        $this->MasterObject($config);
        $this->ID = (int) ($this->Post['id'] ? $this->Post['id'] : $this->Get['id']);
        $this->TopicLogic = Load::logic('topic', 1);
        $this->CacheConfig = ConfigHandler::get('cache');
        $this->ShowConfig = ConfigHandler::get('show');
        $this->Execute();
    }
    function Execute()
    {
        ob_start();
        if('other' == $this->Code) {
            $this->Mail();
        } elseif ('s' == $this->Code) {
            $this->Search();
        } elseif ('other1' == $this->Code) {
            $this->Qzone();
        }elseif('other2' == $this->Code) {
            $this->Wecart();
        }elseif('track' == $this->Code) {
            $this->Track();
        }elseif('weibo' == $this->Code) {
            $this->Weibo();
        }elseif('all' == $this->Code){
            $this->All();
        }
        else{
            $this->Main();
        }
        $body=ob_get_clean();
        $this->ShowBody($body);
    }
    function Search(){
        $this->Title = "全文检索";
        $sql = "SELECT name ,description FROM ".DB::TABLE('rule');
        $rule = array();
        $query = DB::query($sql);

        while ($row = DB::fetch($query)){
            $rule[]=$row;
        }
        $q = $this->Get['q'];
        include($this->TemplateHandler->Template('track_s'));
    }
    function All(){
        $this->Title = "信息总揽-與情TRACK";
        $mg = new Mongo("172.31.159.111:27017");
        $db = $mg->track;
        $query = array();
        $fields = array();
        $limit = array();
        $moniter = array();
        $uid = $this->Get['uid'];
        $cursor = $db->moniter->find($query,$fields);
        while($cursor->hasNext()){
            $r = $cursor->getNext();
            $moniter[]=$r;
        }
        $j=0;
        foreach($moniter as $i){
            //$moniter[$j]['datas'] = json_encode(array_values($i['day']));
            $datas = "[";
            for ($a=0;$a<=40;$a++){
                $day = date("Y-m-d",strtotime("-$a day"));
                $datas .= (empty($i['day'][$day])?0:$i['day'][$day]) .",";
            }
            $moniter[$j]['datas'] = $datas."]";
            $j++;
        }
        include($this->TemplateHandler->Template('track_all'));
        //die("ALL就来！");
    }
    function WeCart()
    {
        die("微信通道马上就来！");
    }
    function Weibo(){
        $mg = new Mongo("172.31.159.111:27017");
        $db = $mg->track;
        $query = array();
        $fields = array();
        $sort = array();
        $limit = array();
        $this->Title = "人物关系分析-與情TRACK";
        $uid = $this->Get['uid'];

        if(!empty($uid)){
            $type = $this->Get['type'];
            if(empty($type)){
                $query = array(
                    "statusuid"=>new MongoInt64($uid),
                    "platform"=>"swb",
                );
                //echo json_encode($query);
                //json_decode("{'statusuid':$uid,'flatfrom':'swb'}");
                $count = $db->status->find($query,$fields)->count();
                if($count){
                    $cursor = $db->status->find($query,$fields)->limit(20);
                    while($cursor->hasNext()){
                        $r = $cursor->getNext();
                        echo $r['content']."<br />";
                        echo $r['timestamp']."<br />";
                    }
                }
            }else{
                $query = array(
                    "userid"=>new MongoInt64($uid),
                    "platform"=>"swb",
                );
                $r = $db->user->findOne($query,array());
                $datas = "[";
                $days = "";
                for ($a=0;$a<=90;$a++){
                    $day = date("Y-m-d",strtotime("-$a day"));
                    $datas .= (empty($r['statistic'][$day])?0:$r['statistic'][$day]) .",";
                }
                $datas .= "]";
                include($this->TemplateHandler->Template('track_weibo_tj'));
            }
        }
        else
        {
            $count = $db->user->find($query,$fields)->count();
            $per_page_num = 24;
            $gets = array(
                'mod' => $_GET['mod_original'] ? get_safe_code($_GET['mod_original']) : $this->Module,
                'code' => $this->Code,//确定当前位置
                'gid' => $this->Get['gid'],//分组
                'nickname' => $this->Get['nickname'],//昵称
                'type' => $this->Get['type'],//排序字段
            );
            $page_url = "index.php?".url_implode($gets);
            $page = empty($this->Get['page'])? 1:$this->Get['page'];

            $day = date("Y-m-d",strtotime("-1 day"));
            $cursor = $db->user->find($query,$fields)->sort(array("statistic.".$day=>-1))->skip(($page-1)*$per_page_num)->limit($per_page_num);
            $page_arr = page($count, $per_page_num, $page_url, array('return' => 'array'));
            $track_list = array();
            while($cursor->hasNext()){
                $r = $cursor->getNext();
                $track_list[] = $r;
            }
            include($this->TemplateHandler->Template('track_weibo'));
        }
    }
    function Main(){
        $type = $this->Code;
        $member = $this->_member();
        if (!$member) {
            $this->Messager("请先<a href='index.php?mod=login'>点此登录</a>或者<a href='index.php?mod=member'>点此注册</a>一个帐号",'index.php?mod=login');
        }
        $my_member = $this->_member((int) $this->Get['mod_original']);
        $gid = intval(trim($this->Get['gid']));

        //获取get参数，初始化url
        $keyword = $this->Post['nickname'] ? $this->Post['nickname'] : $this->Get['nickname'];
        $per_page_num = 20;
        $gets = array(
            'mod' => $_GET['mod_original'] ? get_safe_code($_GET['mod_original']) : $this->Module,
            'code' => $this->Code,//确定当前位置
            'gid' => $this->Get['gid'],//分组
            'nickname' => $this->Get['nickname'],//昵称
            'type' => $this->Get['type'],//排序字段
        );
        $page_url = "index.php?".url_implode($gets);
        $orderBy = ' ORDER BY ';
        $orderBy .= " b.`id` DESC ";
        if($gid){
        }elseif($keyword){
        }
        //初始化分组信息
        $sql = "SELECT  GF.touid , GF.gid, GF.g_name , GF.display , G.group_name , G.id , GF.*
            FROM ".DB::table('group')." AS G
            LEFT JOIN ".DB::table('groupfields')." AS GF
            ON G.id=GF.gid
            WHERE G.uid='".MEMBER_ID." ' ";
        $query = DB::query($sql);
        $user_group = array();
        while ($row = DB::fetch($query)) {
            $user_group[$row['id']] = $row;
        }
        $group_list = $grouplist2 = array();
        $group_list = $this->_myGroup($member['uid']);
        if($group_list) $grouplist2 = array_slice($group_list,0,min(4,count($group_list)));
        //$member_medal = $my_member ? $my_member : $member;
        //if ($member_medal['medal_id']) {
        //    $medal_list = $this->_Medal($member_medal['medal_id'],$member_medal['uid']);
        //}
        //处理track的信息
        $this->Title = "{$member['nickname']}的TRACK信息";

        $track_list = array();
        $count = DB::result_first("SELECT COUNT(*)
            FROM ".DB::table('track')."
            WHERE `tracktype` = '$type' ");

        $page_arr = page($count, $per_page_num, $page_url, array('return' => 'array'));
        $sql = "SELECT tk.trackid as id, tk.trackkey, tk.username
            FROM ".DB::table('track')." AS tk
            WHERE tk.`tracktype`='$type'
            ORDER BY tk.trackid
        {$page_arr['limit']}";
        $query = DB::query($sql);
        while ($row = DB::fetch($query)){
            $track_list[$row['id']] = $row;
            $track_list[$row['id']]['images'] = "./images/noavatar.gif";
        }
        include($this->TemplateHandler->Template('track'));
    }
    function Track(){
        $this->Title = "Track信息总揽";
        $mail = 100;
        $phone = 120;
        $qq = 149;
        $renren = 150;
        include($this->TemplateHandler->Template('track_index'));
    }
    function Qzone(){
        die("QQ通道马上就来！");
    }
    function Mail()
    {   
        die("MAIL通道马上就来！");
    }
    function View()
    {
        die ("Hello World");
    }
    function Top()
    {
        die ("Hello World");
    }
    function Hot()
    {
        die ("Hello World");
    }
    function _member($uid=0)
    {
        $member = array();
        if($uid < 1)
        {
            $member = jsg_member_info_by_mod();
        }
        $uid = (int) ($uid ? $uid : MEMBER_ID);
        if($uid > 0 && !$member)
        {
            $member = $this->TopicLogic->GetMember($uid);
        }
        if(!$member)
        {
            return false;
        }
        $uid = $member['uid'];
        if (!$member['follow_html'] && $uid!=MEMBER_ID && MEMBER_ID>0)
        {
            $member['follow_html'] = follow_html($member['uid'], chk_follow(MEMBER_ID, $uid));
        }
        if(true === UCENTER_FACE && MEMBER_ID == $uid && MEMBER_UCUID > 0 && !($member['__face__']))
        {
            include_once(ROOT_PATH . './api/uc_client/client.php');
            $uc_check_result = uc_check_avatar(MEMBER_UCUID);
            if($uc_check_result)
            {
                $this->DatabaseHandler->Query("update ".TABLE_PREFIX."members set `face`='./images/noavatar.gif' where `uid`='{$uid}'");
            }
        }
        return $member;
    }
    function _recommendTag($day=1,$limit=12,$cache_time=0)
    {
        if($limit < 1) return false;
        $time = $day * 86400;
        $cache_time = ($cache_time ? $cache_time : $time / 90);
        if (false === ($list = cache("misc/recommendTopicTag-{$day}-{$limit}",$cache_time))) {
            $dateline = TIMESTAMP - $time;
            $sql = "SELECT DISTINCT(tag_id) AS tag_id, COUNT(item_id) AS item_id_count FROM `".TABLE_PREFIX."topic_tag` WHERE dateline>=$dateline GROUP BY tag_id ORDER BY item_id_count DESC LIMIT {$limit}";
            $query = $this->DatabaseHandler->Query($sql);
            $ids = array();
            while (false != ($row = $query->GetRow()))
            {
                $ids[$row['tag_id']] = $row['tag_id'];
            }
            $list = array();
            if($ids) {
                $sql = "select `id`,`name`,`topic_count` from `".TABLE_PREFIX."tag` where `id` in('".implode("','",$ids)."')";
                $query = $this->DatabaseHandler->Query($sql);
                $list = $query->GetAll();
            }
            cache($list);
        }
        return $list;
    }
    function _recommendUser($day=1,$limit=12,$cache_time=0) {
        return Load::model('data_block')->recommend_topic_user($day, $limit, $cache_time);
    }
    function _guestIndex() {
        if(MEMBER_ID > 0) {
            $member = $this->_member(MEMBER_ID);
        }
        $limit = $this->ShowConfig['topic_index']['guanzhu'];
        if ($limit > 0) {
            if(false === ($r_users = cache("index/r_users",$this->CacheConfig['topic_index']['guanzhu']))) {
                $r_users = $this->TopicLogic->GetMember("where face !='' order by `fans_count` desc limit {$limit}","`uid`,`ucuid`,`username`,`face_url`,`face`,`fans_count`,`validate`,`validate_category`,`nickname`");
                cache($r_users);
            }
        }
        $day2_r_users = $this->_recommendUser(7,$this->ShowConfig['topic_index']['new_user'],$this->CacheConfig['topic_index']['new_user']);
        $r_tags = $this->_recommendTag(2,$this->ShowConfig['topic_index']['hot_tag'],$this->CacheConfig['topic_index']['hot_tag']);
        $recommend_count = 0;
        if ($this->ShowConfig['topic_index']['recommend_topic']) {
            if (false === ($cache_recommend_topics = cache("index/recommend_topics", $this->CacheConfig['topic_index']['recommend_topic']))) {
                $TopicListLogic = Load::logic('topic_list', 1);
                $type_sql = jimplode(get_topic_type());
                $fields = " a.* ";
                $vip_t = $vip_w = '';
                if($this->Config['only_show_vip_topic']) {
                    $vip_t = ', '.DB::table('members').' m ';
                    $vip_w = ' and m.uid=a.uid and m.validate="1" ';
                }
                $table = " ".DB::table("topic")." a,(SELECT uid, max(dateline) max_dateline FROM ".DB::table("topic")." WHERE type IN(".$type_sql.") GROUP BY uid) b $vip_t ";
                $where = "  WHERE a.uid = b.uid AND a.dateline = b.max_dateline AND a.type IN({$type_sql}) $vip_w ORDER BY a.dateline DESC LIMIT {$this->ShowConfig['topic_index']['recommend_topic']}";
                $recommend_topics = $this->TopicLogic->Get($where, $fields, 'Make', $table);
                $parent_list = $this->TopicLogic->GetParentTopic($recommend_topics);
                $cache_recommend_topics = array(
                    'recommend_topics' => $recommend_topics,
                    'parent_list' => $parent_list,
                );
                cache("index/recommend_topics", -1);
                cache($cache_recommend_topics);
            } else {
                $recommend_topics = $cache_recommend_topics['recommend_topics'];
                $parent_list = $cache_recommend_topics['parent_list'];
            }
            $recommend_count = count($recommend_topics);
        }
        $cache_id = 'notice/list-topic_index_guest';
        if (false===($list_notice = Load::model('cache/file')->get($cache_id))) {
            $sql="select `id`,`title` from ".TABLE_PREFIX.'notice'." order by `id` desc limit 5 ";
            $query = $this->DatabaseHandler->Query($sql);
            $list_notice = array();
            while (false != ($row = $query->GetRow())) {
                $row['titles']    = $row['title'];
                $row['title']     = cutstr($row['title'],30);
                $list_notice[]    = $row;
            }
            Load::model('cache/file')->set($cache_id, $list_notice, 86400);
        }
        $this->MetaKeywords = $this->Config['index_meta_keywords'];
        $this->MetaDescription = $this->Config['index_meta_description'];
        include($this->TemplateHandler->Template('topic_index_guest'));
    }
    function _myGroup($uid=0,$limit='')
    {
        $order = 'order by `group_count` desc';
        $sql="Select `id`,`group_name`,`group_count` From ".TABLE_PREFIX.'group'." where `uid` = '{$uid}' {$order} {$limit}";
        $query = $this->DatabaseHandler->Query($sql);
        $list = $query->GetAll();
        return $list;
    }
    function _GroupFields($uid=0)
    {
        $list = array();
        if(MEMBER_ID > 0)
        {
            $sql="Select * From ".TABLE_PREFIX.'groupfields'." where `touid` = '{$uid}' and `uid` = '".MEMBER_ID."' order by `id` desc";
            $query = $this->DatabaseHandler->Query($sql);
            $list = $query->GetAll();
        }
        return $list;
    }
    function _Medal($medalid=0,$uid=0)
    {
        $uid = (is_numeric($uid) ? $uid : 0);
        $medal_list = array();
        if($uid > 0)
        {
            $sql = "select  U_MEDAL.dateline ,  MEDAL.medal_img , MEDAL.conditions , MEDAL.medal_name ,MEDAL.medal_depict ,MEDAL.id , U_MEDAL.*
                from `".TABLE_PREFIX."medal` MEDAL
                left join `".TABLE_PREFIX."user_medal` U_MEDAL on MEDAL.id=U_MEDAL.medalid
                where U_MEDAL.uid='{$uid}'
                and U_MEDAL.is_index = 1
                and MEDAL.is_open = 1 ";
            $query = $this->DatabaseHandler->Query($sql);
            while (false != ($row = $query->GetRow()))
            {
                $row['dateline'] = date('m-d日 H:s ',$row['dateline']);
                $medal_list[$row['id']] = $row;
            }
        }
        return $medal_list;
    }
}
?>
