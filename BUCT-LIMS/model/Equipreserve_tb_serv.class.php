<?php
/**
 * Created by PhpStorm.
 * User: lo_ong
 */

require_once "SqlHelp.class.php";
require_once "Equipreserve_tb.class.php";

class Equipreserve_tb_serv{
    function addEquipReserve($equipreserve_perName,$equipreserve_perId,$equipreserve_perPhone,$equipreserve_perMail,$equipreserve_date,$equipreserve_time,$equipreserve_equip,$equipreserve_reason){
        $sqlHelp=new SqlHelp();
        $sql="insert into equipreserve_tb (equipreserve_id,equipreserve_perName,equipreserve_perId,equipreserve_perPhone,equipreserve_perMail,equipreserve_date,equipreserve_time,equipreserve_equip,equipreserve_reason) VALUES (unix_timestamp(now()),'$equipreserve_perName','$equipreserve_perId','$equipreserve_perPhone','$equipreserve_perMail','$equipreserve_date','$equipreserve_time','$equipreserve_equip','$equipreserve_reason')";
        $res=$sqlHelp->execute_dml($sql);
        $sqlHelp->close_connect();
        return $res;
    }

    //查询用户的设备预约
    function getequipreserveListByPerId($equipreserve_perId){
        $sqlHelp=new SqlHelp();
        $sql="select * from equipreserve_tb WHERE equipreserve_perId='$equipreserve_perId'";
        $res=$sqlHelp->execute_dql_quick($sql);
        $sqlHelp->close_connect();
        return $res;
    }

    //根据审核状态查询预约记录
    function getEquipReserveListByEquipReserveStatus($equipreserve_status){
        $sqlHelp=new SqlHelp();
        $sql="select * from equipreserve_tb WHERE equipreserve_status='$equipreserve_status'";
        $res=$sqlHelp->execute_dql_quick($sql);
        $sqlHelp->close_connect();
        return $res;
    }

    //更新审核状态
    function updateEquipreserveStatusByEquipreserveId($equipreserve_id,$equipreserve_status){
        $sqlHelp=new SqlHelp();
        $sql="update equipreserve_tb set equipreserve_status='$equipreserve_status' WHERE equipreserve_id='$equipreserve_id'";
        $res=$sqlHelp->execute_dml($sql);
        $sqlHelp->close_connect();
        return $res;
    }

    //获取历史记录
    function getEquipReserveListHistoryByEuqipReserveStatusAndDate(){
        $sqlHelp=new SqlHelp();
        $sql="select * from equipreserve_tb WHERE equipreserve_status>'1' OR equipreserve_date<now()";
        $res=$sqlHelp->execute_dql_quick($sql);
        $sqlHelp->close_connect();
        return $res;
    }
}





