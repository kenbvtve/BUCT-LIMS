<?php
/**
 * Created by PhpStorm.
 * User: lo_ong

 */
require_once "../model/Comp_tb_serv.class.php";

$fileNameWhichId=$_GET['comp_id'];
$comp_tb_serv=new Comp_tb_serv();
$fileName=$comp_tb_serv->getCompfileByCompId($fileNameWhichId)[0]['comp_file'];

//echo $fileName;

if (empty($fileName)){
    echo "<script type='text/javascript'>alert('没有附件！');parent.location.href='../doc/contestRegProEndInfo.php?comp_id={$_GET['comp_id']}'</script>";
    exit();
}

$filePath="../upload/text/".$fileName;
echo $filePath;

//if (!file_exists($file_path)){
//    echo "<script type='text/javascript'>alert('文件已被移除！');parent.location.href='../doc/contestRegProEndInfo.php?comp_id={$_GET['comp_id']}'</script>";
//    exit();
//}

$fp=fopen($filePath,"r");
$fileSize=filesize($filePath);
//echo $fileSize;

//返回的文件
header("Content-type:application/octet-stream");
//按照字节返回大小
header("Accept-Ranges:bytes");
//返回文件大小
header("Accept-Length:$fileSize");
//这里客户端的弹出客户端，对应的文件名
header("Content-Disposition:attachment;filename=".$fileName);


////向客户端回送数据
$buffer=1024;
////为了下载安全，做一个文件字节读取计数器
//$fileCount=0;
////判断文件是否结束
while(!feof($fp)){
    $fileData=fread($fp,$buffer);
    //统计下载了多少字节
//     $fileCount+=$buffer;
    //把部分数据会送给浏览器
    echo $fileData;
}
//关闭文件，必须要有
fclose($fp);

//header("Location:../doc/contestRegProEndInfo.php?comp_id={$_GET['comp_id']}");
