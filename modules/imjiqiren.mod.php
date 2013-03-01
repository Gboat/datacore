<?php

if(!defined("IN_IMJIQIREN_MOD"))
{
exit("Access Denied");
}
if(!$this->Config['imjiqiren_enable'] ||!imjiqiren_init($this->Config))
{
$msg = "
        <div style=\"text-align:left;\">
        <div>
		  <span style='color:red'>【小贴士】</span>QQ机器人是一种全新的互动方式，只需要一个简单的绑定，即可用自己的QQ发微博、通过QQ签名发微博，如果有人@你、评论你、关注你、给你发私信，你都可以第一时间收到QQ机器人的通知；当然绑定后你可以设置不接受通知，或随时取消绑定！
    	</div>
    	<div>
    	<BR />
    		<strong>如需使用QQ机器人服务，请联系管理员开通</strong><BR /><BR />
    	</div>
        </div>
";
$this->Messager($msg,null);
}
if(MEMBER_ID <1)
{
$this->Messager("请先<a href='index.php?mod=login'>点此登录</a>或者<a href='index.php?mod=member'>点此注册</a>一个帐号",null);
}
if(isset($_POST['imjiqiren_submit']) &&$_POST['_user'])
{
$_notice_enable = 0;
$_user = array();
foreach($_POST['_user'] as $k=>$v)
{
if('_enable'==substr($k,-7))
{
$_user[$k] = ($v ?1 : 0);
$_notice_enable += $_user[$k];
}
}
$update_result = imjiqiren_client_user_update($_user,MEMBER_ID);
$this->Messager("设置成功");
}
$imjiqiren_config = ConfigHandler::get('imjiqiren');
$imjiqiren_cmd = $imjiqiren_config['send_update_cmd'];
$imjiqiren_qq = imjiqiren_user_qq_robot(MEMBER_ID);
$bind_qq_code = imjiqiren_user_bind_qq(MEMBER_ID);
$imjiqiren_user = imjiqiren_client_user(MEMBER_ID);
Load::lib('form');
$FormHandler = new FormHandler();
foreach($imjiqiren_config as $k=>$v)
{
if('_enable'==substr($k,-7) &&$v &&isset($imjiqiren_user[$k]))
{
${"{$k}_radio"}= $FormHandler->YesNoRadio("_user[{$k}]",(int) $imjiqiren_user[$k]);
}
}
$share_msg = '';
if($imjiqiren_user['user_im'])
{
if(!$imjiqiren_user['share_time'])
{
$share = $this->Get['share'];
if($share)
{
$share_time = $imjiqiren_user['share_time'];
if(!$share_time)
{
$share_time = time();
$_user = array('share_time'=>$share_time,);
imjiqiren_client_user_update($_user,MEMBER_ID);
$share_msg = "<img src='{$this->Config['site_url']}/index.php?mod=tools&code=imjiqiren&share_time={$share_time}' width='0' height='0' />";
}
}
else
{
$skip_share = $this->Get['skip_share'];
if(!$skip_share)
{
$this->Messager("已经成功绑定了QQ机器人，您现在可以：<br>1、用自己QQ发微博；<br>2、通过QQ签名发微博；<br>3、如果有人@提到你、回复你的微博等，你都可以第一时间收到QQ机器人的通知；<br><br><a href='{$this->Config['site_url']}/index.php?mod=tools&code=imjiqiren&share=1'><strong>发一条微博告诉我的朋友</strong></a> &nbsp; <a href='{$this->Config['site_url']}/index.php?mod=tools&code=imjiqiren&skip_share=1'>或者点此直接进入设置页面</a>",null);
}
}
}
$share_time = $this->Get['share_time'];
if($share_time &&$share_time==$imjiqiren_user['share_time'])
{
$share_msg = "我刚绑定了QQ机器人，可以使用自己QQ发微博、通过QQ签名发微博，你如果@我、回复我的微博等，我都可以第一时间收到QQ机器人的通知；你也来试试吧 ".get_full_url($this->Config['site_url'],"index.php?mod=tools&code=imjiqiren")." ";
$TopicLogic = Load::logic('topic',1);
$_POST['syn_to_sina'] = (($this->Config['sina_enable'] &&sina_weibo_init() &&sina_weibo_bind_setting(MEMBER_ID)) ?1 : 0);
$add_result = $TopicLogic->Add($share_msg);
$_user = array('share_time'=>mt_rand(1,1111111111),);
imjiqiren_client_user_update($_user,MEMBER_ID);
exit;
}
}
$imjiqirenHTML = '';
if(!$bind_qq_code)
{
$imjiqiren_var001 = '';
if($t_enable_radio)
{
$imjiqiren_var001 = "
            <tr>
		  <td class=\"altbg1\" width=\"25%\"> 开启@我的提醒？ </td>
		  <td class=\"altbg2\" width=\"25%\">{$t_enable_radio}</td>
		  <td class=\"altbg2\">（也可以对QQ机器人发 @TOFF/@TON 即时关闭或开启）</td>
		</tr>";
}
$imjiqiren_var002 = '';
if($p_enable_radio)
{
$imjiqiren_var002 = "
            <tr>
		  <td class=\"altbg1\"> 开启新评论提醒？ </td>
		  <td class=\"altbg2\">{$p_enable_radio}</td>
		  <td class=\"altbg2\">（也可以对QQ机器人发 @POFF/@PON 即时关闭或开启）</td>
		</tr>
";
}
$imjiqiren_var003 = '';
if($m_enable_radio)
{
$imjiqiren_var003 = "
            <tr>
		  <td class=\"altbg1\"> 开启新私信提醒？ </td>
		  <td class=\"altbg2\">{$m_enable_radio}</td>
		  <td class=\"altbg2\">（也可以对QQ机器人发 @MOFF/@MON 即时关闭或开启）</td>
		</tr>
";
}
$imjiqiren_var004 = '';
if($f_enable_radio)
{
$imjiqiren_var004 = "
            <tr>
		  <td class=\"altbg1\"> 开启新粉丝提醒？ </td>
		  <td class=\"altbg2\">{$f_enable_radio}</td>
		  <td class=\"altbg2\">（也可以对QQ机器人发 @FOFF/@FON 即时关闭或开启）</td>
		</tr>
";
}
$imjiqiren_var005 = '';
if($imjiqiren_cmd)
{
$imjiqiren_var005 = "
               ，格式是<font color=\"red\"><b>{$imjiqiren_cmd}你的微博内容</b></font>
";
}
$FORMHASH = FORMHASH;
$imjiqirenHTML = "           <div>
		<span style='color:red'>【注意】</span>请不要短时间内频繁对机器人发消息，否则他将直接忽略、不予回应！
	</div>
	<div>
		<BR />一、你当前帐户已经与QQ绑定了，现在可以：<BR />
		1、通过QQ机器人{$imjiqiren_qq}发微博{$imjiqiren_var005}；<BR>
		2、修改帐户绑定的QQ的签名，即可自动更新到微博；<BR>
		3、有人回复你、给你发私信、或@提到你，你会接收到QQ机器人通知，可在下面设置接受通知的内容；<BR>
		4、如需取消QQ与帐户绑定，只需发<font color=\"red\"><b>@QXBD</b></font>给QQ机器人即可，发<font color=\"red\">@help</font>可查看更多命令。<br />
	</div>
	<br />
	<form action=\"index.php?mod=tools&code=imjiqiren\" method=\"POST\">
      <input type=\"hidden\" name=\"FORMHASH\" value=\"{$FORMHASH}\" />
	  <table cellspacing=\"1\" cellpadding=\"4\" width=\"100%\" align=\"center\" class=\"tableborder\">
		<tr>
		  <td colspan=\"3\"><b>二、QQ机器人提醒设置</b></td>
		</tr>
		{$imjiqiren_var001}
		{$imjiqiren_var002}
		{$imjiqiren_var003}
		{$imjiqiren_var004}
	  </table>
	   <center>
		<input class=\"button\" type=\"submit\" name=\"imjiqiren_submit\" value=\"提交\">
	  </center>
	</form>
	<br />
    {$share_msg}";
}
else
{
$imjiqirenHTML = "
        <div>
		<span style='color:red'>【小贴士】</span>QQ机器人是一种全新的互动方式，只需要一个简单的绑定，即可用自己的QQ发微博、通过QQ签名发微博，如果有人@你、评论你、关注你、给你发私信，你都可以第一时间收到QQ机器人的通知；当然绑定后你可以设置不接受通知，或随时取消绑定！
	</div>
	<div>
	<BR />
		只需如下2步即可完成帐户与QQ的绑定：<BR />
		1、请用您的QQ加QQ机器人{$imjiqiren_qq}为好友；<BR />
		2、发送<span style='color:red'>{$bind_qq_code}</span>到QQ机器人{$imjiqiren_qq}；<BR /><BR />
	</div>
";
}

?>
