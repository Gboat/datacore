<?php

if(!defined("IN_SMS_MOD"))
{
exit("Access Denied");
}
if(!$this->Config['sms_enable'] ||!sms_init($this->Config))
{
$msg = "
        <div style=\"text-align:left;\">
        <div>
		  <span style='color:red'>【小贴士】</span>手机短信是一种全新的互动方式，只需要一个简单的绑定，即可用自己的手机发微博，如果有人@你、评论你、关注你、给你发私信，你都可以第一时间收到手机短信的通知；当然绑定后你可以设置不接受通知，或随时取消绑定！
    	</div>
    	<div>
    	<BR />
    		<strong>如需使用手机短信服务，请联系管理员开通</strong><BR /><BR />
    	</div>
        </div>
";
if($sms_msg_return) {
$smsHTML = $msg;
return $smsHTML;
}else {
$this->Messager($msg,null);
}
}
if(MEMBER_ID <1)
{
$this->Messager("请先<a href='index.php?mod=login'>点此登录</a>或者<a href='index.php?mod=member'>点此注册</a>一个帐号",null);
}
if(isset($_POST['sms_submit']) &&$_POST['_user'])
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
$update_result = sms_client_user_update($_user,MEMBER_ID);
$this->Messager("设置成功");
}
$sms_config = ConfigHandler::get('sms');
$sms_cmd = $sms_config['send_update_cmd'];
$sms_id = $sms_config['sms_id'];
$sms_user = sms_client_user(MEMBER_ID);
$sms_has_bind = sms_has_bind($sms_user);
$smsHTML = '';
if($sms_has_bind)
{
$share_msg = '';
if($sms_user['user_im'])
{
if(!$sms_user['share_time'])
{
$share = $this->Get['share'];
if($share)
{
$share_time = $sms_user['share_time'];
if(!$share_time)
{
$share_time = time();
$_user = array('share_time'=>$share_time,);
sms_client_user_update($_user,MEMBER_ID);
$share_msg = "<img src='{$this->Config['site_url']}/index.php?mod=other&code=sms&share_time={$share_time}' width='0' height='0' />";
}
}
else
{
$skip_share = $this->Get['skip_share'];
if(!$skip_share)
{
$this->Messager("已经成功绑定了手机短信，您现在可以：<br>1、用自己手机发微博；<br>2、如果有人@提到你、回复你的微博等，你都可以第一时间收到手机短信的通知；<br><br><a href='{$this->Config['site_url']}/index.php?mod=other&code=sms&share=1'><strong>发一条微博告诉我的朋友</strong></a> &nbsp; <a href='{$this->Config['site_url']}/index.php?mod=other&code=sms&skip_share=1'>或者点此直接进入设置页面</a>",null);
}
}
}
$share_time = $this->Get['share_time'];
if($share_time &&$share_time==$sms_user['share_time'])
{
$share_msg = "我刚绑定了手机短信，可以使用自己手机发微博，你如果@我、回复我的微博等，我都可以第一时间收到手机短信的通知；你也来试试吧 ".get_full_url($this->Config['site_url'],"index.php?mod=other&code=sms")." ";
$TopicLogic = Load::logic('topic',1);
$_POST['syn_to_sina'] = (($this->Config['sina_enable'] &&sina_weibo_init() &&sina_weibo_bind_setting(MEMBER_ID)) ?1 : 0);
$add_result = $TopicLogic->Add($share_msg);
$_user = array('share_time'=>mt_rand(1,1111111111),);
sms_client_user_update($_user,MEMBER_ID);
exit;
}
}
Load::lib('form');
$FormHandler = new FormHandler();
foreach($sms_config as $k=>$v)
{
if('_enable'==substr($k,-7) &&$v &&isset($sms_user[$k]))
{
${"{$k}_radio"}= $FormHandler->YesNoRadio("_user[{$k}]",(int) $sms_user[$k]);
}
}
$sms_var001 = '';
if($t_enable_radio)
{
$sms_var001 = "
            <tr>
		  <td class=\"altbg1\" width=\"25%\"> 开启@我的提醒？ </td>
		  <td class=\"altbg2\" width=\"25%\">{$t_enable_radio}</td>
		  <td class=\"altbg2\">（也可以发手机短信 @TOFF/@TON 即时关闭或开启）</td>
		</tr>";
}
$sms_var002 = '';
if($p_enable_radio)
{
$sms_var002 = "
            <tr>
		  <td class=\"altbg1\"> 开启新评论提醒？ </td>
		  <td class=\"altbg2\">{$p_enable_radio}</td>
		  <td class=\"altbg2\">（也可以发手机短信 @POFF/@PON 即时关闭或开启）</td>
		</tr>
";
}
$sms_var003 = '';
if($m_enable_radio)
{
$sms_var003 = "
            <tr>
		  <td class=\"altbg1\"> 开启新私信提醒？ </td>
		  <td class=\"altbg2\">{$m_enable_radio}</td>
		  <td class=\"altbg2\">（也可以发手机短信 @MOFF/@MON 即时关闭或开启）</td>
		</tr>
";
}
$sms_var004 = '';
if($f_enable_radio)
{
$sms_var004 = "
            <tr>
		  <td class=\"altbg1\"> 开启新粉丝提醒？ </td>
		  <td class=\"altbg2\">{$f_enable_radio}</td>
		  <td class=\"altbg2\">（也可以发手机短信 @FOFF/@FON 即时关闭或开启）</td>
		</tr>
";
}
$sms_var005 = '';
if($sms_cmd)
{
$sms_var005 = "
               ，格式是<font color=\"red\"><b>{$sms_cmd}你的微博内容</b></font>
";
}
$FORMHASH = FORMHASH;
$smsHTML = "           <div>
		<span style='color:red'>【注意】</span>请不要短时间内频繁发消息，否则他将直接忽略、不予回应！
	</div>
	<div>
		<BR />一、你当前帐户已经与手机绑定了，现在可以：<BR />
		1、通过手机短信{$sms_id}发微博{$sms_var005}；<BR>
		2、有人回复你、给你发私信、或@提到你，你会接收到手机短信通知，可在下面设置接受通知的内容；<BR>
		3、如需取消手机与帐户绑定，只需发<font color=\"red\"><b>@QXBD</b></font>即可，发<font color=\"red\">@help</font>可查看更多命令。<br />
	</div>
	<br />
	<form action=\"index.php?mod=other&code=sms\" method=\"POST\">
      <input type=\"hidden\" name=\"FORMHASH\" value=\"{$FORMHASH}\" />
	  <table cellspacing=\"1\" cellpadding=\"4\" width=\"100%\" align=\"center\" class=\"tableborder\">
		<tr>
		  <td colspan=\"3\"><b>二、手机短信提醒设置</b></td>
		</tr>
		{$sms_var001}
		{$sms_var002}
		{$sms_var003}
		{$sms_var004}
	  </table>
	   <center>
		<input class=\"button\" type=\"submit\" name=\"sms_submit\" value=\"提交\">
	  </center>
	</form>
	<br />
    {$share_msg}";
}
else
{
$sms_bind_num = ($sms_user['user_im'] ?$sms_user['user_im'] : '');
$smsHTML = "
        <div>
		<span style='color:red'>【小贴士】</span>手机短信是一种全新的互动方式，只需要一个简单的绑定，即可用自己的手机发微博、通过手机签名发微博，如果有人@你、评论你、关注你、给你发私信，你都可以第一时间收到手机短信的通知；当然绑定后你可以设置不接受通知，或随时取消绑定！
	</div>
	<div>
	<BR />
		只需30秒即可完成帐户与手机的绑定：<BR />
        <div id=\"sms_bind_area\">
    		1、请输入您的手机号，并点击“获取验证码”按钮<br />
验证码将通过短信发到手机上(节假日期间短信稍有延迟，请耐心等待)<BR />
    		<input type=\"text\" class=\"p1\" id=\"sms_bind_num\" name=\"sms_bind_num\" value=\"{$sms_bind_num}\" />&nbsp;<input id=\"sms_bind_button\" onclick=\"sms_bind()\" type=\"button\" class=\"save\" value=\"获取验证码\" />
        </div>
        <div id=\"sms_bind_verify_area\" style=\"display:none;\">
            2、请输入发到您手机的验证码，并点击“绑定手机号”按钮<BR />
            <input type=\"text\" class=\"p1\" id=\"sms_bind_key\" name=\"sms_bind_key\" value=\"\" />&nbsp;<input onclick=\"sms_bind_verify()\" type=\"button\" class=\"save\" value=\"绑定手机号\" />
        </div>
        <div id=\"sms_bind_msg\"></div>
        <BR /><BR />               
	</div>
";
$smsHTML .= "        
        <script language=\"javascript\">
        
            function sms_bind()
            {
                var sms_num = $('#sms_bind_num').val();
                
                var myAjax = $.post(
                    'ajax.php?mod=sms&code=bind',
                    {
                        sms_num:sms_num                        
                    },
                    function (d) 
                    {
                        if(d)
                        {
                            $('#sms_bind_msg').html(d);
                        }
                        else
                        {
                            $('#sms_bind_button').attr('disabled','true');
                            $('#sms_bind_verify_area').css('display','block');
                        }
                    }
                );
            }
            
            function sms_bind_verify()
            {
                var bind_key = $('#sms_bind_key').val();
                
                var myAjax = $.post(
                    'ajax.php?mod=sms&code=bind_verify',
                    {
                        bind_key:bind_key
                    },
                    function (d)
                    {
                        if(d)
                        {
                            $('#sms_bind_msg').html(d);
                        }
                        else
                        {
                            alert('绑定成功了');
                            
                            window.location.reload();
                        }
                    }
                );
            }
            
            function sms_unbind()
            {
                var myAjax = $.post(
                    'ajax.php?mod=sms&code=unbind',
                    {
                         code:unbind                       
                    },
                    function (d) 
                    {
                        $('#sms_bind_area').html(d);
                    }
                );
            }
            
        </script>
            ";
}

?>
