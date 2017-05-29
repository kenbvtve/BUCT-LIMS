<?php
/**
 * Created by PhpStorm.
 * User: lo_ong
 * Date: 2017/3/16
 * Time: 21:11
 */

session_start(300);

$checkCode="";
for($i=0;$i<4;$i++){
    $checkCode .= dechex(rand(1,15));
}

$_SESSION['checkCode']=$checkCode;

//创建画布
$im=imagecreatetruecolor(80,34);

$red=imagecolorallocate($im,255,255,255);
$lineColor=imagecolorallocate($im,rand(0,250),rand(0,250),rand(0,250));

imagestring($im,rand(1,5),rand(0,10),rand(0,10),$checkCode,$red);

//干扰线
for($i=0;$i<10;$i++) {
    imageline($im, rand(0,80),rand(0,30),rand(0,80),rand(0,30),$lineColor);
}

header("content-type:image/png");
imagepng($im);
//释放内存资源
imagedestroy($im);
