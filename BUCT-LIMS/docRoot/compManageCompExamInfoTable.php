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
if (isset($_SESSION['compManageCompExamProcess_err'])){
    switch ($_SESSION['compManageCompExamProcess_err']){
        case 1:case 3:
        echo "<script type='text/javascript'>alert('操作成功！');</script>";
        break;
        case 2:case 4:
        echo "<script type='text/javascript'>alert('发生未知错误，请重新尝试！');</script>";
        break;
    }
    unset($_SESSION['compManageCompExamProcess_err']);
}
?>
<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container">

        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">竞赛审核</h4>
            </div>
        </div>

        <div class="row">

            <div class="col-md-2" id="loginOptions">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <ul class="nav">
                            <li><a href="compManageCompExam.php" class="menu-top-active">待审核</a></li>
                            <li><a href="compManageCompExamRecive.php">已通过</a></li>
                            <li><a href="compManageCompExamReject.php">已拒绝</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <?php
            if(!isset($_SESSION['login_userType'])||$_SESSION['login_userType']!=1||empty($_GET['compjoin_id'])){
                echo "<script type='text/javascript'>alert('非法用户，无操作权限，请使用更高级权限账户！');parent.location.href='../doc/loginOrSign.php';</script>";
            }
            ?>

            <div class="col-md-10">
                <!--   Kitchen Sink -->
                <div class="panel panel-default">
                    <div class="panel-heading">竞赛报名表</div>

                    <?php
                        $compjoin_tb_serv=new Compjoin_tb_serv();
                        $resInfo=$compjoin_tb_serv->getCompjoinTbInfoByCompjoinId($_GET['compjoin_id']);
                    ?>

                    <div class='panel-body'>
                        <form role='form'>
                            <table class='table table-bordered table-responsive'>
                                <tr>
                                    <td><label>竞赛编号</label></td>
                                    <td colspan='3'><?php echo $resInfo->getCompId(); ?></td>
                                </tr>
                                <tr>
                                    <td><label>参赛编号</label></td>
                                    <td colspan='3'><?php echo $resInfo->getCompjoinId(); ?></td>
                                </tr>
                                <tr>
                                    <td><label>审核状态</label></td>
                                    <td colspan='3'><?php echo $resInfo->getCompjoinStatus() ?></td>
                                </tr>
                                <tr>
                                    <td><label>团队名称</label></td>
                                    <td colspan='3'><?php echo $resInfo->getCompjoinName() ?></td>
                                </tr>
                                <tr><td colspan='4'>队长基本信息<span style='color: red;'>*</span></td></tr>
                                <tr>
                                    <td><label>队长姓名</label></td><td><?php echo $resInfo->getCompjoinLeaderName(); ?></td>
                                    <td><label>队长学号</label></td><td><?php echo $resInfo->getCompjoinLeaderId(); ?></td>
                                </tr>
                                <tr>
                                    <td><label>队长手机</label></td><td><?php echo $resInfo->getCompjoinLeaderPhone(); ?></td>
                                    <td><label>队长邮箱</label></td><td><?php echo $resInfo->getCompjoinLeaderMail(); ?></td>
                                </tr>
                                <tr><td colspan='4'>队员基本信息</td></tr>
                                <tr>
                                    <td><label>队员1姓名</label></td><td><?php echo $resInfo->getCompjoinMemberName1(); ?></td>
                                    <td><label>队员1学号</label></td><td><?php echo $resInfo->getCompjoinMemberId1(); ?></td>
                                </tr>
                                <tr>
                                    <td><label>队员2姓名</label></td><td><?php echo $resInfo->getCompjoinMemberName2(); ?></td>
                                    <td><label>队员2学号</label></td><td><?php echo $resInfo->getCompjoinMemberId2(); ?></td>
                                </tr>
                                <tr>
                                    <td><label>队员3姓名</label></td><td><?php echo $resInfo->getCompjoinMemberName3(); ?></td>
                                    <td><label>队员3学号</label></td><td><?php echo $resInfo->getCompjoinMemberId3(); ?></td>
                                </tr>
                                <tr>
                                    <td><label>队员4姓名</label></td><td><?php echo $resInfo->getCompjoinMemberName4(); ?></td>
                                    <td><label>队员4学号</label></td><td><?php echo $resInfo->getCompjoinMemberId4(); ?></td>
                                </tr>
                                <tr><td colspan='4'>指导老师信息</td></tr>
                                <tr>
                                    <td><label>老师姓名</label></td><td><?php echo $resInfo->getCompjoinTeaName(); ?></td>
                                    <td><label>老师工号</label></td><td><?php echo $resInfo->getCompjoinTeaId(); ?></td>
                                </tr>
                                <tr>
                                    <td><label>老师手机</label></td><td><?php echo $resInfo->getCompjoinTeaPhone(); ?></td>
                                    <td><label>老师邮箱</label></td><td><?php echo $resInfo->getCompjoinTeaMail(); ?></td>
                                </tr>
                                <tr>
                                    <td><label>所获荣誉</label></td><td colspan='3'><?php echo $resInfo->getCompjoinGlory(); ?></td>
                                </tr>
                            </table>
                        </form>
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
