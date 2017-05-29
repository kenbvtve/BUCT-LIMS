<?php
/**
 * Created by PhpStorm.
 * User: lo_ong
 * Date: 2017/5/9
 * Time: 16:08
 */
require_once "../model/SqlHelp.class.php";
require_once "../model/Feedback_tb.class.php";

class Feedback_tb_serv{
    //进行反馈，提交反馈信息
    function addFeedbackInfo($feedback_name,$feedback_perid,$feedback_phone,$feedback_mail,$feedback_content){
        $sql="insert into feedback_tb (feedback_time,feedback_name,feedback_perid,feedback_phone,feedback_mail,feedback_content) VALUES (curdate(),'$feedback_name','$feedback_perid','$feedback_phone','$feedback_mail','$feedback_content')";
        $sqlHelp=new SqlHelp();
        $res=$sqlHelp->execute_dml($sql);
        $sqlHelp->close_connect();
        return $res;
    }

    //删除所有信息
    function delFeedbackAll(){
        $sqlHelp=new SqlHelp();
        $sql="delete from feedback_tb";
        $res=$sqlHelp->execute_dml($sql);
        $sqlHelp->close_connect();
        return $res;
    }

    //删除反馈信息
    function delFeedbackInfoByFeedbackId($feedback_id){
        $sqlHelp=new SqlHelp();
        $sql="delete from feedback_tb WHERE feedback_id=$feedback_id";
        $res=$sqlHelp->execute_dml($sql);
        $sqlHelp->close_connect();
        return $res;
    }

    //获取实验室信息显示
    function getFeedbackList(){
        $sqlHelp=new SqlHelp();
        $sql="select * from feedback_tb ORDER BY feedback_id DESC";
        $res=$sqlHelp->execute_dql_quick($sql);
        $sqlHelp->close_connect();
        return $res;
    }

    //根据用户id获取信息
    function getFeedbackListByUserId($feedback_perid){
        $sqlHelp=new SqlHelp();
        $sql="select * from feedback_tb WHERE feedback_perid='$feedback_perid'";
        $res=$sqlHelp->execute_dql_quick($sql);
        $sqlHelp->close_connect();
        return $res;
    }

    //根据feedback_id获取反馈信息详情
    function getFeedbackById($feedback_id){
        $sqlHelp=new SqlHelp();
        $sql="select * from feedback_tb WHERE feedback_id='$feedback_id'";
        $res=$sqlHelp->execute_dql_quick($sql);

        $feedback_tb=new Feedback_tb();
        $feedback_tb->setFeedbackId($res[0]['feedback_id']);
        $feedback_tb->setFeedbackTime($res[0]['feedback_time']);
        $feedback_tb->setFeedbackName($res[0]['feedback_name']);
        $feedback_tb->setFeedbackPerid($res[0]['feedback_perid']);
        $feedback_tb->setFeedbackPhone($res[0]['feedback_phone']);
        $feedback_tb->setFeedbackMail($res[0]['feedback_mail']);
        $feedback_tb->setFeedbackContent($res[0]['feedback_content']);

        $sqlHelp->close_connect();
        return $feedback_tb;
    }
}





