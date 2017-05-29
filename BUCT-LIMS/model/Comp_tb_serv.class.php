<?php
/**
 * Created by PhpStorm.
 * User: lo_ong
 * Date: 2017/5/10
 * Time: 15:52
 */
echo "<meta charset='UTF-8'>";
require_once "SqlHelp.class.php";
require_once "Comp_tb.class.php";

class Comp_tb_serv{
    //添加竞赛
//    function addComp($comp_name,$comp_type,$comp_sponsor,$comp_numper,$comp_info,$comp_depart,$comp_end,$comp_file){
//        $sqlHelp=new SqlHelp();
//        $sql="insert into comp_tb (comp_id,comp_name,comp_type,comp_sponsor,comp_numper,comp_info,comp_depart,comp_end,comp_file) VALUES (unix_timestamp(now()),'$comp_name','$comp_type','$comp_sponsor','$comp_numper','$comp_info','$comp_depart','$comp_end','$comp_file')";
//        $res=$sqlHelp->execute_dml($sql);
//        $sqlHelp->close_connect();
//        return $res;
//    }

    function addComp($comp_name, $comp_type, $comp_sponsor, $comp_numper, $comp_info, $comp_depart, $comp_end, $comp_file){
        $sqlHelp=new SqlHelp();
        $sql="insert into comp_tb (comp_id,comp_name,comp_type,comp_sponsor,comp_numper,comp_info,comp_depart, comp_end,comp_file) VALUES (unix_timestamp(now()),'$comp_name','$comp_type','$comp_sponsor','$comp_numper','$comp_info','$comp_depart', '$comp_end','$comp_file')";
//        echo $sql;
        $res=$sqlHelp->execute_dml($sql);
        $sqlHelp->close_connect();
        return $res;
    }

    //删除竞赛
    function delCompById($comp_id){
        $sqlHelp=new SqlHelp();
        $sql="delete from comp_tb WHERE comp_id=$comp_id";
        $res=$sqlHelp->execute_dml($sql);
        $sqlHelp->close_connect();
        return $res;
    }

    //根据竞赛类型（报名中，比赛中，已结束）获取比赛显示
    function getCompList($comp_status){
        $sqlHelp=new SqlHelp();
        $sql="select * from comp_tb WHERE comp_status=$comp_status";
        $res=$sqlHelp->execute_dql_quick($sql);
        $sqlHelp->close_connect();
        return $res;
    }

    //根据comp_id获取竞赛详细信息
    function getCompById($comp_id){
        $sqlHelp=new SqlHelp();
        $sql="select * from comp_tb WHERE comp_id=$comp_id";
        $res=$sqlHelp->execute_dql_quick($sql);

        $comp_tb=new Comp_tb();
        $comp_tb->setCompId($res[0]['comp_id']);
        $comp_tb->setCompName($res[0]['comp_name']);
        $comp_tb->setCompType($res[0]['comp_type']);
        $comp_tb->setCompSponsor($res[0]['comp_sponsor']);
        $comp_tb->setCompNumper($res[0]['comp_numper']);
        $comp_tb->setCompInfo($res[0]['comp_info']);
        $comp_tb->setCompDepart($res[0]['comp_depart']);
        $comp_tb->setCompStart($res[0]['comp_start']);
        $comp_tb->setCompEnd($res[0]['comp_end']);
        $comp_tb->setCompFile($res[0]['comp_file']);
        $comp_tb->setCompStatus($res[0]['comp_status']);

        $sqlHelp->close_connect();
        return $comp_tb;
    }

    //根据comp_id获取comp_status
    function getCompStatusByCompId($comp_id){
        $sqlHelp=new SqlHelp();
        $sql="select comp_status from comp_tb WHERE comp_id='$comp_id'";
        $res=$sqlHelp->execute_dql_quick($sql);
        $sqlHelp->close_connect();
        return $res;
    }

    //根据comp_id获取comp_name
    function getCompNameByCompId($comp_id){
        $sqlHelp=new SqlHelp();
        $sql="select comp_name from comp_tb WHERE comp_id='$comp_id'";
        $res=$sqlHelp->execute_dql_quick($sql);
        $sqlHelp->close_connect();
        return $res;
    }

    //更改比赛进行状态
    function updateCompStatusByCompId($comp_id,$comp_status){
        $sqlHelp=new SqlHelp();
        $sql="update comp_tb set comp_status='$comp_status' WHERE comp_id='$comp_id'";
        $res=$sqlHelp->execute_dml($sql);
        $sqlHelp->close_connect();
        return $res;
    }


    //设置首页展示
    function getCompListForIndex(){
        $sqlHelp=new SqlHelp();
        $sql="select * from comp_tb WHERE comp_status='1' ORDER BY comp_id DESC limit 0,7";
        $res=$sqlHelp->execute_dql_quick($sql);
        $sqlHelp->close_connect();
        return $res;
    }

    //获取路径
    function getCompfileByCompId($comp_id){
        $sqlHelp=new SqlHelp();
        $sql="select * from comp_tb WHERE comp_id='$comp_id'";
        $res=$sqlHelp->execute_dql_quick($sql);
        $sqlHelp->close_connect();
        return $res;
    }

}