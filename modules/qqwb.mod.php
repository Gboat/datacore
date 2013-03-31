<?php
if(!defined('IN_DATACORE'))
{
    exit('invalid request');
}
class ModuleObject extends MasterObject
{
    var $QQWBConfig = array();
    var $QQWBApi = array();
    var $UserInfo = array();
    function ModuleObject($config)
    {
        $this->MasterObject($config);
        $this->_init_qqwb();
        $this->Execute();
    }
    function Execute()
    {
        ob_start();
        switch ($this->Code)
        {
        case 'login':
            $this->Login();
            break;
        case 'auth_callback':
            $this->AuthCallback();
            break;
        case 'login_check':
            $this->LoginCheck();
            break;
        case 'do_login':
            $this->DoLogin();
            break;
        case 'reg_check':
            $this->RegCheck();
            break;
        case 'do_reg':
            $this->DoReg();
            break;
        case 'unbind':
            $this->UnBind();
            break;
        case 'do_modify_bind_info':
            $this->DoModifyBindInfo();
            break;
        default:
            $this->Main();
        }
        $body=ob_get_clean();
        $this->ShowBody($body);
    }
    function Main()
    {
        $this->Messager("未定义的操作", null);
    }
    function Login()
    {
        $aurl = $this->_get_oauth_url();
        $this->Messager(null, $aurl);
    }
    function AuthCallback()
    {
        $qqwb_oauth_token_secret = $_SESSION['qqwb_oauth_token_secret'] ? $_SESSION['qqwb_oauth_token_secret'] : jsg_getcookie('qqwb_oauth_token_secret');
        if(!$qqwb_oauth_token_secret || !get_param('oauth_token'))
        {
            $this->Messager(null,'?');
        }
        require_once(ROOT_PATH . 'include/qqwb/qqoauth.php');
        $QQAuth = new QQOAuth($this->QQWBConfig['app_key'],$this->QQWBConfig['app_secret'],get_param('oauth_token'),$qqwb_oauth_token_secret);
        $last_keys = $QQAuth->getAccessToken(get_param('oauth_verifier'));
        if(!$last_keys['oauth_token'] || !$last_keys['oauth_token_secret'])
        {
            $this->Messager(null,'?');
        }
        $QQAuth = new QQOAuth($this->QQWBConfig['app_key'],$this->QQWBConfig['app_secret'],$last_keys['oauth_token'],$last_keys['oauth_token_secret']);
        $QQInfo = $QQAuth->OAuthRequest('http:/'.'/open.t.qq.com/api/user/info?format=json', 'GET',array());
        unset($_SESSION['qqwb_oauth_token_secret']);
        jsg_setcookie('qqwb_oauth_token_secret','');
        if(!$QQInfo)
        {
            $this->Messager('连接失败',null);
        }
        if('no auth'==$QQInfo)
        {
            $this->Messager($QQInfo,null);
        }
        $QQInfo = json_decode($QQInfo);
        if(!$QQInfo || !$QQInfo->data)
        {
            $this->Messager('解析失败',null);
        }
        $QQInfo = $QQInfo->data;
        if(!$QQInfo->name)
        {
            $this->Messager('内容错误',null);
        }
        $qqwb_bind_info = $this->DatabaseHandler->FetchFirst("select * from ".TABLE_PREFIX."qqwb_bind_info where `qqwb_username`='{$QQInfo->name}'");
        if($qqwb_bind_info)
        {
            if($last_keys['token']!=$last_keys['oauth_token'] || $last_keys['ksecret']!=$last_keys['oauth_token_secret'])
            {
                $this->DatabaseHandler->Query("update ".TABLE_PREFIX."qqwb_bind_info set `token`='{$last_keys['oauth_token']}',`tsecret`='{$last_keys['oauth_token_secret']}' where `qqwb_username`='{$QQInfo->name}'");
            }
            if(false != ($user_info = $this->_user_login($qqwb_bind_info['uid'])))
            {
                if(true === UCENTER && ($ucuid = (int) $user_info['ucuid']) > 0)
                {
                    include_once(ROOT_PATH . './api/uc_client/client.php');
                    $uc_syn_html = uc_user_synlogin($ucuid);
                    $this->Messager("登录成功，正在为您跳转到首页。{$uc_syn_html}",'?',5);
                }
                $this->Messager(null,'?');
            }
            else
            {
                $this->DatabaseHandler->Query("delete from ".TABLE_PREFIX."qqwb_bind_info where `qqwb_username`='{$QQInfo->name}'");
                $this->Messager("绑定的用户已经不存在了",'?');
            }
        }
        else
        {
            if(MEMBER_ID > 0)
            {
                $this->_bind(MEMBER_ID, $QQInfo->name, $last_keys['oauth_token'], $last_keys['oauth_token_secret']);
                $this->Messager(null,'index.php?mod=account&code=qqwb');
            }
            else
            {
                $this->third_party_regstatus();
                $qqwb_username = $QQInfo->name;
                $token = $last_keys['oauth_token'];
                $tsecret = $last_keys['oauth_token_secret'];
                $hash = authcode(md5($qqwb_username . $token . $tsecret), 'ENCODE');
                $reg = array();
                $reg['nickname'] = array_iconv('utf-8',$this->Config['charset'],$QQInfo->nick);
                if($this->QQWBConfig['is_sync_face'] && $QQInfo->head) {
                    $reg['face'] = $QQInfo->head . '/180';
                }
                $this->Title = '腾讯微博帐号绑定';
                include($this->TemplateHandler->Template('qqwb_bind_info'));
            }
        }
    }
    function RegCheck()
    {
        exit($this->_reg_check());
    }
    function _reg_check()
    {
        $this->third_party_regstatus();
        $regstatus = jsg_member_register_check_status();
        if($regstatus['error'])
        {
            Return $regstatus['error'];
        }    
        if(true!==DATACORE_FORCED_REGISTER && $regstatus['invite_enable'])
        {
            if(!$regstatus['normal_enable'])
            {
                Return '非常抱歉，本站目前需要有邀请链接才能注册。' . jsg_member_third_party_reg_msg();
            }
        }
        $in_ajax = get_param('in_ajax');
        if($in_ajax)
        {
            $this->Post = array_iconv('utf-8',$this->Config['charset'],$this->Post);
        }
        $nickname = trim($this->Post['nickname']);
        $email = trim($this->Post['email']);
        $rets = array(
            '0' => '[未知错误] 有可能是站点关闭了注册功能',
            '-1' => '不合法',
            '-2' => '不允许注册',
            '-3' => '已经存在了',
            '-4' => '不合法',
            '-5' => '不允许注册',
            '-6' => '已经存在了',
        );
        $ret = jsg_member_checkname($nickname, 1);
        if($ret < 1)
        {
            return "帐户/昵称 " . $rets[$ret];
        }
        $ret = jsg_member_checkemail($email);
        if($ret < 1)
        {
            return "Email " . $rets[$ret];
        }
        return '';
    }
    function DoReg()
    {
        $this->_hash_check();
        if(false != ($check_result = $this->_reg_check())) {
            $this->Messager($check_result,null);
        }
        $nickname = trim($this->Post['nickname']);
        $password = trim($this->Post['password']);
        $email = trim($this->Post['email']);
        $face = trim($this->Post['face']);
        $synface = ($this->Post['synface'] ? 1 : 0);
        $uid = $ret = jsg_member_register($nickname, $password, $email);
        if($ret < 1) {
            $this->Messager("注册失败{$ret}",null);
        }
        $this->_bind($uid);
        $rets = jsg_member_login($uid, $password, 'uid');
        if($this->QQWBConfig['is_sync_face'] && $synface && $face) {
            $this->_syn_face($uid, $face);
        }
        if($this->QQWBConfig['reg_pwd_display'])
        {
            $this->Messager("您的帐户 <strong>{$rets['nickname']}</strong> 已经注册成功，请牢记您的密码 <strong>{$password}</strong>，现在为您转入到首页{$rets['uc_syn_html']}","?",10);
        }
        else
        {
            if($rets['uc_syn_html'])
            {
                $this->Messager("注册成功，现在为您转入到首页{$rets['uc_syn_html']}",'?');
            }
            else
            {
                $this->Messager(null,'?');
            }
        }
    }
    function LoginCheck()
    {
        exit($this->_login_check());
    }
    function _login_check()
    {
        $in_ajax = get_param('in_ajax');
        if($in_ajax)
        {
            $this->Post = array_iconv('utf-8',$this->Config['charset'],$this->Post);
        }
        $username = trim($this->Post['username']);
        $password = trim($this->Post['password']);
        $rets = jsg_member_login_check($username, $password);
        $ret = $rets['uid'];
        if($ret < 1)
        {
            $rets = array(
                '0' => '未知错误 ',
                '-1' => '用户名或者密码错误',
                '-2' => '用户名或者密码错误',
                '-3' => '累计 5 次错误尝试，15 分钟内您将不能登录',
            );
            return $rets[$ret];
        }
        $this->UserInfo = $this->DatabaseHandler->FetchFirst("select * from ".TABLE_PREFIX."members where `username`='{$username}'");
        return '';
    }
    function DoLogin()
    {
        $this->_hash_check();
        if(false != ($check_result = $this->_login_check())) {
            $this->Messager($check_result,null);
        }
        $timestamp = time();
        $username = trim($this->Post['username']);
        $password = trim($this->Post['password']);
        $rets = jsg_member_login($username, $password);
        $this->_bind($rets['uid']);
        if($rets['uc_syn_html'])
        {
            $this->Messager("登录成功，现在为您转入到首页{$rets['uc_syn_html']}","?",5);
        }
        else
        {
            $this->Messager(null,'?');
        }
    }
    function UnBind() {
        $uid = max(0, (int) MEMBER_ID);
        if($uid < 1) {
            $this->Messager("请先<a href='index.php?mod=login'>点此登录</a>或者<a href='index.php?mod=member'>点此注册</a>一个帐号",null);
        }
        $this->DatabaseHandler->Query("delete from ".TABLE_PREFIX."qqwb_bind_info where `uid`='$uid'");
        Load::model('misc')->update_account_bind_info($uid, '', '', 1);
        $this->Messager("已经成功解除绑定");
    }
    function DoModifyBindInfo() {
        $uid = max(0, (int) MEMBER_ID);
        if($uid < 1) {
            $this->Messager("请先<a href='index.php?mod=login'>点此登录</a>或者<a href='index.php?mod=member'>点此注册</a>一个帐号",null);
        }
        $synctoqq = (get_param('synctoqq') ? 1 : 0);
        $this->DatabaseHandler->Query("update ".TABLE_PREFIX."qqwb_bind_info set `synctoqq`='$synctoqq' where `uid`='$uid'");
        Load::model('misc')->update_account_bind_info($uid, '', '', 1);
        $this->Messager("设置成功");
    }
    function _init_qqwb()
    {
        if ($this->Config['qqwb_enable'] && qqwb_init($this->Config)) {
            if(!session_id()) {
                session_start();
            }
            $this->QQWBConfig = ConfigHandler::get('qqwb');
            require_once(ROOT_PATH . 'include/qqwb/oauth.php');
        } else {
            $this->Messager("整合腾讯微博的功能未启用，请联系管理员开启", null);
        }
    }
    function _get_oauth_url()
    {
        $callback = $this->Config['site_url'] . "/index.php?mod=qqwb&code=auth_callback";
        require_once(ROOT_PATH . 'include/qqwb/qqoauth.php');
        $QQAuth = new QQOAuth($this->QQWBConfig['app_key'],$this->QQWBConfig['app_secret']);
        $keys = $QQAuth->getRequestToken($callback);
        $_SESSION['qqwb_oauth_token_secret'] = $keys['oauth_token_secret'];
        jsg_setcookie('qqwb_oauth_token_secret', $_SESSION['qqwb_oauth_token_secret']);
        $aurl = $QQAuth->getAuthorizeURL($keys['oauth_token'], $callback);
        return $aurl;
    }
    function _user_login($uid)
    {
        return jsg_member_login_set_status($uid);
    }    
    function third_party_regstatus() {
        if($this->Config['third_party_regstatus'] && in_array('qqwb', $this->Config['third_party_regstatus'])) {
            define('DATACORE_FORCED_REGISTER', true);
        }
    }
    function _syn_face($uid, $face='') {
        $uid = max(0, (int) $uid);
        if($uid < 1) return 0;
        $face = trim(strip_tags($face));
        if(false === strpos($face, ':/'.'/')) {
            return 0;
        }
        $image_path = RELATIVE_ROOT_PATH . 'images/face/' . face_path($uid);
        $image_file_big = $image_path . $uid . "_b.jpg";
        if(!file_exists($image_file_big)) {
            if (!is_dir($image_path)) {
                Load::lib('io', 1)->MakeDir($image_path);
            }
            $temp_image = dfopen($face, 999999, '', '', true, 5, $_SERVER['HTTP_USER_AGENT']);
            if(!$temp_image) {
                return 0;
            }
            Load::lib('io', 1)->WriteFile($image_file_big, $temp_image);
            if(is_image($image_file_big)) {
                $image_file_small = $image_path . $uid . '_s.jpg';
                $make_result = makethumb($image_file_big, $image_file_small, 50, 50);
                if(!is_image($image_file_small)) {
                    return 0;
                }
                $face_url = '';
                if($this->Config['ftp_on']) {
                    $face_url = ConfigHandler::get('ftp','attachurl');
                    $ftp_result = ftpcmd('upload',$image_file_big);
                    if($ftp_result > 0) {
                        ftpcmd('upload',$image_file_small);
                        Load::lib('io', 1)->DeleteFile($image_file_big);
                        Load::lib('io', 1)->DeleteFile($image_file_small);
                    }
                }        
                $sql = "update `".TABLE_PREFIX."members` set `face_url`='{$face_url}', `face`='{$image_file_small}' where `uid`='$uid'";
                $this->DatabaseHandler->Query($sql);
                if($this->Config['extcredits_enable'] && $uid > 0) {
                    update_credits_by_action('face', $uid);
                }
            }
        }
        return 0;
    }    
    function _hash_check() {
        $hash = '';
        if($this->Post['hash']) {
            $hash = authcode($this->Post['hash'], 'DECODE');
        }
        $md5 = md5($this->Post['qqwb_username'] . $this->Post['token'] . $this->Post['tsecret']);
        if($hash != $md5) {
            $this->Messager("非法请求", null);
        }
    }
    function _bind($uid, $qqwb_username='', $token='', $tsecret='') {
        $uid = (is_numeric($uid) ? $uid : 0);
        $qqwb_username = ($qqwb_username ? $qqwb_username : $this->Post['qqwb_username']);
        $token = ($token ? $token : $this->Post['token']);
        $tsecret = ($tsecret ? $tsecret : $this->Post['tsecret']);
        if($uid < 1 || !$qqwb_username || !$token || !$tsecret) return 0;
        $ret = $this->DatabaseHandler->Query("REPLACE INTO ".TABLE_PREFIX."qqwb_bind_info
            (`uid`,
            `qqwb_username`,
            `token`,
            `tsecret`,
            `dateline`)
            VALUES ('{$uid}',
                '{$qqwb_username}',
                '{$token}',
                '{$tsecret}',
                '".TIMESTAMP."')");
        Load::model('misc')->update_account_bind_info($uid, '', '', 1);
        return $ret;
    }
}
?>
