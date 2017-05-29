<?php
/**
 * Created by PhpStorm.
 * User: lo_ong
 * Date: 2017/5/14
 * Time: 21:34
 */
echo "<meta charset='UTF-8'>";
require_once "../model/Equip_tb_serv.class.php";
require_once "../model/Lab_tb_serv.class.php";

$equip_id=$_POST['equipManageAddEquip_equipId'];
$equip_lab_id=$_POST['equipManageAddEquip_labId'];
$equip_name=$_POST['equipManageAddEquip_equipName'];
$equip_model=$_POST['equipManageAddEquip_equipModel'];
$equip_price=$_POST['equipManageAddEquip_equipPrice'];
$equip_manu=$_POST['equipManageAddEquip_manu'];
$equip_manuNo=$_POST['equipManageAddEquip_manuNo'];
$equip_manuTime=$_POST['equipManageAddEquip_manuTime'];
$equip_chaseTime=$_POST['equipManageAddEquip_chaseTime'];
$equip_desc=$_POST['equipManageAddEquip_desc'];
$equip_status=$_POST['equipManageAddEquip_status'];
$equip_img="";
$move_to_path="";

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
if ($_FILES['equipManageAddEquip_img']['name']!=""){
    if(!in_array(strtolower(fileext($_FILES['equipManageAddEquip_img']['name'])),$type))
    {
        $text=implode(",",$type);
        echo "<script type='text/javascript'>alert('只能上传以下类型文件: \",$text,\"！');parent.location.href='../docRoot/equipManageAdd.php';</script>";
        exit();
    }
}


//判断是否上传
if (is_uploaded_file($_FILES['equipManageAddEquip_img']['tmp_name'])){
    //存储文件
    if ($_FILES['equipManageAddEquip_img']['size']>1024*1024*5){
        echo "<script type='text/javascript'>alert('文件过大，请处理后再上传！');parent.location.href='../docRoot/equipManageAdd.php';</script>";
        exit();
    }
    $upload_file=$_FILES['equipManageAddEquip_img']['tmp_name'];
    $equip_img=time().rand(1,1000).$_FILES['equipManageAddEquip_img']['name'];
    $move_to_path=$_SERVER['DOCUMENT_ROOT']."/2017-LIMS/upload/equip/".$equip_img;
    move_uploaded_file($upload_file,$move_to_path);
//    echo $move_to_path;

}

//对实验室编号进行检测
$lab_tb_serv=new Lab_tb_serv();
$resCheck=$lab_tb_serv->getLabNameByLabId($equip_lab_id);
//echo $resCheck[0]['lab_name'];

if (!isset($resCheck[0]['lab_name'])){
    echo "<script type='text/javascript'>alert('您输入的实验室编号不存在，请检查后或先去添加该实验室再操作！');parent.location.href='../docRoot/equipManageAdd.php';</script>";
    exit();
}


$equip_tb_serv=new Equip_tb_serv();

$resAdd=$equip_tb_serv->addEquip($equip_id,$equip_name,$equip_model,$equip_lab_id,$equip_img,$equip_price,$equip_manu,$equip_manuNo,$equip_manuTime,$equip_chaseTime,$equip_status,$equip_desc);

if ($resAdd==1){
    echo "<script type='text/javascript'>alert('添加成功！');parent.location.href='../docRoot/equipManageAdd.php';</script>";
    exit();
}
else{
    echo "<script type='text/javascript'>alert('发生未知错误，添加失败，请重试！');parent.location.href='../docRoot/equipManageAdd.php';</script>";
    exit();
}















