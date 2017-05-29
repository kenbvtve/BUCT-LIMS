<?php
require_once "../model/Equipreserve_tb_serv.class.php";
session_start(300);
$equipreserve_tb_serv=new Equipreserve_tb_serv();
if (isset($_GET['flag'])){
    switch ($_GET['flag']){
        case 1://拒绝
            $res=$equipreserve_tb_serv->updateEquipreserveStatusByEquipreserveId($_GET['equipreserve_id'],3);
            if ($res==1){
                $_SESSION['equipManageExamequipReserve_err']=1;
            }
            else{
                $_SESSION['equipManageExamequipReserve_err']=2;
            }
            break;
        case 2://同意
            $res=$equipreserve_tb_serv->updateEquipreserveStatusByEquipreserveId($_GET['equipreserve_id'],2);
            if ($res==1){
                $_SESSION['equipManageExamequipReserve_err']=3;
            }
            else{
                $_SESSION['equipManageExamequipReserve_err']=4;
            }
            break;
    }
}
header("Location:../docRoot/equipManageExam.php");
exit();