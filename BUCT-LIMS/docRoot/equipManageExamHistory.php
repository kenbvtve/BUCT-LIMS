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
require_once "../model/Equipreserve_tb_serv.class.php";
?>
<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container">

        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">设备历史预约</h4>
            </div>
        </div>

        <!-- 显示区-->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">历史记录</div>

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>预约编号</th>
                                    <th>预约设备</th>
                                    <th>预约人姓名</th>
                                    <th>学号/工号</th>
                                    <th>预约日期</th>
                                    <th>预期时段</th>
                                    <th>备注</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                if (isset($_SESSION['login_userType'])&&$_SESSION['login_userType']==1){
                                    $equipreserve_tb_serv=new Equipreserve_tb_serv();
                                    $res=$equipreserve_tb_serv->getEquipReserveListHistoryByEuqipReserveStatusAndDate();


                                    for ($i=0;$i<count($res);$i++) {
                                        $row = $res[$i];
                                        $status="";
                                        switch ($row['equipreserve_status']){
                                            case 1:$status="预约过期";break;
                                            case 2:$status="预约成功";break;
                                            case 3:$status="预约被拒";break;
                                            default:break;
                                        }
                                        $j=$i+1;
                                        echo "<tr class='gradeX'><td>$j</td>
<td>{$row['equipreserve_id']}</td>
<td>{$row['equipreserve_equip']}</td>
<td>{$row['equipreserve_perName']}</td>
<td>{$row['equipreserve_perId']}</td>
<td>{$row['equipreserve_date']}</td>
<td>{$row['equipreserve_time']}</td>
<td>".$status."</td></tr>";
                                    }
                                }
                                else{
                                    echo "<script type='text/javascript'>alert('非法用户，无权查看任何信息！')</script>";
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- End  Kitchen Sink -->
            </div>
        </div>
    </div>
</div>

<?php  require_once "../frame/footer.php"; ?>
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
