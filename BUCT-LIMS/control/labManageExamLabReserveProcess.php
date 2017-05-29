<?php
require_once "../model/Labreserve_tb_serv.class.php";
session_start(300);
$labreserve_tb_serv=new Labreserve_tb_serv();
if (isset($_GET['flag'])){
    switch ($_GET['flag']){
        case 1://拒绝
            $res=$labreserve_tb_serv->updateLabreserveStatusBylabreserveId($_GET['labreserve_id'],3);
            if ($res==1){
                $_SESSION['labManageExamLabReserve_err']=1;
            }
            else{
                $_SESSION['labManageExamLabReserve_err']=2;
            }
            break;
        case 2://同意
            $res=$labreserve_tb_serv->updateLabreserveStatusBylabreserveId($_GET['labreserve_id'],2);
            if ($res==1){
                $_SESSION['labManageExamLabReserve_err']=3;
            }
            else{
                $_SESSION['labManageExamLabReserve_err']=4;
            }
            break;
    }
}
header("Location:../docRoot/labManageExam.php");
exit();