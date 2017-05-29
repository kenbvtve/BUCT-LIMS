<?php
/**
 * Created by PhpStorm.
 * User: lo_ong
 */

require_once "../model/Labreserve_tb_serv.class.php";
session_start();

if (isset($_GET['way'])){
    if ($_GET['way']=="datetime"){
        $labreserve_date=$_POST['inquireScheduleDate'];
        $labreserve_time=$_POST['inquireScheduleTime'];
        $flag="checked";

        header("Location:../docStu/inquireScheduleDateAndTime.php?labreserve_date=$labreserve_date&labreserve_time=$labreserve_time&resCheck=$flag");
    }
    if ($_GET['way']=='datelab'){
        $labreserve_lab_id=$_POST['inquireScheduleLab'];
        $labreserve_date_start=$_POST['inquireScheduleDateStart'];
        $labreserve_date_end=$_POST['inquireScheduleDateEnd'];
        $flag="checked";

        header("Location:../docStu/inquireScheduleLabAndDate.php?labreserve_date_start=$labreserve_date_start&labreserve_date_end=$labreserve_date_end&labreserve_lab_id=$labreserve_lab_id&resCheck=$flag");
    }
}
