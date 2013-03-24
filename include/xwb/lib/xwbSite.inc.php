<?php 
if( !defined('IS_IN_XWB_PLUGIN') ){
    exit('Access Denied!');
}
function xwb_setSiteUserLogin($uid)
{
    $uid = (int) $uid;
    if ($uid < 1) {
        return false;
    }
    $member = jsg_member_login_set_status($uid);
       $GLOBALS['_J']['config']['login_user'] = $member;
    return $member;
}
function xwb_setSiteRegister($nickname, $email, $pwd=false)
{
    $db = XWB_plugin::getDB();
    $uid = 0;
    $password = ($pwd ? $pwd : rand(100000,999999));
    $regstatus = jsg_member_register_check_status();
    if($regstatus['normal_enable'] || true===DATACORE_FORCED_REGISTER)
    {
        $uid = jsg_member_register($nickname, $password, $email);
    }
    $rst = array('uid'=>$uid, 'password'=>$password);
    return $rst;
}
