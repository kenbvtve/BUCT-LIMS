<?php
/**
 * Created by PhpStorm.
 * User: lo_ong
 * Date: 2017/5/5
 * Time: 21:32
 */
require_once "../model/User_tb_serv.class.php";

session_start(300);
$user_id=$_POST['login_user_id'];
$user_password=$_POST['login_user_password'];
$checkCode=$_POST['login_checkCode'];

//$temp1=$_SESSION['checkCode'];
//echo $temp1."<br/>";
//echo $checkCode;

//对验证码进行校验
if($checkCode!=$_SESSION['checkCode']){
    $_SESSION['login_err']=1;//验证码错误
    header("Location:../doc/loginOrSign.php");
    exit();
}else {
    $user_tb_serv=new User_tb_serv();
    $list=$user_tb_serv->login_check($user_id,$user_password);
    if($list!=""){
        //合法,检验user_status
        if ($list[2]==1) {//用户正常
            //检测用户是否在线：0表示不在线，1表示在线
            if ($list[3]==0){
                $resLoginStatus=$user_tb_serv->updateUserLoginStatusById($user_id,1);//更改用户在线状态为1
                if ($resLoginStatus==1){
                    //登录已成功，保存登录用户信息
                    $_SESSION['login_userId']=$user_id;
                    $_SESSION['login_userpassword']=$user_password;
                    $_SESSION['login_userName']=$list[1];
                    $_SESSION['login_userType']=$list[0];
                    $_SESSION['login_userLoginStatus']=$list[3];

                    header("Location:../doc/index.php");
                    exit();
                }
            }
            else{//用户已在线
                $_SESSION['login_err']=5;
                header("Location:../doc/exceptHandle_userLoginStatus.php");
                exit();
            }
        }elseif($list[2]==2){//审核中
            $_SESSION['login_err']=2;
            header("Location:../doc/loginOrSign.php");
            exit();
        }elseif($list[2]==3){//审核未通过
            $_SESSION['login_err']=3;
            header("Location:../doc/loginOrSign.php");
            exit();
        }
    }
    else{//用户不存在
        //非法
        $_SESSION['login_err']=4;
        header("Location:../doc/loginOrSign.php");
        exit();
    }
}

