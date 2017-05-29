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
require_once "../model/User_tb_serv.class.php";
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
                            <li><a href="../docStu/loginingPersonInfo.php" class="menu-top-active">我的资料</a></li>
                            <li><a href="../docStu/loginingPersonInfoReserve.php">我的预约</a></li>
                            <li><a href="../docStu/loginingPersonInfoComp.php">我的竞赛</a></li>
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
                            <table class="table">
                                <?php
                                $user_tb_serv=new User_tb_serv();
                                $res=$user_tb_serv->getUserInfoById($_SESSION['login_userId']);
                                ?>

                                <tr>
                                    <td>学号/工号</td>
                                    <td><?php if (!empty($_SESSION['login_userId'])) echo $res->getUserId(); ?></td>
                                </tr>
                                <tr>
                                    <td>用户名</td>
                                    <td><?php if (!empty($_SESSION['login_userId'])) echo $res->getUserName(); ?></td>
                                </tr>
                                <tr>
                                    <td>所属学院</td>
                                    <td><?php if (!empty($_SESSION['login_userId'])) echo $res->getUserCollege(); ?></td>
                                </tr>
                                <tr>
                                    <td>手机号码</td>
                                    <td><?php if (!empty($_SESSION['login_userId'])) echo $res->getUserPhone(); ?></td>
                                </tr>
                                <tr>
                                    <td>邮箱</td>
                                    <td><?php if (!empty($_SESSION['login_userId'])) echo $res->getUserMail(); ?></td>
                                </tr>
                                </tbody>
                            </table>
                            <a href="../doc/loginingChangePersonInfo.php" class="btn bg-primary btn-xs">修改资料</a>
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
