<?php
/**
 * Created by PhpStorm.
 * User: lo_ong
 * Date: 2017/5/10
 * Time: 13:25
 */

require_once "Notice_tb.class.php";
require_once "SqlHelp.class.php";

class Notice_tb_serv{
    //添加公告
    public function addNotice($notice_title,$notice_content){
        $sql="insert into notice_tb (notice_title,notice_content) VALUES ('$notice_title','$notice_content')";
        $sqlHelp=new SqlHelp();
        $res=$sqlHelp->execute_dml($sql);
        $sqlHelp->close_connect();
        return $res;
    }

    //删除公告
    function delNoticeById($notice_id){
        $sqlHelp=new SqlHelp();
        $sql="delete from notice_tb WHERE notice_id=$notice_id";
        $res=$sqlHelp->execute_dml($sql);
        $sqlHelp->close_connect();
        return $res;
    }

    //根据notice_id获取通知详情
    function getNoticeInfoById($notice_id){
        $sqlHelp=new SqlHelp();
        $sql="select * from notice_tb WHERE notice_id=$notice_id";
        $res=$sqlHelp->execute_dql_quick($sql);

        $notice_tb=new Notice_tb();
        $notice_tb->setNoticeId($res[0]['notice_id']);
        $notice_tb->setNoticeTitle($res[0]['notice_title']);
        $notice_tb->setNoticeContent($res[0]['notice_content']);
        $notice_tb->setNoticeTime($res[0]['notice_time']);

        $sqlHelp->close_connect();
        return $notice_tb;
    }

    //获取页数
    function getPageCount($pageSize){
        $sql="select count(notice_id) from notice_tb";
        $sqlHelp=new SqlHelp();
        $res=$sqlHelp->execute_dql($sql);
        //计算pagecount
        if ($row=$res->fetch_row()){
            $pageCount=ceil($row['0']/$pageSize);
            $sqlHelp->close_connect();
            return $pageCount;
        }
    }

    //实现分页显示
    function getPageList($pageNow,$pageSize){
        $pageStart=($pageNow-1)*$pageSize;
        $sql="select * from notice_tb ORDER BY notice_id DESC limit $pageStart,$pageSize";
        $sqlHelp=new SqlHelp();
        $res=$sqlHelp->execute_dql_quick($sql);
        $sqlHelp->close_connect();
        return $res;
    }

    //首页用，获取最新公告
    function  getMostRecentNotice(){
        $sqlHelp=new SqlHelp();
        $sql="select * from notice_tb order by notice_id desc limit 1";
        $res=$sqlHelp->execute_dql_quick($sql);

        $notice_tb=new Notice_tb();
        $notice_tb->setNoticeId($res[0]['notice_id']);
        $notice_tb->setNoticeTitle($res[0]['notice_title']);
        $notice_tb->setNoticeContent($res[0]['notice_content']);
        $notice_tb->setNoticeTime($res[0]['notice_time']);

        $sqlHelp->close_connect();
        return $notice_tb;
    }
    //获取所有公告信息
    function  getNoticeListAll(){
        $sqlHelp=new SqlHelp();
        $sql="select * from notice_tb ORDER BY notice_id DESC";
        $res=$sqlHelp->execute_dql_quick($sql);
        $sqlHelp->close_connect();
        return $res;
    }
}






















