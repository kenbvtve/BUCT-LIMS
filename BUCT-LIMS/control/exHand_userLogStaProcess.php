<?php
/**
 * Created by PhpStorm.
 * User: lo_ong
 * Date: 2017/5/11
 * Time: 19:26
 */
require_once "../model/User_tb_serv.class.php";
session_start();

$user_id=$_POST['exceptHandle_loginUserId'];
$user_password=$_POST['exceptHandle_loginUserPassword'];
$checkCode=$_POST['exceptHandle_loginCheckCode'];


//对验证码进行校验
if($checkCode!=$_SESSION['checkCode']){
    $_SESSION['exceptHandle_userLoginStatus_err']=1;//验证码错误
    header("Location:../doc/exceptHandle_userLoginStatus.php");
    exit();
}
else {
    $user_tb_serv=new User_tb_serv();
    $list=$user_tb_serv->login_check($user_id,$user_password);
    if($list!=""){
        //合法,检验user_status
        if ($list[2]==1) {//用户正常
            if ($list[3]==1){//检测登录状态是否为1（已登录）
                $user_tb_serv->updateUserLoginStatusById($user_id,0);
                $_SESSION['exceptHandle_userLoginStatus_err']=2;
                header("Location:../doc/loginOrSign.php");
                exit();
            }
            else{
                $_SESSION['exceptHandle_userLoginStatus_err']=3;
                header("Location:../doc/loginOrSign.php");
                exit();
            }
        }
        elseif($list[2]==2){//审核中
            $_SESSION['exceptHandle_userLoginStatus_err']=4;
            header("Location:../doc/exceptHandle_userLoginStatus.php");
            exit();
        }elseif($list[2]==3){//审核未通过
            $_SESSION['exceptHandle_userLoginStatus_err']=5;
            header("Location:../doc/exceptHandle_userLoginStatus.php");
            exit();
        }
    }
    else{//用户不存在
        //非法
        $_SESSION['exceptHandle_userLoginStatus_err']=6;
        header("Location:../doc/exceptHandle_userLoginStatus.php");
        exit();
    }
}