<?php
/**
 * Created by PhpStorm.
 * User: lo_ong
 * Date: 2017/5/11
 * Time: 15:51
 */

require_once "../model/User_tb_serv.class.php";

session_start();
unset($_SESSION['login_userId']);
unset($_SESSION['login_userpassword']);
unset($_SESSION['login_userName']);
unset($_SESSION['login_userType']);
unset($_SESSION['login_userLoginStatus']);

//改变user_login_status的状态
if (!empty($_GET['exit_user_id'])){
    $user_tb_serv=new User_tb_serv();
    $resExit=$user_tb_serv->updateUserLoginStatusById($_GET['exit_user_id'],0);
    if ($resExit==1){
        $_SESSION['resExit']=1;
        header("Location:../doc/loginOrSign.php");
        exit();
    }
}