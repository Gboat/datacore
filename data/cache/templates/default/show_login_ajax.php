<?php /* 2013-01-26 in jishigou invalid request template */ if(!defined("IN_JISHIGOU")) exit("invalid request"); ?><div class="fans_group_inner" style="padding:0;">
	<div class="main_2">
	<div class="set_warp Nlogin">
	<div class="Nll">
<?php $login_extract=jsg_member_login_extract(); ?>
<?php if($login_extract) { ?>
<?php $login_extract_forms=$login_extract['login_forms']; ?>
<form method="<?php echo $login_extract_forms['method']; ?>" action="<?php echo $login_extract_forms['action']; ?>">
	  
<?php if(is_array($login_extract_forms['hidden_inputs'])) { foreach($login_extract_forms['hidden_inputs'] as $v) { ?>
	  <input type="hidden" name="<?php echo $v['name']; ?>" value="<?php echo $v['value']; ?>" />
	  
<?php } } ?>
<table width="100%" border="0">
		  <tr>
			<td width="30%" align="right" valign="top">帐户/昵称：</td>
			<td width="70%">
			<p class="nll_p"><input name="<?php echo $login_extract_forms['username_input']['name']; ?>" type="text"  class="regP"/></p>
			</td>
		  </tr>
		  <tr>
			<td align="right" valign="top">登录密码：</td>
			<td>
			<p class="nll_p"><input name="<?php echo $login_extract_forms['password_input']['name']; ?>" type="password" class="regP" /></p>
			</td>
		  </tr>
	
		  <tr>
			<td align="right" valign="middle">&nbsp;</td>
			<td>	
			<input name="<?php echo $login_extract_forms['submit_input']['name']; ?>" type="submit" value="<?php echo $login_extract_forms['submit_input']['value']; ?>" class="Nbtn_login"/>	
			</td>
		  </tr>

		</table>
	</form>
<?php } else { ?><form method="POST" action="index.php?mod=login&code=dologin">
		<table width="100%" border="0">
		  <tr>
			<td width="30%" align="right" valign="top">本站帐户：</td>
			<td width="70%">
			<p class="nll_p"><input name="username" type="text"  class="regP"/></p>
			<p class="nll_p">可用“帐号昵称”或注册Email登录</p>			</td>
		  </tr>
		  <tr>
			<td align="right" valign="top">登录密码：</td>
			<td>
			<p class="nll_p"><input name="password" type="password" class="regP" /></p>
			</td>
		  </tr>
		  
<?php if($this->Config['seccode_login']) { ?>
		<tr>
			<td align="right" valign="top">验证码：</td>
			<td>
				<div class="ml10">
					<input name="seccode" id="dseccode_input" type="text" class="regP" style="width:35px;"/>
					
				</div>
				<div class="ml11">
					<div id="dlg_seccode"></div>
					<script language="javascript">seccode({"id":"dseccode_input","wp":"dlg_seccode","img_id":"dimage_seccode"});</script>
					<a href="javascript:updateSeccode('dseccode_input','dimage_seccode');" class="ml111">换一换</a>
					<span id="dseccode_tips"></span>
				</div>
			
				
			</td>
		</tr>
	  	
<?php } ?>
  <tr>
			<td align="right" valign="middle">&nbsp;</td>
			<td>	
			<input name="" type="submit" value="" class="Nbtn_login"/>
			<input name="loginType" type="hidden" id="loginType" value="show_login" />
			<input name="return_url" type="hidden" id="return_url" value="" />	
            <p class="nll_p"><input type="checkbox" class="checkb" checked title="请不要在公共电脑上使用自动登录功能">
				下次自动登录 &nbsp;&nbsp; <a href="javascript:void(0)" title="点此可通过2种方式重设密码" target="_blank" onclick="window.location.href='index.php?mod=get_password';return false;">忘记密码？</a></p>		
			</td>
		  </tr>

			  <tr>
		    <td align="right" valign="middle"></td>
		    <td>或使用如下帐号登录：<br>
<?php if($this->Config['sina_enable'] && sina_weibo_init()) { ?>
 
<?php echo sina_weibo_login('s'); ?>
 
<?php } ?>

<?php if($this->Config['qqwb_enable'] && qqwb_init()) { ?>
 
<?php echo qqwb_login('s'); ?>
 
<?php } ?>

<?php if($this->Config['kaixin_enable'] && kaixin_init()) { ?>
 
<?php echo kaixin_login('s'); ?>
 
<?php } ?>

<?php if($this->Config['yy_enable'] && yy_init()) { ?>
 
<?php echo yy_login('s'); ?>
 
<?php } ?>

<?php if($this->Config['renren_enable'] && renren_init()) { ?>
 
<?php echo renren_login('s'); ?>
 
<?php } ?>

<?php if($this->Config['fjau_enable'] && fjau_init()) { ?>
 
<?php echo fjau_login('s'); ?>
 
<?php } ?>
</td>
		  </tr>


		</table>
	</form>
	
<?php } ?>
</div>
<?php if($this->Config['seccode_login']) { ?>
<script language="javascript">
	$(document).ready(function(){
		$("#dseccode_input").blur(function(){
			checkSeccode($("#dseccode_input").val(), {"tips_id":"dseccode_tips"});
		});
	});
</script>
<?php } ?>
<div class="Nlr">
	<span class="font14px">还没注册过本站帐户？</span>
	<a title="点此免费注册" onclick="window.open('<?php echo $this->Config['site_url']; ?>/index.php?mod=member');return false;" class="Nbtn_reg" target="_blank">点此免费注册</a>
	注册后，可以方便地分享新鲜事、关注用户分享；
	并可通过<b>手机</b>随时随地参与互动。

	
	</div>
	</div>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
	$(".sinaweiboLogin").mouseover(function(){$(".tlb_sina").show();});$(".sinaweiboLogin").mouseout(function(){$(".tlb_sina").hide();});
	$(".qqweiboLogin").mouseover(function(){$(".tlb_qq").show();});$(".qqweiboLogin").mouseout(function(){$(".tlb_qq").hide();});
	$(".yyLogin").mouseover(function(){$(".tlb_yy").show();});$(".yyLogin").mouseout(function(){$(".tlb_yy").hide();});
	$(".renrenLogin").mouseover(function(){$(".tlb_renren").show();});$(".renrenLogin").mouseout(function(){$(".tlb_renren").hide();});
	$(".kaixinLogin").mouseover(function(){$(".tlb_kaixin").show();});$(".kaixinLogin").mouseout(function(){$(".tlb_kaixin").hide();});
	$(".fjauLogin").mouseover(function(){$(".tlb_fj").show();});$(".fjauLogin").mouseout(function(){$(".tlb_fj").hide();});
});
</script>
<style type="text/css">
.tlb_sina,.tlb_qq,.tlb_yy,.tlb_renren,.tlb_kaixin,.tlb_fj{ margin:-45px 0 0 -13px;*margin:-45px 0 0 -55px;}
</style>