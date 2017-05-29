<?php
/**
 * Created by PhpStorm.
 * User: lo_ong
 **/
require_once "../model/Comp_tb_serv.class.php";
require_once "../model/Compjoin_tb_serv.class.php";
session_start(300);
$compjoin_tb_serv=new Compjoin_tb_serv();

if (isset($_GET['flag'])){
    switch ($_GET['flag']){
        case 1://拒绝
            $res=$compjoin_tb_serv->updateCompjoinStatusByCompjoinId($_GET['compjoin_id'],'已拒绝');
            if ($res==1){
                $_SESSION['compManageCompExamProcess_err']=1;
            }
            else{
                $_SESSION['compManageCompExamProcess_err']=2;
            }
            break;
        case 2://同意
            $res=$compjoin_tb_serv->updateCompjoinStatusByCompjoinId($_GET['compjoin_id'],'已通过');
            if ($res==1){
                $_SESSION['compManageCompExamProcess_err']=3;
            }
            else{
                $_SESSION['compManageCompExamProcess_err']=4;
            }
            break;
    }
    header("Location:../docRoot/compManageCompExam.php");
    exit();
}
