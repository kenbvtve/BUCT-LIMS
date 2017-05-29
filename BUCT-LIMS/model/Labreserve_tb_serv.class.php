<?php
/**
 * Created by PhpStorm.
 * User: lo_ong
 */

require_once "SqlHelp.class.php";
require_once "Labreserve_tb.class.php";

class Labreserve_tb_serv{
    function getLabreserveInfoByLabIdAndDateToDate($labreserve_lab_id,$labreserve_date_start,$labreserve_date_end){
        $sqlHelp=new SqlHelp();
        $sql="select * from labreserve_tb WHERE labreserve_lab_id='$labreserve_lab_id' AND labreserve_date BETWEEN '$labreserve_date_start' AND '$labreserve_date_end'";
        $res=$sqlHelp->execute_dql_quick($sql);
        $sqlHelp->close_connect();
        return $res;
    }


    function getLabIDByDateAndTime($labreserve_date,$labreserve_time){
        $sqlHelp=new SqlHelp();
        $sql="select * from labreserve_tb WHERE labreserve_date='$labreserve_date' AND labreserve_time='$labreserve_time'";
        $res=$sqlHelp->execute_dql_quick($sql);
        $sqlHelp->close_connect();
        return $res;
    }

    //两种课程预约查询
    function getLabIDByDateAndTimeANDStatus($labreserve_date,$labreserve_time,$labreserve_status){
        $sqlHelp=new SqlHelp();
        $sql="select * from labreserve_tb WHERE labreserve_date='$labreserve_date' AND labreserve_time='$labreserve_time' AND labreserve_status='$labreserve_status'";
        $res=$sqlHelp->execute_dql_quick($sql);
        $sqlHelp->close_connect();
        return $res;
    }

    function getLabIDByDateAndLabIdANDStatus($labreserve_date,$labreserve_lab_id,$labreserve_status){
        $sqlHelp=new SqlHelp();
        $sql="select * from labreserve_tb WHERE labreserve_date='$labreserve_date' AND labreserve_lab_id='$labreserve_lab_id' AND labreserve_status='$labreserve_status'";
        $res=$sqlHelp->execute_dql_quick($sql);
        $sqlHelp->close_connect();
        return $res;
    }

    //检测实验室是否预约
    function checkLabIsReservdByLabIdAndDateAndTime($labreserve_lab_id,$labreserve_date,$labreserve_time){
        $sqlHelp=new SqlHelp();
        $sql="select * from labreserve_tb WHERE labreserve_lab_id='$labreserve_lab_id' AND labreserve_date='$labreserve_date' AND labreserve_time='$labreserve_time'";
        $res=$sqlHelp->execute_dql_quick($sql);
        $sqlHelp->close_connect();
        return $res;
    }

    //预约实验室
    function addLabreserve($labreserve_lab_id,$labreserve_date,$labreserve_time,$labreserve_perName,$labreserve_perId,$labreserve_perPhone,$labreserve_perMail,$labreserve_reason,$labreserve_equip){
        $sqlHelp=new SqlHelp();
        $sql="insert into labreserve_tb (labreserve_id,labreserve_lab_id,labreserve_date,labreserve_time,labreserve_perName,labreserve_perId,labreserve_perPhone,labreserve_perMail,labreserve_reason,labreserve_equip) VALUES (unix_timestamp(now()),'$labreserve_lab_id','$labreserve_date','$labreserve_time','$labreserve_perName','$labreserve_perId','$labreserve_perPhone','$labreserve_perMail','$labreserve_reason','$labreserve_equip')";
        $res=$sqlHelp->execute_dml($sql);
        $sqlHelp->close_connect();
        return $res;
    }

    //根据审核状态labreserve_status获取表单
    function getLabReserveListByLabReserveStatus($labreserve_status){
        $sqlHelp=new SqlHelp();
        $sql="select * from labreserve_tb WHERE labreserve_status='$labreserve_status'";
        $res=$sqlHelp->execute_dql_quick($sql);
        $sqlHelp->close_connect();
        return $res;
    }

    //根据预约编号labreserve_id改变labreserve_status的值
    function updateLabreserveStatusBylabreserveId($labreserve_id,$labreserve_status){
        $sqlHelp=new SqlHelp();
        $sql="update labreserve_tb set labreserve_status='$labreserve_status' WHERE labreserve_id='$labreserve_id'";
        $res=$sqlHelp->execute_dml($sql);
        $sqlHelp->close_connect();
        return $res;
    }


    //根据用户id获取用户预约的信息
    function getLabreserveListByLabreservePerId($labreserve_perId){
        $sqlHelp=new SqlHelp();
        $sql="select * from labreserve_tb WHERE labreserve_perId='$labreserve_perId'";
        $res=$sqlHelp->execute_dql_quick($sql);
        $sqlHelp->close_connect();
        return $res;
    }

    //根据labreserve_id获取预约详情
    function getlabreserveInfoByLabreserveId($labreserve_id){
        $sqlHelp=new SqlHelp();
        $sql="select * from labreserve_tb WHERE labreserve_id='$labreserve_id'";
        $res=$sqlHelp->execute_dql_quick($sql);

        $labreserve_tb=new Labreserve_tb();
        $labreserve_tb->setLabreservePerName($res[0]['labreserve_perName']);
        $labreserve_tb->setLabreservePerId($res[0]['labreserve_perId']);
        $labreserve_tb->setLabreservePerPhone($res[0]['labreserve_perPhone']);
        $labreserve_tb->setLabreservePerMail($res[0]['labreserve_perMail']);
        $labreserve_tb->setLabreserveLabId($res[0]['labreserve_lab_id']);
        $labreserve_tb->setLabreserveDate($res[0]['labreserve_date']);
        $labreserve_tb->setLabreserveTime($res[0]['labreserve_time']);
        $labreserve_tb->setLabreserveReason($res[0]['labreserve_reason']);
        $labreserve_tb->setLabreserveEquip($res[0]['labreserve_equip']);
        $labreserve_tb->setLabreserveStatus($res[0]['labreserve_status']);

        $sqlHelp->close_connect();
        return $labreserve_tb;
    }


    //查询历史记录
    function  getLabReserveListHistoryByLabReserveStatusAndDate(){
        $sqlHelp=new SqlHelp();
        $sql="select * from labreserve_tb WHERE labreserve_date< now() OR labreserve_status>'1'";
        $res=$sqlHelp->execute_dql_quick($sql);
        $sqlHelp->close_connect();
        return $res;
    }
}
















