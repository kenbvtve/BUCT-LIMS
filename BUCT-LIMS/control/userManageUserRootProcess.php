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
        case 1://降级为管理员
            $res=$user_tb_serv->updateUserTypeById($_GET['user_id'],2);
            if ($res==1){
                $_SESSION['userManageUserRoot_err']=1;
            }
            else{
                $_SESSION['userManageUserRoot_err']=2;
            }
            break;
    }
    header("Location:../docRoot/userManageUserRoot.php");
    exit();
}
