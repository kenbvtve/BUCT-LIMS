<?php
/**
 * Created by PhpStorm.
 * User: lo_ong
 **/
require_once "../model/Feedback_tb_serv.class.php";
session_start(300);
$feedback_tb_serv=new Feedback_tb_serv();

if (isset($_GET['flag'])){
    switch ($_GET['flag']){
        case 1://全部删除
            $res=$feedback_tb_serv->delFeedbackAll();
            if ($res==1){
                $_SESSION['aboutUsFeedbackList_err']=1;
            }
            else{
                $_SESSION['aboutUsFeedbackList_err']=2;
            }
            break;
        case 2://根据id删除
            $res=$feedback_tb_serv->delFeedbackInfoByFeedbackId($_GET['feedback_id']);
            if ($res==1){
                $_SESSION['aboutUsFeedbackList_err']=3;
            }
            else{
                $_SESSION['aboutUsFeedbackList_err']=4;
            }
            break;
    }
}
header("Location:../docRoot/aboutUsFeedbackList.php");
exit();
