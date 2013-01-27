<?php
if(!defined('IN_JISHIGOU'))
{
    exit('invalid request');
}
class ModuleObject extends MasterObject
{
    var $Username = '';
    var $Password = '';
    function ModuleObject($config) {
        $this->MasterObject($config);
        $this->Username = isset($this->Post['username']) ? trim($this->Post['username']) : "";
        $this->Password = isset($this->Post['password']) ? trim($this->Post['password']) : "";
        if(MEMBER_ID > 0 && 'admin' == MEMBER_ROLE_TYPE) {
            $this->_loginfailed(3);
        }
        $this->Execute();
    }
    function Execute()
    {
        ob_start();
        switch($this->Code)
        {
            case 'logout':
                $this->LogOut();
                break;
            case 'dologin':
                $this->DoLogin();
                break;
            default:
                $this->login();
                break;
        }
        $body = ob_get_clean();
        $this->ShowBody($body);
    }
    function login() {
        if(MEMBER_ID < 1)  {
            $this->Messager("请先在前台进行<a href='index.php?mod=login'><b>登录</b></a>",null);
        }
        $loginperm = $this->_logincheck();
        if(!$loginperm) {
            $this->Messager("累计 5 次错误尝试，15 分钟内您将不能登录。",null);
        }
        $this->Title="用户登录";
        if (jsg_getcookie('referer')=='') {
            jsg_setcookie('referer',referer());
        }
        $action="admin.php?mod=login&code=dologin";
        include($this->TemplateHandler->Template("admin/login"));
    }
    function DoLogin() {
        $uid = (int) (get_param('uid') ? get_param('uid') : MEMBER_ID);
        if(MEMBER_ID < 1 || $uid != MEMBER_ID) {
            $this->Messager("请先在前台进行<a href='index.php?mod=login'><b>登录</b></a>", null);
        }
        if('' == $this->Password) {
            $this->Messager("无法登录,用户名或密码不能为空");
        }
        $loginperm = $this->_logincheck();
        if(!$loginperm) {
            $this->Messager("累计 5 次错误尝试，15 分钟内您将不能登录。",null);
        }
        $rets = jsg_member_login_check($uid, $this->Password, 'uid');
        if($rets['uid'] < 1) {
            $this->Messager("无法登录,用户名或密码错误,您可以有至多 5 次尝试。", -1);
        }
        $this->_loginfailed(3);
        $UserFields=$this->MemberHandler->GetMemberFields();
        $authcode=authcode("{$UserFields['password']}\t{$UserFields['uid']}",'ENCODE',$this->jsgAuthKey);
        jsg_setcookie('jsgAuth',$authcode);
        $this->Messager("登录成功，正在进入后台",'admin.php');
    }
    function LogOut() {
        jsg_setcookie('jsgAuth', '');
        jsg_setcookie('ajhAuth', '');
        $this->Messager('您已经成功退出了后台，<a href="'.$this->Config['site_url'].'"><b>点此返回网站首页</b></a>', null);
    }
    function _logincheck() {
        $onlineip= client_ip();
        $timestamp=time();
        $query = $this->DatabaseHandler->Query("SELECT count, lastupdate FROM ".TABLE_PREFIX.'failedlogins'." WHERE ip='$onlineip'");
        if(false != ($login = $query->GetRow())) {
            if($timestamp - $login['lastupdate'] > 900) {
                return 3;
            } elseif($login['count'] < 5) {
                return 2;
            } else {
                return 0;
            }
        } else {
            return 1;
        }
    }
    function _loginfailed($permission) {
        $onlineip= client_ip();
        $timestamp=time();
        $failedlogins = $this->DatabaseHandler->FetchFirst("SELECT count, lastupdate FROM ".TABLE_PREFIX.'failedlogins'." WHERE ip='$onlineip'");
        switch($permission) {
            case 1:    $this->DatabaseHandler->Query("REPLACE INTO ".TABLE_PREFIX.'failedlogins'." (ip, count, lastupdate) VALUES ('$onlineip', '1', '$timestamp')");
                break;
            case 2: 
                if($failedlogins) 
                {
                    $this->DatabaseHandler->Query("UPDATE ".TABLE_PREFIX.'failedlogins'." SET count=count+1, lastupdate='$timestamp' WHERE ip='$onlineip'");
                }
                break;
            case 3: 
                if($failedlogins)
                {
                    $this->DatabaseHandler->Query("UPDATE ".TABLE_PREFIX.'failedlogins'." SET count='1', lastupdate='$timestamp' WHERE ip='$onlineip'");
                }
                $this->DatabaseHandler->Query("DELETE FROM ".TABLE_PREFIX.'failedlogins'." WHERE lastupdate<$timestamp-901", 'UNBUFFERED');
                break;
        }
    }
}
?>