<?php
require_once "../model/User_tb_serv.class.php";
session_start();

$user_id=$_POST['userManageAddUser_perid'];
$user_type=$_POST['userManageAddUser_type'];
$user_name=$_POST['userManageAddUser_name'];
$user_college=$_POST['userManageAddUser_college'];
$user_phone=$_POST['userManageAddUser_phone'];
$user_mail=$_POST['userManageAddUser_mail'];

$user_password=123456;
if((!isset($_SESSION['login_userType']))||($_SESSION['login_userType']!=1)){
    $_SESSION['userManageAddUser_err']=0;//当前用户学号、工号已存在
    header("Location:../docRoot/userManageAdd.php");
    exit();
}
$user_tb_serv=new User_tb_serv();
//检测user_id是否已存在
$list=$user_tb_serv->login_check($user_id,$user_password);
if($list!=""){
    $_SESSION['userManageAddUser_err']=1;//当前用户学号、工号已存在
    header("Location:../docRoot/userManageAdd.php");
    exit();
}

$user_tb_serv=new User_tb_serv();
$link=$user_tb_serv->sign_check($user_id,$user_type,$user_name,$user_college,$user_phone,$user_mail);

if($link==1){
    $_SESSION['userManageAddUser_err']=2;//注册成功，去审核
    header("Location:../docRoot/userManageAdd.php");
    exit();
}
else {
    $_SESSION['userManageAddUser_err']=3;//注册失败
    header("Location:../docRoot/userManageAdd.php");
    exit();
}

