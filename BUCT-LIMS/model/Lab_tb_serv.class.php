<?php
/**
 * Created by PhpStorm.
 * User: lo_ong
 * Date: 2017/5/10
 * Time: 23:59
 */
require_once "SqlHelp.class.php";
require_once "Lab_tb.class.php";

class Lab_tb_serv{
    //添加实验室信息
    function addLab($lab_id,$lab_name,$lab_grade,$lab_college,$lab_zone,$lab_desc,$lab_status,$lab_img){
        $sqlHelp=new SqlHelp();
        $sql="insert into lab_tb (lab_id,lab_name,lab_grade,lab_college,lab_zone,lab_desc,lab_status,lab_img) VALUES ('$lab_id','$lab_name','$lab_grade','$lab_college','$lab_zone','$lab_desc','$lab_status','$lab_img')";
        $res=$sqlHelp->execute_dml($sql);
        $sqlHelp->close_connect();
        return $res;
    }

    //根据lab_id删除实验室信息
    function delLabById($lab_id){
        $sqlHelp=new SqlHelp();
        $sql="delete from lab_tb WHERE lab_id='$lab_id'";
        $res=$sqlHelp->execute_dml($sql);
        $sqlHelp->close_connect();
        return $res;
    }

    //根据lab_id获取实验室基本信息
    function getLabById($lab_id){
        $sqlHelp=new SqlHelp();
        $sql="select * from lab_tb WHERE lab_id='$lab_id'";
        $res=$sqlHelp->execute_dql_quick($sql);

        $lab_tb=new Lab_tb();
        $lab_tb->setLabId($res[0]['lab_id']);
        $lab_tb->setLabName($res[0]['lab_name']);
        $lab_tb->setLabGrade($res[0]['lab_grade']);
        $lab_tb->setLabCollege($res[0]['lab_college']);
        $lab_tb->setLabZone($res[0]['lab_zone']);
        $lab_tb->setLabImg($res[0]['lab_img']);
        $lab_tb->setLabDesc($res[0]['lab_desc']);
        $lab_tb->setLabStatus($res[0]['lab_status']);

        $sqlHelp->close_connect();
        return $lab_tb;
    }

    //获取实验室信息显示
    function getLabList(){
        $sqlHelp=new SqlHelp();
        $sql="select * from lab_tb";
        $res=$sqlHelp->execute_dql_quick($sql);
        $sqlHelp->close_connect();
        return $res;
    }

    //根据lab_id获取实验室名称
    function getLabNameByLabId($lab_id){
        $sqlHelp=new SqlHelp();
        $sql="select * from lab_tb WHERE lab_id='$lab_id'";
        $res=$sqlHelp->execute_dql_quick($sql);
        $sqlHelp->close_connect();
        return $res;
    }

    //改变实验室lab_status
    function updateLabStatusByLabId($lab_id,$lab_status){
        $sqlHelp=new SqlHelp();
        $sql="update lab_tb set lab_status='$lab_status' WHERE lab_id='$lab_id'";
        $res=$sqlHelp->execute_dml($sql);
        $sqlHelp->close_connect();
        return $res;
    }


}