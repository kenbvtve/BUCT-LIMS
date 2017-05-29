<?php
/**
 * Created by PhpStorm.
 * User: lo_ong
 */
echo "<meta charset='utf-8'>";
require_once "../model/Equipreserve_tb_serv.class.php";

$equipreserve_date=$_POST['reserveEquip_date'];
$equipreserve_time=$_POST['reserveEquip_time'];
$equipreserve_perName=$_POST['reserveEquip_perName'];
$equipreserve_perId=$_POST['reserveEquip_perId'];
$equipreserve_perPhone=$_POST['reserveEquip_perPhone'];
$equipreserve_perMail=$_POST['reserveEquip_perMail'];
$equipreserve_equip=$_POST['reserveEquip_equip'];
$equipreserve_reason=$_POST['reserveEquip_reason'];



$equipreserve_tb_serv=new Equipreserve_tb_serv();
$resAdd=$equipreserve_tb_serv->addEquipReserve($equipreserve_perName,$equipreserve_perId,$equipreserve_perPhone,$equipreserve_perMail,$equipreserve_date,$equipreserve_time,$equipreserve_equip,$equipreserve_reason);
echo "123";
if ($resAdd==1){
    echo "<script type='text/javascript'>alert('预约成功,等待审核！');parent.location.href='../doc/reserveEquip.php';</script>";
    exit();
}else{
    echo "<script type='text/javascript'>alert('发生未知错误，添加失败！');parent.location.href='../doc/reserveEquip.php';</script>";
    exit();
}








