<?php
/**
 * Created by PhpStorm.
 * User: lo_ong
 * Date: 2017/5/9
 * Time: 15:39
 */
require_once "../model/Feedback_tb_serv.class.php";
session_start();

$feedback_name=$_POST['feedbacksub_name'];
$feedback_perid=$_POST['feedbacksub_perid'];
$feedback_phone=$_POST['feedbacksub_phone'];
$feedback_mail=$_POST['feedbacksub_mail'];
$feedback_content=$_POST['feedbacksub_content'];

$feedback_tb_serv=new Feedback_tb_serv();
$link=$feedback_tb_serv->addFeedbackInfo($feedback_name,$feedback_perid,$feedback_phone,$feedback_mail,$feedback_content);

if ($link==1){
    $_SESSION['aboutFeedback']=1;
    header("Location:../doc/aboutFeedBack.php");
    exit();
}