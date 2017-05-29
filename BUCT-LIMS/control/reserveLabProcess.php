<?php
/**
 * Created by PhpStorm.
 * User: lo_ong
 */
require_once "../model/Labreserve_tb_serv.class.php";
session_start();

$labreserve_date=$_POST['reserveLabDate'];
$labreserve_time=$_POST['reserveLabTime'];
$flag="checked";
//$labreserve_tb_serv=new Labreserve_tb_serv();
////$resCheck=$labreserve_tb_serv->getLabIDByDateAndTime($labreserve_date,$labreserve_time);

//for ($j=0;$j<count($resCheck);$j++) {
////
//    $rowCheck = $resCheck[$j];
//
//    echo "<script>alert({$row['labreserve_lab_id']})</script>";
//}

header("Location:../doc/reserveLab.php?labreserve_date=$labreserve_date&labreserve_time=$labreserve_time&resCheck=$flag");

//echo "<script type='text/javascript'>parent.location.href='../doc/reserveLab.php?labreserve_date=$labreserve_date&labreserve_time=$labreserve_date&resCheck=$res';</script>";

//echo "123";