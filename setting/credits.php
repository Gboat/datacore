<?php
/*******************************************************************
 * [JishiGou] (C)2005 - 2099 INET Inc.
 *
 * This is NOT a freeware, use is subject to license terms
 *
 * @Filename credits.php $
 *
 * @Author http://inet.hitwh.edu.cn $
 *
 * @Date 2012-04-28 05:53:12 1258453452 2062386901 279 $
 *******************************************************************/

 
  
$config['credits']=array (
  'ext' => 
  array (
    'extcredits2' => 
    array (
      'enable' => 1,
      'ico' => '',
      'name' => '金币',
      'unit' => '',
      'default' => 0,
    ),
  ),
  'formula' => '$member[topic_count]+$member[extcredits2]',
);
?>