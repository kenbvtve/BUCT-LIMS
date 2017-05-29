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
                $_SESSION['compManageCompEndProcess_err']=1;
            }
            else{
                $_SESSION['compManageCompEndProcess_err']=2;
            }
            break;
    }
    header("Location:../docRoot/compManageCompEnd.php");
    exit();
}
