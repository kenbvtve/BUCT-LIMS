<?php
/**
 * Created by PhpStorm.
 * User: lo_ong
 * Date: 2017/5/6
 * Time: 16:28
 **/
require_once "../model/User_tb_serv.class.php";

session_start();
//$checkCode=$_SESSION['checkCode'];
//echo $checkCode;

$user_id=$_POST['sign_user_id'];
$user_type=$_POST['sign_user_type'];
$user_name=$_POST['sign_user_name'];
$user_college=$_POST['sign_user_college'];
$user_phone=$_POST['sign_user_phone'];
$user_mail=$_POST['sign_user_mail'];
$user_password=$_POST['sign_user_password'];
$checkCode=$_POST['sign_checkCode'];

if($checkCode!=$_SESSION['checkCode']){
    $_SESSION['sign_err']=1;//验证码错误
    header("Location:../doc/loginOrSign.php");
    exit();
}else{
    //判断当前user_id是否已存在
    $user_tb_serv=new User_tb_serv();
    $list=$user_tb_serv->login_check($user_id,$user_password);
    if($list!=""){
        $_SESSION['sign_err']=2;//当前用户学号、工号已存在
        header("Location:../doc/loginOrSign.php");
        exit();
    }

    $user_tb_serv=new User_tb_serv();
    $linkInsert=$user_tb_serv->sign_check($user_id,$user_type,$user_name,$user_college,$user_phone,$user_mail);
    $linkUpdate=$user_tb_serv->updatePasswordById($user_id,$user_password);

    if($linkInsert==1&&$linkUpdate==1){
        $_SESSION['sign_err']=3;//注册成功，等待审核
        header("Location:../doc/loginOrSign.php");
        exit();
    }
    else {
        $_SESSION['sign_err']=4;//注册失败
        header("Location:../doc/loginOrSign.php");
        exit();
    }
}