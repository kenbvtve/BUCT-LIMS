<?php
/**
 * Created by PhpStorm.
 * User: lo_ong
 * Date: 2017/5/13
 * Time: 16:35
 */
echo "<meta charset='utf-8'>";
require_once "../model/Compjoin_tb_serv.class.php";
session_start(300);

$comp_id=$_POST['contestRegJoin_compId'];
$compjoin_name=$_POST['contestRegJoin_groupName'];

$compjoin_leaderName=$_POST['contestRegJoin_leaderName'];
$compjoin_leaderId=$_POST['contestRegJoin_leaderId'];
$compjoin_leaderPhone=$_POST['contestRegJoin_leaderPhone'];
$compjoin_leaderMail=$_POST['contestRegJoin_leaderMail'];

$compjoin_memberName_1=$_POST['contestRegJoin_memberName_1'];
$compjoin_memberName_2=$_POST['contestRegJoin_memberName_2'];
$compjoin_memberName_3=$_POST['contestRegJoin_memberName_3'];
$compjoin_memberName_1=$_POST['contestRegJoin_memberName_4'];
$compjoin_memberId_1=$_POST['contestRegJoin_memberId_1'];
$compjoin_memberId_2=$_POST['contestRegJoin_memberId_2'];
$compjoin_memberId_3=$_POST['contestRegJoin_memberId_3'];
$compjoin_memberId_4=$_POST['contestRegJoin_memberId_4'];

$compjoin_teaName=$_POST['contestRegJoin_teaName'];
$compjoin_teaId=$_POST['contestRegJoin_teaId'];
$compjoin_teaPhone=$_POST['contestRegJoin_teaPhone'];
$compjoin_teaMail=$_POST['contestRegJoin_teaMail'];

$compjoin_tb_serv=new Compjoin_tb_serv();
//先校验该报名队长是否已参加报名参加比赛
$resIsjoin=$compjoin_tb_serv->getCompjoinTbByCompIdAndLeaderId($comp_id,$compjoin_leaderId);
if (!empty($resIsjoin)){
    echo "<script type='text/javascript'>alert('您已经报过名，不能再以队长身份再填报一次！返回报名页面！');parent.location.href='../doc/contestRegJoin.php?comp_id=$comp_id';</script>";
}

$resAdd=$compjoin_tb_serv->addCompjoinToTb($comp_id,$compjoin_name,$compjoin_leaderName,$compjoin_leaderId,$compjoin_leaderPhone,$compjoin_leaderMail,$compjoin_memberName_1,$compjoin_memberName_2,$compjoin_memberName_3,$compjoin_memberName_4,$compjoin_memberId_1,$compjoin_memberId_2,$compjoin_memberId_3,$compjoin_memberId_4,$compjoin_teaName,$compjoin_teaId,$compjoin_teaPhone,$compjoin_teaMail);

if ($resAdd==1){
    $_SESSION['contestRegJoin_err']=1;
    header("Location:../doc/contestRegJoin.php?comp_id=$comp_id");
    exit();
}
else{
    $_SESSION['contestRegJoin_err']=2;
    header("Location:../doc/contestRegJoin.php?comp_id=$comp_id");
    exit();
}














