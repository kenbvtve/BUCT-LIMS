<?php
/**
 * Created by PhpStorm.
 * User: lo_ong
 */
echo "<meta charset='utf-8'>";
require_once "../model/User_tb_serv.class.php";
session_start(300);
if (!isset($_SESSION['login_userId'])){
    echo "<script>alert('非法用户，不具备操作权限！');parent.location.href='../doc/loginOrSign.php';</script>";
}

if (isset($_GET['type'])){
    if ($_GET['type']=="info"){
        $user_name=$_POST['loginingChangePersonInfo_name'];
        $user_phone=$_POST['loginingChangePersonInfo_phone'];
        $user_mail=$_POST['loginingChangePersonInfo_mail'];

        $user_tb_serv=new User_tb_serv();
        $res=$user_tb_serv->updateUserInfoByUserId($_SESSION['login_userId'],$user_name,$user_phone,$user_mail);

        if ($res==1){
            $_SESSION['login_userName']=$user_name;
            echo "<script>alert('操作成功，返回首页！');parent.location.href='../abolish/index.php';</script>";
            exit();
        }
        else{
            echo "<script>alert('发生未知错误，操作失败，返回重试！');parent.location.href='../doc/loginingChangePersonInfo.php';</script>";
            exit();
        }
    }
    if ($_GET['type']=="pw"){
        $user_password_old=$_POST['loginingChangePersonPw_older'];
        $user_password_new=$_POST['loginingChangePersonPw_new'];
        if ($user_password_old!=$_SESSION['login_userpassword']){
            echo "<script>alert('原密码 输入错误！');parent.location.href='../doc/loginingChangePersonPw.php';</script>";
            exit();
        }
        else{
            $user_tb_serv=new User_tb_serv();
            $resUpdatePw=$user_tb_serv->updatePasswordById($_SESSION['login_userId'],$user_password_new);
            if ($resUpdatePw==1){
                $resExit=$user_tb_serv->updateUserLoginStatusById($_SESSION['login_userId'],0);
                if ($resExit==1){
                    unset($_SESSION['login_userId']);
                    unset($_SESSION['login_userpassword']);
                    unset($_SESSION['login_userName']);
                    unset($_SESSION['login_userType']);
                    unset($_SESSION['login_userLoginStatus']);
                    echo "<script>alert('修改成功，重新登录！');parent.location.href='../doc/loginOrSign.php';</script>";
                }
            }
            else{
                echo "<script>alert('发生未知错误，修改失败，请重新尝试！');parent.location.href='../doc/loginingChangePersonPw.php';</script>";
            }
        }
    }
}














