<?php
/*******************************************************************
 * [JishiGou] (C)2005 - 2099 INET Inc.
 *
 * This is NOT a freeware, use is subject to license terms
 *
 * @Filename mail_send.task.php $
 *
 * @Author http://inet.hitwh.edu.cn $
 *
 * @Date 2012-04-28 05:53:04 1442955735 1802433487 1001 $
 *******************************************************************/


if(!defined('IN_JISHIGOU'))
{
    exit('invalid request');
}


/**
 * @author 狐狸<foxis@qq.com>
 * 
 * 邮件计划任务
 */
if (class_exists('TaskCore')==false) {
	include_once ROOT_PATH . 'include/task/task_core.task.php';
}
class TaskItem extends TaskCore
{
	
	var $num=10;
	
	function TaskItem()
	{
		$this->TaskCore();
	}
	
	function run()
	{
		
		$num=10;
		$sql='select * from '.TABLE_PREFIX.'cron limit 0,'.$num;
		$query = $this->DatabaseHandler->Query($sql);
		$mail=$query->GetAll();
	
		if(empty($mail))return false;
	
		foreach($mail as $value){
			if($value['sendtime'] <= time())
			{
				$mail_subject = '记事狗邮件提醒';
				Load::lib('mail');
				$send_result = send_mail('85924101@qq.com',$mail_subject,$value['content'],array(),3,false);
				
				$sql='delete from '.TABLE_PREFIX.'cron where id = '.$value['id'];
				$this->DatabaseHandler->Query($sql);
			}
		}
	
			}
	
}
?>