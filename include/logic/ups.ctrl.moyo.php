<?php

class xUpdateControlLogic
{
private $aclFile = '';
private $aclData = array();
public function __construct()
{
$dataDIR = ROOT_PATH.'install/udata/';
$this->aclFile = $dataDIR.'account.licence.php';
}
public function LicenceDSP()
{
$aclData = $this->Account();
$licence = $aclData['licence'];
$licence['expiresDSP'] = $licence['expires'] <0 ?'': ('[ 服务到期时间：'.date('Y年m月d日',$licence['expires']).' ]');
$html = "程序授权类型：<b>{$licence['type']}</b> {$licence['expiresDSP']}";
if (!$licence['public'])
{
if ($aclData['upgrade']['pr'] >2)
{
$ctrl_dsp_cc = $this->dspControl('dsp.cc');
$ccDSP = "是否显示版权信息：{$ctrl_dsp_cc}
&nbsp;&nbsp;&nbsp;（注：版权信息指前台页面最底部的Powered和Cenwor链接）
<br/>";
}
$ctrl_dsp_cml = $this->dspControl('dsp.cml');
$disNone = (isset($_GET['__cc_dsp__']) &&$_GET['__cc_dsp__'] == 'y') ?'': 'none';
$html .= "&nbsp;&nbsp;&nbsp;&nbsp;
<a href=\"javascript:;\" onclick=\"$('#comlic_special_setting').toggle('fast')\">商业版特殊设置</a>
<div id=\"comlic_special_setting\" style=\"display:{$disNone};padding:0px 60px;border:2px dashed #ccc;\">
{$ccDSP}
是否显示商业授权信息：{$ctrl_dsp_cml}
&nbsp;&nbsp;&nbsp;强烈建议您开启显示商业授权信息，可以彰显网站身份，提升网站可信度
</div>";
}
$html .= '<div id="lic_recommend" style="display:none;"></div>';
$lrcmd = $licence['public'] ?'m': ($licence['expires'] >0 ?'c': 'q');
$html .= '<script type="text/javascript">var lrcmd = "'.$lrcmd.'";</script>';
return $html;
}
public function Account()
{
if (!is_file($this->aclFile))
{
return $this->aclDataDefault();
}
$this->aclDataInizd();
return $this->aclData;
}
public function Signup($account,$password)
{
$response = request('signup',array('account'=>$account,'password'=>$password),$error);
if (is_array($response) &&isset($response['account']) &&isset($response['token']))
{
$this->aclData = $this->Account();
$this->aclData['account'] = $response['account'];
$this->aclData['token'] = $response['token'];
$this->aclData['licence'] = $response['licence'];
$this->aclData['upgrade'] = $response['upgrade'];
$this->aclDataApply();
return 'ok';
}
return $response;
}
public function ccDSP()
{
$aclData = $this->Account();
$licence = $aclData['licence'];
if ($licence['public']) return true;
$ccdsp = $aclData['ccdsp']['dsp.cc'];
return $ccdsp;
}
public function Comlic()
{
$aclData = $this->Account();
$licence = $aclData['licence'];
if ($licence['public']) return '';
if (!$aclData['ccdsp']['dsp.cml']) return '';
return '<br/><a href="http:/'.'/cenwor.com/plugin.php?id=license:view&license_id='.$licence['id'].'&url_hash='.$licence['hash'].'" title="商业授权验证" target="_blank">商业授权</a>';
}
public function RPSFailed($content)
{
if ($content == 'acl.denied')
{
return true;
}
return false;
}
private function aclDataDefault()
{
return array(
'account'=>'',
'token'=>'',
'licence'=>array(
'type'=>'未授权',
'public'=>true,
'expires'=>-1
),
'upgrade'=>array(
'pr'=>1,
'stop'=>false
),
'ccdsp'=>array(
'dsp.cc'=>true,
'dsp.cml'=>true
)
);
}
private function aclDataInizd()
{
if ($this->aclData) return;
$licString = include_once $this->aclFile;
$this->aclData = $this->licEncrypt($licString,'DECODE');
}
private function aclDataApply()
{
$aclDataExport = '<?php /'.'* CENWOR.USER.LICENCE.CACHE */ return "'.$this->licEncrypt($this->aclData,'ENCODE').'"; ?>';
file_put_contents($this->aclFile,$aclDataExport);
}
public function licEncrypt($tar,$ops = 'ENCODE')
{
$skey = md5('<<< CENWOR.USER.LICENCE.CACHE.SECKEY >>>');
if ($ops == 'ENCODE')
{
return authcode(base64_encode(serialize($tar)),'ENCODE',$skey);
}
else
{
return unserialize(base64_decode(authcode($tar,'DECODE',$skey)));
}
}
private function dspControl($item)
{
$dspCC = $this->aclData['ccdsp'];
$curSTA = '否';
$tarSTA = 'true';
$staColor = 'green';
if (isset($dspCC[$item]) &&$dspCC[$item])
{
$curSTA = '是';
$tarSTA = 'false';
$staColor = 'blue';
}
return '<font color="'.$staColor.'">'.$curSTA.'</font> ( <a href="admin.php?mod=index&code=ccdsp&item='.$item.'&tar='.$tarSTA.'">切换</a> )';
}
public function dspControlDone()
{
$item = $_GET['item'];
$sta = $_GET['tar'];
in_array($item,array('dsp.cc','dsp.cml')) ||exit('f.item.moyo');
in_array($sta,array('true','false')) ||exit('f.tar.moyo');
$this->Account();
$wSTA = $sta == 'true'?true : false;
$this->aclDataInizd();
$this->aclData['ccdsp'][$item] = $wSTA;
$this->aclDataApply();
header('Location: admin.php?mode=index&code=home&__cc_dsp__=y');
}
}

?>
