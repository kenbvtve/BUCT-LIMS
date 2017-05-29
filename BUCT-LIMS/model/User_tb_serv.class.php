<?php
/**
 * Created by PhpStorm.
 * User: lo_ong
 * Date: 2017/5/6
 * Time: 15:07
 */
echo "<meta charset='UTF-8'>";
require_once "SqlHelp.class.php";
require_once "User_tb.class.php";

//该类是业务逻辑处理类，主要完成对user_tb表的业务逻辑操作
class User_tb_serv{
    //登录
    function login_check($user_id,$user_password){
        $sql="select user_type,user_name,user_password,user_status,user_login_status from user_tb where user_id=$user_id";
        $sqlHelp=new SqlHelp();
        $res=$sqlHelp->execute_dql($sql);
        if($row=$res->fetch_assoc()){
            if($user_password==$row['user_password']){
                return array($row['user_type'],$row['user_name'],$row['user_status'],$row['user_login_status']);
//                echo "用户类型：".$row['user_type']."<br>"."用户名：".$row['user_name']."<br>"."用户类型：".$row['user_status']."<br>"."用户登录状态：".$row['user_login_status'];
            }
        }
        //释放资源,关闭连接
        $res->free_result();
        $sqlHelp->close_connect();
        return "";
    }

    //登陆成功后或下线后修改user_login_status状态
    function updateUserLoginStatusById($user_id,$user_login_status){
        $sqlHelp=new SqlHelp();
        $sql="update user_tb set user_login_status='$user_login_status' WHERE user_id='$user_id'";
        $res=$sqlHelp->execute_dml($sql);
        $sqlHelp->close_connect();
        return $res;
    }

    //更改所有用户user_login_status状态
    function updateUserLoginStatusUserAll($user_login_status){
        $sqlHelp=new SqlHelp();
        $sql="update user_tb set user_login_status='$user_login_status'";
        $res=$sqlHelp->execute_dml($sql);
        $sqlHelp->close_connect();
        return $res;
    }

    //根据user_id更改用户类型user_type
    function updateUserTypeById($user_id,$user_type){
        $sqlHelp=new SqlHelp();
        $sql="update user_tb set user_type='$user_type' WHERE user_id='$user_id'";
        $res=$sqlHelp->execute_dml($sql);
        $sqlHelp->close_connect();
        return $res;
    }

    //注册
    function sign_check($user_id,$user_type,$user_name,$user_college,$user_phone,$user_mail){
        $sql="insert into user_tb (user_id,user_type,user_name,user_college,user_phone,user_mail) VALUES ('$user_id','$user_type','$user_name','$user_college','$user_phone','$user_mail')";
        $sqlHelp=new SqlHelp();
        $res=$sqlHelp->execute_dml($sql);
        $sqlHelp->close_connect();
        return $res;
    }

    //修改密码
    function updatePasswordById($user_id,$user_password){
        $sqlHelp=new SqlHelp();
        $sql="update user_tb set user_password=$user_password WHERE user_id=$user_id";
        $res=$sqlHelp->execute_dml($sql);
        $sqlHelp->close_connect();
        return $res;
    }

    //根据用户user_id删除用户
    function delUserById($user_id){
        $sqlHelp=new SqlHelp();
        $sql="delete from user_tb WHERE user_is='$user_id'";
        $res=$sqlHelp->execute_dml($sql);
        $sqlHelp->close_connect();
        return $res;
    }

    //获取注册待审核人员或已审核通过表(123)
    function getUserListWaitExamByUserStatus($user_status){
        $sqlHelp=new SqlHelp();
        $sql="select * from user_tb WHERE user_status='$user_status'";
        $res=$sqlHelp->execute_dql_quick($sql);
        $sqlHelp->close_connect();
        return $res;
    }

    //审核注册用户，改变user_status状态
    function updateUserStatusByID($user_id,$user_status){
        $sqlHelp=new SqlHelp();
        $sql="update user_tb set user_status='$user_status' WHERE user_id='$user_id'";
        $res=$sqlHelp->execute_dml($sql);
        $sqlHelp->close_connect();
        return $res;
    }

    //根据user_id修改用户信息
    function updateUserInfoByUserId($user_id,$user_name,$user_phone,$user_mail){
        $sqlHelp=new SqlHelp();
        $sql="update user_tb set user_name='$user_name',user_phone='$user_phone',user_mail='$user_mail' WHERE user_id='$user_id'";
        $res=$sqlHelp->execute_dml($sql);
        $sqlHelp->close_connect();
        return $res;
    }

    //获取所有用户信息
    function getUserListUserAll(){
        $sqlHelp=new SqlHelp();
        $sql="select * from user_tb";
        $res=$sqlHelp->execute_dql_quick($sql);
        $sqlHelp->close_connect();
        return $res;
    }
    //根据用户类型获取用户信息
    function getUserListByType($user_type){
        $sqlHelp=new SqlHelp();
        $sql="select * from user_tb WHERE user_type='$user_type'";
        $res=$sqlHelp->execute_dql_quick($sql);
        $sqlHelp->close_connect();
        return $res;
    }

    //获取当前在线用户信息
    function getUserListByLoginStatus($user_login_status){
        $sqlHelp=new SqlHelp();
        $sql="select * from user_tb WHERE user_login_status='$user_login_status'";
        $res=$sqlHelp->execute_dql_quick($sql);
        $sqlHelp->close_connect();
        return $res;
    }

    //根据用户user_id获取用户信息
    function getUserInfoById($user_id){
        $sqlHelp=new SqlHelp();
        $sql="select * from user_tb WHERE user_id='$user_id'";
        $res=$sqlHelp->execute_dql_quick($sql);

        $user_tb=new User_tb();
        $user_tb->setUserId($res[0]['user_id']);
        $user_tb->setUserType($res[0]['user_type']);
        $user_tb->setUserName($res[0]['user_name']);
        $user_tb->setUserCollege($res[0]['user_college']);
        $user_tb->setUserPhone($res[0]['user_phone']);
        $user_tb->setUserMail($res[0]['user_mail']);
        $user_tb->setUserPassword($res[0]['user_password']);
        $user_tb->setUserStatus($res[0]['user_status']);
        $user_tb->setUserLoginStatus($res[0]['user_login_status']);

        $sqlHelp->close_connect();
        return $user_tb;
    }
}



