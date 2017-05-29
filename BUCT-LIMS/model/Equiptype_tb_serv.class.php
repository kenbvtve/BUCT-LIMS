<?php
/**
 * Created by PhpStorm.
 * User: lo_ong
 */

require_once "SqlHelp.class.php";
require_once "Equiptype_tb.class.php";

class Equiptype_tb_serv{
    //获取所有设备名
    function getEquiptypeTbInfo(){
        $sqlHelp=new SqlHelp();
        $sql="select equiptype_name from equiptype_tb";
        $res=$sqlHelp->execute_dql_quick($sql);
        $sqlHelp->close_connect();
        return $res;
    }
}