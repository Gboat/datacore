<?php

if(!defined('IN_JISHIGOU'))
{
exit('invalid request');
}
function sms_enable($sys_config=array())
{
if(!$sys_config)
{
$sys_config = ConfigHandler::get();
}
if(!$sys_config['sms_enable'])
{
sms_errors('sms_enable sms is disable');
return false;
}
if((!is_numeric(constant('SMS_APP_ID'))) ||(32!=strlen(constant('SMS_APP_KEY'))) ||!(constant('SMS_ID')))
{
sms_errors('sms_enable sms is invalid');
return false;
}
if($sys_config['sms_extra_enable'])
{
Load::functions('sms_extra');
}
return $sys_config;
}
function sms_is_phone($num)
{
$return = false;
if($num &&is_numeric($num) &&$num >0)
{
settype($num,'string');
$num_len = strlen($num);
if(11==$num_len ||12==$num_len)
{
$return = preg_match('~^((?:13|15|18)\d{9}|0(?:10|2\d|[3-9]\d{2})[1-9]\d{6,7})$~',$num);
}
}
return $return;
}
function sms_bind_icon($uid=0)
{
$return = '';
$uid = max(0,(int) ($uid ?$uid : MEMBER_ID));
if ($uid >0 &&($sys_config = sms_enable()))
{
$return = "<img src='{$sys_config['site_url']}/images/sms_off.gif' alt='未绑定手机短信' />";
if (sms_has_bind($uid))
{
$return = "<img src='{$sys_config['site_url']}/images/sms_on.gif' alt='已经绑定手机短信' />";
}
if (MEMBER_ID>0)
{
$return = "<a href='#' title='手机短信绑定设置' onclick=\"window.location.href='{$sys_config['site_url']}/index.php?mod=other&code=sms';return false;\">{$return}</a>";
}
}
return $return;
}
if(!function_exists('file_put_contents')) {
!defined('FILE_APPEND') &&define('FILE_APPEND',8);
function file_put_contents($filename,$data,$flag = false) {
$mode = ($flag == FILE_APPEND ||strtoupper ( $flag ) == 'FILE_APPEND') ?'ab': 'wb';
$f = @fopen ( $filename,$mode );
if ($f === false) {
return 0;
}else {
if ( is_array ( $data )){
$data = implode ( '',$data );
}
$bytes_written = @fwrite ( $f,$data );
@fclose ($f);
return $bytes_written;
}
}
}
if(!function_exists('jfsockopen'))
{
function jfsockopen($hostname,$port,$errno,$errstr,$timeout)
{
$fp = false;
if(function_exists('fsockopen'))
{
@$fp = fsockopen($hostname,$port,$errno,$errstr,$timeout);
}
elseif(function_exists('pfsockopen'))
{
@$fp = pfsockopen($hostname,$port,$errno,$errstr,$timeout);
}
return $fp;
}
}
function sms_sys_config()
{
if(!isset($GLOBALS['sms_sys_config']))
{
$config = ConfigHandler::get();
$GLOBALS['sms_sys_config'] = array(
'charset'=>$config['charset'],
'db_host'=>($config['db_host'].(($config['db_port'] &&3306!=$config['db_port'])?":{$config['db_port']}":"")),
'db_user'=>$config['db_user'],
'db_pass'=>$config['db_pass'],
'db_name'=>$config['db_name'],
'db_char'=>str_replace('utf-8','utf8',strtolower($config['charset'])),
'db_connect'=>$config['db_persist'],
'db_table_prefix'=>$config['db_table_prefix'],
'site_url'=>$config['site_url'],
'site_name'=>$config['site_name'],
'sms_enable'=>$config['sms_enable'],
'sms_extra_enable'=>$config['sms_extra_enable'],
);
sms_define('SMS_INPUT_CHARSET',$GLOBALS['sms_sys_config']['charset']);
include(SMS_S_ROOT.'setting/sms.php');
sms_define('SMS_APP_ID',$config['sms']['app_id']);
sms_define('SMS_APP_KEY',$config['sms']['app_key']);
sms_define('SMS_SERVER_URL',$config['sms']['server_url']);
sms_define('SMS_ID',$config['sms']['sms_id']);
$config['sms']['__send_message_count__'] = 0;
$GLOBALS['sms_sys_config']['sms'] = $config['sms'];
}
}
function sms_config_update($sets = array())
{
$return = false;
if($sets &&is_array($sets) &&count($sets))
{
$config_default = $config_new = $GLOBALS['sms_sys_config']['sms'];
foreach($sets as $k=>$v)
{
if($v != $config_default[$k])
{
$config_new[$k] = $v;
}
}
if($config_default != $config_new)
{
$file = SMS_S_ROOT.'setting/sms.php';
$data = '<?php $config["sms"] = '.var_export($config_new,true).'; ?>';
$return = file_put_contents($file,$data);
}
}
return $return;
}
function sms_define($var,$val)
{
if(defined($var))
{
if($val !== constant($var))
{
exit;
exit("$var $val defined is invalid");
}
}
else
{
define($var,$val);
}
}
function sms_errors($str='')
{
if($str)
{
$debug = array();
if (function_exists("debug_backtrace"))
{
$debug=debug_backtrace();
}
$GLOBALS['sms_errors'][] = "{$debug[0]['line']} {$debug[0]['file']} {$str}";
}
else
{
return $GLOBALS['sms_errors'];
}
}
function sms_errors_output($output=true)
{
$outputHTML = '';
if(is_array($GLOBALS['sms_errors']) &&count($GLOBALS['sms_errors']))
{
$errno = 1;
foreach($GLOBALS['sms_errors'] as $error)
{
$outputHTML .= "<br />\r\n/============================================================<br />\r\n{$errno}、{$error}<br />\r\n";
$errno += 1;
}
}
if($output)
{
echo $outputHTML;
}
else
{
return $outputHTML;
}
}
function sms_send_message($uid=0,$message_type='p',$other_vars=array())
{
if(!($GLOBALS['sms_sys_config']['sms_enable']) ||!($GLOBALS['sms_sys_config']['sms']['enable']))
{
sms_errors('sms_send_message sms disable');
return false;
}
if(is_array($uid))
{
$_tmps = (array) $uid;
$uid = $_tmps['uid'];
$username = $_tmps['username'];
$test = $_tmps['test'];
}
else
{
$username = $other_vars['username'];
$test = $other_vars['test'];
}
$uid = (is_numeric($uid) ?$uid : 0);
if($uid <1)
{
sms_errors('sms_send_message uid is empty');
return false;
}
$username = trim($username);
$to = 0;
$message = '';
$site_url = '';
$send_queue = false;
$filter_http_www = true;
if('to_admin_mobile'==$message_type &&$uid==$GLOBALS['sms_sys_config']['sms']['admin_mobile'])
{
$content = trim(strip_tags(($other_vars['content'] ?$other_vars['content'] : $_tmps['content'])));
if(!$content)
{
sms_errors('sms_send_message content is empty');
return false;
}
$test = ($test &&('test'==$username));
if($test)
{
$message = "{$username}：{$content}";
}
else
{
$message = "{$username}发了新微博：{$content}";
$topic_id = max(0,(int) ($other_vars['topic_id'] ?$other_vars['topic_id'] : $_tmps['topic_id']));
if($topic_id >0)
{
$site_url = _sms_get_full_url("index.php?mod=topic&code={$topic_id}");
$send_queue = true;
}
}
$to = $uid;
$filter_http_www = false;
}
else
{
$_types = array(
't'=>array('msg'=>"%s，有用户@提到您，回复@TOFF关闭@我的提醒",'url'=>'index.php?mod=topic&code=myat','queue'=>1,),
'p'=>array('msg'=>"%s，有用户回复了您的微博，回复@POFF关闭新评论提醒",'url'=>'index.php?mod=topic&code=mycomment','queue'=>1,),
'm'=>array('msg'=>"%s，您有新的站内短信，回复@MOFF关闭新私信提醒",'url'=>'index.php?mod=pm&code=list','queue'=>1,),
'f'=>array('msg'=>"%s，有人新关注了您，回复@FOFF关闭新粉丝提醒",'url'=>'index.php?mod=topic&code=fans','queue'=>1,),
);
if($message_type &&isset($_types[$message_type]) &&($message = $_types[$message_type]['msg']) &&($GLOBALS['sms_sys_config']['sms'][$message_type .'_enable']))
{
$user_info = sms_client_user($uid);
if(!$user_info)
{
sms_errors('sms_send_message user_info is empty');
return false;
}
if(!sms_has_bind($user_info))
{
sms_errors('sms_send_message sms_has_bind is invalid');
return false;
}
if(!($user_info[$message_type ."_enable"]))
{
sms_errors('sms_send_message user_info is disable');
return false;
}
$to = $user_info['user_im'];
if(!$username)
{
$username = $user_info['username'];
}
$message = sprintf($message,$username);
$site_url = _sms_get_full_url($_types[$message_type]['url']);
$send_queue = $_types[$message_type]['queue'];
$filter_http_www = true;
}
else
{
sms_errors('sms_send_message message_type is invalid');
return false;
}
}
if(!$message)
{
sms_errors('sms_send_message message is empty');
return false;
}
if(!is_numeric($to) ||!(_sms_client_user($to)))
{
sms_errors('sms_send_message to is empty');
return false;
}
if(!$site_url)
{
$site_url = $GLOBALS['sms_sys_config']['site_url'];
}
if($filter_http_www)
{
$site_url = substr($site_url,strpos($site_url,':/'.'/') +3);
if('www.'==strtolower(substr($site_url,0,4)))
{
$site_url = substr($site_url,4);
}
}
if($GLOBALS['sms_sys_config']['sms']['__send_message_count__'] <1)
{
if(!sms_enable())
{
sms_errors('sms_send_message sms_enable is invalid');
return false;
}
}
else
{
usleep(rand(10000,1000000));
}
if( TRUE===IN_JISHIGOU_INDEX ||TRUE===IN_JISHIGOU_AJAX ||TRUE===IN_JISHIGOU_ADMIN )
{
$result = jsg_schedule(array('to'=>$to,'message'=>$message),'sms_send');
}
else
{
$result = sms_send($to,$message);
}
if($result)
{
$GLOBALS['sms_sys_config']['sms']['__send_message_count__'] = (max(0,(int) $GLOBALS['sms_sys_config']['sms']['__send_message_count__']) +1);
}
return $result;
}
function sms_send($to,$message,$uid=0)
{
$_timestamp = time();
$to = (is_numeric($to) ?$to : 0);
if($to <1)
{
sms_errors('sms_send to is invalid');
return false;
}
$message = trim(strip_tags($message));
if(!$message)
{
sms_errors('sms_send message is empty');
return false;
}
$user_info = _sms_client_user($to);
if(!$user_info)
{
sms_errors('sms_send user_info is empty');
return false;
}
$message = "{$GLOBALS['sms_sys_config']['prefix']}{$message}{$GLOBALS['sms_sys_config']['postfix']}";
if(false===strpos($message,"{$GLOBALS['sms_sys_config']['site_name']}"))
{
$message .= "【{$GLOBALS['sms_sys_config']['site_name']} ".my_date_format(time(),'m-d H:i')."】";
}
$message_id = abs(crc32(md5($message)));
$UserInfoSets = array();
$UserInfoSets['send_times'] = '+1';
$UserInfoSets['last_send_time'] = $_timestamp;
$UserInfoSets['last_send_message_id'] = $message_id;
if($message_id == $user_info['last_send_message_id'])
{
if($user_info['last_send_time'] +20 >$_timestamp)
{
sms_errors('sms_send is busy');
}
}
else
{
if($GLOBALS['_cache_sms_send_to'][$to] +4 >$_timestamp)
{
usleep(rand(10000,1000000));
}
if($user_info['last_send_time'] +4 >time())
{
sms_errors('sms_send too many connections');
}
}
sms_client_user_update($UserInfoSets,$user_info);
$args = array(
'op'=>'server',
'co'=>'app',
'step'=>'send',
'mobile'=>$to,
'content'=>$message,
);
if($uid >0 &&$uid==$user_info['uid'])
{
$args['uid'] = $uid;
$args['username'] = $user_info['username'];
}
if($GLOBALS['sms_sys_config']['sms_extra_enable'])
{
if(!function_exists('sms_extra_post'))
{
Load::functions('sms_extra');
}
$result = sms_extra_post($args);
}
else
{
$result = sms_client_post($args);
}
$GLOBALS['_cache_sms_send_to'][$to] = $_timestamp;
DB::query("insert into ".TABLE_PREFIX."sms_send_log (`uid`,`username`,`dateline`,`mobile`,`message`,`msg_id`,`status`) values ('{$user_info['uid']}','{$user_info['username']}','{$_timestamp}','{$to}','".addslashes($message)."','{$result['msg_id']}','{$result['status']}')");
return $result;
}
function sms_has_bind($uid)
{
$return = false;
if(is_array($uid))
{
$user = $uid;
}
else
{
$user = sms_client_user($uid);
}
if($user &&$user['uid'] &&$user['user_im'] &&$user['last_try_bind_time'] &&!$user['bind_key'] &&!$user['bind_key_time'])
{
$return = true;
}
return $return;
}
function _sms_client_user_table()
{
DB::query("CREATE TABLE ".sms_table('sms_client_user')." (
        `id` int(10) unsigned NOT NULL auto_increment,
        `uid` int(10) unsigned NOT NULL,
        `username` char(30) NOT NULL,
        `user_im` char(20) NOT NULL,
        `bind_key` char(10) NOT NULL,
        `bind_key_time` int(10) unsigned NOT NULL, 
        `try_bind_times` int(10) unsigned NOT NULL,
        `last_try_bind_time` int(10) unsigned NOT NULL,
        `send_times` int(10) unsigned NOT NULL,
        `last_send_time` int(10) unsigned NOT NULL,
        `last_send_message_id` int(10) unsigned NOT NULL,
        `stop_receive` tinyint(1) unsigned NOT NULL,
        `receive_times` int(10) unsigned NOT NULL,
        `last_receive_time` int(10) unsigned NOT NULL,
        `last_receive_message_id` int(10) unsigned NOT NULL,
        `reset_password_times` int(10) unsigned NOT NULL,
        `last_reset_password_time` int(10) unsigned NOT NULL,
        `dateline` int(10) unsigned NOT NULL,
        `enable` tinyint(1) unsigned NOT NULL default '1',
        `t_enable` tinyint(1) unsigned NOT NULL default '0',
        `p_enable` tinyint(1) unsigned NOT NULL default '0',
        `m_enable` tinyint(1) unsigned NOT NULL default '0',
        `f_enable` tinyint(1) unsigned NOT NULL default '0',
        `share_time` int(10) unsigned NOT NULL,
        PRIMARY KEY  (`id`),
        KEY `uid` (`uid`),
        KEY `user_im` (`user_im`)
    ) ".(mysql_get_server_info() >'4.1'?" ENGINE=MyISAM DEFAULT CHARSET=".$GLOBALS['sms_sys_config']['db_char'] : " TYPE=MyISAM"));
}
function _sms_client_user($uid)
{
$uid = (is_numeric($uid) ?$uid : 0);
if($uid <1)
{
return false;
}
$user_info = $GLOBALS['_sms_client_user'][$uid];
if(is_null($user_info))
{
$sql = "select * from ".sms_table('sms_client_user')." where `user_im`='{$uid}'";
$query = DB::query($sql,'SILENT');
if (!$query &&(1146==DB::errno()))
{
_sms_client_user_table();
$query = DB::query($sql);
}
$user_info = DB::fetch($query);
if($user_info &&$user_info['uid'])
{
$GLOBALS['sms_client_user'][$user_info['uid']] = $user_info;
}
$GLOBALS['_sms_client_user'][$uid] = $user_info;
}
return $user_info;
}
function sms_client_user($uid)
{
$uid = (is_numeric($uid) ?$uid : 0);
if($uid <1)
{
return false;
}
if (!isset($GLOBALS['sms_client_user'][$uid]))
{
$sql = "select * from ".sms_table('sms_client_user')." where `uid`='{$uid}'";
$query = DB::query($sql,'SILENT');
if (!$query &&(1146==DB::errno()))
{
_sms_client_user_table();
$query = DB::query($sql);
}
$user_info = DB::fetch($query);
if(!$user_info)
{
$sets = array();
$sets['uid'] = $uid;
$sets['dateline'] = time();
if (sms_client_user_update($sets))
{
$user_info = DB::fetch_first($sql);
}
}
if($user_info &&$user_info['user_im'])
{
$GLOBALS['_sms_client_user'][$user_info['user_im']] = $user_info;
}
$GLOBALS['sms_client_user'][$uid] = $user_info;
}
return $GLOBALS['sms_client_user'][$uid];
}
function sms_client_user_update($sets=array(),$user_info='')
{
if (!$sets)
{
sms_errors('sms_client_user_update sets is empty');
return false;
}
if ($user_info)
{
if (is_numeric($user_info))
{
$user_info = sms_client_user($user_info);
}
$_sets = array();
foreach ($sets as $k=>$v)
{
if (isset($user_info[$k]))
{
if(is_numeric($user_info[$k]) &&is_numeric($v) &&((int) $v) &&($v=(string) $v) &&($a=$v[0]) &&('+'==$a ||'-'==$a))
{
$_sets[$k] = " `{$k}`=`{$k}`+'{$v}' ";
$user_info[$k] += $v;
}
elseif($user_info[$k]!=$v)
{
$_sets[$k] = " `{$k}`='{$v}' ";
$user_info[$k] = $v;
}
}
}
unset($_sets['id']);
if ($_sets)
{
unset($GLOBALS['_sms_client_user'][$user_info['user_im']],$GLOBALS['sms_client_user'][$user_info['uid']]);
$sql = "update ".sms_table('sms_client_user')." set ".implode($_sets," , ") ." where `id`='{$user_info['id']}'";
return DB::query($sql);
}
}
else
{
unset($GLOBALS['_sms_client_user'][$sets['user_im']],$GLOBALS['sms_client_user'][$sets['uid']]);
$sql = "insert into ".sms_table('sms_client_user')." (`".implode("`,`",array_keys($sets))."`) values ('".implode("','",$sets)."')";
return DB::query($sql);
}
}
function sms_table($table_name)
{
return '`'.$GLOBALS['sms_sys_config']['db_name'].'`.`'.$GLOBALS['sms_sys_config']['db_table_prefix'].$table_name.'`';
}
function sms_client_post($posts=array(),$test=false)
{
settype($posts,'array');
$posts['op'] = ($posts['op'] ?$posts['op'] : 'server');
$posts['co'] = ($posts['co'] ?$posts['co'] : 'app');
$posts['step'] = ($posts['step'] ?$posts['step'] : 'test');
$posts['input_charset'] = SMS_INPUT_CHARSET;
$posts['app_id'] = SMS_APP_ID;
$posts['app_key'] = SMS_APP_KEY;
$posts['post_time'] = time();
$posts['sys_env'] = sms_client_sys_env();
if (function_exists('mb_convert_encoding') ||function_exists('iconv'))
{
$posts['input_charset'] = 'GBK';
$posts = array_iconv(SMS_INPUT_CHARSET,$posts['input_charset'],$posts);
}
$post_data = http_build_query($posts);
$response = sms_client_fopen2(SMS_SERVER_URL,50000,$post_data,'',3,true);
$result = '';
if (!$response)
{
sms_errors('sms_client_post response is empty');
if($test)
{
return("无法连接到服务器");
}
return false;
}
else
{
if(false!==strpos($response,"\n"))
{
$response = preg_replace('~\s+[\w\d]{1,10}\s+~','',$response);
}
if (false!==strpos($response,'</DATA>'))
{
$int = preg_match('~<DATA>(.*?)<\/DATA>~s',$response,$m);
$response = $m[1];
}
if(!$response)
{
sms_errors('1.sms_client_post response is invalid');
return false;
}
$response = unserialize(base64_decode($response));
if(!$response)
{
sms_errors('2.sms_client_post response is invalid');
return false;
}
if (function_exists('mb_convert_encoding') ||function_exists('iconv'))
{
$response = array_iconv(($response['output_charset'] ?$response['output_charset'] : $posts['input_charset']),SMS_INPUT_CHARSET,$response);
}
if(!is_array($response))
{
sms_errors('3.sms_client_post response is invalid');
return false;
}
$result = $response['result'];
if ($response['error'])
{
sms_errors('sms_client_post response is error'."[{$result}]");
if($test)
{
return($result);
}
return false;
}
}
return $result;
}
function sms_client_sys_env()
{
$e = array(
'name'=>$GLOBALS['sms_sys_config']['site_name'],
'url'=>$GLOBALS['sms_sys_config']['site_url'],
'path'=>SMS_S_ROOT,
);
return $e;
}
function sms_client_fopen2($url,$limit = 0,$post = '',$cookie = '',$timeout = 3,$test = false)
{
$return = '';
$matches = parse_url($url);
$host = $matches['host'];
$path = ($matches['path'] ?($matches['path'].($matches['query'] ?'?'.$matches['query'] : '')) : '/');
$port = (!empty($matches['port']) ?$matches['port'] : 80);
$_host = ($host .(80!=$port ?':'.$port : ''));
if($post) {
$out = "POST $path HTTP/1.0\r\n";
$out .= "Accept: *"."/"."*\r\n";
$out .= "Accept-Language: zh-cn\r\n";
$out .= "Content-Type: application/x-www-form-urlencoded\r\n";
$out .= "User-Agent: $_SERVER[HTTP_USER_AGENT]\r\n";
$out .= "Host: $_host\r\n";
$out .= 'Content-Length: '.strlen($post)."\r\n";
$out .= "Connection: Close\r\n";
$out .= "Cache-Control: no-cache\r\n";
$out .= "Cookie: $cookie\r\n\r\n";
$out .= $post;
}else {
$out = "GET $path HTTP/1.0\r\n";
$out .= "Accept: *"."/"."*\r\n";
$out .= "Accept-Language: zh-cn\r\n";
$out .= "User-Agent: $_SERVER[HTTP_USER_AGENT]\r\n";
$out .= "Host: $_host\r\n";
$out .= "Connection: Close\r\n";
$out .= "Cookie: $cookie\r\n\r\n";
}
$fp = jfsockopen($host,$port,$errno,$errstr,$timeout);
if(!$fp) {
sms_errors("sms_client_fopen2 fsockopen is invalid"."[{$errno}:{$errstr}]");
return '';
}else {
if(!$test)
{
fwrite($fp,$out);
fclose($fp);
return true;
}
else
{
stream_set_blocking($fp,true);
stream_set_timeout($fp,$timeout);
fwrite($fp,$out);
$status = stream_get_meta_data($fp);
if(!$status['timed_out']) {
$_limit = 20;
while (!feof($fp) &&$_limit>0) {
$_limit = $_limit -1;
if(($header = @fgets($fp)) &&($header == "\r\n"||$header == "\n")) {
break;
}
}
$stop = false;
$_limit = 20;
while(!feof($fp) &&!$stop &&$_limit>0) {
$_limit = $_limit -1;
$data = @fread($fp,(($limit == 0 ||$limit >8192) ?8192 : $limit));
$return .= $data;
if($limit) {
$limit -= strlen($data);
$stop = ($limit <= 0);
}
}
}
fclose($fp);
return $return;
}
}
}
function _sms_get_full_url($url='',$site_url='')
{
if(!$site_url)
{
$site_url = $GLOBALS['sms_sys_config']['site_url'];
}
if(function_exists('get_full_url'))
{
return get_full_url($site_url,$url);
}
global $rewriteHandler;
$full_url = "{$site_url}/{$url}";
if($rewriteHandler &&$url)
{
$url = ltrim($rewriteHandler->formatURL($url),'/');
$full_url = (((false!==($_tmp_pos = strpos($site_url,'/',10))) ?substr($site_url,0,$_tmp_pos) : $site_url) .'/'.$url);
}
return $full_url;
}
function sms_check_bind_key($sms_num,$bind_key)
{
if(!sms_is_phone($sms_num))
{
js_alert_output('请输入正确的手机号码');
}
$bind_key = is_numeric($bind_key) ?$bind_key : 0;
if($bind_key <100000 ||$bind_key >999999)
{
js_alert_output('请输入正确的验证码');
}
$_user_info = _sms_client_user($sms_num);
$sms_has_bind = sms_has_bind($_user_info);
if($sms_has_bind)
{
js_alert_output('此手机号已经绑定了其他的帐号');
}
if($bind_key!=$_user_info['bind_key'])
{
js_alert_output('验证码输入错误');
}
if($_user_info['bind_key_time'] +7200 <time())
{
js_alert_output('验证码已经过期了，请重新发起验证');
}
}
@ignore_user_abort(true);
sms_define('SMS_S_ROOT',(substr(dirname(__FILE__),0,-17) .'/'));
sms_sys_config();

?>
