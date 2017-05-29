<?php
/**
 * Created by PhpStorm.
 * User: lo_ong
 * Date: 2017/5/11
 * Time: 1:58
 */
require_once "SqlHelp.class.php";
require_once "Equip_tb.class.php";

class Equip_tb_serv{
    //添加设备
    function addEquip($equip_id,$equip_name,$equip_model,$equip_lab_id,$equip_img,$equip_price,$equip_manu,$equip_manuNo,$equip_manuTime,$equip_chaseTime,$equip_status,$equip_desc){
        $sqlHelp=new SqlHelp();
        $sql="insert into equip_tb (equip_id,equip_name,equip_model,equip_lab_id,equip_img,equip_price,equip_manu,equip_manuNo,equip_manuTime,equip_chaseTime,equip_status,equip_desc) VALUES ('$equip_id','$equip_name','$equip_model','$equip_lab_id','$equip_img','$equip_price','$equip_manu','$equip_manuNo','$equip_manuTime','$equip_chaseTime','$equip_status','$equip_desc')";

        $res=$sqlHelp->execute_dml($sql);
        $sqlHelp->close_connect();
//        return false;
        return $res;
    }

    //根据equip_id删除设备信息表
    function delEquipById($equip_id){
        $sqlHelp=new SqlHelp();
        $sql="delete from equip_tb WHERE equip_id='$equip_id'";
        $res=$sqlHelp->execute_dml($sql);
        $sqlHelp->close_connect();
        return $res;
    }

    //根据equip_id获取实验室基本信息
    function getEquipById($equip_id){
        $sqlHelp=new SqlHelp();
        $sql="select * from equip_tb WHERE equip_id='$equip_id'";
        $res=$sqlHelp->execute_dql_quick($sql);

        $equip_tb=new Equip_tb();
        $equip_tb->setEquipId($res[0]['equip_id']);
        $equip_tb->setEquipName($res[0]['equip_name']);
        $equip_tb->setEquipModel($res[0]['equip_model']);
        $equip_tb->setEquipLabId($res[0]['equip_lab_id']);
        $equip_tb->setEquipImg($res[0]['equip_img']);
        $equip_tb->setEquipPrice($res[0]['equip_price']);
        $equip_tb->setEquipManu($res[0]['equip_manu']);
        $equip_tb->setEquipManuNo($res[0]['equip_manuNo']);
        $equip_tb->setEquipManuTime($res[0]['equip_manuTime']);
        $equip_tb->setEquipChaseTime($res[0]['equip_chaseTime']);
        $equip_tb->setEquipDesc($res[0]['equip_desc']);
        $equip_tb->setEquipStatus($res[0]['equip_status']);

        $sqlHelp->close_connect();
        return $equip_tb;
    }

    //获取实验室信息显示
    function getEquipList(){
        $sqlHelp=new SqlHelp();
        $sql="select * from equip_tb";
        $res=$sqlHelp->execute_dql_quick($sql);
        $sqlHelp->close_connect();
        return $res;
    }


    //根据设备所属实验室equip_lab_id查询实验室所有设备
    function getEquipListByEquipLabId($lab_id){
        $sqlHelp=new SqlHelp();
        $sql="select * from equip_tb Where equip_lab_id='$lab_id'";
        $res=$sqlHelp->execute_dql_quick($sql);
        $sqlHelp->close_connect();
        return $res;
    }
}