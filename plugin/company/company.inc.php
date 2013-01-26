<?php
/*******************************************************************
 * [JishiGou] (C)2005 - 2099 INET Inc.
 *
 * This is NOT a freeware, use is subject to license terms
 *
 * @Filename company.inc.php $
 *
 * @Author http://inet.hitwh.edu.cn $
 *
 * @Date 2012-04-28 05:53:12 1541831140 208928879 804 $
 *******************************************************************/


if(!defined('IN_JISHIGOU'))
{
    exit('invalid request');
}
$comid = $_GET['uid'];
if($comid)
{
	$sql = "select * from ".TABLE_PREFIX."plugin_company where `uid`='".$comid."' OR username = '".$comid."'";
	$query = $this->DatabaseHandler->Query($sql);
	$cominfo = $query->GetRow();
	$cominfo['ptime'] = my_date_format($cominfo['ptime']);
}
else
{
	$sql = "select c.*,u.face from ".TABLE_PREFIX."plugin_company c LEFT JOIN ".TABLE_PREFIX."members u ON c.uid = u.uid ORDER BY c.cid DESC";
	$query = $this->DatabaseHandler->Query($sql);
	$i = 0;
	while(false != ($row = $query->GetRow()))
	{
		$companys[$i] = $row;
		$companys[$i]['ptime'] = my_date_format($row['ptime']);
		$companys[$i]['face'] = empty($row['face']) ? 'images/noavatar.gif' : $row['face'];
		$i++;
	}
}
?>