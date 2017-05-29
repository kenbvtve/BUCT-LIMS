<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->
    <title>实验室管理系统</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="../bootstrap/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="../bootstrap/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

    <script src="../bootstrap/js/myscript.js"></script>
</head>
<body>
<!--引用导航-->
<?php  require_once "../frame/header.php"; ?>
<?php
require_once "../model/Comp_tb_serv.class.php";
require_once "../model/Compjoin_tb_serv.class.php";
//
//if (empty($_GET['comp_id'])||empty($_GET['compjoin_id'])){
//    echo "<script>alert('非法操作！');parent.location.href='../docStu/loginingPersonInfoComp.php';</script>";
//}

$compjoin_tb_serv=new Compjoin_tb_serv();
$res=$compjoin_tb_serv->getCompjoinTbInfoByCompjoinId($_GET['compjoin_id']);
?>
<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container">

        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">个人中心</h4>
            </div>
        </div>

        <div class="row">

            <div class="col-md-3" id="loginOptions">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <ul class="nav">
                            <li><a href="../docStu/loginingPersonInfo.php">我的资料</a></li>
                            <li><a href="../docStu/loginingPersonInfoReserve.php">我的预约</a></li>
                            <li><a href="../docStu/loginingPersonInfoComp.php"  class="menu-top-active">我的竞赛</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <!--   Kitchen Sink -->
                <div class="panel panel-default">
                    <div class="panel-heading">报名中</div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class='table table-bordered table-responsive'>
                                <tr>
                                    <td><label>竞赛编号</label></td>
                                    <td colspan='3'><?php echo $_GET['comp_id']; ?></td>
                                </tr>
                                <tr>
                                    <td><label>参赛编号</label></td>
                                    <td colspan='3'><?php echo $_GET['compjoin_id']; ?></td>
                                </tr>
                                <tr>
                                    <td><label>审核状态</label></td>
                                    <td colspan='3'><?php echo $res->getCompjoinStatus();?></td>
                                </tr>
                                <tr>
                                    <td><label>团队名称</label></td>
                                    <td colspan='3'><?php echo $res->getCompjoinName(); ?></td>
                                </tr>
                                <tr><td colspan='4'>队长基本信息<span style='color: red;'>*</span></td></tr>
                                <tr>
                                    <td><label>队长姓名</label></td><td><?php echo $res->getCompjoinLeaderName(); ?></td>
                                    <td><label>队长学号</label></td><td><?php echo $res->getCompjoinLeaderId(); ?></td>
                                </tr>
                                <tr>
                                    <td><label>队长手机</label></td><td><?php echo $res->getCompjoinLeaderPhone(); ?></td>
                                    <td><label>队长邮箱</label></td><td><?php echo $res->getCompjoinLeaderMail(); ?></td>
                                </tr>
                                <tr><td colspan='4'>队员基本信息</td></tr>
                                <tr>
                                    <td><label>队员1姓名</label></td><td><?php echo $res->getCompjoinMemberName1(); ?></td>
                                    <td><label>队员1学号</label></td><td><?php echo $res->getCompjoinMemberId1(); ?></td>
                                </tr>
                                <tr>
                                    <td><label>队员2姓名</label></td><td><?php echo $res->getCompjoinMemberName2(); ?></td>
                                    <td><label>队员2学号</label></td><td><?php echo $res->getCompjoinMemberId2(); ?></td>
                                </tr>
                                <tr>
                                    <td><label>队员3姓名</label></td><td><?php echo $res->getCompjoinMemberName3(); ?></td>
                                    <td><label>队员3学号</label></td><td><?php echo $res->getCompjoinMemberId3(); ?></td>
                                </tr>
                                <tr>
                                    <td><label>队员4姓名</label></td><td><?php echo $res->getCompjoinMemberName4(); ?></td>
                                    <td><label>队员4学号</label></td><td><?php echo $res->getCompjoinMemberId4(); ?></td>
                                </tr>
                                <tr><td colspan='4'>指导老师信息</td></tr>
                                <tr>
                                    <td><label>老师姓名</label></td><td><?php echo $res->getCompjoinTeaName(); ?></td>
                                    <td><label>老师工号</label></td><td><?php echo $res->getCompjoinTeaId(); ?></td>
                                </tr>
                                <tr>
                                    <td><label>老师手机</label></td><td><?php echo $res->getCompjoinTeaPhone(); ?></td>
                                    <td><label>老师邮箱</label></td><td><?php echo $res->getCompjoinTeaMail() ?></td>
                                </tr>
                                <tr>
                                    <td><label>所获荣誉</label></td><td colspan='3'><?php echo $res->getCompjoinGlory(); ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once "../frame/footer.php"; ?>
<!-- CORE JQUERY  -->
<script src="../bootstrap/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS  -->
<script src="../bootstrap/js/bootstrap.js"></script>
<!-- CUSTOM SCRIPTS  -->
<script src="../bootstrap/js/custom.js"></script>

<script src="../bootstrap/js/dataTables/jquery.dataTables.js"></script>
<script src="../bootstrap/js/dataTables/dataTables.bootstrap.js"></script>

</body>
</html>
