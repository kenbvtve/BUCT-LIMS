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
require_once "../model/Equipreserve_tb_serv.class.php";
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
                            <li><a href="../docStu/loginingPersonInfoReserve.php"  class="menu-top-active">我的预约</a></li>
                            <li><a href="../docStu/loginingPersonInfoComp.php">我的竞赛</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <!--   Kitchen Sink -->
                <div class="panel panel-default">
                    <div class="panel-heading">实验室预约</div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>预约编号</th>
                                    <th>预约实验室</th>
                                    <th>预约日期</th>
                                    <th>预期时段</th>
                                    <th>审核状态</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if (isset($_SESSION['login_userId'])){
                                    $labreserve_tb_serv=new Labreserve_tb_serv();
                                    $res=$labreserve_tb_serv->getLabreserveListByLabreservePerId($_SESSION['login_userId']);

                                    for ($i=0;$i<count($res);$i++) {
                                        $row = $res[$i];
                                        $j=$i+1;
                                        $status="";
                                        switch ($row['labreserve_status']){
                                            case 1:$status="审核中";break;
                                            case 2:$status="预约成功";break;
                                            case 3:$status="预约失败";break;
                                        }
                                        echo "<tr>
<td>$j</td>
<td><a href='loginingPersonInfoReserveDeta.php?labreserve_id={$row['labreserve_id']}'>{$row['labreserve_id']}</a></td>
<td>{$row['labreserve_lab_id']}</td>
<td>{$row['labreserve_date']}</td>
<td>{$row['labreserve_time']}</td>
<td>".$status."</td>
</tr>";
                                    }
                                }
                                else{
                                    echo "<script>alert('未登录！');parent.location.href='../doc/loginOrSign.php'</script>";
                                }

                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">设备预约</div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>预约编号</th>
                                    <th>预约设备</th>
                                    <th>预约日期</th>
                                    <th>预期时段</th>
                                    <th>审核状态</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if (isset($_SESSION['login_userId'])){
                                    $equipreserve_tb_serv=new Equipreserve_tb_serv();
                                    $resEquip=$equipreserve_tb_serv->getequipreserveListByPerId($_SESSION['login_userId']);

                                    for ($i=0;$i<count($resEquip);$i++) {
                                        $row = $resEquip[$i];
                                        $j=$i+1;
                                        $status="";
                                        switch ($row['equipreserve_status']){
                                            case 1:$status="审核中";break;
                                            case 2:$status="预约成功";break;
                                            case 3:$status="预约失败";break;
                                        }
                                        echo "<tr>
<td>$j</td>
<td>{$row['equipreserve_id']}</td>
<td>{$row['equipreserve_equip']}</td>
<td>{$row['equipreserve_date']}</td>
<td>{$row['equipreserve_time']}</td>
<td>".$status."</td>
</tr>";
                                    }
                                }
                                else{
                                    echo "<script>alert('未登录！');parent.location.href='../doc/loginOrSign.php'</script>";
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
