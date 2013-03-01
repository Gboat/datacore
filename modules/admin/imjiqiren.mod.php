<?php

if(!defined('IN_JISHIGOU'))
{
exit('invalid request');
}
class ModuleObject extends MasterObject
{
var $ModuleConfig = array();
function ModuleObject($config)
{
$this->MasterObject($config);
if($this->Config['imrobot'])
{
$this->Messager("您的网站已经整合了旧版QQ机器人，如需使用新版QQ机器人请联系官方客服",null);
}
$this->ModuleConfig = ConfigHandler::get('imjiqiren');
$this->Execute();
}
function Execute()
{
ob_start();
switch($this->Code)
{
case 'do_modify_setting':
$this->DoModifySetting();
break;
case 'list':
$this->DoList();
break;
case 'test':
$this->DoTest();
break;
default:
$this->Code = 'imjiqiren_setting';
$this->Main();
break;
}
$body = ob_get_clean();
$this->ShowBody($body);
}
function Main()
{
$imjiqiren_config = $this->ModuleConfig;
if(!$imjiqiren_config)
{
$imjiqiren_config = array
(
't_enable'=>1,
'p_enable'=>1,
'm_enable'=>1,
'f_enable'=>1,
);
ConfigHandler::set('imjiqiren',$imjiqiren_config);
}
$imjiqiren_config['imjiqiren_url'] = 'http:/'.'/cenwor.com/plugin.php?id=imjiqiren';
Load::lib('form');
$FormHandler = new FormHandler();
$enable_radio = $FormHandler->YesNoRadio('enable',(int) $imjiqiren_config['enable']);
$t_enable_radio = $FormHandler->YesNoRadio('t_enable',(int) $imjiqiren_config['t_enable']);
$p_enable_radio = $FormHandler->YesNoRadio('p_enable',(int) $imjiqiren_config['p_enable']);
$m_enable_radio = $FormHandler->YesNoRadio('m_enable',(int) $imjiqiren_config['m_enable']);
$f_enable_radio = $FormHandler->YesNoRadio('f_enable',(int) $imjiqiren_config['f_enable']);
$sign_update_disable_radio = $FormHandler->YesNoRadio('sign_update_disable',(int) $imjiqiren_config['sign_update_disable']);
$qqwb_update_disable_radio = $FormHandler->YesNoRadio('qqwb_update_disable',(int) $imjiqiren_config['qqwb_update_disable']);
$sina_update_disable_radio = $FormHandler->YesNoRadio('sina_update_disable',(int) $imjiqiren_config['sina_update_disable']);
$reset_password_disable_radio = $FormHandler->YesNoRadio('reset_password_disable',(int) $imjiqiren_config['reset_password_disable']);
$api_url_encode = base64_encode($this->Config['site_url'] ."/imjiqiren.php?mod=imjiqiren");
$api_url_from = 'jishigou';
$api_url_key = substr(md5("{$api_url_from}\t{$imjiqiren_config['imjiqiren_url']}\t{$api_url_encode}"),-12);
$api_url_encode = urlencode($api_url_encode);
$imjiqiren_url = "{$imjiqiren_config[imjiqiren_url]}&op=app&co=do_add&api_url_encode={$api_url_encode}&api_url_from={$api_url_from}&api_url_key={$api_url_key}";
;
$imjiqiren_var003 = ($imjiqiren_config[admin_qq_robots] ?'<a target="_blank" href="admin.php?mod=imjiqiren&code=test"><font color="red">您可以点此在新窗口中打开测试。</font></a>': '');
$imjiqiren_var001 = ($imjiqiren_config['app_id'] ?'如第一次启用机器人，请点下面地址获取QQ机器人核心配置信息，并填写在右侧；留空则不更新原先的配置<br />': '');
$imjiqiren_var002 = '';
if($imjiqiren_config['app_id'])
{
$imjiqiren_var002 = "
            <tr>
      <td class=\"altbg1\" width=\"40%\"> 2.1、APP ID </td>
      <td class=\"altbg2\">{$imjiqiren_config[app_id]}</td>
    </tr>
    <tr>
      <td class=\"altbg1\" width=\"40%\"> 2.2、APP KEY </td>
      <td class=\"altbg2\">{$imjiqiren_config[app_key]}</td>
    </tr>
    <tr>
      <td class=\"altbg1\" width=\"40%\"> 2.3、QQ机器人 </td>
      <td class=\"altbg2\">{$imjiqiren_config[qq_robots]}</td>
    </tr>
    <tr>
      <td class=\"altbg1\" width=\"40%\"> 2.4、QQ发微博格式前辍 </td>
      <td class=\"altbg2\">{$imjiqiren_config[send_update_cmd]}<br />
      </td>
    </tr>
    <tr>
      <td class=\"altbg1\" width=\"40%\"> 2.5、QQ签名发微博标志 </td>
      <td class=\"altbg2\">{$imjiqiren_config[sign_update_mark]}<br />
      </td>
    </tr>
    <tr>
      <td class=\"altbg1\" width=\"40%\"> <b>3、有新微博通知管理员？</b> <br />建议您启用本功能，便于及时监控微博内容。<br />请按右侧步骤开启此功能</td>
      <td class=\"altbg2\">
      1）绑定您的常用QQ号，<a target=\"_blank\" href=\"index.php?mod=tools&code=imjiqiren\"><font color=\"red\">点此在新窗口中打开绑定</font></a>；<br />
      2）在下面输入框中填入您绑定的QQ号码，并提交；<br />
		<input name=\"admin_qq_robots\" type=\"text\" id=\"admin_qq_robots\" value=\"{$imjiqiren_config[admin_qq_robots]}\" size=\"40\" /><br />
      3）管理员QQ设置完成，{$imjiqiren_var003}<br />
	  </td>
    </tr>
";
}
include($this->TemplateHandler->Template('admin/header'));
echo '<br />';
$FORMHASH = FORMHASH;
$ImJiqiRenHTML = "
<form action=\"admin.php?mod=imjiqiren&code=do_modify_setting\" method=\"POST\">
<input type=\"hidden\" name=\"FORMHASH\" value=\"{$FORMHASH}\"  />
  <table cellspacing=\"1\" cellpadding=\"4\" width=\"100%\" align=\"center\" class=\"tableborder\">
    <tr class=\"header\">
      <td colspan=\"2\">参数配置</td>
    </tr>
    <tr>
      <td class=\"altbg1\" width=\"40%\"> <b>1、开启QQ机器人功能？</b> <br />
		如第一次启用机器人，必须填写下面的核心配置
		</td>
      <td class=\"altbg2\">{$enable_radio}</td>
    </tr>
    <tr>
      <td class=\"altbg1\" width=\"40%\"> <b>2、QQ机器人核心配置</b> <br />
        {$imjiqiren_var001}
		<a href=\"{$imjiqiren_url}\" target=\"_blank\">【点此启用/获取机器人核心配置】</a>
	  </td>
      <td class=\"altbg2\"><textarea name=\"imjiqiren_config_string\" style=\"width:400px;height:60px;\"></textarea></td>
    </tr>
	{$imjiqiren_var002}
    <tr>
      <td class=\"altbg1\" width=\"40%\"> <b>4、QQ机器人提醒类型设置</b> </td>
      <td class=\"altbg2\">只有下面开启的提醒功能，前台用户才可以设置</td>
    </tr>
    <tr>
      <td class=\"altbg1\" width=\"40%\"> 4.1、开启@我的提醒功能？ </td>
      <td class=\"altbg2\">{$t_enable_radio}</td>
    </tr>
    <tr>
      <td class=\"altbg1\" width=\"40%\"> 4.2、开启新评论提醒功能？ </td>
      <td class=\"altbg2\">{$p_enable_radio}</td>
    </tr>
    <tr>
      <td class=\"altbg1\" width=\"40%\"> 4.3、开启新私信提醒功能？ </td>
      <td class=\"altbg2\">{$m_enable_radio}</td>
    </tr>
    <tr>
      <td class=\"altbg1\" width=\"40%\"> 4.4、开启新粉丝提醒功能？ </td>
      <td class=\"altbg2\">{$f_enable_radio}</td>
    </tr>
    <tr>
      <td class=\"altbg1\" width=\"40%\"> <b>5、其他设置</b> </td>
      <td class=\"altbg2\">&nbsp;<br />
      </td>
    </tr>
    <tr>
      <td class=\"altbg1\" width=\"40%\"> 5.1、禁止QQ签名发微博？ </td>
      <td class=\"altbg2\">{$sign_update_disable_radio}<br />
      </td>
    </tr>
    <tr>
      <td class=\"altbg1\" width=\"40%\"> 5.2、禁止QQ发微博时更新到新浪？ </td>
      <td class=\"altbg2\">{$qqwb_update_disable_radio}<br />
      </td>
    </tr>
    <tr>
      <td class=\"altbg1\" width=\"40%\"> 5.3、禁止QQ发微博时更新到腾讯？ </td>
      <td class=\"altbg2\">{$sina_update_disable_radio}<br />
      </td>
    </tr>
    <tr>
      <td class=\"altbg1\" width=\"40%\"> 5.4、禁止QQ发@MM指令时修改密码？ </td>
      <td class=\"altbg2\">{$reset_password_disable_radio}<br />
      </td>
    </tr>
  </table>
   <center>
    <input class=\"button\" type=\"submit\" name=\"imjiqiren_submit\" value=\"提 交\">
  </center>
</form>
<br />
";
echo $ImJiqiRenHTML;
}
function DoList()
{
;
}
function DoTest()
{
if(!$this->ModuleConfig['enable'] ||!imjiqiren_init($this->Config))
{
$this->Messager("请先开启QQ机器人功能","admin.php?mod=imjiqiren",10);
}
if(!$this->ModuleConfig['admin_qq_robots'])
{
$this->Messager("请先设置管理员的QQ号","admin.php?mod=imjiqiren",10);
}
$send_result = imjiqiren_send_message($this->ModuleConfig['admin_qq_robots'],'to_admin_robot',array('test'=>true,'username'=>'test','content'=>'后台发起的通知管理员测试，现在时间：'.date("Y-m-d H:i:s"),'topic_id'=>-1,));
if($send_result)
{
$this->Messager("【{$send_result}】".('debug'==$this->Get['action'] ?imjiqiren_errors_output(false) : ''),null);
}
else
{
$this->Messager("【发送失败】".('debug'==$this->Get['action'] ?imjiqiren_errors_output(false) : ''),null);
}
}
function DoModifySetting()
{
$check_result = $this->_imjiqirenEnvCheck();
if($check_result)
{
ConfigHandler::update('imjiqiren_enable',0);
$this->Messager($check_result,null);
}
$imjiqiren_config = $this->ModuleConfig;
$imjiqiren_config_string = $this->Post['imjiqiren_config_string'];
if ($imjiqiren_config_string)
{
$_tmps = unserialize(base64_decode($imjiqiren_config_string));
if ($_tmps)
{
$_tmps = array_iconv('gbk',$this->Config['charset'],$_tmps);
$app_id = (int) $_tmps['app_id'];
if($app_id >0)
{
$imjiqiren_config['app_id'] = $app_id;
$imjiqiren_config['app_key'] = $_tmps['app_key'];
$imjiqiren_config['imjiqiren_url'] = $_tmps['imjiqiren_url'];
$imjiqiren_config['server_url'] = $_tmps['server_url'];
$imjiqiren_config['server_ip'] = $_tmps['server_ip'];
$imjiqiren_config['qq_robots'] = is_numeric($_tmps['qq_robots']) ?$_tmps['qq_robots'] : 0;
$imjiqiren_config['send_update_cmd'] = $_tmps['send_update_cmd'];
$imjiqiren_config['sign_update_mark'] = $_tmps['sign_update_mark'];
$imjiqiren_config['robot_id'] = (int) $_tmps['robot_id'];
$imjiqiren_config['robot_key'] = $_tmps['robot_key'];
$imjiqiren_config['robot_username'] = $_tmps['robot_username'];
$imjiqiren_config['robot_password'] = $_tmps['robot_password'];
$imjiqiren_config['robot_server_ip'] = $_tmps['robot_server_ip'];
$imjiqiren_config['robot_server_port'] = $_tmps['robot_server_port'];
$imjiqiren_config['robot_server_key'] = $_tmps['robot_server_key'];
}
}
}
$enable = $this->Post['enable'];
$imjiqiren_enable = (($enable &&$imjiqiren_config['app_id']>0 &&$imjiqiren_config['app_key'] &&$imjiqiren_config['qq_robots']>10000 &&$imjiqiren_config['robot_id'] &&$imjiqiren_config['robot_key'] &&$imjiqiren_config['robot_username'] &&$imjiqiren_config['robot_server_ip'] &&$imjiqiren_config['robot_server_port'] &&$imjiqiren_config['robot_server_key']) ?1 : 0);
$imjiqiren_config['enable'] = $imjiqiren_enable;
if(isset($this->Post['t_enable'])) $imjiqiren_config['t_enable'] = ($this->Post['t_enable'] ?1 : 0);
if(isset($this->Post['p_enable'])) $imjiqiren_config['p_enable'] = ($this->Post['p_enable'] ?1 : 0);
if(isset($this->Post['m_enable'])) $imjiqiren_config['m_enable'] = ($this->Post['m_enable'] ?1 : 0);
if(isset($this->Post['f_enable'])) $imjiqiren_config['f_enable'] = ($this->Post['f_enable'] ?1 : 0);
$imjiqiren_config['sign_update_disable'] = ($this->Post['sign_update_disable'] ?1 : 0);
$imjiqiren_config['admin_qq_robots'] = is_numeric($this->Post['admin_qq_robots']) ?$this->Post['admin_qq_robots'] : 0;
ConfigHandler::set('imjiqiren',$imjiqiren_config);
if ($imjiqiren_enable!=$this->Config['imjiqiren_enable'])
{
ConfigHandler::update('imjiqiren_enable',$imjiqiren_enable);
}
if ($imjiqiren_config['app_id'] <1 ||!$imjiqiren_config['app_key'])
{
$this->Messager("配置信息有误，请重新输入");
}
$this->Messager("修改成功");
}
function _imjiqirenEnvCheck()
{
Load::functions('imjiqiren_env');
return imjiqiren_env();
}
}

?>
