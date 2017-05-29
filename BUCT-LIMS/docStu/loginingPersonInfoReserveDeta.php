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
require_once "../model/Labreserve_tb_serv.class.php";
$labreserve_tb_serv=new Labreserve_tb_serv();
if (isset($_GET['labreserve_id'])){
    echo "<script>alert('非法操作，前往预约页面！')parent.location.href='../docStu/loginingPersonInfoReserve.php'</script>";
}
$res=$labreserve_tb_serv->getlabreserveInfoByLabreserveId($_GET['labreserve_id']);
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
                            <li><a href="../docStu/loginingPersonInfoReserve.php" class="menu-top-active">我的预约</a></li>
                            <li><a href="../docStu/loginingPersonInfoComp.php">我的竞赛</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <!--   Kitchen Sink -->
                <div class="panel panel-default">
                    <div class="panel-heading">我的预约</div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <td><label>预约编号</label></td>
                                    <td colspan='3'><?php echo $_GET['labreserve_id']; ?></td>
                                </tr>

                                <tr>
                                    <td><label>实验室编号</label></td>
                                    <td colspan='3'><?php echo $res->getLabreserveLabId(); ?></td>
                                </tr>

                                <tr>
                                    <td><label>审核状态</label></td>
                                    <td colspan='3'>
                                        <?php
                                        switch ($res->getLabreserveStatus()){
                                            case 1:echo "审核中";break;
                                            case 2:echo "预约成功";break;
                                            case 3:echo "预约失败";break;
                                        }
                                        ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td><label>预约日期</label></td>
                                    <td><?php echo $res->getLabreserveDate(); ?></td>
                                    <td><label>预约时段</label></td>
                                    <td><?php echo $res->getLabreserveTime(); ?></td>
                                </tr>

                                <tr><td colspan='4'>预约人基本信息<span style='color: red;'>*</span></td></tr>

                                <tr>
                                    <td><label>姓名</label></td>
                                    <td><?php echo $res->getLabreservePerName(); ?></td>
                                    <td><label>学号</label></td>
                                    <td><?php echo $res->getLabreservePerId(); ?></td>
                                </tr>
                                <tr>
                                    <td><label>手机</label></td>
                                    <td><?php echo $res->getLabreservePerPhone(); ?></td>
                                    <td><label>邮箱</label></td>
                                    <td><?php echo $res->getLabreservePerMail(); ?></td>
                                </tr>
                                <tr><td colspan="4">其他</td></tr>
                                <tr>
                                    <td><label>是否预约设备</label></td>
                                    <td colspan="3"><?php echo $res->getLabreserveEquip(); ?></td>
                                </tr>
                                <tr><td><label>预约原因</label></td>
                                    <td colspan="3"><?php if(empty($res->getLabreserveReason())) echo "未填写原因..."; else echo $res->getLabreserveReason(); ?></td>
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
