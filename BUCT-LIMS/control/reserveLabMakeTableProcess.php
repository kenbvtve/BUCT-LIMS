<?php
/**
 * Created by PhpStorm.
 * User: lo_ong*/
echo "<meta charset='utf-8'>";
require_once "../model/Labreserve_tb_serv.class.php";

$labreserve_lab_id=$_POST['reserveLabMakeTable_labId'];
$labreserve_date=$_POST['reserveLabMakeTable_date'];
$labreserve_time=$_POST['reserveLabMakeTable_time'];
$labreserve_perName=$_POST['reserveLabMakeTable_perName'];
$labreserve_perId=$_POST['reserveLabMakeTable_perId'];
$labreserve_perPhone=$_POST['reserveLabMakeTable_perPhone'];
$labreserve_perMail=$_POST['reserveLabMakeTable_perMail'];
$labreserve_reason=$_POST['reserveLabMakeTable_reason'];
$labreserve_equip=$_POST['reserveLabMakeTable_equip'];




//检测当前时段当前实验室是否预约
$labreserve_tb_serv=new Labreserve_tb_serv();
$resCheck=$labreserve_tb_serv->checkLabIsReservdByLabIdAndDateAndTime($labreserve_lab_id,$labreserve_date,$labreserve_time);
if (!empty($resCheck[0]['labreserve_id'])){
    echo "<script type='text/javascript'>alert('当前实验室当前时间已被预约！');parent.location.href='../doc/reserveLab.php';</script>";
    exit();
}

$resAdd=$labreserve_tb_serv->addLabreserve($labreserve_lab_id,$labreserve_date,$labreserve_time,$labreserve_perName,$labreserve_perId,$labreserve_perPhone,$labreserve_perMail,$labreserve_reason,$labreserve_equip);

if ($resAdd==1){
    echo "<script type='text/javascript'>alert('预约成功,等待审核！');parent.location.href='../doc/reserveLab.php';</script>";
    exit();
}else{
    echo "<script type='text/javascript'>alert('发生未知错误，添加失败！');parent.location.href='../doc/reserveLab.php';</script>";
    exit();
}



