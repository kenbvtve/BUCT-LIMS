<?php
/**
 * Created by PhpStorm.
 * User: lo_ong
 **/
require_once "../model/Comp_tb_serv.class.php";
session_start(300);
$comp_tb_serv=new Comp_tb_serv();

if (isset($_GET['flag'])){
    switch ($_GET['flag']){
        case 1://删除竞赛
            $res=$comp_tb_serv->delCompById($_GET['comp_id']);
            if ($res==1){
                $_SESSION['compManageCompProcessProcess_err']=1;
            }
            else{
                $_SESSION['compManageCompProcessProcess_err']=2;
            }
            break;
        case 2://更改比赛进行状态
            $res=$comp_tb_serv->updateCompStatusByCompId($_GET['comp_id'],3);
            if ($res==1){
                $_SESSION['compManageCompProcessProcess_err']=3;
            }
            else{
                $_SESSION['compManageCompProcessProcess_err']=4;
            }
            break;
    }
    header("Location:../docRoot/compManageCompProcess.php");
    exit();
}
