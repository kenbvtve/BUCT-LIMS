<?php
require_once "../model/Comp_tb_serv.class.php";
require_once "../model/Comptype_tb_serv.class.php";
session_start(300);

if ((!isset($_SESSION['login_userType']))||($_SESSION['login_userType']!=1)){
    $_SESSION['compManageAdd_err']=0;
    header("Location:../docRoot/compManageAdd.php");
    exit();
}

if (isset($_GET['flag'])){
     if ($_GET['flag']==1) {
         $comp_tb_serv = new Comp_tb_serv();

         $comp_name = $_POST['compManageAddComp_name'];
         $comp_type = $_POST['compManageAddComp_type'];
         $comp_sponsor = $_POST['compManageAddComp_sponsor'];
         $comp_numper = $_POST['compManageAddComp_numper'];
         $comp_depart = $_POST['compManageAddComp_depart'];
         $comp_end = $_POST['compManageAddComp_end'];
         $comp_info = $_POST['compManageAddComp_info'];
         $comp_file="";
         $move_to_path="";

//===================================================================================================
//                                      文件上传操作
//===================================================================================================

         //对文件类型进行检测
         $type = array("doc", "docx", "pdf", "txt", "rar", "cab", "arj", "lzh", "ace", "7-zip", "tar", "gzip", "uue", "bz2", "jar");            //设置允许上传文件的类型
         //获取文件后缀名函数
         function fileext($filename)
         {
             return substr(strrchr($filename, '.'), 1);
         }

         if ($_FILES['compManageAddComp_file']['name']!="") {
             if (!in_array(strtolower(fileext($_FILES['compManageAddComp_file']['name'])), $type)) {
                 $text = implode(",", $type);
                 echo "<script type='text/javascript'>alert('只能上传以下类型文件: \",$text,\"！');parent.location.href='../docRoot/compManageAdd.php';</script>";
                 exit();
             }
         }


         //判断是否上传
         if (is_uploaded_file($_FILES['compManageAddComp_file']['tmp_name'])) {
             //存储文件
             if ($_FILES['compManageAddComp_file']['size'] > 1024 * 1024 * 10) {
                 echo "<script type='text/javascript'>alert('文件过大，请处理后再上传！');parent.location.href='../docRoot/compManageAdd.php';</script>";
                 exit();
             }
             $upload_file=$_FILES['compManageAddComp_file']['tmp_name'];
             $comp_file=time().rand(1, 1000).$_FILES['compManageAddComp_file']['name'];

     echo $comp_file;
             $move_to_path = $_SERVER['DOCUMENT_ROOT']."/2017-LIMS/upload/text/".$comp_file;

             move_uploaded_file($upload_file, $move_to_path);
             //    echo $move_to_path;
         }

         $res = $comp_tb_serv->addComp($comp_name, $comp_type, $comp_sponsor, $comp_numper, $comp_info, $comp_depart, $comp_end, $comp_file);
//            $res=$comp_tb_serv->addComp($comp_name,$comp_type);
         if ($res == 1) {
             $_SESSION['compManageAdd_err'] = 1;
         } else {
             $_SESSION['compManageAdd_err'] = 2;
         }
     }
     if ($_GET['flag']==2) {
         $comptype_tb_serv = new Comptype_tb_serv();
         $resJudge = $comptype_tb_serv->getComptypeComptypeIdByComptypeName($_POST['compManageAddCompType_compName']);
         if ($resJudge != "") {
             $_SESSION['compManageAdd_err'] = 3;
         } else {
             $resAdd = $comptype_tb_serv->addComptypeToComptypeTb($_POST['compManageAddCompType_compName']);
             if ($resAdd == 1) {
                 $_SESSION['compManageAdd_err'] = 4;
             } else {
                 $_SESSION['compManageAdd_err'] = 5;
             }
         }
     }
}
header("Location:../docRoot/compManageAdd.php");
exit();

