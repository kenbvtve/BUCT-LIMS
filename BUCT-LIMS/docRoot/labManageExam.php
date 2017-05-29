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
if (isset($_SESSION['labManageExamLabReserve_err'])){
    switch ($_SESSION['labManageExamLabReserve_err']){
        case 1:case 3:
            echo "<script type='text/javascript'>alert('操作成功！')</script>";
            break;
        case 2:case 4:
            echo "<script type='text/javascript'>alert('发生未知错误，操作失败，请重新操作！')</script>";
            break;
    }
    unset($_SESSION['labManageExamLabReserve_err']);
}
?>
<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container">

        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">实验室预约审核</h4>
            </div>
        </div>

        <!-- 显示区-->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">预约列表</div>

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>预约编号</th>
                                    <th>预约实验室</th>
                                    <th>预约人姓名</th>
                                    <th>学号/工号</th>
                                    <th>预约日期</th>
                                    <th>预期时段</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                if (isset($_SESSION['login_userType'])&&$_SESSION['login_userType']==1){
                                    $labreserve_tb_serv=new Labreserve_tb_serv();
                                    $res=$labreserve_tb_serv->getLabReserveListByLabReserveStatus(1);

                                    for ($i=0;$i<count($res);$i++) {
                                        $row = $res[$i];
                                        $j=$i+1;
                                        echo "<tr class='gradeX'><td>$j</td>
<td>{$row['labreserve_id']}</td>
<td>{$row['labreserve_lab_id']}</td>
<td>{$row['labreserve_perName']}</td>
<td>{$row['labreserve_perId']}</td>
<td>{$row['labreserve_date']}</td>
<td>{$row['labreserve_time']}</td>
<td><a onclick=\"return confirm('确认拒绝？');\" href='../control/labManageExamLabReserveProcess.php?flag=1&labreserve_id={$row['labreserve_id']}' class='btn btn-default btn-xs'>拒绝</a>&nbsp;<a  onclick=\"return confirm('确认同意？');\" href='../control/labManageExamLabReserveProcess.php?flag=2&labreserve_id={$row['labreserve_id']}' class='btn btn-info btn-xs'>同意</a></td></tr>";
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
