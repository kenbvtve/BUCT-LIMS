<?php
/**
 * Created by PhpStorm.
 * User: lo_ong
 **/
echo "<meta charset='UTF-8'>";

require_once "../model/Lab_tb_serv.class.php";
session_start(300);
$lab_tb_serv=new Lab_tb_serv();


if (isset($_GET['flag'])){
    switch ($_GET['flag']){
        case 1://删除
            $res=$lab_tb_serv->delLabById($_GET['lab_id']);
            if ($res==1){
                $_SESSION['labManageLabAllProcess_err']=1;
            }
            else{
                $_SESSION['labManageLabAllProcess_err']=2;
            }
            break;
        case 2://启用或停用
            echo $_GET['lab_status'];
            if ($_GET['lab_status']=="停用"){
                $res=$lab_tb_serv->updateLabStatusByLabId($_GET['lab_id'],'正常');
                if ($res==1){
                    $_SESSION['labManageLabAllProcess_err']=3;
                }
                else{
                    $_SESSION['labManageLabAllProcess_err']=4;
                }
            }
            else{
                $res=$lab_tb_serv->updateLabStatusByLabId($_GET['lab_id'],'停用');
                if ($res==1){
                    $_SESSION['labManageLabAllProcess_err']=5;
                }
                else{
                    $_SESSION['labManageLabAllProcess_err']=6;
                }
            }

            break;
    }

    header("Location:../docRoot/labManageLabAll.php");
    exit();
}
