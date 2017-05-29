<?php
require_once "../model/User_tb_serv.class.php";
session_start(300);
$user_tb_serv=new User_tb_serv();

if (isset($_GET['flag'])){
    switch ($_GET['flag']){
        case 1://拒绝
            $res=$user_tb_serv->updateUserStatusByID($_GET['user_id'],3);
            if ($res==1){
                $_SESSION['userManageExamUserProcess_err']=1;
            }
            else{
                $_SESSION['userManageExamUserProcess_err']=2;
            }
            break;
        case 2://同意
            $res=$user_tb_serv->updateUserStatusByID($_GET['user_id'],1);
            if ($res==1){
                $_SESSION['userManageExamUserProcess_err']=3;
            }
            else{
                $_SESSION['userManageExamUserProcess_err']=4;
            }
            break;
    }
}
header("Location:../docRoot/userManageExam.php");
exit();
