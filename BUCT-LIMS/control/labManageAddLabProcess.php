<?php
/**
 * Created by PhpStorm.
 * User: lo_ong
 */
echo "<meta charset='UTF-8'>";

require_once "../model/Lab_tb_serv.class.php";

$lab_id=$_POST['labManageAddLab_labId'];
$lab_name=$_POST['labManageAddLab_labName'];
$lab_grade=$_POST['labManageAddLab_labGrade'];
$lab_college=$_POST['labManageAddLab_labCollege'];
$lab_zone=$_POST['labManageAddLab_labZone'];
$lab_status=$_POST['labManageAddLab_status'];
$lab_desc=$_POST['labManageAddLab_labDesc'];
$lab_img="";
$move_to_path="";


//echo $lab_id;
//echo "<pre>";
//print_r($_FILES);
//echo "</pre>";


//===================================================================================================
//                                      文件上传操作
//===================================================================================================
//对文件类型进行检测
$type=array("jpg","gif","bmp","jpeg","png");//设置允许上传文件的类型
//获取文件后缀名函数
function fileext($filename)
{
    return substr(strrchr($filename, '.'), 1);
}
if ($_FILES['labManageAddLab_img']['name']!=""){
    if(!in_array(strtolower(fileext($_FILES['labManageAddLab_img']['name'])),$type))
    {
        $text=implode(",",$type);
        echo "<script type='text/javascript'>alert('只能上传以下类型文件: \",$text,\"！');parent.location.href='../docRoot/labManageAdd.php';</script>";
        exit();
    }
}


//判断是否上传
if (is_uploaded_file($_FILES['labManageAddLab_img']['tmp_name'])){
    //存储文件
    if ($_FILES['labManageAddLab_img']['size']>1024*1024*5){
        echo "<script type='text/javascript'>alert('文件过大，请处理后再上传！');parent.location.href='../docRoot/labManageAdd.php';</script>";
        exit();
    }
    $upload_file=$_FILES['labManageAddLab_img']['tmp_name'];
    $lab_img=time().rand(1,1000).$_FILES['labManageAddLab_img']['name'];
    $move_to_path=$_SERVER['DOCUMENT_ROOT']."/2017-LIMS/upload/lab/".$lab_img;

    move_uploaded_file($upload_file,$move_to_path);
//    echo $move_to_path;

}

//上传数据库操作
$lab_tb_serv=new Lab_tb_serv();
//检测id是否存在
$resCheck=$lab_tb_serv->getLabNameByLabId($lab_id);

//echo $resCheck[0]['lab_name'];
if (!empty($resCheck[0]['lab_name'])){
    echo "<script type='text/javascript'>alert('该实验室已存在，请检查后再操作！');parent.location.href='../docRoot/labManageAdd.php';</script>";
    exit();
}

$resAdd=$lab_tb_serv->addLab($lab_id,$lab_name,$lab_grade,$lab_college,$lab_zone,$lab_desc,$lab_status,$lab_img);

if ($resAdd==1){
    echo "<script type='text/javascript'>alert('添加成功！');parent.location.href='../docRoot/labManageAdd.php';</script>";
    exit();
}else{
    echo "<script type='text/javascript'>alert('发生未知错误，添加失败，请重试！');parent.location.href='../docRoot/labManageAdd.php';</script>";
    exit();
}
