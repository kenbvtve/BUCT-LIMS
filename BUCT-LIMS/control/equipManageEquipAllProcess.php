<?php
/**
 * Created by PhpStorm.
 * User: lo_ong
 **/
require_once "../model/Equip_tb_serv.class.php";
session_start(300);
$equip_tb_serv=new Equip_tb_serv();

if (isset($_GET['flag'])){
    switch ($_GET['flag']){
        case 1://删除
            $res=$equip_tb_serv->delEquipById($_GET['equip_id']);
            if ($res==1){
                $_SESSION['equipManageEquipAllProcess_err']=1;
            }
            else{
                $_SESSION['equipManageEquipAllProcess_err']=2;
            }
            break;
    }
    header("Location:../docRoot/equipManageEquipAll.php");
    exit();
}
