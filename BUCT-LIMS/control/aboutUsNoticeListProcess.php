<?php
/**
 * Created by PhpStorm.
 * User: lo_ong
 */

require_once "../model/Notice_tb_serv.class.php";
session_start(300);
$notice_tb_serv=new Notice_tb_serv();

if (isset($_GET['flag'])){
    if ($_GET['flag']==1){
        $res=$notice_tb_serv->delNoticeById($_GET['notice_id']);
        if ($res==1){
            $_SESSION['aboutUsNoticeList_err']=1;
        }
        else{
            $_SESSION['aboutUsNoticeList_err']=2;
        }
        header("Location:../docRoot/aboutUsNoticeList.php");
        exit();
    }
    if ($_GET['flag']==2){
        $res=$notice_tb_serv->addNotice($_POST['aboutUsNoticeAdd_title'],$_POST['aboutUsNoticeAdd_content']);
        if ($res==1){
            $_SESSION['aboutUsNoticeAdd_err']=1;
        }
        else{
            $_SESSION['aboutUsNoticeAdd_err']=2;
        }
        header("Location:../docRoot/aboutUsNoticeAdd.php");
        exit();
    }
}