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
?>
<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">竞赛信息</h4>

            </div>

        </div>
        <div class="row">

            <div class="col-md-3" id="loginOptions">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <ul class="nav">
                            <li><a href="compManageCompRegister.php" class="menu-top-active">报名中</a></li>
                            <li><a href="compManageCompProcess.php">进行中</a></li>
                            <li><a href="compManageCompEnd.php">已结束</a></li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        详细信息
                    </div>

                    <div class="panel-body">
                        <div class="table-responsive">
<?php
if(!empty($_GET['comp_id'])){
    $comp_tb_serv=new Comp_tb_serv();
    $row=$comp_tb_serv->getCompById($_GET['comp_id']);
}
?>
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>竞赛编号</th>
                                    <th>竞赛名称</th>
                                    <th>竞赛类型</th>
                                    <th>报名截止时间</th>
                                    <th>竞赛结束时间</th>
                                    <th>最多人数/组</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><?php if(!empty($_GET['comp_id'])) echo $row->getCompId(); ?></a></td>
                                    <td><?php if(!empty($_GET['comp_id'])) echo $row->getCompName() ?></td>
                                    <td><?php if(!empty($_GET['comp_id'])) echo $row->getCompType(); ?></td>
                                    <td><?php if(!empty($_GET['comp_id'])) echo $row->getCompDepart();  ?></td>
                                    <td><?php if(!empty($_GET['comp_id'])) echo $row->getCompEnd(); ?></td>
                                    <td><?php if(!empty($_GET['comp_id'])) echo $row->getCompNumper();  ?></td>
                                </tr>
                                </tbody>
                            </table>
                            <p>说明：</p>
                            <p><?php if(!empty($_GET['comp_id'])) echo $row->getCompInfo(); ?></p>

                            <p><a class="btn btn-primary btn-sm" role="button">详情请下载附件</a>
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
