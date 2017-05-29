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
require_once "../model/Comp_tb_serv.class.php"
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
                            <li><a href="contestReg.php" class="menu-top-active">报名中</a></li>
                            <li><a href="contestProc.php">进行中</a></li>
                            <li><a href="contentEnd.php">已结束</a></li>
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
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>竞赛编号</th>
                                    <th>竞赛名称</th>
                                    <th>报名截止时间</th>
                                    <th>竞赛类型</th>
                                    <th>人数/组</th>
                                    <th>备注</th>
                                </tr>
                                </thead>
                                <tbody>
<?php
$comp_tb_serv=new Comp_tb_serv();
//获取报名中竞赛信息表内容
$res=$comp_tb_serv->getCompList(1);
for ($i=0;$i<count($res);$i++) {
    $row = $res[$i];
    echo "<tr><td><a href='contestRegProEndInfo.php?comp_id={$row['comp_id']}'>{$row['comp_id']}</td>
<td>{$row['comp_name']}</td><td>{$row['comp_depart']}</td><td>{$row['comp_type']}</td><td>{$row['comp_numper']}</td>
<td>";
    if ($_SESSION['login_userType']==3){
        echo "<a href='../control/exHand_isLoginingProcess.php?type=compjoin&comp_id={$row['comp_id']}' class='btn btn-primary btn-xs'>报名</a>";
    }
"</td>
</tr>";
}

?>
                                </tbody>
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
