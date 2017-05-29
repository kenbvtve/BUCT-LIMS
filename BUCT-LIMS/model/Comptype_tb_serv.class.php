<?php
/**
 * Created by PhpStorm.
 * User: lo_ong
 */
require_once "SqlHelp.class.php";
require_once "Comptype_tb.class.php";

class Comptype_tb_serv{
    //获取竞赛类型
    function getComptypeFromComptypeTb(){
        $sqlHelp=new SqlHelp();
        $sql="select comptype_name from comptype_tb ORDER BY comptype_id DESC";
        $res=$sqlHelp->execute_dql_quick($sql);
        $sqlHelp->close_connect();
        return $res;
    }
    //添加竞赛类型
    function addComptypeToComptypeTb($comptype_name){
        $sqlHelp=new SqlHelp();
        $sql="insert into comptype_tb (comptype_name) VALUES ('$comptype_name')";
        $res=$sqlHelp->execute_dml($sql);
        $sqlHelp->close_connect();
        return $res;
    }
    //检测竞赛名对应comptype_id
    function getComptypeComptypeIdByComptypeName($comptype_name){
        $sqlHelp=new SqlHelp();
        $sql="select comptype_id from comptype_tb WHERE comptype_name='$comptype_name'";
        $res=$sqlHelp->execute_dql_quick($sql);
        $sqlHelp->close_connect();
        return $res;
    }

}

