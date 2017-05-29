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
        case 1://将用户强制下线
            $res=$user_tb_serv->updateUserLoginStatusById($_GET['user_id'],0);
            if ($res==1){
                $_SESSION['userManageUserLoginStatusYesProcess_err']=1;
            }
            else{
                $_SESSION['userManageUserLoginStatusYesProcess_err']=2;
            }
            break;
        case 2://强制所有用户下线
            $res=$user_tb_serv->updateUserLoginStatusUserAll(0);
            if ($res==1){
                $_SESSION['userManageUserLoginStatusYesProcess_err']=3;
            }
            else{
                $_SESSION['userManageUserLoginStatusYesProcess_err']=4;
            }
            break;
    }
    header("Location:../docRoot/userManageUserLoginStatusYes.php");
    exit();
}
