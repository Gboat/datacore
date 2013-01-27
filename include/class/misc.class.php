<?php
if(!defined('IN_JISHIGOU')) {
    exit('invalid request');
}
class misc {
    function misc() {
        ;
    }
    function account_bind_info($uid, $key=null, $cache=1) {
        static $S_account_bind_info = null;
        $uid = is_numeric($uid) ? $uid : 0;
        if($uid < 1) {
            return false;
        }
        if(!$cache || !isset($S_account_bind_info[$uid])) {
            $memberfields = array();
            if($uid===MEMBER_ID) {
                $memberfields = $GLOBALS['_J']['member'];
            }
            if(!isset($memberfields['account_bind_info'])) {
                $memberfields = DB::fetch_first("SELECT `uid`, `account_bind_info` FROM ".DB::table('memberfields')." WHERE `uid`='$uid' ");
            }
            if($memberfields['account_bind_info']) {
                $memberfields['account_bind_info'] = unserialize(base64_decode($memberfields['account_bind_info']));
            } else {
                return false;
            }
            $S_account_bind_info[$uid] = $memberfields['account_bind_info'];
        }
        if(is_null($key)) {
            return $S_account_bind_info[$uid];
        } else {
            if(is_null($S_account_bind_info[$uid][$key])) {
                return false;
            } else {
                return $S_account_bind_info[$uid][$key];
            }
        }
    }
    function update_account_bind_info($uid=MEMBER_ID, $key='', $val=array(), $clean=0) {
        if($clean) {
            $val = '';
        } else {
            $info = $this->account_bind_info($uid, null, 0);
            $info[$key] = (array) $val;
            $val = base64_encode(serialize($info));
        }
        $uid = (is_numeric($uid) ? $uid : 0);
        return DB::query("UPDATE ".DB::table('memberfields')." SET `account_bind_info`='$val' ".(($uid > 0 || !$clean) ? " WHERE `uid`='$uid' " : "")." ");
    }
}
?>