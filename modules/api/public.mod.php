<?php

if(!defined('IN_JISHIGOU'))
{
    exit('invalid request');
}
class ModuleObject extends MasterObject
{
    function ModuleObject($config)
    {
        $this->MasterObject($config);
        $this->Execute();
    }
    function Execute()
    {
        switch($this->Code)
        {
            case 'topic':
            {
                $this->Topic();
                break;
            }
            case 'register':
            {
                $this->Register();
                break;
            }
            default :
            {
                $this->Main();
                break;
            }
        }
    }
    function Main()
    {
        api_output('api is ok');
    }
    function Topic()
    {
        $sql_wheres = array();
        $sql_wheres[] = "`type` IN('first','forward','both')";
        $id_max = max(0,(int) $this->Inputs['id_max']);
        if($id_max) {
            $sql_wheres[] = "`tid`<='$id_max'";
        }
        $id_min = max(0,(int) $this->Inputs['id_min']);
        if($id_min) {
            $sql_wheres[] = "`tid`>'$id_min'";
        }
        $sql_where = ($sql_wheres ?" where ".implode(" and ",$sql_wheres) : "");
        $sql = "select count(*) as count from ".TABLE_PREFIX."topic $sql_where";
        $row = $this->DatabaseHandler->FetchFirst($sql);
        $return = array();
        if($row['count']) {
            $return = $this->_page($row['count']);
            $return['topics'] = $this->_topic(" $sql_where order by `tid` desc limit {$return[offset]},{$return[count]} ");
        }
        api_output($return);
    }
    function Register()
    {
        $regstatus = jsg_member_register_check_status();
        if($regstatus['error'])
        {
            api_error('register is close',0);
        }
        if($regstatus['invite_enable'])
        {
            if(!$regstatus['normal_enable'])
            {
                api_error('register is invite',0);
            }
        }
        $username = $this->Inputs['username'];
        $nickname = $this->Inputs['nickname'];
        $password = $this->Inputs['password'];
        $email = $this->Inputs['email'];
        $ret = jsg_member_register($nickname,$password,$email,$username);
        if($ret <1)
        {
            api_error('register is invalid',$ret);
        }
        api_output($ret);
    }
}

?>
