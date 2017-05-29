<?php
/**
 * Created by PhpStorm.
 * User: lo_ong
 */
echo "<meta charset='utf-8'>";
session_start(300);
if (isset($_GET['type'])){
    if ($_GET['type']=="timetable"){
        if (!isset($_SESSION['login_userId'])){
            echo "<script>alert('您还未登录，没有权限查询课表，现在去登录！');parent.location.href='../doc/loginOrSign.php';</script>";
            exit();
        }
        else{
            header("Location:");
            exit();
        }
    }
    if ($_GET['type']=="reserve"){
        if (!isset($_SESSION['login_userId'])){
            echo "<script>alert('您还未登录，没有权限预约，现在去登录！');parent.location.href='../doc/loginOrSign.php';</script>";
            exit();
        }
        else{
            header("Location:");
            exit();
        }
    }
    if ($_GET['type']=="compjoin") {
        if (!isset($_SESSION['login_userId'])) {
            echo "<script>alert('您还未登录，没有权限预约，现在去登录！');parent.location.href='../doc/loginOrSign.php';</script>";
            exit();
        } else if ($_SESSION['login_userType'] == 3) {
            header("Location:../doc/contestRegJoin.php?comp_id={$_GET['comp_id']}");
            exit();
        } else{
            header("Location:../doc/index.php");
            exit();
        }
    }
}
