<?php
/**
 * Created by PhpStorm.
 * User: lo_ong
 **/
require_once "../model/User_tb_serv.class.php";
session_start(300);
$user_tb_serv=new User_tb_serv();

if (isset($_GET['flag'])){
    switch ($_GET['flag']){
        case 1://删除用户
            $res=$user_tb_serv->delUserById($_GET['user_id']);
            if ($res==1){
                $_SESSION['userManageUserAllProcess_err']=1;
            }
            else{
                $_SESSION['userManageUserAllProcess_err']=2;
            }
            break;
        case 2://重置密码
            $res=$user_tb_serv->updatePasswordById($_GET['user_id'],123456);
            if ($res==1){
                $_SESSION['userManageUserAllProcess_err']=3;
            }
            else{
                $_SESSION['userManageUserAllProcess_err']=4;
            }
            break;
    }
    header("Location:../docRoot/userManageUserAll.php");
    exit();
}
