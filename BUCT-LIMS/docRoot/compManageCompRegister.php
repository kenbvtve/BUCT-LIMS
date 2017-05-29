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
if (isset($_SESSION['compManageCompRegisterProcess_err'])){
    switch ($_SESSION['compManageCompRegisterProcess_err']){
        case 1:case 3: case 5:
            echo "<script type='text/javascript'>alert('操作成功！');</script>";
            break;
        case 2:case 4: case 6:
            echo "<script type='text/javascript'>alert('发生未知错误，请重新尝试！');</script>";
            break;
    }
    unset($_SESSION['compManageCompRegisterProcess_err']);
}
?>
<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container">

        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">竞赛列表</h4>
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
                <!--   Kitchen Sink -->
                <div class="panel panel-default">
                    <div class="panel-heading">所有用户</div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>竞赛编号</th>
                                    <th>竞赛名称</th>
                                    <th>竞赛类型</th>
                                    <th>报名截止时间</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if(isset($_SESSION['login_userType'])&&$_SESSION['login_userType']==1){
                                    //获取正在报名中竞赛
                                    $comp_tb_serv=new Comp_tb_serv();
                                    $res=$comp_tb_serv->getCompList(1);

                                    for ($i=0;$i<count($res);$i++) {
                                        $row = $res[$i];
                                        $j=$i+1;
                                        echo "<tr class='gradeX'><td>$j</td>
<td><a href='compManageCompInfo.php?comp_id={$row['comp_id']}'>{$row['comp_id']}</a></td>
<td>{$row['comp_name']}</td><td>{$row['comp_type']}</td><td>{$row['comp_depart']}</td><td><a onclick=\"return confirm('确认删除？');\" href='../control/compManageCompRegisterProcess.php?flag=1&comp_id={$row['comp_id']}' class='btn btn-danger btn-xs'>删除</a>&nbsp;<a  onclick=\"return confirm('确认废弃？');\" href='../control/compManageCompRegisterProcess.php?flag=2&comp_id={$row['comp_id']}' class='btn btn-primary btn-xs'>废弃</a>&nbsp;&nbsp;<a  onclick=\"return confirm('确认结束报名？');\" href='../control/compManageCompRegisterProcess.php?flag=3&comp_id={$row['comp_id']}' class='btn btn-info btn-xs'>结束报名</a></td></tr>";
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
