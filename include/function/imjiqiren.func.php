<?php

if(!defined('IN_DATACORE'))
{
exit('invalid request');
}
function imjiqiren_enable($sys_config=array())
{
if(!$sys_config)
{
$sys_config = ConfigHandler::get();
}
if(!$sys_config['imjiqiren_enable'])
{
imjiqiren_errors('imjiqiren_enable imjiqiren is disable');
return false;
}
if((!is_numeric(constant('IMJIQIREN_APP_ID'))) ||(1>constant('IMJIQIREN_APP_ID')) ||(32!=strlen(constant('IMJIQIREN_APP_KEY'))) ||(!jsg_is_qq(constant('IMJIQIREN_QQ_ROBOTS'))))
{
imjiqiren_errors('imjiqiren_enable imjiqiren is invalid');
return false;
}
return $sys_config;
}
function imjiqiren_bind_icon($uid=0)
{
$return = '';
$uid = max(0,(int) ($uid ?$uid : MEMBER_ID));
if ($uid >0 &&($sys_config = imjiqiren_enable()))
{
$return = "<img src='{$sys_config['site_url']}/images/qq_off.gif' alt='未绑定QQ机器人' />";
if (!imjiqiren_user_bind_qq($uid))
{
$return = "<img src='{$sys_config['site_url']}/images/qq_on.gif' alt='已经绑定QQ机器人' />";
}
if (MEMBER_ID>0)
{
$return = "<a href='#' title='QQ机器人绑定设置' onclick=\"window.location.href='{$sys_config['site_url']}/index.php?mod=tools&code=imjiqiren';return false;\">{$return}</a>";
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
function imjiqiren_sys_config()
{
if(!isset($GLOBALS['imjiqiren_sys_config']))
{
$config = ConfigHandler::get();
$GLOBALS['imjiqiren_sys_config'] = array(
'charset'=>$config['charset'],
'db_host'=>($config['db_host'].(($config['db_port'] &&3306!=$config['db_port'])?":{$config['db_port']}":"")),
'db_user'=>$config['db_user'],
'db_pass'=>$config['db_pass'],
'db_name'=>$config['db_name'],
'db_char'=>str_replace('utf-8','utf8',strtolower($config['charset'])),
'db_connect'=>$config['db_persist'],
'db_table_prefix'=>$config['db_table_prefix'],
'site_url'=>$config['site_url'],
'imjiqiren_enable'=>$config['imjiqiren_enable'],
);
imjiqiren_define('IMJIQIREN_INPUT_CHARSET',$GLOBALS['imjiqiren_sys_config']['charset']);
include(IMJIQIREN_S_ROOT.'setting/imjiqiren.php');
imjiqiren_define('IMJIQIREN_APP_ID',$config['imjiqiren']['app_id']);
imjiqiren_define('IMJIQIREN_APP_KEY',$config['imjiqiren']['app_key']);
imjiqiren_define('IMJIQIREN_SERVER_URL',$config['imjiqiren']['server_url']);
imjiqiren_define('IMJIQIREN_QQ_ROBOTS',$config['imjiqiren']['qq_robots']);
$config['imjiqiren']['__send_message_count__'] = 0;
$GLOBALS['imjiqiren_sys_config']['imjiqiren'] = $config['imjiqiren'];
}
}
function imjiqiren_config_update($sets = array())
{
$return = false;
if($sets &&is_array($sets) &&count($sets))
{
$config_default = $config_new = $GLOBALS['imjiqiren_sys_config']['imjiqiren'];
foreach($sets as $k=>$v)
{
if($v != $config_default[$k])
{
$config_new[$k] = $v;
}
}
if($config_default != $config_new)
{
$file = IMJIQIREN_S_ROOT.'setting/imjiqiren.php';
$data = '<?php $config["imjiqiren"] = '.var_export($config_new,true).'; ?>';
$return = file_put_contents($file,$data);
}
}
return $return;
}
function imjiqiren_define($var,$val)
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
function imjiqiren_errors($str='')
{
if($str)
{
$debug = array();
if (function_exists("debug_backtrace"))
{
$debug=debug_backtrace();
}
$GLOBALS['imjiqiren_errors'][] = "{$debug[0]['line']} {$debug[0]['file']} {$str}";
}
else
{
return $GLOBALS['imjiqiren_errors'];
}
}
function imjiqiren_errors_output($output=true)
{
$outputHTML = '';
if(is_array($GLOBALS['imjiqiren_errors']) &&count($GLOBALS['imjiqiren_errors']))
{
$errno = 1;
foreach($GLOBALS['imjiqiren_errors'] as $error)
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
function imjiqiren_send_message($uid=0,$message_type='p',$other_vars=array())
{
if(!($GLOBALS['imjiqiren_sys_config']['imjiqiren_enable']) ||!($GLOBALS['imjiqiren_sys_config']['imjiqiren']['enable']))
{
imjiqiren_errors('imjiqiren_send_message imjiqiren disable');
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
$uid = is_numeric($uid) ?$uid : 0;
if($uid <1)
{
imjiqiren_errors('imjiqiren_send_message uid is empty');
return false;
}
$username = trim($username);
$to = 0;
$message = '';
$site_url = '';
$send_queue = false;
$filter_http_www = true;
if('to_admin_robot'==$message_type &&$uid==$GLOBALS['imjiqiren_sys_config']['imjiqiren']['admin_qq_robots'])
{
$content = trim(strip_tags(($other_vars['content'] ?$other_vars['content'] : $_tmps['content'])));
if(!$content)
{
imjiqiren_errors('imjiqiren_send_message content is empty');
return false;
}
$test = ($test &&('test'==$username));
if($test)
{
$message = "【测试一下】{$username}：{$content}";
}
else
{
$message = "{$username}发了新微博：{$content}";
$topic_id = max(0,(int) ($other_vars['topic_id'] ?$other_vars['topic_id'] : $_tmps['topic_id']));
if($topic_id >0)
{
$site_url = _imjiqiren_get_full_url("index.php?mod=topic&code={$topic_id}");
$send_queue = true;
}
}
$to = $uid;
$filter_http_www = false;
}
else
{
$_types = array(
't'=>array('msg'=>"%s，有用户@提到您",'url'=>'index.php?mod=topic&code=myat','queue'=>1,),
'p'=>array('msg'=>"%s，有用户回复了您的微博",'url'=>'index.php?mod=topic&code=mycomment','queue'=>1,),
'm'=>array('msg'=>"%s，您有新的站内短信",'url'=>'index.php?mod=pm&code=list','queue'=>1,),
'f'=>array('msg'=>"%s，有人新关注了您",'url'=>'index.php?mod=topic&code=fans','queue'=>1,),
);
if($message_type &&isset($_types[$message_type]) &&($message = $_types[$message_type]['msg']) &&($GLOBALS['imjiqiren_sys_config']['imjiqiren'][$message_type .'_enable']))
{
$user_info = imjiqiren_client_user($uid);
if(!$user_info)
{
imjiqiren_errors('imjiqiren_send_message user_info is empty');
return false;
}
if(!($user_info[$message_type ."_enable"]))
{
imjiqiren_errors('imjiqiren_send_message user_info is disable');
return false;
}
$to = $user_info['user_im'];
if(!$username)
{
$username = $user_info['username'];
}
$message = sprintf($message,$username);
$site_url = _imjiqiren_get_full_url($_types[$message_type]['url']);
$send_queue = $_types[$message_type]['queue'];
$filter_http_www = true;
}
else
{
imjiqiren_errors('imjiqiren_send_message message_type is invalid');
}
}
if(!$message)
{
imjiqiren_errors('imjiqiren_send_message message is empty');
return false;
}
if(!jsg_is_qq($to) ||!(_imjiqiren_client_user($to)))
{
imjiqiren_errors('imjiqiren_send_message to is empty');
return false;
}
if(!$site_url)
{
$site_url = $GLOBALS['imjiqiren_sys_config']['site_url'];
}
if($filter_http_www)
{
$site_url = substr($site_url,strpos($site_url,':/'.'/') +3);
if('www.'==strtolower(substr($site_url,0,4)))
{
$site_url = substr($site_url,4);
}
}
$message .= " $site_url";
if($GLOBALS['imjiqiren_sys_config']['imjiqiren']['__send_message_count__'] <1)
{
if(!imjiqiren_enable())
{
imjiqiren_errors('imjiqiren_send_message imjiqiren_enable is invalid');
return false;
}
}
else
{
if($GLOBALS['imjiqiren_sys_config']['imjiqiren']['__send_message_count__'] >3)
{
if($send_queue &&$GLOBALS['imjiqiren_sys_config']['imjiqiren']['__send_message_count__'] <30)
{
$salt = substr(md5(time() .mt_rand()),-10);
$_message = authcode($message,'ENCODE',md5($salt ."E08FA83450B75D962FCBB5E0448D90429B9EC2EB"),100000);
DB::query("replace into ".imjiqiren_table('imjiqiren_send_queue')." set `to`='$to', `message`='$_message', `salt`='$salt', `dateline`='".time()."'");
}
imjiqiren_errors('imjiqiren_send_message __send_message_count__ is invalid');
return false;
}
usleep(rand(10000,1000000));
}
if( TRUE===IN_DATACORE_INDEX ||TRUE===IN_DATACORE_AJAX ||TRUE===IN_DATACORE_ADMIN )
{
$result = jsg_schedule(array('to'=>$to,'message'=>$message),'imjiqiren_send');
}
else
{
$result = imjiqiren_send($to,$message);
}
if($result)
{
$GLOBALS['imjiqiren_sys_config']['imjiqiren']['__send_message_count__'] = (max(0,(int) $GLOBALS['imjiqiren_sys_config']['imjiqiren']['__send_message_count__']) +1);
}
else
{
if($send_queue)
{
$salt = substr(md5(time() .mt_rand()),-10);
$_message = authcode($message,'ENCODE',md5($salt ."E08FA83450B75D962FCBB5E0448D90429B9EC2EB"),100000);
DB::query("replace into ".imjiqiren_table('imjiqiren_send_queue')." set `to`='$to', `message`='$_message', `salt`='$salt', `dateline`='".time()."'");
}
}
return $result;
}
function imjiqiren_send($to,$message)
{
$_timestamp = time();
if(!jsg_is_qq($to))
{
imjiqiren_errors('imjiqiren_send to is invalid');
return false;
}
$message = trim(strip_tags($message));
if(!$message)
{
imjiqiren_errors('imjiqiren_send message is empty');
return false;
}
$user_info = _imjiqiren_client_user($to);
if(!$user_info)
{
imjiqiren_errors('imjiqiren_send user_info is empty');
return false;
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
imjiqiren_errors('imjiqiren_send is busy');
return false;
}
}
else
{
if($GLOBALS['_cache_imjiqiren_send_to'][$to] +4 >$_timestamp)
{
usleep(rand(10000,1000000));
}
if($user_info['last_send_time'] +4 >time())
{
imjiqiren_errors('imjiqiren_send too many connections');
return false;
}
}
imjiqiren_client_user_update($UserInfoSets,$user_info);
if($GLOBALS['imjiqiren_sys_config']['imjiqiren']['last_check_time'] +300 <$_timestamp)
{
$_check_status = _imjiqiren_client_command('login.check');
if ($_check_status == 'NOT LOGIN')
{
$_account = array
(
'uid'=>$GLOBALS['imjiqiren_sys_config']['imjiqiren']['robot_username'],
'password'=>$GLOBALS['imjiqiren_sys_config']['imjiqiren']['robot_password'],
);
if($_account['uid'] &&$_account['password'])
{
sleep(rand(1,3));
$_result = imjiqiren_client_post(array('action'=>'robot.login',),true);
sleep(rand(1,3));
$_check_status = _imjiqiren_client_command('login.check');
sleep(rand(1,3));
}
}
$ImJiqiRenSets = array();
$ImJiqiRenSets['last_check_time'] = $_timestamp;
imjiqiren_config_update($ImJiqiRenSets);
if ($_check_status != 'ALREADY LOGIN')
{
imjiqiren_errors('imjiqiren_send login.check is not login');
return false;
}
}
$api = 'buddy.send';
$args = array(
'uid'=>$to,
'message'=>$message,
);
$result = _imjiqiren_client_command($api,$args);
$GLOBALS['_cache_imjiqiren_send_to'][$to] = $_timestamp;
if($result)
{
if($GLOBALS['imjiqiren_sys_config']['imjiqiren']['last_check_time'] +180 <$_timestamp)
{
$ImJiqiRenSets = array();
$ImJiqiRenSets['last_check_time'] = $_timestamp;
imjiqiren_config_update($ImJiqiRenSets);
}
}
return $result;
}
function _imjiqiren_client_command($api,$args=array())
{
$result = false;
$robot_conf = array();
$robot_conf['server'] = $GLOBALS['imjiqiren_sys_config']['imjiqiren']['robot_server_ip'];
$robot_conf['port'] = $GLOBALS['imjiqiren_sys_config']['imjiqiren']['robot_server_port'];
$robot_conf['seckey'] = $GLOBALS['imjiqiren_sys_config']['imjiqiren']['robot_server_key'];
if ($robot_conf['server'] &&$robot_conf['port'] &&$robot_conf['seckey'])
{
$_apis = array('buddy.send'=>1,'login.check'=>1,);
if($api &&isset($_apis[$api]))
{
if($args)
{
$args = array_iconv($GLOBALS['imjiqiren_sys_config']['charset'],'utf-8',$args);
}
$QQAPIS = new imjiqiren_client_command();
$QQAPIS->config($robot_conf);
$result = $QQAPIS->command($api,$args);
}
else
{
imjiqiren_errors('_imjiqiren_client_command api is invalid');
}
}
else
{
imjiqiren_errors('_imjiqiren_client_command robot_conf is empty');
}
return $result;
}
function imjiqiren_user_bind_qq($uid)
{
$return = '';
$user = imjiqiren_client_user($uid);
if (!jsg_is_qq($user['user_im']))
{
$return = '@BIND '.IMJIQIREN_APP_ID .' '.$uid .' '.md5(IMJIQIREN_APP_ID.$uid.IMJIQIREN_APP_KEY);
}
return $return;
}
function imjiqiren_has_bind($uid)
{
return (imjiqiren_user_bind_qq($uid) ?false : true);
}
function imjiqiren_user_qq_robot($uid=0)
{
if (false===strpos(IMJIQIREN_QQ_ROBOTS,','))
{
return IMJIQIREN_QQ_ROBOTS;
}
else
{
$qq_robots = explode(',',IMJIQIREN_QQ_ROBOTS);
return ($qq_robots[($uid %(count($qq_robots)))]);
}
}
function _imjiqiren_client_user_table()
{
DB::query("CREATE TABLE ".imjiqiren_table('imjiqiren_client_user')." (
        `id` int(10) unsigned NOT NULL auto_increment,
        `uid` int(10) unsigned NOT NULL,
        `username` char(30) NOT NULL,
        `user_im` int(10) unsigned NOT NULL,
        `try_bind_times` int(10) unsigned NOT NULL,
        `last_try_bind_time` int(10) unsigned NOT NULL,
        `send_times` int(10) unsigned NOT NULL,
        `last_send_time` int(10) unsigned NOT NULL,
        `last_send_message_id` int(10) unsigned NOT NULL,
        `stop_receive` tinyint(1) unsigned NOT NULL,
        `receive_times` int(10) unsigned NOT NULL,
        `last_receive_time` int(10) unsigned NOT NULL,
        `last_receive_message_id` int(10) unsigned NOT NULL,
        `stop_sign_update` tinyint(1) unsigned NOT NULL,
        `sign_update_times` int(10) unsigned NOT NULL,
        `last_sign_update_time` int(10) unsigned NOT NULL,
        `last_sign_update_message_id` int(10) unsigned NOT NULL,
        `reset_password_times` int(10) unsigned NOT NULL,
        `last_reset_password_time` int(10) unsigned NOT NULL,
        `dateline` int(10) unsigned NOT NULL,
        `enable` tinyint(1) unsigned NOT NULL default '1',
        `t_enable` tinyint(1) unsigned NOT NULL default '1',
        `p_enable` tinyint(1) unsigned NOT NULL default '1',
        `m_enable` tinyint(1) unsigned NOT NULL default '1',
        `f_enable` tinyint(1) unsigned NOT NULL default '1',
        `share_time` int(10) unsigned NOT NULL,
        PRIMARY KEY  (`id`),
        KEY `uid` (`uid`),
        KEY `user_im` (`user_im`)
    ) ".(mysql_get_server_info() >'4.1'?" ENGINE=MyISAM DEFAULT CHARSET=".$GLOBALS['imjiqiren_sys_config']['db_char'] : " TYPE=MyISAM"));
}
function _imjiqiren_client_user($uid)
{
$uid = is_numeric($uid) ?$uid : 0;
if($uid <1)
{
return false;
}
$user_info = $GLOBALS['_imjiqiren_client_user'][$uid];
if(is_null($user_info))
{
$sql = "select * from ".imjiqiren_table('imjiqiren_client_user')." where `user_im`='{$uid}'";
$query = DB::query($sql,'SILENT');
if (!$query &&(1146==DB::errno()))
{
_imjiqiren_client_user_table();
$query = DB::query($sql);
}
$user_info = DB::fetch($query);
if(!$user_info)
{
$sets = array();
$sets['user_im'] = $uid;
$sets['dateline'] = time();
if (imjiqiren_client_user_update($sets))
{
$user_info = DB::fetch_first($sql);
}
}
if($user_info)
{
$GLOBALS['imjiqiren_client_user'][$user_info['id']] = $user_info;
}
$GLOBALS['_imjiqiren_client_user'][$uid] = $user_info;
}
return $user_info;
}
function imjiqiren_client_user($uid)
{
$uid = is_numeric($uid) ?$uid : 0;
if($uid <1)
{
return false;
}
if (!isset($GLOBALS['imjiqiren_client_user'][$uid]))
{
$sql = "select * from ".imjiqiren_table('imjiqiren_client_user')." where `uid`='{$uid}'";
$query = DB::query($sql,'SILENT');
if (!$query &&(1146==DB::errno()))
{
_imjiqiren_client_user_table();
$query = DB::query($sql);
}
$arr = DB::fetch($query);
if($arr['user_im'])
{
$GLOBALS['_imjiqiren_client_user'][$arr['user_im']] = $arr;
}
$GLOBALS['imjiqiren_client_user'][$uid] = $arr;
}
return $GLOBALS['imjiqiren_client_user'][$uid];
}
function imjiqiren_client_user_update($sets=array(),$user_info='')
{
if (!$sets)
{
imjiqiren_errors('imjiqiren_client_user_update sets is empty');
return false;
}
if ($user_info)
{
if (is_numeric($user_info))
{
$user_info = imjiqiren_client_user($user_info);
}
$_sets = array();
foreach ($sets as $k=>$v)
{
if (isset($user_info[$k]))
{
if(is_numeric($user_info[$k]) &&is_numeric($v) &&($v=(string) $v) &&($a=$v[0]) &&('+'==$a ||'-'==$a))
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
$sql = "update ".imjiqiren_table('imjiqiren_client_user')." set ".implode($_sets," , ") ." where `id`='{$user_info['id']}'";
return DB::query($sql);
}
}
else
{
$sql = "insert into ".imjiqiren_table('imjiqiren_client_user')." (`".implode("`,`",array_keys($sets))."`) values ('".implode("','",$sets)."')";
return DB::query($sql);
}
}
function imjiqiren_table($table_name)
{
return '`'.$GLOBALS['imjiqiren_sys_config']['db_name'].'`.`'.$GLOBALS['imjiqiren_sys_config']['db_table_prefix'].$table_name.'`';
}
function imjiqiren_client_post($posts=array(),$test=false)
{
settype($posts,'array');
$posts['input_charset'] = IMJIQIREN_INPUT_CHARSET;
$posts['app_id'] = IMJIQIREN_APP_ID;
$posts['app_key'] = IMJIQIREN_APP_KEY;
$posts['post_time'] = time();
$posts['sys_env'] = imjiqiren_client_sys_env();
if (function_exists('mb_convert_encoding') ||function_exists('iconv'))
{
$posts['input_charset'] = 'GBK';
$posts = array_iconv(IMJIQIREN_INPUT_CHARSET,$posts['input_charset'],$posts);
}
$post_data = http_build_query($posts);
$response = imjiqiren_client_fopen2(IMJIQIREN_SERVER_URL,50000,$post_data,'',3,$test);
$result = '';
if (!$response)
{
imjiqiren_errors('imjiqiren_client_post response is empty');
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
$int = 0;
if (false!==strpos($response,'</DATA>'))
{
$int = preg_match('~<DATA>(.*?)<\/DATA>~s',$response,$m);
}
if ($int <1)
{
imjiqiren_errors('imjiqiren_client_post response is invalid'."[{$response}]");
if($test)
{
return("服务器端返回的数据格式不正确");
}
return false;
}
$response = unserialize(base64_decode($m[1]));
$response = array_iconv($posts['input_charset'],IMJIQIREN_INPUT_CHARSET,$response);
$result = $response['data'];
if ('error'==$response['type'])
{
imjiqiren_errors('imjiqiren_client_post response is error'."[{$result}]");
if($test)
{
return($result);
}
return false;
}
}
return $result;
}
function imjiqiren_client_sys_env()
{
$e = array(
'url'=>$GLOBALS['imjiqiren_sys_config']['site_url'],
'path'=>IMJIQIREN_S_ROOT,
);
return $e;
}
function imjiqiren_client_fopen2($url,$limit = 0,$post = '',$cookie = '',$timeout = 3,$test = false)
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
$errno = $errstr = null;
$fp = jfsockopen($host,$port,$errno,$errstr,$timeout);
if(!$fp) {
imjiqiren_errors("imjiqiren_client_fopen2 fsockopen is invalid"."[{$errno}:{$errstr}]");
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
function _imjiqiren_get_full_url($url='',$site_url='')
{
if(!$site_url)
{
$site_url = $GLOBALS['imjiqiren_sys_config']['site_url'];
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
class imjiqiren_client_command
{
var $server;
var $port;
var $seckey;
function config($config)
{
$this->server = $config['server'];
$this->port = $config['port'];
$this->seckey = $config['seckey'];
}
function command($api,$args=array())
{
$return = false;
$socket = false;
if($this->server)
{
$errno = $errstr = null;
$socket = jfsockopen($this->server,$this->port,$errno,$errstr,3);
if ($socket)
{
$api_name = "API $api MOYO/1.1\r\n";
$api_args = "<seckey>{$this->seckey}</seckey>\r\n";
if(is_array($args) &&count($args))
{
foreach ($args as $key =>$val)
{
$api_args .= "<$key>$val</$key>\r\n";
}
}
fputs($socket,$api_name.$api_args);
$_limit = 20;
$return = '';
while ($_limit>0 &&!feof($socket))
{
$_limit = $_limit -1;
$return .= fgets($socket,512);
}
fclose($socket);
unset($socket);
}
else
{
imjiqiren_errors('imjiqiren_client_command fsockopen is invalid'."[{$errno}:{$errstr} - {$this->server}:{$this->port}]");
}
}
else
{
imjiqiren_errors('imjiqiren_client_command server is empty');
}
return $return;
}
}
function jsg_is_qq($n)
{
$ret = 0;
if(is_numeric($n) &&$n >10000)
{
$nl = strlen((string) $n);
if($nl <12)
{
$ret = 1;
}
}
return $ret;
}
@ignore_user_abort(true);
imjiqiren_define('IMJIQIREN_S_ROOT',(substr(dirname(__FILE__),0,-17) .'/'));
imjiqiren_sys_config();

?>
