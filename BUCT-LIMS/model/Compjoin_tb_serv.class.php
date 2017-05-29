<?php
/**
 * Created by PhpStorm.
 * User: lo_ong
 */
require_once "SqlHelp.class.php";
require_once "Compjoin_tb.class.php";

class Compjoin_tb_serv{
    //提交竞赛报名表
    function addCompjoinToTb($comp_id,$compjoin_name,$compjoin_leaderName,$compjoin_leaderId,$compjoin_leaderPhone,$compjoin_leaderMail,$compjoin_memberName_1,$compjoin_memberName_2,$compjoin_memberName_3,$compjoin_memberName_4,$compjoin_memberId_1,$compjoin_memberId_2,$compjoin_memberId_3,$compjoin_memberId_4,$compjoin_teaName,$compjoin_teaId,$compjoin_teaPhone,$compjoin_teaMail){
        $sqlHelp=new SqlHelp();
        $sql="insert into compjoin_tb (compjoin_id,comp_id,compjoin_name,compjoin_leaderName,compjoin_leaderId,compjoin_leaderPhone,compjoin_leaderMail,compjoin_memberName_1,compjoin_memberName_2,compjoin_memberName_3,compjoin_memberName_4,compjoin_memberId_1,compjoin_memberId_2,compjoin_memberId_3,compjoin_memberId_4,compjoin_teaName,compjoin_teaId,compjoin_teaPhone,compjoin_teaMail) VALUES (unix_timestamp(now()),'$comp_id','$compjoin_name','$compjoin_leaderName','$compjoin_leaderId','$compjoin_leaderPhone','$compjoin_leaderMail','$compjoin_memberName_1','$compjoin_memberName_2','$compjoin_memberName_3','$compjoin_memberName_4','$compjoin_memberId_1','$compjoin_memberId_2','$compjoin_memberId_3','$compjoin_memberId_4','$compjoin_teaName','$compjoin_teaId','$compjoin_teaPhone','$compjoin_teaMail')";
        $res=$sqlHelp->execute_dml($sql);
        $sqlHelp->close_connect();
        return $res;
    }

    //根据compjoin_id删除竞赛表
    function delCompjoinTbByCompjoinId($compjoin_id){
        $sqlHelp=new SqlHelp();
        $sql="delete from compjoin_tb WHERE compjoin_id='$compjoin_id'";
        $res=$sqlHelp->execute_dml($sql);
    }

    //根据compjoin_status获取不同的分类表
    function getCompjoinTbByCompjoinStatus($compjoin_status){
        $sqlHelp=new SqlHelp();
        $sql="select * from compjoin_tb WHERE compjoin_status='$compjoin_status'";
        $res=$sqlHelp->execute_dql_quick($sql);
        $sqlHelp->close_connect();
        return $res;

    }
    //审核竞赛报名表，改变compjoin_status状态
    function updateCompjoinStatusByCompjoinId($compjoin_id,$compjoin_status){
        $sqlHelp=new SqlHelp();
        $sql="update compjoin_tb set compjoin_status='$compjoin_status' WHERE compjoin_id='$compjoin_id'";
        $res=$sqlHelp->execute_dml($sql);
        $sqlHelp->close_connect();
        return $res;
    }

    //添加荣誉compjoin_glory
    function updateCompjoinGloryByCompjoinId($compjoin_id,$compjoin_glory){
        $sqlHelp=new SqlHelp();
        $sql="update compjoin_tb set compjoin_glory='$compjoin_glory' WHERE compjoin_id='$compjoin_id'";
        $res=$sqlHelp->execute_dml($sql);
        $sqlHelp->close_connect();
        return $res;
    }

    //根据comp_id获取报名表信息
    function getCompjoinTbByCompId($comp_id){
        $sqlHelp=new SqlHelp();
        $sql="select * from compjoin_tb WHERE comp_id='$comp_id'";
        $res=$sqlHelp->execute_dql_quick($sql);
        $sqlHelp->close_connect();
        return $res;
    }

    function getCompjoinTbByCompIdAndLeaderId($comp_id,$compjoin_leaderId){
        $sqlHelp=new SqlHelp();
        $sql="select * from compjoin_tb WHERE comp_id='$comp_id' AND compjoin_leaderId='$compjoin_leaderId'";
        $res=$sqlHelp->execute_dql_quick($sql);
        $sqlHelp->close_connect();
        return $res;
    }

    //根据leaderId获取竞赛表信息
    function getCompjoinTbListByLeaderId($compjoin_leaderId){
        $sqlHelp=new SqlHelp();
        $sql="select * from compjoin_tb WHERE compjoin_leaderId='$compjoin_leaderId'";
        $res=$sqlHelp->execute_dql_quick($sql);
        $sqlHelp->close_connect();
        return $res;
    }

    //根据教师id获取信息表
    function getCompjoinTbListByTeaId($compjoin_teaId){
        $sqlHelp=new SqlHelp();
        $sql="select * from compjoin_tb WHERE compjoin_teaId='$compjoin_teaId'";
        $res=$sqlHelp->execute_dql_quick($sql);
        $sqlHelp->close_connect();
        return $res;
    }

    //根据compjoin_id获取详细信息
    function getCompjoinTbInfoByCompjoinId($compjoin_id){
        $sqlHelp=new SqlHelp();
        $sql="select * from compjoin_tb WHERE compjoin_id='$compjoin_id'";
        $res=$sqlHelp->execute_dql_quick($sql);

        $compjoin_tb=new Compjoin_tb();
        $compjoin_tb->setCompjoinId($res[0]['compjoin_id']);
        $compjoin_tb->setCompId($res[0]['comp_id']);
        $compjoin_tb->setCompjoinName($res[0]['compjoin_name']);
        $compjoin_tb->setCompjoinLeaderName($res[0]['compjoin_leaderName']);
        $compjoin_tb->setCompjoinLeaderId($res[0]['compjoin_leaderId']);
        $compjoin_tb->setCompjoinLeaderPhone($res[0]['compjoin_leaderPhone']);
        $compjoin_tb->setCompjoinLeaderMail($res[0]['compjoin_leaderMail']);
        $compjoin_tb->setCompjoinMemberName1($res[0]['compjoin_memberName_1']);
        $compjoin_tb->setCompjoinMemberName2($res[0]['compjoin_memberName_2']);
        $compjoin_tb->setCompjoinMemberName3($res[0]['compjoin_memberName_3']);
        $compjoin_tb->setCompjoinMemberName4($res[0]['compjoin_memberName_4']);
        $compjoin_tb->setCompjoinMemberId1($res[0]['compjoin_memberId_1']);
        $compjoin_tb->setCompjoinMemberId2($res[0]['compjoin_memberId_2']);
        $compjoin_tb->setCompjoinMemberId3($res[0]['compjoin_memberId_3']);
        $compjoin_tb->setCompjoinMemberId4($res[0]['compjoin_memberId_4']);
        $compjoin_tb->setCompjoinTeaName($res[0]['compjoin_teaName']);
        $compjoin_tb->setCompjoinTeaId($res[0]['compjoin_teaId']);
        $compjoin_tb->setCompjoinTeaPhone($res[0]['compjoin_teaPhone']);
        $compjoin_tb->setCompjoinTeaMail($res[0]['compjoin_teaMail']);
        $compjoin_tb->setCompjoinGlory($res[0]['compjoin_glory']);
        $compjoin_tb->setCompjoinStatus($res[0]['compjoin_status']);

        $sqlHelp->close_connect();
        return $compjoin_tb;
    }
}

























