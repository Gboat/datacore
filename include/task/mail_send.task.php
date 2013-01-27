<?php
if(!defined('IN_JISHIGOU'))
{
    exit('invalid request');
}
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