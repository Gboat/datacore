<?php
if(!defined('IN_DATACORE'))
{
    exit('invalid request');
}
class ModuleObject extends MasterObject
{
    var $TopicLogic;
    var $MblogLogic;
    var $ID;
    var $Config;
    function ModuleObject($config)
    {
        $this->MasterObject($config);
        $this->Config = $config;
        Load::logic('topic');
        $this->TopicLogic = new TopicLogic($this);
        Mobile::logic('mblog');
        $this->MblogLogic = new MblogLogic();
        $this->ID = (int) ($this->Post['id'] ? $this->Post['id'] : $this->Get['id']);
        if (!in_array($this->Code, array('new', 'hot_comments', 'hot_forwards'))) {
            Mobile::is_login();
        }
        $this->Execute();
    }
    function Execute()
    {
        ob_start();
        switch($this->Code)
        {
            case 'home':
            case 'at_my':
            case 'comment_my':
            case 'my_blog':
            case 'tag':
            case 'new':
            case 'hot_comments':
            case 'hot_forwards':
            case 'my_favorite':
                $this->getList();
                break;
            case 'favorite':
                $this->favorite();
                break;
            case 'detail':
                $this->detail();
                break;
            case 'comment':
                $this->getCommentList();
                break;
            case 'add':
                $this->add();
                break;
        }
        response_text(ob_get_clean());
    }
    function Main()
    {
        response_text("正在建设中……");
    }
        function getList()
    {    
        $type = $this->Code;
        $this->Get['limit'] = Mobile::config("perpage_mblog");
        $ret = $this->MblogLogic->getListByType($type, $this->Get);
                $error_code = 0;
        if (is_array($ret)) {
            $topic_list = $ret['topic_list'];
            $ret['list_count'] = count($topic_list);
            Mobile::output($ret);
        } else {
            $msg = '';
            if ($ret == 400) {
                $msg = 'No Data';
            }
            Mobile::error("No Data", $ret);
        }
    }
        function detail()
    {
        $tid = intval($this->Get['tid']);
        $ret = $this->MblogLogic->getDetail($tid);
        if (is_array($ret)) {
            Mobile::output($ret);
        } else {
            Mobile::error("No Data", 400);
        }
    }
        function getCommentList()
    {
        $tid = intval($this->Get['tid']);
        $topic_info = $this->MblogLogic->TopicLogic->Get($tid);
        if (empty($topic_info)) {
            Mobile::error('No Data', 400);
        }
        if ($topic_info['replys'] > 0) {
            $param = array(
                'tid' => $tid,
                'limit' => Mobile::config("perpage_mblog"),
                'max_tid' => intval($this->Get['max_tid']),
            );
            $ret = $this->MblogLogic->getCommentList($param);
            $error_code = 0;
            if (is_array($ret)) {
                $topic_list = $ret['topic_list'];
                $ret['list_count'] = count($topic_list);
                Mobile::output($ret);
            } else {
                $error_code = $ret;
                Mobile::error('No Data', 400);
            }
        } else {
            Mobile::error('No Data', 400);
        }
    }
    function add()
    {
        if (MEMBER_ID < 1) {
            Mobile::error('No Login', 410);
        }
                if($this->MemberHandler->HasPermission($this->Module,$this->Code) == false) {
                          Mobile::error('No Permission', 411);
        }
        $content = trim(strip_tags($this->Post['content']));
        if (!$content) {
                        Mobile::error('No Content', 420);
        }
                $topic_type = $this->Post['topictype'];
        if('both' == $topic_type){
            $type = 'both';
        } elseif('reply' == $topic_type){
            $type = 'reply';
        } elseif('forward' == $topic_type){
            $type = 'forward';
        } elseif('qun' == $topic_type){
            $type = 'qun';
        } elseif ('personal' == $topic_type) {
            $type = 'personal';
        } elseif (is_numeric($topic_type)) {
            $type = 'first';
        } else{
            $type = 'first';
        }     
        $totid = max(0, (int) $this->Post['totid']);
        $imageid = $this->Upload();
        $videoid = max(0, (int) $this->Post['videoid']);
        $longtextid = max(0, (int) $this->Post['longtextid']);
                $from = trim(strtolower($this->Post['from']));
        $item = trim($this->Post['item']);
        $item_id  = intval(trim($this->Post['item_id']));
        if (!empty($item_id)) {
                        Load::functions('app');
            $ret = app_check($item, $item_id);
            if (!$ret) {
                $item = '';
                $item_id = 0;
            }
        } else {
            $item = '';
            $item_id = 0;
        }
        $data = array( 
            'content' => $content,
            'totid'=>$totid,
            'imageid'=>$imageid,
            'videoid'=>$videoid,
            'from'=>empty($from) ? 'mobile' : $from,
            'type'=>$type,
                        'item' => $item,
            'item_id' => $item_id,
                        'longtextid' => $longtextid,
        );
        $return = $this->TopicLogic->Add($data);
        if (is_array($return) && $return['tid'] > 0) {
            Mobile::success('Publish Success', 200);
        } else {          
                                    Mobile::error('Publish Fail', 430);
        }
    }
    function Delete()
    {
        $tid = (int) ($this->Post['tid'] ? $this->Post['tid'] : $this->Get['tid']);
        if ($tid < 1) {
            js_alert_output("请指定一个您要删除的话题");
        }
        $topic = $this->TopicLogic->Get($tid);
        if (!$topic) {
            js_alert_output("话题已经不存在了");
        }
        if ($topic['uid']!=MEMBER_ID && 'admin'!=MEMBER_ROLE_TYPE) {
            js_alert_output("您无权删除该话题");
        }
        $return = $this->TopicLogic->Delete($tid);
        response_text($return . $this->js_show_msg());
    }
        function favorite() 
    {
        $uid = MEMBER_ID;
        $tid = (int) ($this->Post['tid']);
                $count = DB::result_first("SELECT COUNT(*) FROM ".DB::table("topic")." WHERE tid='{$tid}'");
        if (!$count) {
                        Mobile::error("No Topic", 501);
        }
        $op = trim($this->Post['op']);
        if (in_array($op, array("add", "delete"))) {
            Load::logic('other');
            $OtherLogic = new OtherLogic();
            $TopicFavorite = $OtherLogic->TopicFavorite($uid, $tid, $op);
            Mobile::success("Do Success");
        } else if ($op == "check") {
            $count = DB::result_first("SELECT COUNT(*) FROM ".DB::table('topic_favorite')." WHERE tid='{$tid}' AND uid='".MEMBER_ID."'");
            if ($count > 0) {
                Mobile::success("Favorite", 550);
            } else {
                Mobile::success("Not Favorite", 551);
            }
        } else {
            Mobile::error("Not Allowed", 402);
        }
    }
        function Upload()
    {
        $image_id = 0;
        $field = 'topic';
        if (empty($_FILES) || !$_FILES[$field]['name']) {
            return 0;
        } else {
            $timestamp = time();
            $uid = $this->Post['touid'] ? $this->Post['touid'] : MEMBER_ID;
            $username = $this->Post['tousername'] ? $this->Post['tousername'] : MEMBER_NAME;
            $sql = "insert into `".TABLE_PREFIX."topic_image`(`uid`,`username`,`dateline`) values ('{$uid}','{$username}','{$timestamp}')";
            $query = DB::query($sql);
            $image_id = DB::insert_id();
            if ($image_id < 1)
            {
                return 0;
            }
            Load::lib('io');
            $IoHandler = new IoHandler();
            $sub_path = './images/' . $field . '/' . face_path($image_id);
            $image_path = RELATIVE_ROOT_PATH . $sub_path;
            $image_path_abs = ROOT_PATH.$sub_path;
            $image_path2 = './images/' . $field . '/' . face_path($image_id);
            $image_name = $image_id . "_o.jpg";
            $image_file = $image_path . $image_name;
            $image_file_abs = $image_path_abs.$image_name;
            $image_file2 = $image_path2.$image_name;
            $image_file_small = $image_path.$image_id . "_s.jpg";
            $image_file_small_abs = $image_path_abs.$image_id . "_s.jpg";
            if (!is_dir($image_path_abs)) 
                {
                $IoHandler->MakeDir($image_path_abs);
            }
            Load::lib('upload');
            $UploadHandler = new UploadHandler($_FILES,$image_path_abs,$field,true);
            $UploadHandler->setMaxSize(2048);
            $UploadHandler->setNewName($image_name);
            $result=$UploadHandler->doUpload();
            if($result) {
                $result = is_image($image_file_abs);
            }
            if(false == $result) {
                $IoHandler->DeleteFile($image_file_abs);
                $sql = "delete from `".TABLE_PREFIX."topic_image` where `id`='{$image_id}'";
                DB::query($sql);
                $error_msg = implode(" ",(array) $UploadHandler->getError());
            } else {
                $this->_removeTopicImage($image_id);
                list($image_width,$image_height,$image_type,$image_attr) = getimagesize($image_file_abs);
                $result = makethumb(
                    $image_file_abs,
                    $image_file_small_abs,
                    min($this->Config['thumbwidth'],$image_width),
                    min($this->Config['thumbwidth'],$image_height),
                    $this->Config['maxthumbwidth'],
                    $this->Config['maxthumbheight']
                );
                if (!$result && !is_file($image_file_small_abs)) 
                    {
                    @copy($image_file_abs,$image_file_small_abs);
                }
                                if($this->Config['watermark_enable']) 
                    {
                        $arr = @getimagesize($image_file_abs);
                        if($arr && 'image/gif' != $arr['mime'] && 'image/png' != $arr['mime'])
                        {
                            $this->_watermark($image_file_abs,$this->Config['site_url'] . "/" . MEMBER_NAME);
                        }
                }
                $image_size = filesize($image_file_abs);
                $name = addslashes($_FILES[$field]['name']);
                                        $site_url = '';
                    if($this->Config['ftp_on'])
                    {
                        $site_url = ConfigHandler::get('ftp','attachurl');
                        $ftp_result = ftpcmd('upload',$image_file_abs);
                        if($ftp_result > 0)
                        {
                            ftpcmd('upload',$image_file_small_abs);
                            $IoHandler->DeleteFile($image_file_abs);
                            $IoHandler->DeleteFile($image_file_small_abs);
                            $image_file_small = $site_url . '/' . $image_file_small; 
                        }                        
                    }
                $sql = "update `".TABLE_PREFIX."topic_image` set `site_url`='{$site_url}', `photo`='{$image_file2}' , `name`='{$name}' , `filesize`='{$image_size}' , `width`='{$image_width}' , `height`='{$image_height}' where `id`='{$image_id}'";
                DB::query($sql);
            }
        }
        return $image_id;
    }
    function _removeTopicImage($id=0)
    {
        Load::lib('io');
        $IoHandler = new IoHandler();
        $sql = "select * from ".TABLE_PREFIX."topic_image where `tid`<1" . ($id>0?" and `id`<'".($id - 10)."'":"");
        $query = DB::query($sql);
        while ($row = DB::fetch($query))
        {
            $IoHandler->DeleteFile(topic_image($row['id'],'small'));
            $IoHandler->DeleteFile(topic_image($row['id'],'original'));
        }
    }
    function _watermark($pic_path,$watermark,$new_pic_path='')
    {
        if(false === is_file($pic_path)) {
            return false;
        }
        if('' == trim($watermark)) {
             return false;
        }
        $sys_config = ConfigHandler::get();
        if (!$sys_config['watermark_enable']) {
            return false;
        }
        if('' == $new_pic_path) {
            $new_pic_path = $pic_path;
        }
        require_once(ROOT_PATH . 'include/lib/thumb.class.php');
        $_thumb = new ThumbHandler();
        $_thumb->setSrcImg($pic_path);
        $_thumb->setDstImg($new_pic_path);
        $_thumb->setImgCreateQuality(80);
        $_thumb->setMaskPosition($sys_config['watermark_position']);
        if(is_file($watermark))
        {
            $_thumb->setMaskImgPct(100);
            $_thumb->setMaskImg($watermark);
        }
        else
        {
                        $mask_word = (string) $watermark;
            if (preg_match('~[\x7f-\xff][\x7f-\xff]~',$mask_word)) {
                if(is_file(RELATIVE_ROOT_PATH . 'images/jsg.ttf')) {
                    $_thumb->setMaskFont(RELATIVE_ROOT_PATH . 'images/jsg.ttf');
                    $mask_word = array_iconv($this->Config['charset'],'utf-8',$mask_word);
                } else {
                    $mask_word = $sys_config['site_url'];
                }
            }
            $_thumb->setMaskWord($mask_word);
        }
        return $_thumb->createImg(100);
    }
}
?>
