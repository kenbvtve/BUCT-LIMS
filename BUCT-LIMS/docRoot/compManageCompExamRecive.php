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
                            <li><a href="compManageCompExam.php">待审核</a></li>
                            <li><a href="compManageCompExamRecive.php" class="menu-top-active">已通过</a></li>
                            <li><a href="compManageCompExamReject.php">已拒绝</a></li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="col-md-10">
                <!--   Kitchen Sink -->
                <div class="panel panel-default">
                    <div class="panel-heading">所有用户</div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>竞赛名称</th>
                                    <th>参赛编号</th>
                                    <th>队长姓名</th>
                                    <th>队长学号</th>
                                    <th>指导老师</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if(isset($_SESSION['login_userType'])&&$_SESSION['login_userType']==1){
                                    //获取相关竞赛信息
                                    $compjoin_tb_serv=new Compjoin_tb_serv();
                                    $res=$compjoin_tb_serv->getCompjoinTbByCompjoinStatus('已通过');

                                    $comp_tb_serv=new Comp_tb_serv();
                                    for ($i=0;$i<count($res);$i++) {
                                        $row = $res[$i];
                                        $j=$i+1;
                                        $compName=$comp_tb_serv->getCompNameByCompId($row['comp_id'])[0]['comp_name'];

                                        echo "<tr class='gradeX'><td>$j</td><td><a href='compManageCompInfo.php?comp_id={$row['comp_id']}'>".$compName."</a></td><td><a href='compManageCompExamInfoTable.php?compjoin_id={$row['compjoin_id']}'>{$row['compjoin_id']}</a></td><td>{$row['compjoin_leaderName']}</td><td>{$row['compjoin_leaderId']}</td><td>{$row['compjoin_teaName']}</td><td></td></tr>";
                                    }
                                }
                                else{
                                    echo "<script type='text/javascript'>alert('非法用户,无权限查看任何信息！');</script>";
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
